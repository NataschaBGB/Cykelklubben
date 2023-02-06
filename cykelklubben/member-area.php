<head>
    <title>Cykelklubben | Medlemsområde</title>
</head>

<?php
    include_once("header.php");
?>

<body>

    <main>

        <?php
            if(isset($_SESSION['id'])) {

                $currentUser = $_SESSION['id'];
                $sql = "SELECT * FROM users WHERE id = '$currentUser'";

                $results = mysqli_query($conn, $sql);

                if($results) {
                    if(mysqli_num_rows($results)>0) {
                        while($row = mysqli_fetch_array($results)) { ?>

                            <h1>Velkommen <?php echo $row["name"] ?></h1>

                            <div class="forms">

                                <?php
                                    $currentUser = $_SESSION['id'];
                                    $sql = "SELECT * FROM users WHERE id = '$currentUser'";

                                    $results = mysqli_query($conn, $sql);

                                    if ($results) {
                                        if (mysqli_num_rows($results) > 0) {
                                            while ($row = mysqli_fetch_array($results)) { ?>
                                                    <div class="edit">
                                                        <form action="includes/update.inc.php" method="post">
                                                            <h3>Ret dine brugeroplysninger</h3>

                                                            <div class="inputs">
                                                                <label for="email">Din email</label>
                                                                <div class="input">
                                                                    <input type="text" name="email" value="<?php echo $row['email']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="inputs">
                                                                <label>Dit navn</label>
                                                                <div class="input">
                                                                    <input type="text" name="name" value="<?php echo $row['name']; ?>">
                                                                </div>
                                                            </div>
                                                    
                                                            <!-- <div class="inputs">
                                                                <label for="password">Nyt kodeord</label>
                                                                <div class="input">
                                                                    <input type="password" name="pw" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="inputs">
                                                                <label for="password">Gentag nyt kodeord</label>
                                                                <div class="input">
                                                                    <input type="password" name="pwrepeat" required>
                                                                </div>
                                                            </div>

                                                            <div class="inputs">
                                                                <label for="password">Gammelt kodeord</label>
                                                                <div class="input">
                                                                    <input type="password" name="pwOld" required>
                                                                </div>
                                                            </div> -->
                                
                                                            <div>
                                                                <button type="submit" name="submit">Opdatér</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    }
                        }
                    }
                }
                        ?>
                
        <form action="./includes/insert.inc.php" method="post" enctype="multipart/form-data" class="imageselector">
            <h3>Vælg billede</h3>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
                            </div>

        <div class="userphotos">
            <h2>Dine billeder</h2>
            <div class="photos">
                <?php
            
                    $currentUser = $_SESSION['id'];
                    // select img source from table images, where the userId matches the logged in userId
                    $sql = "SELECT imgSrc FROM images WHERE userId = '$currentUser'";
                    $stmt = $conn->prepare($sql);
                    mysqli_stmt_execute($stmt);
                    $resultData = mysqli_stmt_get_result($stmt);

                    // while there is still rows in the images table
                    // fetch the associative array from the database, where the image is stored
                    while($row = mysqli_fetch_assoc($resultData))
                    {?>
                    <!-- and show the image if its userId matches the userId of the logged in user -->
                        <div class="imgholder">
                            <img src="img/<?php echo $row['imgSrc']; ?>">
                        </div>
                    <?php
                    }

                ?>
            </div>
        </div>

            <?php
            }
            else {?>
                <h1>Log venligst ind eller opret en bruger</h1>

                <div class="forms">
                    <div class="login">
                        <form action="./includes/login.inc.php" method="post" class="login">
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "emptyinput") {
                                        echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i login</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Udfyld venligst alle felter</p>";
                                    }
                                    else if ($_GET["error"] == "wrongemail") {
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Den indtastede email har ikke en bruger</p>";
                                    }
                                    else if ($_GET["error"] == "wrongpassword") {
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Kodeordet er forkert</p>";
                                    }
                                }
                            ?>

                            <h3>Log Ind her</h3>

                            <div class="inputs">
                                <label for="username">Email</label>
                                <div class="input">
                                    <input type="text" name="email">
                                </div>
                            </div>

                            <div class="inputs">
                                <label for="password">Kodeord</label>
                                <div class="input">
                                    <input type="password" name="pw" placeholder="Password">
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="submit">Log ind</button>
                            </div>
                        </form>
                    </div>




                    <div class="newuser">
                        <form action="./includes/signup.inc.php" method="post" class="new">
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "emptyinput") {
                                        echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i oprettelse</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Udfyld venligst alle felter</p>";
                                    }
                                    else if ($_GET["error"] == "invalidemail") {
                                        echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i oprettelse</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Den brugte email eksisterer ikke. Brug venligst en valid email</p>";
                                    }
                                    else if ($_GET["error"] == "passwordsdoesntmatch") {
                                        echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i oprettelse</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Kodeordene matcher ikke. Indtast venligst kodeord igen</p>";
                                    }
                                    else if ($_GET["error"] == "emailtaken") {
                                        echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i oprettelse</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Der er allerede oprettet en bruger med denne email</p>";
                                    }
                                    else if ($_GET["error"] == "stmtfailed") {
                                        echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i oprettelse</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Der skete en fejl. Prøv igen</p>";
                                    }
                                    else if ($_GET["error"] == "none") {
                                        echo "<b><p style=\"text-align:center;font-size:2rem;font-weight:bold;\">Sådan!</p>";
                                        echo "<p style=\"text-align:center;font-size:2rem;font-weight:bold;\">Du er nu oprettet!</p>";
                                    }
                                }
                            ?>

                            <h3>opret bruger her</h3>

                            <div class="inputs">
                                <label for="email">Din email</label>
                                <div class="input">
                                    <input type="text" name="email" placeholder="example@hotmail.com">
                                </div>
                            </div>

                            <div class="inputs">
                                <label for="name">Dit navn</label>
                                <div class="input">
                                    <input type="text" name="name" placeholder="Full name...">
                                </div>
                            </div>

                            <div class="inputs">
                                <label for="pw">Kodeord</label>
                                <div class="input">
                                    <input type="password" name="pw" placeholder="Password">
                                </div>
                            </div>

                            <div class="inputs">
                                <label for="pwrepeat">Gentag</label>
                                <div class="input">
                                    <input type="password" name="pwrepeat" placeholder="Reapeat password">
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="submit">Opret bruger</button>
                            </div>

                        </form>
                    </div>
                </div>

        <?php
            }
        ?>

    </main>



</body>

<?php
    include_once("footer.php");
?>

</html>