<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product; ?>

<div class="container woo_notices"> 
	<?php 
	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );
	?>
</div>
<?php
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.

	return;
}

$product = wc_get_product(); ?>
<div id="<?php the_field('product_popup_select'); ?>"  class="single_product_outer <?php the_field('product_template'); ?>">
	<div class="container">
		<div class="row">
			<h1><?php echo $product->get_title(); ?></h1>
			<p><?php
			if(get_field('header_product-subtitel')) :
				the_field('header_product-subtitel');
			endif; ?></p>
		</div>
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
			<div class="product_gallery">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
			</div>
		
			<div class="product_summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>

				<?php
				if ( $product->is_type( 'variable' ) || $product->is_type( 'simple' )) : ?>
				<div class="product-usps">
					<div class="usps__usp"><?php get_template_part('assets/svg/check'); ?>5 jaar garantie</div>
					<div class="usps__usp"><?php get_template_part('assets/svg/check'); ?>Gratis bezorging</div>
					<div class="usps__usp"><?php get_template_part('assets/svg/check'); ?>Inclusief montage</div>
				</div>
				<?php
				endif; ?>
				
			</div>
			
		
			<div class="product_info">
				<div class="first__row">
					<?php if(get_the_content()): ?>
					<div class="info__description">
						<h3 class="description_title">Productbeschrijving</h3>
						<?php the_content(); ?>
					</div>
					<?php endif; ?>
					<?php 
					if( have_rows('advantages') ): ?>
					<div class="info__advantages">
						<h3>Plus- & minpunten</h3>
						<?php
						while( have_rows('advantages') ) : the_row();
							$kind = get_sub_field('advantage_kind');
							if($kind): 
								$icon = '<span>+</span>';
							else: 
								$icon = '<span>-</span>';
							endif;
							$text = get_sub_field('advantage_text'); ?>
							<?php
							if(get_sub_field('advantage_kind')) : ?>
							<div class="advantage">
								<?php echo $icon; echo $text; ?>
							</div>
							<?php
							else : ?>
							<div class="disadvantages">
								<?php echo $icon; echo $text; ?>
							</div>
							<?php
							endif; 
						endwhile; ?>				
					</div>
					<?php 
					endif; ?>
				</div>	


				<div class="second__row">
					<?php 
					if( have_rows('faq') ): ?>
					<div class="info__faq">
						<h3>Veelgestelde vragen</h3>
						<?php
						while( have_rows('faq') ) : the_row();
						$question = get_sub_field('question');
						$answer = get_sub_field('answer'); ?>
						<div id="faq-<?php echo get_row_index(); ?>" class="faq-item">
							<!-- <div class="question" onclick="openPopup('faq-<?php echo get_row_index(); ?>')"> -->
							<div class="question">
								<h4><?php echo $question; ?></h4>
							</div>
							<div class="answer">
								<p><?php echo $answer; ?></p>	
							</div>
						</div>
						<?php
						endwhile; ?>
					</div>
					<?php 
					endif; ?>





					<?php 
					if($product->get_attributes()): ?>
					<div class="info__specifications">
						<h3>Specificaties</h3>
						<?php echo wc_display_product_attributes($product); ?>
					</div>
					<?php 
					endif; ?>
				</div>

				
				<?php
				/**
				 * @hooked woocommerce_output_product_data_tabs - 10 >> Disabled!
				 * @hooked woocommerce_upsell_display - 15 
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>

			</div>

		</div>
	</div>

	
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php if(get_field('product_template') == 'accessoires'): ?>
	<script>
		setInterval(() => {
			var summaryElementsNone = document.getElementsByClassName('none');
			var summaryElements = document.getElementsByClassName('content_product_title');

			for(var i = 0; i < summaryElements.length; i++){
				summaryElements[i].closest(".summary_element").style.display = "block";      
			} 

			for(var i = 0; i < summaryElementsNone.length; i++){
				summaryElementsNone[i].closest(".summary_element").style.display = "none";      
			} 

		}, 300)
	</script>
<?php endif; ?>