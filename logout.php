<?php
session_start();
session_destroy(); // Détruit toutes les variables de session
header("Location: index.php");
exit();
?>