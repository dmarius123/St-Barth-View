<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/signIn.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Sign In Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class SignIn extends CI_Controller{

        private $errorColor = '#ff0000';
        
        function SignIn(){
            parent::__construct();
            $this->load->library('frontend/Facebook');
            $this->CI =& get_instance();
        }

        public function index(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$this->lang->line('user_dashboard_title');
            $data['facebook_language'] = $this->language->getFacebookLanguage();

            if ($this->session->userdata('stbartsview-user') || $this->CI->facebook->getCookie()){
                redirect('user/dashboard/');
            }
            else{
                $this->load->view('frontend/user/sign-in', $data);
            }
        }

        public function validate(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$this->lang->line('user_dashboard_title');
            $data['facebook_language'] = $this->language->getFacebookLanguage();

            $code = $this->uri->segment(3);

            $this->db->where('status', 'not verified');
            $this->db->where('verification_code ', $code);
            $query = $this->db->get('users');

            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                $query_data = array('status' => 'verified');
                $this->db->where('id', $row_items['id']);
                $this->db->update('users', $query_data);
                $session_data = array('stbartsview-user' => $row_items['id']);
                $this->session->set_userdata($session_data);
                
                $data['message'] = $this->lang->line('signupin_activation_success');

                $this->load->view('frontend/user/validate', $data);
            }
            else{
                $data['message'] = $this->lang->line('signupin_activation_invalid');

                $this->load->view('frontend/user/validate', $data);
            }
        }

        public function submit(){
            if ($this->input->post('email') && $this->input->post('password')){
                $this->db->where('email', $this->input->post('email'));
                $this->db->where('password', md5($this->input->post('password')));
                $this->db->where('status', 'verified');
                $query = $this->db->get('users');

                if ($query->num_rows() > 0){
                    $row_items = $query->row_array(0);
                    $session_data = array('stbartsview-user' => $row_items['id']);
                    $this->session->set_userdata($session_data);
                    echo 'sign-in';
                }
                else{
                    echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_email_invalid').'</font>;;<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_password_invalid').'</font>';
                }
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_email_invalid').'</font>;;<font style="color:'.$this->errorColor.';">'.$this->lang->line('signupin_password_invalid').'</font>';
            }
        }

        public function resetPassword(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$this->lang->line('user_dashboard_title');
            $data['facebook_language'] = $this->language->getFacebookLanguage();

            if ($this->session->userdata('stbartsview-user') || $this->CI->facebook->getCookie()){
                redirect('user/dashboard/');
            }
            else{
                $this->load->view('frontend/user/reset-password', $data);
            }
        }

        public function newPassword(){
            if ($this->input->post('reset-email')){           
                $len = 8;
                $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
                $max = strlen($base)-1;
                $newPassword = '';
                mt_srand((double)microtime()*1000000);
                while (strlen($newPassword)<$len) $newPassword .= $base{mt_rand(0,$max)};

                $query_data = array('password' => md5($newPassword));
                $this->db->where('email', $this->input->post('reset-email'));
                $this->db->update('users', $query_data);

                $email_config = array('mailtype' => 'html');
                $this->CI->email->initialize($email_config);
                $this->CI->email->from('no-reply@stbarthview.com', $this->lang->line('header_title'));
                $this->CI->email->to($this->input->post('reset-email'));
                $this->CI->email->subject($this->lang->line('signupin_new_password_email_title'));
                $email_message = sprintf($this->lang->line('signupin_new_password_email_text'), $newPassword);
                $this->CI->email->message($email_message);
                $this->CI->email->send();

                $data = $this->lang->language;
                
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                $this->load->view('frontend/user/new-password', $data);
            }
        }

        public function signOut(){            
            $session_data = array('stbartsview-user' => '');
            $this->session->set_userdata($session_data);            

            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$this->lang->line('user_dashboard_title');
            $data['facebook_language'] = $this->language->getFacebookLanguage();
            $this->load->view('frontend/user/sign-out', $data);
        }

        public function redirect(){
            $this->load->view('frontend/user/redirect');
        }
    }

?>