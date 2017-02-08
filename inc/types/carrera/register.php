<?php

add_action('init', 'curza_plugin_academico_register_cpt_carrera');

function curza_plugin_academico_register_cpt_carrera(){
    
    $labels = array(
        'name' => __('Departamentos','carrera_name'),
        'singular_name' => __('Departamento','carrera_singular_name'),
        'menu_name' => __('Departamentos','carrera_menu_name'),
        'all_items' => __('Lista de Departamentos','carrera_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato carrera',
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'support' => array('title','editor','thumbnail','revisions'),
        "capability_type" => 'academico',
        "map_meta_cap" => true        
    );
    
    register_post_type('carrera',$args);
}
