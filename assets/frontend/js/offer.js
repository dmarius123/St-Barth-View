/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/offer.js
 * File Version            : 1.4
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 29 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offer Scripts.
*/

var currOfferSection = 'description';

function offer_init(){
    $('#offer-gallery-container').DOPThumbnailGallery({'SettingsXMLFilePath': BASE_URL+'offers/offer/gallerySettings', 'ContentXMLFilePath': BASE_URL+'offers/offer/gallery/'+$('#offer_id').val()});
}

function offer_showDescription(){
    if (currOfferSection != 'description'){
        currOfferSection = 'description';
        offer_selectBottomMenuItem('description');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('<p>'+$('#offer_description').val()+'</p>');
            $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                positionFooter();
            });
        });
    }
}

function offer_showAmenities(){
    if (currOfferSection != 'amenities'){
        currOfferSection = 'amenities';
        offer_selectBottomMenuItem('amenities');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('');
            $('#offer-bottom-content').animate({'height': 32}, 200, function(){
                positionFooter();
                $(this).addClass('loader');
                $.post(BASE_URL+'offers/offer/getAmenities/', {offer_type_id: $('#offer_type_id').val()}, function(data){
                    $('#offer-bottom-content').removeClass('loader');
                    $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 200, function(){
                        positionFooter();
                        var HTML = new Array(), amenities = new Array(), i;

                        amenities = data.split(',');
                        HTML.push('<ul class="amenities">');
                        for (i=0; i<amenities.length; i++){
                            if ($('#offer_amenities').val().indexOf(','+amenities[i].split(':')[0]+',') != -1){
                                HTML.push('<li>'+amenities[i].split(':')[1]+'</li>');
                            }
                            else{
                                HTML.push('<li class="no">'+amenities[i].split(':')[1]+'</li>');
                            }
                        }
                        HTML.push('<br class="clear" />');
                        HTML.push('</ul>');

                        $('#offer-bottom-content').html(HTML.join(''));
                        $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                            positionFooter();
                        });
                    });
                });
            });
        });
    }
}

function offer_showRooms(){
    if (currOfferSection != 'rooms'){
        currOfferSection = 'rooms';
        offer_selectBottomMenuItem('rooms');
    }
}

function offer_showMap(){
    if (currOfferSection != 'map'){
        currOfferSection = 'map';
        offer_selectBottomMenuItem('map');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('<div class="map" id="offer-bottom-content-map"></div>');

            gm_initialize('offer-bottom-content-map');
            gm_codeLocation($('#offer_coordinates').val(), 'mapplusmarker');
            $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                positionFooter();
            });
        });
    }
}

function offer_showLocations(){
    if (currOfferSection != 'locations'){
        currOfferSection = 'locations';
        offer_selectBottomMenuItem('locations');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('<p>'+$('#offer_locations').val()+'</p>');
            $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                positionFooter();
            });
        });
    }
}

function offer_showReviews(){
    if (currOfferSection != 'reviews'){
        currOfferSection = 'reviews';
        offer_selectBottomMenuItem('reviews');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('');
            $('#offer-bottom-content').animate({'height': 32}, 200, function(){
                positionFooter();
                $(this).addClass('loader');
                $.post(BASE_URL+'offers/offer/getReviews/', {offer_id: $('#offer_id').val()}, function(data){
                    $('#offer-bottom-content').removeClass('loader');
                    $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 200, function(){
                        positionFooter();
                        $('#offer-bottom-content').html(data);
                        $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                            positionFooter();
                        });
                    });
                });
            });
        });
    }
}

function offer_showAddReview(){
    if (currOfferSection != 'add-reviews'){
        currOfferSection = 'add-reviews';
        offer_selectBottomMenuItem('reviews');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('');
            $('#offer-bottom-content').animate({'height': 32}, 200, function(){
                positionFooter();
                $(this).addClass('loader');
                $.post(BASE_URL+'offers/offer/getAddReview/', {}, function(data){
                    $('#offer-bottom-content').removeClass('loader');
                    $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 200, function(){
                        positionFooter();
                        $('#offer-bottom-content').html(data);
                        $('#add-review-rating-stars').DOPRatingInput({'ID': 'review_form_rating',
                                                                      'DefaultItem': BASE_URL+'assets/libraries/gui/images/rating-input/default-item.png',
                                                                      'RateItem': BASE_URL+'assets/libraries/gui/images/rating-input/rate-item.png',
                                                                      'ValueType': 'float',
                                                                      'FloatLength': 1,
                                                                      'HoverCallback': 'offer_addReviewRatingHover()',
                                                                      'HoverOutCallback': 'offer_addReviewRatingHover()'});
                        $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                            positionFooter();
                        });
                    });
                });
            });
        });
    }
}

function offer_addReviewRatingHover(){
    $('#add-review-rating-value').html(parseFloat($('#review_form_rating').val()).toFixed(1));
}

function offer_submitReview(){
    var isOK = true;

    if ($('#review_form_rating').val() == 0){
        isOK = false;
        $('#review_form_rating_label').addClass('review-form-required');
    }
    else{
        $('#review_form_rating_label').removeClass('review-form-required');
    }

    if ($('#review_form_year').val() == ''){
        isOK = false;
        $('#review_form_year_label').addClass('review-form-required');
    }
    else{
        $('#review_form_year_label').removeClass('review-form-required');
    }

    if ($('#review_form_title').val() == ''){
        isOK = false;
        $('#review_form_title_label').addClass('review-form-required');
    }
    else{
        $('#review_form_title_label').removeClass('review-form-required');
    }

    if ($('#review_form_content').val() == ''){
        isOK = false;
        $('#review_form_content_label').addClass('review-form-required');
    }
    else{
        $('#review_form_content_label').removeClass('review-form-required');
    }

    if ($('#review_form_content').val() == ''){
        isOK = false;
        $('#review_form_content_label').addClass('review-form-required');
    }
    else{
        $('#review_form_content_label').removeClass('review-form-required');
    }

    if (!$('#review_form_certify').is(':checked')){
        isOK = false;
        $('#review_form_certify_label').addClass('review-form-required');
    }
    else{
        $('#review_form_certify_label').removeClass('review-form-required');
    }

    if (isOK){
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('');
            $('#offer-bottom-content').animate({'height': 32}, 200, function(){
                positionFooter();
                $(this).addClass('loader');
                $.post(BASE_URL+'offers/offer/addReview/', {offer_id:$('#offer_id').val(),
                                                            review_form_rating:$('#review_form_rating').val(),
                                                            review_form_year:$('#review_form_year').val(),
                                                            review_form_title:$('#review_form_title').val(),
                                                            review_form_content:$('#review_form_content').val()}, function(data){
                    $('#offer-bottom-content').removeClass('loader');
                    $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 200, function(){
                        positionFooter();
                        $('#offer-bottom-content').html('<p>'+data+'</p>');
                        $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                            positionFooter();
                        });
                    });
                });
            });
        });
    }

    return false;
}

function offer_showReportReview(){
    if (currOfferSection != 'report-reviews'){
        currOfferSection = 'report-reviews';
        offer_selectBottomMenuItem('reviews');
        $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 600, function(){
            positionFooter();
            $('#offer-bottom-content').html('');
            $('#offer-bottom-content').animate({'height': 32}, 200, function(){
                positionFooter();
                $(this).addClass('loader');
                $.post(BASE_URL+'offers/offer/getReportReview/', {}, function(data){
                    $('#offer-bottom-content').removeClass('loader');
                    $('#offer-bottom-content').stop(true, true).animate({'height': 0}, 200, function(){
                        positionFooter();
                        $('#offer-bottom-content').html(data);
                        $('#offer-bottom-content').animate({'height': $(this).children().height()}, 600, function(){
                            positionFooter();
                        });
                    });
                });
            });
        });
    }
}

function offer_selectBottomMenuItem(item){
    $('a', '#offer-bottom-menu').removeClass('selected');
    $('#offer-bottom-menu-'+item).addClass('selected');
}