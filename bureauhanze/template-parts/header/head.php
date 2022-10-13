<?php
if (get_field('optionDisableSeo', 'option')) :
    if (get_field('seoPageTitle')) : ?>
    <title><?php the_field('seoPageTitle'); ?></title> 
    <?php
    else : ?>
    <title><?php echo get_the_title($page->ID); ?> | <?php the_field('contactSlogan', 'option'); ?></title>
    <?php
    endif; 
endif;

if (get_field('optionDisableSeo', 'option')) :
    if (get_field('seoPageMetaDescription')) : ?>
    <meta name="description" content="<?php the_field('seoPageMetaDescription'); ?>">
    <?php
    else : ?>
    <?php
    endif;
endif;

if ( get_field( 'header_google_analytics', 'option' ) ):?>
    <?php the_field( 'header_google_analytics', 'option' );
endif; ?>