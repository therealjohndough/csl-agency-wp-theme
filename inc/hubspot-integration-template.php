<?php
/**
 * HubSpot Integration Configuration Template
 * 
 * This file provides a template for implementing HubSpot integration
 * with the existing CSL Agency theme contact form system.
 * 
 * CURRENT STATUS: NOT IMPLEMENTED
 * This is a template file showing how HubSpot could be integrated.
 * 
 * @package CSL_Agency
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * HubSpot Configuration Class
 * 
 * Uncomment and configure this class when ready to implement HubSpot integration
 */
/*
class CSL_HubSpot_Integration {
    
    private $api_key;
    private $portal_id;
    private $api_base = 'https://api.hubapi.com';
    
    public function __construct() {
        // Get API credentials from WordPress options
        $this->api_key = get_option('csl_hubspot_api_key');
        $this->portal_id = get_option('csl_hubspot_portal_id');
        
        // Hook into existing contact form submission
        add_action('csl_contact_form_submitted', array($this, 'sync_to_hubspot'), 10, 1);
    }
    
    /**
     * Send contact data to HubSpot
     */
    public function sync_to_hubspot($form_data) {
        if (!$this->is_configured()) {
            error_log('HubSpot: Not configured, skipping sync');
            return false;
        }
        
        $contact_data = $this->format_contact_data($form_data);
        
        // Try to find existing contact first
        $existing_contact = $this->find_contact_by_email($form_data['email']);
        
        if ($existing_contact) {
            // Update existing contact
            return $this->update_contact($existing_contact['id'], $contact_data);
        } else {
            // Create new contact
            return $this->create_contact($contact_data);
        }
    }
    
    /**
     * Format WordPress form data for HubSpot
     */
    private function format_contact_data($form_data) {
        return array(
            'properties' => array(
                'email' => $form_data['email'],
                'firstname' => $form_data['name'],
                'phone' => $form_data['phone'],
                'company' => $form_data['company'],
                'hs_lead_status' => 'NEW',
                'lifecyclestage' => 'lead',
                // Custom properties (must be created in HubSpot first)
                'project_type' => $form_data['project_type'],
                'budget_range' => $form_data['budget'],
                'project_timeline' => $form_data['timeline'],
                'lead_score_custom' => $form_data['lead_score'],
                'referral_source' => $form_data['source'],
                'agency_experience' => $form_data['agency_experience'],
                'project_description' => $form_data['message'],
                'form_submission_date' => $form_data['timestamp']
            )
        );
    }
    
    /**
     * Create new contact in HubSpot
     */
    private function create_contact($contact_data) {
        $response = wp_remote_post($this->api_base . '/crm/v3/objects/contacts', array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->api_key,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($contact_data),
            'timeout' => 15
        ));
        
        return $this->handle_api_response($response, 'create_contact');
    }
    
    /**
     * Update existing contact in HubSpot
     */
    private function update_contact($contact_id, $contact_data) {
        $response = wp_remote_request($this->api_base . '/crm/v3/objects/contacts/' . $contact_id, array(
            'method' => 'PATCH',
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->api_key,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($contact_data),
            'timeout' => 15
        ));
        
        return $this->handle_api_response($response, 'update_contact');
    }
    
    /**
     * Find contact by email address
     */
    private function find_contact_by_email($email) {
        $response = wp_remote_get($this->api_base . '/crm/v3/objects/contacts/search', array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->api_key,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode(array(
                'filterGroups' => array(
                    array(
                        'filters' => array(
                            array(
                                'propertyName' => 'email',
                                'operator' => 'EQ',
                                'value' => $email
                            )
                        )
                    )
                )
            )),
            'timeout' => 15
        ));
        
        $result = $this->handle_api_response($response, 'find_contact');
        
        if ($result && isset($result['results']) && !empty($result['results'])) {
            return $result['results'][0];
        }
        
        return false;
    }
    
    /**
     * Handle API responses and log errors
     */
    private function handle_api_response($response, $action) {
        if (is_wp_error($response)) {
            error_log("HubSpot {$action} error: " . $response->get_error_message());
            return false;
        }
        
        $status_code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        
        if ($status_code >= 200 && $status_code < 300) {
            error_log("HubSpot {$action} successful");
            return json_decode($body, true);
        } else {
            error_log("HubSpot {$action} failed. Status: {$status_code}, Body: " . $body);
            return false;
        }
    }
    
    /**
     * Check if HubSpot is properly configured
     */
    private function is_configured() {
        return !empty($this->api_key) && !empty($this->portal_id);
    }
}

// Initialize HubSpot integration (uncomment when ready to use)
// new CSL_HubSpot_Integration();
*/

/**
 * Add HubSpot settings to WordPress admin (template)
 * 
 * Uncomment this section to add HubSpot configuration to WordPress admin
 */
/*
add_action('admin_menu', function() {
    add_options_page(
        'HubSpot Integration',
        'HubSpot Integration', 
        'manage_options',
        'csl-hubspot-settings',
        'csl_hubspot_settings_page'
    );
});

function csl_hubspot_settings_page() {
    if (isset($_POST['submit'])) {
        update_option('csl_hubspot_api_key', sanitize_text_field($_POST['api_key']));
        update_option('csl_hubspot_portal_id', sanitize_text_field($_POST['portal_id']));
        update_option('csl_hubspot_enabled', isset($_POST['enabled']));
        echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
    }
    
    $api_key = get_option('csl_hubspot_api_key', '');
    $portal_id = get_option('csl_hubspot_portal_id', '');
    $enabled = get_option('csl_hubspot_enabled', false);
    ?>
    <div class="wrap">
        <h1>HubSpot Integration Settings</h1>
        <form method="post">
            <table class="form-table">
                <tr>
                    <th><label for="enabled">Enable HubSpot Integration</label></th>
                    <td><input type="checkbox" id="enabled" name="enabled" <?php checked($enabled); ?>></td>
                </tr>
                <tr>
                    <th><label for="portal_id">HubSpot Portal ID</label></th>
                    <td><input type="text" id="portal_id" name="portal_id" value="<?php echo esc_attr($portal_id); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="api_key">HubSpot API Key</label></th>
                    <td><input type="password" id="api_key" name="api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
        
        <h2>Integration Status</h2>
        <p><strong>Current Status:</strong> <?php echo $enabled && !empty($api_key) ? 'Configured' : 'Not Configured'; ?></p>
        
        <h2>Setup Instructions</h2>
        <ol>
            <li>Log into your HubSpot account</li>
            <li>Go to Settings > Integrations > API Key (or create a Private App)</li>
            <li>Copy your Portal ID and API Key</li>
            <li>Paste them into the fields above and check "Enable Integration"</li>
            <li>Test with a form submission</li>
        </ol>
        
        <h2>Custom Properties Needed in HubSpot</h2>
        <p>Create these custom contact properties in HubSpot for full functionality:</p>
        <ul>
            <li><code>project_type</code> - Single-line text</li>
            <li><code>budget_range</code> - Single-line text</li>
            <li><code>project_timeline</code> - Single-line text</li>
            <li><code>lead_score_custom</code> - Number</li>
            <li><code>referral_source</code> - Single-line text</li>
            <li><code>agency_experience</code> - Single-line text</li>
            <li><code>project_description</code> - Multi-line text</li>
        </ul>
    </div>
    <?php
}
*/

/**
 * Action hook for form submission
 * 
 * This hook would need to be added to the existing contact form handler
 * in /inc/contact-form-shortcode.php around line 269 after csl_send_confirmation_email()
 * 
 * Add this line: do_action('csl_contact_form_submitted', $form_data);
 */

/**
 * HubSpot tracking code (template)
 * 
 * Add this to header.php or via theme customizer when ready
 */
/*
function csl_add_hubspot_tracking() {
    $portal_id = get_option('csl_hubspot_portal_id');
    $enabled = get_option('csl_hubspot_enabled');
    
    if ($enabled && !empty($portal_id)) {
        ?>
        <!-- HubSpot Embed Code -->
        <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/<?php echo esc_attr($portal_id); ?>.js"></script>
        <?php
    }
}
add_action('wp_head', 'csl_add_hubspot_tracking');
*/