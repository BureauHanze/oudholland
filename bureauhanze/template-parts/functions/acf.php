<?php

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme options',
        'menu_title'	=> 'Theme options',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Header options',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Brands',
		'menu_title'	=> 'Merken',
		'parent_slug'	=> 'theme-general-settings',
	));
    acf_add_options_sub_page(array(
        'page_title'     =>  'Pop-up',
        'menu_title'     =>  'Pop-up',
        'parent_slug'    =>  'edit.php?post_type=product',
    ));
}

// Add JSON File to save standard ACF Fields

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/assets/json/';
    // return
    return $path;  
}

// Load JSON File with standard ACF Fields

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/assets/json/';
    // return
    return $paths;
}

// Load Style.css for ACF

function my_acf_admin_head() {

    wp_register_style( 'acf-style',  get_template_directory_uri() .'/assets/css/acf-style.css', array(), null, 'all' );
    wp_enqueue_style( 'acf-style' );
    
}

add_action('acf/input/admin_head', 'my_acf_admin_head');