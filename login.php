<?php
session_start();
require_once 'config.php';

if (isset($_POST['connexion'])) {
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
    $stmt->execute([$identifiant]);
    $user = $stmt->fetch();

    // On vérifie si l'utilisateur existe et si le mot de passe correspond
    if ($user && $mdp === $user['mot_de_passe']) {
        $_SESSION['admin_connecte'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $erreur = "Identifiants incorrects !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <h1>Connexion</h1>
        <?php if(isset($erreur)) echo "<p style='color:red'>$erreur</p>"; ?>
        <form method="POST">
            <input type="text" name="identifiant" placeholder="Identifiant" required style="width:100%; margin-bottom:10px; padding:10px;">
            <input type="password" name="mdp" placeholder="Mot de passe" required style="width:100%; margin-bottom:10px; padding:10px;">
            <button type="submit" name="connexion" class="cta-button">Se connecter</button>
        </form>
    </div>
</body>
</html>