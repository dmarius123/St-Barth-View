<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/bottom-templates/offer-bottom-menu-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 26 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Bottom Menu Template.
*/

?>
                <ul id="offer-bottom-menu" class="sorting-menu">
                    <li><a href="javascript:offer_showDescription()" target="_self" class="selected" id="offer-bottom-menu-description"><span class="text"><?=$offers_bottom_menu_description?></span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:offer_showAmenities()" target="_self" id="offer-bottom-menu-amenities"><span class="text"><?=$offers_bottom_menu_amenities?></span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:offer_showRooms()" target="_self" id="offer-bottom-menu-rooms"><span class="text"><?=$offers_bottom_menu_rooms?></span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:offer_showMap()" target="_self" id="offer-bottom-menu-map"><span class="text"><?=$offers_bottom_menu_map?></span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:offer_showLocations()" target="_self" id="offer-bottom-menu-locations"><span class="text"><?=$offers_bottom_menu_locations?></span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:offer_showReviews()" target="_self" id="offer-bottom-menu-reviews"><span class="text"><?=$offers_bottom_menu_reviews?></span><span class="end"></span></a></li>
                </ul>