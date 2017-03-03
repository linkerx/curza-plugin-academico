<?php

add_filter ('manage_posts_columns', 'curza_plugin_academico_area_columns');
add_action ('manage_posts_custom_column', 'curza_plugin_academico_area_columns_values');
    
function curza_plugin_academico_area_columns($columns) {
    global $post_type;
    if($post_type == 'area'){}
    return $columns;
}

function curza_plugin_academico_area_columns_values($column_name) {
    global $wpdb, $post;
    $id = $post->ID;

    if($post->post_type == 'area'){
        $id = $post->ID;
        if($column_name === 'nombre'){}
    }
}
