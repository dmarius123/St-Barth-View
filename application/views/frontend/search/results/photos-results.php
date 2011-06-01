<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/results/photos-results.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Results - Photos Display.
*/

?>
<?php
    $i = 0;
    $curr_date = date('Y-m-d H:i:s');
    
    foreach ($offers->result() as $offer):
        $i++;

        if ($i>($curr_page-1)*10 && $i<=$curr_page*10){
            if ($i%2 != 0){
?>
                <li>
<?php
            }
            else{
                echo '<li class="right">';
            }
?>
                <span class="image">
                    <?php echo $offer->wow == 1 ? '<span class="wow"></span>':''; ?>
                    <span class="image-container"><img src="<?php echo $offer->image != '' ? $offer->image:'none'; ?>" title="<?=$offer->name?>" width="305" height="210" alt="" /></span>
                </span>
                <span class="content-top">
                    <span class="number">#<?=($curr_page-1)*10+$i?>.</span>
                    <span class="title"><?=$offer->title?></span>
                    <!--<span class="location">St Barts</span>-->
<?php echo (strtotime($curr_date)-strtotime($offer->date_created))/86400 < 30 ? '<span class="new"></span>':''; ?>
                    <span class="rating-value"><?=number_format($offer->rating, 1, '.', '')?></span>
                    <span class="rating-stars">
                        <span class="rating-stars-value" style="width:<?=$offer->rating*12?>px;"></span>
                    </span>
                    <br class="clear" />
                </span>
                <span class="content-bottom">
                    <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer->no_comments > 0 ? '':' no-comments'; ?>"></span><span class="no"><?=$offer->no_comments?></span><br /><span class="text"><?=$search_offer_comments?></span></a></span>
                    <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer->no_likes > 0 ? '':' no-likes'; ?>"></span><span class="no"><?=$offer->no_likes?></span><br /><span class="text"><?=$search_offer_likes?></span></a></span>
                    <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer->no_deals > 0 ? '':' no-deals'; ?>"></span><span class="no"><?=$offer->no_deals?></span><br /><span class="text"><?=$search_offer_deals?></span></a></span>
                    <span class="price"><span class="pre-text"><?=$search_offer_from?></span><br /><span class="sum"><?=$offer->start_price?></span><span class="currency-icon"><?php echo $offer->currency == 0 ? $search_offer_euros:$search_offer_dollars; ?></span></span>
                    <br class="clear" />
                </span>
                <br class="clear" />
            </li>
<?php
            if ($i%2 == 0){
                echo '<br class="clear" />';
            }
        }
    endforeach;
?>
<!--
    <li>
        <span class="image">
            <span class="wow"></span>
            <img src="<?php //echo base_url()?>assets/frontend/gui/images/review-image.jpg" width="305" height="210" alt="" />
        </span>
        <span class="content-top">
            <span class="number">#1.</span>
            <span class="title">La Banane</span>
            <!--<span class="location">St Barts</span>-->
<!--            <span class="new"></span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <br class="clear" />
        </span>
        <span class="content-bottom">
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">like</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="price"><span class="pre-text">from</span><br /><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <br class="clear" />
        </span>
        <br class="clear" />
    </li>
    <li class="right">
        <span class="image">
            <span class="wow"></span>
            <img src="<?php //echo base_url()?>assets/frontend/gui/images/review-image.jpg" width="305" height="210" alt="" />
        </span>
        <span class="content-top">
            <span class="number">#1.</span>
            <span class="title">La Banane</span>
            <!--<span class="location">St Barts</span>-->
<!--            <span class="new"></span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <br class="clear" />
        </span>
        <span class="content-bottom">
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">like</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="price"><span class="pre-text">from</span><br /><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <br class="clear" />
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="wow"></span>
            <img src="<?php //echo base_url()?>assets/frontend/gui/images/review-image.jpg" width="305" height="210" alt="" />
        </span>
        <span class="content-top">
            <span class="number">#1.</span>
            <span class="title">La Banane</span>
            <!--<span class="location">St Barts</span>-->
<!--            <span class="new"></span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <br class="clear" />
        </span>
        <span class="content-bottom">
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">like</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="price"><span class="pre-text">from</span><br /><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <br class="clear" />
        </span>
        <br class="clear" />
    </li>
    <li class="right">
        <span class="image">
            <span class="wow"></span>
            <img src="<?php //echo base_url()?>assets/frontend/gui/images/review-image.jpg" width="305" height="210" alt="" />
        </span>
        <span class="content-top">
            <span class="number">#1.</span>
            <span class="title">La Banane</span>
            <!--<span class="location">St Barts</span>-->
<!--            <span class="new"></span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <br class="clear" />
        </span>
        <span class="content-bottom">
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">like</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="price"><span class="pre-text">from</span><br /><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <br class="clear" />
        </span>
        <br class="clear" />
    </li>
    <br class="clear" />
-->