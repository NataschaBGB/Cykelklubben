<?php
session_start();
    include_once("includes/connection.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cykelklubben | Forside</title>
</head>

<body>
    
    <header>
            <img src="img/logo.jpg" alt="Super Cyklisterne Logo">

        <nav>
            <ul>
                <a href="index.php"><li></li>Forside</a>
                <a href="members.php"><li></li>Medlemmer</a>
                <a href="the-club.php"><li></li>Om Klubben</a>
                <a href="member-area.php"><li></li>Medlemsområde</a>
                <?php
                    if (isset($_SESSION["email"])) {
                        echo "<a href='includes/logout.inc.php' class='logoutbtn'><li>Log ud</li></a>";
                    }
                ?>
            </ul>
        </nav>
    </header>

</body>