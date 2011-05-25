
var timeoutID;

$(document).ready(function(){

    parseContent();
    
    $('.user-nav').click(function(){
        parseContent();
    });
});

function parseContent(){
    var baseURL, basePage, currPage, ID, pieces = new Array();
    setTimeout(function(){
        baseURL = window.location.href.split('#')[0];
        
        var pieces = baseURL.split('/');
        if (pieces[pieces.length-1] == '' || pieces[pieces.length-1] == undefined){
            basePage = pieces[pieces.length-2];
        }
        else{
            basePage = pieces[pieces.length-1];
        }

        currPage = window.location.href.split('#')[1];
        if (currPage == undefined){
            currPage = window.location.href.split('#')[0];
        }

        ID = currPage.split(':')[1];
        if (ID != undefined){
            currPage = currPage.split(':')[0];
            pieces = ID.split('/');
            if (pieces[pieces.length-1] == '' || pieces[pieces.length-1] == undefined){
                ID = pieces[pieces.length-2];
            }
            else{
                ID = pieces[pieces.length-1];
            }
        }
        
        if (currPage == 'dashboard' || currPage == 'dashboard/'){
            selectMenuItem('dashboard');
            $.post(BASE_URL+'user/dashboard/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
        else if (currPage == 'profile' || currPage == 'profile/'){
            selectMenuItem('profile');
            $.post(BASE_URL+'user/profile/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
                initProfile();
            });
        }
        else if (currPage == 'offers' || currPage == 'offers/'){
            alert('ok');
            selectMenuItem('offers');
            $.post(BASE_URL+'user/offers/content', {}, function(data){
                $('#user-area-main').html(data.split(';;;')[0]);
                $('#offers-submenu').html(data.split(';;;')[1]);
                positionFooter();
            });
        }
        else if (currPage == 'add-hotel' || currPage == 'add-hotel/'){
            selectMenuItem('offers');
            $.post(BASE_URL+'user/hotel/add', {}, function(data){
                $('#user-area-main').html(data);
                positionFooter();
                initAddHotel();
            });
        }
        else if (currPage == 'add-villa' || currPage == 'add-villa/'){
            selectMenuItem('offers');
            $.post(BASE_URL+'user/villa/add', {}, function(data){
                $('#user-area-main').html(data);
                positionFooter();
                initAddVilla();
            });
        }
        else if (currPage == 'hotel' || currPage == 'hotel/'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/hotel/item', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    $('body').DOPImageLoader({'Container':'.image-container', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'edit-hotel-details'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/hotel/editDetails', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    initEditHotelDetails();
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'edit-hotel-gallery'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/hotel/editGallery', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    initEditHotelGallery();
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'edit-hotel-pricing'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/hotel/editPricing', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    initEditHotelPricing();
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'villa' || currPage == 'villa/'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/villa/item', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    $('body').DOPImageLoader({'Container':'.image-container', 'LoaderURL':BASE_URL+'assets/libraries/gui/images/box-loader.gif', 'NoImageURL':BASE_URL+'assets/libraries/gui/images/no-image.png'});
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'edit-villa-details'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/villa/editDetails', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    initEditVillaDetails();
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'edit-villa-gallery'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/villa/editGallery', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    initEditVillaGallery();
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'edit-villa-pricing'){
            $('.user-nav').removeClass('selected');
            $('a', '#offers-submenu').removeClass('selected');
            $('#offer-'+ID).addClass('selected');
            if ($('#offers-submenu').html() != ''){
                $.post(BASE_URL+'user/villa/editPricing', {id:ID}, function(data){
                    $('#user-area-main').html(data);
                    positionFooter();
                    initEditVillaPricing();
                });
            }
            else{
                window.location = '#offers';
                parseContent();
            }
        }
        else if (currPage == 'messages' || currPage == 'messages/'){
            selectMenuItem('messages');
            $.post(BASE_URL+'user/messages/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
        else if (currPage == 'friends' || currPage == 'friends/'){
            selectMenuItem('friends');
            $.post(BASE_URL+'user/friends/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
        else if (currPage == 'reservations' || currPage == 'reservations/'){
            selectMenuItem('reservations');
            $.post(BASE_URL+'user/reservations/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
        else if (currPage == 'comments' || currPage == 'comments/'){
            selectMenuItem('comments');
            $.post(BASE_URL+'user/comments/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
        else if (currPage == 'reward-points' || currPage == 'reward-points/'){
            selectMenuItem('reward-points');
            $.post(BASE_URL+'user/reward-points/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
        else if (currPage == 'settings' || currPage == 'settings/'){
            selectMenuItem('settings');
            $.post(BASE_URL+'user/settings/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
                initSettings();
            });
        }
        else{
            selectMenuItem(basePage);
            $.post(BASE_URL+'user/'+basePage+'/content', {}, function(data){
                $('#offers-submenu').html('');
                $('#user-area-main').html(data);
                positionFooter();
            });
        }
    }, 100);
}

function selectMenuItem(item){
    $('.user-nav').removeClass('selected');
    $('#'+item+'-link').addClass('selected');
}

/* BEGIN PROFILE */

    function initProfile(){
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
                                   showInfo('#edit-profile-picture-info', EDIT_PROFILE_PICTURE_SUCCESS);
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

    function editProfile(){
        var validForm = true;
        disableEditProfileForm(true);
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
                            disableEditProfileForm(false);
                            showInfo('#edit-profile-info', data);
                        });
                    }
                    else{
                        $('#edit-profile-title').removeClass('loading');
                        disableEditProfileForm(false);
                    }
                });
            });
        });

        return false;
    }

    function disableEditProfileForm(val){
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

/* BEGIN ADD HOTEL */

    function initAddHotel(){
        marker = null;
        initializeGoogleMap('user-area-main-add-map');
        codeGoogleMapAddress('St Barthélemy', 'mapplusmarker');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                showGoogleMapHints($(this).val(), '#address-hints');
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

    function addHotel(){
        var validForm = true;
        disableAddHotelForm(true);
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
                                                              address: $('#address').val(),
                                                              location: $('#location').val(),
                                                              alt_address: $('#alt-address').val(),
                                                              name: $('#name').val(),
                                                              description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        disableAddHotelForm(false);
                        window.location = '#offers';
                        parseContent();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    disableAddHotelForm(false);
                }
            });
        });

        return false;
    }

    function disableAddHotelForm(val){
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

    function initEditHotelDetails(){
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

    function editHotelDetails(){
        var validForm = true;
        disableEditHotelDetailsForm(true);
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
                    $.post(BASE_URL+'user/hotel/editDetailsSubmit/', {id: $('#hotel_id').val(),
                                                                      alt_address: $('#alt-address').val(),
                                                                      name: $('#name').val(),
                                                                      description: $('#description').val()}, function(data){
                        $('#edit-offer-details-title').removeClass('loading');
                        disableEditHotelDetailsForm(false);
                        showInfo('#edit-offer-details-info', data);
                    });
                }
                else{
                    $('#edit-offer-details-title').removeClass('loading');
                    disableEditHotelDetailsForm(false);
                }
            });
        });
        
        return false;
    }

    function disableEditHotelDetailsForm(val){
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

    function initEditHotelGallery(){
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
                showInfo('#edit-offer-gallery-info', data);
            });
        }});

        $('#uploadify').uploadify({
            'uploader'       : '../assets/libraries/gui/swf/uploadify.swf',
            'script'         : '../user/hotel/uploadify/'+HOTEL_ID,
            'cancelImg'      : '../assets/libraries/gui/images/cancel.png',
            'folder'         : '',
            'queueID'        : 'fileQueue',
            'buttonText'     : UPLOAD_IMAGES,
            'width'          : 134,
            'height'         : 34,
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
                                   showInfo('#edit-offer-gallery-info', UPLOAD_IMAGES_SUCCESS);
                               }
        });
    }

    function deleteImage(no){
        $('#edit-offer-gallery-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/deleteImage/', {no:no, hotelId:HOTEL_ID}, function(data){
            $('#image_'+no).fadeOut(600);
            $('#edit-offer-gallery-title').removeClass('loading');
            showInfo('#edit-offer-gallery-info', data);
        });
    }

    function initEditHotelPricing(){
        
    }

    function editHotelPricing(){
        disableHotelPricing(true);
        $('#edit-offer-pricing-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/editPricingSubmit/', {hotelId:$('#hotel_id').val(),
                                                          currency:$('#currency').val(),
                                                          min_stay:$('#min-stay').val(),
                                                          cancel_policy:$('#cancel-policy').val()}, function(data){
            $('#edit-offer-pricing-title').removeClass('loading');
            disableHotelPricing(false);
            showInfo('#edit-offer-pricing-info', data);
        });

        return false;
    }

    function disableHotelPricing(val){
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

    function addHotelRoom(id){
        $('#edit-offer-pricing-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/addRoom/', {hotelId:id}, function(data){
            $('#edit-offer-pricing-title').removeClass('loading');
            $('#rooms').append('<option value="'+data.split(';;')[1]+'" selected="selected">'+data.split(';;')[1]+'</option>');
            showInfo('#edit-offer-pricing-info', data.split(';;')[2]);
            showHotelRoom(data.split(';;')[0]);
        });        
    }

    function showHotelRoom(id){
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

    function editHotelRoom(){
        disableHotelRoom(true);
        $('#edit-offer-rooms-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/editRoomSubmit/', {roomId:$('#room-id').val(),
                                                       name:$('#name').val(),
                                                       no_rooms:$('#no_rooms').val(),
                                                       max_allowed_people:$('#max_allowed_people').val()}, function(data){
            $('#edit-offer-rooms-title').removeClass('loading');
            disableHotelRoom(false);
            showInfo('#edit-offer-rooms-info', data);
        });

        return false;
    }

    function deleteHotelRoom(){
        disableHotelRoom(true);
        $('#edit-offer-rooms-title').addClass('loading');
        $.post(BASE_URL+'user/hotel/deleteRoom/', {roomId:$('#room-id').val()}, function(data){
            $('#edit-offer-rooms-title').removeClass('loading');
            disableHotelRoom(false);
            $('#room'+$('#room-id').val()).remove();
            showHotelRoom(0);
            showInfo('#edit-offer-rooms-info', data);
        });

        return false;
    }

    function disableHotelRoom(val){
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

/* BEGIN ADD VILLA */

    function initAddVilla(){
        marker = null;
        initializeGoogleMap('user-area-main-add-map');
        codeGoogleMapAddress('St Barthélemy', 'mapplusmarker');
        $("#address").keyup(function(event){
            if(event.keyCode != 13){
                showGoogleMapHints($(this).val(), '#address-hints');
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

    function addVilla(){
        var validForm = true;
        disableAddVillaForm(true);
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
                                                              address: $('#address').val(),
                                                              location: $('#location').val(),
                                                              alt_address: $('#alt-address').val(),
                                                              name: $('#name').val(),
                                                              description: $('#description').val()}, function(data){
                        $('#add-offer-details-title').removeClass('loading');
                        disableAddVillaForm(false);
                        window.location = '#offers';
                        parseContent();
                    });
                }
                else{
                    $('#add-offer-details-title').removeClass('loading');
                    disableAddVillaForm(false);
                }
            });
        });

        return false;
    }

    function disableAddVillaForm(val){
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

/* BEGIN SETTINGS */

    function initSettings(){
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

    function changePassword(){
        var validForm = true;
        disableChangePasswordForm(true);
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
                        showInfo('#change-password-info', data);
                    });
                }
                else{
                    $('#change-password-title').removeClass('loading');
                    disableChangePasswordForm(false);
                }
            });
        });

        return false;
    }

    function disableChangePasswordForm(val){
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

function showInfo(id, message){
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