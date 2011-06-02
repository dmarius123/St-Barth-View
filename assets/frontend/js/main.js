/*
 * Title                   : St Barth View
 * File                    : assets/frontend/js/main.js
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 01 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Main Scripts.
*/

var timeoutID;
var currPage;

$(document).ready(function(){
    positionFooter();
    
    $(window).resize(function(){
        positionFooter();
    });
    
    switch (currPage){
        case 'Home':
            home_init();
            last_module_init();
            break;
        case 'Search':
            search_init();
            last_module_init();
            break;
        case 'User':
            user_init();
            break;
    }
});

function facebookSignIn(){
    window.location = BASE_URL+'user/';
}

function positionFooter(){
    if ($('#header').height()+$('#section').height()+$('#footer').height() <= $(window).height()){
        $('#wrapper').attr('style', 'height:'+$(window).height()+'px;');
        $('#footer').css('position', 'absolute');
    }
    else{
        $('#wrapper').attr('style', '');
        $('#footer').css('position', 'relative');
        setTimeout(function(){
            if ($('#header').height()+$('#section').height()+$('#footer').height() <= $(window).height()){
                $('#wrapper').attr('style', 'height:'+$(window).height()+'px;');
                $('#footer').css('position', 'absolute');
            }
            else{
                $('#wrapper').attr('style', '');
                $('#footer').css('position', 'relative');
            }
        }, 10);
    }
}

function setCookie(c_name, value, expiredays){// setCookie("MyCookie", "jump", 7); // The Cookie "MyCookie" has the value "jump" and expires in 7 days.
    var exdate = new Date();
    exdate.setDate(exdate.getDate()+expiredays);

    document.cookie = c_name+"="+escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}

function readCookie(name){// readCookie("MyCookie"); // Returns value "jump".
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for(var i=0;i < ca.length;i++){
        var c = ca[i];
        while (c.charAt(0)==" ") c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function gmtDate(){
    var time = null,
    timeZone = new Date().getTimezoneOffset();

    $.ajax({url: BASE_URL+'functions/GMT/',
        async: false, dataType: 'text',
        success: function(data) {
            time = new Date(data);
        }, error: function(http, message, exc) {
            time = new Date();
    }});

    time.setHours(time.getHours()-timeZone/60);
    return time;
}