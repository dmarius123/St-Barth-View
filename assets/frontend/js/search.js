
$(function(){
    $('body').DOPImageLoader({'Container':'#search-members',
                    'LoaderURL': BASE_URL+'assets/frontend/gui/images/loaders/small-loader1.gif',
                    'NoImageURL': BASE_URL+'assets/frontend/gui/images/no-images/no-profile-image-48.jpg',
                    'LoadingInOrder': false,
                    'ImageDelay': 200});
});

$(document).ready(function(){
    initializeGoogleMap('sidebar-map');
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

    initFilterToggle();

    if ($('#view_mode').val() == 'photos'){
        positionPhotosFilters();
    }
    else{
        positionListFilters();
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
        parseSearchCategory();
    }
    else{
        $('#search-category-link-'+$('#category').val()).addClass('selected');
        searchAjax();
    }

    $('.search-menu-category').click(function(){
        parseSearchCategory();
    });

    $('.search-sort-by').click(function(){
        $('.search-sort-by').removeClass('selected');
        $(this).addClass('selected');
        $('#sort_by').val($(this).attr('id').split('-')[1]);
        searchAjax();
    });

    $('.search-view-mode').click(function(){
        $('.search-view-mode').removeClass('selected');
        var item = $(this);
        item.addClass('selected');
        $('#view_mode').val(item.attr('id').split('-')[1]);

        if ($('#results-list').html() != null){
            if (item.attr('id').split('-')[1] == 'photos'){
                $('#results-list').attr('id', 'results-list-images');
            }
        }        
        else if ($('#results-list-images').html() != null){
            if (item.attr('id').split('-')[1] == 'list' || item.attr('id').split('-')[1] == 'map'){
                $('#results-list-images').attr('id', 'results-list');
            }
        }
        searchAjax();
    });
    
    $(window).scroll(function(){
        if ($('#view_mode').val() == 'photos'){
            positionPhotosFilters();
        }
        else{
            positionListFilters();
        }
    });
});

function locationChange(value){
    alert(value);
}

function initFilterToggle(){
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

function parseSearchCategory(){
    var baseCategory;

    setTimeout(function(){
        baseCategory = window.location.href.split('#')[1];

        if (baseCategory == 'hotels' || baseCategory == 'hotels/'){
            selectSearchCategory(1);
            searchAjax();
        }
        else if (baseCategory == 'spa-beauty' || baseCategory == 'spa-beauty/'){
            selectSearchCategory(2);
            searchAjax();
        }
        else if (baseCategory == 'shopping' || baseCategory == 'shopping/'){
            selectSearchCategory(3);
            searchAjax();
        }
        else if (baseCategory == 'services' || baseCategory == 'services/'){
            selectSearchCategory(4);
            searchAjax();
        }
        else if (baseCategory == 'restaurants' || baseCategory == 'restaurants/'){
            selectSearchCategory(5);
            searchAjax();
        }
        else{
            selectSearchCategory('villas');
            searchAjax();
        }
    }, 100);
}

function selectSearchCategory(item){
    $('#category').val(item);
    $('.search-menu-category').removeClass('selected');
    $('#search-category-link-'+item).addClass('selected');
}

function parseSearchPage(page){
    $('#page').val(page);
    searchAjax();
}

function searchAjax(){   
    if ($('#results-list').html() != null){
        $('#results-list').html('<li id="results-loader"></li><br class="clear" />');
    }
    else if ($('#results-list-images').html() != null){
        $('#results-list-images').html('<li id="results-loader"></li><br class="clear" />');
    }

    if ($(window).scrollTop() >= $('#main-menu').offset().top){
        $('#main-submenu').css('position', 'relative');
        $('#sidebar-content').css('position', 'relative');
        $('html').scrollTop($('#main-menu').offset().top);
        $('body').scrollTop($('#main-menu').offset().top);
    }
    $('#results-loader').height($('#sidebar-content').height()-40);

    if ($('#location').val() != ''){
        codeGoogleMapAddress($('#location').val(), 'map');
    }
    
    $.post(BASE_URL+'search/searchSubmit', {location: $('#location').val(),
                                            category: $('#category').val(),
                                            sort_by: $('#sort_by').val(),
                                            view_mode: $('#view_mode').val(),
                                            page: $('#page').val()}, function(data){
        if ($('#results-list').html() != null){
            $('#results-list').html(data.split(';;;;;')[0]);
            $('#results-list li .image-container').DOPImageLoader({'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png', 'LoadingInOrder': false});
        }
        else if ($('#results-list-images').html() != null){
            $('#results-list-images').html(data.split(';;;;;')[0]);
            $('#results-list-images li .image-container').DOPImageLoader({'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png', 'LoadingInOrder': false});
        }
        $('#results-pagination').html(data.split(';;;;;')[1]);
        setGoogleMapMarkers('sidebar-map');
    });
}

function positionListFilters(){
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

function positionPhotosFilters(){
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