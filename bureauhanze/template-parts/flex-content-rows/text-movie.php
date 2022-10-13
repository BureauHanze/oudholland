<div class="row" style="flex-direction: <?php the_sub_field('section_flex-content-movie_order'); ?>">
    <div class="flex-content__image">
    <?php 
    if(get_sub_field('section_flex-content_movie')) :
        the_sub_field('section_flex-content_movie'); 
    endif; ?>
    </div>
    <div class="flex-content__paragraph">
        <?php
        if(get_sub_field('section_flex-content-movie_text')) :
            the_sub_field('section_flex-content-movie_text');
        endif; ?>
    </div>
</div>