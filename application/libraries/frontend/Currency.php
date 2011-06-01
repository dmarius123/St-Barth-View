<?php

/*
 * Title                   : St Barth View
 * File                    : application/libraries/frontend/Currency.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Currency Library.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Currency extends CI_Controller{

        private $currentCurrency;

        function Currency(){
            parent::__construct();
            $this->load->database();

            if (!$this->input->cookie('stbartsview-currency')){
                $cookie_data = array(
                    'name'   => 'stbartsview-currency',
                    'value'  => 'euro',
                    'expire' => '604800'
                );
                $this->input->set_cookie($cookie_data);
                $this->currentCurrency = 'euro';
            }
            else{
                $this->currentCurrency = $this->input->cookie('stbartsview-currency');
            }
        }

        public function index(){
        }

        public function getLanguage(){
            return $this->currentCurrency;
        }
    }

?>