<?php
require "../config/cnf.php";
include ('../classes/Database.php');
include ('../classes/SessionManage.php');
session_start ();

$EN = new ConnectionDB();
$LA = new Database();
$SS = new SessionManage();


/* Query of connection */
$pswSHA = hash('sha256',$_POST['LgnTxtP']);
$_POST['LgnTxtU'] = addslashes($_POST['LgnTxtU']);
$QQ = "SELECT * FROM $TABLEUSERS WHERE $FIELDUSERNAME = '".$_POST['LgnTxtU']."' AND $FIELDPASSWORD = '".$pswSHA."' AND $FIELDSTATUS = 'Y'";


if(mysqli_num_rows($EN->connectSetInsert($QQ))>0)
{
    
    $LA -> lastAccess($_POST['LgnTxtU']);
    $UsersInfo = explode('-', $LA -> getUsersInfo($_POST['LgnTxtU']));
    $SS -> setSessionLogin($_POST['LgnTxtU'],$UsersInfo[0],$UsersInfo[1]);
    header("Location: ../html/home.php");
    
}
else
{
    
    echo "<script>
            alert('Wrong Username/Password incorrect or account is disabled !');
            window.location.href='../html/login.php';
          </script>";
    
    exit;
}






?>