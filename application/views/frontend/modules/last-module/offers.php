<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/modules/last-module/offers.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Last Items Module - Offers.
*/

?>
    <div class="search-review-slider-content" id="slider-offers">
    <input type="hidden" name="last_no_pages" id="last_no_pages" value="<?echo $offers->num_rows()%2==0 ? $offers->num_rows()/2:intval($offers->num_rows()/2)+1;?>" />
<?php
    $i = 0;
    foreach ($offers->result() as $offer):
        $i++;
        if ($i==$last_curr_page*2-1 || $i==$last_curr_page*2){
?>
        <div class="search-review-item<?php echo $i%2==0 ? ' last':''; ?>">
            <p class="search-review-item-name"><a href="<?=base_url().'offer/'.$offer->id?>"><span><?=$offer->name;?></span></a> <span class="search-review-item-location"><?=$offer->location;?></span><br class="clear" /></p>
            <p class="search-review-item-postdate"><?=$modules_last_offers_since?> <?=$offer->date?></p>
            <p class="search-review-item-description">
                <span class="image">
                    <a href="<?=base_url().'offer/'.$offer->id?>">
                        <span class="last-image-container">
                            <img src="<?php echo $offer->image != '' ? $offer->image:'none'; ?>" title="<?=$offer->name?>" alt="" />
                        </span>
                    </a>
                </span>
                <a href="<?=base_url().'offer/'.$offer->id?>">
                    <?=$offer->short_description?>
                </a>
                <br class="clear" />
            </p>
            <div class="search-review-item-author-price">
                <p class="search-review-item-author">
                    <a href="<?=base_url().'user/profile/view/'.$offer->user_id?>">
                        <span class="icon">
    <?php if ($offer->profile_picture != ''){ ?>
                            <img src="<?=$offer->profile_picture?>" title="<?=$offer->first_name?> <?=$offer->last_name?>" width="25px" height="25px" alt="" />
    <?php } ?>
                        </span>
                    </a>
                    <span class="owner"><?=$modules_last_offers_owner?><br /><a href="<?=base_url().'user/profile/view/'.$offer->user_id?>"><?=$offer->first_name?> <?=$offer->last_name?></a></span>
                </p>
                <span class="search-review-item-price"><?=$modules_last_offers_from?> <span><?=$offer->start_price?><?php echo $offer->currency == 0 ? $modules_last_euro_sign:$modules_last_dollar_sign; ?></span></span>
                <br class="clear" />
            </div>
        </div>
<?php
        }
    endforeach;
?>
        <div class="clear"></div>
    </div>