/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/search.js
 * File Version            : 1.4
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 19 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Scripts.
*/

function search_init(){
    //gm_initialize('sidebar-map');
    
    $('#price-range').slider({
        range: true,
        min: 0,
        max: 2000,
        values: [0, 2000],
        slide: function(event, ui){
            $('#low-price').html(ui.values[0]);
            $('#high-price').html(ui.values[1]);
        }
    });
    $('#low-price').html($('#price-range').slider('values', 0));
    $('#high-price').html($('#price-range').slider('values', 1));

    search_initFilterToggle();

    if ($('#view_mode').val() == 'photos'){
        search_positionPhotosFilters();
    }
    else{
        search_positionListFilters();
    }

    $('.search-sort-by').removeClass('selected');
    $('#sssb-'+$('#sort_by').val()).addClass('selected');
    $('.search-view-mode').removeClass('selected');
    $('#ssvm-'+$('#view_mode').val()).addClass('selected');
    if ($('#results-list').html() != null){
        if ($('#view_mode').val() == 'photos'){
            $('#results-list').attr('id', 'results-list-images');
        }
    }
    else if ($('#results-list-images').html() != null){
        if ($('#view_mode').val() == 'list' || $('#view_mode').val() == 'map'){
            $('#results-list-images').attr('id', 'results-list');
        }
    }

    if ($('#category').val() == ''){
        search_parseSearchCategory();
    }
    else{        
        $('#search-category-link-'+$('#category').val()).addClass('selected');
        search_searchAjax();
    }

    $('.search-menu-category').click(function(){
        search_parseSearchCategory();
    });

// Click Events
    $('.search-sort-by').click(function(){
        $('.search-sort-by').removeClass('selected');
        $(this).addClass('selected');
        $('#page').val(1);
        $('#sort_by').val($(this).attr('id').split('-')[1]);
        search_searchAjax();
    });

    $('.search-view-mode').click(function(){
        $('.search-view-mode').removeClass('selected');
        var item = $(this);
        item.addClass('selected');
        $('#view_mode').val(item.attr('id').split('-')[1]);

        switch ($('#view_mode').val()){
            case 'photos':
                $('.search-results-wrapper').attr('id', 'results-list-images');
                break;
            case 'map':
                $('#page').val(1);
                $('.search-results-wrapper').attr('id', 'results-map');
                break;
            default:
                $('.search-results-wrapper').attr('id', 'results-list');
                break;           
        }
        
        search_searchAjax();
    });
    
    $(window).scroll(function(){
        if ($('#view_mode').val() == 'photos'){
            search_positionPhotosFilters();
        }
        else{
            search_positionListFilters();
        }
    });
}

function search_initFilterToggle(){
    $('.filter-header').click(function(){
        var parent = $(this).parent();
        if ($('ul', parent).css('display') == 'none'){
            $('ul', parent).css('display', 'block');
        }
        else{
            $('ul', parent).css('display', 'none');
        }
    });
}

function search_parseSearchCategory(){
    var baseCategory;

    setTimeout(function(){
        baseCategory = window.location.href.split('#')[1];

        if (baseCategory == 'hotels' || baseCategory == 'hotels/'){
            search_selectSearchCategory(1);
            search_searchAjax();
        }
        else if (baseCategory == 'spa-beauty' || baseCategory == 'spa-beauty/'){
            search_selectSearchCategory(3);
            search_searchAjax();
        }
        else if (baseCategory == 'shopping' || baseCategory == 'shopping/'){
            search_selectSearchCategory(4);
            search_searchAjax();
        }
        else if (baseCategory == 'services' || baseCategory == 'services/'){
            search_selectSearchCategory(5);
            search_searchAjax();
        }
        else if (baseCategory == 'restaurants' || baseCategory == 'restaurants/'){
            search_selectSearchCategory(6);
            search_searchAjax();
        }
        else{
            search_selectSearchCategory(2);
            search_searchAjax();
        }
    }, 100);
}

function search_selectSearchCategory(item){
    $('#page').val(1);
    $('#category').val(item);
    $('.search-menu-category').removeClass('selected');
    $('#search-category-link-'+item).addClass('selected');
}

function search_parseSearchPage(page){
    $('#page').val(page);
    search_searchAjax();
}

function search_searchAjax(){
    switch ($('#view_mode').val()){
        case 'photos':
            $('#results-list-images').html('<li id="results-loader"></li><br class="clear" />');
            break;
        case 'map':
            $('#results-map').html('<li id="results-loader"></li><br class="clear" />');
            break;
        default:
            $('#results-list').html('<li id="results-loader"></li><br class="clear" />');
            break;
    }

    if ($(window).scrollTop() >= $('#main-menu').offset().top){
        $('#main-submenu').css('position', 'relative');
        $('#sidebar-content').css('position', 'relative');
        $('html').scrollTop($('#main-menu').offset().top);
        $('body').scrollTop($('#main-menu').offset().top);
    }
    $('#results-loader').height($('#sidebar-content').height()-40);
    
    $.post(BASE_URL+'search/searchSubmit', {category: $('#category').val(),
                                            sort_by: $('#sort_by').val(),
                                            view_mode: $('#view_mode').val(),
                                            page: $('#page').val(),
                                            location: $('#location').val(),
                                            locality: $('#locality').val()}, function(data){
        switch ($('#view_mode').val()){
            case 'photos':
                $('#results-list-images').html(data.split(';;;;;')[0]);
                $('#results-list-images li .image-container').DOPImageLoader({'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png', 'LoadingInOrder': false});
                $('#results-pagination').html(data.split(';;;;;')[1]);
                $('#sidebar-map').css('display', 'block');
                gm_initialize('sidebar-map');
                break;
            case 'map':
                $('#results-map').html(data);
                $('#results-pagination').html('');
                $('#sidebar-map').css('display', 'none');
                gm_initialize('map-results');
                break;
            default:
                $('#results-list').html(data.split(';;;;;')[0]);
                $('#results-list li .image-container').DOPImageLoader({'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png', 'LoadingInOrder': false});
                $('#results-pagination').html(data.split(';;;;;')[1]);
                $('#sidebar-map').css('display', 'block');
                gm_initialize('sidebar-map');
                break;
        }

        if ($('#view_mode').val() == 'map'){
            $('#sidebar-map').css('display', 'none');
            gm_initialize('map-results');
        }
        else{
            $('#sidebar-map').css('display', 'block');
            gm_initialize('sidebar-map');
        }
        
        gm_codeAddress($('option[value="'+$('#location').val()[0]+'"]', '#location').text(), 'map');
        gm_setMarkers('sidebar-map');

        var pieces, index;

        $('.offer-item').hover(function(){
            $(this).addClass('hovered');
            pieces = $(this).attr('id').split('-');
            index = pieces[pieces.length-1]-1;
            markers[index].setIcon(imageHover[index]);
        },function(){
            $(this).removeClass('hovered');
            markers[index].setIcon(image[index]);
        });
    });
}

function search_positionListFilters(){
    if ($('#results-list').height() > $('#sidebar-content').height()-40){
        if ($(window).scrollTop() >= $('#main-menu').offset().top+$('#main-menu').height()){
            $('#main-submenu').css('position', 'fixed');
            $('#sidebar-content').css('position', 'fixed');
        }
        else{
            $('#main-submenu').css('position', 'relative');
            $('#sidebar-content').css('position', 'relative');
        }

        if ($(window).scrollTop() >= $('#results-list').offset().top+$('#results-list').height()-$('#sidebar-content').height()-28){
            $('#main-submenu').css('top', $('#results-list').height()-$('#sidebar-content').height()+28);
            $('#main-submenu').css('position', 'absolute');
            $('#sidebar-content').css('top', $('#results-list').height()-$('#sidebar-content').height()+28);
            $('#sidebar-content').css('position', 'absolute');
        }
        else{
            $('#main-submenu').css('top', 0);
            $('#sidebar-content').css('top', 0);
        }
    }
}

function search_positionPhotosFilters(){
    if ($('#results-list-images').height() > $('#sidebar-content').height()-40){
        if ($(window).scrollTop() >= $('#main-menu').offset().top+$('#main-menu').height()){
            $('#main-submenu').css('position', 'fixed');
            $('#sidebar-content').css('position', 'fixed');
        }
        else{
            $('#main-submenu').css('position', 'relative');
            $('#sidebar-content').css('position', 'relative');
        }

        if ($(window).scrollTop() >= $('#results-list-images').offset().top+$('#results-list-images').height()-$('#sidebar-content').height()-28){
            $('#main-submenu').css('top', $('#results-list-images').height()-$('#sidebar-content').height()+28);
            $('#main-submenu').css('position', 'absolute');
            $('#sidebar-content').css('top', $('#results-list-images').height()-$('#sidebar-content').height()+28);
            $('#sidebar-content').css('position', 'absolute');
        }
        else{
            $('#main-submenu').css('top', 0);
            $('#sidebar-content').css('top', 0);
        }
    }
}

function search_locationChange(){
    switch ($('#view_mode').val()){
        case 'photos':
            $('#results-list-images').html('<li id="results-loader"></li><br class="clear" />');
            break;
        case 'map':
            $('#results-map').html('<li id="results-loader"></li><br class="clear" />');
            break;
        default:
            $('#results-list').html('<li id="results-loader"></li><br class="clear" />');
            break;
    }

    if ($(window).scrollTop() >= $('#main-menu').offset().top){
        $('#main-submenu').css('position', 'relative');
        $('#sidebar-content').css('position', 'relative');
        $('html').scrollTop($('#main-menu').offset().top);
        $('body').scrollTop($('#main-menu').offset().top);
    }
    $('#results-loader').height($('#sidebar-content').height()-40);

    $.post(BASE_URL+'search/localities', {location: $('#location').val()}, function(data){
        $('#localities-filter').replaceWith(data);
        search_searchAjax();
    });
}