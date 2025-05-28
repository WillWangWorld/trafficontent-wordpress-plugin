<?php
/**
 * Plugin Name: Trafficontent Connector
 * Description: Connect your WordPress site to Trafficontent for AI-powered blog automation.
 * Version: 1.0.0
 * Author: Trafficontent
 */

if (!defined('ABSPATH')) exit;

// Add settings page to admin menu
add_action('admin_menu', function () {
    add_menu_page(
        'Trafficontent',
        'Trafficontent',
        'manage_options',
        'trafficontent-settings',
        'trafficontent_settings_page',
        'dashicons-admin-site',
        90
    );

    add_submenu_page(
        'trafficontent-settings',
        'Sync Status',
        'Sync Status',
        'manage_options',
        'trafficontent-sync',
        'trafficontent_sync_page'
    );

    add_submenu_page(
        'trafficontent-settings',
        'Post Preview',
        'Post Preview',
        'manage_options',
        'trafficontent-preview',
        'trafficontent_preview_page'
    );

    add_submenu_page(
        'trafficontent-settings',
        'Help & Docs',
        'Help & Docs',
        'manage_options',
        'trafficontent-help',
        'trafficontent_help_page'
    );
});

// Register setting
add_action('admin_init', function () {
    register_setting('trafficontent_options', 'trafficontent_api_key');
});

// Settings page HTML
function trafficontent_settings_page() {
    ?>
    <div class="wrap">
        <h1>Trafficontent Connection</h1>
        <form method="post" action="options.php">
            <?php settings_fields('trafficontent_options'); ?>
            <?php do_settings_sections('trafficontent_options'); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Trafficontent API Key</th>
                    <td>
                        <input type="text" name="trafficontent_api_key" value="<?php echo esc_attr(get_option('trafficontent_api_key')); ?>" size="60" />
                        <p class="description">Paste your API key from your Trafficontent dashboard.</p>
                    </td>
                </tr>
            </table>

            <?php submit_button('Save API Key'); ?>
        </form>
    </div>
    <?php
}

// Optional: expose API key via internal REST endpoint
add_action('rest_api_init', function () {
    register_rest_route('trafficontent/v1', '/settings', [
        'methods' => 'GET',
        'callback' => function () {
            if (!current_user_can('manage_options')) return new WP_Error('forbidden', 'Not allowed', ['status' => 403]);
            return [
                'api_key' => get_option('trafficontent_api_key')
            ];
        },
        'permission_callback' => '__return_true'
    ]);
});
// Sync Status page
function trafficontent_sync_page() {
    ?>
    <div class="wrap">
        <h1>Trafficontent Sync Status</h1>
        <p>This page will show the last sync results, next sync schedule, and a manual sync trigger in future versions.</p>
    </div>
    <?php
}

// Post Preview page
function trafficontent_preview_page() {
    ?>
    <div class="wrap">
        <h1>Post Preview</h1>
        <p>This page will show previews of blog posts fetched from Trafficontent before they are published.</p>
    </div>
    <?php
}

// Help & Docs page
function trafficontent_help_page() {
    ?>
    <div class="wrap">
        <h1>Help & Documentation</h1>
        <p>To get started:</p>
        <ol>
            <li>Log in to your Trafficontent account at <a href="https://trafficontent.com" target="_blank">trafficontent.com</a></li>
            <li>Copy your API key from your dashboard</li>
            <li>Paste it into the <strong>API Key Settings</strong> page</li>
        </ol>
        <p>For more support, visit our <a href="https://trafficontent.com/docs" target="_blank">documentation site</a>.</p>
    </div>
    <?php
}