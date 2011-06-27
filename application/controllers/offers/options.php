<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/offers/options.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Options Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Options extends CI_Controller{

        function Options(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - Options';//.$data['footer_commitments'];
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

            $this->load->view('frontend/options/templates/options-template', $data);
        }
    }

?>