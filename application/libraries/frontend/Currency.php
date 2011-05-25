<?php

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