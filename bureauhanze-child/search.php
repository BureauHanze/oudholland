<?php 
get_header();
$keyword = get_search_query();
wp_parse_str( $query_string, $search_query );
$wp_query = new WP_Query( $search_query  );
$total = $wp_query->found_posts; ?>

<section class="search__results"> 
    <div class="container">
        <div class="row">
            <h2>
                <?php 
                if($total==1):
                    echo $total .' Resultaat gevonden voor: '. $keyword;
                elseif($total < 1):
                    echo 'Geen resultaten gevonden voor: '. $keyword; 
                else:
                    echo $total .' Resultaten gevonden voor: '. $keyword; 
                endif; ?>
            </h2>
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
                the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => __( '
                    <svg fill="currentcolor" viewBox="0 0 10 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g fill-rule="evenodd">
                            <g transform="translate(-803.000000, -981.000000)" fill-rule="nonzero">
                                <g transform="translate(776.000000, 961.000000)">
                                    <g transform="translate(27.000000, 20.000000)">
                                        <polygon points="1.886625 0 0 1.8866875 6.1133125 8 0 14.1133125 1.886625 16 9.886625 8"></polygon>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>' ),
                    'next_text' => __( '
                    <svg fill="currentcolor" viewBox="0 0 10 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g fill-rule="evenodd">
                            <g transform="translate(-803.000000, -981.000000)" fill-rule="nonzero">
                                <g transform="translate(776.000000, 961.000000)">
                                    <g transform="translate(27.000000, 20.000000)">
                                        <polygon points="1.886625 0 0 1.8866875 6.1133125 8 0 14.1133125 1.886625 16 9.886625 8"></polygon>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>' ),
                ) );

                wp_reset_postdata();?>
            </div>
        </div>
            
    </div>
</section>

<?php 
get_footer(); 