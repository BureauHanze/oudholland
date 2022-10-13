<?php
if( have_rows('section_flex-content') ): ?>
<section class="flex-content">
    <div class="container">
    <?php
    while ( have_rows('section_flex-content') ) : the_row(); 
    if( get_row_layout() == 'section_flex-content_row' ):
        get_template_part( 'template-parts/flex-content-rows/text-image' ); 
    elseif( get_row_layout() == 'section_flex-content-movie_row' ):
        get_template_part( 'template-parts/flex-content-rows/text-movie' ); 
    elseif( get_row_layout() == 'section_flex-content-text_row' ):
        get_template_part( 'template-parts/flex-content-rows/text-columns' );
    endif;
    endwhile; ?>
    </div>
</section>
<?php
endif;