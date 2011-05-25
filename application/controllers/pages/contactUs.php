<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class ContactUs extends CI_Controller{

        function ContactUs(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        private function loadLanguage(){
            $this->lang->load('frontend/header', $this->language->getLanguage());
            $this->lang->load('frontend/footer', $this->language->getLanguage());

            return $this->lang->language;
        }

        private function loadJS(){
            return array();
        }

        public function index(){
            $this->CI->load->model('frontend/Users_model');
            $data = $this->loadLanguage();
            $data['header_subtitle'] = ' - '.$data['footer_contact_us'];
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data['is_login'] = true;
                $data['first_name'] = $this->CI->Users_model->firstName($this->userId);
                $data['last_name'] = $this->CI->Users_model->lastName($this->userId);
            }
            else{
                $data['facebook_language'] = $this->language->getFacebookLanguage();
                $data['is_login'] = false;
            }
            $this->load->view('frontend/pages/template-contact-us', $data);
        }
    }

?>