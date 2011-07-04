<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Test extends CI_Controller{

        function Test(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            $this->load->view('frontend/test');
        }

    }

?>