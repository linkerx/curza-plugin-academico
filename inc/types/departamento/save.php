<?php

add_action('save_post','curza_plugin_academico_departamento_save');

function curza_plugin_academico_departamento_save($id) {
    global $wpdb,$post_type;
    if($post_type == 'departamento'){
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $id;
        if (defined('DOING_AJAX') && DOING_AJAX)
                return $id;

        update_post_meta($id,'curza_plugin_academico_departamento_equipo',$_POST['curza_plugin_academico_departamento_equipo_editor']);
        update_post_meta($id,'curza_plugin_academico_departamento_director',$_POST['curza_plugin_academico_departamento_director_input']);
        update_post_meta($id,'curza_plugin_academico_departamento_contacto',$_POST['curza_plugin_academico_departamento_contacto_editor']);
    }
}
