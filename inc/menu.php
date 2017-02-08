<?php

function curza_plugin_academico_menu(){
    add_menu_page('Configuración', 'Academico', 'manage_options',basename(__FILE__), 'academico_settings', null, 20 );
    add_submenu_page(basename(__FILE__), 'Departamentos', 'Departamentos', 'manage_options', 'edit.php?post_type=departamento', NULL);
    add_submenu_page(basename(__FILE__), 'Carreras', 'Carreras', 'manage_options', 'edit.php?post_type=carrera', NULL);
    add_submenu_page(basename(__FILE__), 'Planes', 'Planes', 'manage_options', 'edit.php?post_type=plan', NULL);
    add_submenu_page(basename(__FILE__), 'Materias', 'Materias', 'manage_options', 'edit.php?post_type=materia', NULL);
}
add_action('admin_menu', 'curza_plugin_academico_menu');

