/**
 * Main JavaScript for CSL Agency Theme
 *
 * This file handles:
 * 1. The mobile navigation hamburger menu toggle.
 * 2. The scroll-reveal animations for content.
 * 3. Mobile loading state management to prevent horizontal scrolling.
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // --- Mobile Loading State Management ---
    // Add page-loaded class after DOM is ready to prevent mobile horizontal scroll during load
    setTimeout(() => {
        document.body.classList.add('page-loaded');
    }, 100);
    
    // Additional safety: ensure page-loaded is added after window load
    window.addEventListener('load', () => {
        document.body.classList.add('page-loaded');
    });
    
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
        // Check if user prefers reduced motion
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        if (prefersReducedMotion) {
            // Just show all elements if user prefers reduced motion
            animatedElements.forEach(element => {
                element.classList.add('is-visible');
            });
        } else {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px' // Trigger slightly before element enters viewport
            });

            animatedElements.forEach(element => {
                observer.observe(element);
            });
        }
    }
    
    // --- 3. Mobile-Specific Fixes ---
    // Prevent horizontal scroll during resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        document.body.style.overflow = 'hidden';
        resizeTimer = setTimeout(() => {
            document.body.style.overflow = '';
        }, 150);
    });
});