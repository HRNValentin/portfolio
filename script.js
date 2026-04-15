// ===== DONNÉES DES PROJETS =====
const projects = [
    {
        id: 0,
        title: "Projet Portfolio",
        tagline: "Votre identité numérique en un clic",
        illustration: "img/dev-illustre.png",
        description: "Un site portfolio personnel dynamique créé avec PHP et MySQL pour accompagner mon parcours en BTS SIO.",
        image: "img/dev-illustre.png",
        images: ["img/dev-illustre.png"],
        details: `
            <strong>Objectif :</strong> Créer une plateforme web moderne et dynamique pour présenter mon profil professionnel, mes compétences, mes projets et faciliter le contact.
            
            <strong>Fonctionnalités :</strong>
            • Affichage dynamique du profil depuis la base de données
            • Section des compétences actualisable via panel admin
            • Gestion de projets
            • Formulaire de contact
            • Interface admin sécurisée
            
            <strong>Architecture :</strong>
            • Frontend : HTML5, CSS3 (Flexbox/Grid), JavaScript vanilla
            • Backend : PHP 8
            • Base de données : MySQL
            • Design responsif et moderne
        `,
        tags: ["PHP", "MySQL", "HTML", "CSS", "JavaScript", "Admin Panel"],
        screenshots: {
            "Code PHP": ["img/dev-illustre.png", "img/dev-illustre.png"],
            "Base de Données": ["img/dev-illustre.png"],
            "Interface": ["img/dev-illustre.png", "img/dev-illustre.png"]
        }
    },
    {
        id: 1,
        title: "Galaxy Swiss Bourdin",
        tagline: "Simplifiez vos notes de frais",
        illustration: "img/dev-illustre.png",
        description: "Application de gestion des frais destinée aux visiteurs médicaux permettant une traçabilité complète des dépenses.",
        image: "img/dev-illustre.png",
        images: ["img/dev-illustre.png"],
        details: `
            <strong>Objectif :</strong> Développer un système de gestion des notes de frais pour les visiteurs médicaux de l'entreprise Galaxy Swiss Bourdin avec workflow de validation.
            
            <strong>Fonctionnalités principales :</strong>
            • Authentification sécurisée des utilisateurs
            • Saisie des frais par catégorie
            • Suivi en temps réel du statut des demandes
            • Workflow de validation multi-étages (directeur, comptabilité)
            • Génération de rapports et statistiques
            • Historique complet des transactions
            
            <strong>Avantages business :</strong>
            • Réduction du temps de traitement des notes de frais
            • Traçabilité totale des dépenses
            • Conformité avec les politiques de l'entreprise
            • Réduction des fraudes
            
            <strong>Stack technique :</strong>
            • PHP/MySQL pour le backend
            • HTML/CSS/JavaScript pour l'interface
            • Dashboard analytique intégré
        `,
        tags: ["PHP", "MySQL", "Gestion", "Workflow", "Dashboard", "Admin"],
        screenshots: {
            "Authentification": ["img/dev-illustre.png"],
            "Dashboard": ["img/dev-illustre.png", "img/dev-illustre.png"],
            "Saisie Frais": ["img/dev-illustre.png"],
            "Base de Données": ["img/dev-illustre.png"]
        }
    },
    {
        id: 2,
        title: "Amicale du Val de Somme",
        tagline: "Coureurs réunis, victoires célébrées",
        illustration: "img/dev-illustre.png",
        description: "Plateforme complète pour la gestion des courses à pied avec application mobile et interface web.",
        image: "img/dev-illustre.png",
        images: ["img/dev-illustre.png"],
        details: `
            <strong>Objectif :</strong> Créer un écosystème digital complet pour faciliter l'organisation et la participation aux courses à pied de la région Amicale du Val de Somme.
            
            <strong>Fonctionnalités utilisateurs :</strong>
            • Inscription en ligne simple et rapide
            • Consultation de l'agenda des courses
            • Gestion du profil et de l'historique de participation
            • Notifications en temps réel des courses
            • Partage des résultats et statistiques personnelles
            
            <strong>Fonctionnalités organisateurs :</strong>
            • Création et gestion des épreuves
            • Suivi des inscriptions en direct
            • Gestion des participants et des catégories
            • Classements et palmarès
            • Export de données
            
            <strong>Architecture :</strong>
            • API REST pour synchronisation mobile/web
            • Application mobile responsive (HTML/CSS/JS)
            • Interface web admin complète
            • Base de données centralisée MySQL
            • Système d'authentification JWT
        `,
        tags: ["HTML", "CSS", "JavaScript", "PHP", "MySQL", "API REST", "Mobile", "Responsive"],
        screenshots: {
            "API REST": ["img/dev-illustre.png"],
            "Interface Mobile": ["img/dev-illustre.png", "img/dev-illustre.png"],
            "Admin Panel": ["img/dev-illustre.png"],
            "Base de Données": ["img/dev-illustre.png"]
        }
    },
    {
        id: 3,
        title: "Moodle",
        tagline: "L'apprentissage, partout et toujours",
        illustration: "img/dev-illustre.png",
        description: "Plateforme d'apprentissage en ligne (LMS) complète pour la gestion de cours, quiz, forums et suivi des étudiants.",
        image: "img/dev-illustre.png",
        images: ["img/dev-illustre.png"],
        details: `
            <strong>Objectif :</strong> Développer une plateforme d'apprentissage en ligne robuste et flexible pour l'enseignement à distance et l'accompagnement pédagogique.
            
            <strong>Fonctionnalités pour les étudiants :</strong>
            • Accès aux cours et contenus pédagogiques
            • Participation aux quiz et activités interactives
            • Remise des devoirs et travaux
            • Communication avec les enseignants via forums
            • Suivi de la progression et des notes
            • Téléchargement des ressources
            
            <strong>Fonctionnalités pour les enseignants :</strong>
            • Création et gestion des cours complets
            • Édition du contenu pédagogique (vidéos, PDF, textes)
            • Création de quiz avec correction automatique
            • Gestion des devoirs et évaluation
            • Modération des forums et discussions
            • Génération de rapports et statistiques
            • Gestion des groupes d'étudiants
            
            <strong>Fonctionnalités administrateur :</strong>
            • Gestion des utilisateurs et rôles
            • Configuration de la plateforme
            • Gestion des catégories de cours
            • Sauvegarde et maintenance
            • Statistiques d'utilisation globales
            
            <strong>Stack technique :</strong>
            • PHP pour le backend robuste
            • MySQL pour la base de données
            • HTML/CSS/JavaScript pour l'interface responsive
            • Technologies AJAX pour l'interactivité
        `,
        tags: ["PHP", "MySQL", "HTML", "CSS", "JavaScript", "LMS", "E-learning", "Admin"],
        screenshots: {
            "Interface Cours": ["img/dev-illustre.png", "img/dev-illustre.png"],
            "Création Quiz": ["img/dev-illustre.png"],
            "Gestion Participants": ["img/dev-illustre.png"],
            "Forum & Messages": ["img/dev-illustre.png"],
            "Base de Données": ["img/dev-illustre.png"]
        }
    },
    {
        id: 4,
        title: "Jackobylette",
        tagline: "La liberté sur deux roues",
        illustration: "img/dev-illustre.png",
        description: "Plateforme complète de location de mobylettes avec gestion des réservations, paiements et suivi des véhicules.",
        image: "img/dev-illustre.png",
        images: ["img/dev-illustre.png"],
        details: `
            <strong>Objectif :</strong> Créer une plateforme de location de mobylettes moderne et intuitive permettant aux utilisateurs de réserver des véhicules facilement et aux administrateurs de gérer efficacement leur flotte.
            
            <strong>Fonctionnalités clientes :</strong>
            • Catalogue complet de mobylettes avec filtres
            • Recherche et disponibilité en temps réel
            • Réservation en ligne simple et rapide
            • Système de paiement sécurisé
            • Gestion des réservations (modification, annulation)
            • Historique des locations
            • Avis et évaluations
            • Géolocalisation des points de retrait
            • Notifications par email/SMS
            
            <strong>Fonctionnalités administrateur :</strong>
            • Gestion complète de la flotte de mobylettes
            • Ajout/modification/suppression de véhicules
            • Gestion des localisations et points de retrait
            • Suivi des réservations et paiements
            • Gestion des tarifs et promotions
            • Historique et statistiques
            • Gestion des utilisateurs et leurs profils
            • Export de rapports de location
            • Maintenance et planification (révisions)
            
            <strong>Fonctionnalités de paiement :</strong>
            • Intégration Stripe ou PayPal
            • Calcul automatique des prix (tarif journalier/heures)
            • Caution et assurance
            • Factures automatiques
            • Gestion des remboursements
            
            <strong>Stack technique :</strong>
            • PHP/MySQL pour le backend
            • HTML/CSS/JavaScript pour le frontend
            • API d'intégration paiement (Stripe, PayPal)
            • Géolocalisation Google Maps
            • Dashboard analytique
            • Design responsive et mobile-first
        `,
        tags: ["PHP", "MySQL", "HTML", "CSS", "JavaScript", "Paiement", "Réservation", "Gestion"],
        screenshots: {
            "Catalogue Mobylettes": ["img/dev-illustre.png", "img/dev-illustre.png"],
            "Reservation": ["img/dev-illustre.png"],
            "Dashboard Client": ["img/dev-illustre.png"],
            "Panel Admin": ["img/dev-illustre.png"],
            "Paiement & Factures": ["img/dev-illustre.png"]
        }
    }
];

// ===== GESTION DU MODAL DES PROJETS =====
let currentProjectIndex = 0;

function openProjectModal(projectId) {
    currentProjectIndex = projectId || 0;
    displayProject(currentProjectIndex);
    document.getElementById('projectModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeProjectModal() {
    document.getElementById('projectModal').classList.remove('active');
    document.body.style.overflow = 'auto';
}

function displayProject(index) {
    const project = projects[index];
    
    // Titre et description
    document.getElementById('modalProjectTitle').textContent = project.title;
    document.getElementById('modalProjectDesc').textContent = project.description;
    document.getElementById('modalProjectDetails').innerHTML = project.details;
    
    // Image principale
    const mainImg = document.getElementById('modalProjectImage');
    mainImg.src = project.image;
    mainImg.style.animation = 'fadeIn 0.4s ease-out';
    
    // Thumbnails
    const thumbnailsContainer = document.getElementById('modalThumbnails');
    thumbnailsContainer.innerHTML = '';
    project.images.forEach((img, idx) => {
        const thumb = document.createElement('img');
        thumb.src = img;
        thumb.className = 'modal-thumbnail' + (idx === 0 ? ' active' : '');
        thumb.onclick = () => changeImage(idx);
        thumbnailsContainer.appendChild(thumb);
    });
    
    // Tags
    const tagsContainer = document.getElementById('modalProjectTags');
    tagsContainer.innerHTML = '';
    project.tags.forEach(tag => {
        const tagEl = document.createElement('span');
        tagEl.textContent = tag;
        tagsContainer.appendChild(tagEl);
    });
    
    // Screenshots / Code
    displayProjectScreenshots(project);
    
    // Indicateur de page
    document.getElementById('modalProjectCount').textContent = `${index + 1} / ${projects.length}`;
    
    // État des boutons de navigation
    document.getElementById('modalPrev').disabled = index === 0;
    document.getElementById('modalNext').disabled = index === projects.length - 1;
}

function displayProjectScreenshots(project) {
    // Onglets des catégories
    const tabsContainer = document.getElementById('screenshotsTabs');
    tabsContainer.innerHTML = '';
    
    const categories = Object.keys(project.screenshots);
    
    categories.forEach((category, idx) => {
        const tab = document.createElement('button');
        tab.className = 'screenshot-tab' + (idx === 0 ? ' active' : '');
        tab.textContent = category;
        tab.onclick = () => displayScreenshotCategory(project, category);
        tabsContainer.appendChild(tab);
    });
    
    // Afficher la première catégorie
    if (categories.length > 0) {
        displayScreenshotCategory(project, categories[0]);
    }
}

function displayScreenshotCategory(project, category) {
    const screenshots = project.screenshots[category];
    
    // Mettre à jour l'onglet actif
    document.querySelectorAll('.screenshot-tab').forEach(tab => {
        tab.classList.toggle('active', tab.textContent === category);
    });
    
    // Afficher l'image principale
    const mainImg = document.getElementById('modalScreenshotImage');
    mainImg.src = screenshots[0];
    mainImg.style.animation = 'fadeIn 0.3s ease-out';
    
    // Afficher les vignettes
    const subThumbnailsContainer = document.getElementById('screenshotsSubThumbnails');
    subThumbnailsContainer.innerHTML = '';
    
    screenshots.forEach((img, idx) => {
        const thumb = document.createElement('img');
        thumb.src = img;
        thumb.className = 'screenshot-thumbnail' + (idx === 0 ? ' active' : '');
        thumb.onclick = () => changeScreenshot(screenshots, idx);
        subThumbnailsContainer.appendChild(thumb);
    });
}

function changeScreenshot(screenshots, imageIndex) {
    const mainImg = document.getElementById('modalScreenshotImage');
    mainImg.src = screenshots[imageIndex];
    
    document.querySelectorAll('.screenshot-thumbnail').forEach((thumb, idx) => {
        thumb.classList.toggle('active', idx === imageIndex);
    });
}

function changeImage(imageIndex) {
    const project = projects[currentProjectIndex];
    const mainImg = document.getElementById('modalProjectImage');
    mainImg.src = project.images[imageIndex];
    
    document.querySelectorAll('.modal-thumbnail').forEach((thumb, idx) => {
        thumb.classList.toggle('active', idx === imageIndex);
    });
}

function nextProject() {
    if (currentProjectIndex < projects.length - 1) {
        currentProjectIndex++;
        displayProject(currentProjectIndex);
    }
}

function prevProject() {
    if (currentProjectIndex > 0) {
        currentProjectIndex--;
        displayProject(currentProjectIndex);
    }
}

// ===== EVENT LISTENERS =====

// Clic sur les cartes de projets
document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('click', () => {
        const projectId = parseInt(card.getAttribute('data-project-id'));
        openProjectModal(projectId);
    });
});

// Boutons du modal
document.getElementById('modalClose').addEventListener('click', closeProjectModal);
document.getElementById('modalPrev').addEventListener('click', prevProject);
document.getElementById('modalNext').addEventListener('click', nextProject);

// Fermer le modal en cliquant en dehors du contenu
document.getElementById('projectModal').addEventListener('click', (e) => {
    if (e.target.id === 'projectModal') {
        closeProjectModal();
    }
});

// Navigation au clavier pour le modal
document.addEventListener('keydown', (e) => {
    const modal = document.getElementById('projectModal');
    if (modal.classList.contains('active')) {
        if (e.key === 'ArrowRight') nextProject();
        if (e.key === 'ArrowLeft') prevProject();
        if (e.key === 'Escape') closeProjectModal();
    }
});

// ===== GESTION DU BADGE SLAM =====
const slamCard = document.getElementById('slamCard');
const slamBadge = document.getElementById('slamBadge');

if (slamCard && slamBadge) {
    // Afficher le badge automatiquement après 3.5 secondes (animation du curseur + délai)
    setTimeout(() => {
        slamBadge.style.display = 'block';
    }, 3500);
    
    // Permettre de toggle le badge au clic
    slamCard.addEventListener('click', () => {
        if (slamBadge.style.display === 'none') {
            slamBadge.style.display = 'block';
        } else {
            slamBadge.style.display = 'none';
        }
    });
}

// ===== ANIMATIONS AU CHARGEMENT =====
window.addEventListener('load', () => {
    // Éléments du hero text
    const elementsToAnimate = document.querySelectorAll('.hero-text > *');
    
    elementsToAnimate.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('reveal');
        }, 200 * index);
    });
});

// Gestion du ScrollSpy (Détection de la section active)
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-links li a');
    let current = "";
    let minDist = Infinity;
    const scrollPos = window.scrollY || window.pageYOffset;

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const dist = Math.abs(scrollPos - sectionTop);
        if (dist < minDist) {
            minDist = dist;
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href").includes(current)) {
            link.classList.add("active");
        }
    });
});

// Bouton Contact
const btnContact = document.getElementById('btnContact');
if (btnContact) {
    btnContact.addEventListener('click', function() {
        document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
    });
}