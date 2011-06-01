<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/hotel/templates/hotel-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Hotel Template.
*/

?>
<?php $this->load->view('frontend/header'); ?>
    <div id="section" class="offer-section">
        <div id="offer-top">
            <span class="title">La Banane <span class="location">St Barth, Lorient</span></span>
            <span class="new"></span>
            <span class="rating-value-stars">
                <span class="rating-value">4.0</span>
                <span class="rating-stars">
                    <span class="rating-stars-value"></span>
                </span>
            </span>
            <a href="javascript:void(0)" target="_self"><span class="owner-icon"></span></a>
            <span class="owner">
                <span class="last-comment">Last comment <a href="javascript:void(0)" target="_self"><span class="first-name">Alexandre A.</span></a><br />
                at: 12/12/2010 - 5:57pm</span>
            </span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">2</span><br /><span class="text">deals</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">220</span><br /><span class="text">like</span></a></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">2000</span><br /><span class="text">comments</span></a></span>
        </div>
        <div id="offer-content">
            <div id="offer-main">
                <div id="offer-image-container">
                    <img src="<?php echo base_url()?>assets/frontend/gui/images/offer_detail_img.jpg" alt="" width="660" height="450"/>
                </div>
                <div id="rates-slider"class="hidden-slider" style="display:none;">
                    <div class="slider-left"> <a href="">>></a> </div>
                    <div class="slider-right">
                        <div class="rates-calendar">
                            calendar container here
                        </div>
                        <p class="rates-calendar-actions"><a href=""> > Annual rates</a></p>
                    </div>
                    <br class="clear" />
                </div>
                <div id="deal-slider" class="hidden-slider" style="display:block;">
                    <div class="slider-left"> <a href="">>></a> </div>
                    <div class="slider-right">
                        <p class="title">Ultimate carribbean luxury hotel<br />for 2 pers cars included !</p>
                        <p class="location">Eden Rock Hotel, St Barth</p>
                        <div class="deal-details">
                            <div class="deal-image">
                                <img src="<?php echo base_url()?>assets/frontend/gui/images/offer_detail_img.jpg" alt="" width="245" height="170"/>
                            </div>
                            <div class="deal-details-content">
                                <div class="deal-info-price">
                                    <a href="javascript:void(0)">
                                        <span class="box">
                                            VALUE<br />
                                            <span>2500&euro;</span>
                                        </span>
                                        <span class="box">
                                            DISCOUNT<br />
                                            <span>50%</span>
                                        </span>
                                        <span class="box">
                                            YOU SAVE<br />
                                            <span>1750&euro;</span>
                                        </span>
                                    </a>
                                    <br class="clear" />
                                </div>
                                <div class="deal-info-details">
                                    <a href="javascript:void(0)" class="deal-info-timer">
                                        <span class="text">
                                            time left to buy
                                        </span>
                                        <span class="clock">2 days 13:03:37</span>
                                    </a>
                                    <div class="deal-info-bought">
                                        <p class="bought">4 bought</p>
                                        <div class="metter">
                                            <div class="min">1</div>
                                            <div class="graphic">
                                                <div class="marker" style="left:94px;"></div>
                                                <div class="graphic-metter" style="width:100px;"></div>
                                            </div>
                                            <div class="max">5</div>
                                            <br class="clear" />
                                        </div>
                                        <p class="left-bought">1 more needed to get the deal</p>
                                    </div>
                                </div>
                                <br class="clear" />
                            </div>
                            <div class="extra-info">
                                <div class="fine-print">
                                    <p class="title">The Fine Print</p>
                                    <p class="description">
                                        hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié n hôtel secret, une adresse.<br />
                                        <a href="">See the rules</a> that apply to all deals.
                                    </p>
                                </div>
                                <div class="highlights">
                                    <p class="title">Highlights</p>
                                    <ul class="features">
                                        <li>- 16-foot inflatable movie screen</li>
                                        <li>- Quality projection and sound</li>
                                        <li>- Up to 75 guests</li>
                                    </ul>
                                </div>
                                <br class="clear" />
                                <p class="extra-content">When deprived of flavorful sustenance, the mouth will often retaliate by shouting your bank-account number at sporting events or turning every sentence into a high-pitched jingle. Tame an unruly tongue with today’s Groupon: for $15, you get $30 worth of Mediterranean-inspired Italian</p>
                            </div>
                        </div>
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <div id="offer-sidebar">
                <div id="offer-booking">
                    <p class="offer-booking-price">2500<span class="balance">&euro;</span></p>
                    <div class="offer-booking-form">
                        <form action="" method="post">
                            <div class="offer-booking-form-row">
                                <div class="booking-form-field">
                                    <label>TRAVEL DATES </label>
                                    <input class="booking-input" id="booking-checkin" type="text" value="Check In">
                                    <input id="booking-checkout" class="booking-input" type="text" value="Check Out">
                                    <br class="clear">
                                </div>
                            </div>
                            <div class="offer-booking-form-row-multiple">
                                <div class="booking-form-field-select">
                                    <label>NB ROOM</label>
                                    <select name="nr_rooms" class="booking-form-select-small">
                                        <option >0</option>
                                        <option >1</option>
                                        <option >2</option>
                                        <option >3</option>
                                        <option >4</option>
                                    </select>
                                </div>
                                <div class="booking-form-field-select">
                                    <label>ADULTS</label>
                                    <select name="adults" class="booking-form-select-small">
                                        <option >0</option>
                                        <option >1</option>
                                        <option >2</option>
                                        <option >3</option>
                                        <option >4</option>
                                    </select>
                                </div>
                                <div class="booking-form-field-select">
                                    <label>CHILDREN</label>
                                    <select name="kids" class="booking-form-select-small">
                                        <option >0</option>
                                        <option >1</option>
                                        <option >2</option>
                                        <option >3</option>
                                        <option >4</option>
                                    </select>
                                </div>
                                <a class="booking_read_more" href=""> >> more</a>
                                <br class="clear" />
                            </div>
                            <div class="offer-booking-form-row">
                                <div class="offer-booking-btn-rates">
                                    <div class="booking-rates">
                                        <a href="">Rates</a>
                                    </div>
                                    <div class="booking-rates-hover" style="display:none;">
                                        <a href="">Rates</a>
                                    </div>
                                </div>
                                <div class="offer-booking-btn-instant-book"><a href="" class="booking-instant-book">Instant Book!</a></div>
                                <br class="clear" />
                            </div>
                        </form>
                    </div>
                </div>
                <div id="offer-deal">
                    <div class="offer-owner-info">
                        <div class="owner-image"><img src="<?php echo base_url()?>assets/frontend/gui/images/owner_foto.jpg" alt="" width="102" height="102"/></div>
                        <div class="owner-info">
                            <p class="tag">OWNER</p>
                            <p class="name"><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></p>
                            <p class="description">Un h&ocirc;tel secret, une adresse confidentielle, une atmosph&egrave;re unique et intim...Un h&ocirc;tel secret</p>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="owner-socials">
                        <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">2</span><br /><span class="text">deals</span></a></span>
                        <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">220</span><br /><span class="text">friends</span></a></span>
                        <span class="help-friend"><a href="">Ajouter a mes amis</a></span>
                        <br class="clear" />
                    </div>
                    <div class="owner-actions">
                        <div class="owner-action-normal" style="display:none;">
                            <a href=""><span class="nr-deals">2 Deals</span><span class="time-deal">time left to buy<br /><span class="timer">2 days 13:03:37</span></span><br class="clear" /></a>
                        </div>
                        <div class="owner-action-active" style="">
                            <div class="multiple-deals" style="display:none;">
                                <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                                <div class="next-deal"><a href="">next deal</a></div>
                            </div>
                            <div class="single-deal-option" style="display:block;">
                                <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                            </div>
                            <div class="single-deal-options" style="display:none;">
                                <div class="buy-deal"><a href="">Buy this Deal!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br class="clear" />
        </div>
        <div id="offer-bottom">
            <div class="offer-bottom-actions">
                <ul id="" class="sorting-menu">
                    <li><a href="javascript:void(0)" target="_self" class="selected" id=""><span class="text">description</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:void(0)" target="_self" class="" id=""><span class="text">amenities</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:void(0)" target="_self" class="" id=""><span class="text">rooms</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:void(0)" target="_self" class="" id=""><span class="text">map</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:void(0)" target="_self" class="" id=""><span class="text">locations</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a href="javascript:void(0)" target="_self" class="" id=""><span class="text">reviews (2000)</span><span class="end"></span></a></li>
                </ul>
                <div class="add-this-widget">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                    </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4dd2fb514ac30d70"></script>
                    <!-- AddThis Button END -->
                </div>
                <br class="clear" />
            </div>
            <div class="offer-bottom-content">
                <p>Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié où l’on pose ses valises avec le sentiment profond d’avoir enfin trouvé sa place....Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié où l’on pose ses valises avec le sentiment profond d’avoir enfin trouvé sa place....Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié n hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié où l’on pose ses valises avec le sentiment profond d’avoir enfin trouvé sa place....Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié où l’on pose ses valises avec le sentiment profond d’avoir enfin trouvé sa place....Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégiée ses valises avec le sentiment profond d’avoir enfin trouvé sa place....Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié où l’on
    t privilégié où l’on pose ses valises avec le sentiment profond d’avoir enfin trouvé sa place....Un hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié n hôtel secret, une adresse confidentielle, une atmosphère unique et intime. Un endroit privilégié où l’on pose ses valises avec le sentiment profond d’avoir enfin trouvé sa place....</p>
            </div>
        </div>
    </div>
<?php $this->load->view('frontend/footer');?>