/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/user.js
 * File Version            : 1.3
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 03 July 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : User Scripts.
*/

function user_init(){
    user_parseContent();

    $('.user-nav').click(function(){
        user_parseContent();
    });
}

function user_parseContent(){
    var currPage, ID;
    setTimeout(function(){
        currPage = user_currPage();
        ID = user_ID();
        user_openPage(currPage, ID);
    }, 100);
}

function user_openPage(currPage, ID){
    var ajaxURL = BASE_URL+'user/'+currPage+'/content',
    menuSelect = currPage,
    contentArea = '#user-area-main',
    submenuHide = 'all';

    switch (currPage){
        case 'add-hotel':
            ajaxURL = BASE_URL+'user/hotel/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-villa':
            ajaxURL = BASE_URL+'user/villa/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-car':
            ajaxURL = BASE_URL+'user/car/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-spa-beauty':
            ajaxURL = BASE_URL+'user/beauty/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-chef':
            ajaxURL = BASE_URL+'user/chef/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-boat':
            ajaxURL = BASE_URL+'user/boat/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-babysitter':
            ajaxURL = BASE_URL+'user/babysitter/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'add-massage':
            ajaxURL = BASE_URL+'user/massage/add';
            menuSelect = 'offers';
            submenuHide = 'deals';
            break;
        case 'hotel':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/hotel/item';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'edit-hotel-details':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/hotel/editDetails';
                contentArea = '.user-offers-list-content';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'edit-hotel-gallery':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/hotel/editGallery';
                contentArea = '.user-offers-list-content';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'edit-hotel-pricing':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/hotel/editPricing';
                contentArea = '.user-offers-list-content';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'villa':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/villa/item';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'edit-villa-details':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/villa/editDetails';
                contentArea = '.user-offers-list-content';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'edit-villa-gallery':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/villa/editGallery';
                contentArea = '.user-offers-list-content';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'edit-villa-pricing':
            if ($('#offers-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/villa/editPricing';
                contentArea = '.user-offers-list-content';
                menuSelect = 'none';
                submenuHide = 'deals';
            }
            else{
                user_redirectOffers();
            }
            break;
        case 'hotel-deals':
            if ($('#deals-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/hotel/deals';
                menuSelect = 'none';
                submenuHide = 'offers';
            }
            else{
                user_redirectDeals();
            }
            break;
        case 'villa-deals':
            if ($('#deals-submenu').html() != ''){
                ajaxURL = BASE_URL+'user/hotel/deals';
                menuSelect = 'none';
                submenuHide = 'offers';
            }
            else{
                user_redirectDeals();
            }
            break;
    }

    user_selectMenuItem(menuSelect);
    user_hideSubmenus(submenuHide);

    $.post(ajaxURL, {id:ID}, function(data){
        $(contentArea).html(data);
        positionFooter();
        
        switch (currPage){
            case 'dashboard':
                break;
            case 'profile':
                user_initProfile();
                break;
            case 'offers':
                $('#user-area-main').html(data.split(';;;')[0]);
                $('#offers-submenu').html(data.split(';;;')[1]);
                user_selectOfferMenuItem(ID);
                positionFooter();
                break;
            case 'deals':
                $('#user-area-main').html(data.split(';;;')[0]);
                $('#deals-submenu').html(data.split(';;;')[1]);
                user_selectDealMenuItem(ID);
                positionFooter();
                break;
            case 'add-hotel':
                user_initAddHotel();
                break;
            case 'add-villa':
                user_initAddVilla();
                break;
            case 'add-car':
                user_initAddCar();
                break;
            case 'add-spa-beauty':
                user_initAddBeauty();
                break;
            case 'add-chef':
                user_initAddChef();
                break;
            case 'add-boat':
                user_initAddBoat();
                break;
            case 'add-babysitter':
                user_initAddBabysitter();
                break;
            case 'add-massage':
                user_initAddMassage();
                break;
            case 'hotel':
                $('body').DOPImageLoader({'Container':'.image-container', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
                break;
            case 'edit-hotel-details':
                user_initEditHotelDetails();
                break;
            case 'edit-hotel-gallery':
                user_initEditHotelGallery();
                break;
            case 'edit-hotel-pricing':
                user_initEditHotelPricing();
                break;
            case 'villa':
                $('body').DOPImageLoader({'Container':'.image-container', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
                break;
            case 'edit-villa-details':
                user_initEditVillaDetails();
                break;
            case 'edit-villa-gallery':
                user_initEditVillaGallery();
                break;
            case 'edit-villa-pricing':
                user_initEditVillaPricing();
                break;
            case 'hotel-deals':
                //$('body').DOPImageLoader({'Container':'.image-container', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
                break;
            case 'messages':
                break;
            case 'messages':
                break;
            case 'friends':
                break;
            case 'reservations':
                break;
            case 'comments':
                break;
            case 'reward-points':
                break;
            case 'settings':
                user_initSettings();
                break;
        }
    });
}

function user_currPage(){
    var currPage = window.location.href.split('#')[1],
    pieces = new Array();

    if (currPage == undefined){
        currPage = window.location.href.split('#')[0];
    }

    pieces = currPage.split('/');
    if (pieces[pieces.length-1] == '' || pieces[pieces.length-1] == undefined){
        currPage = pieces[pieces.length-2];
    }
    else{
        currPage = pieces[pieces.length-1];
    }

    pieces = currPage.split(':');
    if (pieces.length > 1){
        return pieces[0];
    }
    else{
        return currPage;
    }
}

function user_ID(){
    var currPage = window.location.href.split('#')[1],
    pieces = new Array(), ID;

    if (currPage == undefined){
        currPage = window.location.href.split('#')[0];
    }

    pieces = currPage.split('/');
    if (pieces[pieces.length-1] == '' || pieces[pieces.length-1] == undefined){
        currPage = pieces[pieces.length-2];
    }
    else{
        currPage = pieces[pieces.length-1];
    }

    ID = currPage.split(':')[1];

    if (ID != undefined){
        currPage = currPage.split(':')[0];
        pieces = ID.split('/');
        if (pieces[pieces.length-1] == '' || pieces[pieces.length-1] == undefined){
            return pieces[pieces.length-2];
        }
        else{
            return pieces[pieces.length-1];
        }
    }
    else{
        return 0;
    }
}

function user_selectMenuItem(item){
    $('.user-nav').removeClass('selected');
    if (item != 'none'){
        $('#'+item+'-link').addClass('selected');
    }
}

function user_selectOfferMenuItem(id){
    $('a', '#offers-submenu').removeClass('selected');
    $('#offer'+id).addClass('selected');
}

function user_selectDealMenuItem(id){
    $('a', '#deals-submenu').removeClass('selected');
    $('#deal'+id).addClass('selected');
}

function user_hideSubmenus(which, ID){
    if (which == 'offers'){
        $('#offers-submenu').html('');
        $('a', '#deals-submenu').removeClass('selected');
        $('#deal-'+ID).addClass('selected');
    }
    else if (which == 'deals'){
        $('#deals-submenu').html('');
        $('a', '#offers-submenu').removeClass('selected');
        $('#offer-'+ID).addClass('selected');
    }
    else{
        $('#offers-submenu').html('');
        $('#deals-submenu').html('');
    }
}

function user_redirectOffers(){
    window.location = '#offers';
    user_parseContent();
}

/******************************************************************************* OFFER PROFILE */

/* BEGIN PROFILE */

    function user_initProfile(){
        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/profile/uploadify/'+USER_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : CHANGE_IMAGE,
            'width'          : 134,
            'height'         : 34,
            'auto'           : true,
            'multi'          : false,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-profile-picture-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-profile-picture-title').removeClass('loading');
                                   $('.edit-profile-user-image').html('<img src="'+response+'" title="'+FIRST_NAME+' '+LAST_NAME+'" alt="" />');
                                   $('.user-image').html('<img src="'+response+'" title="'+FIRST_NAME+' '+LAST_NAME+'" alt="" />');
                                   user_showInfo('#edit-profile-picture-info', EDIT_PROFILE_PICTURE_SUCCESS);
                               },
            'onAllComplete'  : function(event, data){}
        });

        $('#first-name').blur(function(){
            $('#edit-profile-title').addClass('loading');
            $.post(BASE_URL+'user/profile/validateFirstName/', {first_name: $('#first-name').val()}, function(data){
                $('#edit-profile-title').removeClass('loading');
                $('#info-first-name').html(data);
            });
        });
        $('#last-name').blur(function(){
            $('#edit-profile-title').addClass('loading');
            $.post(BASE_URL+'user/profile/validateLastName/', {last_name: $('#last-name').val()}, function(data){
                $('#edit-profile-title').removeClass('loading');
                $('#info-last-name').html(data);
            });
        });
        $('#email').blur(function(){
            $('#edit-profile-title').addClass('loading');
            $.post(BASE_URL+'user/profile/validateEmail/', {email: $('#email').val()}, function(data){
                $('#edit-profile-title').removeClass('loading');
                $('#info-email').html(data);
            });
        });
    }

    function user_editProfile(){
        var validForm = true;
        user_disableEditProfileForm(true);
        $('#edit-profile-title').addClass('loading');
        $.post(BASE_URL+'user/profile/validateFirstName/', {first_name: $('#first-name').val()}, function(data){
            $('#info-first-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/profile/validateLastName/', {last_name: $('#last-name').val()}, function(data){
                $('#info-last-name').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                $.post(BASE_URL+'user/profile/validateEmail/', {email: $('#email').val()}, function(data){
                    $('#info-email').html(data);
                    if (data.split('font').length > 1){
                        validForm = false;
                    }
                    if (validForm){
                        $.post(BASE_URL+'user/profile/edit/', {first_name: $('#first-name').val(),
                                                               last_name: $('#last-name').val(),
                                                               email: $('#email').val(),
                                                               phone: $('#phone').val(),
                                                               description: $('#description').val()}, function(data){
                            $('#edit-profile-title').removeClass('loading');
                            user_disableEditProfileForm(false);
                            user_showInfo('#edit-profile-info', data);
                        });
                    }
                    else{
                        $('#edit-profile-title').removeClass('loading');
                        user_disableEditProfileForm(false);
                    }
                });
            });
        });

        return false;
    }

    function user_disableEditProfileForm(val){
        $('#first-name').attr('disabled', val);
        $('#last-name').attr('disabled', val);
        $('#email').attr('disabled', val);
        $('#phone').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
    }

/* END PROFILE */

/******************************************************************************* OFFER HOTEL */

/* BEGIN ADD HOTEL */

    function user_initAddHotel(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/hotel/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/hotel/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addHotel(){
        var validForm = true;
        user_disableAddHotelForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/hotel/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/hotel/addSubmit/', {coordinates: $('#coordinates').val(),
                                                              location_id: $('#location_id').val(),
                                                              locality: $('#locality').val(),
                                                              address: $('#address').val(),
                                                              alt_address: $('#alt-address').val(),
                                                              name: $('#name').val(),
                                                              description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddHotelForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddHotelForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddHotelForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }


/* END ADD HOTEL */

/* BEGIN EDIT HOTEL */

    function user_initEditHotelDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/hotel/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/hotel/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editHotelDetails(){
        var validForm = true;
        user_disableEditHotelDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/hotel/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/hotel/editDetailsSubmit/', {id: $('#hotel_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#hotel_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditHotelDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditHotelDetailsForm(false);
                }
            });
        });
        
        return false;
    }

    function user_disableEditHotelDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditHotelGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/hotel/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/hotel/uploadify/'+HOTEL_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');                                   
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteHotelImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/deleteImage/', {no:no, hotelId:HOTEL_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

    function user_initEditHotelPricing(){
        
    }

    function user_editHotelPricing(){
        user_disableHotelPricing(true);
        alert('OK1');
        $('#edit-offer-pricing-title').addClass('loading');
        alert('OK2');
        $.post(BASE_URL+'user/hotel/editPricingSubmit/', {hotelId:$('#hotel_id').val(),
                                                          currency:$('#currency').val(),
                                                          min_stay:$('#min-stay').val(),
                                                          cancel_policy:$('#cancel-policy').val()}, function(data){
                                                          
            $('#edit-offer-pricing-title').removeClass('loading');
            user_disableHotelPricing(false);
            user_showInfo('#edit-offer-pricing-info', data);
        });

        return false;
    }

    function user_disableHotelPricing(val){
        $('#currency').attr('disabled', val);
        $('#min-stay').attr('disabled', val);
        $('#cancel-policy').attr('disabled', val);
        if (val){
            $('#submit-pricing').css('cursor', 'default');
            $('#add-room').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit-pricing').css('cursor', 'pointer');
            $('#add-room').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit-pricing').attr('disabled', val);
        $('#add-room').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_addHotelRoom(id){
        $('#edit-offer-pricing-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/addRoom/', {hotelId:id}, function(data){
            $('#edit-offer-pricing-title').removeClass('loading');
            $('#rooms').append('<option value="'+data.split(';;')[1]+'" selected="selected">'+data.split(';;')[1]+'</option>');
            user_showInfo('#edit-offer-pricing-info', data.split(';;')[2]);
            user_showHotelRoom(data.split(';;')[0]);
        });        
    }

    function user_showHotelRoom(id){
        if (id != 0){
            $('#edit-offer-rooms-title').addClass('loading');
            $.post(BASE_URL+'user/hotel/showRoom/', {hotelId:$('#hotel_id').val(), roomId:id}, function(data){
                $('#edit-offer-rooms-title').removeClass('loading');
                $('#room-container').html(data);
                $('#name').blur(function(){
                   $('#room'+id).html($(this).val());
                });
                $('#calendar').DOPBookingCalendar({'DataURL':BASE_URL+'user/hotel/getPricing/'+id+'/', 'SaveURL':BASE_URL+'user/hotel/savePricing/'+id+'/'});
                positionFooter();
            });
        }
        else{
            $('#room-container').html('');
            positionFooter();
        }
    }

    function user_editHotelRoom(){
        user_disableHotelRoom(true);
        $('#edit-offer-rooms-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/editRoomSubmit/', {roomId:$('#room-id').val(),
                                                       name:$('#name').val(),
                                                       no_rooms:$('#no_rooms').val(),
                                                       max_allowed_people:$('#max_allowed_people').val()}, function(data){
            $('#edit-offer-rooms-title').removeClass('loading');
            user_disableHotelRoom(false);
            user_showInfo('#edit-offer-rooms-info', data);
        });

        return false;
    }

    function user_deleteHotelRoom(){
        user_disableHotelRoom(true);
        $('#edit-offer-rooms-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/deleteRoom/', {roomId:$('#room-id').val()}, function(data){
            $('#edit-offer-rooms-title').removeClass('loading');
            user_disableHotelRoom(false);
            $('#room'+$('#room-id').val()).remove();
            user_showHotelRoom(0);
            user_showInfo('#edit-offer-rooms-info', data);
        });

        return false;
    }

    function user_disableHotelRoom(val){
        $('#rooms').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#no_rooms').attr('disabled', val);
        $('#max_allowed_people').attr('disabled', val);
        if (val){
            $('#submit-room').css('cursor', 'default');
            $('#delete-room').css('cursor', 'default');
        }
        else{
            $('#submit-room').css('cursor', 'pointer');
            $('#delete-room').css('cursor', 'pointer');
        }
        $('#submit-room').attr('disabled', val);
        $('#delete-room').attr('disabled', val);
    }

/* END EDIT HOTEL */

/******************************************************************************* OFFER VILLA */

/* BEGIN ADD VILLA */

    function user_initAddVilla(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/villa/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/villa/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addVilla(){
        var validForm = true;
        user_disableAddVillaForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/villa/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/villa/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/villa/addSubmit/', {coordinates: $('#coordinates').val(),
                                                              location_id: $('#location_id').val(),
                                                              locality: $('#locality').val(),
                                                              address: $('#address').val(),
                                                              alt_address: $('#alt-address').val(),
                                                              name: $('#name').val(),
                                                              description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddVillaForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddVillaForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddVillaForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD VILLA */

/* BEGIN EDIT VILLA */

    function user_initEditVillaDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/villa/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/villa/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editVillaDetails(){
        var validForm = true;
        user_disableEditVillaDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/villa/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/villa/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/villa/editDetailsSubmit/', {id: $('#villa_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#villa_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditVillaDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditVillaDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditVillaDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditVillaGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/villa/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/villa/uploadify/'+VILLA_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteVillaImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/villa/deleteImage/', {no:no, villaId:VILLA_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT VILLA */

/******************************************************************************* OFFER CAR */

/* BEGIN ADD CAR */

    function user_initAddCar(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/car/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/car/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addCar(){
        var validForm = true;
        user_disableAddCarForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/car/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/car/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/car/addSubmit/', {coordinates: $('#coordinates').val(),
                                                            location_id: $('#location_id').val(),
                                                            locality: $('#locality').val(),
                                                            address: $('#address').val(),
                                                            alt_address: $('#alt-address').val(),
                                                            name: $('#name').val(),
                                                            description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddCarForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddCarForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddCarForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD CAR */

/* BEGIN EDIT CAR */

    function user_initEditCarDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/car/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/car/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editCarDetails(){
        var validForm = true;
        user_disableEditCarDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/car/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/car/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/car/editDetailsSubmit/', {id: $('#car_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#car_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditCarDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditCarDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditCarDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditCarGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/car/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/car/uploadify/'+CAR_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteCarImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/car/deleteImage/', {no:no, carId:CAR_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT CAR */

/******************************************************************************* OFFER SPA & BEAUTY */

/* BEGIN ADD SPA & BEAUTY */

    function user_initAddBeauty(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/beauty/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/beauty/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addBeauty(){
        var validForm = true;
        user_disableAddBeautyForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/beauty/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/beauty/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/beauty/addSubmit/', {coordinates: $('#coordinates').val(),
                                                               location_id: $('#location_id').val(),
                                                               locality: $('#locality').val(),
                                                               address: $('#address').val(),
                                                               alt_address: $('#alt-address').val(),
                                                               name: $('#name').val(),
                                                               description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddBeautyForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddBeautyForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddBeautyForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD SPA & BEAUTY */

/* BEGIN EDIT BEAUTY */

    function user_initEditBeautyDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/beauty/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/beauty/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editBeautyDetails(){
        var validForm = true;
        user_disableEditBeautyDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/beauty/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/beauty/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/beauty/editDetailsSubmit/', {id: $('#beauty_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#beauty_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditBeautyDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditBeautyDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditBeautyDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditBeautyGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/beauty/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/beauty/uploadify/'+BEAUTY_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteBeautyImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/beauty/deleteImage/', {no:no, beautyId:BEAUTY_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT BEAUTY */

/******************************************************************************* OFFER CHEF */

/* BEGIN ADD CHEF */

    function user_initAddChef(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/chef/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/chef/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addChef(){
        var validForm = true;
        user_disableAddChefForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/chef/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/chef/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/chef/addSubmit/', {coordinates: $('#coordinates').val(),
                                                             location_id: $('#location_id').val(),
                                                             locality: $('#locality').val(),
                                                             address: $('#address').val(),
                                                             alt_address: $('#alt-address').val(),
                                                             name: $('#name').val(),
                                                             description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddChefForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddChefForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddChefForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD CHEF */

/* BEGIN EDIT CHEF */

    function user_initEditChefDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/chef/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/chef/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editChefDetails(){
        var validForm = true;
        user_disableEditChefDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/chef/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/chef/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/chef/editDetailsSubmit/', {id: $('#chef_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#chef_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditChefDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditChefDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditChefDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditChefGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/chef/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/chef/uploadify/'+CHEF_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteChefImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/chef/deleteImage/', {no:no, chefId:CHEF_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT CHEF */

/******************************************************************************* OFFER BOAT */

/* BEGIN ADD BOAT */

    function user_initAddBoat(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/boat/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/boat/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addBoat(){
        var validForm = true;
        user_disableAddBoatForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/boat/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/boat/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/boat/addSubmit/', {coordinates: $('#coordinates').val(),
                                                             location_id: $('#location_id').val(),
                                                             locality: $('#locality').val(),
                                                             address: $('#address').val(),
                                                             alt_address: $('#alt-address').val(),
                                                             name: $('#name').val(),
                                                             description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddBoatForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddBoatForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddBoatForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD BOAT */

/* BEGIN EDIT BOAT */

    function user_initEditBoatDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/boat/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/boat/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editBoatDetails(){
        var validForm = true;
        user_disableEditBoatDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/boat/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/boat/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/boat/editDetailsSubmit/', {id: $('#boat_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#boat_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditBoatDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditBoatDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditBoatDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditBoatGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/boat/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/boat/uploadify/'+BOAT_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteBoatImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/boat/deleteImage/', {no:no, boatId:BOAT_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT BOAT */

/******************************************************************************* OFFER BABYSITTER */

/* BEGIN ADD BABYSITTER */

    function user_initAddBabysitter(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/babysitter/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/babysitter/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addBabysitter(){
        var validForm = true;
        user_disableAddBabysitterForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/babysitter/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/babysitter/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/babysitter/addSubmit/', {coordinates: $('#coordinates').val(),
                                                             location_id: $('#location_id').val(),
                                                             locality: $('#locality').val(),
                                                             address: $('#address').val(),
                                                             alt_address: $('#alt-address').val(),
                                                             name: $('#name').val(),
                                                             description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddBabysitterForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddBabysitterForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddBabysitterForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD BABYSITTER */

/* BEGIN EDIT BABYSITTER */

    function user_initEditBabysitterDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/babysitter/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/babysitter/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editBabysitterDetails(){
        var validForm = true;
        user_disableEditBabysitterDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/babysitter/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/babysitter/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/babysitter/editDetailsSubmit/', {id: $('#babysitter_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#babysitter_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditBabysitterDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditBabysitterDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditBabysitterDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditBabysitterGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/babysitter/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/babysitter/uploadify/'+BABYSITTER_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteBabysitterImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/babysitter/deleteImage/', {no:no, babysitterId:BABYSITTER_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT BABYSITTER */

/******************************************************************************* OFFER MASSAGE */

/* BEGIN ADD MASSAGE */

    function user_initAddMassage(){
        marker = null;
        gm_initialize('user-area-main-add-map');
        gm_codeAddress(gm_decodeLocation($('#location').val(), 2), 'mapplusmarker', 'keep');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                gm_showHints($(this).val(), '#address-hints');
            }
        });

        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/massage/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/massage/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_addMassage(){
        var validForm = true;
        user_disableAddMassageForm(true);
        $('#add-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/massage/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/massage/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/massage/addSubmit/', {coordinates: $('#coordinates').val(),
                                                             location_id: $('#location_id').val(),
                                                             locality: $('#locality').val(),
                                                             address: $('#address').val(),
                                                             alt_address: $('#alt-address').val(),
                                                             name: $('#name').val(),
                                                             description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        user_disableAddMassageForm(false);
                        user_redirectOffers();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    user_disableAddMassageForm(false);
                }
            });
        });

        return false;
    }

    function user_disableAddMassageForm(val){
        $('#address').attr('disabled', val);
        $('#location').attr('disabled', val);
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

/* END ADD MASSAGE */

/* BEGIN EDIT MASSAGE */

    function user_initEditMassageDetails(){
        $('#name').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/massage/validateName/', {name: $('#name').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-name').html(data);
            });
        });
        $('#description').blur(function(){
            $('#add-offer-details-title').addClass('loading');
            $.post(BASE_URL+'user/massage/validateDescription/', {description: $('#description').val()}, function(data){
                $('#add-offer-details-title').removeClass('loading');
                $('#info-description').html(data);
            });
        });
    }

    function user_editMassageDetails(){
        var validForm = true;
        user_disableEditMassageDetailsForm(true);
        $('#edit-offer-details-title').addClass('loading');
        $.post(BASE_URL+'user/massage/validateName/', {name: $('#name').val()}, function(data){
            $('#info-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/massage/validateDescription/', {description: $('#description').val()}, function(data){
                $('#info-description').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    var amenities = ',', item_id;
                    $('input', '.amenities-list').each(function(){
                        if ($(this).is(':checked')){
                            item_id = $(this).attr('id');
                            amenities += item_id.split('amenity')[1]+',';
                        }
                    });
                    $.post(BASE_URL+'user/massage/editDetailsSubmit/', {id: $('#massage_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val(),
                                                                      locations: $('#locations').val(),
                                                                      amenities: amenities}, function(data){
                        $('.name', '#offer-'+$('#massage_id').val()).html($('#name').val());
                        $('.title', '#offers-list').html($('#name').val());
                        $('.description', '#offers-list').html(searchBoxShortText($('#description').val(), 150));
                        $('#edit-offer-details-title').removeClass('loading');
                        user_disableEditMassageDetailsForm(false);
                        user_showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    user_disableEditMassageDetailsForm(false);
                }
            });
        });

        return false;
    }

    function user_disableEditMassageDetailsForm(val){
        $('#alt-address').attr('disabled', val);
        $('#name').attr('disabled', val);
        $('#description').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
            $('#back').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
            $('#back').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
        $('#back').attr('disabled', val);
    }

    function user_initEditMassageGallery(){
        $('#edit-offer-gallery').sortable({placeholder:"image_highlight", opacity:0.6, cursor:'move', update:function(){
            $('#edit-offer-gallery-title').addClass('loading');
            var data = '';
            $('li', this).each(function(){
                if ($(this).css('display') != 'none'){
                    data += $(this).attr('id').split('_')[1]+';;';
                }
            });
            $.post(BASE_URL+'user/massage/sortImages/', {data:data}, function(data){
                $('#edit-offer-gallery-title').removeClass('loading');
                user_showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/massage/uploadify/'+MASSAGE_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 120,
            'height'         : 30,
            'auto'           : true,
            'multi'          : true,
            'onSelect'       : function(event, ID, fileObj){
                                   $('#edit-offer-gallery-title').addClass('loading');
                               },
            'onComplete'     : function(event, ID, fileObj, response, data){
                                   $('#edit-offer-gallery').append(response);
                                   $('.close', '#edit-offer-gallery').click(function(){
                                       $(this).parent().css('display', 'none');
                                   });
                               },
            'onAllComplete'  : function(event, data){
                                   $('#edit-offer-gallery-title').removeClass('loading');
                                   user_showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function user_deleteMassageImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/massage/deleteImage/', {no:no, massageId:MASSAGE_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            user_showInfo('#edit-offer-gallery-info', data);
        });
    }

/* END EDIT MASSAGE */

/******************************************************************************* OFFER SETTINGS */

/* BEGIN SETTINGS */

    function user_initSettings(){
        $('#new-password').blur(function(){
            $('#change-password-title').addClass('loading');
            $.post(BASE_URL+'user/settings/validateNewPassword/', {new_password: $('#new-password').val()}, function(data){
                $('#change-password-title').removeClass('loading');
                $('#info-new-password').html(data);
            });
        });
        $('#confirm-new-password').blur(function(){
            $('#change-password-title').addClass('loading');
            $.post(BASE_URL+'user/settings/validateConfirmNewPassword/', {new_password: $('#new-password').val(), confirm_new_password: $('#confirm-new-password').val()}, function(data){
                $('#change-password-title').removeClass('loading');
                $('#info-confirm-new-password').html(data);
            });
        });
    }

    function user_changePassword(){
        var validForm = true;
        user_disableChangePasswordForm(true);
        $('#change-password-title').addClass('loading');
        $.post(BASE_URL+'user/settings/validateNewPassword/', {new_password: $('#new-password').val()}, function(data){
            $('#info-new-password').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/settings/validateConfirmNewPassword/', {new_password: $('#new-password').val(), confirm_new_password: $('#confirm-new-password').val()}, function(data){
                $('#info-confirm-new-password').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                if (validForm){
                    $.post(BASE_URL+'user/settings/changePassword/', {new_password: $('#new-password').val()}, function(data){
                        disableChangePasswordForm(false);
                        $('#change-password-title').removeClass('loading');
                        user_showInfo('#change-password-info', data);
                    });
                }
                else{
                    $('#change-password-title').removeClass('loading');
                    user_disableChangePasswordForm(false);
                }
            });
        });

        return false;
    }

    function user_disableChangePasswordForm(val){
        $('#new-password').attr('disabled', val);
        $('#confirm-new-password').attr('disabled', val);
        if (val){
            $('#submit').css('cursor', 'default');
        }
        else{
            $('#submit').css('cursor', 'pointer');
        }
        $('#submit').attr('disabled', val);
    }

/* END SETTINGS */

function user_showInfo(id, message){
    var infoHideDelay = 2000,
    shDelay = 600;

    clearTimeout(timeoutID);
    
    $(id).html(message);
    $(id).addClass('user-area-form-success');
    $(id).css('display', 'block');
    $(id).stop(true, true).animate({'opacity':'1'}, shDelay, function(){
        timeoutID = setTimeout(function(){
            $(id).stop(true, true).animate({'opacity':'0'}, shDelay, function(){
                $(id).css('display', 'none');
            });
        }, infoHideDelay);
    });
}