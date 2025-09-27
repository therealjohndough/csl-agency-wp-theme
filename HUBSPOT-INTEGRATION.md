# HubSpot Integration Status and Options

## Current Status: **NO HUBSPOT INTEGRATION**

This WordPress theme currently **does NOT have HubSpot integration**. The contact form and lead management system operates independently using WordPress's built-in functionality.

## Current Lead Management System

### How It Works Now
The theme uses a custom contact form (`/inc/contact-form-shortcode.php`) that:

1. **Captures lead information** via a detailed contact form with fields like:
   - Name, email, phone, company
   - Project type, budget, timeline
   - Agency experience, referral source
   - Project description

2. **Calculates lead scores** (0-100) based on:
   - Budget range (highest weight)
   - Project urgency/timeline
   - Project type complexity
   - Previous agency experience

3. **Stores data locally** in WordPress database table `wp_csl_contact_submissions`

4. **Sends email notifications** to `dough@casestudylabs.com` with lead details and scoring

5. **Provides automated responses** to leads with confirmation emails

### Current Lead Scoring Logic
```php
// Budget scoring (most important)
'under-5k' => 10 points
'5k-10k' => 25 points
'10k-25k' => 50 points
'25k-50k' => 75 points
'50k-plus' => 100 points
'lets-discuss' => 80 points

// Plus additional points for timeline urgency, project type, etc.
```

## HubSpot Integration Options

### Option 1: HubSpot Forms API Integration
**Recommended for basic integration**

Add HubSpot contact creation to the existing form handler:

```php
// Add to csl_handle_contact_form_submission() function
function csl_send_to_hubspot($form_data) {
    $hubspot_api_key = get_option('csl_hubspot_api_key');
    $portal_id = get_option('csl_hubspot_portal_id');
    
    $hubspot_data = [
        'properties' => [
            'email' => $form_data['email'],
            'firstname' => $form_data['name'],
            'phone' => $form_data['phone'],
            'company' => $form_data['company'],
            'hs_lead_status' => 'NEW',
            // Custom properties
            'project_type' => $form_data['project_type'],
            'budget_range' => $form_data['budget'],
            'timeline' => $form_data['timeline'],
            'lead_score_custom' => $form_data['lead_score']
        ]
    ];
    
    // Send to HubSpot via API
    wp_remote_post("https://api.hubapi.com/crm/v3/objects/contacts", [
        'headers' => [
            'Authorization' => 'Bearer ' . $hubspot_api_key,
            'Content-Type' => 'application/json'
        ],
        'body' => json_encode($hubspot_data)
    ]);
}
```

### Option 2: HubSpot Tracking Code Integration
**For website tracking and analytics**

Add HubSpot tracking code to `header.php` or via WordPress customizer:

```html
<!-- HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/YOUR-HUB-ID.js"></script>
```

### Option 3: Replace Current Form with HubSpot Form
**Simplest but loses custom lead scoring**

Replace the custom contact form shortcode with embedded HubSpot forms.

### Option 4: Webhook Integration
**For real-time data sync**

Set up webhooks to sync data bidirectionally between WordPress and HubSpot.

## Implementation Requirements

### To Add HubSpot Integration:

1. **Get HubSpot credentials:**
   - HubSpot Portal ID
   - Private App Access Token (recommended) or API Key

2. **Choose integration method** based on needs:
   - **Forms API**: Keep current functionality + sync to HubSpot
   - **Embedded Forms**: Replace current forms with HubSpot forms
   - **Tracking Only**: Add visitor tracking without form changes

3. **Add configuration options** in WordPress admin:
   - Settings page for HubSpot credentials
   - Toggle for enabling/disabling sync

4. **Test integration** with development HubSpot portal first

## Current Database Schema

The existing lead data is stored in `wp_csl_contact_submissions` with fields:
- `id`, `name`, `email`, `phone`, `company`
- `project_type`, `budget`, `timeline`  
- `agency_experience`, `source`, `message`
- `lead_score`, `timestamp`, `ip_address`
- `user_agent`, `status`

This data could be migrated to HubSpot or kept as backup/analytics.

## Recommendation

For Case Study Labs, I recommend **Option 1 (HubSpot Forms API Integration)** because:

1. ✅ Keeps the existing sophisticated lead scoring system
2. ✅ Maintains current form UX and design integration
3. ✅ Adds HubSpot CRM benefits without losing functionality
4. ✅ Allows gradual transition and testing
5. ✅ Preserves email notification workflow during transition

## Next Steps

If you want to proceed with HubSpot integration:

1. Provide HubSpot Portal ID and API credentials
2. Choose preferred integration method
3. Set up development/testing environment
4. Implement and test integration
5. Migrate existing leads (optional)

---

**Status**: Currently **NO HubSpot integration**. Custom WordPress lead management system is fully functional and capturing leads via email notifications to `dough@casestudylabs.com`.