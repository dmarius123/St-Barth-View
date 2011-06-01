<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/offers/add-hotel-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Add Hotel content.
*/

?>
    <h2><?=$user_add_hotel_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/offers/offer-hotel-location-form'); ?>
<?php $this->load->view('frontend/user/forms/offers/offer-hotel-details-form'); ?>
    <input type="submit" name="submit" id="submit" class="user-area-submit-style" onclick="addHotel()" value="<?=$user_add_hotel_submit?>" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />
    <div class="user-bottom"></div>