<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/settings.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Settings Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Settings extends CI_Controller{

        private $userId;
        private $errorColor = '#ff0000';

        function Settings(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$this->lang->line('user_dashboard_title');
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
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$this->lang->line('user_dashboard_title');
                
                $this->load->view('frontend/user/content/settings-content', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function validateNewPassword(){
            if ($this->input->post('new_password')){
                echo $this->lang->line('user_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('user_new_password_invalid').'</font>';
            }
        }

        public function validateConfirmNewPassword(){
            if ($this->input->post('new_password') != $this->input->post('confirm_new_password') || !$this->input->post('confirm_new_password')){
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_confirm_new_password_invalid'].'</font>';
            }
            else{
                echo $this->lang->line('user_mandatory_field');
            }
        }

         public function changePassword(){
            if ($this->input->post('new_password')){
                $query_data = array(
                   'password' => md5($this->input->post('new_password'))
                );
                $this->db->where('id', $this->session->userdata('stbartsview-user'));
                $this->db->update('users', $query_data);

                echo $this->lang->line('user_change_password_success');
            }
        }
    }

?>