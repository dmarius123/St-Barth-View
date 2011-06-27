<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/bottom-templates/offer-bottom-reviews-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 26 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Bottom Content Template.
*/

?>
<?php //$this->load->view('frontend/offers/forms/offer-add-review-form'); ?>
                <div class="offer-bottom-reviews">
                    <div class="offer-bottom-reviews-add">
                        <div>
                            <span>&nbsp; </span><a href="javascript:offer_showAddReview()" class="offer-bottom-reviews-add-btn"> <?=$offers_bottom_review_add_review?></a>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="offer-bottom-reviews-comments">
<?php
    if ($comments->num_rows() > 0){
        foreach ($comments as $comment):
            $this->load->view('frontend/offers/templates/bottom-templates/offer-bottom-review-template');
        endforeach;
    }
    else{
        echo $offers_bottom_review_no_comments;
    }
?>
                        <br class="clear" />
                    </div>
                </div>