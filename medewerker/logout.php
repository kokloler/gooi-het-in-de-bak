<?php
session_start();

// Sessie vernietigen en alle sessievariabelen verwijderen
session_unset();
session_destroy();

// Doorsturen naar de inlogpagina
header("Location: ..//frontpage/frontpage.html");
exit;
?>