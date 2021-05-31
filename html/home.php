<?php
require '../config/cnf.php';
date_default_timezone_set($TIMEZONE);
setlocale(LC_ALL,$LANG);
session_start ();




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html lang="EN">
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title><?php echo $TITLE; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/home.css">
        <script type="text/javascript" src="../js/home.js"></script>
    </head>
   
    <body>
      <nav id='menu'>
        <ul>
          <li><a href='#' onclick="reloadPage();">Home</a></li>
          <li><a class='dropdown-arrow' href='http://'>Utility</a>
              <ul class='sub-menus'>
                <li><a href='http://'>Sub Menu 1</a></li>
                <li><a href='http://'>Sub Menu 2</a></li>
                <li><a href='http://'>Sub Menu 3</a></li>
                <li><a href='http://'>Sub Menu 4</a></li>
              </ul>
          </li>
          <li><a class='dropdown-arrow' href='http://'>Services</a>
              <ul class='sub-menus'>
                <li><a href='http://'>Sub Menu 1</a></li>
                <li><a href='http://'>Sub Menu 2</a></li>
                <li><a href='http://'>Sub Menu 3</a></li>
              </ul>
          </li>
          <li><a href='http://'>About</a></li>
          <li><a href='http://'>Contact Us</a></li>
        </ul>
        <div id="DivAccount" class="accountLogged" onclick="showDiv('vm');" >
            <?php
              echo '<b>'.strtoupper(substr($_SESSION['SRV']['SESSION']['CONNECTION']['NAME'],0,1)).strtoupper(substr($_SESSION['SRV']['SESSION']['CONNECTION']['SURNAME'],0,1)).'</b>';
            ?>
        </div>
        
      </nav>
      <div id="vm" class="vertical-menu" onmouseout="hideDiv('vm');">
                <a href='#' onclick="execAjax('',false,'accountLogout','','reloadPage','../html/login.php',false);"><b>Logout</b></a>
        </div>      
    </body>
</html>