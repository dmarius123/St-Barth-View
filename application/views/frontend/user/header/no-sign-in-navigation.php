<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/header/no-sign-in-navigation.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Not loged in User header.
*/

?>
    <ul id="header-navigation">
        <li><?=anchor('user', $header_sign_in)?></li>
        <li class="separator">&nbsp;</li>
        <li><?=anchor('user/sign-up/', $header_sign_up)?></li>
        <li class="separator">&nbsp;</li>
        <li><fb:login-button onlogin="facebookSignIn()" size="small" perms="email, user_about_me"><?=$header_sign_in?></fb:login-button></li>
        <li class="clear" />
    </ul>
    <div id="fb-root"></div>
    <script type="text/JavaScript">
        window.fbAsyncInit = function(){
            FB.init({appId:'148099351923386', status:true, cookie:true, xfbml:true});
            FB.logout(function(response){
                //alert(response.status)
            });
        };
    </script>
    <script type="text/JavaScript" src="http://connect.facebook.net/<?=$facebook_language?>/all.js"></script>