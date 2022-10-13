<section class="flex-content flex-content-big-block">
    <div class="container">
        <div class="row row-main">
            <div class="big-block__heading">
                <h2>
                <?php
                if(get_sub_field('section_flex-content-big-block__heading-one')) :
                    the_sub_field('section_flex-content-big-block__heading-one');
                endif; ?>
                </h2>
            </div>
            <div class="big-block__paragraph">
            <?php
            if(get_sub_field('section_flex-content-big-block__paragraph-one')) :
                the_sub_field('section_flex-content-big-block__paragraph-one');
            endif; ?>
            </div>
            <div class="big-block__paragraph__image">
            <?php
            $image = get_sub_field('flex-content-big-block__paragraph__image');
            $size = 'large';
            if( $image ) :
                echo wp_get_attachment_image( $image, $size );
            endif; ?>
            </div>
        </div>
        <div class="row row-paragraph">
            <div class="big-block__image">
            <?php
            $image = get_sub_field('flex-content-big-block-image');
            $size = 'large';
            if( $image ) :
                echo wp_get_attachment_image( $image, $size );
            endif; ?>
            </div>
            <div class="big-block__paragraph">
                <?php
                if(get_sub_field('section_flex-content-big-block__paragraph-two')) :
                    the_sub_field('section_flex-content-big-block__paragraph-two');
                endif; ?>
                <a class="btn btn-primary-icon" href="/werkwijze/" title="Werkwijze"><?php get_template_part( 'assets/svg/chevron' ); ?>Bekijk onze werkwijze</a>
            </div>
        </div>
    </div>
</section>
