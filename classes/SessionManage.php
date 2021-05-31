<?php


class SessionManage 
{
    public function setSessionLogin($username,$name,$surname)
    {
        $_SESSION['SRV']['SESSION']['CONNECTION']['USERNAME'] = $username;
        $_SESSION['SRV']['SESSION']['CONNECTION']['NAME'] = $name;
        $_SESSION['SRV']['SESSION']['CONNECTION']['SURNAME'] = $surname;
    }

    public function destroySessionUser()
    {

        $_SESSION['SRV']['SESSION']['CONNECTION']['USERNAME'] = '';
        $_SESSION['SRV']['SESSION']['CONNECTION']['NAME'] = '';
        $_SESSION['SRV']['SESSION']['CONNECTION']['SURNAME'] = '';
        session_destroy();
    }

    
    

}

?>