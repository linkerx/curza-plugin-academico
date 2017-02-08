<?php

add_action('add_meta_boxes','curza_plugin_academico_plan_metaboxes');
add_action('post_edit_form_tag', 'curza_plugin_academico_plan_form_tag');

function curza_plugin_academico_plan_metaboxes() {
    global $post;
    if($post->post_type == 'plan'){
        add_meta_box('curza_plugin_academico_plan_titulo',"Título", 'curza_plugin_academico_plan_titulo_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_duracion',"Duracion", 'curza_plugin_academico_plan_duracion_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_carga',"Carga", 'curza_plugin_academico_plan_carga_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_modalidad',"Modalidad", 'curza_plugin_academico_plan_modalidad_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_pdf',"PDF Ordenanza", 'curza_plugin_academico_plan_pdf_meta_box', null, 'normal','core');
    }
}

function curza_plugin_academico_plan_titulo_meta_box(){
    global $post;
    $id = $post->ID;
    $titulo = get_post_meta($id,'curza_plugin_academico_plan_titulo',true);
    print "<div id='curza_plugin_academico_plan_titulo_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_titulo_input' value='".$director."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_plan_duracion_meta_box(){
    global $post;
    $id = $post->ID;
    $duracion = get_post_meta($id,'curza_plugin_academico_plan_duracion',true);
    print "<div id='curza_plugin_academico_plan_duracion_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_duracion_input' value='".$director."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_plan_modalidad_meta_box(){
    global $post;
    $id = $post->ID;
    $modalidad = get_post_meta($id,'curza_plugin_academico_plan_modalidad',true);
    print "<div id='curza_plugin_academico_plan_modalidad_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_modalidad_input' value='".$director."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_plan_pdf_meta_box() {  
    global $post;
    wp_nonce_field(plugin_basename(__FILE__), 'curza_plugin_academico_plan_pdf_nonce');
    if($archivo = get_post_meta( $post->ID, 'curza_plugin_academico_plan_pdf', true )) {
        print "PDF CARGADO: ".$archivo['url'];
    }
    $html = '<p class="description">';
    $html .= 'Seleccione su PDF aqui para reemplazar el existente.';
    $html .= '</p>';
    $html .= '<input type="file" id="curza_plugin_academico_plan_pdf" name="curza_plugin_academico_plan_pdf" value="" size="25">';
    echo $html;
}

function curza_plugin_academico_plan_form_tag() {
    global $post;
    if($post->post_type == 'plan'){
        echo ' enctype="multipart/form-data"';
    }
}


