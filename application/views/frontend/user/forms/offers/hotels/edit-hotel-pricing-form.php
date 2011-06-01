<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/hotels/edit-hotel-pricing-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Edit Hotel Pricing form.
*/

?>
    <h3 id="edit-offer-pricing-title"><?=$user_edit_hotel_pricing_title?></h3>
    <span class="separator"></span>
    <span id="edit-offer-pricing-info"></span>
    <form method="post" action="" onsubmit="return editHotelPricing()">
        <input type="hidden" id="hotel_id" name="hotel_id" value="<?=$id?>" />
        <div class="user-area-form-field">
            <label><?=$user_edit_hotel_pricing_currency?> <span class="required" id="info-last-name">&nbsp</span></label><br />
            <select id="currency" name="currency" class="user-area-select-style">
<?php
            if ($currency == 0){
                echo '<option value="0" selected="selected">'.$user_currency_euros.'</option>';
                echo '<option value="1">'.$user_currency_dollars.'</option>';
            }
            else{
                echo '<option value="0">'.$user_currency_euros.'</option>';
                echo '<option value="1" selected="selected">'.$user_currency_dollars.'</option>';
            }
?>
           </select>
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_hotel_pricing_minimum_stay?> <span class="required" id="info-last-name">&nbsp</span></label><br />
            <select id="min-stay" name="min-stay" class="user-area-select-style">
<?php
            for ($i=1; $i<=14; $i++){
                if ($i == $min_stay){
                    echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                }
                else{
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
?>
           </select>
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_cancel_policy?> <span class="required" id="info-last-name">&nbsp</span></label><br />
            <select id="cancel-policy" name="cancel-policy" class="user-area-select-style-big">
<?php
            if ($cancel_policy == 1){
                echo '<option value="1" selected="selected">'.$user_edit_cancel_policy_1.'</option>';
                echo '<option value="2">'.$user_edit_cancel_policy_2.'</option>';
                echo '<option value="3">'.$user_edit_cancel_policy_3.'</option>';
            }
            elseif ($cancel_policy == 2){
                echo '<option value="1">'.$user_edit_cancel_policy_1.'</option>';
                echo '<option value="2" selected="selected">'.$user_edit_cancel_policy_2.'</option>';
                echo '<option value="3">'.$user_edit_cancel_policy_3.'</option>';
            }
            elseif ($cancel_policy == 3){
                echo '<option value="1">'.$user_edit_cancel_policy_1.'</option>';
                echo '<option value="2">'.$user_edit_cancel_policy_2.'</option>';
                echo '<option value="3" selected="selected">'.$user_edit_cancel_policy_3.'</option>';
            }
?>
           </select>
        </div>
        <br class="clear" />
        <input type="submit" name="submit-pricing" id="submit-pricing" class="user-area-submit-style" value="<?=$user_edit_hotel_pricing_edit_pricing_submit?>" />
    </form>
    <input type="button" name="add-room" index="add-room" class="user-area-submit-style" value="<?=$user_add_room?>" onclick="addHotelRoom(<?=$id?>)" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#hotel:<?=$id?>'; parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />

    <h3 id="edit-offer-rooms-title"><?=$user_edit_hotel_rooms_title?></h3>
    <span class="separator"></span>
    <span id="edit-offer-rooms-info"></span>
    <div class="user-area-form-field">
        <select id="rooms" id="rooms" class="user-area-select-style" onchange="showHotelRoom(this.value)">
            <option value="0"><?=$user_edit_hotel_pricing_select_room?></option>
<?php
    foreach ($rooms->result() as $room):
        echo '<option value="'.$room->id.'" id="room'.$room->id.'">'.$room->name.'</option>';
    endforeach;
?>
        </select>
    </div>
    <br class="clear" />
    <div id="room-container"></div>