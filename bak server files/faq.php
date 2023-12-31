<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="stylesheet" type="text/css" href="faq.css">
    <link rel="stylesheet" type="text/css" href="..//style.css">
    <script src ="recyclen.js"> </script>
    <link rel="icon" type="image/x-icon" href="..//images/Trash.ico">
    <script src="..//scripts/menu-script.js"></script>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
</head>
<body>
    <nav>
        <div class="logo">Gooi het in de bak</div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn"><i class="fas fa-bars"></i></label>
        <ul>
            <li><a href="../frontpage/frontpage.html">Home</a></li>
            <li><a href="../recyclen/recyclen.html">Recycling</a></li>
            <li><a href="../scheiden/scheiden.html">Afval scheiden</a></li>
            <li><a href="../duurzaam/duurzaam.html">Duurzaam</a></li>
            <li><a href="../tips/tips.html">Tips</a></li>
            <li><a class="active" href="../faq/faq.php">FAQ</a></li>
        </ul>
    </nav>

    <a href="faq-dark.php" >
            <img src = "../images/darkmodeicon.ico" class="darkmodeicon" alt="darkmode">
        </a>

    <header>
        <h1>Veelgestelde vragen</h1>
    </header>
    <main>
        <div class="container">
            <?php
            // Verbinding maken met de database
            $servername = "localhost";
            $username = "ubuntu";
            $password = "12345678";
            $dbname = "faq";
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT vraag, antwoord FROM faq"; // Query om gegevens op te halen

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="faq">';
                    echo '<div class="faq-question">';
                    echo '<h2>' . $row['vraag'] . '</h2>';
                    echo '<i class="fas fa-chevron-down"></i>';
                    echo '</div>';
                    echo '<div class="faq-answer">';
                    echo '<p>' . $row['antwoord'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Geen vragen en antwoorden beschikbaar.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>

        <div class="faq-help">
            <p>Geen antwoord op je vraag kunnen vinden?</p>
            <a href="faq_form.php" class="ask-question-button">Stel een vraag</a>
        </div>

        <script src="faq.js"></script>
    </main>

    <footer>
        <div class="footer">&copy; 2023 Afvalrecycling </div>
        <div class="login-button">
            <a href="../medewerker/login.php">Medewerker Login</a>
        </div>
    </footer> 

</body>
</html>
