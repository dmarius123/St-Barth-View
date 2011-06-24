<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/offer-villa-details-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offer Villa Details form.
*/

?>
    <h3 id="add-offer-details-title"><?=$user_add_villa_details_title?></h3>
    <span class="separator"></span>
    <div class="user-area-form-field">
        <label><?=$user_villa_details_name?> <span class="required" id="info-name"><?=$user_mandatory_field?></span></label><br />
        <input type="text" name="name" id="name" class="user-area-input-style" value="" />
    </div>
    <div class="user-area-form-field textarea">
        <label><?=$user_villa_details_description?> <span class="required" id="info-description"><?=$user_mandatory_field?></span></label><br />
        <textarea name="description" id="description" cols="" rows="" class="user-area-textarea-style"></textarea>
    </div>
    <br class="clear" />