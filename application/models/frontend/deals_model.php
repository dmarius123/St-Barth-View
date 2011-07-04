<?php

/*
 * Title                   : St Barth View
 * File                    : application/models/frontend/deals_model.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Deals Model.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Deals_model extends CI_Model{

        function Deals_model(){
            parent::__construct();
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
    }

?>