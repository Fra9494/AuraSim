<?php

require '../classes/Database.php';
require '../config/cnf.php';
date_default_timezone_set($TIMEZONE);
setlocale(LC_ALL,$LANG);
session_start ();

$EN = new Database();
$EP = new ConnectionDB();
$OPP = 'USRMNG';

$dateTD = date('Y-m-d');

//Gett offers of CS type
$filter = $_SESSION['FILTER'][$OPP];


//Get users list
$txt = " SELECT * FROM $TABLEUSERS ";
if($filter !== '')
{
    $txt .= 'WHERE '.$filter;
}


$data = $EP->connectGetResult($txt);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="EN">
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title><?php echo $TITLE; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/usersMNG.css">
        <link rel="icon" href="<?php echo $LOGO_PATH; ?>"  type="image/icon type">
        <script type="text/javascript" src="../js/usersMNG.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script src = "../js/jquery.datetimepicker.js"></script> 
        <link rel="stylesheet" type = "text/css" href = "../css/jquery.datetimepicker.css"/>
    </head>
    <body>
        <div id="DPages_CS" class="pagesD">
            <div id="TR_INSERT" class="DIV_GES" name="DIV_GES">
                <table id=T_Insert class="TB_Ges" >
                    <tr><td style="color:#fff;"><b>Name</b></td><td style="width:290px;"><input id="i_name" name="i_field" type="text" style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Surname</b></td><td style="width:290px; "><input id="i_surname" name="i_field" type="text"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Username</b></td><td style="width:290px; "><input id="i_username" name="i_field" type="text"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Pssword</b></td><td style="width:290px; "><input id="i_psw" name="i_field" type="password"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Pssword repeat</b></td><td style="width:290px; "><input id="i_pswr" name="i_field" type="password"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Mail</b></td><td style="width:290px;"><input id="i_mail" type="text"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Last access</b></td><td style="width:290px; "><input id="i_last_access" type="text"  class="date" style="width:99%;" readonly></td></tr>
                    <tr>
                        <td style="color:#fff;"><b>Type</b></td><td style="width:90px; ">
                            <select id="i_type" style="width:99%;">
                                <option>U</option>
                                <option>A</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#fff;"><b>Status</b></td>
                        <td style="width:90px; ">
                            <select id="i_status" style="width:99%;">
                                <option>Y</option>
                                <option>N</option>
                            </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td><input type="button" value="Aggiungi" class="btnDIV" onclick='getTextFieldA("<?php echo $OPP; ?>");' style="width:100px;"></td>
                        <td style="color:#fff;"><input type="button" value="Chiudi" class="btnDIV" onclick="hideDiv('TR_INSERT');" style="width:100px;"></td>
                    </tr>

                </table>
            </div> 
            <div id="TR_SEARCH" class="DIV_GES" name="DIV_GES">
                <table id=T_Search class="TB_Ges" >
                    
                    <tr><td style="color:#fff;"><b>Name</b></td><td style="width:290px;"><input id="s_name" name="s_field" type="text" style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Surname</b></td><td style="width:290px; "><input id="s_surname" name="s_field" type="text"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Username</b></td><td style="width:290px; "><input id="s_username" name="s_field" type="text"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Mail</b></td><td style="width:290px; "><input id="s_mail" name="s_field" type="text"  style="width:99%;"></td></tr>
                    <tr><td style="color:#fff;"><b>Last access</b></td><td style="width:290px; "><input id="s_last_access" name="s_field" type="text" style="width:99%;"></td></tr>
                    <tr>
                        <td style="color:#fff;"><b>Type</b></td>            
                        <td style="width:90px; ">
                            <select id="s_type" name="s_field" style="width:100%;">
                                <option>U</option>
                                <option>A</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#fff;"><b>Status</b></td>        
                        <td style="width:90px;" >
                            <select id="s_status" name="s_field" style="width:100%;">
                                <option>Y</option>
                                <option>N</option>
                            </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td><input type="button" value="Search" class="btnDIV" onclick='getTextFieldB("<?php echo $OPP;?>","<?php echo $dateTD;?>");' style="width:100px;"></td>        
                        <td><input type="button" value="Close" class="btnDIV" onclick="hideDiv('TR_SEARCH');" style="width:100px;"></td>
                    </tr>
                </table>
            </div> 
            <div id="DIVHEAD" class="D_H">
                    <table id=T_PCS_head class="T_head_list">
                        <tr>
                        <td style="width:20px;"><img src='../docs/img/refresh.gif' style="width:20px; height:20px; border-radius: 2px; cursor:pointer; border:1pxsolid #FFF;" onclick="refreshSessionFilter('<?php echo $OPP; ?>');" title="Refresh users list"></td>
                        <td style="width:20px;"><img src='../docs/img/search15.gif' style="width:20px; height:20px; border-radius: 2px; cursor:pointer; border:1pxsolid #FFF;" onclick="hideDivMulti('DIV_GES');showDiv('TR_SEARCH');" title="Search user"></td>
                        <td style="width:20px;"><input type="button" value="+" onclick="hideDivMulti('DIV_GES');showDiv('TR_INSERT');" style="cursor:pointer;" title="Insert new record"></td>
                        <td style="width:160px; border:1px solid;">Name</td>
                        <td style="width:180px; border:1px solid;">Surname</td>
                        <td style="width:180px; border:1px solid;">Username</td>
                        <td style="width:185px; border:1px solid;">Mail</td>
                        <td style="width:185px; border:1px solid;">Password</td>
                        <td style="width:80px; border:1px solid;" >Type</td>
                        <td style="width:80px; border:1px solid;">Status</td>
                        </tr>
                    </table>
            </div>
            <div id="PCS_el" class="DIV_EL">
                <table id=T_PCS class="blueTable">
                    <?php
                                for ($i=0;$i<count($data);$i++) 
                                {
                                    
                                    echo "<tr >";
                                    echo "<td style='width:20px;   '  ><img id='Mod£".$data[$i]['id']."' src='../docs/img/edit-15.gif' name='btMod' style='cursor:pointer;  display:none; font-weight: bold;' onclick='getTextField(\"$OPP\",\"".$data[$i]['id']."\");hideDiv(\"Mod£".$data[$i]['id']."\");' title='Edit this record'></td>";
                                    echo "<td style='width:20px;  '><img  id='Del£".$data[$i]['id']."'  src='../docs/img/elimina-15.gif' style='cursor:pointer; ' title='Delete record' onclick='deleteRecord(\"$OPP\",\"".$data[$i]['id']."\");'></td>";
                                    echo "<td style='width:150px;'><input type='text' id='name£".$data[$i]['id']."'  name='textName' value='".$data[$i]['name']."' onclick='showDiv(\"Mod£".$data[$i]['id']."\");' ></td>";
                                    echo "<td style='width:150px;'><input type='text' id='surname£".$data[$i]['id']."'  name='textSurname' value='".$data[$i]['surname']."' onclick='showDiv(\"Mod£".$data[$i]['id']."\");' ></td>";
                                    echo "<td style='width:150px;'><input type='text' id='username£".$data[$i]['id']."' value='".$data[$i]['username']."' style='text-align:center;' name='textUsername' onclick='showDiv(\"Mod£".$data[$i]['id']."\");'   ></td>";
                                    echo "<td style='width:150px;'><input type='text' id='mail£".$data[$i]['id']."' value='".$data[$i]['mail']."' style='text-align:center;' name='textMail' onclick='showDiv(\"Mod£".$data[$i]['id']."\");' ></td>";
                                    echo "<td style='width:150px;'><input type='password' id='psw£".$data[$i]['id']."'  style='text-align:center;'name='textLastAccess' onclick='showDiv(\"Mod£".$data[$i]['id']."\");' ></td>";
                                    echo "<td style='width:80px;'>
                                                <select id='type£".$data[$i]['id']."' style='text-align:center; width:100%; ' name='textType' onchange='showDiv(\"Mod£".$data[$i]['id']."\");' >
                                                    <option>".$data[$i]['type']."</option>
                                                    <option>A</option>
                                                    <option>U</option>
                                                </select>
                                         </td>";
                                    echo "<td style='width:80px;'>
                                                <select id='status£".$data[$i]['id']."'  style='text-align:center; width:100%;' name='textStatus' onchange='showDiv(\"Mod£".$data[$i]['id']."\");'  >
                                                    <option>".$data[$i]['status']."</option>
                                                    <option>Y</option>
                                                    <option>N</option>
                                                </select>
                                          </td>";
                                    echo '</tr>';
                                }
                            
                        
                    ?>
                </table>
            </div> 
        </div>
       
        <script type="text/javascript">   
        $(function() 
            {
              $( ".date" ).datetimepicker({
               lang:'it'
               ,format:'Y-m-d'
               ,yearStart:<?php echo date('Y')-5;?>
               ,yearEnd:<?php echo date('Y');?>
               ,timepicker:false 
               ,closeOnDateSelect:true
               ,allowBlank:true
               });
            });

            //recall function for moove div
            //dragDiv('TR_INSERT');
            //dragDiv('TR_SEARCH');
        </script>     
    </body>
</html>
