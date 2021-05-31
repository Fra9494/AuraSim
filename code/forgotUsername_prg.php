<?php

include ('../classes/Database.php');

$LA = new Database();



if($LA -> validateRegistration($_POST['FguTxtNU'],$_POST['FguTxtM']) === 0)
{
    echo "<script>
            alert('Non-compliant email address !');
            window.location.href='../html/forgotPassword.php';
          </script>";
    exit;
}

if($LA -> validateRegistration($_POST['FguTxtNU'],$_POST['FguTxtM']) === true)
{
    echo "<script>
            alert('No users registered with this information !');
            window.location.href='../html/forgotPassword.php';
          </script>";
    exit;
}
else
{
    if($LA ->  resetUsername($_POST['FguTxtNU'],$_POST['FguTxtM'],$_POST['FguTxtP'])=== true)
    {
        echo "<script>
            alert('Username change successful !');
            window.location.href='../html/login.php';
          </script>";
        exit;
    }
    else
    {
        echo "<script>
            alert('Username change failed !');
            window.location.href='../html/forgotPassword.php';
          </script>";
        exit;
    }


}


?>