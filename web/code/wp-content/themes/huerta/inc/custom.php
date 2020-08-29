<?php
/*
|--------------------------------------------------------------------
| Theme functions - Add your custom functions here
|--------------------------------------------------------------------
*/

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Global Options',
        'menu_title'    => 'Global Options',
        'menu_slug'     => 'general_settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


add_theme_support('woocommerce');
