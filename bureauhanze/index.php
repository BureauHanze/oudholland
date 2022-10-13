<?php
get_header(); ?>

<main id="main" class="site-main" role="main">
	<div class="page__wrapper">

		<?php if ( get_the_content() ) { ?>
		<div class="container">
			<div class="row">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
				endif;
				?>
			</div>
		</div>
		<?php 
		} ?>
		
	</div>
</main>

<?php
if(is_404()) :
	get_template_part( 'template-parts/sections/404' ); 
endif;

get_footer();
