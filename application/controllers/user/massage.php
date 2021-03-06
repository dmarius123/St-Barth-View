<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/massage.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Massage Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Massage extends CI_Controller{

        private $userId;
        private $massageId;
        private $errorColor = '#ff0000';

        function Massage(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                redirect('user/dashboard');
            }
            else{
                redirect('user/redirect');
            }
        }

        public function add(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->lang->language;
                $data['user_add_offer_location_title'] = $this->lang->line('user_add_massage_location_title');
                $data['user_add_offer_location_info'] = $this->lang->line('user_add_massage_location_info');
                $data['user_add_offer_alternative_address'] = $this->lang->line('user_add_massage_alternative_address');
                $data['user_add_offer_details_title'] = $this->lang->line('user_add_massage_details_title');
                $data['user_offer_details_name'] = $this->lang->line('user_massage_details_name');
                $data['user_offer_details_description'] = $this->lang->line('user_massage_details_description');

                $data['user_id'] = $this->userId;

                $locations_list = $this->CI->Locations_model->getLocationsList();
                foreach ($locations_list->result() as $location):
                    if ($location->aa0_id == 0){
                        $location->country = 'none';
                    }
                    else{
                        $location->country = $this->CI->Locations_model->getCountry($location->aa0_id);
                    }
                endforeach;
                $data['locations_list'] = $locations_list;

                $this->load->view('frontend/user/templates/offers/add-massage-template', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function validateName(){
            if ($this->input->post('name')){
                echo $this->lang->line('user_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('user_massage_details_name_invalid').'</font>';
            }
        }

        public function validateDescription(){
            if ($this->input->post('description')){
                echo $this->lang->line('user_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('user_massage_details_description_invalid').'</font>';
            }
        }

        public function addSubmit(){
            if ($this->input->post('address')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->CI->Offers_model->add($this->userId, 1);
            }
        }

        public function item(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->massageId = $this->input->post('id');

                    if ($this->validMassageRequest()){
                        $data = $this->lang->language;

                        $massage = $this->CI->Offers_model->getData($this->massageId, 'all')->row_array(0);

                        $massage['short_description'] = $this->CI->Functions_model->shortText($massage['description'], 150);
                        $massage['first_image'] = $this->CI->Offers_model->getFirstImage($massage['id']);
                        $massage['no_deals'] = $this->CI->Offers_model->getNoDeals($massage['id']);
                        $data['massage'] = $massage;


                        $this->load->view('frontend/user/templates/offers/massages/massage-template', $data);
                    }
                    else{
                        $this->offerContent();
                    }
                }
            }
            else{
                redirect('user/redirect');
            }
        }

        public function editDetails(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->massageId = $this->input->post('id');

                    if ($this->validMassageRequest()){
                        $data = $this->lang->language;

                        $details = $this->CI->Offers_model->getData($this->massageId, 'all')->row_array(0);

                        $data['id'] = $this->massageId;
                        $data['name'] = $details['name'];
                        $data['description'] = $details['description'];
                        $data['locations'] = $details['locations'];
                        $data['offer_amenities'] = $details['amenities'];
                        $data['address'] = $details['alt_address'];

                        $data['amenities'] = $this->CI->Offers_model->getAmenities(1);

                        $this->load->view('frontend/user/templates/offers/massages/edit-massage-details-template', $data);
                    }
                    else{
                        $this->offerContent();
                    }
                }
            }
            else{
                redirect('user/redirect');
            }
        }

        public function editDetailsSubmit(){
            if ($this->input->post('id')){
                $this->CI->Offers_model->editDetails();
                echo $this->lang->line('user_edit_massage_details_success');
            }
        }

        public function editGallery(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->massageId = $this->input->post('id');

                    if ($this->validMassageRequest()){
                        $data = $this->lang->language;

                        $details = $this->CI->Offers_model->getData($this->massageId, 'all')->row_array(0);

                        $data['id'] = $this->massageId;
                        $data['name'] = $details['name'];
                        $data['images'] = $this->CI->Offers_model->getGallery($this->massageId);

                        $this->load->view('frontend/user/templates/offers/massages/edit-massage-gallery-template', $data);
                    }
                    else{
                        $this->offerContent();
                    }
                }
            }
            else{
                redirect('user/redirect');
            }
        }

        public function uploadify(){
            if (!empty($_FILES)){
                $this->massageId = $this->uri->segment(4);
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $targetPath = 'content/offers-images/';
                $ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);

                $len = 60;
                $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
                $max = strlen($base)-1;
                $newName = '';
                mt_srand((double)microtime()*1000000);
                while (strlen($newName)<$len) $newName .= $base{mt_rand(0,$max)};

                $targetFile =  str_replace('//', '/', $targetPath).$newName.'.'.$ext;
                move_uploaded_file($tempFile, $targetFile);

                // File and new size
                $filename = $targetPath.$newName.'.'.$ext;

                // Get new sizes
                list($width, $height) = getimagesize($filename);
                if ($width > $height){
                    $newheight = 100;
                    $newwidth = $width*$newheight/$height;
                }
                else{
                    $newwidth = 100;
                    $newheight = $width*$newwidth/$height;
                }

                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                if ($ext == 'png') $source = imagecreatefrompng($filename);
                else $source = imagecreatefromjpeg($filename);

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                // Output
                if ($ext == 'png') $source = imagepng($thumb, $targetPath.'thumbs/'.$newName.'.'.$ext);
                else $source = imagejpeg($thumb, $targetPath.'thumbs/'.$newName.'.'.$ext);

                $images = $this->CI->Offers_model->getGallery($this->massageId);
                $query_data = array(
                    'offer_id' => $this->massageId,
                    'path' => base_url().$targetPath.$newName.'.'.$ext,
                    'thumb_path' => base_url().$targetPath.'thumbs/'.$newName.'.'.$ext,
                    'position' => $images->num_rows()+1
                );
                $this->db->insert('offers_images', $query_data);
                $image_id = $this->db->insert_id();

                $details = $this->CI->Offers_model->getData($this->massageId, 'all')->row_array(0);
                $query_data = array(
                    'no_images' => $details['no_images']+1
                );
                $this->db->where('id', $this->massageId);
                $this->db->update('offers', $query_data);

                echo '<li id="image_'.$image_id.'"><img src="'.base_url().$targetPath.'thumbs/'.$newName.'.'.$ext.'" alt="" /><span class="delete" onclick="user_deleteImage('.$image_id.')"></span></li>';
            }
        }

        public function sortImages(){
            if ($this->input->post('data')){
                $this->CI->Offers_model->sortImages();
                echo $this->lang->line('user_offers_sort_images_success');
            }
        }

        public function deleteImage(){
            if ($this->input->post('no')){
                $this->massageId = $this->input->post('massageId');
                $this->CI->Offers_model->deleteImage($this->massageId);
                echo $this->lang->line('user_offers_delete_images_success');
            }
        }

        public function editPricing(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->massageId = $this->input->post('id');
                    if ($this->validMassageRequest()){
                        $data = $this->lang->language;

                        $details = $this->CI->Offers_model->getData($this->massageId, 'all')->row_array(0);

                        $data['id'] = $this->massageId;
                        $data['name'] = $details['name'];
                        $data['currency'] = $details['currency'];
                        $data['min_stay'] = $details['min_stay'];
                        $data['cancel_policy'] = $details['cancel_policy'];
                        $data['rooms'] = $this->CI->Massages_model->getRooms($this->massageId);

                        $this->load->view('frontend/user/templates/offers/massages/edit-massage-pricing-template', $data);
                    }
                    else{
                        $this->offerContent();
                    }
                }
            }
            else{
                redirect('user/redirect');
            }
        }

        public function editPricingSubmit(){
            if ($this->input->post('massageId')){
                $this->CI->Massages_model->editPricing();
                echo $this->lang->line('user_edit_massage_pricing_edit_pricing_success');
            }
        }

        public function addRoom(){
            if ($this->input->post('massageId')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->massageId = $this->input->post('massageId');
                echo $this->CI->Massages_model->addRoom($this->massageId, $this->lang->line('user_edit_massage_pricing_add_room_name')).';;'.$this->lang->line('user_edit_massage_pricing_add_room_name').';;'.$this->lang->line('user_edit_massage_pricing_add_room_success');
            }
        }

        public function showRoom(){
            if ($this->input->post('roomId')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->massageId = $this->input->post('massageId');
                if ($this->validMassageRequest()){
                    $data = $this->lang->language;

                    $room = $this->CI->Massages_model->getRoom($this->input->post('roomId'))->row_array(0);

                    $data['id'] = $room['id'];
                    $data['name'] = $room['name'];
                    $data['no_rooms'] = $room['no_rooms'];
                    $data['schedule_and_pricing'] = $room['schedule_and_pricing'];
                    $data['max_allowed_people'] = $room['max_allowed_people'];

                    $this->load->view('frontend/user/forms/offers/massages/edit-massage-room-form', $data);
                }
                else{
                    $this->offerContent();
                }
            }
        }

        public function editRoomSubmit(){
            if ($this->input->post('roomId')){
                $this->CI->Massages_model->editRoom();
                echo $this->lang->line('user_edit_massage_pricing_edit_room_success');
            }
        }

        public function deleteRoom(){
            if ($this->input->post('roomId')){
                $this->CI->Massages_model->deleteRoom();
                echo $this->lang->line('user_edit_massage_pricing_edit_room_deleted');
            }
        }

        public function getPricing(){
            if ($this->session->userdata('stbartsview-user')){
                $result = '';
                $room = $this->CI->Massages_model->getRoom($this->uri->segment(4))->row_array(0);

                if ($this->lang->line('general_calendar_days') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_days').';;;;;';
                }

                if ($this->lang->line('general_calendar_months') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_months').';;;;;';
                }

                if ($this->lang->line('general_calendar_booked') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_booked').';;;;;';
                }

                if ($this->lang->line('general_calendar_room') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_room').';;;;;';
                }

                if ($this->lang->line('general_calendar_rooms') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_rooms').';;;;;';
                }

                if ($this->input->cookie('stbartsview-language') == 'english'){
                    $result .= '1;;;;;';
                }
                else{
                    $result .= '2;;;;;';
                }
                $result .= 'default0123456789;;;;;';
                $result .= $room['no_rooms'].';;;;;';

                if ($this->lang->line('general_calendar_availability') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_availability').';;;;;';
                }

                if ($this->lang->line('general_calendar_price') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_price').';;;;;';
                }

                if ($this->lang->line('general_calendar_currency_euro') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_currency_euro').';;;;;';
                }

                if ($this->lang->line('general_calendar_submit') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_submit').';;;;;';
                }

                if ($this->lang->line('general_calendar_closed') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_closed').';;;;;';
                }

                if ($this->lang->line('general_calendar_reset') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_reset').';;;;;';
                }

                if ($this->lang->line('general_calendar_exit') == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $this->lang->line('general_calendar_exit').';;;;;';
                }

                if ($room['schedule_and_pricing'] == ''){
                    $result .= 'default0123456789';
                }
                else{
                    $result .= $room['schedule_and_pricing'];
                }

                echo $result;
            }
        }

        public function savePricing(){
            if ($this->input->post('dop_booking_calendar')){
                $this->CI->Massages_model->savePricing($this->uri->segment(4));
            }
        }

        private function validMassageRequest(){
            $this->db->where('id', $this->massageId);
            $query = $this->db->get('offers');

            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                if ($row_items['user_id'] == $this->userId){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

        private function offerContent(){
            $data = $this->lang->language;
            $this->load->view('frontend/user/templates/offers/offers-template', $data);
        }
    }

?>