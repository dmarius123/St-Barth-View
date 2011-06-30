<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/forms/offer-report-review-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Report Review Form.
*/

?>
                <div class="offer-bottom-reviews-form">
                    <div class="offer-bottom-review-add">
                        <div class="review-left">
                            <div class="review-left-top">
                                <span class="review-write-note-title"><?=$offers_bottom_review_add_review_title?></span>
                                <span class="review-write-note-description" id="review-write-note-description"><?=$offers_bottom_review_add_review_instructions?></span>
                            </div>
                        </div>
                        <div class="review-right">
                            <div class="review-right-buble-corner"></div>
                            <div class="review-right-buble">
                                <form action="" method="post" onsubmit="return offer_submitReview()">
                                    <div class="review-form-certify">
                                        <label for="review_form_certify" id="review_form_certify_label"><?=$offers_bottom_review_add_review_disclaimer?></label>                                       
                                    </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title" id="review_form_content_label"><?=$offers_bottom_review_add_review_label?></span>
                                    <textarea name="review_form_content" id="review_form_content" cols="" rows=""></textarea>                                    
                                </div>
                                <div class="review-form-row review-form-row-last">
                                    <input type="submit" name="review-form-submit" id="review-form-submit" value="<?=$offers_bottom_review_add_review_submit?>" />
<!--                                    <a target="_self" id="review-form-preview" href="#">Preview</a>-->
                                    <br class="clear" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <br class="clear" />
                    </div>
                </div>