<?php
require_once plugin_dir_path(__FILE__) . '../includes/api-client.php';
require_once plugin_dir_path(__FILE__) . '../includes/sync-posts.php';
// Settings page for Trafficontent sync
function trafficontent_sync_page() {
    if (isset($_POST['trafficontent_sync_now'])) {
        $posts = trafficontent_get_remote_posts();
        if (is_array($posts)) {
            foreach ($posts as $post_data) {
                trafficontent_insert_post($post_data);
            }
            echo '<div class="updated notice"><p>✅ Sync completed. ' . count($posts) . ' post(s) inserted.</p></div>';
        } else {
            echo '<div class="error notice"><p>❌ Failed to fetch posts from Trafficontent.</p></div>';
        }
    }
    ?>
    <div class="wrap">
        <h1>Trafficontent Sync Status</h1>
        <form method="post">
            <p>Click the button below to manually fetch and publish new blog posts from your Trafficontent account.</p>
            <p><input type="submit" name="trafficontent_sync_now" class="button button-primary" value="Sync Now"></p>
        </form>
    </div>
    <?php
}
