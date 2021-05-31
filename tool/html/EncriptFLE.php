<?php
require '../../config/cnf.php';
date_default_timezone_set($TIMEZONE);
setlocale(LC_ALL,$LANG);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="EN">
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title><?php echo $TITLE; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/app.css" />
        <script type="text/javascript" src="../js/app.js"></script>
    </head>

    <body>
        <div id="DivEnPsw" class = "A_paragrapher" >
            <form id="FormEnPsw" class="A_form" action="../prg/EncriptFLE_prg.php" method="post"> 
                <table class="table">
                    <tr>
                        <td><h3>Conversion password to FLE</h3></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td><input id="EnPswTXT" type="password" name="Password" required="required" placeholder="Insert here your Password ASCII" ></td>
                    </tr>
                    <tr>
                        <td><input id="EnPswBTN" type="submit" class="btn" value="Convert" ></td>
                    </tr>
                </table>
                
            </form>
        </div>
    </body>
</html>