<div class="row row-flex-content-text">
    <?php
    if(get_sub_field('section_flex-content_text-columns-heading')) :
        the_sub_field('section_flex-content_text-columns-heading');
    endif; ?>
    <p class="flex-content__text" style="column-count: <?php the_sub_field('section_flex-content_text-columns-amount'); ?>">
        <?php
        if(get_sub_field('section_flex-content_text-columns')) :
            the_sub_field('section_flex-content_text-columns', false, false);
        endif; ?>
    </p>
</div>