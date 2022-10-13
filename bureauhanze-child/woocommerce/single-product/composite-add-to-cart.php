<?php
/**
 * Composite add-to-cart panel template
 *
 * Override this template by copying it to 'yourtheme/woocommerce/single-product/composite-add-to-cart.php'.
 *
 * On occasion, this template file may need to be updated and you (the theme developer) will need to copy the new files to your theme to maintain compatibility.
 * We try to do this as little as possible, but it does happen.
 * When this occurs the version of the template file will be bumped and the readme will list any important changes.
 *
 * @version 3.13.1
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<div id="composite_data_<?php echo $product_id; ?>" class="cart composite_data <?php echo isset( $_REQUEST[ 'add-to-cart' ] ) ? 'composite_added_to_cart' : ''; ?>" data-item_id="review" data-composite_settings="<?php echo htmlspecialchars( json_encode( $product->add_to_cart_form_settings() ) ); ?>" data-nav_title="<?php echo esc_attr( __( 'Review Configuration', 'woocommerce-composite-products' ) ); ?>" data-scenario_data="<?php echo esc_attr( json_encode( $product->get_current_scenario_data() ) ); ?>" data-price_data="<?php echo esc_attr( json_encode( $product->get_composite_price_data() ) ); ?>" data-container_id="<?php echo $product_id; ?>" style="display:none;"><?php

	/**
	 * Action 'woocommerce_before_add_to_cart_button'.
	 *
	 * @hooked wc_cp_before_add_to_cart_button - 5
	 */
	do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<div class="composite_wrap" style="<?php echo apply_filters( 'woocommerce_composite_button_behaviour', 'new', $product ) === 'new' ? '' : 'display:none'; ?>">
		<div class="compositeprice_wrapper">
			<div id="priceWatch" class="composite_price"></div> <!-- Price is filled with JS -->
			<div class="price_inc_vat"><span id="incVATprice"></span><span>incl. btw</span></div> <!-- Price is filled with JS -->
		</div>
		<div class="composite_message" style="display:none;"><ul class="msg woocommerce-info"></ul></div>
			<div class="composite_availability">
			<?php
			// Availability html.
			echo $availability_html; ?>
			</div>
		
		<div class="composite_button"><?php
			/**
			 * Action 'woocommerce_composite_add_to_cart_button'.
			 *
			 * @hooked wc_cp_add_to_cart_button - 10
			 */
			do_action( 'woocommerce_composite_add_to_cart_button' ); ?>
			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>" />
		</div>

		<div class="product-usps">
			<div class="usps__usp"><?php get_template_part('assets/svg/check'); ?>5 jaar garantie</div>
			<div class="usps__usp"><?php get_template_part('assets/svg/check'); ?>Gratis bezorging</div>
			<div class="usps__usp"><?php get_template_part('assets/svg/check'); ?>Inclusief montage</div>
		</div>
	</div>
	<?php
	do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</div>

<?php
if(get_field('product_template') == 'accessoires' ) : ?>
<div id="multipageFooter" class="cp_multipage_footer">
	<div class="container">
		<div class="cp_totals">Totaalprijs: <span id="productTotals"></span> <span class="cp_totals__after">excl. btw</span></div>
		<a href="/afrekenen" title="Afrekenen" class="checkout">Direct afrekenen</a>
	</div>
</div>
<?php
endif; ?>
