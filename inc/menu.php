<?php

add_action('admin_menu', 'curza_plugin_academico_menu_academico');
add_action('admin_menu', 'curza_plugin_academico_menu_bedelia');

function curza_plugin_academico_menu_academico(){
    global $submenu;
    add_menu_page('Academico', 'Academico', 'manage_academico',basename(__FILE__)."_academico", 'curza_plugin_academico_setting_page', null, 20 );
    add_submenu_page(basename(__FILE__)."_academico", 'Departamentos', 'Departamentos', 'manage_academico', 'edit.php?post_type=departamento', NULL);
    add_submenu_page(basename(__FILE__)."_academico", 'Carreras', 'Carreras', 'manage_academico', 'edit.php?post_type=carrera', NULL);
    add_submenu_page(basename(__FILE__)."_academico", 'Planes', 'Planes', 'manage_academico', 'edit.php?post_type=plan', NULL);
    add_submenu_page(basename(__FILE__)."_academico", 'Materias', 'Materias', 'manage_academico', 'edit.php?post_type=materia', NULL);
    add_submenu_page(basename(__FILE__)."_academico", 'Programas', 'Programas', 'manage_academico', 'edit.php?post_type=programa', NULL);
    $submenu[basename(__FILE__)."_academico"][0][0] = "Configuración";
}

function curza_plugin_academico_menu_bedelia(){
    global $submenu;
    add_menu_page('Bedelia', 'Bedelia', 'manage_academico',basename(__FILE__)."_bedelia", 'curza_plugin_academico_bedelia_page', null, 21 );
    add_submenu_page(basename(__FILE__)."_bedelia", 'Aulas', 'Aulas', 'manage_academico', 'edit.php?post_type=aula', NULL);
    add_submenu_page(basename(__FILE__)."_bedelia", 'Clases', 'Clases', 'manage_academico', 'edit.php?post_type=clase', NULL);
    $submenu[basename(__FILE__)."_bedelia"][0][0] = "Configuración";
}

function curza_plugin_academico_setting_page(){
    echo "<h1>Plugin Curza Academico</h1>";
}

function curza_plugin_academico_bedelia_page(){
    echo "<h1>Plugin Curza Academico - Bedelia</h1>";
}