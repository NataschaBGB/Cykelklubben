<?php

session_start();
    include_once("connection.inc.php");
    // include_once("functions.inc.php");

    $currentUser = $_SESSION["id"];
    echo $_SESSION["id"];

    $sql = "UPDATE `users` SET
    `email`='sniper',
    `name`='Tommy Jørgensen',
    `password`='1234' WHERE id = '$currentUser'";

    $result = $conn->query($sql);