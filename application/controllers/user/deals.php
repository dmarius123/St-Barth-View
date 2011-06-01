<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/deals.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Deals Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Deals extends CI_Controller{

        private $userId;

        function Deals(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
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
                $data = $this->lang->language;

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

                $this->load->view('frontend/user/templates/deals-template', $data);
                $this->load->view('frontend/user/submenus/deals-submenu', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function create(){
            $this->load->view('frontend/user/deals/create');
        }

        public function calendar(){
            $this->load->view('frontend/user/deals/calendar');
        }

        public function info(){
            $this->load->view('frontend/user/deals/info');
        }
    }

?>