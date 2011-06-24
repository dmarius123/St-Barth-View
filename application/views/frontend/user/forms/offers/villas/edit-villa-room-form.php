<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/villas/edit-villa-room-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 16 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Edit Villa Room form.
*/

?>
    <form method="post" action="" onsubmit="return editVillaRoom()">
        <input type="hidden" name="room-id" id="room-id" value="<?=$id?>" />
        <div class="user-area-form-field">
            <label><?=$user_edit_villa_pricing_edit_room_name?> <span class="required" id="info-first-name">&nbsp</span></label><br />
            <input type="text" name="name" id="name" class="user-area-input-style" value="<?=$name?>" />
        </div>
        <br class="clear" />
        <div class="user-area-form-field">
            <label><?=$user_edit_villa_pricing_edit_room_no_rooms?> <span class="required" id="info-last-name">&nbsp</span></label><br />
            <select id="no_rooms" name="no_rooms" class="user-area-select-style">
<?php
            for ($i=1; $i<=20; $i++){
                if ($i == $no_rooms){
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
            <label><?=$user_edit_villa_pricing_edit_room_max_allowed_people?> <span class="required" id="info-email">&nbsp</span></label><br />
            <select id="max_allowed_people" name="max_allowed_people" class="user-area-select-style">
<?php
            for ($i=1; $i<=10; $i++){
                if ($i == $max_allowed_people){
                    echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                }
                else{
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
?>
           </select>
        </div>
        <input type="submit" name="submit-room" id="submit-room" class="user-area-submit-style" value="<?=$user_edit_villa_pricing_edit_room_submit?>" />
        <input type="button" name="delete-room" id="delete-room" class="user-area-submit-style" onClick="deleteVillaRoom()" value="<?=$user_edit_villa_pricing_edit_room_delete?>" />
    <br class="clear" />
    </form>
    <div id="calendar"></div>