

        <ul id="sidebar-menu">
            <li><a href="javascript:void(0)" target="_self">TRAVEL GUIDE</a></li>
            <li><a href="javascript:void(0)" target="_self">BLOG</a></li>
        </ul>
        <div id="sidebar-content">
            <div id="sidebar-map"></div>
            <div id="filters">
<?php $this->load->view('frontend/search/filters/location-filter'); ?>
<?php $this->load->view('frontend/search/filters/price-filter'); ?>
<?php $this->load->view('frontend/search/filters/amenities-filter'); ?>               
            </div>
        </div>