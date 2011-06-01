<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/offer-hotel-location-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offer Villa Location form.
*/

?>
    <h3 id="add-offer-location-title"><?=$user_add_villa_location_title?></h3>
    <span class="separator"></span>
    <span class="user-area-form-info"><?=$user_add_villa_location_info?></span>
    <form method="post" action="" onsubmit="return showMap('#address-hints')">
        <input type="hidden" id="coordinates" name="coordinates" value="" />
        <input type="text" id="address" name="address" value="" />
        <select name="location" id="location" onchange="showGoogleMapLocation(this.value)">
            <option value="St Barthélemy">St Barthélemy</option>
            <option value="Miami">Miami</option>
        </select>
        <br class="clear" />
    </form>
    <ul id="address-hints">
        <li></li>
    </ul>
    <div id="user-area-main-add-map"></div>
    <span class="user-area-form-info"><?=$user_add_villa_alternative_address?><span class="required"><?=$user_optional_field?></span></span>
    <input type="text" id="alt-address" name="alt-address" class="user-area-input-style-big" value="" />