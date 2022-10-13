<?php 
get_header();
$keyword = get_search_query();
wp_parse_str( $query_string, $search_query );
$wp_query = new WP_Query( $search_query  );
$total = $wp_query->found_posts; ?>

<section class="search__results"> 
    <div class="container">
        <div class="row">

        </div>
            <div class="row-content">
            <?php
                if ($wp_query->have_posts()) : ?>

                <div class="products_grid">
                    <?php 
                    while ($wp_query->have_posts()) : $wp_query->the_post(); 
                        get_template_part('template-parts/cards/product'); 
                    endwhile; ?>
                </div>
            
                <?php    
                endif; 
                                
                // Pagination


                wp_reset_postdata();?>
            </div>
        </div>
            
    </div>
</section>

<?php 
get_footer(); 