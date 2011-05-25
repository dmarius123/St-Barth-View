
$(document).ready(function(){
    $('#first-name').blur(function(){
        $('#standard-sign-up-title').addClass('loading');
        $.post(BASE_URL+'user/signUp/validateFirstName/', {first_name: $('#first-name').val()}, function(data){
            $('#standard-sign-up-title').removeClass('loading');
            $('#info-first-name').html(data);
        });
    });
    $('#last-name').blur(function(){
        $('#standard-sign-up-title').addClass('loading');
        $.post(BASE_URL+'user/signUp/validateLastName/', {last_name: $('#last-name').val()}, function(data){
            $('#standard-sign-up-title').removeClass('loading');
            $('#info-last-name').html(data);
        });
    });
    $('#email').blur(function(){
        $('#standard-sign-up-title').addClass('loading');
        $.post(BASE_URL+'user/signUp/validateEmail/', {email: $('#email').val()}, function(data){
            $('#standard-sign-up-title').removeClass('loading');
            $('#info-email').html(data);
        });
    });
    $('#confirm-email').blur(function(){
        $('#standard-sign-up-title').addClass('loading');
        $.post(BASE_URL+'user/signUp/validateConfirmEmail/', {email: $('#email').val(), confirm_email: $('#confirm-email').val()}, function(data){
            $('#standard-sign-up-title').removeClass('loading');
            $('#info-confirm-email').html(data);
        });
    });
    $('#password').blur(function(){
        $('#standard-sign-up-title').addClass('loading');
        $.post(BASE_URL+'user/signUp/validatePassword/', {password: $('#password').val()}, function(data){
            $('#standard-sign-up-title').removeClass('loading');
            $('#info-password').html(data);
        });
    });
    $('#confirm-password').blur(function(){
        $('#standard-sign-up-title').addClass('loading');
        $.post(BASE_URL+'user/signUp/validateConfirmPassword/', {password: $('#password').val(), confirm_password: $('#confirm-password').val()}, function(data){
            $('#standard-sign-up-title').removeClass('loading');
            $('#info-confirm-password').html(data);
        });
    });
});

function signIn(){
    disableSignInForm(true);
    $('#standard-sign-in-title').addClass('loading');
    $.post(BASE_URL+'user/signIn/submit/', {email: $('#sign-in-email').val(),
                                            password: $('#sign-in-password').val()}, function(data){
        $('#standard-sign-in-title').removeClass('loading');

        if (data == 'sign-in'){
            window.location = BASE_URL+'user/';
        }
        else{
            disableSignInForm(false);
            $('#info-email').html(data.split(';;')[0]);
            $('#info-password').html(data.split(';;')[1]);
        }
    });

    return false;
}

function disableSignInForm(val){
    $('#sign-in-email').attr('disabled', val);
    $('#sign-in-password').attr('disabled', val);
    if (val){
        $('#submit').css('cursor', 'default');
    }
    else{
        $('#submit').css('cursor', 'pointer');
    }
    $('#submit').attr('disabled', val);
}

function signUp(){
    var validForm = true;
    disableSignUpForm(true);
    $('#standard-sign-up-title').addClass('loading');
    $.post(BASE_URL+'user/signUp/validateFirstName/', {first_name: $('#first-name').val()}, function(data){
        $('#info-first-name').html(data);
        if (data.split('font').length > 1){
            validForm = false;
        }
        $.post(BASE_URL+'user/signUp/validateLastName/', {last_name: $('#last-name').val()}, function(data){
            $('#info-last-name').html(data);
            if (data.split('font').length > 1){
                validForm = false;
            }
            $.post(BASE_URL+'user/signUp/validateEmail/', {email: $('#email').val()}, function(data){
                $('#info-email').html(data);
                if (data.split('font').length > 1){
                    validForm = false;
                }
                $.post(BASE_URL+'user/signUp/validateConfirmEmail/', {email: $('#email').val(), confirm_email: $('#confirm-email').val()}, function(data){
                    $('#info-confirm-email').html(data);
                    if (data.split('font').length > 1){
                        validForm = false;
                    }
                    $.post(BASE_URL+'user/signUp/validatePassword/', {password: $('#password').val()}, function(data){
                        $('#info-password').html(data);
                        if (data.split('font').length > 1){
                            validForm = false;
                        }
                        $.post(BASE_URL+'user/signUp/validateConfirmPassword/', {password: $('#password').val(), confirm_password: $('#confirm-password').val()}, function(data){
                            $('#info-confirm-password').html(data);
                            if (data.split('font').length > 1){
                                validForm = false;
                            }
                            if (validForm){
                                $.post(BASE_URL+'user/signUp/submit/', {first_name: $('#first-name').val(),
                                                                        last_name: $('#last-name').val(),
                                                                        email: $('#email').val(),
                                                                        password: $('#password').val()}, function(data){
                                    $('#standard-sign-up-title').removeClass('loading');
                                    disableSignUpForm(false);
                                    window.location = BASE_URL+'user/sign-up/complete';
                                });
                            }
                            else{
                                $('#standard-sign-up-title').removeClass('loading');
                                disableSignUpForm(false);
                            }
                        });
                    });
                });
            });
        });
    });

    return false;
}

function disableSignUpForm(val){
    $('#first-name').attr('disabled', val);
    $('#last-name').attr('disabled', val);
    $('#email').attr('disabled', val);
    $('#confirm-email').attr('disabled', val);
    $('#password').attr('disabled', val);
    $('#confirm-password').attr('disabled', val);
    if (val){
        $('#submit').css('cursor', 'default');
    }
    else{
        $('#submit').css('cursor', 'pointer');
    }
    $('#submit').attr('disabled', val);
}