<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Offers extends CI_Controller{

        private $userId;

        function Offers(){
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
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->CI->load->model('frontend/Users_model');
                
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['js'] = $this->loadJS();
                $data['is_login'] = true;

                $data['first_name'] = $this->CI->Users_model->getProfile($this->userId, 'first_name');
                $data['last_name'] = $this->CI->Users_model->getProfile($this->userId, 'last_name');
                $data['profile_picture'] = $this->CI->Users_model->getProfile($this->userId, 'picture');
                $this->load->view('frontend/user/templates/user-admin-template', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function content(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->CI->load->model('frontend/Functions_model');
                $this->CI->load->model('frontend/Offers_model');
                $data = $this->loadLanguage();
                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];

                $hotels_list = $this->CI->Offers_model->getHotelsList($this->userId);
                $data['hotels_list'] = $hotels_list;

                $villas_list = $this->CI->Offers_model->getVillasList($this->userId);
                $data['villas_list'] = $villas_list;
                
                $spa_beauty_list = $this->CI->Offers_model->getSpaBeautyList($this->userId);
                $data['spa_beauty_list'] = $spa_beauty_list;

                $shopping_list = $this->CI->Offers_model->getShoppingList($this->userId);
                $data['shopping_list'] = $shopping_list;

                $services_list = $this->CI->Offers_model->getServicesList($this->userId);
                $data['services_list'] = $services_list;

                $restaurants_list = $this->CI->Offers_model->getRestaurantsList($this->userId);
                $data['restaurants_list'] = $restaurants_list;
                
                $this->load->view('frontend/user/content/offers-content', $data);
                $this->load->view('frontend/user/submenus/offers-submenu', $data);
            }
            else{
                redirect('user/redirect');
            }
        }
    }

?>