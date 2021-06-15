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
        <link rel="icon" href="<?php echo $LOGO_PATH; ?>" type="image/icon type">
        <script type="text/javascript" src="../js/home.js"></script>
    </head>
   
    <body>
      <nav id='menu'>
      
        <ul>
          <?php
            if( $LOGO_PATH !== '')
            {
              echo "<li>
                      <img src='$LOGO_PATH' width='$LOGO_WIDTH' height='$LOGO_HEIGHT' style='margin-top: $LOGO_MARGINTOP;'>";
              echo "  <span id='spanSpace' width='50px;'></span>
                    </li>";
            }
          ?>
          <li><a href="#" onclick="reloadPage('home.php');">Home</a></li>
          <li><a class='dropdown-arrow' href="#">Utility</a>
              <ul class='sub-menus'>
                <li><a href="#">Sub Menu 1</a></li>
                <li><a href="#">Sub Menu 2</a></li>
                <li><a href="#">Sub Menu 3</a></li>
                <li><a href="#">Sub Menu 4</a></li>
              </ul>
          </li>
          <li><a class='dropdown-arrow' href="#">Services</a>
              <ul class='sub-menus'>
                <li><a href="#" onclick="loadDIV('usersManagement.php','pages');">Users Management</a></li>
                <li><a href="#" >Sub Menu 2</a></li>
                <li><a href="#" >Sub Menu 3</a></li>
              </ul>
          </li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        <div id="DivAccount" class="accountLogged" onclick="showDiv('vm'); setOpacity('pages','0,5');" >
            <?php
              echo '<b>'.strtoupper(substr($_SESSION['SRV']['SESSION']['CONNECTION']['NAME'],0,1)).strtoupper(substr($_SESSION['SRV']['SESSION']['CONNECTION']['SURNAME'],0,1)).'</b>';
            ?>
        </div>
        
      </nav>
      <div id="vm" class="vertical-menu" onmouseout="hideDiv('vm');">
                <a href='#' onclick="execAjax('',false,'accountLogout','','reloadPage','../html/login.php',false);">Logout</a>
      </div>
        <iframe id="pages" 
            style="position:absolute;
            width:90%; 
            height: 85%; 
            left:5%;
            top:14%; 
            opacity:1;" frameborder="0">
            
        </iframe>      
    </body>
</html>