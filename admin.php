<?php
session_start();
if (!isset($_SESSION['admin_connecte']) || $_SESSION['admin_connecte'] !== true) {
    header("Location: login.php");
    exit();
}
require_once 'config.php';

// --- MISE À JOUR PROFIL ---
if (isset($_POST['submit_profil'])) {
    $nouveauNom = $_POST['nom_user'];
    if (!empty($_FILES['nouvelle_photo']['name'])) {
        move_uploaded_file($_FILES['nouvelle_photo']['tmp_name'], __DIR__ . "/img/default.jpg");
    }
    $sql = "UPDATE infos_profil SET nom_user = :nom WHERE id = 1";
    $pdo->prepare($sql)->execute(['nom' => $nouveauNom]);
    header("Location: admin.php?status=success"); exit();
}

// --- AJOUT COMPÉTENCE ---
if (isset($_POST['add_skill'])) {
    $nom = trim($_POST['skill_name']);
    $icone = trim($_POST['skill_icon']);
    $couleur = $_POST['skill_color'];
    if (!empty($nom)) {
        $stmt = $pdo->prepare("INSERT INTO competences (nom, icone, couleur) VALUES (:nom, :icone, :couleur)");
        $stmt->execute(['nom' => $nom, 'icone' => $icone, 'couleur' => $couleur]);
    }
    header("Location: admin.php"); exit();
}

// --- SUPPRESSION COMPÉTENCE ---
if (isset($_GET['delete_skill'])) {
    $stmt = $pdo->prepare("DELETE FROM competences WHERE id = :id");
    $stmt->execute(['id' => $_GET['delete_skill']]);
    header("Location: admin.php"); exit();
}

$user = $pdo->query("SELECT * FROM infos_profil WHERE id = 1")->fetch();
$skills = $pdo->query("SELECT * FROM competences ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Portfolio</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="admin-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="margin: 0;">⚙️ Gestion Profil</h1>
        
        <a href="logout.php" style="color: #ef4444; text-decoration: none; font-weight: bold; display: flex; align-items: center; gap: 8px;">
            <i data-lucide="log-out" style="width: 20px; height: 20px;"></i> 
            Déconnexion
        </a>
    </div>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nom_user" value="<?php echo htmlspecialchars($user['nom_user']); ?>" class="admin-input">
        <div class="preview-box">
            <img src="img/default.jpg?t=<?php echo time(); ?>" class="preview-img">
            <input type="file" name="nouvelle_photo">
        </div>
        <button type="submit" name="submit_profil" class="cta-button">Enregistrer</button>
    </form>

    <hr class="admin-hr">

    <h2>🛠️ Compétences</h2>
    <form method="POST" class="skill-form" style="display:flex; flex-direction:column; gap:10px;">
        <div style="display:flex; gap:10px;">
            <input type="text" name="skill_name" placeholder="Nom (ex: PHP)" required class="admin-input" style="flex:2;">
            <input type="text" name="skill_icon" placeholder="Nom Lucide (ex: database)" class="admin-input" style="flex:1;">
            <input type="color" name="skill_color" value="#10b981" style="width:50px; height:45px; border:none; background:none; cursor:pointer;">
        </div>
        <p style="font-size:0.75rem; color:#94a3b8; margin:0;">Trouvez les noms sur <a href="https://lucide.dev/icons" target="_blank" style="color:var(--accent-color);">lucide.dev</a></p>
        <button type="submit" name="add_skill" class="cta-button">Ajouter</button>
    </form>

    <div class="skills-manager" style="margin-top:20px;">
        <?php foreach($skills as $s): ?>
            <div class="skill-item" style="border-left: 4px solid <?php echo $s['couleur']; ?>; background:#1e293b; padding:10px; margin-bottom:5px; border-radius:5px; display:flex; justify-content:space-between; align-items:center;">
                <span style="display:flex; align-items:center; gap:10px;">
                    <i data-lucide="<?php echo htmlspecialchars($s['icone']); ?>" style="width:18px; height:18px;"></i>
                    <?php echo htmlspecialchars($s['nom']); ?>
                </span>
                <a href="admin.php?delete_skill=<?php echo $s['id']; ?>" style="color:#ef4444; text-decoration:none; font-weight:bold;">×</a>
            </div>
        <?php endforeach; ?>
    </div>
    <br><a href="index.php" style="color:#94a3b8; text-decoration:none;">← Retour</a>
</div>

<script>lucide.createIcons();</script>
</body>
</html>