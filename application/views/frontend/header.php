<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/header.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Header Section.
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?=$header_title?><?=$header_subtitle?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/gui/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/gui/css/fullcalendar.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/gui/css/fullcalendar.print.css" />

        <script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false&amp;key=ABQIAAAAs3IS16FqClJrvuY8j7iJsxRac1StWoOj8S9kJuUUUouEfBlwnxRWLOOuaGrrwmELKOoH4N71mpGAXg"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.mousewheel.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.jscrollpane.min.js'; ?>"></script>
        <script type="text/JavaScript">
            var BASE_URL = "<?=base_url()?>";
        </script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.countdown.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.dop.ImageLoader.min.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.dop.ThumbnailGallery.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.dop.BookingCalendar.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/jquery.uploadify.min.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/libraries/js/swfobject.js'; ?>"></script>

        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/google-maps-api.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/main.js'; ?>"></script>
        
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/last-module.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/new-users-module.js'; ?>"></script>

        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/home.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/search.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/offer.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/sign-upin.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/user.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/fullcalendar.min.js'; ?>"></script>
        <script type="text/JavaScript" src="<?php echo base_url().'assets/frontend/js/fullcalendar-deals.js'; ?>"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="top-bar"></div>
            <div id="header">
                <div id="logo"><a href="<?=base_url()?>" target="_self"></a></div>
                <div id="header-content">
                    <div id="header-content-top">
                        <div id="header-promo-link">
                            <a href=""><span class="text">OWNERS, Publish your Villas, Hotels, Services... it's FREE!</span><span class="end"></span></a>
                        </div>
    <?php
        if (isset($is_login)){
            if ($is_login){
                $this->load->view('frontend/user/header/sign-in-navigation');
            }
            else{
                $this->load->view('frontend/user/header/no-sign-in-navigation');
            }
        }
        else{
            $this->load->view('frontend/user/header/no-sign-in-navigation');
        }
    ?>
    <br class="clear" />
                    </div>
                    <div id="header-content-bottom">
                        <div id="header-search">
                            <form action="" method="post">
                            <label>find, share, save</label><br />
                            <input type="text" id="header-search-input" name="header-search-input"/>
                            <input type="submit" id="header-search-submit" value="ok"/>
                            </form>
                        </div>
                        <div id="header-weather">
                            <div class="header-weather-title">St Barth</div>
                            <a class="header-weather-left-nav1"></a><a class="header-weather-right-nav1"></a>
                            <div class="header-weather-day">Monday 17<span class="sup">st</span> <span class="time">- 10:30 am</span></div>
                            <a class="header-weather-left-nav2"></a><a class="header-weather-right-nav2"></a>
                            <div class="header-weather-icon">
                                <img src="<?php echo base_url()?>assets/frontend/gui/images/weather_icon1.png" alt="" />
                                <span class="header-weather-temp">25&#176; C</span><br />
                                <span class="header-weather-temp-alt">87&#176; F</span>
                                <br class="clear" />
                            </div>
                        </div>
                        <br class="clear" />
                    </div>
                </div>
            </div>