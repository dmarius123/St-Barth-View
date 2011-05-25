<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Hotels_model extends CI_Model{

        function Hotels_model(){
            parent::__construct();
        }

        function editPricing(){
            $query_data = array(
                'currency' => $this->input->post('currency'),
                'min_stay' => $this->input->post('min_stay'),
                'cancel_policy' => $this->input->post('cancel_policy')
            );
            $this->db->where('id', $this->input->post('hotelId'));
            $this->db->update('offers', $query_data);
        }

        function editRoom(){
            $query_data = array(
                'name' => $this->input->post('name'),
                'no_rooms' => $this->input->post('no_rooms'),
                'max_allowed_people' => $this->input->post('max_allowed_people')
            );
            $this->db->where('id', $this->input->post('roomId'));
            $this->db->update('offers_hotel_rooms', $query_data);
        }

        function deleteRoom(){
            $this->db->where('id', $this->input->post('roomId'));
            $this->db->delete('offers_hotel_rooms');
        }

        function addRoom($hotelId, $name){
            $query_data = array(
                'hotel_id' => $hotelId,
                'name' => $name
            );
            $this->db->insert('offers_hotel_rooms', $query_data);

            return $this->db->insert_id();
        }

        function getRooms($hotelId){
            $this->db->where('hotel_id', $hotelId);
            $this->db->order_by('id');
            $query = $this->db->get('offers_hotel_rooms');
            return $query;
        }

        function getRoom($roomId){
            $this->db->where('id', $roomId);
            $query = $this->db->get('offers_hotel_rooms');
            return $query;
        }

        function savePricing($roomId){
            $this->db->set('schedule_and_pricing', $this->input->post('dop_booking_calendar'));
            $this->db->where('id', $roomId);
            $this->db->update('offers_hotel_rooms');
        }
    }

?>