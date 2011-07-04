<?php

    if (isset($_POST['submit'])){
        echo 'SMS SENT: '.file_get_contents('http://api.clickatell.com/http/sendmsg?user=okleyz&password=savannah_1&api_id=3316941&to='.$_POST['to'].'&text='.$_POST['text']).'<br /><br />';
    }

?>


<form method="POST" action="">
    <label for="to">Phone</label> <input type="text" name="to" value="" /><br />
    <label for="text">Code</label><input type="text" name="text" value="" /><br />
    <input type="submit" name="submit" value="Send SMS" />
</form>