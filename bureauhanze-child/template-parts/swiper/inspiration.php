<?php
$featured_posts = get_sub_field('section_flex-content-inspiration_image');
if( $featured_posts ): ?>
<section class="swiper__inspiration">
    <div class="container">
        <div class="row">
            <h2>Inspiratie</h2>
            <a class="btn btn-link-icon" href="/inspiratie/"><?php get_template_part( 'assets/svg/chevron' ); ?>Meer inspiratie</a>
        </div>
        <div class="row row-swiper">
            <div class="single-gallery__gallery">
                <div class="swiper swiper-inspiration">
                    <div class="swiper-wrapper">
                    <?php 
                    foreach( $featured_posts as $post ): ?>
                        <div class="swiper-slide">
                            <a class="inspiration__item" data-fslightbox href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php
                            the_post_thumbnail(); ?>
                            </a>
                        </div>
                    <?php
                    endforeach; ?>
                    </div>

                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        
    </div>
</section>
<?php
wp_reset_postdata();
endif; ?>

<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/assets/js/swiper.min.js"></script>
<script>
const swiperInspiration = new Swiper('.swiper-inspiration', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    grabCursor: true,
    spaceBetween: 24,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        }
    }
});
</script>