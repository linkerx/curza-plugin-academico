<?php

add_action('save_post','curza_plugin_academico_materia_save');

function curza_plugin_academico_materia_save($id) {
    global $wpdb,$post_type;
    if($post_type == 'materia'){
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $id;
        if (defined('DOING_AJAX') && DOING_AJAX)
                return $id;

        update_post_meta($id,'curza_plugin_academico_materia_orden',$_POST['curza_plugin_academico_materia_orden_input']);
        update_post_meta($id,'curza_plugin_academico_materia_carga_total',$_POST['curza_plugin_academico_materia_carga_total_input']);
        update_post_meta($id,'curza_plugin_academico_materia_carga_semanal',$_POST['curza_plugin_academico_materia_carga_semanal_input']);
        update_post_meta($id,'curza_plugin_academico_materia_dedicacion',$_POST['curza_plugin_academico_materia_dedicacion_select']);
        update_post_meta($id,'curza_plugin_academico_materia_ano',$_POST['curza_plugin_academico_materia_ano_select']);
    }
}
