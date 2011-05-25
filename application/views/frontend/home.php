<?php $this->load->view('frontend/header'); ?>
<div id="section" class="home-section">
    <div id="home-main">
        <div id="home-main-bg"></div>
        <div id="home-slider"></div>
    </div>
    <div id="home-sidebar">
<?php $this->load->view('frontend/home/search-form'); ?>
    </div>
    <br class="clear" />
    <div id="search-reviews-members">
<?php $this->load->view('frontend/modules/last-module'); ?>
<?php $this->load->view('frontend/modules/new-users-module'); ?>
        <br class="clear" />
    </div>
</div>
<?php $this->load->view('frontend/footer'); ?>