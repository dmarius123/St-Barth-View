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
    <h2><?=$user_offers_title?></h2>
    <span class="title-separator"></span>
    <input type="button" name="add-hotel" index="add-hotel" class="user-area-submit-style" value="<?=$user_add_hotel?>" onClick="parent.location = '#add-hotel'; parseContent()">
    <input type="button" name="add-villa" index="add-villa" class="user-area-submit-style" value="<?=$user_add_villa?>" onClick="parent.location = '#add-villa'; parseContent()">
    <br class="clear" />
    <div class="user-bottom"></div>