<?php
include ('DecriptionPsw.php');

class ConnectionDB 
{
    
    public function connectSetInsert($query_src)
    {
        
        require "../env/env.php";
        include ("../config/cnf.php");
        $DecriptionPsw = new DecriptionPsw();

        
        switch(strtolower($TIPECONNECTION))
        {
            case 'mysql':
                 
                $tr = $DecriptionPsw -> DECPSWDB($_SESSION['CONN']['SRV']['MYSQL']['PSW']);
                $connessione = mysqli_connect($_SESSION['CONN']['SRV']['MYSQL']['HOST'], $_SESSION['CONN']['SRV']['MYSQL']['USER'], $tr, $_SESSION['CONN']['SRV']['MYSQL']['DB']) or die("Error in database selection !");
                
                // Check connection
                if($connessione -> connect_errno) 
                {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }
    
                mysqli_set_charset($connessione,$_SESSION['CONN']['SRV']['MYSQL']['CHARSET']);
                mysqli_query($connessione, "SET NAMES utf8");
                mysqli_query($connessione, "SET character_set_results='utf8'");
                

                $_SESSION['CONNECTION']['LOCAL'] = $connessione; 
                $query = mysqli_query($connessione, $query_src, MYSQLI_STORE_RESULT);
                return $query;
                break;
            
                
            case 'mssql':
                $tr = $DecriptionPsw -> DECPSWDB($_SESSION['CONN']['SRV']['MSSQL']['PSW']);
                $connectionInfo = array( "Database"=>$_SESSION['CONN']['SRV']['MSSQL']['DB'], "UID"=>$_SESSION['CONN']['SRV']['MSSQL']['USER'], "PWD"=>$tr);
                $conn = sqlsrv_connect($_SESSION['CONN']['SRV']['MSSQL']['HOST'], $connectionInfo);

                if (!$conn) 
                    {
                        echo "Connection could not be established.<br />";
                        die(print_r(sqlsrv_errors(), true));
                        return;
                    }

    
                $result_count_res = sqlsrv_query
                    (
                            $conn,
                            $query_src ,
                            [],
                            [ "Scrollable" => SQLSRV_CURSOR_KEYSET ]
                    ) or die("Query didn't work.");

                $data = [];
                $result_num = false;

                if ($result_count_res !== false) 
                {
                    // Set num rows
                    $result_num = sqlsrv_num_rows($result_count_res);
                }

                if ($result_num) 
                {
                    // run another query to retrive results
                    $result_res = sqlsrv_query
                    (
                        $conn,
                        $query_src,
                        [],
                        [ "Scrollable" => SQLSRV_CURSOR_FORWARD ]
                    );

    

                    if ($result_res === false) 
                    {
                        // get errors from query
                        die(print_r(sqlsrv_errors(), true));
                    } 
                    else 
                    {
                        // run through "for" loop to retrive all results
                        for ($i = 0; $i < $result_num; $i++)
                        {
                            $data[] = sqlsrv_fetch_array($result_res, SQLSRV_FETCH_ASSOC);
                        }
                    }

                    sqlsrv_free_stmt($result_res);
                } 

                return $data; 
                break;
            
                default: 'No connection configured';

        }
        
    }

    public function connectGetResult($query_src)
    {
        
        require "../env/env.php";
        include ("../config/cnf.php");
        $DecriptionPsw = new DecriptionPsw();

        switch (strtolower($TIPECONNECTION)) 
        {
            case 'mysql':
                $tr = $DecriptionPsw -> DECPSWDB($_SESSION['CONN']['SRV']['MYSQL']['PSW']);
                $connessione = mysqli_connect($_SESSION['CONN']['SRV']['MYSQL']['HOST'], $_SESSION['CONN']['SRV']['MYSQL']['USER'], $tr, $_SESSION['CONN']['SRV']['MYSQL']['DB']) or die("Error in database selection !");
                
                // Check connection
                if ($connessione -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }
    
                mysqli_set_charset($connessione, $_SESSION['CONN']['SRV']['MYSQL']['CHARSET']);
                mysqli_query($connessione, "SET NAMES utf8");
                mysqli_query($connessione, "SET character_set_results='utf8'");
               
                
                $_SESSION['CONNECTION']['LOCAL'] = $connessione;
                $query = mysqli_query($connessione, $query_src, MYSQLI_STORE_RESULT);
                while ($row = mysqli_fetch_array($query)) {
                    $rows[] = $row;
                }
                mysqli_close($connessione);
                return $rows;
                break;

            case 'mssql':
                    $tr = $DecriptionPsw -> DECPSWDB($_SESSION['CONN']['SRV']['MSSQL']['PSW']);
                    $connectionInfo = array( "Database"=>$_SESSION['CONN']['SRV']['MSSQL']['DB'], "UID"=>$_SESSION['CONN']['SRV']['MSSQL']['USER'], "PWD"=>$tr);
                    $conn = sqlsrv_connect($_SESSION['CONN']['SRV']['MSSQL']['HOST'], $connectionInfo);
    
                    if (!$conn) {
                        echo "Connection could not be established.<br />";
                        die(print_r(sqlsrv_errors(), true));
                        return;
                    }
    
        
                    $result_count_res = sqlsrv_query(
                            $conn,
                            $query_src,
                            [],
                            [ "Scrollable" => SQLSRV_CURSOR_KEYSET ]
                        ) or die("Query didn't work.");
    
                    $data = [];
                    $result_num = false;
    
                    if ($result_count_res !== false) {
                        // Set num rows
                        $result_num = sqlsrv_num_rows($result_count_res);
                    }
    
                    if ($result_num) {
                        // run another query to retrive results
                        $result_res = sqlsrv_query(
                            $conn,
                            $query_src,
                            [],
                            [ "Scrollable" => SQLSRV_CURSOR_FORWARD ]
                        );
    
        
    
                        if ($result_res === false) {
                            // get errors from query
                            die(print_r(sqlsrv_errors(), true));
                        } else {
                            // run through "for" loop to retrive all results
                            for ($i = 0; $i < $result_num; $i++) {
                                $data[] = sqlsrv_fetch_array($result_res, SQLSRV_FETCH_ASSOC);
                            }
                        }
    
                        sqlsrv_free_stmt($result_res);
                    }
    
                    return $data;
                    break;
                
              
        }
    }
}

?>