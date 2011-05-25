
    <h2><?=$user_offers_title?></h2>
    <span class="title-separator"></span>
    <input type="button" name="add-hotel" index="add-hotel" class="user-area-submit-style" value="<?=$user_add_hotel?>" onClick="parent.location = '#add-hotel'; parseContent()">
    <input type="button" name="add-villa" index="add-villa" class="user-area-submit-style" value="<?=$user_add_villa?>" onClick="parent.location = '#add-villa'; parseContent()">
    <br class="clear" />
<?php //$this->load->view('frontend/user/lists/hotels-list'); ?>
<?php //$this->load->view('frontend/user/lists/villas-list'); ?>
    <div class="user-bottom"></div>