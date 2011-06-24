<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/deals-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Deals template.
*/

?>
<!--    <h2><?=$user_offers_title?></h2>
    <span class="title-separator"></span>
    <input type="button" name="add-hotel" index="add-hotel" class="user-area-submit-style" value="<?=$user_add_hotel?>" onClick="parent.location = '#add-hotel'; parseContent()">
    <input type="button" name="add-villa" index="add-villa" class="user-area-submit-style" value="<?=$user_add_villa?>" onClick="parent.location = '#add-villa'; parseContent()">
    <br class="clear" />
    <div class="user-bottom"></div>
-->
<div id="users-deals">
    <div class="users-deals-alert-box">
        <p class="title">Approval pending</p>
        <p class="description">Before we lunch your deal then we bla bla bla bla ... Before we lunch your deal then we bla bla bla bla ... Before we lunch your deal then we bla bla bla bla ...</p>
    </div>
    <h1 class="user-deals-title">Merchant Center</h1>
    <div class="user-deals-tabs">
        <ul class="user-deals-tabs-menu">
            <li><a href="javascript:void(0)">Daily Deals</a></li>
            <li class="current"><a href="javascript:void(0)">Now! Deals</a></li>
            <li><a href="javascript:void(0)">Manage Redemptions</a></li>
            <li><a href="javascript:void(0)">Business Profile</a></li>
        </ul>
        <br class="clear" />
    </div>

    <div class="delimiter"></div>
    <div class="delimiter"></div>
    <div class="uses-deals-add-form">
        <div class="users-deals-warning-box">
            <p class="description">Before we lunch your deal then we bla bla bla bla ... Before we lunch your deal then we bla bla bla bla ... Before we lunch your deal then we bla bla bla bla ...</p>
        </div>
        <form action="">
            <div class="form-fields">
                <div class="steps">
                    <h2>Define Your Now Deal:</h2>
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Set Default Value:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <div class="add-deal-values">
                            <div class="block">
                                <div class="block-top">Retail Value</div>
                                <div class="block-bottom">
                                    <input type="text" value="20" />
                                    <label></label>
                                </div>
                            </div>
                            <div class="block">
                                <div class="block-top">Customer Discount</div>
                                <div class="block-bottom">
                                    <input type="text" value="10" />
                                    <label>50%</label>
                                </div>
                            </div>
                            <div class="block">
                                <div class="block-top">Merchant's Take</div>
                                <div class="block-bottom">
                                    <input type="text" value="5.00" />
                                    <label>25%</label>
                                </div>
                            </div>
                            <div class="block">
                                <div class="block-top">Merchant's Take</div>
                                <div class="block-bottom">
                                    <strong><label>$ 5.00</label></strong>
                                    <label>25%</label>
                                </div>
                            </div>
                            <br class="clear" />
                        </div>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Describe your deal:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <p><input type='text' class='deal-desc' value='e.g. "Food and Drinks", "60 Minute Massage"' /></p>
                        <p><label>60 characters remaining</label></p>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Location:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <p class="fixme"><input type='checkbox' class='deal-location' value='1' checked="checked"/> <label>Main Location</label></p>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Custom Restrictions:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <p><textarea class="deal-restrictions" rows="" cols=""></textarea></p>
                        <p><label>100 characters remaining</label></p>
                    </div>
                    <br class="clear" />
                </div>
                <div class="steps">
                    <h2>Schedule Your Deal:</h2>
                </div>
                <div class="add-deal-row">
                    <p>When do you want customers in your door? You can change this at anytime.</p>
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Accept Groupons beginning:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <div class="schedule-program">
                            <input type="text" name="schedule-date" id="schedule-date" value="06/06/2011" />
                        </div>
                        <div class="schedule-program">
                            <select name="schedule-start-time" id="schedule-start-time">
                                <option value="00:00">12:00 AM</option><option value="00:15">12:15 AM</option><option value="00:30">12:30 AM</option><option value="00:45">12:45 AM</option><option value="01:00">1:00 AM</option><option value="01:15">1:15 AM</option><option value="01:30">1:30 AM</option><option value="01:45">1:45 AM</option><option value="02:00">2:00 AM</option><option value="02:15">2:15 AM</option><option value="02:30">2:30 AM</option><option value="02:45">2:45 AM</option><option value="03:00">3:00 AM</option><option value="03:15">3:15 AM</option><option value="03:30">3:30 AM</option><option value="03:45">3:45 AM</option><option value="04:00">4:00 AM</option><option value="04:15">4:15 AM</option><option value="04:30">4:30 AM</option><option value="04:45">4:45 AM</option><option value="05:00">5:00 AM</option><option value="05:15">5:15 AM</option><option value="05:30">5:30 AM</option><option value="05:45">5:45 AM</option><option value="06:00">6:00 AM</option><option value="06:15">6:15 AM</option><option value="06:30">6:30 AM</option><option value="06:45">6:45 AM</option><option value="07:00">7:00 AM</option><option value="07:15">7:15 AM</option><option value="07:30">7:30 AM</option><option value="07:45">7:45 AM</option><option value="08:00">8:00 AM</option><option value="08:15">8:15 AM</option><option value="08:30">8:30 AM</option><option value="08:45">8:45 AM</option><option value="09:00">9:00 AM</option><option value="09:15">9:15 AM</option><option value="09:30">9:30 AM</option><option value="09:45">9:45 AM</option><option value="10:00" selected="selected">10:00 AM</option><option value="10:15">10:15 AM</option><option value="10:30">10:30 AM</option><option value="10:45">10:45 AM</option><option value="11:00">11:00 AM</option><option value="11:15">11:15 AM</option><option value="11:30">11:30 AM</option><option value="11:45">11:45 AM</option><option value="12:00">12:00 PM</option><option value="12:15">12:15 PM</option><option value="12:30">12:30 PM</option><option value="12:45">12:45 PM</option><option value="13:00">1:00 PM</option><option value="13:15">1:15 PM</option><option value="13:30">1:30 PM</option><option value="13:45">1:45 PM</option><option value="14:00">2:00 PM</option><option value="14:15">2:15 PM</option><option value="14:30">2:30 PM</option><option value="14:45">2:45 PM</option><option value="15:00">3:00 PM</option><option value="15:15">3:15 PM</option><option value="15:30">3:30 PM</option><option value="15:45">3:45 PM</option><option value="16:00">4:00 PM</option><option value="16:15">4:15 PM</option><option value="16:30">4:30 PM</option><option value="16:45">4:45 PM</option><option value="17:00">5:00 PM</option><option value="17:15">5:15 PM</option><option value="17:30">5:30 PM</option><option value="17:45">5:45 PM</option><option value="18:00">6:00 PM</option><option value="18:15">6:15 PM</option><option value="18:30">6:30 PM</option><option value="18:45">6:45 PM</option><option value="19:00">7:00 PM</option><option value="19:15">7:15 PM</option><option value="19:30">7:30 PM</option><option value="19:45">7:45 PM</option><option value="20:00">8:00 PM</option><option value="20:15">8:15 PM</option><option value="20:30">8:30 PM</option><option value="20:45">8:45 PM</option><option value="21:00">9:00 PM</option><option value="21:15">9:15 PM</option><option value="21:30">9:30 PM</option><option value="21:45">9:45 PM</option><option value="22:00">10:00 PM</option><option value="22:15">10:15 PM</option><option value="22:30">10:30 PM</option><option value="22:45">10:45 PM</option><option value="23:00">11:00 PM</option><option value="23:15">11:15 PM</option><option value="23:30">11:30 PM</option><option value="23:45">11:45 PM</option>
                            </select>
                        </div>
                        <div class="schedule-program">
                            <select name="schedule-end-time" id="schedule-end-time">
                                <option value="00:00">12:00 AM</option><option value="00:15">12:15 AM</option><option value="00:30">12:30 AM</option><option value="00:45">12:45 AM</option><option value="01:00">1:00 AM</option><option value="01:15">1:15 AM</option><option value="01:30">1:30 AM</option><option value="01:45">1:45 AM</option><option value="02:00">2:00 AM</option><option value="02:15">2:15 AM</option><option value="02:30">2:30 AM</option><option value="02:45">2:45 AM</option><option value="03:00">3:00 AM</option><option value="03:15">3:15 AM</option><option value="03:30">3:30 AM</option><option value="03:45">3:45 AM</option><option value="04:00">4:00 AM</option><option value="04:15">4:15 AM</option><option value="04:30">4:30 AM</option><option value="04:45">4:45 AM</option><option value="05:00">5:00 AM</option><option value="05:15">5:15 AM</option><option value="05:30">5:30 AM</option><option value="05:45">5:45 AM</option><option value="06:00">6:00 AM</option><option value="06:15">6:15 AM</option><option value="06:30">6:30 AM</option><option value="06:45">6:45 AM</option><option value="07:00">7:00 AM</option><option value="07:15">7:15 AM</option><option value="07:30">7:30 AM</option><option value="07:45">7:45 AM</option><option value="08:00">8:00 AM</option><option value="08:15">8:15 AM</option><option value="08:30">8:30 AM</option><option value="08:45">8:45 AM</option><option value="09:00">9:00 AM</option><option value="09:15">9:15 AM</option><option value="09:30">9:30 AM</option><option value="09:45">9:45 AM</option><option value="10:00" selected="selected">10:00 AM</option><option value="10:15">10:15 AM</option><option value="10:30">10:30 AM</option><option value="10:45">10:45 AM</option><option value="11:00">11:00 AM</option><option value="11:15">11:15 AM</option><option value="11:30">11:30 AM</option><option value="11:45">11:45 AM</option><option value="12:00">12:00 PM</option><option value="12:15">12:15 PM</option><option value="12:30">12:30 PM</option><option value="12:45">12:45 PM</option><option value="13:00">1:00 PM</option><option value="13:15">1:15 PM</option><option value="13:30">1:30 PM</option><option value="13:45">1:45 PM</option><option value="14:00">2:00 PM</option><option value="14:15">2:15 PM</option><option value="14:30">2:30 PM</option><option value="14:45">2:45 PM</option><option value="15:00">3:00 PM</option><option value="15:15">3:15 PM</option><option value="15:30">3:30 PM</option><option value="15:45">3:45 PM</option><option value="16:00">4:00 PM</option><option value="16:15">4:15 PM</option><option value="16:30">4:30 PM</option><option value="16:45">4:45 PM</option><option value="17:00">5:00 PM</option><option value="17:15">5:15 PM</option><option value="17:30">5:30 PM</option><option value="17:45">5:45 PM</option><option value="18:00">6:00 PM</option><option value="18:15">6:15 PM</option><option value="18:30">6:30 PM</option><option value="18:45">6:45 PM</option><option value="19:00">7:00 PM</option><option value="19:15">7:15 PM</option><option value="19:30">7:30 PM</option><option value="19:45">7:45 PM</option><option value="20:00">8:00 PM</option><option value="20:15">8:15 PM</option><option value="20:30">8:30 PM</option><option value="20:45">8:45 PM</option><option value="21:00">9:00 PM</option><option value="21:15">9:15 PM</option><option value="21:30">9:30 PM</option><option value="21:45">9:45 PM</option><option value="22:00">10:00 PM</option><option value="22:15">10:15 PM</option><option value="22:30">10:30 PM</option><option value="22:45">10:45 PM</option><option value="23:00">11:00 PM</option><option value="23:15">11:15 PM</option><option value="23:30">11:30 PM</option><option value="23:45">11:45 PM</option>
                            </select>
                        </div>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Repeat deal:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <select name="schedule-repeat" id="schedule-repeat" class="user-deals-select">
                            <option value=""></option>
                            <option value="">Don't Repeat</option>
                            <option value="weekdays">Weekdays (Mon - Fri)</option>
                            <option value="weekends">Weekends (Sat - Sun)</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Maximum quantity:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <p><input type='checkbox' class='schedule-max-qty-check' value='1' checked="checked"/> <label>Sell no more than</label> <input type="text" name="schedule-max-qty" id="schedule-max-qty" value="" /> units per day</p>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Maximum per purchase quantity:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <p><input type='checkbox' class='schedule-max-qty-check-per-purchase' value='1' checked="checked"/> <label>Sell no more than</label> <input type="text" name="schedule-max-qty-per-purchase" id="schedule-max-qty-per-purchase" value="" /> per purchase</p>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">
                        <label>Summary:</label>
                    </div>
                    <div class="add-deal-row-right">
                        <p class="fixme"><strong>Jun 07, 2011 from 5:45 AM to 9:00 PM</strong></p>
                    </div>
                    <br class="clear" />
                </div>
                <div class="add-deal-row">
                    <div class="add-deal-row-left">&nbsp;</div>
                    <div class="add-deal-row-right">
                        <p>
                        <a href="" >Cancel</a>
                        <input type="submit" id="deal-submit" class="user-deal-submit" name="submitBtn" value="Preview Deal" />
                        </p>
                    </div>
                    <br class="clear" />
                </div>
            </div>
        </form>
    </div><!-- end uses-deals-add-form-->
    <div class="delimiter"></div>
    <div class="delimiter"></div>
    <div class="users-deals-display">
        <ul id="search-reviews-sorting">
            <li><a href="javascript:void(0)" target="_self" class="last-filter2-click selected" id="last-all-btn"><span class="text">Active</span><span class="end"></span></a></li>
            <li class="separator"></li>
            <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-hotels-btn"><span class="text">Closed</span><span class="end"></span></a></li>
        </ul>
        <div class="delimiter"></div>
        <div class="user-deal-detail">
            <div class="user-current-deals">
                <p><input type="submit" name="submit" id="submit" class="user-deal-submit" onclick="" value="New Deal" /></p>
                <p>Current Deals: <select  class="user-deals-select"><option value="" >Select Deal...</option><option value="" >Deal 1</option><option value="" >Deal 2</option></select></p>
            </div>
            <ul id="calendar-pricing-links">
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click selected" id="last-all-btn"><span class="text">Edit</span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-hotels-btn"><span class="text">Preview</span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-hotels-btn"><span class="text">Copy</span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-hotels-btn"><span class="text">Close</span><span class="end"></span></a></li>
                <br class="clear" />
            </ul><br class="clear" />
            <div class="user-current-deals-details">
                <table class="user-current-deals-fees">
                    <tr>
                        <th>Retail:</th>
                        <th>Customer Pays:</th>
                        <th>Groupon Fee:</th>
                        <th>Your Take:</th>
                    </tr>
                    <tr>
                        <td>$235</td>
                        <td>$185.00 <div class="percent">79%</div></td>
                        <td>$58.75<div class="percent">25%</div></td>
                        <td>$126.25<div class="percent">54%</div></td>
                    </tr>
                    <tr>
                        <td colspan="2">Terms</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">Max quantity:</td>
                        <td colspan="2">50</td>
                    </tr>
                    <tr>
                        <td colspan="2">Max per purchase quantity:</td>
                        <td colspan="2">4</td>
                    </tr>
                    <tr>
                        <td colspan="2">Locations:</td>
                        <td colspan="2">Main location<br />(305)534-6300<br />1775 Collins Avenue <br/> MIAMI, Florida, 33139</td>
                    </tr>
                    <tr>
                        <td colspan="2">Stats:</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">Created:</td>
                        <td colspan="2">May 19,2011</td>
                    </tr>
                    <tr>
                        <td colspan="2">Current earnings:</td>
                        <td colspan="2">$0</td>
                    </tr>
                </table>
            </div>
            <div class="user-current-deals-details">

            </div>
        </div>


        <div id="users-deals-calendar">
        </div>
    </div><!-- end users-deals-display-->
    <div class="delimiter"></div>
    <div class="delimiter"></div>
    <div class="users-daily-deals">
        <div class="users-deals-list">
            <ul id="search-reviews-sorting">
                <li>Generate customer list:</li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-all-btn">All</a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-hotels-btn">Unredeemed only</a></li>
            </ul>
            <br class="clear" />
        </div>
        <div class="delimiter"></div>
        <h2>Store Deals</h2>
        <div class="users-daily-deals-list">
            <table class="">
                  <tr>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Units Sold</th>
                    <th>Units Redeemed</th>
                    <th class="last">Redeemed Value</th>
                  </tr>
                  <tr>
                    <td>Active</td>
                    <td>50% Deals!</td>
                    <td>15</td>
                    <td>25</td>
                    <td>$255</td>
                  </tr>
                  <tr>
                    <td>Active</td>
                    <td>50% Deals!</td>
                    <td>15</td>
                    <td>25</td>
                    <td>$255</td>
                  </tr>
                  <tr>
                    <td colspan="5" class="no_deals">
                      You don't have any Store deals yet!
                      <a href="javascript:void(0)">Create one now.</a>
                    </td>
                  </tr>
                  
              </table>
        </div>
    </div><!-- end users-daily-deals-->
</div>