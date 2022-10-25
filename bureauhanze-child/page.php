<?php 
get_header(); ?>

<main id="main" class="site-main page" role="main">

    <?php
    get_template_part( 'template-parts/sections/flex-content' ); 

    if(!is_page(array('over-ons', 'werkwijze', 'diensten', 'inspiratie', 'duurzaamheid', 'contact', 'kantoormeubelen-zwolle', 'kantoormeubelen-amersfoort', 'kantoormeubelen-apeldoorn', 'klein-kantoor-inrichten'))) :
    get_template_part( 'template-parts/sections/content' ); 
    endif;

    if(is_page('inspiratie')) :
        get_template_part( 'template-parts/sections/inspiration' ); 
    endif;

    if(is_page('contact')) :
        get_template_part( 'template-parts/sections/contact' ); 
    endif;

    if(is_page('privacy-statement')) :
        get_template_part( 'template-parts/sections/privacy-statement' ); 
    endif;

    get_template_part( 'template-parts/socials/whatsapp-icon' ); 


    if(is_product_category()) :
    $queried_object = get_queried_object ();
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 999,
        // 'product_cat'    => 'bureau',
        'facetwp' => true,
        'tax_query'   => array( 
            'relation' => 'AND',
            array(
                'taxonomy'  => 'product_visibility',
                'terms'     => array( 'exclude-from-catalog' ),
                'field'     => 'name',
                'operator'  => 'NOT IN',
            ),
            array(
                'taxonomy'  => 'product_cat',
                'terms'     => $queried_object->slug,
                    'field'     => 'name',
                    'operator'  => 'IN',
            )
        )
    );
    $terms = get_the_terms( $post->ID, 'product_cat' );
    $loop = new WP_Query( $args );
    ?>
    <div>
    <?php
    if ( $loop->have_posts() ) : ?>
        <?php echo do_shortcode('[facetwp facet="categories"]'); ?>
        <?php echo do_shortcode('[facetwp facet="prijs"]'); ?>
        <div>
        <?php while ( $loop->have_posts() ) : $loop->the_post();
        get_template_part('template-parts/cards/product'); 
        endwhile; ?>
        </div>

    <?php 
    endif; ?>
    </div>
    <?php
    endif; ?>

</main>

<?php
get_footer();
