<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/search.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Search extends CI_Controller{

        function Search(){
            parent::__construct();
            $this->CI =& get_instance();
        }
        
        public function index(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$data['search_title'];

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

            if ($this->input->post('home_search_location')){
                $data['home_search_location'] = $this->input->post('home_search_location');
            }
            else{
                $data['home_search_location'] = '';
            }
            
            if ($this->input->post('home_search_category')){
                $data['home_search_category'] = $this->input->post('home_search_category');
            }
            else{
                $data['home_search_category'] = '';
            }

            if ($this->input->post('home_search_checkin')){
                $data['home_search_checkin'] = $this->input->post('home_search_checkin');
            }
            else{
                $data['home_search_checkin'] = '';
            }
            
            if ($this->input->post('home_search_checkout')){
                $data['home_search_checkout'] = $this->input->post('home_search_checkout');
            }
            else{
                $data['home_search_checkout'] = '';
            }

            if ($this->input->post('home_search_offer_adults')){
                $data['home_search_offer_adults'] = $this->input->post('home_search_offer_adults');
            }
            else{
                $data['home_search_offer_adults'] = '';
            }
            
            if ($this->input->post('home_search_offer_children')){
                $data['home_search_offer_children'] = $this->input->post('home_search_offer_children');
            }
            else{
                $data['home_search_offer_children'] = '';
            }

            $this->load->view('frontend/search/templates/search-template', $data);
        }

        public function searchSubmit(){
            if ($this->input->post('category')){
                $data = $this->lang->language;
                
                $data['offers'] = $this->CI->Offers_model->search();
                $data['curr_page'] = $this->input->post('page');

                foreach ($data['offers']->result() as $offer):
                    $offer->title = $this->CI->Functions_model->shortText($offer->name, 15);
                    $offer->short_description = $this->CI->Functions_model->shortText($offer->description, 150);
                    $offer->image = $this->CI->Offers_model->getImageUserSelection($offer->id);
                    if ($offer->no_comments > 0){
                        $offer->last_comment = $this->CI->Offers_model->getLastComment($offer->id)->row_array();
                        $date_pieces = explode(' ', $offer->last_comment['date']);
                        $year_pieces = explode('-', $date_pieces[0]);
                        $time_pieces = explode(':', $date_pieces[1]);
                        if ($this->input->cookie('stbartsview-language') == 'english'){
                            $offer->last_comment_date = $year_pieces[1].'/'.$year_pieces[2].'/'.$year_pieces[0].' '.$time_pieces[0].':'.$time_pieces[1];
                        }
                        else{
                            $offer->last_comment_date = $year_pieces[2].'/'.$year_pieces[1].'/'.$year_pieces[0].' '.$time_pieces[0].':'.$time_pieces[1];
                        }
                        $offer->last_comment_user_id = $offer->last_comment['user_id'];
                        $offer->last_comment_first_name = $this->CI->Users_model->getProfile($offer->last_comment['user_id'], 'first_name');
                        $offer->last_comment_last_name = $this->CI->Users_model->getProfile($offer->last_comment['user_id'], 'last_name');
                        $offer->last_comment_profile_picture = $this->CI->Users_model->getProfile($offer->last_comment['user_id'], 'picture');
                    }
                endforeach;
                
                if ($this->input->post('view_mode') == 'photos'){
                    $this->load->view('frontend/search/results/photos-results', $data);
                }
                elseif ($this->input->post('view_mode') == 'map'){
                    $this->load->view('frontend/search/results/list-results', $data);
                }
                else{
                    $this->load->view('frontend/search/results/list-results', $data);
                }

                $this->load->view('frontend/search/templates/pagination-template', $data);
            }
        }
    }

?>