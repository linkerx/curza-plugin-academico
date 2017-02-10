<?php

add_action('init', 'curza_plugin_academico_register_cpt_clase');

function curza_plugin_academico_register_cpt_clase(){
    
    $labels = array(
        'name' => __('Clases','clase_name'),
        'singular_name' => __('Clase','clase_singular_name'),
        'menu_name' => __('Clases','clase_menu_name'),
        'all_items' => __('Lista de Clases','clase_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato clase',
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
        "capability_type" => 'clase',
        "map_meta_cap" => true        
    );
    
    register_post_type('clase',$args);
}
