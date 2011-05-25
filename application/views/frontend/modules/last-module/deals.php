
    <div class="search-review-slider-content" id="slider-deals">
    <input type="hidden" name="last_no_pages" id="last_no_pages" value="<?echo $deals->num_rows()%2==0 ? $deals->num_rows()/2:intval($deals->num_rows()/2)+1;?>" />
<?php
    $i = 0;
    foreach ($deals->result() as $deal):
        $i++;
        if ($i==$last_curr_page){
?>
        <div class="search-review-deal-item">
            <div class="search-review-deal-image">
                <a href="<?=base_url().'offer/'.$deal->offer_id?>" target="_self">
                    <img src="<?=$deal->image;?>" title="<?=$deal->offer_name;?>" alt="" />
                </a>
            </div>
            <div class="search-review-deal-info">
                <p class="search-review-deal-info-title"><a href="<?=base_url().'offer/'.$deal->offer_id?>"><?=$deal->name;?></a></p>
                <p class="search-review-deal-info-location"><?=$deal->offer_name;?>, <?=$deal->offer_location;?></p>
                <div class="search-review-deal-info-price">
                    <a href="<?=base_url().'offer/'.$deal->offer_id?>">
                        <span class="box">
                            <?=$modules_last_deals_value?><br />
                            <span><?=$deal->value?><?=$deal->offer_currency == 0 ? $modules_last_euro_sign:$modules_last_dollar_sign?></span>
                        </span>
                        <span class="box">
                            <?=$modules_last_deals_discount?><br />
                            <span><?=$deal->percent?>%</span>
                        </span>
                        <span class="box">
                            <?=$modules_last_deals_save?><br />
                            <span><?=$deal->save?><?=$deal->offer_currency == 0 ? $modules_last_euro_sign:$modules_last_dollar_sign?></span>
                        </span>
                    </a>
                    <br class="clear" />
                </div>
                <a href="<?=base_url().'offer/'.$deal->offer_id?>" class="search-review-deal-info-timer">
                    <span class="text">
                        <?=$modules_last_deals_time_left?> 
                    </span>
                    <span id="last-countdown"></span>
                </a>
            </div>
            <br class="clear" />
        </div>
<?php
        }
    endforeach;
?>
        <div class="clear"></div>
    </div>
<?=';;;;;'.$deal_end_date?>