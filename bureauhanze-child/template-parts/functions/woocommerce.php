<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


if(function_exists('add_theme_support')) {
	add_theme_support('category-thumbnails');
}

// Format WooCommerce price for products
// add_filter('formatted_woocommerce_price', 'ts_woo_decimal_price', 10, 5);
// function ts_woo_decimal_price($formatted_price, $price, $decimal_places, $decimal_separator, $thousand_separator)
// {
//     $unit = number_format(intval($price), 0, $decimal_separator, $thousand_separator);
//     $decimal = sprintf('%02d', ($price - intval($price)) * 100);
//     return $unit . ',' . '<sup>' . $decimal . '</sup>';
// }

add_filter( 'formatted_woocommerce_price', 'dcwd_superscript_wc_formatted_price', 10, 5 );
function dcwd_superscript_wc_formatted_price( $formatted_price, $price, $decimal_places, $decimal_separator, $thousand_separator ) {
	// Leave prices unchanged in Dashboard.
	if ( is_admin() ) {
		return $formatted_price;
	}

	// Format units, including thousands separator if necessary.
	$unit = number_format( intval( $price ), 0, $decimal_separator, $thousand_separator );
	// Format decimals, with leading zeros as necessary (e.g. for 2 decimals, 0 becomes 00, 3 becomes 03 etc).
	$decimal = '';
	$num_decimals = wc_get_price_decimals();
	if ( $num_decimals ) {
		$decimal = sprintf( '<span class="seperator">' . $decimal_separator . '</span><sup>%0'.$num_decimals.'d</sup>', round( ( $price - intval( $price ) ) * 100 ) );
	}

	return $unit . $decimal;
}


/*
 * Shortcode for WooCommerce Cart Icon for Menu Item
 */
add_shortcode('woocommerce_cart_icon', 'woo_cart_icon');
function woo_cart_icon()
{
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set variable for Cart URL

    echo '<a class="menu-item cart-contents" href="' . $cart_url . '" title="Cart">';

    if ($cart_count > 0) {

        echo '<span class="cart-contents-count">' . $cart_count . '</span>';

    }

    echo '</a>';


    return ob_get_clean();

}


/*
 * Filter with AJAX When Cart Contents Update
 */
add_filter('woocommerce_add_to_cart_fragments', 'woo_cart_icon_count');
function woo_cart_icon_count($fragments)
{

    ob_start();

    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();


    echo '<a class="cart-contents menu-item" href="' . $cart_url . '" title="View Cart">';

    if ($cart_count > 0) {

        echo '<span class="cart-contents-count">' . $cart_count . '</span>';

    }
    echo '</a>';

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}


// To change add to cart text on single product page
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text');
function woocommerce_custom_single_add_to_cart_text()
{
    return __('In winkelmand', 'woocommerce');
}

// To change add to cart text on product archives(Collection) page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text');
function woocommerce_custom_product_add_to_cart_text()
{
    return __('Reserveren', 'woocommerce');
}


add_action('wp_ajax_show_product', 'show_product_callback_wp');
add_action('wp_ajax_nopriv_show_product', 'show_product_callback_wp');
function show_product_callback_wp()
{
    $url = $_POST['url'];
    $product_id = url_to_postid($url);


    $content_post = get_post($product_id);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    $output = "";


    $output =
        '<div class="modal__product">' .
        '<div class="product__heading">' .
        '<div class="product__image">' .
        get_the_post_thumbnail($product_id, 'small') .
        '</div>' .
        '<div class="product__specs">' .
        the_title() .
        $content .
        '</div>' .
        '</div>' .
        '</div>';

    // $output . = '<div class="content__image">' .
    // get_the_post_thumbnail( $product_id, 'small') .
    // '</div>';


    //  $output .= '<div class="content__image">'.get_the_post_thumbnail( $product_id, 'small').'</div>';
    //  $output .= '<div class="content__content">'.$content. '</div>';

    $terms = get_the_terms($product_id, 'product_cat');
    foreach ($terms as $term) {
        $output .= '<div class="content__cat">' . $product_cat_id[] = $term->name . '</div>';
    }


    echo $output;
    exit();
}

function woocommerce_template_loop_product_link_open()
{
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    echo '<a rel="nofollow" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>';
}

/**
 * @snippet       Get Current Variation Info @ WooCommerce Single Product
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_action('woocommerce_after_add_to_cart_form', 'bbloomer_echo_variation_info');

function bbloomer_echo_variation_info()
{
    global $product;
    if (!$product->is_type('variable')) return;
    echo '<div class="var_info"></div>';
}

//add_filter('woocommerce_get_price_html', 'cssigniter_change_variable_price_display');
//function cssigniter_change_variable_price_display($price)
//{
//    global $product;
//
//
//    if ('variable' !== $product->get_type()) {
//        return $price;
//    }
//
//    $prices = array($product->get_variation_price('min', true), $product->get_variation_price('max', true));
//    // Translators: %s is the lowest variation price.
//    $price = $prices[0] !== $prices[1] ? sprintf(__('%s', 'your-text-domain'), wc_price($prices[0])) : wc_price($prices[0]);
//
//    return $price;
//}

//function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {
//
//    if ( is_null( $product ) ) {
//        $product = $GLOBALS['product'];
//    }
//
//    $defaults = array(
//        'input_id' => uniqid( 'quantity_' ),
//        'input_name' => 'quantity',
//        'input_value' => '1',
//        'classes' => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty', 'text' ), $product ),
//        'max_value' => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
//        'min_value' => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
//        'step' => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
//        'pattern' => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
//        'inputmode' => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
//        'product_name' => $product ? $product->get_title() : '',
//    );
//
//    $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );
//
//
//    $args['min_value'] = max( $args['min_value'], 0 );
//    $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : 20;
//
//    if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
//        $args['max_value'] = $args['min_value'];
//    }
//
//    $options = '';
//
//    for ( $count = $args['min_value']; $count <= $args['max_value']; $count = $count + $args['step'] ) {
//
//        if ( '' !== $args['input_value'] && $args['input_value'] >= 1 && $count == $args['input_value'] ) {
//            $selected = 'selected';
//        } else $selected = '';
//
//        $options .= '<option value="' . $count . '"' . $selected . '>' . $count . '</option>';
//
//    }
//
//    $string = '<div class="quantity"><select name="' . $args['input_name'] . '">' . $options . '</select></div>';
//
//    if ( $echo ) {
//        echo $string;
//    } else {
//        return $string;
//    }
//
//}

// Ajax header cart count
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="cart__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php

    $fragments['span.cart__count'] = ob_get_clean();

    return $fragments;
}

// Classes toevoegen checkout btn
add_filter( 'woocommerce_order_button_html', 'custom_order_button_html');
function custom_order_button_html( $button ) {

    // Button text
    $order_button_text = __('Reservering plaatsen', 'woocommerce');

    // Markup - add in classes, data attibutes
    $button = '<input type="submit" class="btn chechout_btn" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '"/>';

    return $button;
}

// woocommerce add extra register fields

function wooc_extra_register_fields() {?>
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>

    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
    <p class="form-row form-row-wide">
        <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


add_filter('woocommerce_show_variation_price',      function() { return TRUE;});



// Price
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );


//Excerpt
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );

// Remove all currency symbols
function sww_remove_wc_currency_symbols( $currency_symbol, $currency ) {
    $currency_symbol = '';
    return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'sww_remove_wc_currency_symbols', 10, 2);

// Max 4 items compound products
add_filter( 'woocommerce_component_options_per_page', 'wc_cp_component_options_per_page', 10, 3 );
function wc_cp_component_options_per_page( $results_count, $component_id, $composite ) {
    return 4;
}

// Remove product meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );




add_filter('request', function( $vars ) {
    global $wpdb;
    if( ! empty( $vars['pagename'] ) || ! empty( $vars['category_name'] ) || ! empty( $vars['name'] ) || ! empty( $vars['attachment'] ) ) {
       $slug = ! empty( $vars['pagename'] ) ? $vars['pagename'] : ( ! empty( $vars['name'] ) ? $vars['name'] : ( !empty( $vars['category_name'] ) ? $vars['category_name'] : $vars['attachment'] ) );
       $exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s" ,array( $slug )));
       if( $exists ){
          $old_vars = $vars;
          $vars = array('product_cat' => $slug );
          if ( !empty( $old_vars['paged'] ) || !empty( $old_vars['page'] ) )
             $vars['paged'] = ! empty( $old_vars['paged'] ) ? $old_vars['paged'] : $old_vars['page'];
          if ( !empty( $old_vars['orderby'] ) )
             $vars['orderby'] = $old_vars['orderby'];
          if ( !empty( $old_vars['order'] ) )
             $vars['order'] = $old_vars['order'];
       }
    }
    return $vars;
 });


// Make FacetWP work on Archive pages! :)
add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
    if ( $query->is_archive() && $query->is_main_query() ) {
        $is_main_query = false;
    }
    return $is_main_query;
}, 10, 2 );


add_action( 'wp_loaded', 'remove_main_content' );
function remove_main_content() {
  if( is_shop() ) {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
  }
}

// hides some annoying #text that you cant catch with css only
function ace_hide_shipping_title( $label ) {
    $pos = strpos( $label, ': ' );
    return substr( $label, ++$pos );
}
add_filter( 'woocommerce_cart_shipping_method_full_label', 'ace_hide_shipping_title' );


// only shows "Gratis verzending" when its an option
function hide_shipping_when_free_is_available( $rates, $package ) {
    $new_rates = array();
    foreach ( $rates as $rate_id => $rate ) {
        // Only modify rates if free_shipping is present.
        if ( 'free_shipping' === $rate->method_id ) {
            $new_rates[ $rate_id ] = $rate;
            break;
        }
    }

    if ( ! empty( $new_rates ) ) {
        //Save local pickup if it's present.
        foreach ( $rates as $rate_id => $rate ) {
            if ('local_pickup' === $rate->method_id ) {
                $new_rates[ $rate_id ] = $rate;
                break;
            }
        }
        return $new_rates;
    }

    return $rates;
}
add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );
