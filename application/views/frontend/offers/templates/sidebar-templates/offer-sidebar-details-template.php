<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/sidebar-templates/offer-sidebar-details-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Sidebar Details Template.
*/

?>
    <div id="offer-deal">
        <div class="offer-owner-info">
            <div class="owner-image"><img src="<?=$offer['owner_profile_picture']?>" alt="" width="102" height="102"/></div>
            <div class="owner-info">
                <p class="tag"><?=$offers_owner?></p>
                <p class="name"><span class="first-name"><?=$offer['owner_first_name']?></span><br /><span class="last-name"><?=$offer['owner_last_name']?></span></p>
                <p class="description"><?=$offer['owner_short_description']?></p>
            </div>
            <br class="clear" />
        </div>
        <div class="owner-socials">
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">2</span><br /><span class="text">deals</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">220</span><br /><span class="text">friends</span></a></span>
            <span class="help-friend"><a href="">Ajouter a mes amis</a></span>
            <br class="clear" />
        </div>
        <div class="owner-actions">
            <div class="owner-action-normal" style="display:block;">
                <a href=""><span class="nr-deals">2 Deals</span><span class="time-deal">time left to buy<br /><span class="timer">2 days 13:03:37</span></span><br class="clear" /></a>
            </div>
            <div class="owner-action-active" style="">
                <div class="multiple-deals" style="display:none;">
                    <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                    <div class="next-deal"><a href="">next deal</a></div>
                </div>
                <div class="single-deal-option" style="display:none;">
                    <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                </div>
<!--                <div class="single-deal-options" style="display:block;">
                    <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                </div>-->
            </div>
        </div>
    </div>