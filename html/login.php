<?php
require '../config/cnf.php';
date_default_timezone_set($TIMEZONE);
setlocale(LC_ALL,$LANG);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="EN">
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title><?php echo $TITLE; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/login.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/btn.css" />
        <script type="text/javascript" src="../js/app.js"></script>
    </head>

    <body>
        <div id="DivLGN" class = "A_paragrapher" >
            <form id="FormLGN" class="A_form" action="../code/login_prg.php" method="post"> 
                <table class="table">
                    <tr>
                        <td><h2>Login page</h2></td>
                    </tr>
                    <tr>
                        <td><input id="LGNUSRTXT" type="text" name="LgnTxtU" required="required" placeholder="Insert here your username" ></td>
                    </tr>
                    <tr>
                        <td><input id="LGNPSWTXT" type="password" name="LgnTxtP" required="required" placeholder="Insert here your password" ></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="LGNBTN" type="submit" value="Login" >
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><a href="forgotPassword.php" style="text-decoration: none; color:#636363; font-weight: bold; font-style: Verdana; font-size: 10pt;">Forgot your Password?</a></td>
                    </tr>
                    <tr>
                        <td><a href="forgotUsername.php" style="text-decoration: none; color:#636363; font-weight: bold; font-style: Verdana; font-size: 10pt;">Forgot your Username?</a></td>
                    </tr>
                    <tr>
                        <td><a href="registration.php" style="text-decoration: none; color:#636363; font-weight: bold; font-style: Verdana; font-size: 10pt;">If you are not registered click here</a></td>
                    </tr>
                </table>
                
            </form>
        </div>
    </body>
</html>