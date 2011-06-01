<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/home.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Home Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller{

        function Home(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            $data = $this->lang->language;
            
            $data['header_subtitle'] = '';            
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data['is_login'] = true;
                $data['first_name'] = $this->CI->Users_model->getProfile($this->userId, 'first_name');
                $data['last_name'] = $this->CI->Users_model->getProfile($this->userId, 'last_name');
            }
            else{
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                $data['is_login'] = false;
            }
            $data['new_users'] = $this->CI->Users_model->getNewUsers();
            
            $this->load->view('frontend/home/templates/home-template', $data);
        }

        public function slideshow(){
            $data = $this->lang->language;
            $this->load->view('frontend/modules/templates/home-slideshow-module-template', $data);
            
        }
    }

?>