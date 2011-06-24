<?php
/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/header/sign-in-navigation.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Loged in User header.
 */
?>
<ul id="header-navigation">
    <li class="language_menu" id="language_menu">
        <div class="language_currency">
            <div class="language_currency_display rounded_top">
                <div class="language_currency_display_language flag sprite-en">&nbsp;</div>
                <div class="language_currency_display_currency">$ USD</div>
            </div>
            <div class="language_currency_selector_container rounded" >
                <ul class="language_currency_selector">
                    <li class="instruction">Choose language...</li>
                    <li class="language option" id="language_selector_en" name="en">
                        <div class="flag sprite-en">&nbsp;</div>
                        <div style="display:inline;padding-left:24px;">English</div>
                    </li>
                    <li class="language option" id="language_selector_fr" name="fr">
                        <div class="flag sprite-fr">&nbsp;</div>
                        <div style="display:inline;padding-left:24px;">Français</div>
                    </li>
                    <li class="dash">&nbsp;</li>
                    <li class="instruction">Choose currency...</li>
                    <li class="currency option" id="currency_selector_USD" name="USD"> <span>$</span> USD </li>
                    <li class="currency option" id="currency_selector_EUR" name="EUR"> <span>€</span> EUR </li>
                    <li class="language option reward_points_option">
                        <div class="flag reward_points">&nbsp;</div>
                        <div style="display:inline;padding-left:24px;">Rewards Points</div>
                    </li>
                </ul><!-- LANGUAGE_CURRENCY_SELECTOR -->
            </div><!-- LANGUAGE_CURRENCY_SELECTOR_CONTAINER -->
        </div><!-- LANGUAGE_CURRENCY -->
    </li>
    <li class="separator">&nbsp;</li>
    <li class="language_menu" id="profile_menu">
        <div class="language_currency">
            <div class="language_currency_display rounded_top">
                <div class="language_currency_display_currency"><?= $first_name ?> <?= $last_name ?></div>
            </div>
            <div class="language_currency_selector_container rounded" >
                <ul class="language_currency_selector">
<!--                    <li class="instruction">My stuff</li>-->
                    <li class="currency option"> Dashboard asd asd ds </li>
                    <li class="currency option"> Offers </li>
                    <li class="currency option"> Deals </li>
                    <li class="currency option"> Messages </li>
                    <li class="currency option"> Friends </li>
                    <li class="currency option"> Reservations </li>
                    <li class="currency option"> Comments </li>
                    <li class="currency option"> Reward Points </li>
                    <li class="currency option"> Settings </li>
<!--                    <li class="dash">&nbsp;</li>
                    <li class="instruction">Choose currency...</li>
                    <li class="currency option" id="currency_selector_USD" name="USD"> <span>$</span> USD </li>
                    <li class="currency option" id="currency_selector_EUR" name="EUR"> <span>€</span> EUR </li>
                    <li class="language option reward_points_option">
                        <div class="flag reward_points">&nbsp;</div>
                        <div style="display:inline;padding-left:24px;">Rewards Points</div>
                    </li>-->
                </ul><!-- LANGUAGE_CURRENCY_SELECTOR -->
            </div><!-- LANGUAGE_CURRENCY_SELECTOR_CONTAINER -->
        </div><!-- LANGUAGE_CURRENCY -->

    </li>
<!--    <li><?= $header_welcome ?>, <?= $first_name ?> <?= $last_name ?></li>-->
    <li class="separator">&nbsp;</li>
    <li><?= anchor('user/sign-out/', $header_sign_out) ?></li>
    <li class="clear" />
</ul>
<script type="text/JavaScript" src="http://connect.facebook.net/<?= $facebook_language ?>/all.js"></script>
<script type="text/JavaScript">
    window.fbAsyncInit = function(){
        FB.init({appId:'148099351923386', status:true, cookie:true, xfbml:true});
    };
    //FB.logout();
</script>