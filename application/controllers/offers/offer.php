<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/offers/offer.php
 * File Version            : 1.4
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 29 June 2011
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

            $offer['owner_first_name'] = $this->CI->Users_model->getProfile($offer['user_id'], 'first_name');
            $offer['owner_last_name'] = $this->CI->Users_model->getProfile($offer['user_id'], 'last_name');
            $offer['owner_profile_picture'] = $this->CI->Users_model->getProfile($offer['user_id'], 'picture');
            $offer['owner_short_description'] = $this->CI->Functions_model->shortText($this->CI->Users_model->getProfile($offer['user_id'], 'description'), 70);

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

        public function getAmenities(){
            $amenities = $this->CI->Offers_model->getAmenities($this->input->post('offer_type_id'));
            $i = 0;

            foreach ($amenities->result() as $amenity):
                $i++;
                if ($i == 1){
                    echo $amenity->id.':'.$amenity->name;
                }
                else{
                    echo ','.$amenity->id.':'.$amenity->name;
                }
            endforeach;
        }

        public function getReviews(){
            $data = $this->lang->language;
            if ($this->session->userdata('stbartsview-user')){
                $data['is_login'] = true;
            }
            else{
                $data['is_login'] = false;
            }
            
            $comments = $this->CI->Offers_model->getComments($this->input->post('offer_id'));
            foreach ($comments->result() as $comment):
                $comment->user_picture = $this->CI->Users_model->getProfile($comment->user_id, 'picture');
                $comment->first_name = $this->CI->Users_model->getProfile($comment->user_id, 'first_name');
                $comment->last_name = $this->CI->Users_model->getProfile($comment->user_id, 'last_name');
                $comment->no_comments = $this->CI->Users_model->getNoComments($comment->user_id);
            endforeach;

            $data['comments'] = $comments;
            $this->load->view('frontend/offers/templates/bottom-templates/offer-bottom-reviews-template', $data);
        }

        public function getAddReview(){
            $data = $this->lang->language;
            $this->load->view('frontend/offers/forms/offer-add-review-form', $data);
        }

        public function addReview(){
            if ($this->input->post('offer_id')){
                $comment->no_comments = $this->CI->Offers_model->addComment($this->session->userdata('stbartsview-user'));
                echo $this->lang->line('offers_bottom_review_add_review_submit_success');
            }
        }

        public function getReportReview(){
            $data = $this->lang->language;
            $this->load->view('frontend/offers/forms/offer-report-review-form', $data);
        }

        public function reportReview(){
            if ($this->input->post('offer_id')){
                $comment->no_comments = $this->CI->Offers_model->addComment($this->session->userdata('stbartsview-user'));
            }
        }
    }

?>