// Animation au chargement
window.addEventListener('load', () => {
    // On cible les éléments de l'accueil
    const elementsToAnimate = document.querySelectorAll('#accueil > *');
    
    // On fait apparaître chaque élément l'un après l'autre (effet cascade)
    elementsToAnimate.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('reveal');
        }, 200 * index); // 200ms de décalage entre chaque ligne
    });
});
window.addEventListener('load', () => {
    // On cible les éléments enfants de .hero-text
    const elementsToAnimate = document.querySelectorAll('.hero-text > *');
    
    elementsToAnimate.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('reveal'); // C'est cette ligne qui rend le texte visible
        }, 200 * index);
    });
});
// Gestion du ScrollSpy (Détection de la section active)
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-links li a');
    
    let current = "";
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - sectionHeight / 3) {
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
document.getElementById('btnContact').addEventListener('click', function() {
    document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
});