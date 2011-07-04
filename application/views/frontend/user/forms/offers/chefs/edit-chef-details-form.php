<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/chefs/edit-chef-details-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Edit Chef Details form.
*/

?>
    <h3 id="edit-offer-details-title"><?=$user_edit_chef_details_title?></h3>
    <span class="separator"></span>
    <span id="edit-offer-details-info"></span>
    <form method="post" action="" onsubmit="return user_editChefDetails()">
        <input type="hidden" name="chef_id" id="chef_id" class="user-area-input-style" value="<?=$id?>" />
        <div class="user-area-form-field">
            <label><?=$user_chef_details_name?> <span class="required" id="info-name"><?=$user_mandatory_field?></span></label><br />
            <input type="text" name="name" id="name" class="user-area-input-style" value="<?=$name?>" />
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_chef_details_alternative_address?> <span class="required" id="info-address"><?=$user_optional_field?></span></label><br />
            <input type="text" name="alt-address" id="alt-address" class="user-area-input-style" value="<?=$address?>" />
        </div>
        <div class="user-area-form-field textarea">
            <label><?=$user_chef_details_description?> <span class="required" id="info-description"><?=$user_mandatory_field?></span></label><br />
            <textarea name="description" id="description" cols="" rows="" class="user-area-textarea-style"><?=$description?></textarea>
        </div>
        <div class="user-area-form-field textarea">
            <label><?=$user_chef_details_locations?> <span class="required" id="info-locations"><?=$user_mandatory_field?></span></label><br />
            <textarea name="locations" id="locations" cols="" rows="" class="user-area-textarea-style"><?=$locations?></textarea>
        </div>
        <div class="user-area-form-field textarea">
            <label><?=$user_chef_details_amenities?></label><br />
            <ul class="amenities-list">
<?php
    $selected_amenities = explode(',', $offer_amenities);

    foreach ($amenities->result() as $amenity):
        $checked = false;
        for ($i=0; $i<count($selected_amenities); $i++){
            if ($amenity->id == $selected_amenities[$i]){
                $checked = true;
            }
        }
        if ($checked){
            echo '<li><input type="checkbox" id="amenity'.$amenity->id.'" name="amenity'.$amenity->id.'" class="filter-checkbox" checked="checked" value="" />'.$general_amenities_chefs[$amenity->index].'</li>';
        }
        else{
            echo '<li><input type="checkbox" id="amenity'.$amenity->id.'" name="amenity'.$amenity->id.'" class="filter-checkbox" value="" />'.$general_amenities_chefs[$amenity->index].'</li>';
        }
    endforeach;
?>
                <br class="clear" />
            </ul>
        </div>
        <input type="submit" name="submit" id="submit" class="user-area-submit-style" value="<?=$user_edit_chef_details_submit?>" />
        <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; user_parseContent()" value="<?=$user_offers_back?>" />
        <br class="clear" />
    </form>