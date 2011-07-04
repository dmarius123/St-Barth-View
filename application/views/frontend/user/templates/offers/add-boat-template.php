<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/offers/add-boat-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Add Boat content.
*/

?>
    <h2><?=$user_add_boat_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/offers/offer-location-form'); ?>
<?php $this->load->view('frontend/user/forms/offers/offer-details-form'); ?>
    <input type="submit" name="submit" id="submit" class="user-area-submit-style" onclick="user_addBoat()" value="<?=$user_add_boat_submit?>" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; user_parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />
    <div class="user-bottom"></div>