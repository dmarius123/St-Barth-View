<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Users_model extends CI_Model{

        function Users_model(){
            parent::__construct();
        }

// Get Data
        function getEmail($id){
            $this->db->where('id', $id);
            $query = $this->db->get('users');
            $row_items = $query->row_array(0);
            return $row_items['email'];
        }

        function getProfile($id, $field){
            $this->db->where('user_id', $id);
            $query = $this->db->get('profiles');
            $row_items = $query->row_array(0);

            switch ($field){
                case 'first_name':
                    return $row_items['first_name'];
                    break;
                case 'last_name':
                    return $row_items['last_name'];
                    break;
                case 'picture':
                    return $row_items['picture'];
                    break;
                case 'description':
                    return $row_items['description'];
                    break;
                case 'phone':
                    return $row_items['phone'];
                    break;
            }
        }

        function getNewUsers(){
            $this->db->order_by("date_created", "desc");
            $this->db->limit(15);
            $this->db->where('status', 'verified');
            $users = $this->db->get('users');

            foreach ($users->result() as $user):
                $user->profile_picture = $this->getProfile($user->id, 'picture');
                $user->first_name = $this->getProfile($user->id, 'first_name');
                $user->last_name = $this->getProfile($user->id, 'last_name');
            endforeach;
            
            return $users;
        }
    }

?>