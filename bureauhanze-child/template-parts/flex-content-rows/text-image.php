<section class="flex-content">
    <div class="container">
        <div class="row" style="flex-direction: <?php the_sub_field('section_flex-content_order'); ?>">
            <div class="flex-content__image">
            <?php
            $image = get_sub_field('section_flex-content_image');
            $size = 'large';
            if( $image ) :
                echo wp_get_attachment_image( $image, $size );
            endif; ?>
            </div>
            <div class="flex-content__paragraph">
                <?php
                if(get_sub_field('section_flex-content_text')) :
                    the_sub_field('section_flex-content_text');
                endif;

                $link = get_sub_field('section_flex-content_primary-button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php get_template_part( 'assets/svg/chevron' ); ?><?php echo esc_html( $link_title ); ?></a>
                <?php 
                endif; ?>
            </div>

        </div>
    </div>
</section>
