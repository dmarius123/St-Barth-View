<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/signUp.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Sign Up Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class SignUp extends CI_Controller{

        private $errorColor = '#ff0000';

        function SignUp(){
            parent::__construct();
            $this->load->library('email');
            $this->CI =& get_instance();
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                redirect('user/');
            }
            else{
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                
                $this->load->view('frontend/user/templates/sign-upin/sign-up-template', $data);
            }
        }
        
        public function validateFirstName(){
            if ($this->input->post('first_name')){
                echo $this->lang->line('signupin_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_first_name_invalid').'</font>';
            }            
        }

        public function validateLastName(){
            if ($this->input->post('last_name')){
                echo $this->lang->line('signupin_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_last_name_invalid').'</font>';
            }
        }

        public function validateEmail(){
            if (!$this->CI->Functions_model->validEmail($this->input->post('email'))){
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_email_invalid').'</font>';
            }
            else{
                $this->db->where('email', $this->input->post('email'));
                $query = $this->db->get('users');
                if ($query->num_rows() > 0){
                    echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_email_used').'</font>';
                }
                else{
                    echo $this->lang->line('signupin_mandatory_field');
                }
            }
        }

        public function validateConfirmEmail(){
            if ($this->input->post('email') != $this->input->post('confirm_email') || !$this->input->post('confirm_email')){
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_confirm_email_invalid').'</font>';
            }
            else{
                echo $this->lang->line('signupin_mandatory_field');
            }
        }

        public function validatePassword(){
            if ($this->input->post('password')){
                echo $this->lang->line('signupin_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_password_invalid').'</font>';
            }
        }

        public function validateConfirmPassword(){
            if ($this->input->post('password') != $this->input->post('confirm_password') || !$this->input->post('confirm_password')){
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_confirm_password_invalid').'</font>';
            }
            else{
                echo $this->lang->line('signupin_mandatory_field');
            }
        }

        public function submit(){
            if ($this->input->post('email')){
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
                $this->CI->email->from('no-reply@stbarthview.com', $this->lang->line('header_title'));
                $this->CI->email->to($this->input->post('email'));
                $this->CI->email->subject($this->lang->line('signupin_validation_email_title'));
                $this->CI->email->message($this->lang->line('signupin_validation_email_text').'<br />'.anchor(base_url().'user/validate/'.$verificationCode, base_url().'user/validate/'.$verificationCode));
                $this->CI->email->send();
            }
        }

        public function complete(){
            if ($this->session->userdata('stbartsview-user')){
                redirect('user/');
            }
            else{
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$data['signupin_sign_up_complete_title'].' '.$data['signupin_sign_up_complete_text'];
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                
                $this->load->view('frontend/user/templates/sign-upin/sign-up-complete-template', $data);
            }
        }
    }

?>