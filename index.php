<?php

if (isset($_POST['submit'])) {
     function check_rechaptcha($response) {
        $siteKey = '6LeZcBwTAAAAALPVUDPtSLR4aF-eL9JnjJC4qNaT';
        $secret = '6LeZcBwTAAAAAJQgbO1KMeFRjXrvY75JxGzv9t2b';
        $lang = 'bn';

        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $_SERVER['REMOTE_ADDR']);

        if ($resp->isSuccess()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    include'autoload.php';
    $authantication = TRUE;
    if (isset($_POST['g-recaptcha-response'])) {
        $authantication = check_rechaptcha($_POST['g-recaptcha-response']);
    }
    if ($authantication == TRUE) {
       /* write your code here */
        echo"I am not a robot!";
    }else{
        echo"Invalid ReCaptcha";
    }

   

}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>

        <form action="index.php" method="POST">
            First name:<br>
            <input type="text" name="firstname">
            <br>
            Last name:<br>
            <input type="text" name="lastname">
            <br>
            <div class="g-recaptcha" data-sitekey="6LeZcBwTAAAAALPVUDPtSLR4aF-eL9JnjJC4qNaT"></div>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
  
    </body>
</html>
