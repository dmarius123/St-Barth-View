<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/user-admin-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - User Admin template.
*/

?>
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