<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>

<?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php wc_get_template_part('content', 'single-product'); ?>

<?php endwhile; // end of the loop. ?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    <!-- Accessoires Modal -->
    <div class="product-added-modal"  id="productAddedModalAdvanced">
        <div class="product-modal-content">
            <span class="product-modal-close" onclick="closePAM()">&times;</span>
            <div class="pam-heading">
                <div class="pam-heading__image">
                    <?php
                    $product = wc_get_product();

                    echo $product-> get_image('full'); ?>
                </div>
                <div class="pam-heading__">
                    <h3>
                        <svg width="23" height="18" viewBox="0 0 23 18" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <clipPath id="a">
                                    <path d="M1920 0v2174H0V0h1920Z"/>
                                </clipPath>
                                <clipPath id="b">
                                    <path d="M19.78 0 23 3.262 8.05 18 0 10.012l3.22-3.15 4.83 4.725L19.78 0Z"/>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#a)" transform="translate(-673 -517)">
                                <g clip-path="url(#b)" transform="translate(673 517)">
                                    <path fill="#E2993E" d="M0 0h23v18H0V0z"/>
                                </g>
                            </g>
                        </svg>
                        Het artikel is toegevoegd aan je winkelwagen
                    </h3>
                    <p><?php echo the_title() ?></p>
                </div>

            </div>
            <div class="pam-extras">
                <div class="pam-extra-warning">
                    <h4><span style="color: #E39A3F">
                    
                    <svg width="22px" height="20px" viewBox="0 0 22 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <path d="M10.8000077,0 C11.3002265,0 11.7426062,0.26262043 11.9827804,0.701750661 L21.4337407,18.0025986 C21.662693,18.4243199 21.6548883,18.9217064 21.4121406,19.3339165 C21.167621,19.7513067 20.7330461,20 20.250082,20 L1.34989116,20 C0.866969201,20 0.432394286,19.7513067 0.187874705,19.3339165 C-0.054915183,18.9217064 -0.0626777094,18.4243199 0.166274631,18.0025986 L9.61723489,0.701750661 C9.85740914,0.26262043 10.2997888,0 10.8000077,0 Z M10.8000077,14.7825792 C10.0854755,14.7825792 9.50404544,15.3677748 9.50404544,16.0869344 C9.50404544,16.806094 10.0855177,17.3912896 10.8000077,17.3912896 C11.5144976,17.3912896 12.0959699,16.8060515 12.0959699,16.0869344 C12.0959699,15.3678172 11.5145398,14.7825792 10.8000077,14.7825792 Z M10.8017373,6.95653282 C10.7309043,6.95653282 10.6591853,6.96260472 10.5866226,6.97479099 C9.88162485,7.09130359 9.40384979,7.75653791 9.52218612,8.45998701 L10.374039,13.55304 C10.4034016,13.7295498 10.5416505,13.8756576 10.7291324,13.9069513 C10.7524622,13.9112823 10.7775216,13.9130232 10.8008514,13.9130232 C11.0073599,13.9130232 11.1904965,13.763476 11.2259341,13.55304 L12.0778292,8.45998701 C12.100273,8.32436701 12.1028886,8.17825919 12.0778292,8.03478394 C11.9724023,7.40436752 11.4237942,6.95653282 10.8017373,6.95653282 Z" id="path-9ec0j9d6ul-1"></path>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Clipped">
                                <mask id="mask-9ec0j9d6ul-2" fill="white">
                                    <use xlink:href="#path-9ec0j9d6ul-1"></use>
                                </mask>
                                <g id="Shape"></g>
                                <polygon id="Path" fill="#E2993E" fill-rule="nonzero" mask="url(#mask-9ec0j9d6ul-2)" points="2.55795107e-11 0 21.6 0 21.6 20 2.55795107e-11 20"></polygon>
                            </g>
                        </g>
                    </svg>
                            Let op</span> bij dit
                        product worden vaak accessoires besteld
                    </h4>
                    <?php $pam_text = get_field('accessoires_warning', 'option'); ?>
                    <p><?php echo $pam_text ?></p>
                </div>
                <div class="pam-extra-accesoires accessoires-grid">
                    <?php
                    $images = get_field('afbeeldingen_acc', 'option');
                    foreach ($images as $image): ?>
                        <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                    <?php endforeach; ?>
                </div>
                <div class="pam-extra-footer">
                    <p class="pam-footer-text">Geen accesoires nodig? <a href="/winkelwagen/">Direct bestellen</a> of <span
                                onclick="closePAM()">winkel verder</span></p>
                    <a class="btn btn-secondary" href="/bureau-accessoires/">
                        <?php get_template_part('assets/svg/plus-icon') ?> Bekijk de accessoires
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Standard Modal -->
    <div class="product-added-modal"  id="productAddedModalStandard">
        <div class="product-modal-content">
            <span class="product-modal-close" onclick="closePAM()">&times;</span>
            <div class="pam-heading">
                <div class="pam-heading__image">
                    <?php
                    $product = wc_get_product();

                      echo $product-> get_image('full'); ?>

                </div>
                <div>
                    <h3>Het artikel is toegevoegd aan je winkelwagen</h3>
                    <p><?php the_title(); ?></p>
                </div>

            </div>
            <div class="pam-extras">
                <h4 class="pam-extra-heading">Dit product wordt vaak gezocht in combinatie met:</h4>
                <div class="pam-extra-accesoires">
                    <div class="swiper pamSwiper">
                        <div class="swiper-wrapper">
                            <?php                            
                             $post = get_queried_object();
                             $upsells = $product->get_upsell_ids();

                             // Fallback for when there are no upsells selected
                             if (!$upsells): $upsells = ''; endif;

                             $meta_query = WC()->query->get_meta_query();

                             $args = array(
                                 'post_type'         => 'product',
                                 'posts_per_page'    => 6,
                                 'post__in'          => $upsells,
                                 'post__not_in'      => array( $post->ID ),
                                 'meta_query'        => $meta_query,
                                 'tax_query'         => array(
                                    array(
                                        'taxonomy' => 'product_visibility',
                                        'field'    => 'name',
                                        'terms'    => 'exclude-from-catalog',
                                        'operator' => 'NOT IN',
                                    ),
                                ),
                             );

                             $featured_query = new WP_Query($args);

                             if ($featured_query->have_posts()) :

                                 while ($featured_query->have_posts()) : $featured_query->the_post();
                                     ?>
                                     <div class="pam-swiper-slide swiper-slide">
                                         <?php
                                         get_template_part('template-parts/cards/product');?>
                                     </div>
                                 <?php
                                 endwhile;

                             endif;

                             wp_reset_query();
                             wp_reset_postdata();
                             ?>
                        </div>

                    </div>

                </div>
                <div class="swiper-button-next pam-swiper-buttons"></div>
                <div class="swiper-button-prev pam-swiper-buttons pam-swiper-buttons-prev"></div>
                <div class="pam-extra-footer">
                    <p class="pam-footer-text verder-winkelen" onclick="closePAM()">Verder winkelen</p>
                    <a href="">
                        <button class="pam-bestel-btn">
                            <svg version="1.1" width="10px" height="15px" viewBox="0 0 10.0 15.0"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <clipPath id="i0">
                                        <path d="M1920,0 L1920,2174 L0,2174 L0,0 L1920,0 Z"></path>
                                    </clipPath>
                                </defs>
                                <g transform="translate(-1200.0 -1062.0)">
                                    <g clip-path="url(#i0)">
                                        <g transform="translate(1167.877910874291 1042.0)">
                                            <g transform="translate(33.999999999999886 20.0)">
                                                <g transform="translate(-1.354472090042691e-13 13.365853658537002) rotate(-90.0)">
                                                    <path d="M11.7693492,0 L0.596473604,0 C0.0677571695,0 -0.201588939,0.638450034 0.177490769,1.01752974 L5.76392857,6.60396754 C5.99337155,6.83341052 6.37245126,6.83341052 6.601994,6.60396754 L12.1884318,1.01752974 C12.5674117,0.638450034 12.2980656,0 11.7693492,0 Z"
                                                          stroke="#1F3F58" stroke-width="2" fill="none"
                                                          stroke-miterlimit="10"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Verder naar bestellen
                        </button>
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".pamSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


<?php
get_footer('shop');







