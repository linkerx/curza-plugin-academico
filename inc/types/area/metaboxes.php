<?php

add_action ('add_meta_boxes','curza_plugin_academico_area_metaboxes');

function curza_plugin_academico_area_metaboxes() {
    global $post;
    if($post->post_type == 'area'){}
}