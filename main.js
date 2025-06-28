document.addEventListener('DOMContentLoaded', function () {

    // --- 1. PRELOADER & INITIAL CONTENT LOAD ---
    const preloader = document.getElementById('preloader');
    const mainContent = document.getElementById('main-content');

    // Use window.onload for reliability, ensuring all assets are loaded.
    window.onload = function() {
        if (preloader) {
            preloader.classList.add('preloader-hidden');

            // Set a failsafe timeout to hide the preloader in case the
            // transitionend event doesn't fire for some reason.
            const preloaderFailsafe = setTimeout(() => {
                preloader.style.display = 'none';
            }, 1000); // Duration should be > transition duration in CSS

            preloader.addEventListener('transitionend', function() {
                clearTimeout(preloaderFailsafe); // Clear the failsafe
                preloader.style.display = 'none'; // Remove from layout flow
            });
        }

        if (mainContent) {
            mainContent.classList.add('loaded');
        }
    };


    // --- 2. MOBILE NAVIGATION ---
    const hamburger = document.getElementById('hamburger-menu');
    const navMenu = document.getElementById('main-navigation');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            const isActive = navMenu.classList.toggle('is-active');
            hamburger.classList.toggle('is-active');
            
            // Set ARIA attribute for accessibility.
            hamburger.setAttribute('aria-expanded', isActive);

            const icon = hamburger.querySelector('i');
            if (icon) {
                if (isActive) {
                    icon.classList.remove('ph-list');
                    icon.classList.add('ph-x');
                } else {
                    icon.classList.remove('ph-x');
                    icon.classList.add('ph-list');
                }
            }
        });
    }


    // --- 3. SCROLL-TRIGGERED FADE-IN ANIMATIONS ---
    // This replaces the need for GSAP for simple fade-up effects.
    const animatedElements = document.querySelectorAll('.anim-fade-in-up');

    if (animatedElements.length > 0) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                // If the element is in the viewport
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Stop observing the element once it's visible
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1 // Trigger when 10% of the element is visible
        });

        // Attach the observer to each animated element
        animatedElements.forEach(el => {
            observer.observe(el);
        });
    }

});
