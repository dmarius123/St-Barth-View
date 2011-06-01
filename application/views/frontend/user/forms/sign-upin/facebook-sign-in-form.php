<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/sign-upin/facebook-dign-in-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Facebook Sign In form.
*/

?>
    <h3><?=$signupin_sign_in_facebook_title?></h3>
    <span class="separator"></span>
    <div class="facebook-btn"><fb:login-button onlogin="facebookSignIn()" perms="email, user_about_me"><?=$signupin_sign_in_facebook_button_text?></fb:login-button></div>