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

            </div>
        </div>
            
    </div>
</section>

<?php 
get_footer(); 