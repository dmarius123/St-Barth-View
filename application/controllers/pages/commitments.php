<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/pages/commitments.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Pages - Commitments Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Commitments extends CI_Controller{

        function Commitments(){
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
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$data['footer_commitments'];
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
            
            $this->load->view('frontend/pages/templates/commitments-template', $data);
        }
    }

?>