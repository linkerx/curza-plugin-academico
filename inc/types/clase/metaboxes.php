<?php

add_action ('add_meta_boxes','curza_plugin_academico_clase_metaboxes');
add_action('post_edit_form_tag', 'curza_plugin_academico_clase_form_tag');

function curza_plugin_academico_clase_metaboxes() {
    global $post;
    if($post->post_type == 'clase'){
        add_meta_box('curza_plugin_academico_clase_dia',"Dia", 'curza_plugin_academico_clase_dia_meta_box', null, 'side','core');
        add_meta_box('curza_plugin_academico_clase_inicio',"Inicio", 'curza_plugin_academico_clase_inicio_meta_box', null, 'side','core');
        add_meta_box('curza_plugin_academico_clase_fin',"Fin", 'curza_plugin_academico_clase_fin_meta_box', null, 'side','core');
    }
}

function curza_plugin_academico_clase_dia_meta_box(){
    global $post;
    $id = $post->ID;
    $clase_dia = get_post_meta($id,'curza_plugin_academico_clase_dia',true);
    print "<div id='curza_plugin_academico_clase_dia_container'>";
    print "<input type='text' name='curza_plugin_academico_clase_dia_input' style='width:100%;' value='".$clase_dia."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_clase_inicio_meta_box(){
    global $post;
    $id = $post->ID;
    $clase_inicio = get_post_meta($id,'curza_plugin_academico_clase_inicio',true);
    print "<div id='curza_plugin_academico_clase_inicio_container'>";
    print "<input type='text' name='curza_plugin_academico_clase_inicio_input' style='width:100%;' value='".$clase_inicio."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_clase_fin_meta_box(){
    global $post;
    $id = $post->ID;
    $clase_fin = get_post_meta($id,'curza_plugin_academico_clase_fin',true);
    print "<div id='curza_plugin_academico_clase_fin_container'>";
    print "<input type='text' name='curza_plugin_academico_clase_fin_input' style='width:100%;' value='".$clase_fin."'></div>";
    print "<div style='clear:both;'></div>";
}
