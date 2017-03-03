<?php

add_action('init', 'curza_plugin_academico_register_cpt_orientacion');

function curza_plugin_academico_register_cpt_orientacion(){
    
    $labels = array(
        'name' => __('Orientaciones','orientacion_name'),
        'singular_name' => __('Orientación','orientacion_singular_name'),
        'menu_name' => __('Orientaciones','orientacion_menu_name'),
        'all_items' => __('Lista de Orientaciones','orientacion_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato orientacion',
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'support' => array('title'),
        "capability_type" => 'orientacion',
        "map_meta_cap" => true        
    );
    
    register_post_type('orientacion',$args);
}
