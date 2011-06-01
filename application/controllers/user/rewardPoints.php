<?php

/*
 * Title                   : St Barth View
 * File                    : application/controllers/user/rewardPoints.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Reward Points Controller.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class RewardPoints extends CI_Controller{

        private $userId;

        function RewardPoints(){
            parent::__construct();
            $this->CI =& get_instance();
        }

        public function index(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['is_login'] = true;

                $data['first_name'] = $this->CI->Users_model->getProfile($this->userId, 'first_name');
                $data['last_name'] = $this->CI->Users_model->getProfile($this->userId, 'last_name');
                $data['profile_picture'] = $this->CI->Users_model->getProfile($this->userId, 'picture');

                $this->load->view('frontend/user/templates/user-admin-template', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        public function content(){
            if ($this->session->userdata('stbartsview-user')){
                $this->userId = $this->session->userdata('stbartsview-user');
                $data = $this->lang->language;

                $data['header_subtitle'] = ' - '.$data['user_dashboard_title'];
                $data['total_reward_points'] = sprintf($this->lang->line('user_reward_points_info'), $this->getTotalRewardPoints());
                $data['reward_points_list'] = $this->getRewardPointsList();

                $this->load->view('frontend/user/templates/reward-points-template', $data);
            }
            else{
                redirect('user/redirect');
            }
        }

        private function getTotalRewardPoints(){
            $this->db->select('(SELECT SUM(value) FROM reward_points) AS total_reward_points', FALSE);
            $this->db->where('user_id', $this->userId);
            $query = $this->db->get('reward_points');
            if ($query->num_rows() > 0){
                $row_items = $query->row_array(0);
                return $row_items['total_reward_points'];
            }
            else{
                return 0;
            }
        }

        private function getRewardPointsList(){
            $this->db->where('user_id', $this->userId);
            $query = $this->db->get('reward_points');
            return $query;
        }
    }

?>