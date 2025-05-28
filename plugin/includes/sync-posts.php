<?php
// Inserts a WordPress post from Trafficontent data
function trafficontent_insert_post($post_data) {
    if (!isset($post_data['title']) || !isset($post_data['body'])) return;

    wp_insert_post([
        'post_title'   => sanitize_text_field($post_data['title']),
        'post_content' => wp_kses_post($post_data['body']),
        'post_status'  => 'publish',
        'post_type'    => 'post',
    ]);
}
