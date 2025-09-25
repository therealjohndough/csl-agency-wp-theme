<?php
/**
 * Client Portal ACF Field Groups (V3.1 - Project Hub Corrected)
 * This version corrects the missing role filter on the 'Your Key Contact' field.
 */

if( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'group_client_project_hub',
        'title' => 'Client Project Settings',
        'fields' => array(
            // --- Tab: Core Setup ---
            array('key' => 'tab_core_setup', 'label' => 'Core Setup', 'type' => 'tab'),
            array(
                'key' => 'field_assigned_client',
                'label' => 'Assigned Client',
                'name' => 'assigned_client',
                'type' => 'user',
                'required' => 1,
                'role' => array('subscriber'), // This correctly finds CLIENTS
            ),
            array(
                'key' => 'field_client_logo',
                'label' => 'Client Logo',
                'name' => 'client_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_key_project_contact',
                'label' => 'Your Key Contact',
                'name' => 'key_project_contact',
                'type' => 'user',
                'role' => array('administrator', 'editor'), // <-- THIS IS THE CORRECTED LINE
                'instructions' => 'The team member (Admin/Editor) managing this client.',
            ),
            array(
                'key' => 'field_project_progress',
                'label' => 'Project Progress (%)',
                'name' => 'project_progress',
                'type' => 'range',
                'default_value' => 0,
                'min' => 0,
                'max' => 100,
                'step' => 5,
                'append' => '%',
            ),

            // --- Tab: Client Tasks & Links ---
            array('key' => 'tab_tasks_links', 'label' => 'Tasks & Links', 'type' => 'tab'),
            array('key' => 'field_action_items', 'label' => 'Client Action Items', 'name' => 'action_items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Action Item', 'sub_fields' => array(
                array('key' => 'field_action_item_task', 'label' => 'Task', 'name' => 'task', 'type' => 'text'),
                array('key' => 'field_action_item_complete', 'label' => 'Completed', 'name' => 'is_complete', 'type' => 'true_false', 'ui' => 1),
            )),
            array('key' => 'field_quick_links', 'label' => 'Important Links', 'name' => 'quick_links', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Link', 'sub_fields' => array(
                array('key' => 'field_link_label', 'label' => 'Link Label', 'name' => 'link_label', 'type' => 'text'),
                array('key' => 'field_link_url', 'label' => 'URL', 'name' => 'link_url', 'type' => 'url'),
            )),

            // --- Tab: Activity Feed & Files ---
            array('key' => 'tab_activity_feed', 'label' => 'Activity Feed & Files', 'type' => 'tab'),
            array('key' => 'field_activity_feed', 'label' => 'Activity Feed', 'name' => 'activity_feed', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add Activity', 'sub_fields' => array(
                array('key' => 'field_activity_type', 'label' => 'Activity Type', 'name' => 'activity_type', 'type' => 'select', 'choices' => ['message' => 'Message / Update', 'file_upload' => 'File Upload', 'milestone' => 'Milestone Reached']),
                array('key' => 'field_activity_date', 'label' => 'Date', 'name' => 'activity_date', 'type' => 'date_picker', 'default_value' => 'today'),
                array('key' => 'field_activity_description', 'label' => 'Description', 'name' => 'activity_description', 'type' => 'textarea'),
                array('key' => 'field_activity_file', 'label' => 'Attached File', 'name' => 'activity_file', 'type' => 'file', 'return_format' => 'array', 'conditional_logic' => [['field' => 'field_activity_type', 'operator' => '==', 'value' => 'file_upload']]),
            )),

            // --- Tab: Billing ---
            array('key' => 'tab_billing', 'label' => 'Billing', 'type' => 'tab'),
            array('key' => 'field_invoices', 'label' => 'Invoices', 'name' => 'invoices', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Invoice', 'sub_fields' => array(
                array('key' => 'field_invoice_date', 'label' => 'Date', 'name' => 'invoice_date', 'type' => 'date_picker'),
                array('key' => 'field_invoice_amount', 'label' => 'Amount', 'name' => 'invoice_amount', 'type' => 'number'),
                array('key' => 'field_invoice_status', 'label' => 'Status', 'name' => 'invoice_status', 'type' => 'select', 'choices' => ['Paid' => 'Paid', 'Due' => 'Due', 'Overdue' => 'Overdue']),
                array('key' => 'field_invoice_file', 'label' => 'Invoice File (PDF)', 'name' => 'invoice_file', 'type' => 'file', 'return_format' => 'array'),
            )),
        ),
        'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'client_project'))),
        'position' => 'normal', 'style' => 'default', 'active' => true,
    ));
}