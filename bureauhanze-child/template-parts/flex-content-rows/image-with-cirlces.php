<section class="flex-content flex-content-image-with-circles">
    <div class="container">
        <div class="row">
            <div class="flex-content-circles__paragraph">
                <div class="paragraph__circle-blue"></div>
                <div class="paragraph__circle-yellow"></div>
            <?php
            if(get_sub_field('section_flex-content-circles_text')) :
                the_sub_field('section_flex-content-circles_text');
            endif; ?>
            </div>
            <div class="flex-content-cirlces__image">
                <div class="paragraph__circle-red"></div>
            <?php
            $image = get_sub_field('section_flex-content-circles_image');
            $size = 'large';
            if( $image ) :
                echo wp_get_attachment_image( $image, $size );
            endif; ?>
            </div>
        </div>
    </div>
</section>
