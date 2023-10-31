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
$dbname = "faq";
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
    <link rel="icon" type="image/x-icon" href="..//images/overzicht.ico">
    <link rel="stylesheet" type="text/css" href="medewerker.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <title>Overzicht</title>
    <script> function confirmDelete() {return confirm("Weet je zeker dat je deze vraag wilt verwijderen?");}</script>
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
                <th>Actie</th> 
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

                $sql = "SELECT naam, email, vraag FROM form"; // Query om gegevens op te halen

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['naam']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['vraag']."</td>";
                        echo "<td><a href='verwijder_vraag.php?naam=".$row['naam']."' class='delete-button' onclick='return confirmDelete();'><i class='far fa-trash-alt'></i></a><a href='mailto:" . $row['email'] . "?subject=Antwoord op uw vraag&body=Beste " . $row['naam'] . ",%0D%0A%0D%0AUw vraag was:%0D%0A" . $row['vraag'] . "%0D%0A%0D%0AMet vriendelijke groet,%0D%0AJouw naam' class='mail-button'><i class='far fa-envelope'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Geen gegevens beschikbaar</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<div class="overzicht-container">
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

        $sql = "SELECT naam, email, vraag FROM form"; // Query om gegevens op te halen

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='overzicht-item'>";
                echo "<strong>Naam:</strong> " . $row['naam']; 
                echo "<br>";
                echo "<strong>E-mail:</strong> " . $row['email'];
                echo "<br>";
                echo "<strong>Vraag:</strong> " . $row['vraag'];
                echo "<br>";
                echo "<td><a href='verwijder_vraag.php?naam=".$row['naam']."' class='delete-button' onclick='return confirmDelete();'><i class='far fa-trash-alt'></i></a></td>";
                echo "<td><a href='mailto:" . $row['email'] . "?subject=Antwoord op uw vraag&body=Beste " . $row['naam'] . ",%0D%0A%0D%0AUw vraag was:%0D%0A" . $row['vraag'] . "%0D%0A%0D%0AVriendelijke groeten,%0D%0AJouw naam' class='mail-button'><i class='far fa-envelope'></i></a></td>";
                echo "</div>";
            }
        } else {
            echo "Geen gegevens beschikbaar";
        }

        mysqli_close($conn);
    ?>
 </div>

</body>
</html>