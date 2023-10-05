<?php
session_start();
// Controleren of de gebruiker is ingelogd
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true) {
    // Gebruiker is niet ingelogd, doorsturen naar inlogpagina
    header("location: ..//frontpage/frontpage.html");
    exit;
}

// Verbinding maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erp";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Databaseverbinding sluiten
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="medewerker.css">
    <script src="https://kit.fontawesome.com/13f83daf59.js" crossorigin="anonymous"></script>
    <title>Overzicht</title>
</head>
<body>
<nav>
        <div class="logo">Gooi het in de bak</div>
        <ul>
            <li class="nav-item">
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-door-open"></i></a></li>
            </li>
        </ul>
    </nav>
    Hallo world!
</body>
</html>