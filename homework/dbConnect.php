<?php

    //act as a PDO connection between your PHP code and the MySQL database

    //we can use this on multiple pages. use the 'require' command to include on your page


$serverName = 'localhost';
$database = "wdv341";       //the name of the database you wish to access
$username = "root";         //the username to sign into your MySQL database on your localhost
$password = "";             //default password to sign on to your MySQL database on your localhost

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  //this will display if an error happens during connection
}


?>