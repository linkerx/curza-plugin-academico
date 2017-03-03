<?php

add_action ('add_meta_boxes','curza_plugin_academico_orientacion_metaboxes');

function curza_plugin_academico_orientacion_metaboxes() {
    global $post;
    if($post->post_type == 'orientacion'){}
}