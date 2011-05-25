
$(document).ready(function(){
    positionFooter();
    
    $(window).resize(function(){
        positionFooter();
    });
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