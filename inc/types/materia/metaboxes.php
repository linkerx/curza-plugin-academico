<?php

add_action ('add_meta_boxes','curza_plugin_academico_materia_metaboxes');
add_action('post_edit_form_tag', 'curza_plugin_academico_materia_form_tag');

function curza_plugin_academico_materia_metaboxes() {
    global $post;
    if($post->post_type == 'materia'){
        add_meta_box('curza_plugin_academico_materia_orden',"Orden", 'curza_plugin_academico_materia_orden_meta_box', null, 'side','core');
        add_meta_box('curza_plugin_academico_materia_equipo',"Equipo", 'curza_plugin_academico_materia_equipo_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_materia_carga_total',"Carga Total", 'curza_plugin_academico_materia_carga_total_meta_box', null, 'side','core');
        add_meta_box('curza_plugin_academico_materia_carga_semanal ',"Carga Semanal", 'curza_plugin_academico_materia_carga_semanal_meta_box', null, 'side','core');
        add_meta_box('curza_plugin_academico_materia_dedicacion',"Dedicacion", 'curza_plugin_academico_materia_dedicacion_meta_box', null, 'side','core');
        add_meta_box('curza_plugin_academico_materia_programa',"Programa", 'curza_plugin_academico_materia_programa_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_materia_programa_ano',"Año del Programa", 'curza_plugin_academico_materia_programa_ano_meta_box', null, 'side','core');
    }
}

function curza_plugin_academico_materia_orden_meta_box(){
    global $post;
    $id = $post->ID;
    $orden = get_post_meta($id,'curza_plugin_academico_materia_orden',true);
    print "<div id='curza_plugin_academico_materia_orden_container'>";
    print "<input type='text' name='curza_plugin_academico_materia_orden_input' style='width:100%;' value='".$orden."'></div>";
    print "<div style='clear:both;'></div>";
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

function curza_plugin_academico_materia_carga_total_meta_box(){
    global $post;
    $id = $post->ID;
    $carga_total = get_post_meta($id,'curza_plugin_academico_materia_carga_total',true);
    print "<div id='curza_plugin_academico_materia_carga_total_container'>";
    print "<input type='text' name='curza_plugin_academico_materia_carga_total_input' style='width:100%;' value='".$carga_total."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_materia_carga_semanal_meta_box(){
    global $post;
    $id = $post->ID;
    $carga_semanal = get_post_meta($id,'curza_plugin_academico_materia_carga_semanal',true);
    print "<div id='curza_plugin_academico_materia_carga_semanal_container'>";
    print "<input type='text' name='curza_plugin_academico_materia_carga_semanal_input' style='width:100%;' value='".$carga_semanal."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_materia_dedicacion_meta_box(){
    global $post;
    $id = $post->ID;
    $dedicaciones = array("Anual","1er. Cuatrimestre","2do. Cuatrimestre");
    $dedicacion = get_post_meta($id,'curza_plugin_academico_materia_dedicacion',true);
    print "<div id='curza_plugin_academico_materia_dedicacion_container'>";
    print "<select name='curza_plugin_academico_materia_dedicacion_select'>";
    foreach ($dedicaciones as $key=> $value){
        print "<option value='".$key."' "; 
        if($dedicacion == $key)
            print "selected";
        print " >".$value."</option>";
    }
    print "</select>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_materia_programa_ano_meta_box(){
    global $post;
    $id = $post->ID;
    $programa_ano = get_post_meta($id,'curza_plugin_academico_materia_programa_ano',true);
    print "<div id='curza_plugin_academico_materia_programa_ano_container'>";
    print "<input type='text' name='curza_plugin_academico_materia_programa_ano_input' style='width:100%;' value='".$programa_ano."'></div>";
    print "<div style='clear:both;'></div>";
}


function curza_plugin_academico_materia_programa_meta_box() {  
    global $post;
    wp_nonce_field(plugin_basename(__FILE__), 'curza_plugin_academico_materia_pdf_nonce');
    if($archivo = get_post_meta( $post->ID, 'curza_plugin_academico_materia_pdf', true )) {
        print "PDF CARGADO: ".$archivo['url'];
    }
    $html = '<p class="description">';
    $html .= 'Seleccione su PDF aqui para reemplazar el existente.';
    $html .= '</p>';
    $html .= '<input type="file" id="curza_plugin_academico_materia_pdf" name="curza_plugin_academico_materia_pdf" value="" size="25">';
    echo $html;
}

function curza_plugin_academico_materia_form_tag() {
    global $post;
    if($post->post_type == 'materia'){
        echo ' enctype="multipart/form-data"';
    }
}
