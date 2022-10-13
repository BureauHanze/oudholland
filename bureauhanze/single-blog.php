<?php
get_header(); ?>
	<main id="main" class="site-main single-blog" role="main">
        <div class="container">
            <div class="blog">
                <div class="blog__content">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
                </div>
            </div>
            <div class="sidebar">
                <?php
                get_template_part( 'template-parts/sections/sidebars/blog'); ?>
            </div>
        </div>
	</main>
<?php
get_footer();
