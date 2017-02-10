<?php

add_action("admin_enqueue_scripts",'curza_plugin_academico_aula_admin_head' );
add_action("wp_enqueue_scripts",'curza_plugin_academico_aula_front_head' );

function curza_plugin_academico_aula_admin_head($hook) {
    global $post_type;
    $plugindir = get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__));
    if($hook == 'post.php' || $hook == 'post-new.php' || $hook == 'edit.php')
    {
        if($post_type == 'aula')
        {
            wp_enqueue_script('curza_plugin_academico_aula_admin_js',$plugindir.'/inc/types/aula/assets/admin.js');
            wp_enqueue_style('curza_plugin_academico_aula_admin_css',$plugindir.'/inc/types/aula/assets/admin.css');
        }
    }
}

function curza_plugin_academico_aula_front_head($hook) {
    global $post_type;
    if($post_type == 'aula') {
        $plugindir = get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__));
	wp_enqueue_style('curza_plugin_academico_aula_css',$plugindir.'/inc/types/aula/assets/front.css');
        wp_enqueue_script('curza_plugin_academico_aula_js',$plugindir.'/inc/types/aula/assets/front.js');
    }
}



