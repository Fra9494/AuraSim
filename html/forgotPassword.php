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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/forgotPassword.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/btn.css" />
        <link rel="icon" href="<?php echo $LOGO_PATH; ?>"  type="image/icon type">
        <script type="text/javascript" src="../js/app.js"></script>
    </head>

    <body>
        <div id="DivFGP" class = "A_paragrapher" >
            <form id="FormFGP" class="A_form" action="../code/forgotPassword_prg.php" method="post"> 
                <table class="table">
                    <tr>
                        <td><h2>Forgot Password page</h2></td>
                    </tr>
                    <tr>
                        <td><input id="FGPUSRTXT" type="text" name="FgpTxtU" required="required" placeholder="Insert here your username" ></td>
                    </tr>
                    <tr>
                        <td><input id="FGPMALTXT" type="text" name="FgpTxtM" required="required" placeholder="Insert here your mail" ></td>
                    </tr>
                    <tr>
                        <td><input id="FGPNPSTXT" type="password" name="FgpTxtNP" required="required" placeholder="Insert here your new password" minlength="6"></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="FGPBTN" type="submit" class="btn" value="Change Password" >
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><a href="login.php" style="text-decoration: none; color:#636363; font-weight: bold; font-style: Verdana; font-size: 10pt;">Back to login page</a></td>
                    </tr>
                </table>
                
            </form>
        </div>
    </body>
</html>