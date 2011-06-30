<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/bottom-templates/offer-bottom-reviews-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Bottom Content Template.
*/

?>
<?php //$this->load->view('frontend/offers/forms/offer-add-review-form'); ?>
                <div class="offer-bottom-reviews">
                    <div class="offer-bottom-reviews-add">
                        <div>
<?php
    if (isset($is_login)){
        if ($is_login){
?>
                            <span>&nbsp; </span><a href="javascript:offer_showAddReview()" class="offer-bottom-reviews-add-btn"> <?=$offers_bottom_review_add_review?></a>
<?php
        }
        else{
?>
                            <span>&nbsp; </span><?=anchor('user', $offers_bottom_review_sign_in, 'class="offer-bottom-reviews-add-btn"')?>
<?php
        }
    }
    else{
?>
                            <span>&nbsp; </span><?=anchor('user', $offers_bottom_review_sign_in, 'class="offer-bottom-reviews-add-btn"')?>
<?php
    }
?>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="offer-bottom-reviews-comments">
<?php $this->load->view('frontend/offers/templates/bottom-templates/offer-bottom-review-template'); ?>
                    </div>
                </div>