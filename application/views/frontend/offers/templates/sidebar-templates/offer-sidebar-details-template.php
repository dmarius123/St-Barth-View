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
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no"><?=$offer['owner_no_offers']?></span><br /><span class="text"><?=$offers_offers?></span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no"><?=$offer['owner_no_friends']?></span><br /><span class="text"><?=$offers_friends?></span></a></span>
<!--            <span class="help-friend"><a href="">Ajouter a mes amis</a></span>-->
            <br class="clear" />
        </div>
        <div class="owner-actions">
            <div class="owner-action-normal" id="owner-action-normal">
                <a href="javascript:void(0)">
                    <span class="nr-deals"><?=$offer['no_deals']?> <?=$offers_deals_btn_deals?></span>
<?php if ($offer['no_deals'] > 0){ ?>
                    <span class="time-deal">
                        <?=$offers_deals_btn_time_left?><br />
                        <span class="timer">2 days 13:03:37</span>
                    </span>
                    <br class="clear" />
<?php } ?>
                </a>
            </div>
            <div class="owner-action-active">
                <div class="multiple-deals" id="multiple-deals">
                    <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                    <div class="next-deal"><a href="">next deal</a></div>
                </div>
                <div class="single-deal-option" id="single-deal-option">
                    <div class="buy-deal"><a href="javascript:offer_hideRatesSlider('offer_showDealsSlider()')">Buy this Deal!</a></div>
                </div>
                <div class="single-deal-options" id="single-deal-options">
                    <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                </div>
            </div>
        </div>
    </div>