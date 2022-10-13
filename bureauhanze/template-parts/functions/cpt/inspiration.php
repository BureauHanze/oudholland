<?php
function inspiration_init() {
    $labels = array(
        'name' => 'Inspiratie',
        'singular_name' => 'Inspiratie',
        'add_new' => 'Nieuwe inspiratie toevoegen',
        'add_new_item' => 'Nieuwe inspiratie toevoegen',
        'edit_item' => 'Inspiratie wijzigen',
        'new_item' => 'Nieuwe inspiratie',
        'all_items' => 'Alle inspiraties',
        'view_item' => 'Inspiratie bekijken',
        'search_items' => 'Inspiratie zoeken',
        'not_found' =>  'Geen inspiraties gevonden',
        'not_found_in_trash' => 'Geen inspiraties in de prullenbak', 
        'parent_item_colon' => '',
        'menu_name' => 'Inspiratie',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'inspiratie'),
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
    register_post_type( 'inspiration', $args );
    
    register_taxonomy('inspiration_category', 'inspiration', array('hierarchical' => true, 'label' => 'Categoriën', 'query_var' => true, 'rewrite' => array( 'slug' => 'inspiratie-categorie' )));
}
add_action( 'init', 'inspiration_init' );