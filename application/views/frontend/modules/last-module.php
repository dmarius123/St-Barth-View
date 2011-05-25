
    <div id="search-reviews">
        <ul id="search-reviews-nav">
            <li id="last-deals-btn" class="last-filter1-click selected"><a href="javascript:void(0)"><?=$modules_last_deals?></a></li>
            <li id="last-offers-btn" class="last-filter1-click"><a href="javascript:void(0)"><?=$modules_last_offers?></a></li>
            <li id="last-comments-btn" class="last-filter1-click"><a href="javascript:void(0)"><?=$modules_last_comments?></a></li>
        </ul>
        <input type="hidden" name="last_filter1" id="last_filter1" value="deals" />
        <input type="hidden" name="last_filter2" id="last_filter2" value="all" />
        <input type="hidden" name="last_curr_page" id="last_curr_page" value="1" />
        <div id="search-reviews-content">
            <ul id="search-reviews-sorting">
                <li>sort by :</li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click selected" id="last-all-btn"><span class="text"><?=$modules_last_all?></span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-hotels-btn"><span class="text"><?=$modules_last_hotels?></span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-villas-btn"><span class="text"><?=$modules_last_villas?></span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-spa-btn"><span class="text"><?=$modules_last_spa_beauty?></span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-shopping-btn"><span class="text"><?=$modules_last_shopping?></span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-services-btn"><span class="text"><?=$modules_last_services?></span><span class="end"></span></a></li>
                <li class="separator"></li>
                <li><a href="javascript:void(0)" target="_self" class="last-filter2-click" id="last-restaurants-btn"><span class="text"><?=$modules_last_restaurants?></span><span class="end"></span></a></li>
            </ul>
            <div id="search-review-slider">
                <a class="slider-nav-left" id="last-prev-arrow" href="javascript:void(0)"></a>
                <a class="slider-nav-right" id="last-next-arrow" href="javascript:void(0)"></a>
                <div id="search-review-slider-content-container"></div>
<?php //$this->load->view('frontend/modules/last-module/comments'); ?>
<?php //$this->load->view('frontend/modules/last-module/offers'); ?>
<?php //$this->load->view('frontend/modules/last-module/deals'); ?>
            </div>
        </div>
    </div>