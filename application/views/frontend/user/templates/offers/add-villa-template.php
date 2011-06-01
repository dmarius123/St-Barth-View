<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/content/offers/add-villa-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Add Villa content.
*/

?>
    <h2><?=$user_add_villa_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/offers/offer-villa-location-form'); ?>
<?php $this->load->view('frontend/user/forms/offers/offer-villa-details-form'); ?>
    <input type="submit" name="submit" id="submit" class="user-area-submit-style" onclick="addVilla()" value="<?=$user_add_villa_submit?>" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />

    <div class="user-bottom"></div>