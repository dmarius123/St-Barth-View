<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?=$admin_title?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/gui/css/login-style.css" />

        <script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
        <script type="text/JavaScript">
            var LOGIN_PROCESSING = "<?=$login_processing?>";
            var LOGIN_SUCCESS = "<?=$login_success?>";
            var LOGIN_UNSUCCESS = "<?=$login_unsuccess?>";
            var BASE_URL = "<?php echo base_url(); ?>";
        </script>
        <script type="text/JavaScript" src="<?php echo base_url(); ?>assets/backend/js/login.js"></script>
    </head>
    <body>

        <div id="wrapper">
            <div id="panel">
                <h1><?=$admin_title?></h1>
                <div id="form">
                    <form method="post" action="" onsubmit="return login()">
                        <div class="label first-child"><?=$login_email?></div>
                        <div class="input_container"><input type="text" name="email" id="email" class="input_style" value="" /></div>
                        <div class="label"><?=$login_password?></div>
                        <div class="input_container"><input type="password" name="password" id="password" class="input_style" value="" /></div>
                        <div class="input_container last-child" id="submit_btn"><input type="submit" name="submit" id="submit" class="submit_style" value="<?=$login_submit?>" /></div>
                    </form>
                </div>
            </div>
            <div id="info_container">
                <div id="info">
                    <div class="info_icon"><img src="<?php echo base_url(); ?>assets/backend/gui/images/info-icon.png" alt="" /></div>
                    <div class="info_message"><?=$login_info?></div>
                    <div class="info_spacer"></div>
                </div>
            </div>
        </div>

    </body>
</html>