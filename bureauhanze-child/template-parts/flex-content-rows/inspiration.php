<?php
$featured_posts = get_sub_field('section_flex-content-inspiration_image');
if( $featured_posts ): ?>
<section class="flex-content flex-content-inspiration">
    <div class="container">
        <div class="row">
            <h2>Inspiratie</h2>
            <a class="btn btn-link-icon" href="/inspiratie/"><?php get_template_part( 'assets/svg/chevron' ); ?>Meer inspiratie</a>
        </div>
        <div class="inspiration__items">
        <?php 
        foreach( $featured_posts as $post ): ?>
            <a class="inspiration__item" data-fslightbox href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
            <?php
            the_post_thumbnail(); ?>
            </a>
        <?php
        endforeach; ?>
        </div>
    </div>
</section>

<?php 
wp_reset_postdata();
endif;  ?>
<!-- show inspiration in swiper on mobile -->
<?php
if(!is_page('inspiratie')) :
    get_template_part( 'template-parts/swiper/inspiration' );
endif; ?>
<script src="/wp-content/themes/bureauhanze/assets/js/fslightbox.min.js"></script>