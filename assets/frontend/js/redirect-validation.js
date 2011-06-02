/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/redirect-validation.js
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Redirect to Sign In after email falidation.
*/

$(document).ready(function(){
    setTimeout(function(){
        window.location = BASE_URL+'user/';
    }, 2000);
});