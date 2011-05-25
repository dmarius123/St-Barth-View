
/*
* Title                   : Booking Calendar
* Version                 : 1.0
* File                    : jquery.dop.BookingCalendar.js
* File Version            : 1.0
* Created / Last Modified : 03 May 2011
* Author                  : Marius-Cristian Donea
* Copyright               : © 2011 Marius-Cristian Donea
* Website                 : http://www.mariuscristiandonea.com
* Description             : Booking Calendar jQuery plugin.
*/

(function($)
{
    $.fn.DOPBookingCalendar = function(options)
    {
        var Data = {'Type':'BackEnd', 'DataURL':'', 'SaveURL':''},

        UniqueID,
        Container = this,

        Content = new Array(),

        StartDate = new Date(),
        StartYear = StartDate.getFullYear(),
        StartMonth = StartDate.getMonth()+1,
        StartDay = StartDate.getDate(),
        CurrYear = StartYear,
        CurrMonth = StartMonth,

        dayNames = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
        monthNames = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
        bookedText = 'BOOKED', // The Booked text.
        oneAvailableText = 'room', // One item available text.
        moreAvailableText = 'rooms', // More items available text.
        dateType = 1, // 1: american style; 2: european style;
        popupDisplayTime = 300, // The time for the Pop-Up to Show/Hide
        noRooms = 1, // Number of rooms available > 0
        availabilityLabel = 'Number of rooms available', // The text for Availability label.
        priceLabel = 'Price', // The text for Price label.
        currency = '$', // The currency.
        submitBtnText = 'Submit', // The text for Submit button.
        closedBtnText = 'Closed', // The text for Closed button.
        resetBtnText = 'Reset', // The text for Reset button.
        exitBtnText = 'Exit', // The text for exit button.

        startScloseBtnTextelection,
        endSelection,
        firstSelected = false,

        methods = {
                    init:function( ){// Init Plugin.
                        UniqueID = prototypes.randomString(16);
                        return this.each(function(){
                            if (options){
                                $.extend(Data, options);
                            }
                            methods.parseData();
                        });
                    },
                    parseData:function(){
                        $.post(Data['DataURL'], {}, function(data){
                            var parses = data.split(';;;;;');
                            if (parses[0] != 'default0123456789'){
                                dayNames = [];
                                dayNames = parses[0].split(';;');
                            }
                            if (parses[1] != 'default0123456789'){
                                monthNames = [];
                                monthNames = parses[1].split(';;');
                            }
                            if (parses[2] != 'default0123456789'){
                                bookedText = parses[2];
                            }
                            if (parses[3] != 'default0123456789'){
                                oneAvailableText = parses[3];
                            }
                            if (parses[4] != 'default0123456789'){
                                moreAvailableText = parses[4];
                            }
                            if (parses[5] != 'default0123456789'){
                                dateType = parseInt(parses[5]);
                            }
                            if (parses[6] != 'default0123456789'){
                                popupDisplayTime = parseInt(parses[6]);
                            }
                            if (parses[7] != 'default0123456789'){
                                noRooms = parseInt(parses[7]);
                            }
                            if (parses[8] != 'default0123456789'){
                                availabilityLabel = parses[8];
                            }
                            if (parses[9] != 'default0123456789'){
                                priceLabel = parses[9];
                            }
                            if (parses[10] != 'default0123456789'){
                                currency = parses[10];
                            }
                            if (parses[11] != 'default0123456789'){
                                submitBtnText = parses[11];
                            }
                            if (parses[12] != 'default0123456789'){
                                closedBtnText = parses[12];
                            }
                            if (parses[13] != 'default0123456789'){
                                resetBtnText = parses[13];
                            }
                            if (parses[14] != 'default0123456789'){
                                exitBtnText = parses[14];
                            }
                            if (parses[15] != 'default0123456789'){
                                Content = parses[15].split(';;;');
                            }
                            
                            methods.initBookingCalendar();
                        });
                    },
                    initBookingCalendar:function(){// Init the Gallery
                        var HTML = new Array(),
                        roomsHTML = new Array(), i;

                        for (i=0; i<=noRooms; i++){
                            roomsHTML.push('<option value="'+i+'">'+i+'</option>');
                        }

                        HTML.push('<div class="DOP_BookingCalendar_Container">');
                        HTML.push('   <div class="DOP_BookingCalendar_PopUp">');
                        HTML.push('       <div class="bg"></div>');
                        HTML.push('       <div class="window">');
                        HTML.push('           <span class="start-date"></span>');
                        HTML.push('           <span class="separator-date"></span>');
                        HTML.push('           <span class="end-date"></span>');
                        HTML.push('           <br style="clear:both;" />');
                        HTML.push('           <label class="label" for="'+UniqueID+'-availability">'+availabilityLabel+'</label>');
                        HTML.push('           <select name="'+UniqueID+'-availability" id="'+UniqueID+'-availability" class="select-style">');
                        HTML.push(roomsHTML.join(''));
                        HTML.push('           </select>');
                        HTML.push('           <label class="label" for="'+UniqueID+'-price">'+priceLabel+' ('+currency+')</label>');
                        HTML.push('           <input type="text" name="'+UniqueID+'-price" id="'+UniqueID+'-price" class="input-style" value="" />');
                        HTML.push('           <input type="button" name="'+UniqueID+'-submit" id="'+UniqueID+'-submit" class="button-style submit-btn" value="'+submitBtnText+'" />');
                        HTML.push('           <input type="button" name="'+UniqueID+'-closed" id="'+UniqueID+'-closed" class="button-style" value="'+closedBtnText+'" />');
                        HTML.push('           <input type="button" name="'+UniqueID+'-reset" id="'+UniqueID+'-reset" class="button-style" value="'+resetBtnText+'" />');
                        HTML.push('           <input type="button" name="'+UniqueID+'-exit" id="'+UniqueID+'-exit" class="button-style" value="'+exitBtnText+'" />');
                        HTML.push('       </div>');
                        HTML.push('   </div>');
                        HTML.push('   <div class="DOP_BookingCalendar_Navigation">');
                        HTML.push('       <div class="previous_btn disabled"><div class="icon"></div></div>');
                        HTML.push('       <div class="next_btn"><div class="icon"></div></div>');
                        HTML.push('       <div class="month_year"></div>');
                        HTML.push('       <div class="week">');
                        HTML.push('         <div class="day">'+dayNames[1]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[2]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[3]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[4]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[5]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[6]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[0]+'</div><br style="clear:both;" />');
                        HTML.push('       </div>');
                        HTML.push('   </div>');
                        HTML.push('   <div class="DOP_BookingCalendar_Calendar"></div>');
                        HTML.push('</div>');

                        Container.html(HTML.join(''));
                        methods.initSettings();
                    },
                    initSettings:function(){// Init Settings
                        methods.initContainer();
                        methods.initNavigation();
                        methods.initCalendar();
                        methods.initPopUp();
                    },

                    initContainer:function(){// Init Container
                        $('.DOP_BookingCalendar_Container', Container).width(Container.width());
                        $('.DOP_BookingCalendar_Container', Container).height(Container.height());
                    },

                    initNavigation:function(){// Init Navigation
                        $('.DOP_BookingCalendar_Navigation .week .day', Container).width(parseInt((Container.width()-(parseInt($('.DOP_BookingCalendar_Navigation .week .day', Container).css('margin-left'))+parseInt($('.DOP_BookingCalendar_Navigation .week .day', Container).css('margin-right')))*7)/7));
                        $('.DOP_BookingCalendar_Navigation .previous_btn', Container).click(function(){
                            var item = $(this);
                            if (!item.hasClass('disabled')){
                                $('.DOP_BookingCalendar_Calendar', Container).html('');
                                methods.initMonth(StartYear, CurrMonth-1);
                                if (CurrMonth == StartMonth){
                                    item.addClass('disabled');
                                }
                            }
                        });
                        $('.DOP_BookingCalendar_Navigation .next_btn', Container).click(function(){
                            $('.DOP_BookingCalendar_Calendar', Container).html('');
                            methods.initMonth(StartYear, CurrMonth+1);
                            $('.DOP_BookingCalendar_Navigation .previous_btn', Container).removeClass('disabled');
                        });
                    },

                    initCalendar:function(){// Init Calendar
                        methods.initMonth(StartYear, StartMonth);
                    },

                    initMonth:function(year, month){// Init Month
                        var i, j, d, cyear, cmonth, cday, start, totalDays = 0,
                        noDays = new Date(year, month, 0).getDate(),
                        noDaysPreviousMonth = new Date(year, month-1, 0).getDate(),
                        firstDay = new Date(year, month-1, 1).getDay(),
                        lastDay = new Date(year, month-1, noDays).getDay(),
                        aText, pText;

                        CurrYear = new Date(year, month, 0).getFullYear();
                        CurrMonth = month;
                        $('.DOP_BookingCalendar_Navigation .month_year', Container).html(monthNames[new Date(year, month, 0).getMonth()]+' '+CurrYear);
                        $('.DOP_BookingCalendar_Calendar', Container).html('<div class="DOP_BookingCalendar_Month"></div>');

                        if (firstDay == 0){
                            start = 7;
                        }
                        else{
                            start = firstDay;
                        }
                        
                        for (i=start-1; i>=1; i--){
                            totalDays++;
                            d = new Date(year, month-2, noDaysPreviousMonth-i+1);
                            cyear = d.getFullYear();
                            cmonth = prototypes.longMonth(d.getMonth()+1);
                            cday = prototypes.longDay(d.getDate());
                            aText = '';
                            pText = '';
                            for (j=0; j<Content.length; j++){
                                if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                    aText = Content[j].split(';;')[1];
                                    pText = Content[j].split(';;')[2];
                                }
                            }

                            if (StartMonth == month){
                                $('.DOP_BookingCalendar_Month', Container).append(methods.initDay('past_day', cyear, cmonth, cday, d.getDate(), '', ''));
                            }
                            else{
                                $('.DOP_BookingCalendar_Month', Container).append(methods.initDay('last_month', cyear, cmonth, cday, d.getDate(), aText, pText));
                            }
                        }
                        
                        for (i=1; i<=noDays; i++){
                            totalDays++;
                            d = new Date(year, month-1, i);
                            cyear = d.getFullYear();
                            cmonth = prototypes.longMonth(d.getMonth()+1);
                            cday = prototypes.longDay(d.getDate());
                            aText = '';
                            pText = '';
                            for (j=0; j<Content.length; j++){
                                if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                    aText = Content[j].split(';;')[1];
                                    pText = Content[j].split(';;')[2];
                                }
                            }
                            
                            if (StartMonth == month && StartDay > d.getDate()){
                                $('.DOP_BookingCalendar_Month', Container).append(methods.initDay('past_day', cyear, cmonth, cday, d.getDate(), '', ''));
                            }
                            else{
                                $('.DOP_BookingCalendar_Month', Container).append(methods.initDay('curr_month', cyear, cmonth, cday, d.getDate(), aText, pText));
                            }
                        }

                        if (totalDays+7 < 42){
                            for (i=1; i<=14-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.longMonth(d.getMonth()+1);
                                cday = prototypes.longDay(d.getDate());
                                aText = '';
                                pText = '';
                                for (j=0; j<Content.length; j++){
                                    if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                        aText = Content[j].split(';;')[1];
                                        pText = Content[j].split(';;')[2];
                                    }
                                }
                                $('.DOP_BookingCalendar_Month', Container).append(methods.initDay('next_month', cyear, cmonth, cday, d.getDate(), aText, pText));                                
                            }
                        }
                        else{
                            for (i=1; i<=7-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.longMonth(d.getMonth()+1);
                                cday = prototypes.longDay(d.getDate());
                                aText = '';
                                pText = '';
                                for (j=0; j<Content.length; j++){
                                    if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                        aText = Content[j].split(';;')[1];
                                        pText = Content[j].split(';;')[2];
                                    }
                                }
                                $('.DOP_BookingCalendar_Month', Container).append(methods.initDay('next_month', cyear, cmonth, cday, d.getDate(), aText, pText));                                
                            }
                        }

                        $('.DOP_BookingCalendar_Month', Container).width(Container.width());
                        $('.DOP_BookingCalendar_Month', Container).height(Container.height());
                        $('.DOP_BookingCalendar_Day', Container).width((Container.width()-(parseInt($('.DOP_BookingCalendar_Day', Container).css('margin-left'))+parseInt($('.DOP_BookingCalendar_Day', Container).css('margin-right'))+2.5)*7)/7);
                        $('.DOP_BookingCalendar_Day', Container).height((Container.height()-$('.DOP_BookingCalendar_Navigation', Container).height()-(parseInt($('.DOP_BookingCalendar_Day', Container).css('margin-top'))+parseInt($('.DOP_BookingCalendar_Day', Container).css('margin-bottom'))+2.5)*6)/6);
                        $('.content', '.DOP_BookingCalendar_Day', Container).css('line-height', ($('.DOP_BookingCalendar_Day', Container).height()-$('.header', '.DOP_BookingCalendar_Day', Container).height()-parseInt($('.header', '.DOP_BookingCalendar_Day', Container).css('padding-top'))-parseInt($('.header', '.DOP_BookingCalendar_Day', Container).css('padding-bottom')))+'px');
                        methods.initEvents();
                    },

                    initDay:function(type, cyear, cmonth, cday, d, noRooms, price){// Init Day
                        var dayHTML = Array(),
                        aText, pText;

                        if (noRooms == ''){
                            aText = '';
                        }
                        else if (noRooms == 0){
                            aText = bookedText;
                            type += ' booked';
                        }
                        else if (noRooms == 1){
                            aText = '1 '+oneAvailableText;
                            type += ' available';
                        }
                        else{
                            aText = noRooms+' '+moreAvailableText;
                            type += ' available';
                        }

                        if (price == ''){
                            pText = '';
                        }
                        else{
                            pText = currency+' '+price;
                        }

                        dayHTML.push('<div class="DOP_BookingCalendar_Day '+type+'" id="'+UniqueID+'_'+cyear+'-'+cmonth+'-'+cday+'">');
                        dayHTML.push('    <span class="header">'+d+'<span class="price">'+pText+'</span></span>');
                        dayHTML.push('    <span class="content">'+aText+'</span>');
                        dayHTML.push('    </span>');
                        dayHTML.push('</div>');

                        return dayHTML.join('');
                    },

                    initEvents:function(){// Init Events for the days of the Calendar.
                        $('.DOP_BookingCalendar_Day', Container).click(function(){
                            var day = $(this);
                            if (!day.hasClass('past_day')){
                                if (!firstSelected){
                                    firstSelected = true;
                                    startSelection = day.attr('id');
                                }
                                else{
                                    firstSelected = false;
                                    endSelection = day.attr('id');
                                    methods.showPopUp();
                                }
                                methods.initSelection(day.attr('id'));
                            }
                        });

                        $('.DOP_BookingCalendar_Day', Container).hover(function(){
                            var day = $(this);
                            if (firstSelected){
                                methods.initSelection(day.attr('id'));
                            }
                        });
                    },

                    initSelection:function(id){
                        $('.DOP_BookingCalendar_Day', Container).removeClass('selected');
                        if (id < startSelection){
                            $('.DOP_BookingCalendar_Day', Container).each(function(){
                               var day = $(this);
                               if (day.attr('id') >= id && day.attr('id') <= startSelection && !day.hasClass('past_day')){
                                   day.addClass('selected');
                               }
                            });
                        }
                        else{
                            $('.DOP_BookingCalendar_Day', Container).each(function(){
                               var day = $(this);   
                               if (day.attr('id') >= startSelection && day.attr('id') <= id && !day.hasClass('past_day')){
                                   day.addClass('selected');
                               }
                            });
                        }
                    },

                    initPopUp:function(){// Init Pop-Up
                        $('.DOP_BookingCalendar_PopUp', Container).css('display', 'block');
                        $('.DOP_BookingCalendar_PopUp', Container).width(Container.width());
                        $('.DOP_BookingCalendar_PopUp', Container).height(Container.height());
                        $('.DOP_BookingCalendar_PopUp .bg', Container).width($('.DOP_BookingCalendar_PopUp', Container).width());
                        $('.DOP_BookingCalendar_PopUp .bg', Container).height($('.DOP_BookingCalendar_PopUp', Container).height());
                        $('.DOP_BookingCalendar_PopUp .window', Container).css('margin-left', ($('.DOP_BookingCalendar_PopUp', Container).width()-$('.DOP_BookingCalendar_PopUp .window', Container).width())/2);
                        $('.DOP_BookingCalendar_PopUp .window', Container).css('margin-top', ($('.DOP_BookingCalendar_PopUp', Container).height()-$('.DOP_BookingCalendar_PopUp .window', Container).height())/2);
                        $('.DOP_BookingCalendar_PopUp', Container).css('display', 'none');

                        $('#'+UniqueID+'-submit').click(function(){
                            methods.setData();
                        });

                        $('#'+UniqueID+'-exit').click(function(){
                            methods.hidePopUp();
                        });
                    },

                    showPopUp:function(){// Show Pop-Up after the dates are selected.
                        var startDate, sYear, sMonth, sMonthText, sDay,
                        endDate, eYear, eMonth, eMonthText, eDay;

                        if (startSelection > endSelection){
                            endDate = startSelection.split('_')[1];
                            startDate = endSelection.split('_')[1];
                        }
                        else{
                            startDate = startSelection.split('_')[1];
                            endDate = endSelection.split('_')[1];
                        }

                        sYear = startDate.split('-')[0],
                        sMonth = startDate.split('-')[1],
                        sMonthText = monthNames[parseInt(sMonth)-1],
                        sDay = startDate.split('-')[2];

                        eYear = endDate.split('-')[0],
                        eMonth = endDate.split('-')[1],
                        eMonthText = monthNames[parseInt(eMonth)-1],
                        eDay = endDate.split('-')[2];


                        if (dateType == 1){
                            $('.DOP_BookingCalendar_PopUp .window .start-date', Container).html(sMonthText+' '+sDay+', '+sYear);
                        }
                        else{
                            $('.DOP_BookingCalendar_PopUp .window .start-date', Container).html(sDay+' '+sMonthText+' '+sYear);
                        }

                        if (startSelection != endSelection){
                            $('.DOP_BookingCalendar_PopUp .window .separator-date', Container).html('-');
                            if (dateType == 1){
                                $('.DOP_BookingCalendar_PopUp .window .end-date', Container).html(eMonthText+' '+eDay+', '+eYear);
                            }
                            else{
                                $('.DOP_BookingCalendar_PopUp .window .end-date', Container).html(eDay+' '+eMonthText+' '+eYear);
                            }
                        }

                        $('.DOP_BookingCalendar_PopUp', Container).stop(true, true).fadeIn(popupDisplayTime, function(){
                            
                        });
                    },

                    setData:function(){// Set submited data.                        
                        var newContent = new Array(),
                        firstContent = new Array,
                        lastContent = new Array(),
                        oldContent = Content, i, y, m, d, noDays,
                        startDate, sYear, sMonth, sDay,
                        endDate, eYear, eMonth, eDay,
                        fromMonth, toMonth, fromDay, toDay,
                        price;

                        if ($('#'+UniqueID+'-price').val() == ''){
                            price = 0;
                        }
                        else{
                            price = parseInt($('#'+UniqueID+'-price').val());
                        }

                        if (startSelection > endSelection){
                            endDate = startSelection.split('_')[1];
                            startDate = endSelection.split('_')[1];
                        }
                        else{
                            startDate = startSelection.split('_')[1];
                            endDate = endSelection.split('_')[1];
                        }
                        
                        sYear = parseInt(startDate.split('-')[0]);
                        sMonth = parseInt(startDate.split('-')[1]);
                        sDay = parseInt(startDate.split('-')[2]);

                        eYear = parseInt(endDate.split('-')[0]);
                        eMonth = parseInt(endDate.split('-')[1]);
                        eDay = parseInt(endDate.split('-')[2]);

                        
                        for (i=0; i<oldContent.length; i++){
                            if (oldContent[i].split(';;')[0] < startDate){
                                firstContent.push(oldContent[i]);
                            }
                            else if (oldContent[i].split(';;')[0] > endDate){
                                lastContent.push(oldContent[i]);
                            }
                        }
                        
                        for (y=sYear; y<=eYear; y++){
                            fromMonth = 1;
                            if (y == sYear){
                                fromMonth = sMonth;
                            }

                            toMonth = 12;
                            if (y == eYear){
                                toMonth = eMonth;
                            }

                            for (m=fromMonth; m<=toMonth; m++){
                                noDays = new Date(y, m, 0).getDate();
                                fromDay = 1;
                                if (y == sYear && m == sMonth){
                                    fromDay = sDay;
                                }

                                toDay = noDays;
                                if (y == eYear && m == eMonth){
                                    toDay = eDay;
                                }

                                for (d=fromDay; d<=toDay; d++){
                                    newContent.push(y+'-'+prototypes.longMonth(m)+'-'+prototypes.longDay(d)+';;'+$('#'+UniqueID+'-availability').val()+';;'+price);
                                }
                            }
                        }
                        
                        Content = [];
                        if (firstContent.length > 0){
                            Content = firstContent.concat(newContent, lastContent);
                        }
                        else{
                            Content = newContent.concat(lastContent);
                        }
                        
                        $('.DOP_BookingCalendar_Day', Container).each(function(){
                            var day = $(this);

                            if (day.hasClass('selected')){
                                if ($('#'+UniqueID+'-availability').val() == 0){
                                    day.addClass('booked');
                                    $('.content', this).html(bookedText);
                                }
                                else{
                                    day.addClass('available');
                                    if ($('#'+UniqueID+'-availability').val() == 1){
                                        $('.content', this).html($('#'+UniqueID+'-availability').val()+' '+oneAvailableText);
                                    }
                                    else{
                                        $('.content', this).html($('#'+UniqueID+'-availability').val()+' '+moreAvailableText);
                                    }
                                }

                                $('.price', this).html(currency+' '+price);
                            }
                        });

                        methods.saveData();
                        methods.hidePopUp();
                    },
                    saveData:function(){// Save data.
                        $.post(Data['SaveURL'], {dop_booking_calendar:Content.join(';;;')}, function(data){});
                    },

                    hidePopUp:function(){// Close Pop-Up.
                        $('.DOP_BookingCalendar_Day', Container).removeClass('selected');
                        $('.DOP_BookingCalendar_PopUp', Container).stop(true, true).fadeOut(popupDisplayTime, function(){

                        });
                    }
                  },

        prototypes = {
                        resizeItem:function(parent, child, cw, ch, dw, dh, pos){// Resize & Position an Item (the item is 100% visible)
                            var currW = 0, currH = 0;

                            if (dw <= cw && dh <= ch){
                                currW = dw;
                                currH = dh;
                            }
                            else{
                                currH = ch;
                                currW = (dw*ch)/dh;

                                if (currW > cw){
                                    currW = cw;
                                    currH = (dh*cw)/dw;
                                }
                            }

                            child.width(currW);
                            child.height(currH);
                            switch(pos.toLowerCase()){
                                case 'top':
                                    prototypes.topItem(parent, child, ch);
                                    break;
                                case 'bottom':
                                    prototypes.bottomItem(parent, child, ch);
                                    break;
                                case 'left':
                                    prototypes.leftItem(parent, child, cw);
                                    break;
                                case 'right':
                                    prototypes.rightItem(parent, child, cw);
                                    break;
                                case 'horizontal-center':
                                    prototypes.hCenterItem(parent, child, cw);
                                    break;
                                case 'vertical-center':
                                    prototypes.vCenterItem(parent, child, ch);
                                    break;
                                case 'center':
                                    prototypes.centerItem(parent, child, cw, ch);
                                    break;
                                case 'top-left':
                                    prototypes.tlItem(parent, child, cw, ch);
                                    break;
                                case 'top-center':
                                    prototypes.tcItem(parent, child, cw, ch);
                                    break;
                                case 'top-right':
                                    prototypes.trItem(parent, child, cw, ch);
                                    break;
                                case 'middle-left':
                                    prototypes.mlItem(parent, child, cw, ch);
                                    break;
                                case 'middle-right':
                                    prototypes.mrItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-left':
                                    prototypes.blItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-center':
                                    prototypes.bcItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-right':
                                    prototypes.brItem(parent, child, cw, ch);
                                    break;
                            }
                        },
                        resizeItem2:function(parent, child, cw, ch, dw, dh, pos){// Resize & Position an Item (the item covers all the container)
                            var currW = 0, currH = 0;

                            currH = ch;
                            currW = (dw*ch)/dh;

                            if (currW < cw){
                                currW = cw;
                                currH = (dh*cw)/dw;
                            }

                            child.width(currW);
                            child.height(currH);

                            switch(pos.toLowerCase()){
                                case 'top':
                                    prototypes.topItem(parent, child, ch);
                                    break;
                                case 'bottom':
                                    prototypes.bottomItem(parent, child, ch);
                                    break;
                                case 'left':
                                    prototypes.leftItem(parent, child, cw);
                                    break;
                                case 'right':
                                    prototypes.rightItem(parent, child, cw);
                                    break;
                                case 'horizontal-center':
                                    prototypes.hCenterItem(parent, child, cw);
                                    break;
                                case 'vertical-center':
                                    prototypes.vCenterItem(parent, child, ch);
                                    break;
                                case 'center':
                                    prototypes.centerItem(parent, child, cw, ch);
                                    break;
                                case 'top-left':
                                    prototypes.tlItem(parent, child, cw, ch);
                                    break;
                                case 'top-center':
                                    prototypes.tcItem(parent, child, cw, ch);
                                    break;
                                case 'top-right':
                                    prototypes.trItem(parent, child, cw, ch);
                                    break;
                                case 'middle-left':
                                    prototypes.mlItem(parent, child, cw, ch);
                                    break;
                                case 'middle-right':
                                    prototypes.mrItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-left':
                                    prototypes.blItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-center':
                                    prototypes.bcItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-right':
                                    prototypes.brItem(parent, child, cw, ch);
                                    break;
                            }
                        },

                        topItem:function(parent, child, ch){// Position Item on Top
                            parent.height(ch);
                            child.css('margin-top', 0);
                        },
                        bottomItem:function(parent, child, ch){// Position Item on Bottom
                            parent.height(ch);
                            child.css('margin-top', ch-child.height());
                        },
                        leftItem:function(parent, child, cw){// Position Item on Left
                            parent.width(cw);
                            child.css('margin-left', 0);
                        },
                        rightItem:function(parent, child, cw){// Position Item on Right
                            parent.width(cw);
                            child.css('margin-left', parent.width()-child.width());
                        },
                        hCenterItem:function(parent, child, cw){// Position Item on Horizontal Center
                            parent.width(cw);
                            child.css('margin-left', (cw-child.width())/2);
                        },
                        vCenterItem:function(parent, child, ch){// Position Item on Vertical Center
                            parent.height(ch);
                            child.css('margin-top', (ch-child.height())/2);
                        },
                        centerItem:function(parent, child, cw, ch){// Position Item on Center
                            prototypes.hCenterItem(parent, child, cw);
                            prototypes.vCenterItem(parent, child, ch);
                        },
                        tlItem:function(parent, child, cw, ch){// Position Item on Top-Left
                            prototypes.topItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        tcItem:function(parent, child, cw, ch){// Position Item on Top-Center
                            prototypes.topItem(parent, child, ch);
                            prototypes.hCenterItem(parent, child, cw);
                        },
                        trItem:function(parent, child, cw, ch){// Position Item on Top-Right
                            prototypes.topItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        mlItem:function(parent, child, cw, ch){// Position Item on Middle-Left
                            prototypes.vCenterItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        mrItem:function(parent, child, cw, ch){// Position Item on Middle-Right
                            prototypes.vCenterItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        blItem:function(parent, child, cw, ch){// Position Item on Bottom-Left
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        bcItem:function(parent, child, cw, ch){// Position Item on Bottom-Center
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.hCenterItem(parent, child, cw);
                        },
                        brItem:function(parent, child, cw, ch){// Position Item on Bottom-Right
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },

                        longMonth:function(month){// Return month with 0 in front if smaller then 10.
                            if (month < 10){
                                return '0'+month;
                            }
                            else{
                                return month;
                            }

                        },
                        longDay:function(day){// Return day with 0 in front if smaller then 10.
                            if (day < 10){
                                return '0'+day;
                            }
                            else{
                                return day;
                            }
                        },

                        randomize:function(theArray){// Randomize the items of an array
                            theArray.sort(function(){
                                return 0.5-Math.random();
                            });
                            return theArray;
                        },
                        randomString:function(string_length){// Create a string with random elements
                            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz",
                            random_string = '';

                            for (var i=0; i<string_length; i++){
                                var rnum = Math.floor(Math.random()*chars.length);
                                random_string += chars.substring(rnum,rnum+1);
                            }
                            return random_string;
                        },

                        isIE8Browser:function(){// Detect the browser IE8
                            var isIE8 = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('msie 8') != -1){
                                isIE8 = true;
                            }
                            return isIE8;
                        },
                        isTouchDevice:function(){// Detect Touchscreen devices
                            var isTouch = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('android') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('blackberry') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('ipad') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('iphone') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('ipod') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('palm') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('series60') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('symbian') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('windows ce') != -1){
                                isTouch = true;
                            }

                            return isTouch;
                        },

                        openLink:function(url, target){// Open a link.
                            if (target.toLowerCase() == '_blank'){
                                window.open(url);
                            }
                            else{
                                window.location = url;
                            }
                        }
                     };

        return methods.init.apply(this);
    }
})(jQuery);