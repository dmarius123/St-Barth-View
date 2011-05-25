<?php $this->load->view('frontend/header'); ?>
    <div id="section">
        <div id="sidebar" class="user-area-sidebar">
<?php $this->load->view('frontend/user/sidebars/user-sidebar'); ?>
        </div>
        <div id="main">
            <div id="user-area-main" class="user-area-main"></div>
        </div>
        <br class="clear" />
    </div>
<?php $this->load->view('frontend/footer'); ?>