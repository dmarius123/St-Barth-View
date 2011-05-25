
    <h2><?=$user_add_hotel_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/offer-hotel-location-form'); ?>
<?php $this->load->view('frontend/user/forms/offer-hotel-details-form'); ?>
<?php //$this->load->view('frontend/user/forms/offer-images-form'); ?>
<?php //$this->load->view('frontend/user/forms/offer-hotel-price-form'); ?>
    <input type="submit" name="submit" id="submit" class="user-area-submit-style" onclick="addHotel()" value="<?=$user_add_hotel_submit?>" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />

    <div class="user-bottom"></div>