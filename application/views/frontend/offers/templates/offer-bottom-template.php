<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/offer-bottom-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 21 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Bottom Template.
*/

?>
        <div id="offer-bottom">
            <div class="offer-bottom-actions">
<?php $this->load->view('frontend/offers/templates/bottom-templates/offer-bottom-menu-template'); ?>
<?php $this->load->view('frontend/offers/widgets/add-this-widget'); ?>
            </div>
<?php $this->load->view('frontend/offers/templates/bottom-templates/offer-bottom-content-template'); ?>
        </div>