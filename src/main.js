/**
 * Main entry point for Vite build
 * Includes Tailwind CSS and Alpine.js
 */

// Import Tailwind CSS
import './styles.css';

// Import Alpine.js
import Alpine from 'alpinejs';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const body = document.body;

    if (hamburgerMenu) {
        hamburgerMenu.addEventListener('click', function() {
            body.classList.toggle('nav-active');
            const isExpanded = body.classList.contains('nav-active');
            hamburgerMenu.setAttribute('aria-expanded', isExpanded);
        });
    }

    const navLinks = document.querySelectorAll('.main-navigation a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (body.classList.contains('nav-active')) {
                body.classList.remove('nav-active');
                hamburgerMenu.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // Scroll-Reveal Animations
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
