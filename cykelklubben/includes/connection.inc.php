<?php 
    $serverName = "localhost";
    $dbName = "cykelklubben";
    $dbusername = "root";
    $dbpassword = "";


    $conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbName);

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }
    // else {
    //     echo "YEAAAH MANN!!!";
    // }