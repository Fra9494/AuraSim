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
        <link rel="stylesheet" type="text/css" media="screen" href="../css/registration.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/btn.css" />
        <script type="text/javascript" src="../js/app.js"></script>
    </head>

    <body>
        <div id="DivREG" class = "A_paragrapher" >
            <form id="FormREG" class="A_form" action="../code/registration_prg.php" method="post"> 
                <table class="table">
                    <tr>
                        <td><h2>Registration page</h2></td>
                    </tr>
                    <tr>
                        <td><input id="REGNAMTXT" type="text" name="RegTxtN" required="required" placeholder="Insert here your name" ></td>
                    </tr>
                    <tr>
                        <td><input id="REGSURTXT" type="text" name="RegTxtS" required="required" placeholder="Insert here your Surname" ></td>
                    </tr>
                    <tr>
                        <td><input id="REGUSRTXT" type="text" name="RegTxtU" required="required" placeholder="Insert here your Username" ></td>
                    </tr>
                    <tr>
                        <td><input id="REGPSWTXT" type="password" name="RegTxtP" required="required" placeholder="Insert here your Password" minlength="6" ></td>
                    </tr>
                    <tr>
                        <td><input id="REGMALTXT" type="text" name="RegTxtM" required="required" placeholder="Insert here your Mail" ></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="REGBTN" type="submit" class="btn" value="Register" >
                            <input id="REGBTN" type="button" class="btn" value="Reset field" onclick="location.reload();">
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><a href="login.php" style="text-decoration: none; color:#4583a0; font-weight: bold; font-style: Verdana; font-size: 10pt;">Back to login page</a></td>
                    </tr>
                    
                </table>
                
            </form>
        </div>
    </body>
</html>