
$(document).ready(function(){
    $('#wrapper').css('height', $(window).height());
    $('#panel').css('margin-left', $(window).width());
    $('#panel').css('margin-top', ($(window).height()-$('#panel').height())/2);
    $('#info_container').css('opacity', 0);
    $('#info_container').css('display', 'block');
    $('#panel').css('display', 'block');
    $('#panel').stop(true, true).animate({'margin-left':($(window).width()-$('#panel').width())/2}, 800, function(){
        $('#info_container').stop(true, true).animate({'opacity':'1'}, 600);
    });

    $(window).resize(function(){
        $('#wrapper').css('height', $(window).height());
        $('#panel').css('margin-top', ($(window).height()-$('#panel').height())/2);
    })
});

function login(){    
    var loader = '<div class="info_icon"><img src="'+BASE_URL+'assets/backend/gui/images/loader.gif" width="16px" height="16px" alt="" /></div>';
    loader += '<div class="info_message">'+LOGIN_PROCESSING+'</div>';    
    loader += '<div class="info_spacer"></div>';
    var success = '<div class="info_icon"><img src="'+BASE_URL+'assets/backend/gui/images/info-icon.png" alt="" /></div>';
    success += '<div class="info_message">'+LOGIN_SUCCESS+'</div>';
    success += '<div class="info_spacer"></div>';
    var error = '<div class="info_icon"><img src="'+BASE_URL+'assets/backend/gui/images/info-icon.png" alt="" /></div>';
    error += '<div class="info_message">'+LOGIN_UNSUCCESS+'</div>';
    error += '<div class="info_spacer"></div>';

    enableForm(true);

    $('#info').slideUp(400, function(){
        $('#info').html(loader);
        $('#info').slideDown(400, function(){
            $.post(BASE_URL+'admin/login/', {email:$('#email').val(), password:$('#password').val()}, function(data){
                if (data == LOGIN_SUCCESS){
                    enableForm(false);
                    $('#info').slideUp(400, function(){
                        $('#info').html(success);
                        $('#info').slideDown(400, function(){location.reload();});
                    });
                }
                else{
                    enableForm(false);
                    $('#email').val('');
                    $('#password').val('');

                    $('#info').slideUp(400, function(){
                        $('#info').html(error);
                        $('#info').slideDown(400);
                    });
                }
            });
        });
    });

    return false;
}

function enableForm(val){
    $('#email').attr('disabled', val);
    $('#password').attr('disabled', val);
    if (val){
        $('.il_submit_style').css('cursor', 'default');
    }
    else{
        $('.il_submit_style').css('cursor', 'pointer');
    }
    $('#submit').attr('disabled', val);
}