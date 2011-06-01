<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/templates/search-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Page Template.
*/

?>
<?php $this->load->view('frontend/header'); ?>
            <div id="section">
                <div id="main">

<input type="hidden" name="category" id="category" value="<?=$home_search_category?>" />
<input type="hidden" name="sort_by" id="sort_by" value="score" />
<input type="hidden" name="view_mode" id="view_mode" value="list" />
<input type="hidden" name="page" id="page" value="1" />

<?php $this->load->view('frontend/search/templates/menu-template'); ?>
<?php $this->load->view('frontend/search/templates/submenu-template'); ?>
<?php //$this->load->view('frontend/search/results/photos'); ?>
                    <ul id="results-list"><li></li></ul>
                    <br class="clear" />
                    <div id="results-pagination"></div>
                </div>
                <div id="sidebar">
<?php $this->load->view('frontend/search/sidebars/search-sidebar'); ?>
                </div>
                <br class="clear" />
                <div id="search-reviews-members">
<?php $this->load->view('frontend/modules/templates/last-module-template'); ?>
<?php $this->load->view('frontend/modules/templates/new-users-module-template'); ?>
                    <br class="clear" />
                </div>
            </div>
<?php $this->load->view('frontend/footer'); ?>