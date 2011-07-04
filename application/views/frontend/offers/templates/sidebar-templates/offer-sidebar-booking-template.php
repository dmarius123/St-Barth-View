<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/sidebar-templates/offer-sidebar-booking-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Sidebar Booking Template.
*/

?>
    <div id="offer-booking">
        <p class="offer-booking-price">0<span class="balance">&euro;</span></p>
        <div class="offer-booking-form">
            <form action="" method="post">
                <div class="offer-booking-form-row">
                    <div class="booking-form-field">
                        <label><?=$offers_booking_travel_dates?> </label>
                        <input class="booking-input" id="booking-checkin" type="text" value="Check In">
                        <input id="booking-checkout" class="booking-input" type="text" value="Check Out">
                        <br class="clear">
                    </div>
                </div>
                <div class="offer-booking-form-row-multiple">
                    <div class="booking-form-field-select">
                        <label><?=$offers_booking_no_rooms?></label>
                        <select name="nr_rooms" class="booking-form-select-small">
                            <option >0</option>
                            <option >1</option>
                            <option >2</option>
                            <option >3</option>
                            <option >4</option>
                        </select>
                    </div>
                    <div class="booking-form-field-select">
                        <label><?=$offers_booking_adults?></label>
                        <select name="adults" class="booking-form-select-small">
                            <option >0</option>
                            <option >1</option>
                            <option >2</option>
                            <option >3</option>
                            <option >4</option>
                        </select>
                    </div>
                    <div class="booking-form-field-select">
                        <label><?=$offers_booking_children?></label>
                        <select name="kids" class="booking-form-select-small">
                            <option >0</option>
                            <option >1</option>
                            <option >2</option>
                            <option >3</option>
                            <option >4</option>
                        </select>
                    </div>
<!--                    <a class="booking_read_more" href=""> >> more</a>-->
                    <br class="clear" />
                </div>
                <div class="offer-booking-form-row">
                    <div class="offer-booking-btn-rates">
                        <div class="booking-rates" id="booking-rates">
                            <a href="javascript:offer_hideDealsSlider('offer_showRatesSlider()')"><?=$offers_booking_rates?></a>
                        </div>
                        <div class="booking-rates-hover" id="booking-rates-hover">
                            <a href="javascript:offer_hideRatesSlider(null)"><?=$offers_booking_rates?></a>
                        </div>
                    </div>
                    <div class="offer-booking-btn-instant-book"><a href="" class="booking-instant-book"><?=$offers_booking_book?></a></div>
                    <br class="clear" />
                </div>
            </form>
        </div>
    </div>