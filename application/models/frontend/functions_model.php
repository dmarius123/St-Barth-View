<?php

/*
 * Title                   : St Barth View
 * File                    : application/models/frontend/functions_model.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Functions Model.
*/

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Functions_model extends CI_Model{

        function Functions_model(){
            parent::__construct();
        }

        function formatDate1($date){
            $date_pieces = explode(' ', $date);
            $year_pieces = explode('-', $date_pieces[0]);
            $time_pieces = explode(':', $date_pieces[1]);
            if ($this->input->cookie('stbartsview-language') == 'english'){
                return $year_pieces[1].'/'.$year_pieces[2].'/'.$year_pieces[0].' - '.$time_pieces[0].':'.$time_pieces[1];
            }
            else{
                return $year_pieces[2].'/'.$year_pieces[1].'/'.$year_pieces[0].' - '.$time_pieces[0].':'.$time_pieces[1];
            }
        }

        function shortText($text, $size){
            $shortText = '';
            $words = explode(' ', $text);

            for ($i=0; $i<count($words); $i++){
                if (strlen($shortText) > $size){
                    return $shortText.' ...';
                }
                else{
                    $shortText .= $words[$i].' ';
                }
            }

            return $shortText;
        }

        function validEmail($email){
            if (preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)){
                return true;
            }
            else{
                return false;
            }
        }
    }

?>