<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/offers/hotels/hotel-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 02 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Hotel template.
*/

?>
    <div id="user-offer-edit-top">
        <a href=""><span class="text">Complete : details, gallery for requesting</span><span class="end"></span></a>
    </div>
    <ul id="offers-list">
        <li>
            <span class="image">
                <span class="image-container"><img src="<?=$hotel['first_image']?>" title="<?=$hotel['name']?>" alt="" /></span>
            </span>
            <span class="content">
                <span class="number">#<?=$hotel['id']?>.</span>
                <span class="title"><?=$hotel['name']?></span>
                <span class="location"></span>
                <span class="rating-value"><?=number_format($hotel['rating'], 1, '.', '')?></span>
                <span class="rating-stars">
                    <span class="rating-stars-value"  style="width:<?=$hotel['rating']*12?>px;"></span>
                </span>
                <span class="clear separator"></span>
                <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon <?php echo $hotel['no_comments'] == 0 ? 'no-comments':'' ?>"></span><span class="no"><?=$hotel['no_comments']?></span><br /><span class="text"><?=$user_offers_comments?></span></a></span>
                <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon <?php echo $hotel['no_friends'] == 0 ? 'no-friends':'' ?>"></span><span class="no"><?=$hotel['no_friends']?></span><br /><span class="text"><?=$user_offers_friends?></span></a></span>
                <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon <?php echo $hotel['no_deals'] == 0 ? 'no-deals':'' ?>"></span><span class="no"><?=$hotel['no_deals']?></span><br /><span class="text"><?=$user_offers_deals?></span></a></span>
                <span class="owner"><span class="last-comment">Last comment</span> <a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name"></span></a><br />at: -</span>
                <br class="clear" />
                <span class="description"><?=$hotel['short_description']?></span>
                <span class="price"><span class="pre-text"><?=$user_offers_from?></span><span class="sum"><?=$hotel['start_price']?></span><span class="currency-icon"><?php echo $hotel['currency'] == 0 ? $user_euro_icon:$user_dollar_icon ?></span></span>
            </span>
            <br class="clear" />
            <span class="actions">
                <a href="#edit-hotel-details:<?=$hotel['id']?>" onclick="javascript:user_parseContent()"><!--<span class="valid"></span>--><?=$user_offers_table_edit_details?></a>
                <a href="#edit-hotel-gallery:<?=$hotel['id']?>" onclick="javascript:user_parseContent()"><!--<span class="<?php echo $hotel['no_images'] > 0 ? 'valid':'invalid' ?>"></span>--><?=$user_offers_table_edit_gallery?></a>
                <a href="#edit-hotel-pricing:<?=$hotel['id']?>" onclick="javascript:user_parseContent()"><!--<span class="<?php echo $hotel['start_price'] > 0 ? 'valid':'invalid' ?>"></span>--><?=$user_edit_hotel_pricing?></a>
            </span>
        </li>
    </ul>
    <div style="height: 1px; display: block;"></div>
    <div class="user-offers-list-content">
        <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; user_parseContent()" value="<?=$user_offers_back?>" />
        <br class="clear" />
    </div>
    <div class="user-bottom"></div>