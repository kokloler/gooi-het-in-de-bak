<?php
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true) {
    header("location: ..//frontpage/frontpage.html");
    exit;
}

if (isset($_GET['naam'])) {
    $naam = $_GET['naam'];

    $servername = "localhost";
    $username = "ubuntu";
    $password = "12345678";
    $dbname = "faq";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Voer hier de SQL-query uit om de vraag te verwijderen op basis van de naamkolom
    $sql = "DELETE FROM form WHERE naam = '$naam'";

    if (mysqli_query($conn, $sql)) {
        header("location: medewerker.php"); // Doorsturen naar de overzichtspagina
    } else {
        echo "Fout bij het verwijderen: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>