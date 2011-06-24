<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/offer-top-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 21 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Top Template.
*/

?>
<?php $curr_date = date('Y-m-d H:i:s'); ?>
        <div id="offer-top">
            <span class="title"><?=$offer['name']?><span class="location"><?=$offer['location']?><?=$offer['country'] == '' ? '':', '.$offer['country']?><?=$offer['locality'] == '' ? '':', '.$offer['locality']?></span></span>
<?php echo (strtotime($curr_date)-strtotime($offer['date_created']))/86400 < 30 ? '<span class="new"></span>':''; ?>
            <span class="rating-value-stars">
                <span class="rating-value"><?=number_format($offer['rating'], 1, '.', '')?></span>
                <span class="rating-stars">
                    <span class="rating-stars-value" style="width:<?=$offer['rating']*12?>px;"></span>
                </span>
            </span>
<?php if ($offer['no_comments'] > 0){ ?>
            <a href="javascript:void(0)" target="_self"><?php echo $offer['last_comment_profile_picture'] != '' ? '<img src="'.$offer['last_comment_profile_picture'].'" tittle="'.$offer['last_comment_first_name'].' '.$offer['last_comment_last_name'].'" alt="" />':''; ?></a>
            <span class="owner">
                <span class="last-comment"><?=$offers_last_comment?>
                    <a href="<?=base_url()?>user/profile/view/<?=$offer['last_comment_user_id']?>" target="_self">
                        <span class="icon"><?php echo $offer['last_comment_profile_picture'] != '' ? '<img src="'.$offer['last_comment_profile_picture'].'" tittle="'.$offer['last_comment_first_name'].' '.$offer['last_comment_last_name'].'" alt="" />':''; ?></span>
                        <span class="first-name"><?=$offer['last_comment_first_name']?> <?=substr($offer['last_comment_last_name'], 0, 1)?>.</span>
                    </a><br />
                    <?=$offers_last_comment_at?> <?=$offer['last_comment_date']?>
                </span>
            </span>
<?php }
      else{
?>
            <span class="owner"><span class="no-comment" style="padding: 6px 0 0 0;"><?=$offers_no_comments?></span></span>
<?php } ?>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer['no_deals'] > 0 ? '':' no-deals'; ?>"></span><span class="no"><?=$offer['no_deals']?></span><br /><span class="text"><?=$offers_deals?></span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer['no_friends'] > 0 ? '':' no-friends'; ?>"></span><span class="no"><?=$offer['no_friends']?></span><br /><span class="text"><?=$offers_friends?></span></a></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer['no_comments'] > 0 ? '':' no-comments'; ?>"></span><span class="no"><?=$offer['no_comments']?></span><br /><span class="text"><?=$offers_comments?></span></a></span>
        </div>