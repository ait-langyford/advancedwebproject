<?php

    // make db connection
    $db_host = "localhost";
    $db_userName = "langyford";
    $db_password = "";
    $db_name = "PedalDistrict";
    
    $dbconnection = mysqli_connect($db_host, $db_userName, $db_password, $db_name);
    
    // check connection to db
    if (!$dbconnection) {
        
        echo "error connecting to database";
        
    }
    else {
        
        echo "successfully connected to database";
        
    }
    
?>