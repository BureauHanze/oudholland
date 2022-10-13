<?php
if( have_rows('section_flex-content') ):
    while ( have_rows('section_flex-content') ) : the_row(); 
        if( get_row_layout() == 'section_flex-content_row' ):
            get_template_part( 'template-parts/flex-content-rows/text-image' ); 
        elseif( get_row_layout() == 'section_flex-content-background_row' ):
                get_template_part( 'template-parts/flex-content-rows/text-image-background' ); 
        elseif( get_row_layout() == 'section_flex-content-movie_row' ):
            get_template_part( 'template-parts/flex-content-rows/text-movie' ); 
        elseif( get_row_layout() == 'section_flex-content-text_row' ):
            get_template_part( 'template-parts/flex-content-rows/text-columns' );
        elseif( get_row_layout() == 'section_flex-content-webshop-block_row' ):
            get_template_part( 'template-parts/flex-content-rows/webshop-block' );
        elseif( get_row_layout() == 'section_flex-content-webshop-two-block_row' ):
            get_template_part( 'template-parts/flex-content-rows/webshop-block-two' );
        elseif( get_row_layout() == 'section_flex-content-circles_row' ):
            get_template_part( 'template-parts/flex-content-rows/image-with-cirlces' );
        elseif( get_row_layout() == 'section_flex-content-dubble-image_row' ):
            get_template_part( 'template-parts/flex-content-rows/dubble-image' );
        elseif( get_row_layout() == 'section_flex-content-big-block_row' ):
            get_template_part( 'template-parts/flex-content-rows/big-block' );
        elseif( get_row_layout() == 'section_flex-content-inspiration_row' ):
            get_template_part( 'template-parts/flex-content-rows/inspiration' );
        elseif( get_row_layout() == 'section_flex-content-banner-image_row' ):
            get_template_part( 'template-parts/flex-content-rows/banner-image' );
        elseif( get_row_layout() == 'section_flex-content-maps_row' ):
            get_template_part( 'template-parts/flex-content-rows/contact-with-maps' );
        endif;
    endwhile;
endif;