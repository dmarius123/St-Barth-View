<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/filters/amenities-filter.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Filters - Amenities.
*/

?>
    <ul class="filter">
        <li>
            <a href="javascript:void(0)" class="filter-header"><?=$search_filters_amenities?></a>
            <ul>
<?php
    foreach ($amenities->result() as $amenity):
        if ($home_search_category == '1'){
            echo '<li><input type="checkbox" id="amenity'.$amenity->id.'" name="amenity'.$amenity->id.'" class="filter-checkbox" value="" />'.$general_amenities_hotels[$amenity->index].'</li>';
        }
        else{
            echo '<li><input type="checkbox" id="amenity'.$amenity->id.'" name="amenity'.$amenity->id.'" class="filter-checkbox" value="" />'.$general_amenities_villas[$amenity->index].'</li>';
        }
    endforeach;
?>
            </ul>
        </li>
    </ul>