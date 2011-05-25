
    <h2><?=$user_add_villa_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/offer-villa-location-form'); ?>
<?php $this->load->view('frontend/user/forms/offer-villa-details-form'); ?>
    <input type="submit" name="submit" id="submit" class="user-area-submit-style" onclick="addVilla()" value="<?=$user_add_villa_submit?>" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />

    <div class="user-bottom"></div>