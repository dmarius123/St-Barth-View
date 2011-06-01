<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/offers/offers-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offers content.
*/

?>
    <h2><?=$user_offers_title?></h2>
    <span class="title-separator"></span>
    <input type="button" name="add-hotel" id="add-hotel" class="user-area-submit-style" value="<?=$user_add_hotel?>" onClick="parent.location = '#add-hotel'; user_parseContent()">
    <input type="button" name="add-villa" id="add-villa" class="user-area-submit-style" value="<?=$user_add_villa?>" onClick="parent.location = '#add-villa'; user_parseContent()">
    <br class="clear" />
    <div class="user-bottom"></div>