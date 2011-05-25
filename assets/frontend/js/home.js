
$(document).ready(function(){
    $('#home_search_checkin').datepicker({minDate: 0});
    $('#home_search_checkout').datepicker({minDate: 0});

    loadHomeSlideshowItem()
});

function loadHomeSlideshowItem(){
    $('#home-slider').addClass('loader');
    $.post(BASE_URL+'home/slideshow/', {item:$('#home-slideshow-next-item').val()}, function(data){
        $('#home-slider').removeClass('loader');
        $('#home-slider').html(data);
    })
}