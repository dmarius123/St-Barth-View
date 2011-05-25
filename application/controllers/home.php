<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller{

        function Home(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        private function loadLanguage(){
            $this->lang->load('frontend/header', $this->language->getLanguage());
            $this->lang->load('frontend/home', $this->language->getLanguage());
            $this->lang->load('frontend/modules', $this->language->getLanguage());
            $this->lang->load('frontend/footer', $this->language->getLanguage());

            return $this->lang->language;
        }

        private function loadJS(){
            if ($this->input->cookie('stbartsview-language') == 'french'){
                return array(0 => 'assets/libraries/js/jquery.countdown.js',
                             1 => 'assets/libraries/js/jquery.countdown-fr.js',
                             2 => 'assets/frontend/js/last-module.js',
                             3 => 'assets/frontend/js/new-users-module.js',
                             4 => 'assets/frontend/js/home.js');
            }
            else{
                return array(0 => 'assets/libraries/js/jquery.countdown.js',
                             1 => 'assets/frontend/js/last-module.js',
                             2 => 'assets/frontend/js/new-users-module.js',
                             3 => 'assets/frontend/js/home.js');
            }
        }

        public function index(){
            $this->CI->load->model('frontend/Users_model');
            $data = $this->loadLanguage();
            $data['js'] = $this->loadJS();
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
            $this->load->view('frontend/home', $data);
        }

        public function slideshow(){
            $data = $this->loadLanguage();
            $this->load->view('frontend/modules/home-slideshow-module', $data);
            
        }
    }

?>