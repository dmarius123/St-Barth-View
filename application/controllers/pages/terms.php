<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/pages/terms.php
 * File Version            : 1.2
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 30 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Pages - Terms Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Terms extends CI_Controller{

        function Terms(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$data['footer_terms'];
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
            
            $this->load->view('frontend/pages/templates/terms-template', $data);
        }
    }

?>