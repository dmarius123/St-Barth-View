<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Profile extends CI_Controller{

        private $userId;
        private $errorColor = '#ff0000';

        function Profile(){
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
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['js'] = $this->loadJS();
                $data['is_login'] = true;
                
                $data['first_name'] = $this->CI->Users_model->getProfile($this->userId, 'first_name');
                $data['last_name'] = $this->CI->Users_model->getProfile($this->userId, 'last_name');
                $data['profile_picture'] = $this->CI->Users_model->getProfile($this->userId, 'picture');
                $data['email'] = $this->CI->Users_model->getProfile($this->userId, 'email');
                $data['phone'] = $this->CI->Users_model->getProfile($this->userId, 'phone');
                $data['description'] = $this->CI->Users_model->getProfile($this->userId, 'description');
                $this->load->view('frontend/user/templates/user-admin-template', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function content(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->CI->load->model('frontend/Users_model');
                
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['user_id'] = $this->userId;

                $data['first_name'] = $this->CI->Users_model->getProfile($this->userId, 'first_name');
                $data['last_name'] = $this->CI->Users_model->getProfile($this->userId, 'last_name');
                $data['profile_picture'] = $this->CI->Users_model->getProfile($this->userId, 'picture');
                $data['email'] = $this->CI->Users_model->getProfile($this->userId, 'email');
                $data['phone'] = $this->CI->Users_model->getProfile($this->userId, 'phone');
                $data['description'] = $this->CI->Users_model->getProfile($this->userId, 'description');
                $this->load->view('frontend/user/content/profile-content', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function uploadify(){
            if (!empty($_FILES)){
                $this->userId = $this->uri->segment(4);
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $targetPath = 'content/profiles-images/';
                $ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);
                $newName = $this->userId;                
                $targetFile =  str_replace('//', '/', $targetPath).$newName.'.'.$ext;
                move_uploaded_file($tempFile, $targetFile);

                $query_data = array(
                   'picture' => base_url().$targetPath.$newName.'.'.$ext
                );
                $this->db->where('user_id', $this->userId);
                $this->db->update('profiles', $query_data);

                $len = 8;
                $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
                $max = strlen($base)-1;
                $cacheBuster = '';
                mt_srand((double)microtime()*1000000);
                while (strlen($cacheBuster)<$len) $cacheBuster .= $base{mt_rand(0,$max)};

                echo base_url().$targetPath.$newName.'.'.$ext.'?cacheBuster='.$cacheBuster;
            }
        }

        public function validateFirstName(){
            $lang = $this->loadLanguage();
            if ($this->input->post('first_name')){
                echo $lang['user_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_edit_profile_first_name_invalid'].'</font>';
            }
        }

        public function validateLastName(){
            $lang = $this->loadLanguage();
            if ($this->input->post('last_name')){
                echo $lang['user_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_edit_profile_last_name_invalid'].'</font>';
            }
        }

        public function validateEmail(){
            $lang = $this->loadLanguage();
            if (!$this->validEmail($this->input->post('email'))){
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_edit_profile_email_invalid'].'</font> '.$lang['user_private_field'];
            }
            else{
                $this->db->where('email', $this->input->post('email'));
                $query = $this->db->get('users');
                if ($query->num_rows() > 0){
                    $row_items = $query->row_array(0);
                    if ($row_items['id'] != $this->session->userdata('stbartsview-user')){
                        echo '<font style="color:'.$this->errorColor.';">'.$lang['user_edit_profile_email_used'].'</font> '.$lang['user_private_field'];
                    }
                    else{
                        echo $lang['user_mandatory_field'].' '.$lang['user_private_field'];
                    }
                }
                else{
                    echo $lang['user_mandatory_field'].' '.$lang['user_private_field'];
                }
            }
        }

        private function validEmail($email){
            if (preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)){
                return true;
            }
            else{
                return false;
            }
        }

        public function edit(){
            if ($this->input->post('email')){
                $lang = $this->loadLanguage();
                $this->userId = $this->session->userdata('stbartsview-user');
                
                $query_data = array(
                   'email' => $this->input->post('email')
                );
                $this->db->where('id', $this->userId);
                $this->db->update('users', $query_data);

                $query_data = array(
                   'first_name' => $this->input->post('first_name'),
                   'last_name' => $this->input->post('last_name'),
                   'phone' => $this->input->post('phone'),
                   'description' => $this->input->post('description')
                );
                $this->db->where('user_id', $this->userId);
                $this->db->update('profiles', $query_data);

                echo $lang['user_edit_profile_success'];
            }
        }
    }

?>