
    <ul id="header-navigation">
        <li><?=$header_welcome?>, <?=$first_name?> <?=$last_name?></li>
        <li class="separator">&nbsp;</li>
        <li><?=anchor('user/sign-out/', $header_sign_out)?></li>
        <li class="clear" />
    </ul>
    <script type="text/JavaScript" src="http://connect.facebook.net/<?=$facebook_language?>/all.js"></script>
    <script type="text/JavaScript">
        window.fbAsyncInit = function(){
            FB.init({appId:'148099351923386', status:true, cookie:true, xfbml:true});
        };
        //FB.logout();
    </script>