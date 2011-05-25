
    <h3 id="standard-sign-in-title"><?=$signupin_sign_in_standard_form_title?></h3>
    <span class="separator"></span>
    <form method="post" action="" onsubmit="return signIn()">
        <div class="sign-upin-form-field">
            <label><?=$signupin_email?> <span class="required" id="info-email"><?=$signupin_mandatory_field?></span></label><br />
            <input type="text" name="sign-in-email" id="sign-in-email" class="sign-upin-input-style" value="" />
        </div>
        <div class="sign-upin-form-field">
            <label><?=$signupin_password?> <span class="required" id="info-password"><?=$signupin_mandatory_field?></span></label><br />
            <input type="password" name="sign-in-password" id="sign-in-password" class="sign-upin-input-style" value="" />
        </div>
        <input type="submit" name="submit" id="submit" class="sign-upin-submit-style" value="<?=$signupin_sign_in_submit?>" />
        <span class="sign-upin-forgot-password"><?=anchor('user/reset-password/', $signupin_forgot_password)?></span>
        <br class="clear" />
    </form>