<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/profile-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Profile template.
*/

?>
    <h2><?=$user_profile_title?></h2>
    <span class="title-separator"></span>
<?php $this->load->view('frontend/user/forms/profile/edit-profile-picture-form'); ?>
<?php $this->load->view('frontend/user/forms/profile/edit-profile-form'); ?>
    <div class="user-bottom"></div>