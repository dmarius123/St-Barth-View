<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/offer-location-form.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offer Location form.
*/

?>
<?php
    $locations = '';

    foreach ($locations_list->result() as $location):
        if ($location->country == 'none'){
            $locations .= '<option value="'.$location->id.';;'.$location->coordinates.';;'.$location->name.'">'.$location->name.'</option>';
        }
        else{
            $locations .= '<option value="'.$location->id.';;'.$location->coordinates.';;'.$location->name.', '.$location->country.'">'.$location->name.', '.$location->country.'</option>';
        }
    endforeach;
?>
    <h3 id="add-offer-location-title"><?=$user_add_offer_location_title?></h3>
    <span class="separator"></span>
    <span class="user-area-form-info"><?=$user_add_offer_location_info?></span>
    <form method="post" action="" onsubmit="return showMap('#address-hints')">
        <input type="hidden" id="coordinates" name="coordinates" value="" />
        <input type="hidden" id="location_id" name="location_id" value="" />
        <input type="hidden" id="locality" name="locality" value="" />
        <input type="text" id="address" name="address" value="" />
        <select name="location" id="location" class="user_add_location" onchange="gm_showLocation(this.value)">
            <?=$locations?>
        </select>
        <br class="clear" />
    </form>
    <ul id="address-hints">
        <li></li>
    </ul>
    <div id="user-area-main-add-map"></div>
    <span class="user-area-form-info"><?=$user_add_offer_alternative_address?><span class="required"><?=$user_optional_field?></span></span>
    <input type="text" id="alt-address" name="alt-address" class="user-area-input-style-big" value="" />