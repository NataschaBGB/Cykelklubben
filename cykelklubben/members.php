<head>
    <title>Cykelklubben | Medlemmer</title>
</head>

<?php
    include_once("header.php");
?>

<body>

    <main>

        <h1>Velkommen til medlemslisten!</h1>

        <?php
        
        $sql = "SELECT name FROM users;";
        $stmt = $conn->prepare($sql);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($resultData))
        {?>
            <h2 class="users">
                <?php echo $row['name'];?>
            </h2>
                <hr>
        <?php
        }
        ?>

    </main>

</body>

<?php
    include_once("footer.php");
?>

</html>