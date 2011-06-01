<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/filters/location-filter.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Filters - Location.
*/

?>
    <input type="hidden" name="search_location" id="search_location" value="<?=$home_search_location?>" />
    <ul class="filter">
        <li>
            <a href="javascript:void(0)" class="filter-header">location</a>
            <ul>
                <li>
                    <select name="search_location" id="search_location" size="2" multiple="multiple" onchange="locationChange(this.value)">
                        <option value="Miami">Miami</option>
                        <option value="St Barthélemy">St Barthélemy</option>
                    </select>
                </li>
            </ul>
            <!--
            <ul>
                <li><input type="checkbox" id="location1" name="location1" class="filter-checkbox" value="Miami" />Miami</li>
                <li><input type="checkbox" id="location2" name="location2" class="filter-checkbox" value="St Barthélemy" />St Barthélemy</li>
            </ul>
            -->
        </li>
    </ul>