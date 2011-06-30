<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/offer-sidebar-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Sidebar Template.
*/

?>
    <div id="offer-sidebar">
<?php $this->load->view('frontend/offers/templates/sidebar-templates/offer-sidebar-booking-template'); ?>
<?php $this->load->view('frontend/offers/templates/sidebar-templates/offer-sidebar-details-template'); ?>
    </div>