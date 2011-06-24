<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/filters/locality-filter.php
 * File Version            : 1.2
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 17 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Filters - Locality.
*/

?>
<?php
    $localities_list_options = '';

    foreach ($localities_list->result() as $locality):
        $localities_list_options .= '<option value="'.$locality->id.'" selected="selected">'.$locality->name.'</option>';
    endforeach;

    $localities_list_options .= '<option value="0" selected="selected">'.$search_filters_localities_others.'</option>';
?>
    <ul class="filter" id="localities-filter">
        <li>
            <a href="javascript:void(0)" class="filter-header"><?=$search_filters_localities?></a>
            <ul>
                <li>
                    <select name="locality" id="locality" size="2" multiple="multiple" onchange="search_searchAjax()">
                        <?=$localities_list_options?>
                    </select>
                </li>
            </ul>
        </li>
    </ul>