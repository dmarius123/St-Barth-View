<?php
    echo ';;;';
    
    if ($hotels_list->num_rows() > 0){
?>
        <ul>
<?php
        $i = 0;

        foreach ($hotels_list->result() as $row):
            $i++;

            if ($row->no_images == 0 || $row->start_price == 0){
?>
                <li>
                    <a href="#hotel:<?=$row->id?>" id="offer-<?=$row->id?>" onclick="javascript:parseContent()">
                        <span class="invalid"></span>
                        <strong><?=$user_offers_hotel?></strong>:&nbsp;<?=$row->name?>
                    </a>
                </li>
<?php
            }
            else{
?>
                <li>
                    <a href="#hotel:<?=$row->id?>" id="offer-<?=$row->id?>" onclick="javascript:parseContent()">
                        <span class="valid"></span>
                        <strong><?=$user_offers_hotel?></strong>:&nbsp;<?=$row->name?>
                    </a>
                </li>
<?php
            }
        endforeach;
?>
        </ul>
<?php
    }

    if ($villas_list->num_rows() > 0){
?>
        <ul>
<?php
        $i = 0;

        foreach ($villas_list->result() as $row):
            $i++;

            if ($row->no_images == 0 || $row->start_price == 0){
?>
                <li>
                    <a href="#villa:<?=$row->id?>" id="offer-<?=$row->id?>" onclick="javascript:parseContent()">
                        <span class="invalid"></span>
                        <strong><?=$user_offers_villa?></strong>:&nbsp;<?=$row->name?>
                    </a>
                </li>
<?php
            }
            else{
?>
                <li>
                    <a href="#villa:<?=$row->id?>" id="offer-<?=$row->id?>" onclick="javascript:parseContent()">
                        <span class="valid"></span>
                        <strong><?=$user_offers_villa?></strong>:&nbsp;<?=$row->name?>
                    </a>
                </li>
<?php
            }
        endforeach;
?>
        </ul>
<?php
    }
?>