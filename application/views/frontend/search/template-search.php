
<?php $this->load->view('frontend/header'); ?>
            <div id="section">
                <div id="main">

<input type="hidden" name="category" id="category" value="<?=$home_search_category?>" />
<input type="hidden" name="sort_by" id="sort_by" value="score" />
<input type="hidden" name="view_mode" id="view_mode" value="list" />
<input type="hidden" name="page" id="page" value="1" />

<?php $this->load->view('frontend/search/menu'); ?>
<?php $this->load->view('frontend/search/submenu'); ?>
<?php //$this->load->view('frontend/search/results/photos'); ?>
                    <ul id="results-list"><li></li></ul>
                    <br class="clear" />
                    <div id="results-pagination"></div>
<?php //$this->load->view('frontend/search/pagination'); ?>
                </div>
                <div id="sidebar">
<?php $this->load->view('frontend/search/sidebar'); ?>
                </div>
                <br class="clear" />
                <div id="search-reviews-members">
<?php $this->load->view('frontend/modules/last-module'); ?>
<?php $this->load->view('frontend/modules/new-users-module'); ?>
                    <br class="clear" />
                </div>
            </div>
<?php $this->load->view('frontend/footer'); ?>