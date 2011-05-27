<?php

/*
 * Title                   : St Barth View
 * Version                 : 1.0
 * File                    : application/controllers/user/deals.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Deals Controller.
*/

if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Deals extends CI_Controller{

        private $userId;

        function Deals(){
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
        }

        public function create(){
            $this->load->view('frontend/user/deals/create');
        }

        public function calendar(){
            $this->load->view('frontend/user/deals/calendar');
        }

        public function info(){
            $this->load->view('frontend/user/deals/info');
        }
    }

?>