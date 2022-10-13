<section class="flex-content flex-content-inspiration">
    <div class="container">
        <div class="inspiration__items">
        <?php
        $args = array(  
            'post_type' => 'inspiration',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'date', 
            'order' => 'desc', 
        );
            $loop = new WP_Query( $args ); 
            
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <a class="inspiration__item" data-fslightbox href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
            <?php
            the_post_thumbnail(); ?>
            </a>
            <?php
            endwhile; ?>
        </div>
    </div>
</section>
<script src="/wp-content/themes/bureauhanze/assets/js/fslightbox.min.js"></script>