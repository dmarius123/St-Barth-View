<?php

    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Functions_model extends CI_Model{

        function Functions_model(){
            parent::__construct();
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
    }

?>