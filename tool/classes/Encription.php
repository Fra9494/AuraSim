<?php

class Encription 
{
    function RandomStringPP()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    function ENPswDBFLEPP($psw) 
    {
        $RS = $this -> RandomStringPP();
        $PSWString = Array();
        global $MString;
        for($i=0;$i<strlen($psw);$i++)
        {
            $PSWString[$i] = $psw[$i].$RS;
        }

        for($i=0;$i<count($PSWString);$i++)
        {
            $MString .= $PSWString[$i];
        }

        return $MString;
    }
}

?>