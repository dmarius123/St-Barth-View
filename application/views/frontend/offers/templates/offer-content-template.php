<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/offer-content-template.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 21 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Offer Content Template.
*/

?>
        <div id="offer-content">
            <div id="offer-main">
                <div id="offer-gallery-container" style="width:660px; height:450px;"></div>
                <div id="rates-slider" class="hidden-slider" style="display:block;">
                    <div class="slider-left"> <a href="">>></a> </div>
                    <div class="slider-right">
                        <div class="rates-calendar">
                            calendar container here
                        </div>
                        <p class="rates-calendar-actions"><a href=""> > Annual rates</a></p>
                    </div>
                    <br class="clear" />
                </div>
                <div id="deal-slider" class="hidden-slider" style="display:none; z-index:1100;">
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
<?php $this->load->view('frontend/offers/templates/offer-sidebar-template'); ?>
            <br class="clear" />
        </div>