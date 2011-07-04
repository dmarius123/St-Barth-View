<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/offer-template.php
 * File Version            : 1.4
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Template.
*/

?>
<?php $this->load->view('frontend/header'); ?>
<script type="text/JavaScript">
    currPage = 'Offer';
</script>
    <div id="section" class="offer-section">
        <input type="hidden" id="offer_id" name="offer_id" value="<?=$offer['id']?>" />
        <input type="hidden" id="offer_type_id" name="offer_type_id" value="<?=$offer['offer_type_id']?>" />
        <input type="hidden" id="offer_no_deals" name="offer_no_deals" value="<?=$offer['no_deals']?>" />
        <input type="hidden" id="offer_description" name="offer_description" value="<?=$offer['description']?>" />
        <input type="hidden" id="offer_locations" name="offer_locations" value="<?=$offer['locations']?>" />
        <input type="hidden" id="offer_amenities" name="offer_type_id" value="<?=$offer['amenities']?>" />
        <input type="hidden" id="offer_coordinates" name="offer_coordinates" value="<?=$offer['coordinates']?>" />
<?php $this->load->view('frontend/offers/templates/offer-top-template'); ?>
<?php $this->load->view('frontend/offers/templates/offer-content-template'); ?>
<?php $this->load->view('frontend/offers/templates/offer-bottom-template'); ?>
    </div>
<?php $this->load->view('frontend/footer');?>