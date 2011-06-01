<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/hotels/edit-hotel-details-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Edit Hotel Details form.
*/

?>
    <h3 id="edit-offer-details-title"><?=$user_edit_hotel_details_title?></h3>
    <span class="separator"></span>
    <span id="edit-offer-details-info"></span>
    <form method="post" action="" onsubmit="return editHotelDetails()">
        <input type="hidden" name="hotel_id" id="hotel_id" class="user-area-input-style" value="<?=$id?>" />
        <div class="user-area-form-field">
            <label><?=$user_hotel_details_name?> <span class="required" id="info-name"><?=$user_mandatory_field?></span></label><br />
            <input type="text" name="name" id="name" class="user-area-input-style" value="<?=$name?>" />
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_hotel_details_alternative_address?> <span class="required" id="info-address"><?=$user_optional_field?></span></label><br />
            <input type="text" name="alt-address" id="alt-address" class="user-area-input-style" value="<?=$address?>" />
        </div>
        <div class="user-area-form-field textarea">
            <label><?=$user_hotel_details_description?> <span class="required" id="info-description"><?=$user_mandatory_field?></span></label><br />
            <textarea name="description" id="description" cols="" rows="" class="user-area-textarea-style"><?=$description?></textarea>
        </div>
        <input type="submit" name="submit" id="submit" class="user-area-submit-style" value="<?=$user_edit_hotel_details_submit?>" />
        <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#hotel-<?=$id?>'; parseContent()" value="<?=$user_offers_back?>" />
        <br class="clear" />
    </form>