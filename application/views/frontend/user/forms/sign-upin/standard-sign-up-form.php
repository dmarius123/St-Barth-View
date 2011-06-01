<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/sign-upin/standard-sign-up-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Standard Sign Up form.
*/

?>
    <h3 id="standard-sign-up-title"><?=$signupin_sign_up_standard_form_title?></h3>
    <span class="separator"></span>

    <form method="post" action="" onsubmit="return signUp()">
        <div class="sign-upin-form-field">
            <label><?=$signupin_first_name?> <span class="required" id="info-first-name"><?=$signupin_mandatory_field?></span></label><br />
            <input type="text" name="first-name" id="first-name" class="sign-upin-input-style" value="" />
        </div>
        <div class="sign-upin-form-field">
            <label><?=$signupin_last_name?> <span class="required" id="info-last-name"><?=$signupin_mandatory_field?></span></label><br />
            <input type="text" name="last-name" id="last-name" class="sign-upin-input-style" value="" />
        </div>
        <div class="sign-upin-form-field">
            <label><?=$signupin_email?> <span class="required" id="info-email"><?=$signupin_mandatory_field?></span></label><br />
            <input type="text" name="email" id="email" class="sign-upin-input-style" value="" />
        </div>
        <div class="sign-upin-form-field">
            <label><?=$signupin_confirm_email?> <span class="required" id="info-confirm-email"><?=$signupin_mandatory_field?></span></label><br />
            <input type="text" name="confirm-email" id="confirm-email" class="sign-upin-input-style" value="" />
        </div>
        <div class="sign-upin-form-field">
            <label><?=$signupin_password?> <span class="required" id="info-password"><?=$signupin_mandatory_field?></span></label><br />
            <input type="password" name="password" id="password" class="sign-upin-input-style" value="" />
        </div>
        <div class="sign-upin-form-field">
            <label><?=$signupin_confirm_password?> <span class="required" id="info-confirm-password"><?=$signupin_mandatory_field?></span></label><br />
            <input type="password" name="confirm-password" id="confirm-password" class="sign-upin-input-style" value="" />
        </div>
        <input type="submit" name="submit" id="submit" class="sign-upin-submit-style" value="<?=$signupin_sign_up_submit?>" />
        <span class="sign-upin-terms"><?=$signupin_sign_up_conditions?></span>
        <br class="clear" />
    </form>