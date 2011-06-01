<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/sign-upin/sign-up-complete-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : User - Sign Up Completed.
*/

?>
<?php $this->load->view('frontend/header'); ?>
            <div id="section">
                <div id="main" class="sign-upin">
                    <h2><?=$signupin_sign_up_complete_title?></h2>
                    <span class="title-separator"></span>
                    <p class="sign-upin-message"><?=$signupin_sign_up_complete_text?></p>
<?php $this->load->view('frontend/user/forms/sign-upin/facebook-sign-in-form'); ?>
<?php $this->load->view('frontend/user/forms/sign-upin/standard-sign-in-form'); ?>
                </div>
                <div id="sidebar">
                </div>
                <br class="clear" />
            </div>
<?php $this->load->view('frontend/footer'); ?>