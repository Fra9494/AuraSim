<?php

include ('../classes/Database.php');

$LA = new Database();
$_POST['FgpTxtU'] = addslashes($_POST['FgpTxtU']);


if($LA -> validateRegistration($_POST['FgpTxtU'],$_POST['FgpTxtM']) === 0)
{
    echo "<script>
            alert('Non-compliant email address !');
            window.location.href='../html/forgotPassword.php';
          </script>";
    exit;
}

if($LA -> validateRegistration($_POST['FgpTxtU'],$_POST['FgpTxtM']) === true)
{
    echo "<script>
            alert('No users registered with this information !');
            window.location.href='../html/forgotPassword.php';
          </script>";
    exit;
}
else
{
    if($LA ->  resetPassword($_POST['FgpTxtU'],$_POST['FgpTxtM'],$_POST['FgpTxtNP'])=== true)
    {
        echo "<script>
            alert('Password change successful !');
            window.location.href='../html/login.php';
          </script>";
        exit;
    }
    else
    {
        echo "<script>
            alert('Password change failed !');
            window.location.href='../html/forgotPassword.php';
          </script>";
        exit;
    }


}


?>