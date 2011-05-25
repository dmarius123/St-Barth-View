<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Functions extends CI_Controller{

        function Functions(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
        }

        public function GMT(){
            echo gmdate('F d, Y H:i:s');
        }
        
        public function locations(){
            if ($this->input->post('location')){
                switch ($this->input->post('location')){
                    case 'st-barth':
                        $this->load->view('frontend/user/forms/lists/st-barth-list');
                        break;
                    case 'miami':
                        $this->load->view('frontend/user/forms/lists/miami-list');
                        break;
                }
            }
        }
    }

?>