<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$attachment_ids = $product->get_gallery_image_ids();

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
); ?>

    <div class="bigswiper__wrapper">
        <div class="swiper bigSwiper">
            <div class="swiper-wrapper">
                <?php
                foreach ( $attachment_ids as $attachment_id ): ?>
                    <div class="swiper-slide">
                        <a data-fslightbox href="<?php echo wp_get_attachment_image_url($attachment_id, 'full'); ?>">
                            <?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
                        </a>
                    </div>
                <?php 
                endforeach; ?>
        
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>



    <div thumbsSlider="" class="swiper thumbSwiper">
        <div class="swiper-wrapper swiper_thumb">
			<?php
			foreach ( $attachment_ids as $attachment_id ): 
            ?>

				<div  class="swiper-slide">
				    <?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
				</div>

            <?php
            endforeach;
			?>
        </div>
    </div>



<script src="/wp-content/themes/bureauhanze/assets/js/fslightbox.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/assets/js/swiper.min.js"></script>

<script>

var swiperThumb = new Swiper(".thumbSwiper", {
    loop: false,
    spaceBetween: 16,
    slidesPerView: 3,
    breakpoints: {
        576: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 5,
        }
    }
});

var swiperBig = new Swiper(".bigSwiper", {
    loop: false,
    spaceBetween: 32,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    slidesPerView: 1,
    thumbs: {
        swiper: swiperThumb,
    },
});
</script>