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
        endif; ?>
    </div>
</div>