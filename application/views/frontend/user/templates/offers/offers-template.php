<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/offers/offers-template.php
 * File Version            : 1.3
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offers content.
*/

?>
    <h2><?=$user_offers_title?></h2>
    <span class="title-separator"></span>
    <select name="add_action" id="add_action" class="user-area-add-select-style">
        <option value="add-hotel"><?=$user_add_hotel?></option>
        <option value="add-villa"><?=$user_add_villa?></option>
        <option value="add-car"><?=$user_add_car?></option>
        <option value="add-spa-beauty"><?=$user_add_beauty?></option>
        <option value="add-chef"><?=$user_add_chef?></option>
        <option value="add-boat"><?=$user_add_boat?></option>
        <option value="add-babysitter"><?=$user_add_babysitter?></option>
        <option value="add-massage"><?=$user_add_massage?></option>
    </select>
    <input type="button" name="add_hotel" id="add_hotel" class="user-area-submit-style" value="<?=$user_add_continue?>" onClick="parent.location = '#'+$('#add_action').val(); user_parseContent()">
    <br class="clear" />
    <div class="user-bottom"></div>