<?php

add_action('save_post','curza_plugin_academico_materia_save');

function curza_plugin_academico_materia_save($id) {
    global $wpdb,$post_type;
    if($post_type == 'materia'){
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $id;
        if (defined('DOING_AJAX') && DOING_AJAX)
                return $id;

        update_post_meta($id,'curza_plugin_academico_materia_equipo',$_POST['curza_plugin_academico_materia_equipo_editor']);
    }
}
