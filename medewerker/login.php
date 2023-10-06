<?php
session_start();

// Databasegegevens
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faq";

// Verbinding maken met de database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controleren of de databaseverbinding succesvol is
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: medewerker.php"); // Doorsturen naar de startpagina als de gebruiker al is ingelogd
    exit;
}

// Controleren of het inlogformulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['password']; // Correct de naam van het wachtwoordveld

    // Query om gebruiker op te halen op basis van gebruikersnaam
    $query = "SELECT * FROM medewerkers WHERE gebruikersnaam = '$gebruikersnaam'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Controleren of het ingevoerde wachtwoord overeenkomt met het opgeslagen wachtwoord in de database
        if ($wachtwoord == $row['wachtwoord']) {
            // Inloggen is succesvol, sessievariabelen instellen
            $_SESSION['loggedin'] = true;
            $_SESSION['gebruikersnaam'] = $row['gebruikersnaam'];

            // Doorsturen naar de startpagina
            header("location: medewerker.php");
        } else {
            // Inloggen is mislukt, toon een foutmelding
            $loginError = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    } else {
        // Gebruiker niet gevonden, toon een foutmelding
        $loginError = "Ongeldig gebruikersnaam of wachtwoord.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="..//images/login.ico">
    <title>Inloggen</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="eye-script.js"></script>
</head>
<body>
    <div class="login-container">
        <h1>Inloggen</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="gebruikersnaam"> Gebruikersnaam:</label> <!-- Aangepaste labeltekst -->
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required />
            </div>
            <div class="form-group password-toggle">
                <label for="password"> Wachtwoord:</label>
                <div class="input-with-icon">
                    <input type="password" id="password" name="password" required /> <!-- Aangepaste naam van het wachtwoordveld -->
                    <span class="toggle-password">
                        <i class="bi bi-eye" id="togglePassword"></i>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Inloggen" />
            </div>
            <?php if (isset($loginError)): ?>
                <div class="error"><?php echo $loginError; ?></div>
            <?php endif; ?>
        </form>

        <div class="form-group">
            <a href="..//frontpage/frontpage.html" class="back-button">Terug</a>
        </div>
        
    </div>
</body>
</html>
