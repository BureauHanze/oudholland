<?php

// Get functions from theme file
get_template_part( '../../../bureauhanze/functions.php');

// Woocommerce
get_template_part( 'template-parts/functions/woocommerce');

// Custom admin columns
get_template_part( 'template-parts/functions/admin-columns');


add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	foreach( $items as &$item ) {
		$image = get_field('menu-item__image', $item);
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {
            $item->title .=  wp_get_attachment_image( $image, $size );
        }
	}
	return $items;	
}

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="sub-menu__item"', $ulclass);
 }
 add_filter('wp_nav_menu','add_menuclass');