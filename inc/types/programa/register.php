<?php

add_action('init', 'curza_plugin_academico_register_cpt_programa');

function curza_plugin_academico_register_cpt_programa(){
    
    $labels = array(
        'name' => __('Programas','programa_name'),
        'singular_name' => __('Programa','programa_singular_name'),
        'menu_name' => __('Programas','programa_menu_name'),
        'all_items' => __('Lista de Programas','programa_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato programa',
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
        "capability_type" => 'programa',
        "map_meta_cap" => true        
    );
    
    register_post_type('programa',$args);
}
