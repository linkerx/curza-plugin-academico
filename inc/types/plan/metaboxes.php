<?php

add_action('add_meta_boxes','curza_plugin_academico_plan_metaboxes');
add_action('post_edit_form_tag', 'curza_plugin_academico_plan_form_tag');

function curza_plugin_academico_plan_metaboxes() {
    global $post;
    if($post->post_type == 'plan'){
        add_meta_box('curza_plugin_academico_plan_titulo',"Título", 'curza_plugin_academico_plan_titulo_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_duracion',"Duracion", 'curza_plugin_academico_plan_duracion_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_carga_total',"Carga Horaria Total", 'curza_plugin_academico_plan_carga_total_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_carga_semanal',"Carga Horaria Semanal", 'curza_plugin_academico_plan_carga_semanal_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_modalidad',"Modalidad", 'curza_plugin_academico_plan_modalidad_meta_box', null, 'normal','core');
        add_meta_box('curza_plugin_academico_plan_pdf',"PDF Ordenanza", 'curza_plugin_academico_plan_pdf_meta_box', null, 'normal','core');
    }
}

function curza_plugin_academico_plan_titulo_meta_box(){
    global $post;
    $id = $post->ID;
    $titulo = get_post_meta($id,'curza_plugin_academico_plan_titulo',true);
    print "<div id='curza_plugin_academico_plan_titulo_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_titulo_input' style='width:100%;' value='".$titulo."'></div>";
    print "<div style='clear:both;'></div>";
}


function curza_plugin_academico_plan_duracion_meta_box(){
    global $post;
    $id = $post->ID;
    $duracion = get_post_meta($id,'curza_plugin_academico_plan_duracion',true);
    print "<div id='curza_plugin_academico_plan_duracion_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_duracion_input' value='".$duracion."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_plan_carga_total_meta_box(){
    global $post;
    $id = $post->ID;
    $carga_total = get_post_meta($id,'curza_plugin_academico_plan_carga_total',true);
    print "<div id='curza_plugin_academico_plan_carga_total_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_carga_total_input' value='".$carga_total."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_plan_carga_semanal_meta_box(){
    global $post;
    $id = $post->ID;
    $carga_semanal = get_post_meta($id,'curza_plugin_academico_plan_carga_semanal',true);
    print "<div id='curza_plugin_academico_plan_carga_semanal_container'>";
    print "<input type='text' name='curza_plugin_academico_plan_carga_semanal_input' value='".$carga_semanal."'></div>";
    print "<div style='clear:both;'></div>";
}

function curza_plugin_academico_plan_modalidad_meta_box(){
    global $post;
    $id = $post->ID;
    
    delete_option('curza_plugin_academico_modalidades');
    
    $modalidades = get_option('curza_plugin_academico_modalidades');
    
    if(!$modalidades){
        $modalidades = json_encode(array('presencial','semipresencial','virtual'));
        $modalidades_icons = json_encode(array('presencial' => 'ion-easel','semipresencial' => 'ion-laptop','virtual' => 'ion-earth'));
        update_option('curza_plugin_academico_modalidades',$modalidades);
    }
    $modalidad = json_decode(get_post_meta($id,'curza_plugin_academico_plan_modalidad',true),true);
    $mods_array = json_decode($modalidades);
    
    print "<div id='curza_plugin_academico_plan_modalidad_container'>";
    if(is_array($mods_array))
    foreach($mods_array as $mod){
        print "<input type='checkbox' name='modalidad[".$mod."]' ";
        if(isset($modalidad[$mod]) && $modalidad[$mod] == 1) {
            print "value='1' checked ";
        }
        print "/> ".$mod."<br>";
    }
    print "</div>";
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

