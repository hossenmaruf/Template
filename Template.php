<?php

/**
 * @package  Template
 */
/*
Plugin Name: Template
Plugin URI: https://github.com/hossenmaruf
Description: This is my custom Plugin
Version: 1.0.0
Author: hossenmaruf
Author URI: https://github.com/hossenmaruf
License: GPLv2 or later
Text Domain: Template
*/




function my_template()
{

    $temps = [];
    $temps['my_special_template.php'] = 'My Special Template';


    return $temps;
}

function my_template_register($page_templates, $theme, $post)
{

    $templates = my_template();

    foreach ($templates as $tk => $tv) {

        $page_templates[$tk] = $tv;
    }

    return $page_templates;
}



add_filter('theme_page_templates', 'my_template_register', 10, 3);

function my_template_select($template)
{

    global $post;

    $page_tem_slug = get_page_template_slug($post->ID);


    $templatess = my_template();

    if (isset($templatess[$page_tem_slug])) {

        $template = plugin_dir_path( __FILE__ ) . 'my_special_template.php';

    }


    return $template;
}

add_filter('template_include', 'my_template_select', 99);
