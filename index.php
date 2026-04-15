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
    <script src="https://unpkg.com/lucide@latest"></script>!e
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
            <li><a href="#parcours">À propos de moi</a></li>
            <li><a href="#specialisations">Spécialisations</a></li>
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
                        Spécialisé en option <strong>SLAM</strong>(<strong>Services Informatiques aux Organisations</strong>), je conçois des solutions logicielles modernes.
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

        <div class="middle-white-section" id="apropos">
            <section id="parcours" class="section-container double-col full-page">
                <div class="col-gauche">
                    <h2 class="section-title">À propos de moi</h2>
                    <p>
                        <strong>Bienvenue sur mon portfolio&nbsp;!</strong><br><br>
                        Je m'appelle <strong>Valentin HERNU</strong>, passionné par le développement d'applications, j'aime créer des solutions innovantes et efficaces pour répondre aux besoins des utilisateurs.<br><br>
                        Sur ce site, vous trouverez&nbsp;:

                        
                        <ul>
                            <li>Mon parcours scolaire et professionnel</li>
                            <li>Mes projets réalisés</li>
                            <li>Mon CV à télécharger</li>
                        </ul>
                        <br>
                        N'hésitez pas à parcourir mes réalisations et à me contacter pour toute question ou opportunité&nbsp;!
                        <br><br>
                        Vous retrouverez ci-dessous mon CV 👩‍💻 :
                        <br><br>
                        <div class="cv-btn-wrapper">
                            <a href="img/CV-Valentin-HERNU.png" download class="cta-button cv-download">
                                Télécharger mon CV
                            </a>
                        </div>
                    </p>
                </div>
                <div class="col-droite">
                    <h2 class="section-title">Mon Parcours</h2>
                      <div class="timeline-item bts-sio-item">
                            <span class="timeline-dot"></span>
                            <div class="time">2024 - 2026</div>
                            <h3>Lycée Saint-Rémi, Amiens</h3>
                            <p><strong>BTS SIO Option SLAM</strong><br><br>
                        Mes différents stages : <br><br>
                    <strong>Mai-Juin 2025 :</strong> Conseil départemental de la Somme. <br>
                    <strong>Janvier-Février 2026 :</strong> Conseil départemental de la Somme. <br>
                    </p>
                        </div>
                        <div class="timeline-item bts-sio-item">
                            <span class="timeline-dot"></span>
                            <div class="time">2021 - 2024</div>
                            <h3>Lycée Saint-Rémi, Amiens</h3>
                            <p>3 années de lycée, option Informatique à partir de la Première.<br>
                            Obtention du <strong>Bac Technologique STMG</strong> en 2024.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="time">2020</div>
                            <h3>Collège Bois l'Eau, Bernaville</h3>
                            <p>Obtention du <strong>Brevet des collèges</strong> avec mention <strong>Bien</strong>.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="specialisations" class="section-container full-page">
                <h2 class="section-title">Spécialisations 🎯</h2>
                <div class="specialisations-container">
                    <div class="specialisation-card" id="slamCard">
                        <div class="cursor-animation-container">
                            <div class="animated-cursor"></div>
                            <div class="animation-text">Ma spécialité</div>
                        </div>
                        <div class="spec-icon">
                            <i data-lucide="code" style="width: 40px; height: 40px;"></i>
                        </div>
                        <h3>SLAM</h3>
                        <p class="spec-subtitle">Solutions Logicielles et Applications Métier</p>
                        <div class="spec-content">
                            <p>
                                <strong>Qu'est-ce que SLAM ?</strong><br>
                                SLAM est l'option spécialisée en développement d'applications logicielles. Elle forme des développeurs capables de créer des solutions informatiques complètes adaptées aux besoins spécifiques des entreprises.
                            </p>
                            <p>
                                <strong>Compétences acquises :</strong>
                            </p>
                            <ul class="spec-list">
                                <li>Développement d'applications (desktop, web, mobile)</li>
                                <li>Programmation en PHP, Python, Java, C#</li>
                                <li>Gestion de bases de données (MySQL, SQL Server)</li>
                                <li>Conception et architecture logicielle</li>
                                <li>Tests et débogage d'applications</li>
                                <li>Intégration de solutions existantes</li>
                                <li>Sécurité informatique et authentification</li>
                            </ul>
                            <p>
                                <strong>Débouchés professionnels :</strong><br>
                                Développeur full-stack, Développeur web, Développeur d'applications métier, Architecte logiciel, Consultant IT
                            </p>
                        </div>
                    </div>

                    <div class="specialisation-card" id="sisrCard">
                        <div class="spec-icon">
                            <i data-lucide="server" style="width: 40px; height: 40px;"></i>
                        </div>
                        <h3>SISR</h3>
                        <p class="spec-subtitle">Solutions d'Infrastructure, Sécurité et Réseau</p>
                        <div class="spec-content">
                            <p>
                                <strong>Qu'est-ce que SISR ?</strong><br>
                                SISR est l'option spécialisée en infrastructure et sécurité informatique. Elle forme des administrateurs et techniciens capables de gérer, maintenir et sécuriser les systèmes informatiques des organisations.
                            </p>
                            <p>
                                <strong>Compétences acquises :</strong>
                            </p>
                            <ul class="spec-list">
                                <li>Administration de serveurs (Windows Server, Linux)</li>
                                <li>Gestion des réseaux informatiques</li>
                                <li>Virtualisation et cloud computing (Azure, AWS)</li>
                                <li>Sécurité informatique et pare-feu</li>
                                <li>Installation et maintenance des infrastructures</li>
                                <li>Support utilisateur et help-desk</li>
                                <li>Backup et récupération de données</li>
                                <li>Active Directory et gestion des identités</li>
                            </ul>
                            <p>
                                <strong>Débouchés professionnels :</strong><br>
                                Administrateur réseau, Administrateur système, Technicien infrastructure, Responsable sécurité, Ingénieur DevOps
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="projets" class="section-container full-page">
                <h2 class="section-title">Projets 🚧</h2>
                <div class="projects-grid">
                    <div class="project-card" data-project-id="0">
                        <div class="project-card-image">
                            <img src="img/dev-illustre.png" alt="Portfolio">
                        </div>
                        <div class="project-card-content">
                            <h3>Projet Portfolio</h3>
                            <p class="project-tagline">Votre identité numérique en un clic</p>
                            <p>Site dynamique avec PHP/MySQL.</p>
                            <div class="tags"><span>PHP</span><span>MySQL</span></div>
                        </div>
                    </div>
                    <div class="project-card" data-project-id="1">
                        <div class="project-card-image">
                            <img src="img/dev-illustre.png" alt="Galaxy Swiss Bourdin">
                        </div>
                        <div class="project-card-content">
                            <h3>Galaxy Swiss Bourdin</h3>
                            <p class="project-tagline">Simplifiez vos notes de frais</p>
                            <p>Application de gestion des frais pour les visiteurs médicaux.</p>
                            <div class="tags"><span>PHP</span><span>MySQL</span><span>Gestion</span></div>
                        </div>
                    </div>
                    <div class="project-card" data-project-id="2">
                        <div class="project-card-image">
                            <img src="img/dev-illustre.png" alt="Amicale du Val de Somme">
                        </div>
                        <div class="project-card-content">
                            <h3>Amicale du Val de Somme</h3>
                            <p class="project-tagline">Coureurs réunis, victoires célébrées</p>
                            <p>Application mobile et interface web pour la gestion des courses à pied.</p>
                            <div class="tags"><span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>API</span><span>Mobile</span></div>
                        </div>
                    </div>
                    <div class="project-card" data-project-id="3">
                        <div class="project-card-image">
                            <img src="img/dev-illustre.png" alt="Moodle">
                        </div>
                        <div class="project-card-content">
                            <h3>Moodle</h3>
                            <p class="project-tagline">L'apprentissage, partout et toujours</p>
                            <p>Plateforme d'apprentissage en ligne complète pour l'enseignement à distance.</p>
                            <div class="tags"><span>PHP</span><span>MySQL</span><span>LMS</span><span>E-learning</span></div>
                        </div>
                    </div>
                    <div class="project-card" data-project-id="4">
                        <div class="project-card-image">
                            <img src="img/dev-illustre.png" alt="Jackobylette">
                        </div>
                        <div class="project-card-content">
                            <h3>Jackobylette</h3>
                            <p class="project-tagline">La liberté sur deux roues</p>
                            <p>Plateforme de location de mobylettes avec réservations et paiements sécurisés.</p>
                            <div class="tags"><span>PHP</span><span>MySQL</span><span>Paiement</span><span>Réservation</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- MODAL PROJETS -->
            <div id="projectModal" class="project-modal">
                <div class="project-modal-content">
                    <!-- Bouton Fermer -->
                    <button class="modal-close" id="modalClose">
                        <i data-lucide="x" style="width: 28px; height: 28px;"></i>
                    </button>

                    <!-- Navigation Flèches -->
                    <button class="modal-nav prev" id="modalPrev">
                        <i data-lucide="chevron-left" style="width: 24px; height: 24px;"></i>
                    </button>
                    <button class="modal-nav next" id="modalNext">
                        <i data-lucide="chevron-right" style="width: 24px; height: 24px;"></i>
                    </button>

                    <!-- Contenu du Projet -->
                    <div class="modal-project-body">
                        <div class="modal-images">
                            <img id="modalProjectImage" src="" alt="Projet" class="modal-main-image">
                            <div class="modal-thumbnails" id="modalThumbnails"></div>
                        </div>
                        <div class="modal-info">
                            <h2 id="modalProjectTitle"></h2>
                            <p id="modalProjectDesc"></p>
                            <div id="modalProjectDetails"></div>
                            <div id="modalProjectTags" class="tags"></div>
                        </div>
                    </div>

                    <!-- Indicateur de Projet -->
                    <div class="modal-indicator">
                        <span id="modalProjectCount"></span>
                    </div>

                    <!-- Section Screenshots / Code -->
                    <div class="modal-screenshots-section">
                        <h3>📋 Aperçu du Code & Base de Données</h3>
                        <div class="screenshots-tabs" id="screenshotsTabs"></div>
                        <div class="screenshots-gallery">
                            <img id="modalScreenshotImage" src="" alt="Screenshot" class="modal-screenshot">
                            <div class="screenshots-sub-thumbnails" id="screenshotsSubThumbnails"></div>
                        </div>
                    </div>
                </div>
            </div>
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