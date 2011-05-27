<?php

/*
 * Title                   : St Barth View
 * File                    : application/libraries/frontend/Language.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Language Library.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Language extends CI_Controller{

        private $currentLanguage;

        function Language(){
            parent::__construct();
            $this->load->database();

            if (!$this->input->cookie('stbartsview-language')){
                $cookie_data = array(
                    'name'   => 'stbartsview-language',
                    'value'  => 'english',
                    'expire' => '604800'
                );
                $this->input->set_cookie($cookie_data);
                $this->currentLanguage = 'english';
            }
            else{
                $this->currentLanguage = $this->input->cookie('stbartsview-language');
            }
        }

        public function index(){
        }

        public function getLanguage(){
            return $this->currentLanguage;
        }

        public function getFacebookLanguage(){
            switch ($this->currentLanguage){
                case 'english':
                    return 'en_US';
                    break;
                case 'french':
                    return 'fr_FR';
                    break;
            }
        }
    }

?>