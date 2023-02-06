<?php

    if (isset($_POST["submit"])) {
        
        $email = $_POST["email"];
        $name = $_POST["name"];
        $pw = $_POST["pw"];
        $pwrepeat = $_POST["pwrepeat"];

        require_once "connection.inc.php";
        require_once "functions.inc.php";

        // if some inputs are empty
        if (emptyInputSignup($email, $name, $pw, $pwrepeat) !== false) {
            // send user back to the sign up page with an error message that says they forgot to write something in an input field
            header("Location: ../member-area.php?error=emptyinput");
            exit();
        }

        // if email is invalid
        if (invalidEmail($email) !== false) {
            // send user back to the sign up page with an error message
            header("Location: ../member-area.php?error=invalidemail");
            exit();
        }

        // if passwords doesnt match
        if (pwMatch($pw, $pwrepeat) !== false) {
            // send user back to the sign up page with an error message
            header("Location: ../member-area.php?error=passwordsdoesntmatch");
            exit();
        }

        // if username or email is invalid/ already exists
        if (emailExists($conn, $email) !== false) {
            // send user back to the sign up page with an error message
            header("Location: ../member-area.php?error=emailtaken");
            exit();
        }

        createUser($conn, $email, $name, $pw);

    }
    else {
        header("Location: ../member-area.php");
        // exit() to make sure the script stops
        exit();
    }