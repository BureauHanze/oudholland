<?php 
get_header('shop'); ?>

<main id="main" class="site-main page" role="main">

    <?php
    get_template_part( 'template-parts/sections/flex-content' ); 
    // get_template_part( 'template-parts/sections/content' ); 

    if(is_page('contact')) :
        get_template_part( 'template-parts/sections/contact' ); 
    endif;

    if(is_page('privacy-statement')) :
        get_template_part( 'template-parts/sections/privacy-statement' ); 
    endif;

    get_template_part( 'template-parts/socials/whatsapp-icon' ); 








    
    if(is_product_category()) :
        $queried_object = get_queried_object();
        $terms = get_the_terms( $post->ID, 'product_cat' );
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
                    // 'terms'     => array( 'bureau' ),
                    'terms'     => $queried_object->slug,
                        'field'     => 'slug',
                        'operator'  => 'IN',
                )
            )
        );

        $loop = new WP_Query( $args ); ?>

        <?php
        if ( $loop->have_posts() ) : ?>
        <div class="product-category">
            <div class="container">
                <div class="product-category_categories">
                    <?php
                    $terms = get_the_terms( $post->ID, 'product_cat' );
                    $term_id  = get_queried_object_id();

                    $taxonomy = 'product_cat';
                    $terms    = get_terms([
                        'taxonomy'    => $taxonomy,
                        'hide_empty'  => true,
                        'parent'      => get_queried_object_id()
                    ]);
                    if ( !empty( $terms ) && !is_wp_error( $terms ) ): ?>
                    <h3>Categorieën</h3>
                    <?php
                    endif; ?>
                    <div class="categories">
                    <?php
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, $taxonomy ); ?>
                        <a href="<?php echo $term_link; ?>"><?php echo $term->name . ' ' . "<span>" .'('. $term->count .')' . "</span>"; ?></a>
                    <?php
                    } ?>
                    </div>
                    
                    <div id="product-category__filter-container">
                        <div class="more-btn">
                            <?php 
                            get_template_part('assets/svg/arrow'); ?>
                            <div id="more__specs" class="more__specs" onclick="openFilters('more__specs')">Filters weergeven</div>
                        </div>
                        <div class="product-category__filters">

                            <h3 class="filters__options">Opties</h3>
                            <?php
                            // echo do_shortcode('[facetwp facet="categories"]'); 
                            ?>
                            <h3 class="filters__options">Prijs</h3>
                            <div class="filters__price">
                                <?php
                                echo do_shortcode('[facetwp facet="prijs"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                

                <div class="product-category__content">
                    <div class="row">
                        <h1><?php single_cat_title(); ?></h1>
                        <div class="product-category__short-description">

                            <?php
                            $term_object = get_queried_object();
                            if($term_object->description) : ?>
                                <p><?php 
                                $term_object = get_queried_object();
                                echo $term_object->description; ?></p>
                            <?php
                            else : ?>
                                <p>Hier is nog geen tekst ingevuld</p>
                            <?php
                            endif; ?>
                            <a href="#read-more" title="Lees meer">Verder lezen</a>
                        </div>
                    </div>

                    <div class="product-category__top-bar">
                        <div class="top-bar__results">
                            <?php 
                            echo do_shortcode('[facetwp facet="total_products"]'); ?>
                        </div>
                        <div class="top-bar__sorting">
                            <p class="sorting__label">Sortering</p>
                            <?php 
                            echo do_shortcode('[facetwp facet="sorting"]'); ?>
                        </div>
                    </div>

                    <div class="product-category__products">
                    <?php 
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php
                        get_template_part('template-parts/cards/product'); 
                    endwhile; ?>
                    </div>
                    <div id="read-more" class="product-category__description">
                        <p><?php
                        $term = get_queried_object();
                        if(get_field('product-category_full-description', $term)) :
                            the_field('product-category_full-description', $term); 
                        endif; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        endif; 
    endif; ?>
</main>

<?php
get_footer();
