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

### 1. Process Page System
- Dynamic steps with JSON storage in customizer
- Schema.org HowTo markup generation
- FAQ section with accordion functionality
- Located in `page-our-process.php`

### 2. Client Portal
- Custom login system (`inc/client-portal-login.php`)
- Dashboard functionality (`page-dashboard.php`)
- Access control and redirects (`inc/client-portal-redirects.php`)

### 3. Customizer Sections
- Front page customization (`inc/csl-customizer.php`)
- Logo grid management (`inc/csl-logo-grid-customizer.php`)
- About page settings (`inc/about-customizer.php`)

### 4. Schema.org Integration
- JSON-LD structured data for SEO
- Organization and Person schemas
- HowTo schemas for process pages
- Located in `functions.php` starting around line 327

## Design System

### CSS Architecture
- CSS custom properties (CSS variables) for theming
- Neo-brutalist design approach
- Responsive grid layouts
- Color system based on industrial orange palette

### Key CSS Variables
```css
:root {
  --color-primary-400: #fb923c; /* Industrial Orange */
  --font-primary: 'Space Grotesk', sans-serif;
  --color-background: #fafafa;
}
```

## Development Guidelines

### When Making Changes
1. **Maintain Backward Compatibility**: Don't break existing customizer settings
2. **Follow Naming Conventions**: Use `csl_` prefix for functions and settings
3. **Test Fallbacks**: Ensure graceful degradation when plugins are disabled
4. **Validate JSON**: Always validate JSON inputs in customizer fields
5. **Security**: Sanitize all inputs, escape all outputs

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

Remember: This theme serves a cannabis industry marketing agency, so be mindful of compliance and professional presentation requirements when making modifications.