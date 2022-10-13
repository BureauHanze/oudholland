<?php
get_header(); ?>

	<main id="main" class="site-main" role="main">
		<div class="page__wrapper">

            <?php 
            get_template_part( 'template-parts/sections/projects');

			if ( get_the_content() ) {
				get_template_part( 'template-parts/sections/content');
			} 

			get_template_part( 'template-parts/sidebar/sidebar-extended'); ?>
			</div> <!-- page wrapper -->
			<?php
			get_template_part( 'template-parts/sections/contact');

			
			get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();
