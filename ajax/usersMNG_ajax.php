<?php

include ('../classes/Database.php');
require '../config/cnf.php';
date_default_timezone_set($TIMEZONE);
setlocale(LC_ALL,$LANG);
header( 'content-type: text/html; charset=utf-8' );

$EN = new Database();
$SS = new ConnectionDB();



switch ($_POST['action']) 
{

    case 'SAVE':
            $par = explode("|",$_POST['param']);
            $psw = hash("sha256",$par[5]);
            $txt = " UPDATE $TABLEUSERS  
                      SET name = '$par[1]',
                         surname = '$par[2]',
                         username = '$par[3]',
                         mail = '$par[4]'";
            if($par[5] !== '')
            {
                $txt .= ",psw = '$psw '";
            }
               $txt .= " ,type = '$par[6]',
                         status = '$par[7]'
                     WHERE id = '$par[0]'";

             if($SS -> connectSetInsert($txt))
             {
                 echo 'Successful Insertion !';
             }   
             else
             {
                echo 'Insert failed ! '.$txt;
             };break;


    case 'INSERTREC':
        $par = explode("|",$_POST['param']);
        //Get last id insert
        $txt = "SELECT id FROM $TABLEUSERS ORDER BY id DESC LIMIT 1";
        $rt = $SS -> connectGetResult($txt);
        for($i=0;$i<count($rt);$i++)
        {
            $id = $rt[$i]['id'];
        }
        $id = $id + 1;
        
        $psw = hash("sha256",$par[4]);
        $date = date('Y-m-d');
        $tins = "INSERT INTO $TABLEUSERS VALUES('$id','$par[0]','$par[1]','$par[2]','$psw','$par[3]','$date','$par[5]','$par[6]')";

        
        if($SS -> connectSetInsert($tins))
        {
            echo 'Successful insertion !';
        }
        else
        {
            echo 'Insert failed !';
        };
        break;
    
    case 'GSESSION':
        //Check if the query result is not null
        $txt = "SELECT * FROM $TABLEUSERS  ";
        if($_POST['param'] !== '')
        {
            $txt .= ' WHERE '.$_POST['param'];
        }
        
        $result = $SS->connectGetResult($txt);
        if(count($result) > 0)
        {
            $_SESSION['FILTER'][$_POST['OP']] = $_POST['param']; 
        }
        else
        {
            echo 'RTNULL';
        };
        break;
    
    case 'REFSESSION':
        $_SESSION['FILTER'][$_POST['OP']] = '';
        break;
    case 'DELETEREC': 
        $txt = "DELETE FROM $TABLEUSERS WHERE id = '".$_POST['param']."'";
        if($SS -> connectSetInsert($txt))
        {
            echo 'Successful deletion !';
        }
        else
        {
            echo 'Cancellation failed !';
        };
        break;
        









}   


?>