/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/new-users-module.js
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : New Users Scripts.
*/

$(function(){
    $('body').DOPImageLoader({'Container':'#search-members',
                    'LoaderURL': BASE_URL+'assets/frontend/gui/images/loaders/small-loader1.gif',
                    'NoImageURL': BASE_URL+'assets/frontend/gui/images/no-images/no-profile-image-48.jpg',
                    'LoadingInOrder': false,
                    'ImageDelay': 200});
});