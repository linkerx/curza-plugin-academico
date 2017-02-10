<?php

add_action('init', 'curza_plugin_academico_register_cpt_aula');

function curza_plugin_academico_register_cpt_aula(){
    
    $labels = array(
        'name' => __('Aulas','aula_name'),
        'singular_name' => __('Aula','aula_singular_name'),
        'menu_name' => __('Aula','aula_menu_name'),
        'all_items' => __('Lista de Aulas','aula_all_items'),
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Tipo de dato aula',
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
        "capability_type" => 'aula',
        "map_meta_cap" => true        
    );
    
    register_post_type('aula',$args);
    add_post_type_support('aula', array('thumbnail'));
}
