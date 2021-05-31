<?php
require '../env/env.php';
session_start ();
class DecriptionPsw
{
    
    public function DECPSWDB()
    {
        include '../config/cnf.php';
        $string = Array();
        global $C;

        if(strtolower($TIPECONNECTION) === 'mysql')
        {
            $C = 0;
            $GstringPsw = "";
            for($i=0;$i<$LENPSWDB;$i++)
            {
                $string[$i] = substr($_SESSION['CONN']['SRV']['MYSQL']['PSW'],$C,1);
                $C = $C + 10;
                $GstringPsw .= $string[$i];

            }

            return $GstringPsw;
        }

        if(strtolower($TIPECONNECTION) === 'mssql')
        {
            $C = 0;
            for($i=0;$i<$LENPSWDB;$i++)
            {
                $string[$i] = substr($_SESSION['CONN']['SRV']['MSSQL']['PSW'],$C,1);
                $C = $C + 10;
                $GstringPsw .= $string[$i];
            }

            return $GstringPsw;
        }

    }

}


?>