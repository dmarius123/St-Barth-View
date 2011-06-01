<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/home/forms/search-form.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Form.
*/

?>
        <h1><?=$home_title1?> <span class="home-pink"><?=$home_title2?></span> <?=$home_title3?></h1>
        <p class="home-sidebar-description"><?=$home_subtitle?></p>
        <div id="home-booking">
            <form action="search" method="post">
                <div class="home-booking-form-field">
                    <label><?=$home_search_destination?></label><br />
                    <select class="home-booking-select-big" name="home_search_location" id="home_search_location">
                        <option value="St Barthélemy">St Barthélemy</option>
                        <option value="Miami">Miami</option>
                    </select>
                </div>
                <div class="home-booking-form-field">
                    <label><?=$home_search_offers?> <span><?=$home_search_offers_subtitle?></span></label><br />
                    <select class="home-booking-select-big" name="home_search_category" id="home_search_category">
                        <option value="1"><?=$home_search_hotels?></option>
                        <option value="2"><?=$home_search_villas?></option>
                    </select>
                </div>
                <div class="home-booking-form-field">
                    <label><?=$home_search_travel_dates?> <span><?=$home_search_optional?></span></label><br />
                    <input type="text" class="home-booking-input" name="home_search_checkin" id="home_search_checkin" value="" />
                    <input type="text" class="home-booking-input right" name="home_search_checkout" id="home_search_checkout" value="" />
                    <br class="clear" />
                </div>
                <div class="home-booking-form-last-row">
                    <div class="home-booking-form-twofields">
                        <div class="home-booking-form-field-left">
                            <label><?=$home_search_adults?></label><br />
                            <select class="home-booking-select-small" name="home_search_offer_adults" id="home_search_adults">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="home-booking-form-field-right">
                            <label><?=$home_search_children?></label><br />
                            <select class="home-booking-select-small" name="home_search_offer_children" id="home_search_offer_children">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="home-booking-form-field-submit">
                        <input type="submit" value="<?=$home_search_submit?>" id="home-booking-form-submit" name="home-booking-form-submit" />
                    </div>
                    <br class="clear"/>
                </div>
            </form>
        </div>
        <br class="clear"/>