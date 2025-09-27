<?php
/**
 * CSL Agency Theme — functions.php
 *
 * @package CSL_Agency
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/*--------------------------------------------------------------
# ACF Fallback Functions
--------------------------------------------------------------*/
if (!function_exists('get_field')) {
    function get_field($field_name, $post_id = null) {
        return get_post_meta($post_id ?: get_the_ID(), $field_name, true);
    }
}

if (!function_exists('the_field')) {
    function the_field($field_name, $post_id = null) {
        echo get_field($field_name, $post_id);
    }
}

if (!function_exists('have_rows')) {
    function have_rows($field_name, $post_id = null) {
        return false; // Simple fallback
    }
}

if (!function_exists('the_row')) {
    function the_row() {
        return false;
    }
}

if (!function_exists('get_sub_field')) {
    function get_sub_field($field_name) {
        return '';
    }
}

/*--------------------------------------------------------------
# Theme Setup
--------------------------------------------------------------*/
function csl_agency_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ]);
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus([
        'primary' => __('Primary Menu', 'csl-agency'),
    ]);
    
    // Load text domain
    load_theme_textdomain('csl-agency', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'csl_agency_theme_setup');

/*--------------------------------------------------------------
# Enqueue Scripts & Styles
--------------------------------------------------------------*/
function csl_agency_enqueue_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // Main Theme Stylesheet
    $style_path = get_stylesheet_directory() . '/style.css';
    $css_version = is_file($style_path) ? ($theme_version . '.' . filemtime($style_path)) : $theme_version;
    wp_enqueue_style('csl-agency-style', get_stylesheet_uri(), [], $css_version);
    
    // Enqueue modular component CSS if files exist
    $contact_form_css = get_template_directory() . '/assets/css/components/contact-form.css';
    if (file_exists($contact_form_css)) {
        wp_enqueue_style('csl-contact-form', 
            get_template_directory_uri() . '/assets/css/components/contact-form.css', 
            ['csl-agency-style'], 
            $css_version
        );
    }
    
    // Inline critical contact form styles to ensure they always load
    $inline_form_css = "
    .csl-contact-form { max-width: 100%; margin: 0 auto; }
    .csl-form { display: flex; flex-direction: column; gap: 1.5rem; width: 100%; }
    .csl-form .input { 
        padding: 0.75rem; 
        border: 1px solid rgba(255, 255, 255, 0.3); 
        border-radius: 8px; 
        background: rgba(0, 0, 0, 0.3); 
        color: var(--color-text-primary); 
        font-size: 1rem; 
        width: 100%; 
        box-sizing: border-box; 
    }
    .csl-form .submit { 
        background: var(--color-primary-500); 
        border: none; 
        padding: 0.75rem 1.5rem; 
        border-radius: 8px; 
        color: #ffffff; 
        font-weight: 600; 
        cursor: pointer; 
    }
    @media (max-width: 768px) { 
        .csl-form .form-group { flex-direction: column; }
        .csl-form .submit { width: 100%; }
        .csl-form .input { font-size: 16px; }
    }";
    wp_add_inline_style('csl-agency-style', $inline_form_css);

wp_enqueue_style(
    'google-fonts',
    // We are now loading Montserrat with several weights for design flexibility.
    // Fira Code is still here. If you don't use it for code blocks, you can remove it too.
    'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Fira+Code:wght@400;500&display',
        [],
        null
    );

    // Main Theme JavaScript
    $main_js_path = get_stylesheet_directory() . '/main.js';
    if (file_exists($main_js_path)) {
        $js_version = $theme_version . '.' . filemtime($main_js_path);
        wp_enqueue_script('auragrid-main-js', get_stylesheet_directory_uri() . '/main.js', [], $js_version, true);
    }
}

  if ( is_page('new-ticket') ) {
        $ticket_css_path = get_stylesheet_directory() . '/assets/css/csl-ticket-form-styles.css';
        if ( file_exists($ticket_css_path) ) {
            wp_enqueue_style(
                'csl-ticket-form-styles', // A unique name for this stylesheet
                get_stylesheet_directory_uri() . '/assets/css/csl-ticket-form-styles.css',
                [], // No dependencies
                filemtime($ticket_css_path) // Cache-busting
            );
        }
    }
    
add_action('wp_enqueue_scripts', 'csl_agency_enqueue_scripts');

/*--------------------------------------------------------------
# Include Custom Components
--------------------------------------------------------------*/
require_once get_template_directory() . '/inc/contact-form-shortcode.php';
require_once get_template_directory() . '/inc/create-thank-you-page.php';

/*--------------------------------------------------------------
# Custom Post Type: Case Studies
--------------------------------------------------------------*/
function register_casestudy_post_type() {
    register_post_type('casestudy', [
        'labels' => [
            'name'               => 'Case Studies',
            'singular_name'      => 'Case Study',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Case Study',
            'edit_item'          => 'Edit Case Study',
            'new_item'           => 'New Case Study',
            'view_item'          => 'View Case Study',
            'search_items'       => 'Search Case Studies',
            'not_found'          => 'No case studies found',
            'not_found_in_trash' => 'No case studies found in Trash',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'case-studies'],
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'excerpt', 'thumbnail'],
        'taxonomies'   => ['post_tag'],
        'menu_position'=> 20,
        'menu_icon'    => 'dashicons-portfolio',
    ]);
}
add_action('init', 'register_casestudy_post_type');

/*--------------------------------------------------------------
# Custom Post Type: Client Projects
--------------------------------------------------------------*/
function register_client_project_post_type() {
    register_post_type('client_project', [
        'labels' => [
            'name'               => 'Client Projects',
            'singular_name'      => 'Client Project',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Client Project',
            'edit_item'          => 'Edit Client Project',
            'new_item'           => 'New Client Project',
            'view_item'          => 'View Project',
            'search_items'       => 'Search Client Projects',
            'not_found'          => 'No projects found',
            'not_found_in_trash' => 'No projects found in Trash',
        ],
        'public'       => false,  // This is IMPORTANT - makes it not publicly viewable
        'show_ui'      => true,   // You want to see this in the admin dashboard
        'has_archive'  => false,  // No public archive page
        'rewrite'      => false,  // Not needed for a private CPT
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'menu_position'=> 21,
        'menu_icon'    => 'dashicons-businessperson',
    ]);
}
add_action('init', 'register_client_project_post_type');



/*--------------------------------------------------------------
# Term Pill Utility Function
--------------------------------------------------------------*/
function get_custom_taxonomy_term_color($term_slug) {
    $term_slug = strtolower(trim($term_slug));

    $map = [
        // Project Types
        'branding'              => '#9b59b6',
        'web-design'            => '#3498db',
        'wordpress-development' => '#21759B',
        'e-commerce'            => '#2ecc71',
        'campaign'              => '#e67e22',
        'packaging'             => '#e91e63',
        'photo-video'           => '#8e44ad',
        'activation'            => '#f39c12',
        'social'                => '#00bcd4',
        // Industries
        'cannabis'              => '#1abc9c',
        'food-beverage'         => '#f39c12',
        'health-wellness'       => '#e74c3c',
        'technology'            => '#9b59b6',
        'fashion-apparel'       => '#e91e63',
        'hospitality'           => '#34495e',
        'art-culture'           => '#ff69b4',
    ];

    return $map[$term_slug] ?? '#7f8c8d';
}

/*--------------------------------------------------------------
# Custom Nav Walker with Stagger Animations
--------------------------------------------------------------*/
class Aura_Grid_Nav_Walker extends Walker_Nav_Menu {
    private $stagger_index = 0;

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $this->stagger_index++;
        $class_names = esc_attr( implode(' ', array_filter($item->classes)) );
        $output .= '<li class="' . $class_names . '" style="--stagger-index: ' . intval($this->stagger_index) . ';">';

        $atts = [
            'title'  => ! empty($item->attr_title) ? $item->attr_title : '',
            'target' => ! empty($item->target)     ? $item->target     : '',
            'rel'    => ! empty($item->xfn)        ? $item->xfn        : '',
            'href'   => ! empty($item->url)        ? $item->url        : '',
        ];

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ($attr === 'href') ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

/*--------------------------------------------------------------
# Redirect Legacy Pages (with exit)
--------------------------------------------------------------*/
add_action('template_redirect', function() {
    if (is_page('work'))  { wp_redirect(home_url('/case-studies/'), 301); exit; }
    if (is_page('about')) { wp_redirect(home_url('/studio/'), 301); exit; }
});

/*--------------------------------------------------------------
# Google Ads Conversion helper
--------------------------------------------------------------*/
add_action('wp_footer', function () {
    ?>
    <script>
    function gtag_report_conversion(url) {
        var callback = function () { if (typeof url !== 'undefined') window.location = url; };
        if (typeof gtag !== 'undefined') {
            gtag('event', 'conversion', {
                'send_to': 'AW-11148637787/uW4UCK-zrIUbENvsisQp',
                'event_callback': callback
            });
        } else {
            console.warn('gtag is not loaded.');
            callback();
        }
        return false;
    }
    </script>
    <?php
});

/*--------------------------------------------------------------
# Includes (safe)
--------------------------------------------------------------*/
$includes = [
    '/inc/csl-customizer.php',
    '/inc/csl-logo-grid-customizer.php',
    '/inc/client-portal-shortcode.php',
    '/inc/client-portal-acf.php',
    '/inc/client-portal-login.php',
    ];
foreach ($includes as $rel) {
    $path = get_template_directory() . $rel;
    if (file_exists($path)) {
        require_once $path;
    }
}

// About page customizer (safe include)
$about_customizer_file = get_template_directory() . '/inc/about-customizer.php';
if ( file_exists( $about_customizer_file ) ) {
  require_once $about_customizer_file;
}

/*--------------------------------------------------------------
# JSON-LD (homepage + process + offer + single post author E-E-A-T)
--------------------------------------------------------------*/
if (!function_exists('csl_emit_schema_graph')) {
  function csl_emit_schema_graph() {
    $site      = home_url('/');
    $lang      = get_bloginfo('language') ? get_bloginfo('language') : 'en-US';

    /* ---------- HOMEPAGE GRAPH ---------- */
    if (is_front_page() || is_home()) {
      $canonical = $site;
      $orgId     = $site . '#organization';
      $siteId    = $site . '#website';
      $pageId    = $canonical . '#webpage';
      $logoId    = $site . '#logo';
      $founderId = $site . '#founder';
      $catalogId = $site . '#offer-catalog';
      $faqId     = $site . '#faq';

      $logoUrl = 'https://casestudy-labs.com/wp-content/uploads/2025/07/CSL-SMALL-WEB.png';

      $areas = [
        ['@type'=>'AdministrativeArea','name'=>'New York'],
        ['@type'=>'Country','name'=>'United States'],
        ['@type'=>'Country','name'=>'Canada'],
        ['@type'=>'Country','name'=>'United Kingdom']
      ];

      $graph = [
        [
          '@type' => 'Organization',
          '@id'   => $orgId,
          'name'  => 'Case Study Labs',
          'url'   => $site,
          'logo'  => ['@type'=>'ImageObject','@id'=>$logoId,'url'=>$logoUrl,'width'=>150,'height'=>60],
          'sameAs'=> ['https://www.instagram.com/case_study_labs/','https://www.linkedin.com/company/case-study-labs/'],
          'areaServed' => $areas,
          'contactPoint' => [['@type'=>'ContactPoint','contactType'=>'sales','email'=>'hello@casestudylabs.com','areaServed'=>'US']],
          'founder' => ['@id' => $founderId]
        ],
        [
          '@type'=>'WebSite',
          '@id'  => $siteId,
          'url'  => $site,
          'name' => 'Case Study Labs',
          'publisher' => ['@id'=>$orgId],
          'inLanguage'=>$lang
        ],
        [
          '@type'=>'Person',
          '@id'  => $founderId,
          'name' => 'John Dough D’Angelo',
          'alternateName' => ['John D’Angelo','John Dough','Dough'],
          'jobTitle'  => 'Founder & Chief Strategist',
          'url'       => 'https://johndoughstudios.com/',
          'sameAs'    => [
            'https://www.linkedin.com/in/john-dough-dangelo/',
            'https://www.instagram.com/case_study_labs/',
            'https://casestudy-labs.com',
            'https://theothermagazines.com'
          ],
          'worksFor'  => [
            ['@type'=>'Organization','@id'=>$orgId],
            ['@type'=>'Organization','@id'=>'https://theothermagazines.com/#organization','name'=>'The Other Magazines','url'=>'https://theothermagazines.com']
          ],
          'description' => 'Founder & Chief Strategist at Case Study Labs and Head of Digital Products at The Other Magazines.',
          'knowsAbout'=> ['Cannabis Branding','Cannabis Packaging Design','Compliant Marketing','WordPress Development','Content Strategy']
        ]
      ];

      $payload = ['@context'=>'https://schema.org','@graph'=>$graph];
      echo '<script type="application/ld+json">' . wp_json_encode($payload, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
    }

    /* ---------- PROCESS PAGE HOWTO ---------- */
    if (is_page_template('page-our-process.php')) {
      $process_url = get_permalink() ? get_permalink() : home_url('/our-process/');
      $howto = [
        '@context' => 'https://schema.org',
        '@type'    => 'HowTo',
        '@id'      => trailingslashit($process_url) . '#howto',
        'name'     => 'Case Study Labs — Strategic Consulting Process',
        'publisher'=> ['@id' => $site . '#organization']
      ];
      echo '<script type="application/ld+json">' . wp_json_encode($howto, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
    }

    /* ---------- OFFER PAGE ---------- */
    if (is_page_template('page-cannabis-advertising-offer.php')) {
      $page_url = get_permalink();
      $offer_id = trailingslashit($page_url) . '#offer';
      $graph = [
        [
          '@type' => 'Offer',
          '@id'   => $offer_id,
          'name'  => 'Cannabis Advertising Campaign',
          'provider' => [ '@id' => $site . '#organization' ]
        ]
      ];
      $payload = ['@context'=>'https://schema.org','@graph'=>$graph];
      echo '<script type="application/ld+json">' . wp_json_encode($payload, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
    }

    /* ---------- SINGLE POST AUTHOR EEAT ---------- */
    if (is_single() && 'post' === get_post_type()) {
      $author_id   = get_the_author_meta('ID');
      $author_name = get_the_author_meta('display_name');
      $author_url  = get_author_posts_url($author_id);
      $post_url    = get_permalink();
      $post_title  = get_the_title();
      $post_date   = get_the_date('c');
      $post_mod    = get_the_modified_date('c');

      $author_schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Person',
        '@id'      => $site . '#founder',
        'name'     => 'John Dough D’Angelo',
        'alternateName' => ['John D’Angelo','John Dough','Dough'],
        'url'      => $author_url,
        'sameAs'   => [
          'https://www.linkedin.com/in/john-dough-dangelo/',
          'https://www.instagram.com/case_study_labs/',
          'https://casestudy-labs.com',
          'https://theothermagazines.com'
        ],
        'worksFor' => [
          ['@type'=>'Organization','@id'=>$site . '#organization'],
          ['@type'=>'Organization','@id'=>'https://theothermagazines.com/#organization']
        ]
      ];

      $article_schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Article',
        'headline' => $post_title,
        'url'      => $post_url,
        'datePublished' => $post_date,
        'dateModified'  => $post_mod,
        'author'   => ['@id' => $site . '#founder'],
        'publisher'=> ['@id' => $site . '#organization'],
        'mainEntityOfPage' => $post_url
      ];

      echo '<script type="application/ld+json">' . wp_json_encode($author_schema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
      echo '<script type="application/ld+json">' . wp_json_encode($article_schema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
    }
  }
  add_action('wp_head', 'csl_emit_schema_graph', 20);

  /* ---------- GENERIC PAGES & ARCHIVES (catch-all) ---------- */
{
  $site   = home_url('/');
  $orgId  = $site . '#organization';
  $siteId = $site . '#website';
  $personId = $site . '#person-john-dough-dangelo'; // your canonical author @id
  $lang   = get_bloginfo('language') ?: 'en-US';

  // 1) Standard PAGES (anything that's a Page but not front page)
  if ( is_page() && ! is_front_page() ) {
    $url   = get_permalink();
    $title = wp_strip_all_tags( get_the_title() );
    $pub   = get_the_date('c');
    $mod   = get_the_modified_date('c');

    $img = '';
    if ( has_post_thumbnail() ) {
      $img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
      if ( ! empty($img_src[0]) ) {
        $img = [
          '@type' => 'ImageObject',
          'url'   => $img_src[0],
          'width' => isset($img_src[1]) ? intval($img_src[1]) : null,
          'height'=> isset($img_src[2]) ? intval($img_src[2]) : null
        ];
      }
    }

    $webpage = [
      '@context' => 'https://schema.org',
      '@type'    => 'WebPage',
      '@id'      => trailingslashit($url) . '#webpage',
      'url'      => $url,
      'name'     => $title ?: get_bloginfo('name'),
      'isPartOf' => [ '@id' => $siteId ],
      'inLanguage'=> $lang,
      'datePublished' => $pub,
      'dateModified'  => $mod,
      'publisher'=> [ '@id' => $orgId ],
      // include author if you want to reinforce E-E-A-T on pages
      'author'   => [ '@id' => $personId ],
    ];
    if ( $img ) { $webpage['primaryImageOfPage'] = $img; }

    echo '<script type="application/ld+json">' . wp_json_encode($webpage, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
  }

  // 2) Custom post type: Case Studies (emit as Article-like)
  if ( is_singular('casestudy') ) {
    $url    = get_permalink();
    $title  = wp_strip_all_tags( get_the_title() );
    $pub    = get_the_date('c');
    $mod    = get_the_modified_date('c');
    $imgUrl = '';
    if ( has_post_thumbnail() ) {
      $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
      if ( ! empty($img[0]) ) $imgUrl = $img[0];
    }

    $cs = [
      '@context' => 'https://schema.org',
      '@type'    => 'Article',
      'headline' => $title,
      'mainEntityOfPage' => [ '@type'=>'WebPage', '@id'=>$url ],
      'url'      => $url,
      'datePublished' => $pub,
      'dateModified'  => $mod,
      'publisher'=> [ '@id' => $orgId ],
      'author'   => [ '@id' => $personId ]
    ];
    if ( $imgUrl ) { $cs['image'] = [$imgUrl]; }

    echo '<script type="application/ld+json">' . wp_json_encode($cs, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
  }

  // 3) Archives (category/tag/post type archives): CollectionPage + BreadcrumbList
  if ( is_archive() ) {
    $url   = ( function_exists('get_pagenum_link') ? get_pagenum_link() : home_url( add_query_arg( null, null ) ) );
    $title = wp_get_document_title(); // nice, context aware
    $collection = [
      '@context' => 'https://schema.org',
      '@type'    => 'CollectionPage',
      '@id'      => trailingslashit($url) . '#collection',
      'url'      => $url,
      'name'     => $title,
      'isPartOf' => [ '@id' => $siteId ],
      'inLanguage'=> $lang,
      'publisher'=> [ '@id' => $orgId ]
    ];
    echo '<script type="application/ld+json">' . wp_json_encode($collection, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';

    // Breadcrumbs (simple 2–3 levels)
    $crumbs = [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => get_bloginfo('name'),
        'item' => home_url('/')
      ],
      [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => $title,
        'item' => $url
      ]
    ];
    $breadcrumbs = [
      '@context' => 'https://schema.org',
      '@type'    => 'BreadcrumbList',
      'itemListElement' => $crumbs
    ];
    echo '<script type="application/ld+json">' . wp_json_encode($breadcrumbs, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . '</script>';
  }
}

}

/*--------------------------------------------------------------
# Process Customizer Controls (wrapped correctly)
--------------------------------------------------------------*/
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
  // Section: CTAs
  $wp_customize->add_section('csl_process_ctas', [
    'title' => __('CTAs', 'auragrid'),
    'panel' => 'csl_process_panel',
  ]);

  $wp_customize->add_setting('csl_process_cta_primary_text', [
    'default'           => __('Book Strategy Call','auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control('csl_process_cta_primary_text', [
    'label'   => __('Primary CTA Text', 'auragrid'),
    'section' => 'csl_process_ctas',
    'type'    => 'text',
  ]);

  $wp_customize->add_setting('csl_process_cta_primary_url', [
    'default'           => home_url('/contact/'),
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('csl_process_cta_primary_url', [
    'label'   => __('Primary CTA URL', 'auragrid'),
    'section' => 'csl_process_ctas',
    'type'    => 'url',
  ]);

  $wp_customize->add_setting('csl_process_cta_secondary_text', [
    'default'           => __('Take the Quick Strategic Quiz','auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control('csl_process_cta_secondary_text', [
    'label'   => __('Secondary CTA Text', 'auragrid'),
    'section' => 'csl_process_ctas',
    'type'    => 'text',
  ]);

  $wp_customize->add_setting('csl_process_cta_secondary_url', [
    'default'           => 'https://casestudy-labs.com/case-study-labs-quiz/',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('csl_process_cta_secondary_url', [
    'label'   => __('Secondary CTA URL', 'auragrid'),
    'section' => 'csl_process_ctas',
    'type'    => 'url',
  ]);

  // Section: Steps (JSON)
  $wp_customize->add_section('csl_process_steps', [
    'title' => __('Steps (JSON)', 'auragrid'),
    'panel' => 'csl_process_panel',
  ]);

  $default_steps = json_encode([
    ['title'=>'Discovery, Not Therapy','desc'=>'We get brutally clear on goals, constraints, budget, and what “win” means in numbers.','out'=>'Fit Check & Next Steps','slug'=>'discovery'],
    ['title'=>'Flash Audit','desc'=>'Brand, site, data, funnel. We hunt for friction, leaks, and leverage.','out'=>'Findings Brief (1–2 pages)','slug'=>'flash-audit'],
    ['title'=>'Strategy Sprint','desc'=>'Positioning, audience slices, offers, channels. Less theory, more moves.','out'=>'Strategy One-Pager','slug'=>'strategy-sprint'],
    ['title'=>'Message + Prototype','desc'=>'We build a click-through concept (landing/ad set) and put your story under heat.','out'=>'Prototype & Copy Deck','slug'=>'message-prototype'],
    ['title'=>'90-Day Plan','desc'=>'Sequence, resourcing, owners, and non-negotiable milestones.','slug'=>'90-day-plan','out'=>'Execution Roadmap'],
    ['title'=>'Measure, Optimize, Repeat','desc'=>'Simple analytics tied to revenue. No vanity dashboards allowed.','out'=>'KPI Sheet & Cadence','slug'=>'measure-optimize'],
  ], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

  $wp_customize->add_setting('csl_process_steps_json', [
    'default'           => $default_steps,
    // Keep sanitize light; we validate in template and fall back to defaults if broken.
    'sanitize_callback' => function($v){ return is_string($v) ? wp_kses_post($v) : ''; },
  ]);

  if ( class_exists('WP_Customize_Code_Editor_Control') ) {
    $wp_customize->add_control( new WP_Customize_Code_Editor_Control(
      $wp_customize,
      'csl_process_steps_json',
      [
        'label'       => __('Steps JSON', 'auragrid'),
        'section'     => 'csl_process_steps',
        'code_type'   => 'application/json',
        'description' => __('Array of steps: [{"title":"","desc":"","out":"","slug":""}, ...]', 'auragrid'),
      ]
    ));
  } else {
    $wp_customize->add_control('csl_process_steps_json', [
      'label'       => __('Steps JSON', 'auragrid'),
      'section'     => 'csl_process_steps',
      'type'        => 'textarea',
      'description' => __('Array of steps: [{"title":"","desc":"","out":"","slug":""}, ...]', 'auragrid'),
    ]);
  }

  // Section: FAQ (JSON)
  $wp_customize->add_section('csl_process_faq', [
    'title' => __('FAQ (JSON)', 'auragrid'),
    'panel' => 'csl_process_panel',
  ]);

  $default_faq = json_encode([
    ['q'=>'How fast is the Strategy Sprint?','a'=>'Typically 10 business days, start to finish. Prototype included.'],
    ['q'=>'What’s the investment?','a'=>'Scope-based. Strategy Sprints start lean; execution is modular so you’re not paying for a circus you don’t need.'],
    ['q'=>'Can you work with our in-house team?','a'=>'Absolutely. We love being your unfair advantage — and leaving you with systems, not dependency.'],
  ], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

  $wp_customize->add_setting('csl_process_faq_json', [
    'default'           => $default_faq,
    'sanitize_callback' => function($v){ return is_string($v) ? wp_kses_post($v) : ''; },
  ]);

  if ( class_exists('WP_Customize_Code_Editor_Control') ) {
    $wp_customize->add_control( new WP_Customize_Code_Editor_Control(
      $wp_customize,
      'csl_process_faq_json',
      [
        'label'       => __('FAQ JSON', 'auragrid'),
        'section'     => 'csl_process_faq',
        'code_type'   => 'application/json',
        'description' => __('Array of Q&A: [{"q":"","a":""}, ...]', 'auragrid'),
      ]
    ));
  } else {
    $wp_customize->add_control('csl_process_faq_json', [
      'label'       => __('FAQ JSON', 'auragrid'),
      'section'     => 'csl_process_faq',
      'type'        => 'textarea',
      'description' => __('Array of Q&A: [{"q":"","a":""}, ...]', 'auragrid'),
    ]);
  }
});

/*--------------------------------------------------------------
# Disable update notifications for specific plugins (admin-only UX)
--------------------------------------------------------------*/
function disable_specific_plugin_updates($value) {
    if (isset($value->response) && is_object($value->response)) {
        // ACF Extended PRO
        unset($value->response['acf-extended-pro/acf-extended.php']);
        // All-in-One WP Migration
        unset($value->response['all-in-one-wp-migration/all-in-one-wp-migration.php']);
        // WP All Export Pro
        unset($value->response['wp-all-export-pro/wp-all-export-pro.php']);
        unset($value->response['wp_all_export_pro/wp_all_export_pro.php']);
        // WP All Import Pro
        unset($value->response['wp-all-import-pro/wp-all-import-pro.php']);
        unset($value->response['wp_all_import_pro/wp_all_import_pro.php']);
        // WP All Import - ACF Add-On
        unset($value->response['wpai-acf-add-on/wpai-acf-add-on.php']);
        unset($value->response['wp-all-import-acf-add-on/wp-all-import-acf-add-on.php']);
    }
    return $value;
}
add_filter('site_transient_update_plugins', 'disable_specific_plugin_updates');

// Hide plugin update notifications on the plugins page
function hide_plugin_update_notices_admin() {
    echo '<style>
        .plugin-update-tr,
        .update-message,
        tr.plugin-update-tr {
            display: none !important;
        }
    </style>';
}
add_action('admin_head-plugins.php', 'hide_plugin_update_notices_admin');

/*--------------------------------------------------------------
# Body class
--------------------------------------------------------------*/
add_filter('body_class', function ($classes) {
  if (is_page('case-study-labs-quiz')) {
    $classes[] = 'quiz-immersive';
  }
  return $classes;
});

/*--------------------------------------------------------------
# TE Theme CSS Enqueue — and remove base CSS if desired
--------------------------------------------------------------*/
function auragrid_enqueue_te_theme() {
    $theme_version = wp_get_theme()->get('Version');
    // Load TE theme CSS only
    wp_enqueue_style(
        'te-theme',
        get_stylesheet_directory_uri() . '/assets/css/te-theme.css',
        [],
        $theme_version,
        'screen'
    );
}
add_action('wp_enqueue_scripts', 'auragrid_enqueue_te_theme', 20);

// Remove existing CSS enqueue to avoid conflicts
function remove_existing_theme_styles() {
    wp_dequeue_style('auragrid-style');
}
add_action('wp_enqueue_scripts', 'remove_existing_theme_styles', 5);

/*--------------------------------------------------------------
# Under Construction Hero Customizer Controls
--------------------------------------------------------------*/
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
  // Panel for Under Construction
  $wp_customize->add_panel('csl_construction_panel', [
    'title'       => __('Under Construction Hero', 'auragrid'),
    'description' => __('Controls for the Under Construction/Coming Soon hero section.', 'auragrid'),
    'priority'    => 50,
  ]);

  // Section: General Settings
  $wp_customize->add_section('csl_construction_general', [
    'title' => __('General Settings', 'auragrid'),
    'panel' => 'csl_construction_panel',
  ]);

  // Enable/Disable Toggle
  $wp_customize->add_setting('csl_construction_hero_enabled', [
    'default'           => false,
    'sanitize_callback' => function($v) { return (bool) $v; },
    'transport'         => 'refresh',
  ]);
  $wp_customize->add_control('csl_construction_hero_enabled', [
    'label'   => __('Enable Under Construction Hero', 'auragrid'),
    'section' => 'csl_construction_general',
    'type'    => 'checkbox',
    'description' => __('When enabled, replaces the normal case studies page with an under construction message.', 'auragrid'),
  ]);

  // Section: Content
  $wp_customize->add_section('csl_construction_content', [
    'title' => __('Content', 'auragrid'),
    'panel' => 'csl_construction_panel',
  ]);

  // Main Title
  $wp_customize->add_setting('csl_construction_hero_title', [
    'default'           => __('Under Construction', 'auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control('csl_construction_hero_title', [
    'label'   => __('Main Title', 'auragrid'),
    'section' => 'csl_construction_content',
    'type'    => 'text',
  ]);

  // Subtitle
  $wp_customize->add_setting('csl_construction_hero_subtitle', [
    'default'           => __('Coming Soon', 'auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control('csl_construction_hero_subtitle', [
    'label'   => __('Subtitle', 'auragrid'),
    'section' => 'csl_construction_content',
    'type'    => 'text',
  ]);

  // Description
  $wp_customize->add_setting('csl_construction_hero_description', [
    'default'           => __("We're working hard to bring you something amazing. Check back soon!", 'auragrid'),
    'sanitize_callback' => function($v) { return wp_kses_post($v); },
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control('csl_construction_hero_description', [
    'label'   => __('Description', 'auragrid'),
    'section' => 'csl_construction_content',
    'type'    => 'textarea',
  ]);

  // CTA Text
  $wp_customize->add_setting('csl_construction_hero_cta_text', [
    'default'           => __('Get Notified', 'auragrid'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control('csl_construction_hero_cta_text', [
    'label'   => __('CTA Button Text', 'auragrid'),
    'section' => 'csl_construction_content',
    'type'    => 'text',
  ]);

  // CTA URL
  $wp_customize->add_setting('csl_construction_hero_cta_url', [
    'default'           => '#',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('csl_construction_hero_cta_url', [
    'label'   => __('CTA Button URL', 'auragrid'),
    'section' => 'csl_construction_content',
    'type'    => 'url',
  ]);

  // Section: Styling
  $wp_customize->add_section('csl_construction_styling', [
    'title' => __('Styling', 'auragrid'),
    'panel' => 'csl_construction_panel',
  ]);

  // Background Color
  $wp_customize->add_setting('csl_construction_hero_bg_color', [
    'default'           => '#1a1a1a',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'csl_construction_hero_bg_color', [
    'label'   => __('Background Color', 'auragrid'),
    'section' => 'csl_construction_styling',
  ]));

  // Text Color
  $wp_customize->add_setting('csl_construction_hero_text_color', [
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'csl_construction_hero_text_color', [
    'label'   => __('Text Color', 'auragrid'),
    'section' => 'csl_construction_styling',
  ]));

  // Live preview transport tweaks
  $setting_ids = [
    'csl_construction_hero_title',
    'csl_construction_hero_subtitle',
    'csl_construction_hero_description',
    'csl_construction_hero_cta_text',
    'csl_construction_hero_bg_color',
    'csl_construction_hero_text_color',
  ];
  foreach ($setting_ids as $sid) {
    if ($s = $wp_customize->get_setting($sid)) {
      $s->transport = 'postMessage';
    }
  }
}, 25);

// Customizer Live Preview JS
add_action('customize_preview_init', function() {
  wp_enqueue_script(
    'csl-construction-customizer-preview',
    get_template_directory_uri() . '/assets/js/construction-customizer-preview.js',
    ['jquery', 'customize-preview'],
    wp_get_theme()->get('Version'),
    true
  );
});

// Inline preview helpers (Customizer only)
add_action('wp_head', function() {
  if (is_customize_preview()) {
    ?>
    <script>
    (function($) {
      wp.customize = wp.customize || {};
      wp.customize('csl_construction_hero_title', function(value) { value.bind(function(v){ $('.construction-title').text(v); }); });
      wp.customize('csl_construction_hero_subtitle', function(value) { value.bind(function(v){ $('.construction-subtitle').text(v); }); });
      wp.customize('csl_construction_hero_description', function(value) { value.bind(function(v){ $('.construction-description').html(v); }); });
      wp.customize('csl_construction_hero_cta_text', function(value) { value.bind(function(v){ $('.construction-cta').text(v); }); });
      wp.customize('csl_construction_hero_bg_color', function(value) { value.bind(function(v){ $('.construction-hero').css('background-color', v); }); });
      wp.customize('csl_construction_hero_text_color', function(value) { value.bind(function(v){ $('.construction-hero').css('color', v); }); });
    })(jQuery);
    </script>
    <?php
  }
}, 30);
// ---- Fetch & cache an article's OG image ----
function csl_fetch_og_image( $url ) {
  if ( empty( $url ) ) return '';
  $key = 'csl_ogimg_' . md5( $url );
  $cached = get_transient( $key );
  if ( $cached !== false ) return $cached;

  $resp = wp_remote_get( $url, [ 'timeout' => 8, 'user-agent' => 'CSL-OG-Fetcher/1.0' ] );
  if ( is_wp_error( $resp ) ) return '';

  $html = wp_remote_retrieve_body( $resp );
  if ( ! $html ) return '';

  // Try common meta tags
  $candidates = [];
  if ( preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m ) ) $candidates[] = $m[1];
  if ( preg_match('/<meta[^>]+name=["\']twitter:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m ) ) $candidates[] = $m[1];
  if ( preg_match('/<meta[^>]+property=["\']og:image:url["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $m ) ) $candidates[] = $m[1];

  // Fallback: first <img src="...">
  if ( empty( $candidates ) && preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $html, $m ) ) $candidates[] = $m[1];

  // Normalize absolute URL
  $img = '';
  foreach ( $candidates as $cand ) {
    if ( stripos( $cand, 'http' ) === 0 ) { $img = $cand; break; }
  }

  // Cache 12 hours
  set_transient( $key, $img, 12 * HOUR_IN_SECONDS );
  return $img;
}

// Enqueue custom author page styles
function csl_enqueue_author_styles() {
    // child theme dir, adjust path if your CSS file lives somewhere else
    wp_enqueue_style(
        'csl-author-styles',
        get_stylesheet_directory_uri() . '/assets/css/author.css',
        array(), // dependencies, e.g. array('parent-style') if needed
        filemtime( get_stylesheet_directory() . '/assets/css/author.css' ) // cache-bust on file change
    );
}
add_action( 'wp_enqueue_scripts', 'csl_enqueue_author_styles' );
