<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Dashboard extends CI_Controller{
        
        private $userId;

        function Dashboard(){
            parent::__construct();
            $this->CI =& get_instance();
            $this->load->library('frontend/Facebook');
        }

        private function loadLanguage(){
            $this->lang->load('frontend/header', $this->language->getLanguage());
            $this->lang->load('frontend/user', $this->language->getLanguage());
            $this->lang->load('frontend/footer', $this->language->getLanguage());

            return $this->lang->language;
        }

        private function loadJS(){
            return array(0 => 'assets/libraries/js/swfobject.js',
                         1 => 'assets/libraries/js/jquery.uploadify.min.js',
                         2 => 'assets/libraries/js/jquery.dop.BookingCalendar.js',
                         3 => 'assets/frontend/js/google-maps-api.js',
                         4 => 'assets/frontend/js/user.js');
        }

        public function index(){
            if ($this->CI->facebook->getCookie()){
                $this->updateFacebookAccount();
            }
            
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->CI->load->model('frontend/Users_model');

                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['js'] = $this->loadJS();
                $data['is_login'] = true;

                $data['first_name'] = $this->CI->Users_model->getProfile($this->userId, 'first_name');
                $data['last_name'] = $this->CI->Users_model->getProfile($this->userId, 'last_name');
                $data['profile_picture'] = $this->CI->Users_model->getProfile($this->userId, 'picture');
                $this->load->view('frontend/user/templates/user-admin-template', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function content(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['total_reward_points'] = sprintf($this->lang->line('user_reward_points_info'), $this->getTotalRewardPoints());
                $this->load->view('frontend/user/content/dashboard-content', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        private function getTotalRewardPoints(){
            $this->db->select('(SELECT SUM(value) FROM reward_points) AS total_reward_points', FALSE);
            $this->db->where('user_id', $this->userId);
            $query = $this->db->get('reward_points');
            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                return $row_items['total_reward_points'];
            }
            else{
                return 0;
            }
        }

        private function updateFacebookAccount(){
            $this->load->library('frontend/Facebook');
            if (property_exists($this->CI->facebook->getUser(), 'email')){
                $email = $this->CI->facebook->getUser()->email;
            }
            else{
                $email = '';
            }
            if (property_exists($this->CI->facebook->getUser(), 'first_name')){
                $first_name = $this->CI->facebook->getUser()->first_name;
            }
            else{
                $first_name = '';
            }
            if (property_exists($this->CI->facebook->getUser(), 'last_name')){
                $last_name = $this->CI->facebook->getUser()->last_name;
            }
            else{
                $last_name = '';
            }
            if (property_exists($this->CI->facebook->getUser(), 'bio')){
                $description = $this->CI->facebook->getUser()->bio;
            }
            else{
                $description = '';
            }
            if (property_exists($this->CI->facebook->getUser(), 'id')){
                $picture = 'https://graph.facebook.com/'.$this->CI->facebook->getUser()->id.'/picture?type=large';
            }
            else{
                $picture = '';
            }
            $datestring = "%Y-%m-%d %H:%i:%s";
            $time = time();

            $this->db->where('email', $email);
            $query = $this->db->get('users');

            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                $session_data = array('stbartsview-user' => $row_items['id']);
                $this->session->set_userdata($session_data);
                $query_data = array(
                   'status' => 'verified'
                );
                $this->db->where('id', $row_items['id']);
                $this->db->update('users', $query_data);
                $query_data = array(
                   'first_name' => $first_name,
                   'last_name' => $last_name,
                   'picture' => $picture,
                   'description' => $description
                );
                $this->db->where('user_id', $row_items['id']);
                $this->db->update('profiles', $query_data);
            }
            else{
                $query_data = array(
                    'email' => $email,
                    'password' => md5('sbvfacebooklogin'),
                    'status' => 'verified',
                    'verification_code' => 'facebook0123456789',
                    'date_created' => mdate($datestring, $time)
                );
                $this->db->insert('users', $query_data);
                $session_data = array('stbartsview-user' => $this->db->insert_id());
                $this->session->set_userdata($session_data);
                $query_data = array(
                   'user_id' => $this->db->insert_id(),
                   'first_name' => $first_name,
                   'last_name' => $last_name,
                   'picture' => $picture,
                   'description' => $description
                );
                $this->db->insert('profiles', $query_data);
            }
        }
    }

?>