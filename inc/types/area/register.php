<?php

add_action('init', 'curza_plugin_academico_register_cpt_area');

function curza_plugin_academico_register_cpt_area(){
    
    $labels = array(
        'name' => __('Areas','area_name'),
        'singular_name' => __('Area','area_singular_name'),
        'menu_name' => __('Areas','area_menu_name'),
        'all_items' => __('Lista de Areas','area_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato area',
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
        "capability_type" => 'area',
        "map_meta_cap" => true        
    );
    
    register_post_type('area',$args);
}
