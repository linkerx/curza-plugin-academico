<?php

add_action('init', 'curza_plugin_academico_register_cpt_plan');

function curza_plugin_academico_register_cpt_plan(){
    
    $labels = array(
        'name' => __('Planes','plan_name'),
        'singular_name' => __('Plan','plan_singular_name'),
        'menu_name' => __('Planes','plan_menu_name'),
        'all_items' => __('Lista de Planes','plan_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato plan',
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
        "capability_type" => 'plan',
        "map_meta_cap" => true        
    );
    
    register_post_type('plan',$args);
}
