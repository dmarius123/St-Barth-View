<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Settings extends CI_Controller{

        private $userId;
        private $errorColor = '#ff0000';

        function Settings(){
            parent::__construct();
            $this->CI =& get_instance();
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
                         2 => 'assets/frontend/js/google-maps-api.js',
                         3 => 'assets/frontend/js/user.js');
        }

        public function index(){
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
                $this->load->view('frontend/user/content/settings-content', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function validateNewPassword(){
            $lang = $this->loadLanguage();
            if ($this->input->post('new_password')){
                echo $lang['user_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_new_password_invalid'].'</font>';
            }
        }

        public function validateConfirmNewPassword(){
            $lang = $this->loadLanguage();
            if ($this->input->post('new_password') != $this->input->post('confirm_new_password') || !$this->input->post('confirm_new_password')){
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_confirm_new_password_invalid'].'</font>';
            }
            else{
                echo $lang['user_mandatory_field'];
            }
        }

         public function changePassword(){
            if ($this->input->post('new_password')){
                $lang = $this->loadLanguage();

                $query_data = array(
                   'password' => md5($this->input->post('new_password'))
                );
                $this->db->where('id', $this->session->userdata('stbartsview-user'));
                $this->db->update('users', $query_data);

                echo $lang['user_change_password_success'];
            }
        }
    }

?>