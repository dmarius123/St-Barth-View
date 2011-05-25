<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Hotel extends CI_Controller{

        private $userId;
        private $hotelId;
        private $errorColor = '#ff0000';

        function Hotel(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        private function loadLanguage(){
            $this->lang->load('frontend/general', $this->language->getLanguage());
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
                redirect('user/dashboard');
            }
            else{
                redirect('user/redirect');
            }
        }

        public function add(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->loadLanguage();
                $data['js'] = $this->loadJS();
                $data['user_id'] = $this->userId;
                $this->load->view('frontend/user/content/add-hotel-content', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function validateName(){
            $lang = $this->loadLanguage();
            if ($this->input->post('name')){
                echo $lang['user_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_hotel_details_name_invalid'].'</font>';
            }
        }

        public function validateDescription(){
            $lang = $this->loadLanguage();
            if ($this->input->post('description')){
                echo $lang['user_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_hotel_details_description_invalid'].'</font>';
            }
        }

        public function addSubmit(){
            if ($this->input->post('address')){
                $this->userId = $this->session->userdata('stbartsview-user');
                
                $this->CI->load->model('frontend/Offers_model');
                $this->CI->Offers_model->add($this->userId, 1);
            }
        }
        
        public function item(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->hotelId = $this->input->post('id');                    
                    if ($this->validHotelRequest()){
                        $this->CI->load->model('frontend/Functions_model');
                        $this->CI->load->model('frontend/Offers_model');
                        $data = $this->loadLanguage();

                        $hotel = $this->CI->Offers_model->getData($this->hotelId, 'all')->row_array(0);
                        $data['short_description'] = $this->CI->Functions_model->shortText($hotel['description'], 150);
                        $data['first_image'] = $this->CI->Offers_model->getFirstImage($hotel['id']);
                        $data['hotel'] = $hotel;
                        $this->load->view('frontend/user/templates/hotel-template', $data);
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
                    $this->hotelId = $this->input->post('id');
                    if ($this->validHotelRequest()){
                        $this->CI->load->model('frontend/Offers_model');
                        $data = $this->loadLanguage();

                        $details = $this->CI->Offers_model->getData($this->hotelId, 'all')->row_array(0);
                        $data['id'] = $this->hotelId;
                        $data['name'] = $details['name'];
                        $data['description'] = $details['description'];
                        $data['address'] = $details['alt_address'];
                        $this->load->view('frontend/user/templates/edit-hotel-details-template', $data);
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
                $this->CI->load->model('frontend/Offers_model');
                $this->CI->Offers_model->editDetails();

                $lang = $this->loadLanguage();
                echo $lang['user_edit_hotel_details_success'];
            }
        }

        public function editGallery(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->hotelId = $this->input->post('id');
                    if ($this->validHotelRequest()){
                        $this->CI->load->model('frontend/Offers_model');
                        $data = $this->loadLanguage();
                        
                        $details = $this->CI->Offers_model->getData($this->hotelId, 'all')->row_array(0);
                        $data['id'] = $this->hotelId;
                        $data['name'] = $details['name'];

                        $data['images'] = $this->CI->Offers_model->getGallery($this->hotelId);
                        $this->load->view('frontend/user/templates/edit-hotel-gallery-template', $data);
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

                $this->CI->load->model('frontend/Offers_model');
                
                $images = $this->CI->Offers_model->gallery($this->hotelId);
                $query_data = array(
                    'offer_id' => $this->hotelId,
                    'path' => base_url().$targetPath.$newName.'.'.$ext,
                    'thumb_path' => base_url().$targetPath.'thumbs/'.$newName.'.'.$ext,
                    'position' => $images->num_rows()+1
                );
                $this->db->insert('offers_images', $query_data);
                $image_id = $this->db->insert_id();

                $details = $this->CI->Offers_model->details($this->hotelId)->row_array(0);
                $query_data = array(
                    'no_images' => $details['no_images']+1
                );
                $this->db->where('id', $this->hotelId);
                $this->db->update('offers', $query_data);

                echo '<li id="image_'.$image_id.'"><img src="'.base_url().$targetPath.'thumbs/'.$newName.'.'.$ext.'" alt="" /><span class="delete" onclick="deleteImage('.$image_id.')"></span></li>';
            }
        }

        public function sortImages(){
            if ($this->input->post('data')){
                $this->CI->load->model('frontend/Offers_model');
                $lang = $this->loadLanguage();
                $this->CI->Offers_model->sortImages();
                echo $lang['user_offers_sort_images_success'];
            }
        }

        public function deleteImage(){
            if ($this->input->post('no')){
                $this->CI->load->model('frontend/Offers_model');
                $lang = $this->loadLanguage();
                $this->hotelId = $this->input->post('hotelId');
                $this->CI->Offers_model->deleteImage($this->hotelId);
                echo $lang['user_offers_delete_images_success'];
            }
        }

        public function editPricing(){
            if ($this->session->userdata('stbartsview-user')){
                if ($this->input->post('id')){
                    $this->userId = $this->session->userdata('stbartsview-user');
                    $this->hotelId = $this->input->post('id');
                    if ($this->validHotelRequest()){
                        $this->CI->load->model('frontend/Offers_model');
                        $this->CI->load->model('frontend/Hotels_model');
                        $data = $this->loadLanguage();

                        $details = $this->CI->Offers_model->getData($this->hotelId, 'all')->row_array(0);
                        $data['id'] = $this->hotelId;
                        $data['name'] = $details['name'];
                        $data['currency'] = $details['currency'];
                        $data['min_stay'] = $details['min_stay'];
                        $data['cancel_policy'] = $details['cancel_policy'];
                        $data['rooms'] = $this->CI->Hotels_model->getRooms($this->hotelId);
                        $this->load->view('frontend/user/templates/edit-hotel-pricing-template', $data);
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
            if ($this->input->post('hotelId')){
                $this->CI->load->model('frontend/Hotels_model');
                $lang = $this->loadLanguage();
                $this->CI->Hotels_model->editPricing();

                echo $lang['user_edit_hotel_pricing_edit_pricing_success'];
            }            
        }

        public function addRoom(){
            if ($this->input->post('hotelId')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->hotelId = $this->input->post('hotelId');
                $this->CI->load->model('frontend/Hotels_model');
                $lang = $this->loadLanguage();
                echo $this->CI->Hotels_model->addRoom($this->hotelId, $lang['user_edit_hotel_pricing_add_room_name']).';;'.$lang['user_edit_hotel_pricing_add_room_name'].';;'.$lang['user_edit_hotel_pricing_add_room_success'];
            }
        }

        public function showRoom(){
            if ($this->input->post('roomId')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $this->hotelId = $this->input->post('hotelId');
                if ($this->validHotelRequest()){
                    $this->CI->load->model('frontend/Hotels_model');
                    $data = $this->loadLanguage();
                    $room = $this->CI->Hotels_model->getRoom($this->input->post('roomId'))->row_array(0);
                    $data['id'] = $room['id'];
                    $data['name'] = $room['name'];
                    $data['no_rooms'] = $room['no_rooms'];
                    $data['schedule_and_pricing'] = $room['schedule_and_pricing'];
                    $data['max_allowed_people'] = $room['max_allowed_people'];
                    $this->load->view('frontend/user/forms/edit-hotel-room-form', $data);
                }
                else{
                    $this->offerContent();
                }
            }
        }

        public function editRoomSubmit(){
            if ($this->input->post('roomId')){
                $this->CI->load->model('frontend/Hotels_model');
                $lang = $this->loadLanguage();
                $this->CI->Hotels_model->editRoom();

                echo $lang['user_edit_hotel_pricing_edit_room_success'];
            }
        }

        public function deleteRoom(){
            if ($this->input->post('roomId')){
                $this->CI->load->model('frontend/Hotels_model');
                $lang = $this->loadLanguage();
                $this->CI->Hotels_model->deleteRoom();

                echo $lang['user_edit_hotel_pricing_edit_room_deleted'];
            }
        }

        public function getPricing(){
            if ($this->session->userdata('stbartsview-user')){
                $result = '';
                $this->CI->load->model('frontend/Hotels_model');
                $lang = $this->loadLanguage();
                $room = $this->CI->Hotels_model->getRoom($this->uri->segment(4))->row_array(0);

                if ($lang['general_calendar_days'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_days'].';;;;;';
                }

                if ($lang['general_calendar_months'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_months'].';;;;;';
                }

                if ($lang['general_calendar_booked'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_booked'].';;;;;';
                }

                if ($lang['general_calendar_room'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_room'].';;;;;';
                }

                if ($lang['general_calendar_rooms'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_rooms'].';;;;;';
                }
                
                if ($this->input->cookie('stbartsview-language') == 'english'){
                    $result .= '1;;;;;';
                }
                else{
                    $result .= '2;;;;;';
                }
                $result .= 'default0123456789;;;;;';
                $result .= $room['no_rooms'].';;;;;';

                if ($lang['general_calendar_availability'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_availability'].';;;;;';
                }

                if ($lang['general_calendar_price'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_price'].';;;;;';
                }

                if ($lang['general_calendar_currency_euro'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_currency_euro'].';;;;;';
                }

                if ($lang['general_calendar_submit'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_submit'].';;;;;';
                }

                if ($lang['general_calendar_closed'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_closed'].';;;;;';
                }

                if ($lang['general_calendar_reset'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_reset'].';;;;;';
                }

                if ($lang['general_calendar_exit'] == ''){
                    $result .= 'default0123456789;;;;;';
                }
                else{
                    $result .= $lang['general_calendar_exit'].';;;;;';
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
                $this->CI->load->model('frontend/Hotels_model');
                $this->CI->Hotels_model->savePricing($this->uri->segment(4));
            }
        }

        private function validHotelRequest(){
            $this->db->where('id', $this->hotelId);
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
            $data = $this->loadLanguage();
            $this->load->view('frontend/user/content/offers-content', $data);
        }
    }

?>