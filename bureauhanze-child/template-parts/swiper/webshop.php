<?php
if(is_front_page()) : ?>
<section class="frontpage__swiper">
<?php
else : ?>
<section class="webshop__swiper">
<?php
endif; ?>
    <div class="container">
        <?php
        if(!is_front_page()) : ?>
        <div class="row">
            <h2>Waar bent u naar op zoek?</h2>
        </div>
        <?php
        endif; ?>
        <div class="row">
            <?php
            if(is_front_page()) : ?>
            <div class="swiper swiper-frontpage">
            <?php
            else : ?>
            <div class="swiper swiper-webshop">
            <?php
            endif; ?>
                <div class="swiper-wrapper">
                <?php 
                $shop_page_id = wc_get_page_id('shop');
                $terms = get_field('webshop_swiper-categories', $shop_page_id);

                if( $terms ):
                    foreach( $terms as $term ): 
                    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 
                    $image = wp_get_attachment_url( $thumbnail_id ); ?>
                    <div class="swiper-slide" style="background-image: url('<?php echo $image; ?>'); background-size: contain; background-repeat: no-repeat; background-position: right -20px bottom;">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="swiper-slide__category-items">
                            <h3><?php echo esc_html( $term->name ); ?></h3>
                            <?php
                            // $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                            // $image = wp_get_attachment_url( $thumbnail_id );
                            // echo $image;
                            ?>
                            <div class="btn"><?php get_template_part( 'assets/svg/chevron' ); ?></div>
                        </a>
                        <div class="swiper-slide__background"></div>
                    </div>
                    <?php 
                    endforeach;
                endif; ?>
                </div>

            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- <div class="swiper-scrollbar"></div> -->
        </div>
        
    </div>

</section>

<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/assets/js/swiper.min.js"></script>
<script>
const swiperFrontpage = new Swiper('.swiper-frontpage', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    grabCursor: true,
    spaceBetween: 16,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        }
    }
});

const swiperWebshop = new Swiper('.swiper-webshop', {
    direction: 'horizontal',
    loop: false,
    preloadImages: false,
    lazy: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    grabCursor: true,
    spaceBetween: 16,
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 5,
        }
    }
});
</script>