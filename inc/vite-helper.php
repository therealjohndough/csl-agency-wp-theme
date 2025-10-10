<?php
/**
 * Vite Asset Loading Helper
 *
 * Handles loading Vite-built assets with proper development/production support
 */

if (!function_exists('csl_vite_asset')) {
    /**
     * Load Vite assets in development or production mode
     */
    function csl_vite_asset() {
        $is_dev = defined('WP_DEBUG') && WP_DEBUG;
        $theme_url = get_stylesheet_directory_uri();
        $theme_dir = get_stylesheet_directory();

        if ($is_dev && file_exists($theme_dir . '/dist/.vite/manifest.json')) {
            // Development mode - load from Vite dev server
            wp_enqueue_script(
                'vite-client',
                'http://localhost:5173/@vite/client',
                [],
                null,
                false
            );
            wp_script_add_data('vite-client', 'type', 'module');

            wp_enqueue_script(
                'vite-main',
                'http://localhost:5173/src/main.js',
                [],
                null,
                true
            );
            wp_script_add_data('vite-main', 'type', 'module');
        } else {
            // Production mode - load built assets
            $manifest_path = $theme_dir . '/dist/.vite/manifest.json';

            if (file_exists($manifest_path)) {
                $manifest = json_decode(file_get_contents($manifest_path), true);

                if (isset($manifest['src/main.js'])) {
                    $main_entry = $manifest['src/main.js'];

                    // Enqueue CSS
                    if (isset($main_entry['css'])) {
                        foreach ($main_entry['css'] as $i => $css_file) {
                            wp_enqueue_style(
                                'vite-main-css-' . $i,
                                $theme_url . '/dist/' . $css_file,
                                [],
                                null
                            );
                        }
                    }

                    // Enqueue JS
                    wp_enqueue_script(
                        'vite-main-js',
                        $theme_url . '/dist/' . $main_entry['file'],
                        [],
                        null,
                        true
                    );
                    wp_script_add_data('vite-main-js', 'type', 'module');
                }
            }
        }
    }
}

/**
 * Add module preload for better performance
 */
function csl_add_module_preload($tag, $handle, $src) {
    if (strpos($handle, 'vite-') === 0 && strpos($tag, 'type="module"') !== false) {
        return str_replace(' src=', ' crossorigin src=', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'csl_add_module_preload', 10, 3);
