<?php

add_action('save_post','curza_plugin_academico_clase_save');

function curza_plugin_academico_clase_save($id) {
    global $wpdb,$post_type;
    if($post_type == 'clase'){
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $id;
        if (defined('DOING_AJAX') && DOING_AJAX)
                return $id;

        update_post_meta($id,'curza_plugin_academico_clase_dia',$_POST['curza_plugin_academico_clase_dia_input']);
        update_post_meta($id,'curza_plugin_academico_clase_inicio',$_POST['curza_plugin_academico_clase_inicio_input']);
        update_post_meta($id,'curza_plugin_academico_clase_fin',$_POST['curza_plugin_academico_clase_fin_input']);
    }    
}
