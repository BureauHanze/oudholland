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

            // $item->title . wp_get_attachment_image( $image, $size );
            $item->title .=  wp_get_attachment_image( $image, $size );
            // var_dump($item);
        }
	}
	return $items;	
}


function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="sub-menu__item"', $ulclass);
 }
 add_filter('wp_nav_menu','add_menuclass');






// class My_Walker_Nav_Menu extends Walker_Nav_Menu {
//     function start_lvl(&$output, $depth = 0, $args = array()) {
//         $indent = str_repeat("\t", $depth);
//         $output .= "\n$indent<div class=\"sub-menu-wrapper\"><ul class=\"sub-menu\">\n";
//     }
//     function end_lvl(&$output, $depth = 0, $args = array()) {
//         $indent = str_repeat("\t", $depth);
//         $output .= "$indent</ul></div>\n";
//     }
// }

// class My_Walker_Nav_Menu extends Walker_Nav_Menu {
//     private $_before = null;

//     public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
//         // Backup the original "before", if any.
//         if ( null === $this->_before ) {
//             $this->_before = $args->before;
//         }
//         // Now add the wrapper div, if applicable.
//         if ( 0 == $depth ) {
//             $args->before = '<div class="sub-menu-wrapper">' . $this->_before;
//         } else {
//             $args->before = $this->_before;
//         }

//         // Then let the parent walker does the output generation.
//         parent::start_el( $output, $item, $depth, $args, $id );
//     }

//     public function end_el( &$output, $item, $depth = 0, $args = array() ) {
//         // Close the wrapper div, if applicable.
//         if ( 0 == $depth ) {
//             $output .= '</div><!-- .sub-menu-wrapper -->';
//         }
//         $output .= "</li>\n";
//     }
// }



// class My_Walker_Nav_Menu extends Walker_Nav_Menu {



//     public function end_el(&$output, $item, $args = array()) {
//         $locations = get_nav_menu_locations(); //get all menu locations
//         $menu = wp_get_nav_menu_object($locations[$this->menu_location]); //one menu for one location so lets get the menu of this location
//         $menu_items = wp_get_nav_menu_items($menu->term_id);


//         foreach( $menu_item as &$item ) {
//             $image = get_field('menu-item__image', $item);
//             $size = 'full'; // (thumbnail, medium, large, full or custom size)
//             if( $image ) {
    
//                 // $item->title . wp_get_attachment_image( $image, $size );
//                 $item->title .=  wp_get_attachment_image( $image, $size );
//                 // var_dump($item);
//             }
//         }

//         $output .= "<img src='PATH_TO_YOUR_LOGO' alt='' />"; //here we add the logo

//     }
// }