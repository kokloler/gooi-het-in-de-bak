<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faq";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $vraag = $_POST["vraag"];

    // Controleren of de ingevulde gegevens geldig zijn
    if (empty($naam) || empty($email) || empty($vraag)) {
        $messageClass = "validation-error";
        $message = "Vul alle velden in.";
    } else {
        // Query om de gegevens in de database in te voegen
        $sql = "INSERT INTO form (naam, email, vraag) VALUES ('$naam', '$email', '$vraag')";
        
        // Uitvoeren van de query
        if (mysqli_query($conn, $sql)) {
            $messageClass = "success-message";
            $message = "Je vraag is ingediend!";
            header("refresh:4;url=..//faq/faq.html");
        } else {
            $messageClass = "error-message";
            $message = "Er is een fout opgetreden: " . mysqli_error($conn);
        }
    }
}

// Sluit de databaseverbinding
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="..//images/form.ico">
    <title>Stel een vraag</title>
    <link rel="stylesheet" type="text/css" href="..//faq/faq_form.css">
    <script src="https://kit.fontawesome.com/13f83daf59.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="logo">Gooi het in de bak</div>
        <ul>
            <li class="nav-item">
                <a href="../faq/faq.php" class="text-link">Terug</a>
                <a href="../faq/faq.php" class="icon-link"><i class="fas fa-arrow-left"></i></a>
            </li>
        </ul>
    </nav>

    <?php if (isset($message)): ?>
        <div class="notification-container">
            <div id="message" class="<?php echo $messageClass; ?>"><?php echo $message; ?></div>
        </div>
    <?php endif; ?>
    
    <main id="main_reg">
        <h1>Stel een vraag</h1>
        <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="vraag">Vraag:</label>
                <textarea id="vraag" name="vraag" rows="4" required></textarea>

                <input type="submit" value="Verstuur*" id="reg_button">
            </form>
            <p>* Vragen worden binnen 2 werkdagen beantwoord.</p>
        </div>
    </main>

    <footer>
        <div class="footer">&copy; 2023 Afvalrecycling </div>
    </footer>

    <script src="../faq/faq_form.js"></script>

</body>
</html>
