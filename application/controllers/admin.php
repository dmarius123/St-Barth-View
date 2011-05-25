<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Admin extends CI_Controller{

        private $language;

        function Admin(){
            parent::__construct();

            if (!$this->input->cookie('stbartsview-admin-language')){
                $cookie_data = array(
                    'name'   => 'stbartsview-admin-language',
                    'value'  => 'en',
                    'expire' => '604800'
                );
                $this->input->set_cookie($cookie_data);
                $language = 'en';
            }
            else{
                $this->language = $this->input->cookie('stbartsview-admin-language');
            }
        }

        public function index(){
            $text = $this->db->get('backend_translation');

            for ($i=0; $i<$text->num_rows(); $i++){
                $row_items = $text->row_array($i);
                switch ($row_items['id']){
                    case 1:
                        $data['admin_title'] = $row_items[$this->language];
                        break;
                    case 2:
                        $data['login_email'] = $row_items[$this->language];
                        break;
                    case 3:
                        $data['login_password'] = $row_items[$this->language];
                        break;
                    case 4:
                        $data['login_submit'] = $row_items[$this->language];
                        break;
                    case 5:
                        $data['login_info'] = $row_items[$this->language];
                        break;
                    case 6:
                        $data['login_processing'] = $row_items[$this->language];
                        break;
                    case 7:
                        $data['login_unsuccess'] = $row_items[$this->language];
                        break;
                    case 8:
                        $data['login_success'] = $row_items[$this->language];
                        break;
                }
            }
            
            if ($this->session->userdata('stbartsview-admin')){
                $this->load->view('backend/templates/template-dashboard', $data);
            }
            else{
                $this->load->view('backend/login', $data);
            }
        }

        public function login(){
            if ($this->input->post('email') && $this->input->post('password')){
                $query_result = $this->db->query('SELECT password FROM users WHERE email="'.$this->input->post('email').'"');
                if ($query_result->num_rows() > 0){
                    $row_items = $query_result->row_array();
                    if ($row_items['password'] == md5($this->input->post('password'))){
                        $session_data = array('stbartsview-admin' => $this->input->post('email'));
                        $this->session->set_userdata($session_data);
                        $text = $this->db->query('SELECT * FROM backend_translation WHERE id="8"');
                        $row_items = $text->row_array();
                        echo $row_items[$this->language];
                    }
                    else{
                        $text = $this->db->query('SELECT * FROM backend_translation WHERE id="7"');
                        $row_items = $text->row_array();
                        echo $row_items[$this->language];
                    }
                }
                else{
                    $text = $this->db->query('SELECT * FROM backend_translation WHERE id="7"');
                    $row_items = $text->row_array();
                    echo $row_items[$this->language];
                }
            }
            else{
                $text = $this->db->query('SELECT * FROM backend_translation WHERE id="7"');
                $row_items = $text->row_array();
                echo $row_items[$this->language];
            }
        }
    }

?>