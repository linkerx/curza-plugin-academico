<?php

add_action ('add_meta_boxes','curza_plugin_academico_materia_metaboxes');

function curza_plugin_academico_materia_metaboxes() {
    global $post;
    if($post->post_type == 'materia'){
        add_meta_box('curza_plugin_academico_materia_equipo',"Equipo", 'curza_plugin_academico_materia_equipo_meta_box', null, 'normal','core');
    }
}

function curza_plugin_academico_materia_equipo_meta_box(){
    global $post;
    $id = $post->ID;
    $equipo = get_post_meta($id,'curza_plugin_academico_materia_equipo',true);

    print "<div id='curza_plugin_academico_materia_equipo_container'>";
    wp_editor($equipo, "curza_plugin_academico_materia_equipo_editor");
    print "</div>";
    print "<div style='clear:both;'></div>";
}
