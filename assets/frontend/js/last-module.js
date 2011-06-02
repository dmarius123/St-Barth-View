/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/last-module.js
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Last Module Scripts.
*/

    function last_module_init(){
        $('#last_filter1').val('deals');
        $('#last_filter2').val('all');
        $('#last_curr_page').val(1);

        last_module_showLastSlide();

        $('.last-filter1-click').hover(function(){
            $('#search-reviews-nav li.selected').css('border-bottom-color', '#d4d4d4');
        }, function(){
            $('#search-reviews-nav li.selected').css('border-bottom-color', '#ffffff');
        });

        $('.last-filter1-click').click(function(){
            $('#last-prev-arrow').css('display', 'none');
            $('#last-next-arrow').css('display', 'none');
            $('.last-filter1-click').removeClass('selected');
            $(this).addClass('selected');
            $('#last_filter1').val($(this).attr('id').split('-')[1]);
            $('#last_curr_page').val('1');
            last_module_showLastSlide();
        });

        $('.last-filter2-click').click(function(){
            $('.last-filter2-click').removeClass('selected');
            $(this).addClass('selected');
            $('#last_filter2').val($(this).attr('id').split('-')[1]);
            $('#last_curr_page').val('1');
            last_module_showLastSlide();
        });

        $('#last-prev-arrow').click(function(){
            if ($('#last_curr_page').val() > 1){
                $('#last_curr_page').val(parseInt($('#last_curr_page').val())-1);
                last_module_showLastSlide();
            }
        });

        $('#last-next-arrow').click(function(){
            if ($('#last_curr_page').val() < $('#last_no_pages').val()){
                $('#last_curr_page').val(parseInt($('#last_curr_page').val())+1);
                last_module_showLastSlide();
            }
        });
    }

    function last_module_showLastSlide(){
        $('#search-review-slider-content-container').html('');
        $('#search-review-slider-content-container').addClass('loader');
        
        $.post(BASE_URL+'modules/lastModule', {last_filter1:$('#last_filter1').val(),
                                               last_filter2:$('#last_filter2').val(),
                                               last_curr_page:$('#last_curr_page').val()}, function(data){
            $('#search-review-slider-content-container').removeClass('loader');            
            if ($('#last_filter1').val() == 'deals'){
                $('#search-review-slider-content-container').html(data.split(';;;;;')[0]);
                $('body').DOPImageLoader({'Container':'.search-review-deal-image', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
                var dateStr = data.split(';;;;;')[1],
                yearStr = dateStr.split(' ')[0],
                timeStr = dateStr.split(' ')[1],
                newDateStr;
                
                switch(yearStr.split('-')[1]){
                    case '01':
                        newDateStr = 'January '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '02':
                        newDateStr = 'February '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '03':
                        newDateStr = 'March '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '04':
                        newDateStr = 'April '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '05':
                        newDateStr = 'May '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '06':
                        newDateStr = 'June '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '07':
                        newDateStr = 'July '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '08':
                        newDateStr = 'August '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '09':
                        newDateStr = 'September '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '10':
                        newDateStr = 'October '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '11':
                        newDateStr = 'November '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                    case '12':
                        newDateStr = 'December '+yearStr.split('-')[2]+', '+yearStr.split('-')[0]+' '+timeStr;
                        break;
                }
                var date = new Date(newDateStr);
                $('#last-countdown').countdown({until: date, compact:true, format: 'DHMS', timezone: 0, serverSync: gmtDate});
            }
            else{
                $('#search-review-slider-content-container').html(data);
                $('body').DOPImageLoader({'Container':'.last-image-container', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
            }
            $('#last-prev-arrow').css('display', 'block');
            $('#last-next-arrow').css('display', 'block');
            if ($('#last_curr_page').val() == 1 || $('#last_no_pages').val() == 0){
                $('#last-prev-arrow').css('display', 'none');
            }
            if ($('#last_curr_page').val() == $('#last_no_pages').val() || $('#last_no_pages').val() == 0){
                $('#last-next-arrow').css('display', 'none');
            }
        });
    }