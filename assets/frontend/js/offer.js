/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/offer.js
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 20 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offer Scripts.
*/

function offer_init(){
    $('#offer-image-container').DOPThumbnailGallery({'SettingsXMLFilePath': BASE_URL+'offers/offer/gallerySettings', 'ContentXMLFilePath': BASE_URL+'offers/offer/gallery/'+$('#offer-id').val()});

    
}
