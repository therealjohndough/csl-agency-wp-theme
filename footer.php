<?php
/**
 * The template for displaying the footer with a three-row layout.
 *
 * @package Neo-Brutalist Dynamic
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="container">

            <!-- Row 1: Social Media Links -->
            <div class="footer-row footer-socials">
                <ul class="social-links-list">
                    <li>
                        <a href="https://www.instagram.com/case_study_labs/" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Case Study Labs on Instagram', 'neobrutalist'); ?>">
                            <i class="ph-bold ph-instagram-logo"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/case-study-labs" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Case Study Labs on LinkedIn', 'neobrutalist'); ?>">
                            <i class="ph-bold ph-linkedin-logo"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Row 2: Copyright Information -->
            <div class="footer-row footer-copyright">
                <p>
                    <?php
                    printf(
                        /* translators: 1: Current Year, 2: Site Name. */
                        esc_html__( '© %1$s %2$s. ALL RIGHTS RESERVED.', 'neobrutalist' ),
                        date_i18n( 'Y' ),
                        get_bloginfo( 'name' )
                    );
                    ?>
                </p>
            </div>

            <!-- Row 3: Designer Credit -->
            <div class="footer-row footer-credit">
                <p>
                    <?php
                    printf(
                        wp_kses_post( /* Allows the <a> tag */
                            /* translators: %s: a link to the designer's website. */
                            __( 'DESIGN & DEV BY %s', 'neobrutalist' )
                        ),
                        '<a href="https://www.johndoughstudios.com" target="_blank" rel="noopener noreferrer">JOHN DOUGH D\'ANGELO</a>'
                    );
                    ?>
                </p>
            </div>

        </div>
    </footer>

</div><!-- #main-content -->

<?php wp_footer(); ?>

</body>
</html>