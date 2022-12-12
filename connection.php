<?php      
    $dbhost = "localhost";  
    $dbuser = "root";  
    $dbpass = 'root';  
    $dbname = "AZ_clients";  
      
    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
    {
    
        die("failed to connect!");
    }