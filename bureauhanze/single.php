<?php
get_header(); ?>

	<main id="main" class="site-main single" role="main">
	<?php 
	if ( get_the_content() ) :
		get_template_part( 'template-parts/sections/content');
	endif; ?>
	</main>

<?php
get_footer();
