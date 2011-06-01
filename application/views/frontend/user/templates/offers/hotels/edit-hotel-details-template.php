<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/offers/hotels/edit-hotel-details-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Edit Hotel Details template.
*/

?>
    <h2><?=$user_edit_hotel_title?>: <?=$name?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/offers/hotels/edit-hotel-details-form'); ?>
    <div class="user-bottom"></div>