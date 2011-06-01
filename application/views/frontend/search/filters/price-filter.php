<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/filters/price-filter.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Filters - Price.
*/

?>
    <input type="hidden" name="search_low_price" id="search_low_price" value="" />
    <input type="hidden" name="search_high_price" id="search_high_price" value="" />
    <ul class="filter">
        <li>
            <a href="javascript:void(0)" class="filter-header"><?=$search_filters_price?></a>
            <ul>
                <li id="price-values">
                    <span class="low-price-currency">&euro;</span>
                    <span id="low-price"></span>
                    <span id="high-price"></span>
                    <span class="high-price-currency">&euro;</span>
                    <br class="clear" />
                </li>
                <li id="price-range"></li>
            </ul>
        </li>
    </ul>