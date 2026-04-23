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
</body>
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
                            <div class="skills-header">📊 Piles technologiques</div>
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
                            <button id="viewCvBtn" class="cta-button cv-download">
                                <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                                Visualiser mon CV
                            </button>
                        </div>
                    </p>
                </div>
                <div class="col-droite">
                    <h2 class="section-title">Mon Parcours</h2>
                    <div class="modern-timeline">
                        <div class="timeline-item-modern timeline-left">
                            <div class="timeline-content">
                                <h3>Lycée Saint-Rémi</h3>
                                <p class="timeline-date">2024 - 2026</p>
                                <p class="timeline-label"><strong>BTS SIO Option SLAM</strong></p>
                                <p><strong>Stages :</strong><br>
                                Mai-Juin 2025 : Conseil départemental<br>
                                Janvier-Février 2026 : Conseil départemental</p>
                            </div>
                            <div class="timeline-marker">
                                <div class="timeline-icon">
                                    <i data-lucide="book-open" style="width: 24px; height: 24px;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item-modern timeline-right">
                            <div class="timeline-marker">
                                <div class="timeline-icon">
                                    <i data-lucide="award" style="width: 24px; height: 24px;"></i>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <h3>Lycée Saint-Rémi</h3>
                                <p class="timeline-date">2021 - 2024</p>
                                <p class="timeline-label"><strong>Bac Technologique STMG</strong></p>
                                <p>3 années de lycée avec option Informatique à partir de la Première.</p>
                            </div>
                        </div>

                        <div class="timeline-item-modern timeline-left">
                            <div class="timeline-content">
                                <h3>Collège Bois l'Eau</h3>
                                <p class="timeline-date">2020</p>
                                <p class="timeline-label"><strong>Brevet des collèges</strong></p>
                                <p>Obtention avec mention <strong>Bien</strong>.</p>
                            </div>
                            <div class="timeline-marker">
                                <div class="timeline-icon">
                                    <i data-lucide="zap" style="width: 24px; height: 24px;"></i>
                                </div>
                            </div>
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

        <section id="veille" class="section-container full-page">
            <span class="badge">Veille Technologique</span>
            <h2 class="section-title">L'Ère du Vibe Coding 🤖</h2>
            <p class="veille-intro-text">Le développement assisté par Agent IA : Evolution ou révolution du métier ?</p>

            <!-- Timeline: Passé, Présent, Futur -->
            <div class="veille-section">
                <h3>📅 L'Évolution du Code</h3>
                <div class="timeline-periods">
                    <div class="timeline-period">
                        <div class="period-icon">🕰️</div>
                        <h4>Le Passé (1950-2015)</h4>
                        <p>Codage entièrement manuel. Stack Overflow (2008) révolutionne l'entraide. IDE simples, pas d'outils intelligents.</p>
                    </div>
                    <div class="timeline-period">
                        <div class="period-icon">⚡</div>
                        <h4>Le Présent (2016-2026)</h4>
                        <p>GitHub Copilot (2021) → ChatGPT (2022) → Agents IA multimodaux. Pair programming avec l'IA devient norme. Réduction du temps de dev : 30-50%.</p>
                    </div>
                    <div class="timeline-period">
                        <div class="period-icon">🚀</div>
                        <h4>Le Futur (2026+)</h4>
                        <p>Agents IA autonomes créant des apps complètes. Déploiement et sécurité automatisés. Métiers en évolution : architects IA plutôt que codeurs purs.</p>
                    </div>
                </div>
            </div>

            <!-- Avis Pour vs Contre -->
            <div class="veille-section">
                <h3>⚖️ Pour vs Contre</h3>
                <div class="avis-container">
                    <div class="avis-card pour">
                        <h4>✅ L'Avis POUR</h4>
                        <p><strong>"L'IA amplifie, elle ne remplace pas"</strong></p>
                        <ul>
                            <li>Productivité accrue de 2-3x</li>
                            <li>Démocratisation : les débutants créent des apps complexes</li>
                            <li>Réduction des bugs via tests automatisés</li>
                            <li>Créativité libérée des tâches répétitives</li>
                            <li>Nouveaux rôles émergents : Prompt Engineer, IA Architect</li>
                        </ul>
                    </div>
                    <div class="avis-card contre">
                        <h4>⚠️ L'Avis CONTRE</h4>
                        <p><strong>"Dépendance et perte de compétences"</strong></p>
                        <ul>
                            <li>Perte de compétences fondamentales</li>
                            <li>Code généré sans rigueur architecturale</li>
                            <li>Vulnérabilités de sécurité potentielles</li>
                            <li>Réduction drastique des postes juniors</li>
                            <li>Hallucinations IA créant du code non-fonctionnel</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Vidéos Importantes -->
            <div class="veille-section">
                <h3>🎬 Vidéos Clés</h3>
                <div class="videos-grid">
                    <div class="video-card">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/T7n23rqzYXI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h4>GitHub Copilot Workspace</h4>
                        <p>Fireship</p>
                    </div>
                    <div class="video-card">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/j9VU4G_bKCk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h4>Devin: Ingénieur IA</h4>
                        <p>Traversy Media</p>
                    </div>
                    <div class="video-card">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/n7xfyJKWl5U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h4>Cursor: AI VS Code</h4>
                        <p>Web Dev Simplified</p>
                    </div>
                    <div class="video-card">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/qjvQtIFMyTg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h4>L'IA ne remplacera pas les devs</h4>
                        <p>Code Report</p>
                    </div>
                </div>
            </div>

            <!-- Créateurs à Suivre -->
            <div class="veille-section">
                <h3>👥 Créateurs & Youtubeurs (Je suis abonné ✓)</h3>
                <div class="creators-grid">
                    <div class="creator-card">
                        <h4>Fireship</h4>
                        <p>Explications visuelles concises sur la tech et l'IA</p>
                        <a href="https://www.youtube.com/@fireship" target="_blank">→ Chaîne</a>
                    </div>
                    <div class="creator-card">
                        <h4>Traversy Media</h4>
                        <p>Tutoriels web et intégration de l'IA en dev</p>
                        <a href="https://www.youtube.com/@traversymedia" target="_blank">→ Chaîne</a>
                    </div>
                    <div class="creator-card">
                        <h4>Theo - t3.gg</h4>
                        <p>Analyses sur agents IA et futur du web dev</p>
                        <a href="https://www.youtube.com/@t3dotgg" target="_blank">→ Chaîne</a>
                    </div>
                    <div class="creator-card">
                        <h4>Web Dev Simplified</h4>
                        <p>Tutoriels sur les outils de dev modernes</p>
                        <a href="https://www.youtube.com/@WebDevSimplified" target="_blank">→ Chaîne</a>
                    </div>
                </div>
            </div>

            <!-- Ressources Essentielles -->
            <div class="veille-section">
                <h3>📚 Ressources Essentielles</h3>
                <div class="resources-grid">
                    <div class="resource-category">
                        <h4>🔗 Blogs & Articles</h4>
                        <ul>
                            <li><a href="https://github.blog" target="_blank">GitHub Blog</a> - Copilot & IA en dev</li>
                            <li><a href="https://openai.com/research" target="_blank">OpenAI Research</a> - Recherches officielles</li>
                            <li><a href="https://dev.to" target="_blank">DEV.to</a> - Communauté dev</li>
                            <li><a href="https://huggingface.co/blog" target="_blank">Hugging Face</a> - IA open-source</li>
                        </ul>
                    </div>
                    <div class="resource-category">
                        <h4>📖 Livres Recommandés</h4>
                        <ul>
                            <li><strong>Superintelligence</strong> - Nick Bostrom (2014)</li>
                            <li><strong>Deep Learning</strong> - Goodfellow et al. (2016)</li>
                            <li><strong>The Alignment Problem</strong> - Brian Christian (2020)</li>
                            <li><strong>Clean Code</strong> - Robert C. Martin (2008)</li>
                        </ul>
                    </div>
                    <div class="resource-category">
                        <h4>📧 Newsletters</h4>
                        <ul>
                            <li><a href="https://newsletter.deeplearning.ai/" target="_blank">DeepLearning.AI</a> - IA & ML</li>
                            <li><a href="https://importai.substack.com" target="_blank">Import AI</a> - Digest IA générative</li>
                            <li><a href="https://tldr.tech" target="_blank">TLDR Tech</a> - Tech quotidienne</li>
                            <li><a href="https://aiweekly.co" target="_blank">AI Weekly</a> - News curatées</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Conclusion -->
            <div class="veille-conclusion">
                <h3>💡 Mon Avis</h3>
                <p>
                    Le "Vibe Coding" est une <strong>évolution</strong>, pas une menace. L'IA est mon outil, pas mon remplaçant. 
                    L'important : rester curieux, maintenir mes fondamentaux techniques, et apprendre à collaborer efficacement avec les agents IA. 
                    Ceux qui embrassent cette ère et restent rigoureux seront les leaders de demain.
                </p>
            </div>
        </section>


                <!-- Chronologie : Passé, Présent, Futur -->
                <div class="timeline-section">
                    <h3 class="veille-subtitle-h3">📅 Évolution du code assisté par IA</h3>
                    
                    <div class="veille-timeline">
                        <div class="veille-timeline-item past">
                            <div class="veille-timeline-marker">
                                <span class="veille-timeline-icon">🕰️</span>
                            </div>
                            <div class="veille-timeline-content">
                                <h4>Le Passé (Avant 2023)</h4>
                                <p><strong>L'ère du développement manuel :</strong></p>
                                <ul>
                                    <li>Google Autocomplete et IntelliSense basiques</li>
                                    <li>Premiers assistants de code (Tabnine, Kite)</li>
                                    <li>Stack Overflow et les forums comme única ressource</li>
                                    <li>Le développeur = la principale "IA" du projet</li>
                                </ul>
                            </div>
                        </div>

                        <div class="veille-timeline-item present">
                            <div class="veille-timeline-marker">
                                <span class="veille-timeline-icon">⚡</span>
                            </div>
                            <div class="veille-timeline-content">
                                <h4>Le Présent (2023-2026)</h4>
                                <p><strong>La révolution des LLM :</strong></p>
                                <ul>
                                    <li>ChatGPT, Claude, GitHub Copilot X génèrent des blocs complets</li>
                                    <li>Agents IA semi-autonomes (Cursor, Devin)</li>
                                    <li>Capacité à refactoriser, déboguer et tester automatiquement</li>
                                    <li>Premières expériences de "pair programming IA"</li>
                                </ul>
                            </div>
                        </div>

                        <div class="veille-timeline-item future">
                            <div class="veille-timeline-marker">
                                <span class="veille-timeline-icon">🚀</span>
                            </div>
                            <div class="veille-timeline-content">
                                <h4>Le Futur (2026+)</h4>
                                <p><strong>La maturation des agents autonomes :</strong></p>
                                <ul>
                                    <li>Agents IA complètement autonomes pour projets complets</li>
                                    <li>Zéro tâche manuelle, juste des spécifications</li>
                                    <li>Intégration totale avec DevOps, test, déploiement</li>
                                    <li>Le rôle du dev : architecte et validateur, pas codeur</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


        <section id="contact" class="section-container full-page">
            <span class="badge">Contact</span>
            <h2 class="section-title">Me contacter</h2>
            
            <div class="contact-content">
                <!-- Email et Réseaux Sociaux -->
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-card-header">
                            <i data-lucide="mail" style="color: var(--accent-color); width: 28px; height: 28px;"></i>
                            <h3>Email</h3>
                        </div>
                        <p class="contact-email">
                            <a href="mailto:valentinhernu1@gmail.com">valentinhernu1@gmail.com</a>
                        </p>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-header">
                            <i data-lucide="map-pin" style="color: var(--accent-color); width: 28px; height: 28px;"></i>
                            <h3>Localisation</h3>
                        </div>
                        <p class="contact-location">Amiens, France</p>
                    </div>
                </div>
                
                <!-- Carte Google Maps -->
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2609.4893939999998!2d2.2945!3d49.8841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f0a5f0a5f0a5%3A0x0!2sAmiens%2C%20France!5e0!3m2!1sfr!2sfr!4v1000000000000" width="100%" height="400" style="border:0; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
                <!-- Liens Sociaux -->
                <div class="social-links">
                    <a href="https://github.com/HRNValentin" target="_blank" rel="noopener noreferrer" class="social-link github">
                        <span>GitHub</span>
                    </a>
                    <a href="https://linkedin.com/in/valentinhernu" target="_blank" rel="noopener noreferrer" class="social-link linkedin">
                        <span>LinkedIn</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Modale CV -->
    <div id="cvModal" class="cv-modal">
        <div class="cv-modal-content">
            <button id="closeCvModal" class="cv-modal-close">
                <i data-lucide="x" style="width: 24px; height: 24px;"></i>
            </button>
            
            <img id="cvImage" src="img/CV-Valentin-Hernu-2025.png" alt="CV" class="cv-modal-image">
            
            <a id="downloadCvBtn" href="img/CV-Valentin-Hernu-2025.png" download class="cv-download-modal">
                <i data-lucide="download" style="width: 18px; height: 18px;"></i>
                Télécharger le CV
            </a>
        </div>
    </div>

    <script src="script.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>