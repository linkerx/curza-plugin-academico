<?php

function curza_plugin_academico_menu(){
    add_menu_page('Academico', 'Academico', 'academico','menu_academico', 'academico_settings', plugins_url('images/icon_academico.png') );
    add_submenu_page('menu_academico', 'Departamentos', 'Departamentos', "academico", 'edit.php?post_type=departamento', NULL);
    add_submenu_page('menu_academico', 'Carreras', 'Carreras', "academico", 'edit.php?post_type=carrera', NULL);
    add_submenu_page('menu_academico', 'Planes', 'Planes', "academico", 'edit.php?post_type=plan', NULL);
    add_submenu_page('menu_academico', 'Materias', 'Materias', "academico", 'edit.php?post_type=materia', NULL);
}
add_action('admin_menu', 'curza_plugin_academico_menu');

