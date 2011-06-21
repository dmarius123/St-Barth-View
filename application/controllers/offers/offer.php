<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/offers/offer.php
 * File Version            : 1.2
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 19 june 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Offer extends CI_Controller{

        function Offer(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            $data = $this->lang->language;

            $data['header_subtitle'] = ' - '.$data['footer_commitments'];
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
            
            $offer = $this->CI->Offers_model->getData($this->uri->segment(2), 'all')->row_array(0);

            $offer['locality'] = $this->CI->Locations_model->getLocality($this->CI->Offers_model->getData($offer['id'], 'locality_id'), 'name');
            $offer['location'] = $this->CI->Locations_model->getLocation($this->CI->Offers_model->getData($offer['id'], 'location_id'), 'name');
            $offer['country'] = $this->CI->Locations_model->getCountry($this->CI->Locations_model->getLocation($this->CI->Offers_model->getData($offer['id'], 'location_id'), 'aa0_id'));
            if ($offer['no_comments'] > 0){
                $offer['last_comment'] = $this->CI->Offers_model->getLastComment($offer['id'])->row_array();
                $date_pieces = explode(' ', $offer['last_comment']['date']);
                $year_pieces = explode('-', $date_pieces[0]);
                $time_pieces = explode(':', $date_pieces[1]);
                if ($this->input->cookie('stbartsview-language') == 'english'){
                    $offer['last_comment_date'] = $year_pieces[1].'/'.$year_pieces[2].'/'.$year_pieces[0].' '.$time_pieces[0].':'.$time_pieces[1];
                }
                else{
                    $offer['last_comment_date'] = $year_pieces[2].'/'.$year_pieces[1].'/'.$year_pieces[0].' '.$time_pieces[0].':'.$time_pieces[1];
                }
                $offer['last_comment_user_id'] = $offer['last_comment']['user_id'];
                $offer['last_comment_first_name'] = $this->CI->Users_model->getProfile($offer['last_comment']['user_id'], 'first_name');
                $offer['last_comment_last_name'] = $this->CI->Users_model->getProfile($offer['last_comment']['user_id'], 'last_name');
                $offer['last_comment_profile_picture'] = $this->CI->Users_model->getProfile($offer['last_comment']['user_id'], 'picture');
            }
            $data['offer'] = $offer;

            $this->load->view('frontend/offers/templates/offer-template', $data);
        }

        public function gallerySettings(){
            $this->load->view('frontend/offers/data/gallery-settings');
        }

        public function gallery(){
            $data['images'] = $this->CI->Offers_model->getGallery($this->uri->segment(4));
            $this->load->view('frontend/offers/data/gallery-data', $data);
        }
    }

?>