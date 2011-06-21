<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/results/map-results.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 18 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Results - Map Display.
*/

?>
<?php
    $i = 0;
    $curr_date = date('Y-m-d H:i:s');
    $offers_coordinates = 'var offers_coordinates = new Array(';

    foreach ($offers->result() as $offer):
        $i++;
        $position = $i-($curr_page-1)*10;

        if ($position != 1){
            $offers_coordinates .= ', "'.$offer->id.','.$offer->coordinates.','.$position.','.$i.','.$offer->title.','.$offer->image.'"';
        }
        else{
            $offers_coordinates .= '"'.$offer->id.','.$offer->coordinates.','.$position.','.$i.','.$offer->title.','.$offer->image.'"';
        }
    endforeach;

    $offers_coordinates .= ');';

    echo '<script type="text/JavaScript">'.$offers_coordinates.'</script>';
?>
    <li id="map-results"></li>