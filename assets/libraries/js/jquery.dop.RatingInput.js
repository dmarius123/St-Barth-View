
/*
* Title                   : Rating Input
* Version                 : 1.0
* File                    : jquery.dop.RatingInput.js
* File Version            : 1.0
* Created / Last Modified : 26 June 2011
* Author                  : Marius-Cristian Donea
* Copyright               : © 2011 Marius-Cristian Donea
* Website                 : http://www.mariuscristiandonea.com
* Description             : Rating Input jQuery plugin.
*/

(function($){
    $.fn.DOPRatingInput = function(options){
        var Settings = {
                        'ID': 'dop_rating_field', // Field ID. Default value: dop_rating_field.
                        'DefaultItem': 'RatingInput/images/default-item.png', // Default Item Image (path to image). Default value: RatingInput/images/default-item.png .
                        'RateItem': 'RatingInput/images/rate-item.png', // Rate Item Image (path to image). Default value: RatingInput/images/rate-item.png .
                        'Position': 'horizontal', // Position (horizontal, vertical). Default value: horizontal.
                        'Length': 5, // Length, number of items (number). Default value: 5.
                        'Default': 0, // Default Value (number). Default value: 0.
                        'ValueType': 'integer', // Value Type (integer, float). Default value: integer.
                        'FloatLength': 2, // Float Length, number of decimals (number). Default value: 2.
                        'HoverCallback': '', // Hover Callback function.
                        'HoverOutCallback': '', // Hover Out Callback function.
                        'ClickCallback': '' // Click Callback function.
                       },
        Container = this,
        defaultImg = new Image(),
        rateImg = new Image(),
        itemSize = 0,
        hoverValue = 0,
        showRates = true,

        methods = {
                    init:function(){// Init Plugin.
                        return this.each(function(){
                            if (options){
                                $.extend(Settings, options);
                            }
                            methods.initRatingInput();
                        });
                    },
                    initRatingInput:function(){// Init Rating Input
                        var HTML = new Array(), i;

                        if (Settings['Position'] == 'vertical'){
                            HTML.push('<span id="'+Settings['ID']+'-container" style="cursor:pointer; display:block;">');
                            HTML.push('    <input type="hidden" name="'+Settings['ID']+'-dop-default" id="'+Settings['ID']+'-dop-default" value="'+Settings['Default']+'" />');
                            HTML.push('    <input type="hidden" name="'+Settings['ID']+'" id="'+Settings['ID']+'" value="'+Settings['Default']+'" />');
                            HTML.push('    <span class="'+Settings['ID']+'-default-items" style="position:absolute;">');
                            for (i=1; i<=Settings['Length']; i++){
                                HTML.push('        <span class="'+Settings['ID']+'-default-item" id="'+Settings['ID']+'-default-item'+i+'"></span>');
                            }
                            HTML.push('    </span>');
                            HTML.push('    <span class="'+Settings['ID']+'-rate-items-wrapper" style="position:absolute; overflow:hidden;">');
                            HTML.push('        <span class="'+Settings['ID']+'-rate-items" style="display:block;">');
                            for (i=1; i<=Settings['Length']; i++){
                                HTML.push('        <span class="'+Settings['ID']+'-rate-item" id="'+Settings['ID']+'-rate-item'+i+'"></span>');
                            }
                            HTML.push('        </span>');
                            HTML.push('    </span>');
                            HTML.push('</span>');
                        }
                        else{
                            HTML.push('<span id="'+Settings['ID']+'-container" style="cursor:pointer; display:block;">');
                            HTML.push('    <input type="hidden" name="'+Settings['ID']+'-dop-default" id="'+Settings['ID']+'-dop-default" value="'+Settings['Default']+'" />');
                            HTML.push('    <input type="hidden" name="'+Settings['ID']+'" id="'+Settings['ID']+'" value="'+Settings['Default']+'" />');
                            HTML.push('    <span class="'+Settings['ID']+'-default-items" style="position:absolute;">');
                            for (i=1; i<=Settings['Length']; i++){
                                HTML.push('        <span class="'+Settings['ID']+'-default-item" id="'+Settings['ID']+'-default-item'+i+'" style="float:left;"></span>');
                            }
                            HTML.push('        <br class="clear:both;" />');
                            HTML.push('    </span>');
                            HTML.push('    <span class="'+Settings['ID']+'-rate-items-wrapper" style="position:absolute; overflow:hidden;">');
                            HTML.push('        <span class="'+Settings['ID']+'-rate-items" style="display:block;">');
                            for (i=1; i<=Settings['Length']; i++){
                                HTML.push('        <span class="'+Settings['ID']+'-rate-item" id="'+Settings['ID']+'-rate-item'+i+'" style="float:left;"></span>');
                            }
                            HTML.push('            <br class="clear:both;" />');
                            HTML.push('        </span>');
                            HTML.push('    </span>');
                            HTML.push('</span>');
                        }
                        
                        $(Container).html(HTML.join(''));
                        methods.loadDefaultItem();
                    },
                    loadDefaultItem:function(){// Load Default Item
                        $(defaultImg).load(function(){
                            methods.initDefaultItems();
                            methods.loadRateItem();
                        }).error(function(){
                        }).attr('src', Settings['DefaultItem']);
                    },
                    initDefaultItems:function(){// Init Default Items
                        $('.'+Settings['ID']+'-default-item').html(defaultImg);
                        if (Settings['Position'] == 'vertical'){
                            $('.'+Settings['ID']+'-default-items').height($('.'+Settings['ID']+'-default-item').children().height()*Settings['Length']);
                        }
                        else{
                            $('.'+Settings['ID']+'-default-items').width($('.'+Settings['ID']+'-default-item').children().width()*Settings['Length']);
                        }
                    },
                    loadRateItem:function(){// Load Rate Item
                        $(rateImg).load(function(){
                            methods.initRateItems();
                            methods.initEvents();
                        }).error(function(){
                        }).attr('src', Settings['RateItem']);
                    },
                    initRateItems:function(){// Init Rate Items
                        $('.'+Settings['ID']+'-rate-item').html(rateImg);
                        if (Settings['Position'] == 'vertical'){
                            $('#'+Settings['ID']+'-container').width($('.'+Settings['ID']+'-rate-item').children().width());
                            itemSize = $('.'+Settings['ID']+'-rate-item').children().height();
                            $('#'+Settings['ID']+'-container').height($('#'+Settings['ID']).val()*itemSize);
                            $('.'+Settings['ID']+'-rate-items-wrapper').height($('#'+Settings['ID']).val()*itemSize);
                        }
                        else{
                            $('#'+Settings['ID']+'-container').height($('.'+Settings['ID']+'-rate-item').children().height());
                            itemSize = $('.'+Settings['ID']+'-rate-item').children().width();
                            $('.'+Settings['ID']+'-rate-items-wrapper').width($('#'+Settings['ID']).val()*itemSize);
                            $('.'+Settings['ID']+'-rate-items').width(itemSize*Settings['Length']);
                        }
                    },
                    initEvents:function(){// Init Events
                        $('#'+Settings['ID']+'-container').mousemove(function(e){
                            var posX = e.clientX-$(this).offset().left+$(document).scrollLeft(),
                            posY = e.clientY-$(this).offset().top+$(document).scrollTop(),
                            val = 0, noDec = Math.pow(10, Settings['FloatLength']);

                            if (showRates){
                                if (Settings['Position'] == 'vertical'){
                                    if (Settings['ValueType'] == 'integer'){
                                        if (posY%itemSize != 0){
                                            val = (parseInt(posY/itemSize)+1)*itemSize;
                                        }
                                        else{
                                            val = posY;
                                        }
                                        hoverValue = Math.round(val/itemSize*noDec)/noDec;
                                    }
                                    else{
                                        val = posY;
                                        hoverValue = Math.round(val/itemSize*noDec)/noDec;
                                    }
                                    $('.'+Settings['ID']+'-rate-items-wrapper').height(val);
                                }
                                else{
                                    if (Settings['ValueType'] == 'integer'){
                                        if (posX%itemSize != 0){
                                            val = (parseInt(posX/itemSize)+1)*itemSize;
                                        }
                                        else{
                                            val = posX;
                                        }
                                        hoverValue = Math.round(val/itemSize*noDec)/noDec;
                                    }
                                    else{
                                        val = posX;
                                        hoverValue = Math.round(val/itemSize*noDec)/noDec;
                                    }
                                    $('.'+Settings['ID']+'-rate-items-wrapper').width(val);
                                }

                                $('#'+Settings['ID']).val(hoverValue);

                                if (Settings['HoverCallback'] != ''){
                                    eval(Settings['HoverCallback']);
                                }
                            }
                        });

                        $('#'+Settings['ID']+'-container').click(function(){
                            showRates = false;
                            $('#'+Settings['ID']+'-dop-default').val(hoverValue);
                            $('#'+Settings['ID']).val(hoverValue);
                            if (Settings['ClickCallback'] != ''){
                                eval(Settings['ClickCallback']);
                            }
                        });

                        $('#'+Settings['ID']+'-container').hover(function(){
                        }, function(){
                            showRates = true;
                            $('#'+Settings['ID']).val($('#'+Settings['ID']+'-dop-default').val());
                            if (Settings['Position'] == 'vertical'){
                                $('.'+Settings['ID']+'-rate-items-wrapper').height($('#'+Settings['ID']+'-dop-default').val()*itemSize);
                            }
                            else{
                                $('.'+Settings['ID']+'-rate-items-wrapper').width($('#'+Settings['ID']+'-dop-default').val()*itemSize);
                            }

                            if (Settings['HoverOutCallback'] != ''){
                                eval(Settings['HoverOutCallback']);
                            }
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
                        },

                        validateCharacters:function(str, allowedCharacters){
                            var characters = str.split('');

                            for (var i=0; i<characters.length; i++)
                                if (allowedCharacters.indexOf(characters[i]) == -1) return false;
                            return true;
                        },
                        validEmail:function(email){
                            var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
                            if (filter.test(email))
                                {return true;}
                            return false;
                        }
                     };

        return methods.init.apply(this);
    }
})(jQuery);