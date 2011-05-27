<?php

/*
 * Title                   : St Barth View
 * File                    : application/models/frontend/last_model.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Last Model.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Last_model extends CI_Model{

        function Last_model(){
            parent::__construct();
        }

        function lastDeals(){
            $this->db->order_by('date_created', 'desc');
            $query = $this->db->get('deals');

            return $query;
        }

        function lastOffers(){
            switch ($this->input->post('last_filter2')){
                case 'hotels':
                    $this->db->where('offer_type_id', 1);
                    break;
                case 'villas':
                    $this->db->where('offer_type_id', 2);
                    break;
                case 'spa':
                    $this->db->where('offer_type_id', 3);
                    break;
                case 'shopping':
                    $this->db->where('offer_type_id', 4);
                    break;
                case 'services':
                    $this->db->where('offer_type_id', 5);
                    break;
                case 'restaurants':
                    $this->db->where('offer_type_id', 6);
                    break;
            }
            $this->db->order_by('date_created', 'desc');
            $query = $this->db->get('offers');

            return $query;
        }

        function lastComments(){
            $this->db->order_by('comments.date', 'desc');            
            switch ($this->input->post('last_filter2')){
                case 'hotels':
                    $this->db->join('offers', 'comments.offer_id = offers.id');
                    $this->db->where('offers.offer_type_id', 1);
                    break;
                case 'villas':
                    $this->db->join('offers', 'comments.offer_id = offers.id');
                    $this->db->where('offers.offer_type_id', 2);
                    break;
                case 'spa':
                    $this->db->join('offers', 'comments.offer_id = offers.id');
                    $this->db->where('offers.offer_type_id', 3);
                    break;
                case 'shopping':
                    $this->db->join('offers', 'comments.offer_id = offers.id');
                    $this->db->where('offers.offer_type_id', 4);
                    break;
                case 'services':
                    $this->db->join('offers', 'comments.offer_id = offers.id');
                    $this->db->where('offers.offer_type_id', 5);
                    break;
                case 'restaurants':
                    $this->db->join('offers', 'comments.offer_id = offers.id');
                    $this->db->where('offers.offer_type_id', 6);
                    break;
            }
            $query = $this->db->get('comments');

            return $query;
        }
    }

?>