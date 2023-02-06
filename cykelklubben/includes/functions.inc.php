<?php

    function emptyInputSignup($email, $name, $pw, $pwrepeat) {
        
        $result;

        if (empty($email) || empty($name) || empty($pw) || empty($pwrepeat)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        
        $result;
        // checks if email actually exists
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function pwMatch($pw, $pwrepeat) {
        
        $result;

        if ($pw !== $pwrepeat) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function emailExists($conn, $email) {
        
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../member-area.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $email, $name, $pw) {
        
        $sql = "INSERT INTO users (email, name, password) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../member-area.php?error=stmtfailed");
            exit();
        }

        $hashedPw = password_hash($pw, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "sss", $email, $name, $hashedPw);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../member-area.php?error=none");
    }

    // function updateUser($conn, $email, $name, $pw) {

    //     $currentUser = $_SESSION["id"];

    //     $sql = "UPDATE `users` SET
    //     `email`='$email',
    //     `name`='$name',
    //     `password`='$pw' WHERE id = '$currentUser";

    //     // if ($conn->query($sql) === TRUE) {
    //     //     echo "Record updated successfully";
    //     // } else {
    //     //     echo "Error updating record: " . $conn->error;
    //     // }

    //     $result = $conn->query($sql);

    //     $sql = "SELECT * FROM users WHERE id = '$currentUser'";

    //     if($result) {
    //     echo "cool";
    //     }
    //     else {
    //     echo "fuck";
    //     }

        // if (!mysqli_stmt_prepare($result, $sql)) {
        //     header("location: ../member-area.php?error=stmtfailed");
        //     exit();
        // }

        // $pwHashed = password_hash($pw, PASSWORD_DEFAULT);

        // mysqli_stmt_bind_param($result, "sss", $email, $name, $pwHashed);
        // mysqli_stmt_execute($result);
        // mysqli_stmt_close($result);

    //     header("location: ../member-area.php?error=none");
    // }

    function emptyInputLogin($email, $pw) {
        
        $result;

        if (empty($email) || empty($pw)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $email, $pw) {

        $emailExists = emailExists($conn, $email);

        if ($emailExists === false) {
            header("location: ../member-area.php?error=wrongemail");
            exit();
        }

        $pwHashed = $emailExists["password"];
        $checkPw = password_verify($pw, $pwHashed);

        if ($checkPw === false) {
            header("location: ../member-area.php?error=wrongpassword");
            exit();
        }
        else if ($checkPw === true) {
            session_start();
            $_SESSION["email"] = $emailExists["email"];
            $_SESSION["id"] = $emailExists["id"];
            $_SESSION["name"] = $emailExists["name"];
            header("location: ../member-area.php");
            exit();
        }

    }