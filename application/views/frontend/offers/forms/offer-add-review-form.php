<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/forms/offer-add-review-form.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Add Review Form.
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
                                <div class="review-form-top">
                                    <div class="review-form-top-left">
                                        <div class="review-form-top-left-title" id="review_form_rating_label">
                                            <?=$offers_bottom_review_add_review_your_rating?><br />
                                            <span class="small"><?=$offers_bottom_review_add_review_your_rating_info?></span>
                                        </div>
                                        <div class="big-stars">
                                            <span id="add-review-rating-stars"></span>
                                            <span class="rating-value" id="add-review-rating-value">0.0</span>
                                        </div>
                                    </div>
                                    <div class="review-form-top-right">
                                        <span class="right">&nbsp;</span>
                                        <?=$offers_bottom_review_add_zero_tolerance?>
                                    </div>
                                    <br class="clear" />
                                </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title title-left" id="review_form_year_label"><?=$offers_bottom_review_add_review_visit_time?></span>
                                    <select class="review-form-select" id="review_form_year">
                                        <option value=""> </option>
                                        <option value="2009"> 2009</option>
                                        <option value="2010"> 2010</option>
                                        <option value="2011"> 2011</option>
                                    </select>
                                </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title" id="review_form_title_label"><?=$offers_bottom_review_add_review_title?></span>
                                    <input type="text" name="review_form_title" id="review_form_title" value />
                                </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title" id="review_form_content_label"><?=$offers_bottom_review_add_review_label?></span>
                                    <textarea name="review_form_content" id="review_form_content" cols="" rows=""></textarea>
                                    <div class="review-form-certify">
                                        <span class="left"><input type="checkbox" name="review_form_certify" id="review_form_certify" /></span>
                                        <span class="left"><label for="review_form_certify" id="review_form_certify_label"><?=$offers_bottom_review_add_review_disclaimer?></label></span>
                                        <span class="right">&nbsp;</span>
                                        <br class="clear" />
                                    </div>
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