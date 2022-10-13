<?php 
get_header(); ?>

<main id="main" class="site-main front-page" role="main">
    <?php
    get_template_part( 'template-parts/sections/flex-content' ); 
    get_template_part( 'template-parts/sections/blog' );
    get_template_part( 'template-parts/sections/brands' ); 
    get_template_part( 'template-parts/socials/whatsapp-icon' ); 
    ?>
</main>

<?php
get_footer();
