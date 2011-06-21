<?php

/*
 * Title                   : St Barth View
 * File                    : application/models/frontend/locations_model.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 16 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Locations Model.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Locations_model extends CI_Model{

        function Locations_model(){
            parent::__construct();
        }

        function getCountry($id){
            $this->db->where('id', $id);
            $query = $this->db->get('aa0_countries');
            
            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                return $row_items['name'];
            }
            else{
                return '';
            }            
        }

        function getLocationsList(){
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('aa1_locations');
            return $query;
        }

        function getLocation($id, $field){
            $this->db->where('id', $id);
            $query = $this->db->get('aa1_locations');
            $row_items = $query->row_array(0);

            return $row_items[$field];
        }

        function getLocalitiesList($location_ids){
            $where = '(';
            for ($i=0; $i<count($location_ids); $i++){
                if ($i != 0){
                    $where .= " OR aa1_id = '".$location_ids[$i]."'";
                }
                else{
                    $where .= "aa1_id = '".$location_ids[$i]."'";
                }
            }
            $where .= ')';

            $this->db->where($where);
            $this->db->order_by('name', 'asc');
            $query = $this->db->get('aa2_localities');
            return $query;
        }

        function getLocality($id, $field){
            if ($id != '0'){
                $this->db->where('id', $id);
                $query = $this->db->get('aa2_localities');
                $row_items = $query->row_array(0);

                return $row_items[$field];
            }
        }
    }

?>