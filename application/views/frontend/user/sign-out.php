<?php $this->load->view('frontend/header'); ?>
            <div id="section">
                <div id="main" class="sign-upin">
                    <h2><?=$signupin_sign_out_title?></h2>
                    <span class="title-separator"></span>
                    <p class="sign-upin-message"><?=$signupin_sign_out_text?></p>
<?php $this->load->view('frontend/user/forms/facebook-sign-in-form'); ?>
<?php $this->load->view('frontend/user/forms/standard-sign-in-form'); ?>
                </div>
                <div id="sidebar">
                </div>
                <br class="clear" />
            </div>
<?php $this->load->view('frontend/footer'); ?>