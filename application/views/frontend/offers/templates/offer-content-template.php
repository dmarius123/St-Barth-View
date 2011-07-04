<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/offer-content-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 21 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Content Template.
*/

?>
        <div id="offer-content">
            <div id="offer-main">
<?php $this->load->view('frontend/offers/templates/content-templates/gallery-template'); ?>
<?php $this->load->view('frontend/offers/templates/content-templates/rates-slider-template'); ?>
<?php $this->load->view('frontend/offers/templates/content-templates/deals-slider-template'); ?>
            </div>
<?php $this->load->view('frontend/offers/templates/offer-sidebar-template'); ?>
            <br class="clear" />
        </div>