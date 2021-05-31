<?php

include ('../classes/SessionManage.php');

$SS = new SessionManage();

switch($_POST['OP'])
{
    case 'accountLogout':
        $SS -> destroySessionUser();
        exit; 
        break;
}


?>