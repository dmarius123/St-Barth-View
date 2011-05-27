<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/villa.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
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
                $data = $this->loadLanguage();
                $data['js'] = $this->loadJS();
                $data['user_id'] = $this->userId;
                $this->load->view('frontend/user/content/add-villa-content', $data);
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
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_villa_details_name_invalid'].'</font>';
            }
        }

        public function validateDescription(){
            $lang = $this->loadLanguage();
            if ($this->input->post('description')){
                echo $lang['user_mandatory_field'];
            }
            else{
                echo '<font style="color:'.$this->errorColor.';">'.$lang['user_villa_details_description_invalid'].'</font>';
            }
        }

        public function addSubmit(){
            if ($this->input->post('address')){
                $this->userId = $this->session->userdata('stbartsview-user');

                $this->CI->load->model('frontend/Offers_model');
                $this->CI->Offers_model->add($this->userId, 2);
            }
        }

        public function uploadify(){
            if (!empty($_FILES)){
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $targetPath = 'content/offers-images/';
                $ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);

                $len = 64;
                $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
                $max = strlen($base)-1;
                $newName = '';
                mt_srand((double)microtime()*1000000);
                while (strlen($newName)<$len) $newName .= $base{mt_rand(0,$max)};

                $targetFile =  str_replace('//', '/', $targetPath).$newName.'.'.$ext;
                move_uploaded_file($tempFile, $targetFile);

                echo base_url().$targetPath.$newName.'.'.$ext;
            }
        }
    }

?>