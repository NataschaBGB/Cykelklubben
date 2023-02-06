<?php

    if (isset($_POST["submit"])) {
        
        $email = $_POST["email"];
        $pw = $_POST["pw"];

        include_once("connection.inc.php");
        include_once("functions.inc.php");

        if (emptyInputLogin($email, $pw) !== false) {
            // send user back to the login page with an error message that says they forgot to write something in an input field
            header("location: ../member-area.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $email, $pw);

    }

    else {
        header('location: ../member-area.php');
        exit();
    }