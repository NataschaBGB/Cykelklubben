<!-- <?php

    // session_start();
    // include_once("connection.inc.php");
    // include_once("functions.inc.php");

    // if (isset($_POST["submit"])) {

    //     $email = $_POST["email"];
    //     $name = $_POST["name"];
    //     $pw = $_POST["pw"];
    //     $pwrepeat = $_POST["pwrepeat"];
    //     $pwOld = $_POST["pwOld"];

        // $currentUser = $_SESSION["id"];

        // $sql = "UPDATE `users` SET
        // `email`='$email',
        // `name`='$name' WHERE id = '$currentUser'";


        // $sql->bind_param('ss', $name, $email, $password);
        // $sql->execute();


        // // if some inputs are empty
        // if (emptyInputSignup($email, $name, $pw, $pwrepeat) !== false) {
        //     // send user back to the sign up page with an error message that says they forgot to write something in an input field
        //     header("Location: ../member-area.php?error=emptyinput");
        //     exit();
        // }
        
        // // if email is invalid
        // if (invalidEmail($email) !== false) {
        //     // send user back to the sign up page with an error message
        //     header("Location: ../member-area.php?error=invalidemail");
        //     exit();
        // }
        
        // // if passwords doesnt match
        // if (pwMatch($pw, $pwrepeat) !== false) {
        //     // send user back to the sign up page with an error message
        //     header("Location: ../member-area.php?error=passwordsdoesntmatch");
        //     exit();
        // }
    

        // header("location: ../member-area.php?error=none");

        // updateUser($conn, $email, $name, $pw);
    // }
    // else {
    //     header('location: ../member-area.php');
    //     exit();
    // }