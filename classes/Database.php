<?php

include ('ConnectionDB.php');

class Database 
{
    public function lastAccess($username)
    {
        require "../env/env.php";
        require "../config/cnf.php";
        $EN = new ConnectionDB();
        $date = date('Y-m-d');
        $queryLastAccess = "UPDATE $TABLEUSERS SET $FIELDLACCESS = '$date' WHERE $FIELDUSERNAME = '$username'";
        $EN -> connectSetInsert($queryLastAccess);
        
    }

    public function Registration($name,$surname,$username,$password,$mail)
    {
        require "../env/env.php";
        require "../config/cnf.php";
        $EN = new ConnectionDB();

        switch (strtolower($TIPECONNECTION)) 
        {
            case 'mysql':
                //Check Last ID in the table
                $ClastID = "SELECT $FIELDID FROM $TABLEUSERS ORDER BY $FIELDID DESC LIMIT 1";
                $rt = mysqli_fetch_assoc($EN -> connectSetInsert($ClastID));
                $id = $rt[$FIELDID] + 1;

                //Sha256 password
                $pswSHA = hash('sha256',$password);
                //data
                $date = date('Y-m-d');
                $insertUser = " INSERT INTO $TABLEUSERS($FIELDID,$FIELDNAME,$FIELDSURNAME,$FIELDUSERNAME,$FIELDPASSWORD,$FIELDMAIL,$FIELDLACCESS,$FIELDTYPEUSER,$FIELDSTATUS)
                                VALUES('$id','$name','$surname','$username','$pswSHA','$mail','$date','U','Y')";
                
                if($EN -> connectSetInsert($insertUser))
                {
                    return true;
                }
                else
                {
                    return false;
                };break;


            case 'mssql':
                //Check Last ID in the table
                $ClastID = "SELECT TOP 1 $FIELDID FROM $TABLEUSERS ORDER BY $FIELDID DESC ";
                $rt = $EN -> connectSetInsert($ClastID);
                $id = $rt[$FIELDID] + 1;

                //Sha256 password
                $pswSHA = hash('sha256',$password);
                //data
                $date = date('Y-m-d');
                $insertUser = " INSERT INTO $TABLEUSERS($FIELDID,$FIELDNAME,$FIELDSURNAME,$FIELDUSERNAME,$FIELDPASSWORD,$FIELDMAIL,$FIELDLACCESS,$FIELDTYPEUSER,$FIELDSTATUS)
                                VALUES('$id','$name','$surname','$username','$pswSHA','$mail','$date','U','Y')";
                
                if($EN -> connectSetInsert($insertUser))
                {
                    return true;
                }
                else
                {
                    return false;
                };break;
            
        }
    }

    public function validateRegistration($username,$mail)
    {
        require "../env/env.php";
        require "../config/cnf.php";
        $EN = new ConnectionDB();
        if(strpos($mail,'@') === false)
        {
            return 0;
        }

        switch (strtolower($TIPECONNECTION)) 
        {
            case 'mysql':

                $CHECK = "SELECT * FROM $TABLEUSERS WHERE $FIELDUSERNAME = '$username' OR $FIELDMAIL = '$mail'";
                
                if(mysqli_num_rows($EN -> connectSetInsert($CHECK))>0)
                    {
                        
                        return false;
                    }
                    else
                    {
                        return true;
                    }; break;

            case 'mssql':
                $CHECK = "SELECT * FROM $TABLEUSERS WHERE $FIELDUSERNAME = '$username' OR $FIELDMAIL = '$mail'";
                if(count($EN -> connectSetInsert($CHECK))>0)
                    {
                        return false;
                    }
                    else
                    {
                        return true;
                    }; break;
            
        }
        
    }

    public function resetPassword($username,$mail,$password)
    {
        require "../env/env.php";
        require "../config/cnf.php";
        $EN = new ConnectionDB();

        $pswSHA = hash('sha256',$password);
        $ClastID = "UPDATE $TABLEUSERS SET $FIELDPASSWORD = '$pswSHA' WHERE $FIELDUSERNAME = '$username' AND $FIELDMAIL = '$mail'";
                
        if($EN -> connectSetInsert($ClastID))
            {
                return true;
            }
        else
            {
                return false;
            }   


            
        
    }

    public function resetUsername($username,$mail,$password)
    {
        require "../env/env.php";
        require "../config/cnf.php";
        $EN = new ConnectionDB();
        
        $pswSHA = hash('sha256',$password);
        $ClastID = "UPDATE $TABLEUSERS SET $FIELDUSERNAME = '$username' WHERE $FIELDMAIL = '$mail' AND $FIELDPASSWORD = '$pswSHA'";
                
        if($EN -> connectSetInsert($ClastID))
            {
                return true;
            }
        else
            {
                return false;
            }   


            
        
    }

    
    public function getUsersInfo($username)
    {
        require "../env/env.php";
        require "../config/cnf.php";
        $EN = new ConnectionDB();

        $ClastID = "SELECT $FIELDNAME,$FIELDSURNAME FROM $TABLEUSERS WHERE $FIELDUSERNAME = '$username'";
        
        $rt = $EN-> connectGetResult($ClastID);

        for($i=0;$i<count($rt);$i++)
        {
            $rg = $rt[$i][$FIELDNAME] .'-'.$rt[$i][$FIELDSURNAME];
        }

        return $rg;

        
        

        
    }
    
}

?>