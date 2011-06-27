<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/forms/offer-add-review-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 26 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Add Review Form.
*/

?>
                <div class="offer-bottom-reviews-form">
                    <div class="offer-bottom-review">
                        <div class="review-left">
                            <div class="review-left-top">
                                <span class="review-write-note-title"><?=$offers_bottom_review_add_review_title?></span>
                                <span class="review-write-note-description"><?=$offers_bottom_review_add_review_instructions?></span>
                            </div>
                        </div>
                        <div class="review-right">
                            <div class="review-right-buble-corner"></div>
                            <div class="review-right-buble">
                                <form action="" method="post">
                                <div class="review-form-top">
                                    <div class="review-form-top-left">
                                        <div class="review-form-top-left-title">
                                            <?=$offers_bottom_review_add_review_your_rating?><br />
                                            <span class="small"><?=$offers_bottom_review_add_review_your_rating_info?></span>
                                        </div>
                                        <div class="big-stars">
                                            <span class="rating-value">0</span>
                                            <span id="add-review-rating-stars">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="review-form-top-right">
                                        <span class="right">&nbsp;</span>
                                        <?=$offers_bottom_review_add_zero_tolerance?>
                                    </div>
                                    <br class="clear" />
                                </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title title-left"><?=$offers_bottom_review_add_review_visit_time?></span>
                                    <select class="review-form-select">
                                        <option value=""> </option>
                                        <option value=""> 2011</option>
                                        <option value=""> 2010</option>
                                        <option value=""> 2009</option>
                                    </select>
                                </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title"><?=$offers_bottom_review_add_review_title?></span>
                                    <input type="text" name="review-form-title" id="review-form-title" />
                                </div>
                                <div class="review-form-row">
                                    <span class="review-form-row-title"><?=$offers_bottom_review_add_review_label?></span>
                                    <textarea name="review-form-content" id="review-form-content" cols="" rows=""></textarea>
                                    <div class="review-form-certify">
                                        <span class="left"><input type="checkbox" name="review-form-certify" id="review-form-certify" /></span>
                                        <span class="left"><label for="review-form-certify"><?=$offers_bottom_review_add_review_disclaimer?></label></span>
                                        <span class="right">&nbsp;</span>
                                        <br class="clear" />
                                    </div>
                                </div>
                                <div class="review-form-row review-form-row-last">
                                    <a target="_self" id="review-form-submit" href="#"><?=$offers_bottom_review_add_review_submit?></a>
<!--                                    <a target="_self" id="review-form-preview" href="#">Preview</a>-->
                                    <br class="clear" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <br class="clear" />
                    </div>
                </div>