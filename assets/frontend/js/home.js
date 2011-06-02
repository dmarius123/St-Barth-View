/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/home.js
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Home Scripts.
*/

function home_init(){
    $('#home_search_checkin').datepicker({minDate: 0});
    $('#home_search_checkout').datepicker({minDate: 0});

    home_loadHomeSlideshowItem();
}

function home_loadHomeSlideshowItem(){
    $('#home-slider').addClass('loader');
    $.post(BASE_URL+'home/slideshow/', {item:$('#home-slideshow-next-item').val()}, function(data){
        $('#home-slider').removeClass('loader');
        $('#home-slider').html(data);
    })
}