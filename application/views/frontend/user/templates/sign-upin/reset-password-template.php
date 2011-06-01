<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/sign-upin/reset-password-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : User - Reset password.
*/

?>
<?php $this->load->view('frontend/header'); ?>
            <div id="section">
                <div id="main" class="sign-upin">
                    <h2><?=$signupin_reset_password_title?></h2>
                    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/sign-upin/reset-password-form'); ?>
                </div>
                <div id="sidebar">
                </div>
                <br class="clear" />
            </div>
<?php $this->load->view('frontend/footer'); ?>