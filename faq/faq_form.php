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

<body class="no-hamburger-menu">
    <nav>
        <div class="logo">Gooi het in de bak</div>
        <ul>
        <li class="nav-item">
            <a href="../faq/faq.html" class="text-link">Terug</a>
            <a href="../faq/faq.html" class="icon-link"><i class="fas fa-arrow-left"></i></a>
        </li>
    </ul>
    </nav>

    <main id="main_reg">
        <h1>Stel een vraag</h1>
        <div class="container">
            <form action="formulier.php" method="post">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="vraag">Vraag:</label>
                <textarea id="vraag" name="vraag" rows="4" required></textarea>

                <input type="submit" value="Verstuur*" id="reg_button">
            </form>
            <p>* Alle inzendingen worden anoniem verwerkt.</p>
        </div>
    </main>

    <footer>
        <div class="footer">&copy; 2023 Afvalrecycling </div>
    </footer> 

</body>
</html>