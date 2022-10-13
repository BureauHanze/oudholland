<section class="flex-content flex-content-dubble-image">
    <div class="container">
        <div class="row">
            <div class="flex-content-dubble-image__images">
                <!-- <div class="paragraph__circle-red"></div> -->
                <div class="images__image">
                <?php
                $image = get_sub_field('section_flex-content-dubble-image_image-one');
                $size = 'large';
                if( $image ) :
                    echo wp_get_attachment_image( $image, $size );
                endif; ?>
                </div>
                <div class="images__image">
                <?php
                $image = get_sub_field('section_flex-content-dubble-image_image-two');
                $size = 'large';
                if( $image ) :
                    echo wp_get_attachment_image( $image, $size );
                endif; ?>
                </div>

            </div>
            <div class="flex-content-dubble-image__paragraph">
            <?php
            if(get_sub_field('section_flex-content-dubble-image_text')) :
                the_sub_field('section_flex-content-dubble-image_text');
            endif; ?>
            </div>
        </div>
    </div>
</section>
