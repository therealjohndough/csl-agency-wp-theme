/**
 * Main JavaScript for Aura-Grid Machina Enhanced Theme
 *
 * This file handles:
 * 1. The mobile navigation hamburger menu toggle.
 * 2. The scroll-reveal animations for content.
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // --- 1. Mobile Navigation (Hamburger Menu) ---
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const body = document.body;

    if (hamburgerMenu) {
        hamburgerMenu.addEventListener('click', function() {
            // Just toggle the class. The CSS will handle the rest (scroll lock, animations).
            body.classList.toggle('nav-active');

            // Set aria-expanded for accessibility
            const isExpanded = body.classList.contains('nav-active');
            hamburgerMenu.setAttribute('aria-expanded', isExpanded);
        });
    }

    // --- Graceful UX: Close mobile nav when a menu link is clicked ---
    const navLinks = document.querySelectorAll('.main-navigation a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            // If the menu is open, remove the active class to close it.
            if (body.classList.contains('nav-active')) {
                body.classList.remove('nav-active');
                hamburgerMenu.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // --- 2. Scroll-Reveal Animations ---
    const animatedElements = document.querySelectorAll('.anim-reveal, .anim-slide-left, .anim-slide-right, .anim-fade-in');

    if (animatedElements.length > 0) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        animatedElements.forEach(element => {
            observer.observe(element);
        });
    }
});