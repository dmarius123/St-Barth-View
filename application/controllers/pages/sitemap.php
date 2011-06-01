<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/pages/sutemap.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Pages - Sitemap Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Sitemap extends CI_Controller{

        function Sitemap(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$data['footer_sitemap'];
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
            
            $this->load->view('frontend/pages/templates/sitemap-template', $data);
        }
    }

?>