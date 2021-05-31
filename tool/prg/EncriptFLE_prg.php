<?php
require '../classes/Encription.php';

$EN = new Encription();
$EN -> ENPswDBFLEPP($_POST['Password']);

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
        <div id="DivEnPswGEN" class = "A_paragrapher" >
                <table class="table">
                    <tr>
                        <td><h3>Result converted Password</h3></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                Your converted password has been generated.<br>
                                Press the copy key to copy and paste it into the "env / env.php" file.<bR>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="textPSWGEN" value="<?php echo $EN -> ENPswDBFLEPP($_POST['Password']); ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><input id="EnPswBTNGEN" type="submit" class="btn" value="Copy" onclick="copyPSW('textPSWGEN');" ></td>
                    </tr>
                </table>
        </div>
    </body>
</html>





