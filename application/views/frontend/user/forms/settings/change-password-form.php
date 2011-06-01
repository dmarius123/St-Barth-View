<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/settings/change-password-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Change Password form.
*/

?>
    <h3 id="change-password-title"><?=$user_change_password_title?></h3>
    <span class="separator"></span>
    <span id="change-password-info"></span>
    <form method="post" action="" onsubmit="return changePassword()">
        <div class="user-area-form-field">
            <label><?=$user_new_password?> <span class="required" id="info-new-password"><?=$user_mandatory_field?></span></label><br />
            <input type="password" name="new-password" id="new-password" class="user-area-input-style" value="" />
        </div>
        <div class="user-area-form-field">
            <label><?=$user_confirm_new_password?> <span class="required" id="info-confirm-new-password"><?=$user_mandatory_field?></span></label><br />
            <input type="password" name="confirm-new-password" id="confirm-new-password" class="user-area-input-style" value="" />
        </div>
        <input type="submit" name="submit" id="submit" class="user-area-submit-style" value="<?=$user_change_password_submit?>" />
        <br class="clear" />
    </form>