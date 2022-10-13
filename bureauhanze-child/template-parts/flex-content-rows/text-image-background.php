<section class="flex-content">
    <div class="container">
        <div class="row row-flex-image-background">
            <div class="flex-content-background__paragraph">
                <?php
                if(get_sub_field('section_flex-content-background_text')) :
                    the_sub_field('section_flex-content-background_text');
                endif; 
                if(get_sub_field('section_flex-content-background_buttons')) : ?>
                    <div class="flex-content__buttons">
                        <a class="btn btn-secondary-icon btn-cart" href="/webshop/" title="Webshop"><?php get_template_part( 'assets/svg/cart' ); ?>Naar de webshop</a>
                        <a class="btn btn-link-icon" href="/over-ons/" title="Over ons"><?php get_template_part( 'assets/svg/chevron' ); ?>Meer over ons</a>
                    </div>
                    <?php
                endif; ?>
            </div>
            <div class="flex-content-background__image">
            <?php
            $image = get_sub_field('section_flex-content-background_image');
            $size = 'large';
            if( $image ) :
                echo wp_get_attachment_image( $image, $size );
            endif; ?>
            </div>
        </div>
    </div>
</section>
