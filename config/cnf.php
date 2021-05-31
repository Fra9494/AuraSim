<?php

    /******** Head information ********/

        $TITLE = 'Aurasim';
        $LOGO_PATH ='/img/logo.png';
        $TIMEZONE = 'Europe/Rome';
        $LANG = 'IT';
        $LENPSWDB = '8'; //Database password length
    
    /**********************************/



    /******** DB information ********/
    
        $TIPECONNECTION = 'mysql';

        /*** {Users Table} ***/

            //Users table: create this table with the fields in this order
            $TABLEUSERS = 'TBUSERS'; //name of users table

        /* [FIELD] */
            $FIELDID = 'id'; //ID of record {INT}
            $FIELDNAME = 'name'; //Name user {TEXT}
            $FIELDSURNAME = 'surname'; //Surname user {TEXT}
            $FIELDUSERNAME = 'username'; //Username user {TEXT}
            $FIELDPASSWORD = 'psw'; //Password user {TEXT}
            $FIELDMAIL = 'mail'; //Mail user {TEXT}
            $FIELDLACCESS = 'last_access'; //Date of last access user {DATE}
            $FIELDTYPEUSER = 'type'; //User's type {VARCHAR length=1} -> default value="U or A"
            $FIELDSTATUS = 'status'; //User's status (enabled or disabled) {VARCHAR length=1} -> default value="Y or N"

        /*******/


?>