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
        <div class="logo">Medewerkers pagina</div>
        <ul>
            <li class="nav-item">
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-door-open"></i></a></li>
            </li>
        </ul>
    </nav>

    <div class="table-container">
        <h2>Ingediende vragen</h2>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>E-mail</th>
                    <th>Vraag</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Verbinding maken met de database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "faq";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT naam, email, vraag FROM form";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['naam']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['vraag']."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Geen gegevens beschikbaar</td></tr>";
                    }

                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>