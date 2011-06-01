<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/sign-upin/reset-password-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Reset Password form.
*/

?>
    <form method="post" action="<?php echo base_url().'user/new-password/';?>">
        <div class="sign-upin-form-field">
            <label><?=$signupin_email?> <span class="required" id="info-email"><?=$signupin_mandatory_field?></span></label><br />
            <input type="text" name="reset-email" id="reset-email" class="sign-upin-input-style" value="" />
        </div>
        <br class="clear" />
        <input type="submit" name="submit" id="submit" class="sign-upin-submit-style" value="<?=$signupin_reset_password_submit?>" />
        <span class="signupin-forgot-password-info"></span>
        <br class="clear" />
    </form>