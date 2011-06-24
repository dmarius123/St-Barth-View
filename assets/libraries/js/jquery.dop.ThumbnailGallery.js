
/*
* Title                   : Thumbnail Gallery
* Version                 : 1.1
* File                    : jquery.dop.ThumbnailGallery.js
* File Version            : 1.1
* Created / Last Modified : 20 May 2011
* Author                  : Marius-Cristian Donea
* Copyright               : © 2011 Marius-Cristian Donea
* Website                 : http://www.mariuscristiandonea.com
* Description             : Thumbnail Gallery jQuery Plugin.
*/

(function($){
    $.fn.DOPThumbnailGallery = function(options){
        var XMLFiles = {'SettingsXMLFilePath':'ThumbnailGallery/xml/SettingsThumbnailGallery.xml', 'ContentXMLFilePath':'ThumbnailGallery/xml/ThumbnailGallery.xml'},

        Container = this,
        
        Width = '100%',
        Height = '100%',
        BgColor = 'css',
        BgImage = 'none',
        BgAlpha = 100,

        ThumbnailsPosition = 'bottom',
        ThumbnailsOverImage = 'false',
        ThumbnailsBgColor = 'css',
        ThumbnailsBgAlpha = '100',
        ThumbnailsSpacing = 0,
        ThumbnailsPaddingTop = 0,
        ThumbnailsPaddingRight = 0,
        ThumbnailsPaddingBottom = 0,
        ThumbnailsPaddingLeft = 0,
        
        ThumbnailLoader = 'ThumbnailGallery/images/ThumbnailLoader.gif',
        ThumbnailWidth = 50,
        ThumbnailHeight = 50,
        ThumbnailAlpha = '50',
        ThumbnailAlphaHover = '100',
        ThumbnailAlphaSelected = '100',
        ThumbnailBgColor = 'ffffff',
        ThumbnailBgColorHover = 'ffffff',
        ThumbnailBgColorSelected = 'ffffff',
        ThumbnailBorderSize = 0,
        ThumbnailBorderColor = '000000',
        ThumbnailBorderColorHover = '000000',
        ThumbnailBorderColorSelected = '000000',
        ThumbnailPaddingTop = 0,
        ThumbnailPaddingRight = 0,
        ThumbnailPaddingBottom = 0,
        ThumbnailPaddingLeft = 0,

        ImageLoader = 'ThumbnailGallery/images/ImageLoader.gif',
        ImageBgColor = 'css',
        ImageBgAlpha = '100',
        ImageDisplayType = 'fit',
        ImageDisplayTime = '1000',
        ImageMarginTop = 0,
        ImageMarginRight = 0,
        ImageMarginBottom = 0,
        ImageMarginLeft = 0,
        ImagePaddingTop = 0,
        ImagePaddingRight = 0,
        ImagePaddingBottom = 0,
        ImagePaddingLeft = 0,
        
        Navigation = 'true',
        NavigationColor = 'ffffff',
        NavigationColorHover = 'ffffff',
        NavigationIconColor = '000000',
        NavigationIconColorHover = '000000',
        NavigationAlpha = '50',
        NavigationAlphaHover = '100',

        CaptionWidth = 'auto',
        CaptionHeight = '70',
        CaptionTitleColor = 'css',
        CaptionTextColor = 'css',
        CaptionBgColor = 'css',
        CaptionBgAlpha = '50',
        CaptionPosition = 'bottom',
        CaptionScrollScrubColor = 'css',
        CaptionScrollBgColor = 'css',
        CaptionMarginTop = 0,
        CaptionMarginRight = 0,
        CaptionMarginBottom = 0,
        CaptionMarginLeft = 0,
        CaptionPaddingTop = 10,
        CaptionPaddingRight = 10,
        CaptionPaddingBottom = 10,
        CaptionPaddingLeft = 10,
        
        TooltipEnabled = 'false',
        TooltipBgColor = 'css',
        TooltipStrokeColor = 'css',
        TooltipTextColor = 'css',
        
        Slideshow = 'false',
        SlideshowTime = '5000',
        SlideshowLoop = 'true',

        AutoHide = 'false',
        AutoHideTime = '2000',
        
        Images = new Array(),
        Thumbs = new Array(),
        CaptionTitle = new Array(),
        CaptionText = new Array(),
        noImages = 0,
        
        BgImageLoaded = false,
        BgImageWidth = 0,
        BgImageHeight = 0,

        currentImage = 0,
        imageLoaded = false,
        ImageWidth = 0,
        ImageHeight = 0,

        SlideshowID,

        HideID,
        ItemsHidden,

        methods = {
                    init:function(){// Init Plugin.
                        return this.each(function(){
                            if (options){
                                $.extend(XMLFiles, options);
                            }
                            methods.parseSettingsXML(XMLFiles['SettingsXMLFilePath']);
                            $(window).bind('resize.DOPThumbnailGallery', methods.initRP);
                            $(window).bind('scroll.DOPThumbnailGallery', methods.initRP);
                        });
                    },
                    parseSettingsXML:function(path){// Parse the Settings XML.
                        $.ajax({type:"GET", url:path, dataType:"xml", success:function(xml){
                            var $xml = $(xml);
                            
                            Width = $xml.find('Width').text() || "100%";
                            Height = $xml.find('Height').text() || "100%";
                            BgColor = $xml.find('BgColor').text() || "css";
                            BgImage = $xml.find('BgImage').text() || "none";
                            BgAlpha = $xml.find('BgAlpha').text() || 100;

                            ThumbnailsPosition = $xml.find('ThumbnailsPosition').text() || "bottom";
                            ThumbnailsOverImage = $xml.find('ThumbnailsOverImage').text() || "false";
                            ThumbnailsBgColor = $xml.find('ThumbnailsBgColor').text() || "css";
                            ThumbnailsBgAlpha = $xml.find('ThumbnailsBgAlpha').text() || 100;
                            ThumbnailsSpacing = parseInt($xml.find('ThumbnailsSpacing').text()) || 0;
                            ThumbnailsPaddingTop = parseInt($xml.find('ThumbnailsPaddingTop').text()) || 0;
                            ThumbnailsPaddingRight = parseInt($xml.find('ThumbnailsPaddingRight').text()) || 0;
                            ThumbnailsPaddingBottom = parseInt($xml.find('ThumbnailsPaddingBottom').text()) || 0;
                            ThumbnailsPaddingLeft = parseInt($xml.find('ThumbnailsPaddingLeft').text()) || 0;

                            ThumbnailLoader = $xml.find('ThumbnailLoader').text() || "ThumbnailGallery/images/ThumbnailLoader.gif";
                            ThumbnailWidth = parseInt($xml.find('ThumbnailWidth').text()) || 50;
                            ThumbnailHeight = parseInt($xml.find('ThumbnailHeight').text()) || 50;
                            ThumbnailAlpha = $xml.find('ThumbnailAlpha').text() || 50;
                            ThumbnailAlphaHover = $xml.find('ThumbnailAlphaHover').text() || 100;
                            ThumbnailAlphaSelected = $xml.find('ThumbnailAlphaSelected').text() || 100;
                            ThumbnailBgColor = $xml.find('ThumbnailBgColor').text() || "ffffff";
                            ThumbnailBgColorHover = $xml.find('ThumbnailBgColorHover').text() || "ffffff";
                            ThumbnailBgColorSelected = $xml.find('ThumbnailBgColorSelected').text() || "ffffff";
                            ThumbnailBorderSize = parseInt($xml.find('ThumbnailBorderSize').text()) || 0;
                            ThumbnailBorderColor = $xml.find('ThumbnailBorderColor').text() || "000000";
                            ThumbnailBorderColorHover = $xml.find('ThumbnailBorderColorHover').text() || "000000";
                            ThumbnailBorderColorSelected = $xml.find('ThumbnailBorderColorSelected').text() || "000000";
                            ThumbnailPaddingTop = parseInt($xml.find('ThumbnailPaddingTop').text()) || 0;
                            ThumbnailPaddingRight = parseInt($xml.find('ThumbnailPaddingRight').text()) || 0;
                            ThumbnailPaddingBottom = parseInt($xml.find('ThumbnailPaddingBottom').text()) || 0;
                            ThumbnailPaddingLeft = parseInt($xml.find('ThumbnailPaddingLeft').text()) || 0;

                            ImageLoader = $xml.find('ImageLoader').text() || "ThumbnailGallery/images/ImageLoader.gif";
                            ImageBgColor = $xml.find('ImageBgColor').text() || "css";
                            ImageBgAlpha = $xml.find('ImageBgAlpha').text() || 100;
                            ImageDisplayType = $xml.find('ImageDisplayType').text() || "fit";
                            ImageDisplayTime = parseInt($xml.find('ImageDisplayTime').text()) || 1000;
                            ImageMarginTop = parseInt($xml.find('ImageMarginTop').text()) || 0;
                            ImageMarginRight = parseInt($xml.find('ImageMarginRight').text()) || 0;
                            ImageMarginBottom = parseInt($xml.find('ImageMarginBottom').text()) || 0;
                            ImageMarginLeft = parseInt($xml.find('ImageMarginLeft').text()) || 0;
                            ImagePaddingTop = parseInt($xml.find('ImagePaddingTop').text()) || 0;
                            ImagePaddingRight = parseInt($xml.find('ImagePaddingRight').text()) || 0;
                            ImagePaddingBottom = parseInt($xml.find('ImagePaddingBottom').text()) || 0;
                            ImagePaddingLeft = parseInt($xml.find('ImagePaddingLeft').text()) || 0;

                            Navigation = $xml.find('Navigation').text() || "true";
                            NavigationColor = $xml.find('NavigationColor').text() || "ffffff";
                            NavigationColorHover = $xml.find('NavigationColorHover').text() || "ffffff";
                            NavigationIconColor = $xml.find('NavigationIconColor').text() || "000000";
                            NavigationIconColorHover = $xml.find('NavigationIconColorHover').text() || "000000";
                            NavigationAlpha = $xml.find('NavigationAlpha').text() ||50;
                            NavigationAlphaHover = $xml.find('NavigationAlphaHover').text() || 100;
        
                            CaptionWidth = $xml.find('CaptionWidth').text() || "auto";
                            CaptionHeight = $xml.find('CaptionHeight').text() || "70";
                            CaptionTitleColor = $xml.find('CaptionTitleColor').text() || "css";
                            CaptionTextColor = $xml.find('CaptionTextColor').text() || "css";
                            CaptionBgColor = $xml.find('CaptionBgColor').text() || "css";
                            CaptionBgAlpha = $xml.find('CaptionBgAlpha').text() || 50;
                            CaptionPosition = $xml.find('CaptionPosition').text() || "bottom";
                            CaptionScrollScrubColor = $xml.find('CaptionScrollScrubColor').text() || "css";
                            CaptionScrollBgColor = $xml.find('CaptionScrollBgColor').text() || "css";
                            CaptionMarginTop = parseInt($xml.find('CaptionMarginTop').text()) || 0;
                            CaptionMarginRight = parseInt($xml.find('CaptionMarginRight').text()) || 0;
                            CaptionMarginBottom = parseInt($xml.find('CaptionMarginBottom').text()) || 0;
                            CaptionMarginLeft = parseInt($xml.find('CaptionMarginLeft').text()) || 0;
                            CaptionPaddingTop = parseInt($xml.find('CaptionPaddingTop').text()) || 10;
                            CaptionPaddingRight = parseInt($xml.find('CaptionPaddingRight').text()) || 10;
                            CaptionPaddingBottom = parseInt($xml.find('CaptionPaddingBottom').text()) || 10;
                            CaptionPaddingLeft = parseInt($xml.find('CaptionPaddingLeft').text()) || 10;
        
                            TooltipEnabled = $xml.find('TooltipEnabled').text() || "false";
                            TooltipBgColor = $xml.find('TooltipBgColor').text() || "css";
                            TooltipStrokeColor = $xml.find('TooltipStrokeColor').text() || "css";
                            TooltipTextColor = $xml.find('TooltipTextColor').text() || "css";

                            Slideshow = $xml.find('Slideshow').text() || "false";
                            SlideshowTime = parseInt($xml.find('SlideshowTime').text()) || 5000;
                            SlideshowLoop = $xml.find('SlideshowLoop').text() || "true";

                            AutoHide = $xml.find('AutoHide').text() || "false";
                            AutoHideTime = parseInt($xml.find('AutoHideTime').text()) || 2000;

                            methods.parseContentXML(XMLFiles['ContentXMLFilePath']);
                        }});
                    },
                    parseContentXML:function(path){// Parse the Content XML.
                        $.ajax({type:"GET", url:path, dataType:"xml", success:function(xml){
                            $(xml).find('Image').each(function(){
                                Images.push($(this).attr('Path'));
                                Thumbs.push($(this).attr('ThumbPath'));
                                CaptionTitle.push($(this).attr('Title'));
                                CaptionText.push($(this).text());
                            });
                            noImages = Images.length;
                            methods.initGallery();
                        }});
                    },
                    initGallery:function(){// Init the Gallery
                        var HTML = new Array();

                        HTML.push('<div class="DOP_ThumbnailGallery_Container">');

                        HTML.push('   <div class="DOP_ThumbnailGallery_Background"></div>');

                        HTML.push('   <div class="DOP_ThumbnailGallery_ThumbnailsContainer">');
                        HTML.push('       <div class="DOP_ThumbnailGallery_ThumbnailsBg"></div>');
                        HTML.push('       <div class="DOP_ThumbnailGallery_ThumbnailsWrapper">');
                        HTML.push('           <div class="DOP_ThumbnailGallery_Thumbnails"></div>');
                        HTML.push('       </div>');
                        HTML.push('   </div>');

                        HTML.push('   <div class="DOP_ThumbnailGallery_ImageWrapper">');
                        HTML.push('       <div class="DOP_ThumbnailGallery_ImageBg"></div>');
                        HTML.push('       <div class="DOP_ThumbnailGallery_Image"></div>');
                        HTML.push('       <div class="DOP_ThumbnailGallery_Caption">');
                        HTML.push('           <div class="DOP_ThumbnailGallery_CaptionBg"></div>');
                        HTML.push('           <div class="DOP_ThumbnailGallery_CaptionTextWrapper">');
                        HTML.push('               <div class="DOP_ThumbnailGallery_CaptionTitle"></div>');
                        HTML.push('               <div class="DOP_ThumbnailGallery_CaptionTextContainer">');
                        HTML.push('                   <div class="DOP_ThumbnailGallery_CaptionText"></div>');
                        HTML.push('               </div>');
                        HTML.push('           </div>');
                        HTML.push('       </div>');
                        HTML.push('   </div>');

                        if (Navigation == 'true'){
                            HTML.push('   <div class="DOP_ThumbnailGallery_NavigationLeft">');
                            HTML.push('       <div class="Icon"></div>');
                            HTML.push('   </div>');
                            HTML.push('   <div class="DOP_ThumbnailGallery_NavigationRight">');
                            HTML.push('       <div class="Icon"></div>');
                            HTML.push('   </div>');
                        }
                        
                        if (TooltipEnabled == 'true'){
                            HTML.push('   <div class="DOP_ThumbnailGallery_Tooltip"></div>');
                        }

                        HTML.push('</div>');

                        Container.html(HTML.join(""));
                        methods.initSettings();
                    },
                    initSettings:function(){// Init Settings
                        methods.initContainer();
                        methods.initBackground();
                        methods.initThumbnails();
                        methods.initImage();
                        if (Navigation == 'true'){
                            methods.initNavigation();
                        }
                        if (TooltipEnabled == 'true'){
                            methods.initTooltip();
                        }
                        methods.initCaption();
                        if (AutoHide == 'true'){
                            methods.initAutoHide();
                        }
                    },
                    initRP:function(){// Init Resize & Positioning
                        methods.rpContainer();
                        methods.rpBackground();
                        methods.rpThumbnails();
                        methods.rpImage();
                        if (Navigation == 'true'){
                            methods.rpNavigation();
                        }
                    },

                    initContainer:function(){// Init Gallery Container
                        $('.DOP_ThumbnailGallery_Container', Container).css('display', 'block');
                        methods.rpContainer();
                    },
                    rpContainer:function(){// Resize & Position the Container
                        if (Width != 'css'){
                            if (Width == '100%'){
                                $('.DOP_ThumbnailGallery_Container', Container).width($(Container).width());
                            }
                            else{
                                $('.DOP_ThumbnailGallery_Container', Container).width(Width);
                            }
                        }
                        if (Height != 'css'){
                            if (Height == '100%'){
                                $('.DOP_ThumbnailGallery_Container', Container).height($(Container).height());
                            }
                            else{
                                $('.DOP_ThumbnailGallery_Container', Container).height(Height);
                            }
                        }
                    },

                    initBackground:function(){// Init Background
                        if (BgColor != 'css'){
                            $('.DOP_ThumbnailGallery_Background', Container).css('background-color', '#'+BgColor);
                        }
                        $('.DOP_ThumbnailGallery_Background', Container).css('opacity', parseInt(BgAlpha)/100);

                        if (BgImage != 'none'){
                            var img = new Image();
                            $(img).load(function(){
                                BgImageLoaded = true;
                                $('.DOP_ThumbnailGallery_Background', Container).html(this);
                                BgImageWidth = $('img', '.DOP_ThumbnailGallery_Background', Container).width();
                                BgImageHeight = $('img', '.DOP_ThumbnailGallery_Background', Container).height();
                                methods.rpBackground();
                                $('img', '.DOP_ThumbnailGallery_Background', Container).css('opacity', 0);
                                $('img', '.DOP_ThumbnailGallery_Background', Container).stop(true, true).animate({'opacity':'1'}, 600);
                            }).attr('src', BgImage);
                        }

                        methods.rpBackground();
                    },
                    rpBackground:function(){// Resize & Position Background
                        if (Width != 'css'){
                            if (Width == '100%'){
                                $('.DOP_ThumbnailGallery_Background', Container).width($(Container).width());
                            }
                            else{
                                $('.DOP_ThumbnailGallery_Background', Container).width(Width);
                            }
                        }
                        if (Height != 'css'){
                            if (Height == '100%'){
                                $('.DOP_ThumbnailGallery_Background', Container).height($(Container).height());
                            }
                            else{
                                $('.DOP_ThumbnailGallery_Background', Container).height(Height);
                            }
                        }

                        if (BgImage != 'none' && BgImageLoaded){
                            prototypes.resizeItem2($('.DOP_ThumbnailGallery_Background', Container), $('.DOP_ThumbnailGallery_Background', Container).children(), $('.DOP_ThumbnailGallery_Background', Container).width(), $('.DOP_ThumbnailGallery_Background', Container).height(), BgImageWidth, BgImageHeight, 'center');
                        }
                    },
                    
                    initThumbnails:function(){// Init Thumbnails
                        if (ThumbnailsBgColor != 'css'){
                            $('.DOP_ThumbnailGallery_ThumbnailsBg', Container).css('background-color', '#'+ThumbnailsBgColor);
                        }
                        $('.DOP_ThumbnailGallery_ThumbnailsBg', Container).css('opacity', parseInt(ThumbnailsBgAlpha/100));

                        methods.rpThumbnails();
                        
                        $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).css('margin-top', ThumbnailsPaddingTop);
                        $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).css('margin-left', ThumbnailsPaddingLeft);
                        
                        if (ThumbnailsPosition == 'top'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).css('margin-top', 0-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height());
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-top':0}, 600);
                        }
                        if (ThumbnailsPosition == 'right'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).css('margin-left', $('.DOP_ThumbnailGallery_Container', Container).width());
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-left': $('.DOP_ThumbnailGallery_Container', Container).width()-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width()}, 600);
                        }
                        if (ThumbnailsPosition == 'bottom'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).css('margin-top', $('.DOP_ThumbnailGallery_Container', Container).height());
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-top':$('.DOP_ThumbnailGallery_Container', Container).height()-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height()}, 600);
                        }
                        if (ThumbnailsPosition == 'left'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).css('margin-left', 0-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width());
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-left':0}, 600);
                        }
                        $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).hover(function(){
                            thumbnailsMove = true;
                        });
                        
                        methods.moveThumbnails();
                        methods.loadThumb(1);
                    },
                    loadThumb:function(no){// Load Thumbnail No
                        methods.initThumb(no);
                        var img = new Image();
                        
                        $(img).load(function(){
                            $('#DOP_ThumbnailGallery_Thumb_'+no, Container).html(this);
                            methods.loadCompleteThumb(no);
                            if (no < noImages){
                                methods.loadThumb(no+1);
                            }
                        }).attr('src', Thumbs[no-1]);
                    },
                    initThumb:function(no){// Init Thumbnail
                        var ThumbHTML = new Array();
                        ThumbHTML.push('<div class="DOP_ThumbnailGallery_ThumbContainer" id="DOP_ThumbnailGallery_ThumbContainer_'+no+'">');
                        ThumbHTML.push('   <div class="DOP_ThumbnailGallery_Thumb" id="DOP_ThumbnailGallery_Thumb_'+no+'"></div>');
                        ThumbHTML.push('</div>');
                        
                        if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                            if (no == 1){
                                $('.DOP_ThumbnailGallery_Thumbnails', Container).width($('.DOP_ThumbnailGallery_Thumbnails', Container).width()+ThumbnailWidth+(2*ThumbnailBorderSize)+ThumbnailPaddingRight+ThumbnailPaddingLeft);
                            }
                            else{
                                $('.DOP_ThumbnailGallery_Thumbnails', Container).width($('.DOP_ThumbnailGallery_Thumbnails', Container).width()+ThumbnailWidth+(2*ThumbnailBorderSize)+ThumbnailPaddingRight+ThumbnailPaddingLeft+ThumbnailsSpacing);
                            }
                        }

                        $('.DOP_ThumbnailGallery_Thumbnails', Container).append(ThumbHTML.join(""));

                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('opacity', parseInt(ThumbnailAlpha)/100);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).width(ThumbnailWidth+ThumbnailPaddingRight+ThumbnailPaddingLeft);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).height(ThumbnailHeight+ThumbnailPaddingTop+ThumbnailPaddingBottom);
                        $('#DOP_ThumbnailGallery_Thumb_'+no, Container).css('margin-top', ThumbnailPaddingTop);
                        $('#DOP_ThumbnailGallery_Thumb_'+no, Container).css('margin-left', ThumbnailPaddingLeft);
                        $('#DOP_ThumbnailGallery_Thumb_'+no, Container).css('margin-bottom', ThumbnailPaddingBottom);
                        $('#DOP_ThumbnailGallery_Thumb_'+no, Container).css('margin-right', ThumbnailPaddingRight);
                                                
                        if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                            $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).height(ThumbnailHeight+ThumbnailPaddingTop+ThumbnailPaddingBottom);
                        }
                        else{
                            $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).width(ThumbnailWidth+ThumbnailPaddingRight+ThumbnailPaddingLeft);
                        }
                        
                        if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                            $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('float', 'left');
                        }

                        if (no != '1'){
                            if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                                $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('margin-left', ThumbnailsSpacing);
                            }
                            else{
                                $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('margin-top', ThumbnailsSpacing);
                            }
                        }

                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('background-color', '#'+ThumbnailBgColor);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('border-width', ThumbnailBorderSize);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).css('border-color', '#'+ThumbnailBorderColor);

                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).addClass('DOP_ThumbnailGallery_ThumbLoader');
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no+'.DOP_ThumbnailGallery_ThumbLoader', Container).css('background-image', 'url('+ThumbnailLoader+')');

                        if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                            if ($('.DOP_ThumbnailGallery_Thumbnails', Container).width() <= $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width()){
                                prototypes.hCenterItem($('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container), $('.DOP_ThumbnailGallery_Thumbnails', Container), $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width());
                            }
                            else if (parseInt($('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-left')) >= 0){
                                $('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-left', 0);
                            }
                        }
                        else
                        {
                            if ($('.DOP_ThumbnailGallery_Thumbnails', Container).height() <= $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height()){
                                prototypes.vCenterItem($('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container), $('.DOP_ThumbnailGallery_Thumbnails', Container), $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height());
                            }
                            else if (parseInt($('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-top')) >= 0){
                                $('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-top', 0);
                            }
                        }
                    },
                    loadCompleteThumb:function(no){// Thumbnail Load complete event
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no+'.DOP_ThumbnailGallery_ThumbLoader', Container).css('background-image', 'none');
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).removeClass('DOP_ThumbnailGallery_ThumbLoader');

                        prototypes.resizeItem2($('#DOP_ThumbnailGallery_Thumb_'+no, Container), $('#DOP_ThumbnailGallery_Thumb_'+no, Container).children(), ThumbnailWidth, ThumbnailHeight, $('img', '#DOP_ThumbnailGallery_Thumb_'+no, Container).width(), $('img', '#DOP_ThumbnailGallery_Thumb_'+no, Container).height(), 'center');
                        
                        $('img', '#DOP_ThumbnailGallery_Thumb_'+no, Container).css('opacity', 0);
                        $('img', '#DOP_ThumbnailGallery_Thumb_'+no, Container).stop(true, true).animate({'opacity':'1'}, 600);

                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).hover(function(){
                            if (currentImage != no){
                                $(this).stop(true, true).animate({'opacity':parseInt(ThumbnailAlphaHover)/100}, 300);
                                $(this).css('background-color', '#'+ThumbnailBgColorHover);
                                $(this).css('border-color', '#'+ThumbnailBorderColorHover);
                            }
                            if (TooltipEnabled == 'true'){
                                methods.showTooltip(no-1);
                            }
                        },
                        function(){
                            if (currentImage != no){
                                $(this).stop(true, true).animate({'opacity':parseInt(ThumbnailAlpha)/100}, 300);
                                $(this).css('background-color', '#'+ThumbnailBgColor);
                                $(this).css('border-color', '#'+ThumbnailBorderColor);
                            }
                            if (TooltipEnabled == 'true'){
                                $('.DOP_ThumbnailGallery_Tooltip', Container).css('display', 'none');
                            }
                        });

                        $('#DOP_ThumbnailGallery_ThumbContainer_'+no, Container).click(function(){
                            if (imageLoaded){
                                methods.loadImage(no);
                            }
                        });
                    },
                    rpThumbnails:function(){// Resize & Position the Thumbnails
                        if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width($('.DOP_ThumbnailGallery_Container', Container).width());
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height(ThumbnailHeight+(2*ThumbnailBorderSize)+ThumbnailPaddingTop+ThumbnailPaddingBottom+ThumbnailsPaddingTop+ThumbnailsPaddingBottom);

                            $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width($('.DOP_ThumbnailGallery_Container', Container).width()-ThumbnailsPaddingRight-ThumbnailsPaddingLeft);
                            $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height(ThumbnailHeight+(2*ThumbnailBorderSize)+ThumbnailPaddingTop+ThumbnailPaddingBottom);

                            if ($('.DOP_ThumbnailGallery_Thumbnails', Container).width() <= $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width()){
                                prototypes.hCenterItem($('.DOP_ThumbnailGallery_ThumbnailsContainer', Container), $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container), $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width());
                            }
                            else if (parseInt($('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-left')) >= 0){
                                $('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-left', 0);
                            }
                        }
                        else if (ThumbnailsPosition == 'right' || ThumbnailsPosition == 'left'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width(ThumbnailWidth+(2*ThumbnailBorderSize)+ThumbnailPaddingRight+ThumbnailPaddingLeft+ThumbnailsPaddingRight+ThumbnailsPaddingLeft);
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height($('.DOP_ThumbnailGallery_Container', Container).height());

                            $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width(ThumbnailWidth+(2*ThumbnailBorderSize)+ThumbnailPaddingRight+ThumbnailPaddingLeft);
                            $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height($('.DOP_ThumbnailGallery_Container', Container).height()-ThumbnailsPaddingTop-ThumbnailsPaddingBottom);

                            if ($('.DOP_ThumbnailGallery_Thumbnails', Container).height() <= $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height()){
                                prototypes.vCenterItem($('.DOP_ThumbnailGallery_ThumbnailsContainer', Container), $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container), $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height());
                            }
                            else if (parseInt($('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-top')) >= 0){
                                $('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-top', 0);
                            }
                        }

                        $('.DOP_ThumbnailGallery_ThumbnailsBg', Container).width($('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width());
                        $('.DOP_ThumbnailGallery_ThumbnailsBg', Container).height($('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height());

                        if (ThumbnailsPosition == 'top'){
                            prototypes.topItem($('.DOP_ThumbnailGallery_Container', Container), $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container), $('.DOP_ThumbnailGallery_Container', Container).height());
                        }
                        else if (ThumbnailsPosition == 'right'){
                            prototypes.rightItem($('.DOP_ThumbnailGallery_Container', Container), $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container), $('.DOP_ThumbnailGallery_Container', Container).width());
                        }
                        else if (ThumbnailsPosition == 'left'){
                            prototypes.leftItem($('.DOP_ThumbnailGallery_Container', Container), $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container), $('.DOP_ThumbnailGallery_Container', Container).width());
                        }
                        else{
                            prototypes.bottomItem($('.DOP_ThumbnailGallery_Container', Container), $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container), $('.DOP_ThumbnailGallery_Container', Container).height());
                        }
                    },
                    moveThumbnails:function(){// Move Thumbnails
                        if (prototypes.isTouchDevice()){
                            prototypes.touchNavigation($('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container), $('.DOP_ThumbnailGallery_Thumbnails', Container));
                        }
                        else{
                            $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).mousemove(function(e){
                                var thumbnailWidth, thumbnailHeight, mousePosition, thumbnailsPosition;

                                if ((ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom') && $('.DOP_ThumbnailGallery_Thumbnails', Container).width() > $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width()){
                                    thumbnailWidth = ThumbnailWidth+ThumbnailPaddingRight+ThumbnailPaddingLeft+2*ThumbnailBorderSize;
                                    mousePosition = e.clientX-$(this).offset().left+parseInt($(this).css('margin-left'))+$(document).scrollLeft();
                                    thumbnailsPosition = 0-(mousePosition-thumbnailWidth-ThumbnailsSpacing)*($('.DOP_ThumbnailGallery_Thumbnails', Container).width()-$('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width())/($('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width()-2*thumbnailWidth);
                                    if (thumbnailsPosition < (-1)*($('.DOP_ThumbnailGallery_Thumbnails', Container).width()-$('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width())){
                                        thumbnailsPosition = (-1)*($('.DOP_ThumbnailGallery_Thumbnails', Container).width()-$('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).width());
                                    }
                                    if (thumbnailsPosition > 0){
                                        thumbnailsPosition = 0;
                                    }
                                    
                                    $('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-left', thumbnailsPosition);
                                }

                                if ((ThumbnailsPosition == 'right' || ThumbnailsPosition == 'left') && $('.DOP_ThumbnailGallery_Thumbnails', Container).height() > $('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height()){
                                    thumbnailHeight = ThumbnailHeight+ThumbnailPaddingTop+ThumbnailPaddingBottom+2*ThumbnailBorderSize;
                                    mousePosition = e.clientY-$(this).offset().top+parseInt($(this).css('margin-top'))+$(document).scrollTop();
                                    thumbnailsPosition = 0-(mousePosition-thumbnailHeight-ThumbnailsSpacing)*($('.DOP_ThumbnailGallery_Thumbnails', Container).height()-$('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height())/($('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height()-2*thumbnailHeight);
                                    if (thumbnailsPosition < (-1)*($('.DOP_ThumbnailGallery_Thumbnails', Container).height()-$('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height())){
                                        thumbnailsPosition = (-1)*($('.DOP_ThumbnailGallery_Thumbnails', Container).height()-$('.DOP_ThumbnailGallery_ThumbnailsWrapper', Container).height());
                                    }
                                    if (thumbnailsPosition > 0){
                                        thumbnailsPosition = 0;
                                    }
                                    $('.DOP_ThumbnailGallery_Thumbnails', Container).css('margin-top', thumbnailsPosition);
                                }
                            });
                        }
                    },

                    initImage:function(){// Init Image
                        if (ImageBgColor != 'css'){
                            $('.DOP_ThumbnailGallery_ImageBg', Container).css('background-color', '#'+ImageBgColor);
                        }
                        $('.DOP_ThumbnailGallery_ImageBg', Container).css('opacity', parseInt(ImageBgAlpha)/100);
                        
                        methods.rpImage();
                        methods.loadImage(1);
                    },
                    loadImage:function(no){// Load Image
                        clearInterval(SlideshowID);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+currentImage, Container).stop(true, true).animate({'opacity':parseInt(ThumbnailAlpha)/100}, 300);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+currentImage, Container).css('background-color', '#'+ThumbnailBgColor);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+currentImage, Container).css('border-color', '#'+ThumbnailBorderColor);
                        currentImage = no;
                        imageLoaded = false;
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+currentImage, Container).stop(true, true).animate({'opacity':parseInt(ThumbnailAlphaSelected)/100}, 300);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+currentImage, Container).css('background-color', '#'+ThumbnailBgColorSelected);
                        $('#DOP_ThumbnailGallery_ThumbContainer_'+currentImage, Container).css('border-color', '#'+ThumbnailBorderColorSelected);
                        
                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('display', 'none');
                        $('.DOP_ThumbnailGallery_NavigationRight', Container).css('display', 'none');
                        methods.hideCaption();
                        
                        $('.DOP_ThumbnailGallery_Image', Container).stop(true, true).animate({'opacity':'0'}, parseInt(ImageDisplayTime)/2, function(){
                            $('.DOP_ThumbnailGallery_Image', Container).html('');
                            $('.DOP_ThumbnailGallery_ImageBg', Container).addClass('DOP_ThumbnailGallery_ImageLoader');
                            $('.DOP_ThumbnailGallery_ImageLoader', Container).css('background-image', 'url('+ImageLoader+')');

                            var img = new Image();
                            $(img).load(function(){
                                imageLoaded = true;
                                $('.DOP_ThumbnailGallery_CaptionTitle', Container).html(CaptionTitle[no-1]);
                                $('.DOP_ThumbnailGallery_CaptionText', Container).html(CaptionText[no-1]);
                                $('.DOP_ThumbnailGallery_Image', Container).removeClass('DOP_ThumbnailGallery_BigLoader');
                                $('.DOP_ThumbnailGallery_Image', Container).html(this);
                                $('.DOP_ThumbnailGallery_ImageLoader', Container).css('background-image', 'none');
                                $('.DOP_ThumbnailGallery_ImageBg', Container).removeClass('DOP_ThumbnailGallery_ImageLoader');
                                ImageWidth = $(this).width();
                                ImageHeight = $(this).height();
                                $('.DOP_ThumbnailGallery_Image', Container).css('opacity', 0);

                                if (ImageDisplayType == 'fit'){
                                    var currW = 0, currH = 0, ml = 0, mt = 0, dw = ImageWidth, dh = ImageHeight,
                                    cw = $('.DOP_ThumbnailGallery_ImageWrapper', Container).width()-ImageMarginLeft-ImageMarginRight-ImagePaddingLeft-ImagePaddingRight,
                                    ch = $('.DOP_ThumbnailGallery_ImageWrapper', Container).height()-ImageMarginTop-ImageMarginBottom-ImagePaddingTop-ImagePaddingBottom;

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

                                    currW = currW+ImagePaddingLeft+ImagePaddingRight;
                                    currH = currH+ImagePaddingLeft+ImagePaddingRight;

                                    ml = ($('.DOP_ThumbnailGallery_ImageWrapper', Container).width()-currW)/2;
                                    mt = ($('.DOP_ThumbnailGallery_ImageWrapper', Container).height()-currH)/2;

                                    $('.DOP_ThumbnailGallery_ImageBg', Container).stop(true, true).animate({'width':currW, 'height':currH, 'margin-left':ml, 'margin-top':mt}, parseInt(ImageDisplayTime)/2, function(){
                                        methods.rpImage();
                                        methods.showCaption();
                                        $('.DOP_ThumbnailGallery_Image', Container).stop(true, true).animate({'opacity':'1'}, parseInt(ImageDisplayTime)/2, function(){
                                            if (!ItemsHidden){
                                                $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('display', 'block');
                                                $('.DOP_ThumbnailGallery_NavigationRight', Container).css('display', 'block');
                                            }

                                            if (Slideshow == 'true'){
                                                if ((SlideshowLoop == 'true' && currentImage == noImages) || currentImage < noImages){
                                                    SlideshowID = setInterval(methods.nextImage, parseInt(SlideshowTime));
                                                }
                                            }
                                        });
                                    });
                                }
                                else{
                                    methods.rpImage();
                                    $('.DOP_ThumbnailGallery_Image', Container).stop(true, true).animate({'opacity':'1'}, parseInt(ImageDisplayTime), function(){
                                        if (!ItemsHidden){
                                            $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('display', 'block');
                                            $('.DOP_ThumbnailGallery_NavigationRight', Container).css('display', 'block');
                                        }

                                        if (Slideshow == 'true'){
                                            if  ((SlideshowLoop == 'true' && currentImage == noImages) || currentImage < noImages){
                                                SlideshowID = setInterval(methods.nextImage, parseInt(SlideshowTime));
                                            }
                                        }
                                    });
                                }
                            }).attr('src', Images[no-1]);

                        });
                    },
                    rpImage:function(){// Resize & Position Image
                        $('.DOP_ThumbnailGallery_ImageWrapper', Container).width($('.DOP_ThumbnailGallery_Container', Container).width());
                        $('.DOP_ThumbnailGallery_ImageWrapper', Container).height($('.DOP_ThumbnailGallery_Container', Container).height());
                        if (ThumbnailsOverImage == 'false'){                        
                            if (ThumbnailsPosition == 'top' || ThumbnailsPosition == 'bottom'){
                                $('.DOP_ThumbnailGallery_ImageWrapper', Container).height($('.DOP_ThumbnailGallery_Container', Container).height()-$('.DOP_ThumbnailGallery_ThumbnailsContainer').height());
                            }
                            else{
                                $('.DOP_ThumbnailGallery_ImageWrapper', Container).width($('.DOP_ThumbnailGallery_Container', Container).width()-$('.DOP_ThumbnailGallery_ThumbnailsContainer').width());
                            }

                            if (ThumbnailsPosition == 'top'){
                                $('.DOP_ThumbnailGallery_ImageWrapper', Container).css('margin-top', $('.DOP_ThumbnailGallery_ThumbnailsContainer').height());
                            }
                            if (ThumbnailsPosition == 'left'){
                                $('.DOP_ThumbnailGallery_ImageWrapper', Container).css('margin-left', $('.DOP_ThumbnailGallery_ThumbnailsContainer').width());
                            }
                        }

                        if (ImageDisplayType == 'fit'){
                            var currW = 0, currH = 0, ml = 0, mt = 0, dw = ImageWidth, dh = ImageHeight,
                            cw = $('.DOP_ThumbnailGallery_ImageWrapper', Container).width()-ImageMarginLeft-ImageMarginRight-ImagePaddingLeft-ImagePaddingRight,
                            ch = $('.DOP_ThumbnailGallery_ImageWrapper', Container).height()-ImageMarginTop-ImageMarginBottom-ImagePaddingTop-ImagePaddingBottom;

                            if (ImageWidth == 0 || ImageHeight == 0){
                                dw = 200;
                                dh = 200;
                            }
                            
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

                            $('.DOP_ThumbnailGallery_ImageBg', Container).width(currW+ImagePaddingLeft+ImagePaddingRight);
                            $('.DOP_ThumbnailGallery_ImageBg', Container).height(currH+ImagePaddingTop+ImagePaddingBottom);
                            $('.DOP_ThumbnailGallery_Image', Container).width(currW);
                            $('.DOP_ThumbnailGallery_Image', Container).height(currH);
                            $('.DOP_ThumbnailGallery_Image', Container).children().width(currW);
                            $('.DOP_ThumbnailGallery_Image', Container).children().height(currH);

                            prototypes.centerItem($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_ImageBg', Container), $('.DOP_ThumbnailGallery_ImageWrapper', Container).width(), $('.DOP_ThumbnailGallery_ImageWrapper', Container).height());
                            prototypes.centerItem($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_Image', Container), $('.DOP_ThumbnailGallery_ImageWrapper', Container).width(), $('.DOP_ThumbnailGallery_ImageWrapper', Container).height());
                        }
                        else{
                            $('.DOP_ThumbnailGallery_ImageBg', Container).width($('.DOP_ThumbnailGallery_ImageWrapper', Container).width());
                            $('.DOP_ThumbnailGallery_ImageBg', Container).height($('.DOP_ThumbnailGallery_ImageWrapper', Container).height());
                            prototypes.resizeItem2($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_Image', Container).children(), $('.DOP_ThumbnailGallery_ImageWrapper', Container).width(), $('.DOP_ThumbnailGallery_ImageWrapper', Container).height(), ImageWidth, ImageHeight, 'center');
                        }

                        methods.rpCaption();
                        methods.rpNavigation();
                    },

                    initNavigation:function(){// Init Navigation
                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('background-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationRight', Container).css('background-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-top-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-bottom-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-left-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-top-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-bottom-color', '#'+NavigationColor);
                        $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-right-color', '#'+NavigationColor);

                        $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-right-color', '#'+NavigationIconColor);
                        $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-left-color', '#'+NavigationIconColor);

                        $('.DOP_ThumbnailGallery_NavigationLeft').css('opacity', parseInt(NavigationAlpha)/100);
                        $('.DOP_ThumbnailGallery_NavigationRight').css('opacity', parseInt(NavigationAlpha)/100);

                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).hover(function(){
                            $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('background-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-top-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-bottom-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-left-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('opacity', parseInt(NavigationAlphaHover)/100);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-right-color', '#'+NavigationIconColorHover);
                        }, function(){
                            $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('background-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-top-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-bottom-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-left-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('opacity', parseInt(NavigationAlpha)/100);
                            $('.DOP_ThumbnailGallery_NavigationLeft .Icon', Container).css('border-right-color', '#'+NavigationIconColor);
                        });

                        $('.DOP_ThumbnailGallery_NavigationRight', Container).hover(function(){
                            $('.DOP_ThumbnailGallery_NavigationRight', Container).css('background-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-top-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-bottom-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-right-color', '#'+NavigationColorHover);
                            $('.DOP_ThumbnailGallery_NavigationRight', Container).css('opacity', parseInt(NavigationAlphaHover)/100);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-left-color', '#'+NavigationIconColorHover);
                        }, function(){
                            $('.DOP_ThumbnailGallery_NavigationRight', Container).css('background-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-top-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-bottom-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-right-color', '#'+NavigationColor);
                            $('.DOP_ThumbnailGallery_NavigationRight', Container).css('opacity', parseInt(NavigationAlpha)/100);
                            $('.DOP_ThumbnailGallery_NavigationRight .Icon', Container).css('border-left-color', '#'+NavigationIconColor);
                        });

                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).click(function(){
                            if (imageLoaded){
                                methods.previousImage();
                            }
                        });

                        $('.DOP_ThumbnailGallery_NavigationRight', Container).click(function(){
                            if (imageLoaded){
                                methods.nextImage();
                            }
                        });
                    },
                    rpNavigation:function(){// Resize & Position Navigation Buttons
                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('margin-left', parseFloat($('.DOP_ThumbnailGallery_ImageWrapper', Container).css('margin-left'))+parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-left'))+10);
                        $('.DOP_ThumbnailGallery_NavigationRight', Container).css('margin-left', parseFloat($('.DOP_ThumbnailGallery_ImageWrapper', Container).css('margin-left'))+parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-left'))+($('.DOP_ThumbnailGallery_Image', Container).width()-$('.DOP_ThumbnailGallery_NavigationRight', Container).width())-17);
                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('margin-top', parseFloat($('.DOP_ThumbnailGallery_ImageWrapper', Container).css('margin-top'))+parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-top'))+($('.DOP_ThumbnailGallery_Image', Container).height()-$('.DOP_ThumbnailGallery_NavigationLeft', Container).height())/2);
                        $('.DOP_ThumbnailGallery_NavigationRight', Container).css('margin-top', parseFloat($('.DOP_ThumbnailGallery_ImageWrapper', Container).css('margin-top'))+parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-top'))+($('.DOP_ThumbnailGallery_Image', Container).height()-$('.DOP_ThumbnailGallery_NavigationRight', Container).height())/2);
                    },
                    nextImage:function(){// Go to next image
                        if (currentImage == noImages){
                            methods.loadImage(1);
                        }
                        else{
                            methods.loadImage(currentImage+1);
                        }
                    },
                    previousImage:function(){// Go to previous image
                        if (currentImage == 1){
                            methods.loadImage(noImages);
                        }
                        else{
                            methods.loadImage(currentImage-1);
                        }
                    },

                    initTooltip:function(){// Init Tooltip                        
                        $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).mousemove(function(e){
                            var mousePositionX = e.clientX-$(this).offset().left+parseInt($(this).css('margin-left'))+$(document).scrollLeft();
                            var mousePositionY = e.clientY-$(this).offset().top+parseInt($(this).css('margin-top'))+$(document).scrollTop();

                            $('.DOP_ThumbnailGallery_Tooltip', Container).css('margin-left', mousePositionX-10);
                            $('.DOP_ThumbnailGallery_Tooltip', Container).css('margin-top', mousePositionY-$('.DOP_ThumbnailGallery_Tooltip', Container).height()-15);
                        });
                    },
                    showTooltip:function(no){// Resize, Position & Display the Tooltip
                        var HTML = new Array();
                        HTML.push(CaptionTitle[no]);
                        HTML.push('<div class="DOP_ThumbnailGallery_Tooltip_ArrowBorder"></div>');
                        HTML.push('<div class="DOP_ThumbnailGallery_Tooltip_Arrow"></div>');
                        $('.DOP_ThumbnailGallery_Tooltip', Container).html(HTML.join(""));

                        if (TooltipBgColor != 'css'){
                            $('.DOP_ThumbnailGallery_Tooltip', Container).css('background-color', '#'+TooltipBgColor);
                            $('.DOP_ThumbnailGallery_Tooltip_Arrow', Container).css('border-top-color', '#'+TooltipBgColor);
                        }
                        if (TooltipStrokeColor != 'css'){
                            $('.DOP_ThumbnailGallery_Tooltip', Container).css('border-color', '#'+TooltipStrokeColor);
                            $('.DOP_ThumbnailGallery_Tooltip_ArrowBorder', Container).css('border-top-color', '#'+TooltipStrokeColor);
                        }
                        if (TooltipTextColor != 'css'){
                            $('.DOP_ThumbnailGallery_Tooltip', Container).css('color', '#'+TooltipTextColor);
                        }
                        if (CaptionTitle[no] != '' || prototypes.isTouchDevice()){
                            $('.DOP_ThumbnailGallery_Tooltip', Container).css('display', 'block');
                        }
                    },

                    initCaption:function(){// Init Caption
                        $('.DOP_ThumbnailGallery_Caption', Container).css('opacity', 0);
                        if (CaptionBgColor != 'css'){
                            $('.DOP_ThumbnailGallery_CaptionBg', Container).css('background-color', '#'+CaptionBgColor);
                        }
                        $('.DOP_ThumbnailGallery_CaptionBg', Container).css('opacity', parseInt(CaptionBgAlpha)/100);
                        if (CaptionTitleColor != 'css'){
                            $('.DOP_ThumbnailGallery_CaptionTitle', Container).css('color', '#'+CaptionTitleColor);
                        }
                        if (CaptionTextColor != 'css'){
                            $('.DOP_ThumbnailGallery_CaptionText', Container).css('color', '#'+CaptionTextColor);
                        }
                    },
                    showCaption:function(){// Show Caption
                        if (imageLoaded && $('.DOP_ThumbnailGallery_CaptionTitle', Container).html() != '' && $('.DOP_ThumbnailGallery_CaptionText', Container).html() != ''){
                            $('.DOP_ThumbnailGallery_Caption', Container).css('display', 'block');
                            $('.DOP_ThumbnailGallery_Caption', Container).stop(true, true).animate({'opacity':'1'}, 600, function(){
                                $('.DOP_ThumbnailGallery_CaptionTextContainer', Container).height($('.DOP_ThumbnailGallery_CaptionTextWrapper', Container).height()-$('.DOP_ThumbnailGallery_CaptionTitle', Container).height()-5);
                                $('.DOP_ThumbnailGallery_CaptionTextContainer', Container).jScrollPane();
                                if (CaptionScrollScrubColor != 'css'){
                                    $('.jspDrag', Container).css('background-color', '#'+CaptionScrollScrubColor);
                                }
                                if (CaptionScrollBgColor != 'css'){
                                    $('.jspTrack', Container).css('background-color', '#'+CaptionScrollBgColor);
                                }
                            });
                        }
                    },
                    hideCaption:function(){// Hide Caption
                        $('.DOP_ThumbnailGallery_Caption', Container).stop(true, true).animate({'opacity':'0'}, 600, function(){
                            $(this).css('display', 'none');
                        });
                    },
                    rpCaption:function(){// Resize & Position Caption
                        if (CaptionWidth == 'auto'){
                            $('.DOP_ThumbnailGallery_Caption', Container).width($('.DOP_ThumbnailGallery_Image', Container).width());
                        }
                        else{
                            $('.DOP_ThumbnailGallery_Caption', Container).width(parseInt(CaptionWidth)+CaptionMarginLeft+CaptionMarginRight);
                        }
                        if (CaptionHeight == 'auto'){
                            $('.DOP_ThumbnailGallery_Caption', Container).height($('.DOP_ThumbnailGallery_Image', Container).height());
                        }
                        else{
                            $('.DOP_ThumbnailGallery_Caption', Container).height(parseInt(CaptionHeight)+CaptionMarginTop+CaptionMarginBottom);
                        }
                        
                        if (CaptionPosition == 'top'){
                            prototypes.hCenterItem($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_Caption', Container), $('.DOP_ThumbnailGallery_ImageWrapper', Container).width());
                            $('.DOP_ThumbnailGallery_Caption', Container).css('margin-top', parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-top')));
                        }
                        else if (CaptionPosition == 'right'){
                            prototypes.vCenterItem($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_Caption', Container), $('.DOP_ThumbnailGallery_ImageWrapper', Container).height());
                            $('.DOP_ThumbnailGallery_Caption', Container).css('margin-left', parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-left'))+$('.DOP_ThumbnailGallery_Image', Container).width()-$('.DOP_ThumbnailGallery_Caption', Container).width());
                        }
                        else if (CaptionPosition == 'left'){
                            prototypes.vCenterItem($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_Caption', Container), $('.DOP_ThumbnailGallery_ImageWrapper', Container).height());
                            $('.DOP_ThumbnailGallery_Caption', Container).css('margin-left', parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-left')));
                        }
                        else{
                            prototypes.hCenterItem($('.DOP_ThumbnailGallery_ImageWrapper', Container), $('.DOP_ThumbnailGallery_Caption', Container), $('.DOP_ThumbnailGallery_ImageWrapper', Container).width());
                            $('.DOP_ThumbnailGallery_Caption', Container).css('margin-top', parseInt($('.DOP_ThumbnailGallery_Image', Container).css('margin-top'))+$('.DOP_ThumbnailGallery_Image', Container).height()-$('.DOP_ThumbnailGallery_Caption', Container).height());
                        }

                        $('.DOP_ThumbnailGallery_CaptionBg', Container).width($('.DOP_ThumbnailGallery_Caption', Container).width()-CaptionMarginLeft-CaptionMarginRight);
                        $('.DOP_ThumbnailGallery_CaptionBg', Container).height($('.DOP_ThumbnailGallery_Caption', Container).height()-CaptionMarginTop-CaptionMarginBottom);
                        $('.DOP_ThumbnailGallery_CaptionBg', Container).css('margin-top', CaptionMarginTop);
                        $('.DOP_ThumbnailGallery_CaptionBg', Container).css('margin-left', CaptionMarginLeft);

                        $('.DOP_ThumbnailGallery_CaptionTextWrapper', Container).css('margin-top', CaptionMarginTop+CaptionPaddingTop);
                        $('.DOP_ThumbnailGallery_CaptionTextWrapper', Container).css('margin-left', CaptionMarginLeft+CaptionPaddingLeft);
                        $('.DOP_ThumbnailGallery_CaptionTextWrapper', Container).width($('.DOP_ThumbnailGallery_CaptionBg', Container).width()-CaptionPaddingLeft-CaptionPaddingRight);
                        $('.DOP_ThumbnailGallery_CaptionTextWrapper', Container).height($('.DOP_ThumbnailGallery_CaptionBg', Container).height()-CaptionPaddingTop-CaptionPaddingBottom);
                        $('.DOP_ThumbnailGallery_CaptionTextContainer', Container).height($('.DOP_ThumbnailGallery_CaptionTextWrapper', Container).height()-$('.DOP_ThumbnailGallery_CaptionTitle', Container).height()-5);
                        if (prototypes.isTouchDevice()){
                            $('.DOP_ThumbnailGallery_CaptionTextContainer', Container).css('overflow', 'scroll');
                        }
                        else{
                            $('.DOP_ThumbnailGallery_CaptionTextContainer', Container).jScrollPane();
                            if (CaptionScrollScrubColor != 'css'){
                                $('.jspDrag', Container).css('background-color', '#'+CaptionScrollScrubColor);
                            }
                            if (CaptionScrollBgColor != 'css'){
                                $('.jspTrack', Container).css('background-color', '#'+CaptionScrollBgColor);
                            }
                        }
                    },

                    initAutoHide:function(){// Init Auto Hide
                        HideID = setInterval(methods.hideItems, parseInt(AutoHideTime));

                        $('.DOP_ThumbnailGallery_Container', Container).hover(function(){
                            methods.showItems();
                        }, function(){
                            HideID = setInterval(methods.hideItems, parseInt(AutoHideTime));
                        });
                    },
                    showItems:function(){// Show Items
                        clearInterval(HideID);
                        ItemsHidden = false;

                        if (imageLoaded){
                            $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('display', 'block');
                            $('.DOP_ThumbnailGallery_NavigationRight', Container).css('display', 'block');
                        }

                        if (ThumbnailsPosition == 'top'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-top': 0}, 600);
                        }
                        if (ThumbnailsPosition == 'right'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-left': $('.DOP_ThumbnailGallery_Container', Container).width()-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width()}, 600);
                        }
                        if (ThumbnailsPosition == 'bottom'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-top': $('.DOP_ThumbnailGallery_Container', Container).height()-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height()}, 600);
                        }
                        if (ThumbnailsPosition == 'left'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-left': 0}, 600);
                        }
                        methods.showCaption();
                    },
                    hideItems:function()
                    {
                        clearInterval(HideID);
                        ItemsHidden = true;

                        $('.DOP_ThumbnailGallery_NavigationLeft', Container).css('display', 'none');
                        $('.DOP_ThumbnailGallery_NavigationRight', Container).css('display', 'none');

                        if (ThumbnailsPosition == 'top'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-top': 0-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).height()}, 600);
                        }
                        if (ThumbnailsPosition == 'right'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-left': $('.DOP_ThumbnailGallery_Container', Container).width()}, 600);
                        }
                        if (ThumbnailsPosition == 'bottom'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-top': $('.DOP_ThumbnailGallery_Container', Container).height()}, 600);
                        }
                        if (ThumbnailsPosition == 'left'){
                            $('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).stop(true, true).animate({'margin-left': 0-$('.DOP_ThumbnailGallery_ThumbnailsContainer', Container).width()}, 600);
                        }
                        methods.hideCaption();
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
                        touchNavigation:function(parent, child){// One finger Navigation for touchscreen devices
                            var prevX, prevY, currX, currY, touch;

                            parent.bind('touchstart', function(e){
                                touch = e.originalEvent.touches[0];
                                prevX = touch.clientX;
                                prevY = touch.clientY;
                            });

                            parent.bind('touchmove', function(e){
                                e.preventDefault();

                                var touch = e.originalEvent.touches[0],
                                currX = touch.clientX,
                                currY = touch.clientY,
                                thumbnailsPositionX = currX>prevX ? parseInt(child.css('margin-left'))+(currX-prevX):parseInt(child.css('margin-left'))-(prevX-currX),
                                thumbnailsPositionY = currY>prevY ? parseInt(child.css('margin-top'))+(currY-prevY):parseInt(child.css('margin-top'))-(prevY-currY);

                                if (thumbnailsPositionX < (-1)*(child.width()-parent.width())){
                                    thumbnailsPositionX = (-1)*(child.width()-parent.width());
                                }
                                else if (thumbnailsPositionX > 0){
                                    thumbnailsPositionX = 0;
                                }
                                if (thumbnailsPositionY < (-1)*(child.height()-parent.height())){
                                    thumbnailsPositionY = (-1)*(child.height()-parent.height());
                                }
                                else if (thumbnailsPositionY > 0){
                                    thumbnailsPositionY = 0;
                                }

                                prevX = currX;
                                prevY = currY;

                                child.css('margin-left', thumbnailsPositionX);
                                child.css('margin-top', thumbnailsPositionY);
                            });

                            parent.bind('touchend', function(e){
                                e.preventDefault();
                            });
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