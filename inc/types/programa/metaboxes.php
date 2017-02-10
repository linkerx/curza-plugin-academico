<?php

add_action ('add_meta_boxes','curza_plugin_academico_programa_metaboxes');
add_action('post_edit_form_tag', 'curza_plugin_academico_programa_form_tag');

function curza_plugin_academico_programa_metaboxes() {
    global $post;
    if($post->post_type == 'programa'){
        add_meta_box('curza_plugin_academico_programa_equipo',"Equipo", 'curza_plugin_academico_programa_equipo_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_programa_pdf',"Programa", 'curza_plugin_academico_programa_pdf_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_programa_ano',"Año", 'curza_plugin_academico_programa_ano_meta_box', null, 'side','core');
    }
}

function curza_plugin_academico_programa_equipo_meta_box(){
    global $post;
    $id = $post->ID;
    $equipo = get_post_meta($id,'curza_plugin_academico_programa_equipo',true);

    print "<div id='curza_plugin_academico_programa_equipo_container'>";
    wp_editor($equipo, "curza_plugin_academico_programa_equipo_editor");
    print "</div>";
    print "<div style='clear:both;'></div>";
}


function curza_plugin_academico_programa_ano_meta_box(){
    global $post;
    $id = $post->ID;
    $programa_ano = get_post_meta($id,'curza_plugin_academico_programa_ano',true);
    print "<div id='curza_plugin_academico_programa_ano_container'>";
    print "<input type='text' name='curza_plugin_academico_programa_ano_input' style='width:100%;' value='".$programa_ano."'></div>";
    print "<div style='clear:both;'></div>";
}


function curza_plugin_academico_programa_pdf_meta_box() {  
    global $post;
    wp_nonce_field(plugin_basename(__FILE__), 'curza_plugin_academico_programa_pdf_nonce');
    if($archivo = get_post_meta( $post->ID, 'curza_plugin_academico_programa_pdf', true )) {
        print "PDF CARGADO: ".$archivo['url'];
    }
    $html = '<p class="description">';
    $html .= 'Seleccione su PDF aqui para reemplazar el existente.';
    $html .= '</p>';
    $html .= '<input type="file" id="curza_plugin_academico_programa_pdf" name="curza_plugin_academico_programa_pdf" value="" size="25">';
    echo $html;
}

function curza_plugin_academico_programa_form_tag() {
    global $post;
    if($post->post_type == 'programa'){
        echo ' enctype="multipart/form-data"';
    }
}
