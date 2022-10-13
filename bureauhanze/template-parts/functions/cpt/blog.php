<?php
function blog_init() {
    $labels = array(
        'name' => 'Blog',
        'singular_name' => 'Blog',
        'add_new' => 'Nieuwe blog toevoegen',
        'add_new_item' => 'Nieuwe blog toevoegen',
        'edit_item' => 'Blog wijzigen',
        'new_item' => 'Nieuwe blog',
        'all_items' => 'Alle blogs',
        'view_item' => 'Blog bekijken',
        'search_items' => 'Blog zoeken',
        'not_found' =>  'Geen blogs gevonden',
        'not_found_in_trash' => 'Geen blogs in de prullenbak', 
        'parent_item_colon' => '',
        'menu_name' => 'Blog',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'blog'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
            'thumbnail',
            'author',
        )
    );
    register_post_type( 'blog', $args );
    
    register_taxonomy('blog_category', 'blog', array('hierarchical' => true, 'label' => 'Categoriën', 'query_var' => true, 'rewrite' => array( 'slug' => 'blog-categorie' )));
}
add_action( 'init', 'blog_init' );