<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/settings-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Settings template.
*/

?>
    <h2><?=$user_settings_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/settings/change-password-form'); ?>
    <div class="user-bottom"></div>