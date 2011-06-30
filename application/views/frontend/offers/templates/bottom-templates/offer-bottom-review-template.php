<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/bottom-templates/offer-bottom-review-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 26 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Bottom Review Template.
*/
?>

<?php
    if ($comments->num_rows() > 0){
        foreach ($comments->result() as $comment):
?>
    <div class="offer-bottom-review">
        <div class="review-left">
            <div class="review-left-top">
                <div class="review-left-image">
                    <a href=""><img src="<?=$comment->user_picture?>" width="62px" height="62px" alt="" /></a>
                </div>
                <div class="review-left-user">
                    <span class="review-left-user-name"><a href=""><?=$comment->first_name?> <br /><?=$comment->last_name?></a></span>
<!--                    <span class="review-left-user-status verified-buyer"><?=$offers_bottom_review_verified_buyer?></span>-->
                    <span class="review-left-user-status verified-review"><?=$offers_bottom_review_verified_review?></span>
                </div>
                <br class="clear" />
            </div>
            <div class="review-left-bottom">
                <?=$offers_bottom_review_registered_since?>, april 2011 <br /> ( <?=$comment->no_comments?> <?=$offers_bottom_review_reviews?> )
            </div>
        </div>
        <div class="review-right">
            <div class="review-right-buble-corner"></div>
            <div class="review-right-buble">
                <div class="review-title"><?=$comment->title?></div>
                <div class="review-rate-date">
                    <span class="rating-value"><?=$comment->rating?></span>
                    <span class="rating-stars">
                        <span class="rating-stars-value" style="width:<?=$comment->rating*12?>px;"></span>
                    </span>
                    <span class="review-date"><?=$comment->date?></span>
                </div>
                <div class="review-content">
                    <?=$comment->comment?>
                </div>
                <div class="review-report-problem">
                    > <a href="javascript:offer_showReportReview()"><?=$offers_bottom_review_abuse?></a>
                </div>
            </div>
        </div>
        <br class="clear" />
    </div>
<?php
        endforeach;
    }
    else{
        echo $offers_bottom_review_no_comments;
    }
?>