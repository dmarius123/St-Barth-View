<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/friends.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Friends Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Friends extends CI_Controller{

        private $userId;

        function Friends(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
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
                
                $this->load->view('frontend/user/content/friends-content', $data);
            }
            else{
                redirect('user/redirect');
            }
        }
    }

?>