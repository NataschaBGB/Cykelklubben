<?php
    include_once("header.php");
?>

<body>
    <main>

        <h1>Velkommen til vores hjemmeside!</h1>

        <div class="slideshow-container">
            <div class="mySlides">
                <img src="https://fribikeshop-cdn-endpoint.azureedge.net/images/products/77-286331/scott-scale-970-radium-yellow-mountainbike-77-286331_1.jpg?v=e1eb1ce8869742d335ae0a4736638b42&width=756&height=516&mode=crop" style="width:100%;">
            </div>

            <div class="mySlides">
                <img src="https://fribikeshop-cdn-endpoint.azureedge.net/images/products/77-286341/scott-aspect-940-stellar-blue-mountainbike-77-286341_1.jpg?v=51fdd582f333c64d7c4dcc90ebfcc75b&width=756&height=516&mode=crop" style="width:100%;">
            </div>

            <div class="mySlides">
                <img src="https://fribikeshop-cdn-endpoint.azureedge.net/images/products/77-286355/scott-aspect-770-smith-green-mountainbike-77-286355_1.jpg?v=0b90005a4820db3fc3672bfe9ba6b79c&width=756&height=516&mode=crop" style="width:100%;">
            </div>

            <div class="mySlides">
                <img src="https://fribikeshop-cdn-endpoint.azureedge.net/images/products/77-286340/scott-aspect-930-iridium-black-mountainbike-77-286340_1.jpg?v=460af0aa46ea5af3b716a88bf8af5ebf&width=756&height=516&mode=crop" style="width:100%;">
            </div>
        </div>


        <?php
        if(!isset($_SESSION['id'])) {?>

            <div class="forms">
                <div class="login">
                    <form action="includes/login.inc.php" method="post" class="login">

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
                                    <label for="email">Email</label>
                                    <div class="input">
                                        <input type="text" name="email" required>
                                    </div>
                                </div>

                                <div class="inputs">
                                    <label for="password">Kodeord</label>
                                    <div class="input">
                                        <input type="password" name="pw" required>
                                    </div>
                                </div>
            
                            <div>
                                <button type="submit">Log ind</button>
                            </div>
                    </form>
                </div>

                <div class="newuser">
                    <form action="./includes/signup.inc.php" method="post" class="new">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i login</p>";
                                    echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Udfyld venligst alle felter</p>";
                                }
                                else if ($_GET["error"] == "invalidemail") {
                                    echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i login</p>";
                                    echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Den brugte email eksisterer ikke. Brug venligst en valid email</p>";
                                }
                                else if ($_GET["error"] == "passwordsdoesntmatch") {
                                    echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i login</p>";
                                    echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Kodeordene matcher ikke. Indtast venligst kodeord igen</p>";
                                }
                                else if ($_GET["error"] == "emailtaken") {
                                    echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i login</p>";
                                    echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Der er allerede oprettet en bruger med denne email</p>";
                                }
                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "<b><p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Fejl i login</p>";
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
                                <input type="text" name="email" required>
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="name">Dit navn</label>
                            <div class="input">
                                <input type="text" name="name" required>
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="pw">Kodeord</label>
                            <div class="input">
                                <input type="password" name="pw" required>
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="pwrepeat">Gentag</label>
                            <div class="input">
                                <input type="password" name="pwrepeat" required>
                            </div>
                        </div>
        
                        <div>
                            <button type="submit">Opret bruger</button>
                        </div>
    
                    </form>
                </div>
            </div>

        <?php
            }
        ?>


    </main>



    <script src="js/script.js"></script>
</body>

<?php
    include_once("footer.php");
?>

</html>