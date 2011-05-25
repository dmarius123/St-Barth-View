<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class SignUp extends CI_Controller{

        private $errorColor = '#ff0000';

        function SignUp(){
            parent::__construct();
            $this->load->library('email');
            $this->CI =& get_instance();
        }

        private function loadLanguage(){
            $this->lang->load('frontend/header', $this->language->getLanguage());
            $this->lang->load('frontend/signupin', $this->language->getLanguage());
            $this->lang->load('frontend/footer', $this->language->getLanguage());

            return $this->lang->language;
        }

        private function loadJS(){
            return array(0 => 'assets/frontend/js/sign-upin.js');
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                redirect('user/');
            }
            else{
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['signupin_sign_up_title'];
                $data['js'] = $this->loadJS();
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                $this->load->view('frontend/user/sign-up', $data);
            }
        }
        
        public function validateFirstName(){
            $lang = $this->loadLanguage();
            if ($this->input->post('first_name')){
                echo $lang['signupin_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_first_name_invalid'].'</font>';
            }            
        }

        public function validateLastName(){
            $lang = $this->loadLanguage();
            if ($this->input->post('last_name')){
                echo $lang['signupin_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_last_name_invalid'].'</font>';
            }
        }

        public function validateEmail(){
            $lang = $this->loadLanguage();
            if (!$this->validEmail($this->input->post('email'))){
                echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_email_invalid'].'</font>';
            }
            else{
                $this->db->where('email', $this->input->post('email'));
                $query = $this->db->get('users');
                if ($query->num_rows() > 0){
                    echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_email_used'].'</font>';
                }
                else{
                    echo $lang['signupin_mandatory_field'];
                }
            }
        }

        public function validateConfirmEmail(){
            $lang = $this->loadLanguage();
            if ($this->input->post('email') != $this->input->post('confirm_email') || !$this->input->post('confirm_email')){
                echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_confirm_email_invalid'].'</font>';
            }
            else{
                echo $lang['signupin_mandatory_field'];
            }
        }

        public function validatePassword(){
            $lang = $this->loadLanguage();
            if ($this->input->post('password')){
                echo $lang['signupin_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_password_invalid'].'</font>';
            }
        }

        public function validateConfirmPassword(){
            $lang = $this->loadLanguage();
            if ($this->input->post('password') != $this->input->post('confirm_password') || !$this->input->post('confirm_password')){
                echo '<font style="color:'.$this->errorColor.';">'.$lang['signupin_confirm_password_invalid'].'</font>';
            }
            else{
                echo $lang['signupin_mandatory_field'];
            }
        }

        public function submit(){
            if ($this->input->post('email')){
                $lang = $this->loadLanguage();

                $len = 64;
                $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
                $max = strlen($base)-1;
                $verificationCode = '';
                mt_srand((double)microtime()*1000000);
                while (strlen($verificationCode)<$len) $verificationCode .= $base{mt_rand(0,$max)};

                $datestring = "%Y-%m-%d %H:%i:%s";
                $time = time();
                $query_data = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => 'not verified',
                    'verification_code' => $verificationCode,
                    'date_created' => mdate($datestring, $time)
                );
                $this->db->insert('users', $query_data);
                $query_data = array(
                   'user_id' => $this->db->insert_id(),
                   'first_name' => $this->input->post('first_name'),
                   'last_name' => $this->input->post('last_name')
                );
                $this->db->insert('profiles', $query_data);

                $email_config = array('mailtype' => 'html');
                $this->CI->email->initialize($email_config);
                $this->CI->email->from('no-reply@stbarthview.com', $lang['header_title']);
                $this->CI->email->to($this->input->post('email'));
                $this->CI->email->subject($lang['signupin_validation_email_title']);
                $this->CI->email->message($lang['signupin_validation_email_text'].'<br />'.anchor(base_url().'user/validate/'.$verificationCode, base_url().'user/validate/'.$verificationCode));
                $this->CI->email->send();
            }
        }

        public function complete(){
            if ($this->session->userdata('stbartsview-user')){
                redirect('user/');
            }
            else{
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['signupin_sign_up_complete_title'].' '.$data['signupin_sign_up_complete_text'];
                $data['js'] = $this->loadJS();
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                $this->load->view('frontend/user/sign-up-complete', $data);
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
    }

?>