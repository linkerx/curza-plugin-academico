<?php

add_action('save_post','curza_plugin_academico_area_save');

function curza_plugin_academico_area_save($id) {
    global $wpdb,$post_type;
    if($post_type == 'area'){
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $id;
        if (defined('DOING_AJAX') && DOING_AJAX)
                return $id;
    }
}
