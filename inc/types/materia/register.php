<?php

add_action('init', 'curza_plugin_academico_register_cpt_materia');

function curza_plugin_academico_register_cpt_materia(){
    
    $labels = array(
        'name' => __('Materias','materia_name'),
        'singular_name' => __('Materia','materia_singular_name'),
        'menu_name' => __('Materias','materia_menu_name'),
        'all_items' => __('Lista de Materias','materia_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato materia',
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
        "capability_type" => 'materia',
        "map_meta_cap" => true        
    );
    
    register_post_type('materia',$args);
}
