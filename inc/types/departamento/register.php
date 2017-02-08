<?php

add_action('init', 'curza_plugin_academico_register_cpt_departamento');

function curza_plugin_academico_register_cpt_departamento(){
    
    $labels = array(
        'name' => __('Departamentos','departamento_name'),
        'singular_name' => __('Departamento','departamento_singular_name'),
        'menu_name' => __('Departamentos','departamento_menu_name'),
        'all_items' => __('Lista de Departamentos','departamento_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato departamento',
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
        'taxonomies' => array('category'),
        "capability_type" => 'departamento',
        "map_meta_cap" => true        
    );
    
    register_post_type('departamento',$args);
    add_post_type_support('agencia', array('thumbnail'));
}
