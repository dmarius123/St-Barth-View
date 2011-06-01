<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/submenus/offers-submenu.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offers Submenu.
*/

?>
<?php
    echo ';;;';

    if ($hotels_list->num_rows() > 0){
        echo '<ul>';

        $i = 0;
        foreach ($hotels_list->result() as $row):
            $i++;
            if ($row->no_images == 0 || $row->start_price == 0){
?>
                <li>
                    <a href="#hotel:<?=$row->id?>" id="offer-<?=$row->id?>" onclick="javascript:user_parseContent()">
                        <strong><?=$user_offers_hotel?></strong>:&nbsp;<?=$row->name?>
                    </a>
                </li>
<?php
            }
        endforeach;
        
        echo '</ul>';
    }

    if ($villas_list->num_rows() > 0){
        echo '<ul>';

        $i = 0;
        foreach ($villas_list->result() as $row):
            $i++;
?>
                <li>
                    <a href="#villa:<?=$row->id?>" id="offer-<?=$row->id?>" onclick="javascript:user_parseContent()">

                        <strong><?=$user_offers_villa?></strong>:&nbsp;<?=$row->name?>
                    </a>
                </li>
<?php
        endforeach;

        echo '</ul>';
    }
?>