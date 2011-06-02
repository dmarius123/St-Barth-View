<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/home/home-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Home Page.
*/

?>
<?php $this->load->view('frontend/header'); ?>
<script type="text/JavaScript">
    currPage = 'Home';
</script>
<div id="section" class="home-section">
    <div id="home-main">
        <div id="home-main-bg"></div>
        <div id="home-slider"></div>
    </div>
    <div id="home-sidebar">
<?php $this->load->view('frontend/home/forms/search-form'); ?>
    </div>
    <br class="clear" />
    <div id="search-reviews-members">
<?php $this->load->view('frontend/modules/templates/last-module-template'); ?>
<?php $this->load->view('frontend/modules/templates/new-users-module-template'); ?>
        <br class="clear" />
    </div>
</div>
<?php $this->load->view('frontend/footer'); ?>