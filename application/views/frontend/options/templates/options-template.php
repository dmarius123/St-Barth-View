<?php
/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/templates/options-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 June 2011
 * Last Modified By        : Andrei Calistru
 * Description             : Offers - Options Template.
 */
?>
<?php $this->load->view('frontend/header'); ?>

<div id="section" class="section-options">
    <div id="main">
        <div class="offer-selected">
            <span class="image">
                <span class="image-container"><span class="TilVPxUA8HOfQyZpOwBNUMpgH51QP0JF-1" style="background: url('http://ns381653.ovh.net/~stbarthv/assets/libraries/gui/images/no-image.png') no-repeat scroll center center transparent; display: block; width: 172px; height: 122px; opacity: 1;"></span></span>
            </span>
            <span class="content">
                <span class="title"><a target="_self" href="#">La Bannane</a></span>
                <span class="location">St Barth, Lorient</span>
                <span class="clear separator"></span>
                <span class="details">1 Room, 2 Adults</span>
                <span class="date">from  <span class="bold">01/02/2011</span>  to  <span class="bold">10/02/2011</span></span>
                <span class="actions"><a href="#">modify</a></span>
            </span>
        </div>
        <div class="offer-options">
            <h2>Add options:</h2>
            <div class="offer-sorting-options">
                <ul class="sorting-menu" id="offer-sorting-options">
                    <li>view: </li>
                    <li><a id="offer-bottom-menu-description" class="selected" target="_self" href="#"><span class="text">all</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a id="offer-bottom-menu-amenities" target="_self" href="#"><span class="text">cars</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a id="offer-bottom-menu-rooms" target="_self" href="#"><span class="text">spa &amp; beauty</span><span class="end"></span></a></li>
                    <li class="separator"></li>
                    <li><a id="offer-bottom-menu-map" target="_self" href="#"><span class="text">services</span><span class="end"></span></a></li>
                </ul>
            </div>
            <div class="offer-option car">
                <span class="image">
                    <span class="image-container"><span class="TilVPxUA8HOfQyZpOwBNUMpgH51QP0JF-1" style="background: url('http://ns381653.ovh.net/~stbarthv/assets/libraries/gui/images/no-image.png') no-repeat scroll center center transparent; display: block; width: 135px; height: 94px; opacity: 1;"></span></span>
                </span>
                <span class="content">
                    <span class="title"><a target="_self" href="#">Add Car: Hertz</a></span>
                    <span class="location">St Barth</span>
                    <span class="details"><a href="#"><span class="text">details</span><span class="end"></span></a></span>
                    <span class="price"><span class="pre-text">from</span><span class="sum">0</span><span class="currency-icon">&euro;</span></span>
                    <span class="clear separator"></span>
                    <span class="options">
                        <span class="info-text" >Select your <br /> type / period</span>
                        <input type="text" id="option_pick_on" name="option_pick_on" class="offer_date_pick hasDatepicker" value="Pick On" />
                        <input type="text" id="option_drop_off" name="option_drop_off" class="offer_date_pick hasDatepicker" value="Drop Off" />
                        <br class="clear" />
                    </span>
                </span>
            </div>
            <div class="offer-option-details ">
                <span class="row">
                    <span class="title">Ford fusion, </span>
                    <span class="details">Automatic, A/C, 4 pers </span>
                    <span class="info"></span>
                    <span class="actions"><a href="">ajouter</a> </span>
                    <span class="price">100 &euro;</span>
                    <span class="price-old">120 &euro;</span>
                    <br class="clear" />
                </span>
                <span class="row">
                    <span class="title">Ford fusion, </span>
                    <span class="details">Automatic, A/C, 4 pers </span>
                    <span class="info"></span>
                    <span class="actions"><a href="">ajouter</a> </span>
                    <span class="price">100 &euro;</span>
<!--                    <span class="price-old">120 &euro;</span>-->
                    <br class="clear" />
                </span>
                <span class="row">
                    <span class="title">Ford fusion, </span>
                    <span class="details">Automatic, A/C, 4 pers </span>
                    <span class="info"></span>
                    <span class="actions"><a href="">ajouter</a> </span>
                    <span class="price">100 &euro;</span>
<!--                    <span class="price-old">120 &euro;</span>-->
                    <br class="clear" />
                </span>
            </div>
        </div>
    </div>
    <div id="sidebar">
        <div class="checkout-options">
            <span class="type">HOTELS</span>
            <span class="content">
                <span class="title">LA BANANE</span>
                <span class="price">2500 &euro;</span>
                <br class="clear" />
                <span class="details">1 Room, 2 pers.</span>
                <span class="date">from  <span class="bold">01/02/2011</span>  to  <span class="bold">10/02/2011</span></span>
            </span>
            <span class="actions"><span class="checkout-remove">&nbsp;</span> </span>
            <br class="clear" />
        </div>
        <div class="checkout-options">
            <span class="type">SERVICES</span>
            <span class="content">
                <span class="title">Babysitter</span>
                <span class="price">100 &euro;</span>
                <br class="clear" />
                <span class="details">4 hours per night</span>
                <span class="date"><span class="bold">01/02/2011 - 10:30PM </span></span>
            </span>
            <span class="actions"><span class="checkout-remove">&nbsp;</span> </span>
            <br class="clear" />
        </div>
        <div class="checkout-total">
            <span class="checkout-sum">Total: 2600 &euro;</span>
            <span class="checkout-sum-info">This rates include local tax 4,6%</span>
            <span class="checkout-button"><a href="#">Checkout</a></span>
            <br class="clear" />
        </div>

    </div>
    <br class="clear" />
</div>

<?php $this->load->view('frontend/footer'); ?>