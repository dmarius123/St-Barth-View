<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/villa.php
 * File Version            : 1.2
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Villa Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Villa extends CI_Controller{

        private $userId;
        private $errorColor = '#ff0000';

        function Villa(){
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
                $data['user_add_offer_location_title'] = $this->lang->line('user_add_villa_location_title');
                $data['user_add_offer_location_info'] = $this->lang->line('user_add_villa_location_info');
                $data['user_add_offer_alternative_address'] = $this->lang->line('user_add_villa_alternative_address');
                $data['user_add_offer_details_title'] = $this->lang->line('user_add_villa_details_title');
                $data['user_offer_details_name'] = $this->lang->line('user_villa_details_name');
                $data['user_offer_details_description'] = $this->lang->line('user_villa_details_description');

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
                
                $this->load->view('frontend/user/templates/offers/add-villa-template', $data);
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
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('user_villa_details_name_invalid').'</font>';
            }
        }

        public function validateDescription(){
            if ($this->input->post('description')){
                echo $this->lang->line('user_mandatory_field');
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$this->lang->line('user_villa_details_description_invalid').'</font>';
            }
        }

        public function addSubmit(){
            if ($this->input->post('address')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->CI->Offers_model->add($this->userId, 2);
            }
        }

        public function item(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->villaId = $this->input->post('id');

                    if ($this->validVillaRequest()){
                        $data = $this->lang->language;

                        $villa = $this->CI->Offers_model->getData($this->villaId, 'all')->row_array(0);

                        $villa['short_description'] = $this->CI->Functions_model->shortText($villa['description'], 150);
                        $villa['first_image'] = $this->CI->Offers_model->getFirstImage($villa['id']);
                        $villa['first_image'] = $this->CI->Offers_model->getNoDeals($villa['id']);
                        $data['villa'] = $villa;

                        $this->load->view('frontend/user/templates/offers/villas/villa-template', $data);
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
                    $this->villaId = $this->input->post('id');

                    if ($this->validVillaRequest()){
                        $data = $this->lang->language;

                        $details = $this->CI->Offers_model->getData($this->villaId, 'all')->row_array(0);

                        $data['id'] = $this->villaId;
                        $data['name'] = $details['name'];
                        $data['description'] = $details['description'];
                        $data['locations'] = $details['locations'];
                        $data['offer_amenities'] = $details['amenities'];
                        $data['address'] = $details['alt_address'];

                        $data['amenities'] = $this->CI->Offers_model->getAmenities(2);

                        $this->load->view('frontend/user/templates/offers/villas/edit-villa-details-template', $data);
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
                echo $this->lang->line('user_edit_villa_details_success');
            }
        }

        public function editGallery(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->villaId = $this->input->post('id');

                    if ($this->validVillaRequest()){
                        $data = $this->lang->language;

                        $details = $this->CI->Offers_model->getData($this->villaId, 'all')->row_array(0);

                        $data['id'] = $this->villaId;
                        $data['name'] = $details['name'];
                        $data['images'] = $this->CI->Offers_model->getGallery($this->villaId);

                        $this->load->view('frontend/user/templates/offers/villas/edit-villa-gallery-template', $data);
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
                $this->hotelId = $this->uri->segment(4);
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

                $images = $this->CI->Offers_model->getGallery($this->villaId);
                $query_data = array(
                    'offer_id' => $this->villaId,
                    'path' => base_url().$targetPath.$newName.'.'.$ext,
                    'thumb_path' => base_url().$targetPath.'thumbs/'.$newName.'.'.$ext,
                    'position' => $images->num_rows()+1
                );
                $this->db->insert('offers_images', $query_data);
                $image_id = $this->db->insert_id();

                $details = $this->CI->Offers_model->getData($this->villaId, 'all')->row_array(0);
                $query_data = array(
                    'no_images' => $details['no_images']+1
                );
                $this->db->where('id', $this->villaId);
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
                $this->villaId = $this->input->post('villaId');
                $this->CI->Offers_model->deleteImage($this->villaId);
                echo $this->lang->line('user_offers_delete_images_success');
            }
        }

        private function validVillaRequest(){
            $this->db->where('id', $this->villaId);
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
    }

?>