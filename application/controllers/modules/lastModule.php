<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class LastModule extends CI_Controller{

        function LastModule(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        private function loadLanguage(){
            $this->lang->load('frontend/modules', $this->language->getLanguage());

            return $this->lang->language;
        }

        private function loadJS(){
            return array();
        }

        public function index(){
            if ($this->input->post('last_filter1')){
                if ($this->input->post('last_filter1') == 'deals'){
                    $this->lastDeals();
                }
                else if ($this->input->post('last_filter1') == 'offers'){
                    $this->lastOffers();
                }
                else if ($this->input->post('last_filter1') == 'comments'){
                   $this->lastComments();
                }
            }
        }

        private function lastDeals(){
            $this->CI->load->model('frontend/Functions_model');
            $this->CI->load->model('frontend/Users_model');
            $this->CI->load->model('frontend/Offers_model');
            $this->CI->load->model('frontend/Last_model');
            $data = $this->loadLanguage();

            $deals = $this->CI->Last_model->lastDeals();
            $data['deal_end_date'] = 'none';
            foreach ($deals->result() as $deal):
                $deal->image = $this->CI->Offers_model->getImageUserSelection($deal->offer_id);
                $deal->offer_name = $this->CI->Functions_model->shortText($this->CI->Offers_model->getData($deal->offer_id, 'name'), 20);
                $deal->offer_location = $this->CI->Offers_model->getData($deal->offer_id, 'location');
                $deal->offer_currency = $this->CI->Offers_model->getData($deal->offer_id, 'currency');
                $data['deal_end_date'] = $deal->end_date;
            endforeach;
            $data['deals'] = $deals;
            $data['last_curr_page'] = $this->input->post('last_curr_page');
            $this->load->view('frontend/modules/last-module/deals', $data);
        }

        private function lastOffers(){
            $this->CI->load->model('frontend/Functions_model');
            $this->CI->load->model('frontend/Users_model');
            $this->CI->load->model('frontend/Offers_model');
            $this->CI->load->model('frontend/Last_model');
            $data = $this->loadLanguage();
            
            $offers = $this->CI->Last_model->lastOffers();
            foreach ($offers->result() as $offer):
                $offer->image = $this->CI->Offers_model->getImageUserSelection($offer->id);
                $offer->date = $this->CI->Functions_model->formatDate1($offer->date_created);
                $offer->short_description = $this->CI->Functions_model->shortText($offer->description, 75);
                $offer->profile_picture = $this->CI->Users_model->getProfile($offer->user_id, 'picture');
                $offer->first_name = $this->CI->Users_model->getProfile($offer->user_id, 'first_name');
                $offer->last_name = $this->CI->Users_model->getProfile($offer->user_id, 'last_name');
            endforeach;
            $data['offers'] = $offers;
            $data['last_curr_page'] = $this->input->post('last_curr_page');
            $this->load->view('frontend/modules/last-module/offers', $data);
        }
    
        private function lastComments(){
            $this->CI->load->model('frontend/Functions_model');
            $this->CI->load->model('frontend/Users_model');
            $this->CI->load->model('frontend/Offers_model');
            $this->CI->load->model('frontend/Last_model');
            $data = $this->loadLanguage();

            $comments = $this->CI->Last_model->lastComments();
            foreach ($comments->result() as $comment):
                $comment->offer_name = $this->CI->Functions_model->shortText($this->CI->Offers_model->getData($comment->offer_id, 'name'), 20);
                $comment->image = $this->CI->Offers_model->getImageUserSelection($comment->offer_id);
                $comment->formated_date = $this->CI->Functions_model->formatDate1($comment->date);
                $comment->short_comment = $this->CI->Functions_model->shortText($comment->comment, 75);
                $comment->profile_picture = $this->CI->Users_model->getProfile($comment->user_id, 'picture');
                $comment->first_name = $this->CI->Users_model->getProfile($comment->user_id, 'first_name');
                $comment->last_name = $this->CI->Users_model->getProfile($comment->user_id, 'last_name');
                $comment->rating = $this->CI->Offers_model->getData($comment->offer_id, 'rating');
            endforeach;
            $data['comments'] = $comments;
            $data['last_curr_page'] = $this->input->post('last_curr_page');
            $this->load->view('frontend/modules/last-module/comments', $data);
        }
    }

?>