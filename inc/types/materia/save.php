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
        update_post_meta($id,'curza_plugin_academico_materia_equipo',$_POST['curza_plugin_academico_materia_equipo_editor']);
        update_post_meta($id,'curza_plugin_academico_materia_carga_total',$_POST['curza_plugin_academico_materia_carga_total_input']);
        update_post_meta($id,'curza_plugin_academico_materia_carga_semanal',$_POST['curza_plugin_academico_materia_carga_semanal_input']);
        update_post_meta($id,'curza_plugin_academico_materia_dedicacion',$_POST['curza_plugin_academico_materia_dedicacion_select']);
        
        if(!empty($_FILES['curza_plugin_academico_materia_pdf']['name'])) {
            $supported_types = array('application/pdf');
            $arr_file_type = wp_check_filetype(basename($_FILES['curza_plugin_academico_materia_pdf']['name']));
            $uploaded_type = $arr_file_type['type'];

            if(in_array($uploaded_type, $supported_types)) {
                $upload = wp_upload_bits($_FILES['curza_plugin_academico_materia_pdf']['name'], null, file_get_contents($_FILES['curza_plugin_academico_materia_pdf']['tmp_name']));
                if(isset($upload['error']) && $upload['error'] != 0) {
                    wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
                } else {
                    update_post_meta($id, 'curza_plugin_academico_materia_pdf', $upload);
                }
            }
            else {
                wp_die("The file type that you've uploaded is not a PDF.");
            }
        }
    }
}
