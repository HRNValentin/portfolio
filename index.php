<?php
session_start();
require_once 'config.php';

try {
    // Infos profil
    $requete = $pdo->prepare("SELECT * FROM infos_profil WHERE id = 1");
    $requete->execute();
    $user = $requete->fetch();

    $nomAffiché = !empty($user['nom_user']) ? htmlspecialchars($user['nom_user']) : "Valentin HERNU";
    $photoAffichée = !empty($user['photo_url']) ? htmlspecialchars($user['photo_url']) : "default.jpg";

    // Compétences dynamiques
    $querySkills = $pdo->query("SELECT * FROM competences ORDER BY id ASC");
    $competences = $querySkills->fetchAll();

} catch (PDOException $e) {
    $nomAffiché = "Erreur";
    $photoAffichée = "default.jpg";
    $competences = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomAffiché; ?> | Portfolio</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body> 
   
    <div class="fond-lumineux">
        <div class="reflet"></div>
        <div class="reflet-2"></div>
    </div>   
     
    <nav class="sidebar">
        <div class="profile-section">
            <img src="img/<?php echo $photoAffichée; ?>?t=<?php echo time(); ?>" alt="Profil" class="profile-img">
            <h2><?php echo $nomAffiché; ?></h2>
            <p class="subtitle">Option SLAM - 2ème année</p>
        </div>

        <ul class="nav-links">
            <li><a href="#accueil" class="active">Accueil</a></li>
            <li><a href="#parcours">Mon Parcours</a></li>
            <li><a href="#projets">Projets SLAM</a></li>
            <li><a href="#veille">Veille Technologique</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="sidebar-footer">
            <p>© <?php echo date("Y"); ?> - Lycée Saint-Rémi</p>
        </div>
    </nav>

    <main class="content">
        <section id="accueil" class="full-page">
            <div class="hero-container">
                <div class="hero-text">
                    <span class="badge">Étudiant en BTS SIO</span>
                    <h1>Développeur d'applications <br><span class="highlight">Passionné & Rigoureux</span></h1>
                    <p class="description">
                        Actuellement en deuxième année de <strong>BTS SIO</strong> au sein du <strong>Lycée Saint-Rémi à Amiens</strong>. 
                        Spécialisé en option <strong>SLAM</strong>, je conçois des solutions logicielles modernes.
                    </p>
                   <div class="cta-group">
    <button id="btnContact" class="cta-button">Me contacter</button>
    
    <?php if (isset($_SESSION['admin_connecte'])): ?>
        <div style="margin-top: 15px; display: flex; align-items: center; gap: 15px;">
            <a href="admin.php" style="color: var(--accent-color); text-decoration: none; font-size: 0.9rem;">
                <i data-lucide="settings" style="width:16px; height:16px; vertical-align:middle;"></i> Admin
            </a>
            <a href="logout.php" style="color: #ef4444; text-decoration: none; font-size: 0.9rem; border-left: 1px solid #334155; padding-left: 15px;">
                <i data-lucide="log-out" style="width:16px; height:16px; vertical-align:middle;"></i> Déconnexion
            </a>
        </div>
    <?php endif; ?>
</div>
                </div>

                <div class="hero-visual">
                    <div class="image-wrapper">
                        <img src="img/dev-illustre.png" alt="Développement" class="dev-img">
                        
                        <div class="skills-card">
                            <div class="skills-header">📊 Mes Compétences</div>
                            <div class="skills-list">
                                <?php foreach($competences as $c): ?>
                                    <span class="skill-tag" style="border-color: <?php echo $c['couleur']; ?>;">
                                        <i data-lucide="<?php echo htmlspecialchars($c['icone']); ?>" style="color: <?php echo $c['couleur']; ?>; width: 16px; height: 16px;"></i>
                                        <?php echo htmlspecialchars($c['nom']); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="middle-white-section">
            <section id="parcours" class="section-container">
                <span class="badge">Expériences</span>
                <h2 class="section-title">Mon Parcours</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="time">2024 - 2026</div>
                        <h3>BTS SIO Option SLAM</h3>
                        <p>Lycée Saint-Rémi, Amiens.</p>
                    </div>
                </div>
            </section>

            <section id="projets" class="section-container">
                <span class="badge">Portfolio</span>
                <h2 class="section-title">Projets SLAM</h2>
                <div class="projects-grid">
                    <div class="project-card">
                        <h3>Projet Portfolio</h3>
                        <p>Site dynamique avec PHP/MySQL.</p>
                        <div class="tags"><span>PHP</span><span>MySQL</span></div>
                    </div>
                </div>
            </section>
        </div>

        <section id="contact" class="section-container full-page">
            <span class="badge">Contact</span>
            <h2 class="section-title">Me joindre</h2>
            <form class="contact-form">
                <div class="input-group">
                    <input type="text" placeholder="Nom" required>
                    <input type="email" placeholder="Email" required>
                </div>
                <textarea placeholder="Votre message" rows="5" required></textarea>
                <button type="submit" class="cta-button">Envoyer le message</button>
            </form>
        </section>
    </main>

    <script src="script.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>