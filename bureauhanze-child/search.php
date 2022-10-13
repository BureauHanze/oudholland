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

            </div>
        </div>
            
    </div>
</section>

<?php 
get_footer(); 