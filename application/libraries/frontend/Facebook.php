<?php

/*
 * Title                   : St Barth View
 * File                    : application/libraries/frontend/Facebook.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : JavaScript distribution Library.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Facebook{

        private $appID = '148099351923386';
        private $appSecret = 'd4c11b4aa8dcfb9c232efb51b8c30538';
        private $cookie;
        private $user;

        function Facebook(){
            if (isset($_COOKIE['fbs_'.$this->appID])){
                $this->cookie = $this->getFacebookCookie($this->appID, $this->appSecret);
                $fb_content = file_get_contents('https://graph.facebook.com/me?access_token='.$this->cookie['access_token']);
                if ($fb_content === false){
                    //echo 'ok';
                } else {
                    $this->user = json_decode($fb_content);
                }             
            }
        }

        public function index(){
        }

        public function getUser(){
            return $this->user;
        }

        public function getCookie(){
            return $this->cookie;
        }

        public function getAppID(){
            return $this->appID;
        }

        private function getFacebookCookie($app_id, $app_secret){
            $args = array();
            parse_str(trim($_COOKIE['fbs_'.$app_id], '\\"'), $args);
            ksort($args);
            $payload = '';

            foreach ($args as $key => $value){
                if ($key != 'sig'){
                    $payload .= $key . '=' . $value;
                }
            }
            if (md5($payload.$app_secret) != $args['sig']){
                return null;
            }
            return $args;
        }
    }

?>