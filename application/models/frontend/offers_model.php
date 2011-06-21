<?php

/*
 * Title                   : St Barth View
 * File                    : application/models/frontend/offers_model.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 19 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers Model.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Offers_model extends CI_Model{

        function Offers_model(){
            parent::__construct();
        }

// Add, Edit & Delete
        function add($userId, $type){
            $query_data = array(
               'user_id' => $userId,
               'offer_type_id' => $type,
               'name' => $this->input->post('name'),
               'description' => $this->input->post('description'),
               'coordinates' => $this->extractCoordinates($this->input->post('coordinates')),
               'address' => $this->input->post('address'),
               'location_id' => $this->input->post('location_id'),
               'locality_id' => $this->validateLocality($this->input->post('locality'), $this->input->post('location_id')),
               'alt_address' => $this->input->post('alt_address')
            );
            $this->db->insert('offers', $query_data);
        }

        function editDetails(){
            $query_data = array(
                'name' => $this->input->post('name'),
                'alt_address' => $this->input->post('alt_address'),
                'description' => $this->input->post('description'),
                'amenities' => $this->input->post('amenities')
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('offers', $query_data);
        }

        function sortImages(){
            $images = explode(';;', $this->input->post('data'));

            for ($i=1; $i<=count($images); $i++){
                $query_data = array(
                    'position' => $i
                );
                $this->db->where('id', $images[$i-1]);
                $this->db->update('offers_images', $query_data);
            }
        }

        public function deleteImage($id){
            $this->db->where('id', $this->input->post('no'));
            $query = $this->db->get('offers_images');
            $row_items = $query->row_array(0);
            $position = $row_items['position'];
            $image_path_pieces = explode(base_url(), $row_items['path']);
            $thumb_path_pieces = explode(base_url(), $row_items['thumb_path']);
            $image_path = $image_path_pieces[1];
            $thumb_path = $thumb_path_pieces[1];

            $this->db->where('id', $this->input->post('no'));
            $this->db->delete('offers_images');
            unlink($image_path);
            unlink($thumb_path);

            $images = $this->getGallery($id);

            foreach ($images->result() as $image):
                if($image->position > $position){
                    $newPosition = $image->position-1;
                    $query_data = array(
                        'position' => $newPosition
                    );
                    $this->db->where('id', $image->id);
                    $this->db->update('offers_images', $query_data);
                }
            endforeach;

            $details = $this->getData($id, 'all')->row_array(0);
            $query_data = array(
                'no_images' => $details['no_images']-1
            );
            $this->db->where('id', $id);
            $this->db->update('offers', $query_data);
        }

// Search
        function search(){
            if ($this->input->post('location') != ''){
                $locations = $this->input->post('location');
                $where = '(';

                for ($i=0; $i<count($locations); $i++){
                    if ($i != 0){
                        $where .= " OR location_id = '".$locations[$i]."'";
                    }
                    else{
                        $where .= "location_id = '".$locations[$i]."'";
                    }
                }
                $where .= ')';
                $this->db->where($where);
            }

            if ($this->input->post('locality') != ''){
                $localities = $this->input->post('locality');
                $where = '(';

                for ($i=0; $i<count($localities); $i++){
                    if ($i != 0){
                        $where .= " OR locality_id = '".$localities[$i]."'";
                    }
                    else{
                        $where .= "locality_id = '".$localities[$i]."'";
                    }
                }
                $where .= ')';
                $this->db->where($where);
            }

            $this->db->where('offer_type_id', $this->input->post('category'));            

            switch ($this->input->post('sort_by')){
                case 'score':
                    $this->db->order_by('rating desc, date_created desc');
                    break;
                case 'date':
                    $this->db->order_by('date_created', 'desc');
                    break;
                case 'price':
                    $this->db->order_by('start_price asc, date_created desc');
                    break;
                case 'comments':
                    $this->db->order_by('no_comments desc, date_created desc');
                    break;
                case 'friends':
                    $this->db->order_by('no_friends desc, date_created desc');
                    break;
                case 'deals':
                    $this->db->order_by('no_deals desc, date_created desc');
                    break;
                case 'wow':
                    $this->db->order_by('wow desc, date_created desc');
                    break;
            }

            $query = $this->db->get('offers');

            return $query;
        }

// Get Lists
        function getHotelsList($userId){
            if ($userId != 'all'){
                $this->db->where('user_id', $userId);
            }
            $this->db->where('offer_type_id', 1);
            $this->db->order_by('name');
            $query = $this->db->get('offers');
            return $query;
        }

        function getVillasList($userId){
            if ($userId != 'all'){
                $this->db->where('user_id', $userId);
            }
            $this->db->where('offer_type_id', 2);
            $this->db->order_by('name');
            $query = $this->db->get('offers');
            return $query;
        }

        function getSpaBeautyList($userId){
            if ($userId != 'all'){
                $this->db->where('user_id', $userId);
            }
            $this->db->where('offer_type_id', 3);
            $this->db->order_by('name');
            $query = $this->db->get('offers');
            return $query;
        }

        function getShoppingList($userId){
            if ($userId != 'all'){
                $this->db->where('user_id', $userId);
            }
            $this->db->where('offer_type_id', 4);
            $this->db->order_by('name');
            $query = $this->db->get('offers');
            return $query;
        }

        function getServicesList($userId){
            if ($userId != 'all'){
                $this->db->where('user_id', $userId);
            }
            $this->db->where('offer_type_id', 5);
            $this->db->order_by('name');
            $query = $this->db->get('offers');
            return $query;
        }

        function getRestaurantsList($userId){
            if ($userId != 'all'){
                $this->db->where('user_id', $userId);
            }
            $this->db->where('offer_type_id', 6);
            $this->db->order_by('name');
            $query = $this->db->get('offers');
            return $query;
        }

// Get Data
        function getData($id, $field){
            $this->db->where('id', $id);
            $query = $this->db->get('offers');
            $row_items = $query->row_array(0);

            switch ($field){
                case 'name':
                    return $row_items['name'];
                    break;
                case 'description':
                    return $row_items['description'];
                    break;
                case 'coordinates':
                    return $row_items['coordinates'];
                    break;
                case 'address':
                    return $row_items['address'];
                    break;
                case 'location_id':
                    return $row_items['location_id'];
                    break;
                case 'locality_id':
                    return $row_items['locality_id'];
                    break;
                case 'alt_address':
                    return $row_items['alt_address'];
                    break;
                case 'status':
                    return $row_items['status'];
                    break;
                case 'no_images':
                    return $row_items['no_images'];
                    break;
                case 'start_price':
                    return $row_items['start_price'];
                    break;
                case 'rating':
                    return $row_items['rating'];
                    break;
                case 'no_comments':
                    return $row_items['no_comments'];
                    break;
                case 'no_likes':
                    return $row_items['no_likes'];
                    break;
                case 'no_deals':
                    return $row_items['no_deals'];
                    break;
                case 'currency':
                    return $row_items['currency'];
                    break;
                case 'min_stay':
                    return $row_items['min_stay'];
                    break;
                case 'cancel_policy':
                    return $row_items['cancel_policy'];
                    break;
                case 'wow':
                    return $row_items['wow'];
                    break;
                case 'image_user_selection':
                    return $row_items['image_user_selection'];
                    break;
                case 'image_admin_selection':
                    return $row_items['image_admin_selection'];
                    break;
                case 'date_created':
                    return $row_items['date_created'];
                    break;
                default: return $query;
            }            
        }

        function getLastComment($id){
            $this->db->where('offer_id', $id);
            $this->db->order_by('date', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('comments');
            return $query;
        }

        function getGallery($id){
            $this->db->where('offer_id', $id);
            $this->db->order_by('position');
            $query = $this->db->get('offers_images');
            return $query;
        }

        function getFirstImage($id){
            $this->db->where('offer_id', $id);
            $this->db->where('position', 1);
            $query = $this->db->get('offers_images');

            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                return $row_items['path'];
            }
            else{
                return 'none';
            }
        }

        function getImageUserSelection($id){
            $this->db->where('id', $id);
            $query = $this->db->get('offers');
            $row_items = $query->row_array(0);
            if ($row_items['image_user_selection'] != 0){
                $this->db->where('id', $row_items['image_user_selection']);
                $query = $this->db->get('offers_images');
                $row_items = $query->row_array(0);
                return $row_items['path'];
            }
            else{
                return $this->getFirstImage($id);
            }
        }

        function getImageAdminSelection($id){
            $this->db->where('id', $id);
            $query = $this->db->get('offers_images');
            $row_items = $query->row_array(0);
            if ($row_items['image_admin_selection'] != 0){
                $this->db->where('id', $row_items['image_admin_selection']);
                $query = $this->db->get('offers_images');
                $row_items = $query->row_array(0);
                return $row_items['path'];                
            }
            else{
                return $this->getFirstImage($id);
            }
        }
    
// Functions
        function validateLocality($locality, $location_id){
            if ($locality != 'none'){
                $this->db->where('name', $locality);
                $query = $this->db->get('aa2_localities');

                if ($query->num_rows > 0){
                    $row_items = $query->row_array(0);
                    return $row_items['id'];
                }
                else{
                    $query_data = array(
                        'aa1_id' => $location_id,
                        'name' => $locality
                    );
                    $this->db->insert('aa2_localities', $query_data);
                    return $this->db->insert_id();
                }
            }
            else{
                return 0;
            }
        }

        function extractCoordinates($coordinates){
            $pieces = explode(', ', $coordinates);
            $lat = explode('(', $pieces[0]);
            $lng = explode(')', $pieces[1]);

            return $lat[1].','.$lng[0];
        }
    
        function getAmenities($offer_type){
            $this->db->where('offer_type_filter_id', $offer_type);
            $query = $this->db->get('offers_types_filters_values');
            return $query;
        }
    }

?>