<?php
$host = 'portfoliohrnvalentin.wuaze.com';
$dbname = 'portfolio_db';
$user = 'if0_41614346_';
$pass = 'WLXMpXzHD3ua'; 

try {
    // On crée l'objet PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // On active les erreurs pour le debug
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());.
}
// Surtout : on s'arrête là, pas de requête ici !
?>
