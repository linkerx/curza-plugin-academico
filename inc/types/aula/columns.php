<?php

add_filter ('manage_posts_columns', 'curza_plugin_academico_aula_columns');
add_action ('manage_posts_custom_column', 'curza_plugin_academico_aula_columns_values');
    
function curza_plugin_academico_aula_columns($columns) {
    global $post_type;
    if($post_type == 'aula'){
        // $columns['nombre'] = "Nombre";
    }
    return $columns;
}

function curza_plugin_academico_aula_columns_values($column_name) {
    global $wpdb, $post;
    $id = $post->ID;

    if($post->post_type == 'aula'){
        $id = $post->ID;
        if($column_name === 'nombre'){
            //print get_post_meta($id,'sarasa',true);
        }
        
    }
}
