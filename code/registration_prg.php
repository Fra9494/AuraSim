<?php
include ('../classes/Database.php');


$LA = new Database();

//Validate registration
if($LA -> validateRegistration($_POST['RegTxtU'],$_POST['RegTxtM']) === 0)
{
    echo "<script>
            alert('Non-compliant email address !');
            window.location.href='../html/registration.php';
          </script>";
    exit;
}

if($LA -> validateRegistration($_POST['RegTxtU'],$_POST['RegTxtM']) === false)
{
    echo "<script>
            alert('Username or email already registered !');
            window.location.href='../html/registration.php';
          </script>";
    exit;
}
else
{
    if($LA -> registration($_POST['RegTxtN'],$_POST['RegTxtS'],$_POST['RegTxtU'],$_POST['RegTxtP'],$_POST['RegTxtM'])===true)
    {
        echo "<script>
            alert('User registration successful !');
            window.location.href='../html/login.php';
          </script>";
        exit;
    }
    else
    {
        echo "<script>
            alert('User registration failed !');
            window.location.href='../html/registration.php';
          </script>";
        exit;        
    }

}





?>