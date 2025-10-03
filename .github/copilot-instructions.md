# Copilot Instructions for CSL Agency WordPress Theme

## Repository Overview

This is a custom WordPress theme for Case Study Labs (CSL Agency), a marketing agency specializing in cannabis industry branding and digital marketing. The theme is built with modern PHP, extensive WordPress Customizer integration, and a neo-brutalist design approach.

## Theme Architecture

### Core Theme Information
- **Theme Name**: CSL Agency
- **Version**: 1.0.0
- **Text Domain**: csl-agency
- **Main Files**: `style.css`, `functions.php`, page templates, template parts

### Key Directories
- `/inc/` - Core functionality, customizers, and includes
- `/template-parts/` - Reusable template components
- `/assets/` - Static assets (images, etc.)
- `/read-me/` - Theme documentation

## WordPress Development Standards

### PHP Coding Standards
1. **Security First**: Always use `wp_kses_post()`, `sanitize_text_field()`, and proper nonce verification
2. **Escape Output**: Use `esc_html()`, `esc_attr()`, `esc_url()` for all dynamic output
3. **WordPress Functions**: Prefer WordPress functions over vanilla PHP (e.g., `wp_remote_get()` over `curl`)
4. **Hooks & Filters**: Use appropriate WordPress hooks and follow the action/filter pattern

### Theme-Specific Patterns

#### Customizer Integration
- Heavy use of WordPress Customizer for content management
- Settings stored with `get_theme_mod()` 
- JSON fields for complex data structures (steps, FAQ, etc.)
- Fallback defaults provided for all customizer fields

```php
// Example pattern used throughout the theme
$setting = get_theme_mod('csl_setting_name', 'Default Value');
```

#### ACF Fallback Functions
- Theme includes fallback functions for Advanced Custom Fields (ACF)
- Located in `functions.php` lines 16-44
- Ensures theme works without ACF plugin

#### Template Structure
- Custom page templates for specific functionality:
  - `page-our-process.php` - Process/services page with customizer integration
  - `page-dashboard.php` - Client portal dashboard
  - `page-john-dough.php` - About page for founder
  - Template parts in `/template-parts/` for reusable components

## Theme-Specific Features

### 1. Process Page System (`page-our-process.php`)
- **JSON-based Configuration**: Steps and FAQ stored as JSON in customizer settings
- **Fallback System**: Hardcoded defaults prevent empty content
- **Schema.org Integration**: Automatic HowTo schema generation for SEO
- **Content Structure**: Each step has `title`, `desc`, `out` (deliverable), and `slug`
- **Sanitization**: All dynamic content properly sanitized with `wp_strip_all_tags()`

```php
// Pattern for JSON-based content with fallbacks
$steps_json = get_theme_mod('csl_process_steps_json', '');
$steps = json_decode($steps_json, true);
if (!is_array($steps) || empty($steps)) { 
    $steps = $default_steps; // Always provide fallback
}
```

### 2. Client Portal System
- **Dashboard Template**: `page-dashboard.php` with project-specific views
- **User Authentication**: Custom login at `inc/client-portal-login.php`
- **Access Control**: Role-based redirects in `inc/client-portal-redirects.php`
- **Custom Post Types**: `client_project` with user assignment via meta queries
- **Project Management**: Activity feeds, file management, progress tracking

### 3. Front Page Builder (`inc/csl-customizer.php`)
- **Panel-based Organization**: Sections grouped under "Front Page Sections"
- **Show/Hide Controls**: Each section has visibility toggle
- **Content Management**: Headlines, descriptions, CTAs all customizer-driven
- **Hero Section**: Main banner with customizable headline and CTA
- **Logo Grid**: Separate customizer for client/partner logos

### 4. About Page Customizer (`inc/about-customizer.php`)
- **Client Fit Section**: Table-based content for ideal client profiles
- **Services Integration**: Dynamic service listings from child pages
- **HTML Field Support**: Limited HTML allowed for complex layouts
- **Page-specific Settings**: Isolated from main theme options

### 5. Schema.org Integration
- **JSON-LD Output**: Structured data in `<head>` for SEO
- **Organization Schema**: Company information and social profiles
- **Person Schema**: Founder/team member markup with E-E-A-T focus
- **HowTo Schema**: Auto-generated from process page steps
- **Cannabis Compliance**: Industry-appropriate structured data

## Design System

### CSS Architecture
- **CSS Custom Properties**: Extensive use of CSS variables for theming
- **Color System**: Industrial orange primary with neutral grays
- **Neo-brutalist Design**: Bold typography, high contrast, geometric layouts
- **Responsive Grid**: Modern CSS Grid and Flexbox for layouts
- **Mobile-First**: Progressive enhancement for larger screens

### Key CSS Variables
```css
:root {
  /* Primary Palette - Industrial Orange */
  --color-primary-400: #fb923c; 
  --color-primary-500: #ea580c; /* Main brand color */
  
  /* Typography */
  --font-primary: 'Space Grotesk', sans-serif;
  --font-secondary: 'Inter', sans-serif;
  
  /* Neutral Palette */
  --color-neutral-50: #f5f5f5;   /* Lightest text */
  --color-neutral-700: #2d2d2d;  /* Primary surface */
  --color-neutral-800: #1a1a1a;  /* Deep background */
  
  /* Spacing System */
  --space-4: 1rem;
  --space-6: 1.5rem;
  --space-12: 3rem;
}
```

### JavaScript Architecture (`main.js`)
- **Vanilla JavaScript**: No framework dependencies
- **Mobile Navigation**: Hamburger menu with body class toggles
- **Loading State Management**: Prevents horizontal scroll issues on mobile
- **Performance Focused**: Minimal DOM manipulation, efficient event handlers

```javascript
// Common pattern used in theme JS
document.addEventListener('DOMContentLoaded', function() {
    // DOM-dependent code here
    setTimeout(() => {
        document.body.classList.add('page-loaded');
    }, 100);
});
```

## Development Guidelines

### When Making Changes
1. **Maintain Backward Compatibility**: Don't break existing customizer settings
2. **Follow Naming Conventions**: Use `csl_` prefix for functions and settings
3. **Test Fallbacks**: Ensure graceful degradation when plugins are disabled
4. **Validate JSON**: Always validate JSON inputs in customizer fields
5. **Security**: Sanitize all inputs, escape all outputs

### Common Patterns Used in Theme

#### JSON Storage with Validation
```php
// Get JSON from customizer with validation
$data_json = get_theme_mod('csl_setting_json', '');
$data = json_decode($data_json, true);
if (!is_array($data) || empty($data)) {
    $data = $fallback_array; // Always provide fallback
}

// Sanitize each item
$clean_data = [];
foreach ($data as $item) {
    $clean_data[] = [
        'title' => wp_strip_all_tags($item['title'] ?? ''),
        'desc'  => wp_strip_all_tags($item['desc'] ?? ''),
    ];
}
```

#### Client Portal Access Control
```php
// Check user permissions for client portal
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

// Query user-specific content
$user_id = get_current_user_id();
$args = [
    'post_type' => 'client_project',
    'meta_query' => [[
        'key' => 'assigned_client',
        'value' => $user_id
    ]]
];
```

#### Schema.org JSON-LD Generation
```php
// Build structured data graph
$graph = [
    '@type' => 'Organization',
    '@id' => home_url('/#organization'),
    'name' => get_bloginfo('name'),
    'url' => home_url('/'),
    // Add more schema properties
];

$schema = [
    '@context' => 'https://schema.org',
    '@graph' => $graph
];

echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
```

### Common Tasks

#### Adding New Customizer Settings
```php
$wp_customize->add_setting('csl_new_setting', [
    'default' => 'Default Value',
    'sanitize_callback' => 'sanitize_text_field',
]);

$wp_customize->add_control('csl_new_setting', [
    'type' => 'text',
    'section' => 'section_name',
    'label' => __('Setting Label', 'csl-agency'),
]);
```

#### Adding New Template Parts
- Place in `/template-parts/` directory
- Use descriptive filenames
- Include proper escaping and fallbacks

#### Creating New Page Templates
- Use `Template Name:` comment for WordPress recognition
- Follow existing patterns for customizer integration
- Include proper security checks and fallbacks

### File Structure Context
- **Standard WordPress hierarchy**: `header.php`, `footer.php`, `index.php`, etc.
- **Custom page templates**: Prefixed with `page-` for specific functionality
- **Template parts**: Modular components for reuse
- **Includes**: Business logic and functionality in `/inc/`

## Testing Considerations
- Test with and without ACF plugin
- Verify customizer settings work properly
- Check responsive design across devices
- Validate schema.org markup
- Test client portal functionality

## Performance Notes
- Minimized CSS in `auragrid-style.min.css`
- JavaScript in `main.js` (GSAP animations)
- Optimized for WordPress caching
- Schema.org markup for SEO benefits

## Debugging & Troubleshooting

### Common Issues
1. **Customizer JSON Errors**: Always validate JSON and provide fallbacks
2. **Client Portal Access**: Check user roles and meta query syntax
3. **Schema Validation**: Use Google's Rich Results Test for structured data
4. **Mobile Performance**: Monitor loading states and horizontal scroll

### Debug Helpers
```php
// Check customizer values
error_log('Customizer value: ' . print_r(get_theme_mod('setting_name'), true));

// Validate JSON input
$data = json_decode($json_string, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('JSON Error: ' . json_last_error_msg());
}

// Debug user queries
$query = new WP_Query($args);
error_log('Query found: ' . $query->found_posts . ' posts');
```

### Testing Checklist
- [ ] Customizer settings save and display correctly
- [ ] ACF plugin enabled/disabled scenarios
- [ ] Client portal login/logout flows
- [ ] Mobile responsive behavior
- [ ] Schema.org markup validation
- [ ] Cross-browser compatibility

Remember: This theme serves a cannabis industry marketing agency, so be mindful of compliance and professional presentation requirements when making modifications.