<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! $product_attributes ) {
	return;
}
?>

<div id="specsWrap" class="specs_wrapper">
	
	<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
		<div id="spec-<?php echo esc_attr( $product_attribute_key ); ?>" class="spec-item">
			<div class="specs_name"><?php echo wp_kses_post( $product_attribute['label'] ); ?></div>
			<div class="specs_text"><?php echo wp_kses_post( $product_attribute['value'] ); ?></div>
		</div>
	<?php endforeach; ?>
	
	<?php $count = count($product_attributes); ?>

<?php if($count > 3): ?>
	<div class="specs-btn">
		<?php get_template_part('assets/svg/arrow'); ?>
		<div class="more__specs" onclick="openSpecs('specsWrap')">Meer specificaties</div>
	</div>

<?php endif; ?>

</div>