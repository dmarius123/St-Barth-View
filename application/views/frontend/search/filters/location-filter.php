<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/filters/location-filter.php
 * File Version            : 1.2
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 19 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Filters - Location.
*/

?>
    <ul class="filter">
        <li>
            <a href="javascript:void(0)" class="filter-header"><?=$search_filters_locations?></a>
            <ul>
                <li>
                    <select name="location" id="location" size="2" multiple="multiple" onchange="search_locationChange()">
<?php
    foreach ($locations_list->result() as $location):
        $country = $location->country == 'none' ? '':', '.$location->country;
        if ($location->id == $home_search_location){
            echo '<option value="'.$location->id.'" selected="selected">'.$location->name.$country.'</option>';
        }
        else{
            echo '<option value="'.$location->id.'">'.$location->name.$country.'</option>';
        }
    endforeach;
?>
                    </select>
                </li>
            </ul>
        </li>
    </ul>