<?php

add_action ('add_meta_boxes','curza_plugin_academico_carrera_metaboxes');

function curza_plugin_academico_carrera_metaboxes() {
    global $post;
    if($post->post_type == 'carrera'){
        add_meta_box('curza_plugin_academico_carrera_perfil',"Perfil del Egresado", 'curza_plugin_academico_carrera_perfil_meta_box', null, 'normal','core');
    }
}

function curza_plugin_academico_carrera_perfil_meta_box(){
    global $post;
    $id = $post->ID;
    $equipo = get_post_meta($id,'curza_plugin_academico_perfil_equipo',true);
    print "<div id='curza_plugin_academico_carrera_perfil_container'>";
    wp_editor($equipo, "curza_plugin_academico_carrera_perfil_editor");
    print "</div>";
    print "<div style='clear:both;'></div>";
}
