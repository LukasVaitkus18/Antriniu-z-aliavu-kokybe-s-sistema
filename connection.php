<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "AZ_clients";  
      
    $conn = new mysqli($host, $user, $password, $db_name);  
    if($conn->connect_error) {  
        die("Failed to connect with MySQL: ". $conn->connect_error);  
    }  
    echo "Connected successfully";
?>  