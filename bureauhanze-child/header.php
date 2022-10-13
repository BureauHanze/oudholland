<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	get_template_part( 'template-parts/header/head' );
	wp_head(); ?>
</head>

<body class="<?php
if(is_front_page()) : ?>
front-page<?php
elseif(is_page()) : ?>
page page-webshop__<?php echo basename(get_permalink());
elseif(is_singular()) : ?>
singular singular__<?php echo basename(get_permalink());
elseif(is_single()) : ?>
single single__<?php echo basename(get_permalink());
elseif(is_product_category()) :?>
category category__<?php echo basename(get_permalink());
elseif(is_search()) :?>
search search__<?php echo basename(get_permalink());
endif; ?>">

	<div id="page-overlay" class="page-overlay"></div>
	<?php
	get_template_part( 'template-parts/navigation/mobile-navigation' ); 
	get_template_part( 'template-parts/sections/can-i-help' ); ?>
	<?php 
	if( get_field('header_select-type') == 'projectinrichting' ||  !is_product_category() && !is_search() && !is_cart() && !is_checkout() && !is_account_page() )  : ?>
	<header class="header header-projectinrichting" id="main__header">
		<div class="header__circles">
			<div class="header__circle-blue"></div>
			<div class="header__circle-yellow"></div>
		</div>
		<div class="header__top">
			<div class="container">
				<div class="logo-search">
					<a class="header__logo" href="/" title="Home">
						<?php
						$contactlogo = get_field('contactLogo', 'option');
						if ($contactlogo) : ?>
							<?php the_field('contactLogo', 'option'); ?></p>
						<?php
						endif; ?>
					</a>
					<a class="header__logo-mobile" href="/" title="Home">
						<?php get_template_part('assets/svg/favicon'); ?>
					</a>

					<div class="header__search">
					<?php 
					if ( have_posts() ) : ?>
					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
						<input type="search" class="search-field" placeholder="Zoek hier naar producten ..." value="<?php echo get_search_query() ?>" name="s" title="Zoeken naar:" />
						<div class="search__icon">
							<input type="submit" class="search-submit" value="" />
							<?php get_template_part('assets/svg/icon-search'); ?>
						</div>
					</form>
					<?php 
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'search' );
					endwhile;
					else : 
						get_template_part( 'no-results', 'search' );
					endif; ?>
					</div>
				</div>


				<div class="header__contact">
					<?php
					$contactphone = get_field('contactPhone', 'option');
					if($contactphone):?>
					<a class="main__contact" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); ?><span><?php echo $contactphone['title']; ?></span></a>
					<?php
					endif; ?>
					<?php
					$contactmail = get_field('contactMail', 'option');
					if($contactmail):?>
					<a class="main__contact" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); ?><span><?php echo $contactmail['title']; ?></span></a>
					<?php
					endif; ?>
				</div>

				<a class="btn btn-webshop" href="/webshop/" title="Webshop">
				<?php
					get_template_part( '/assets/svg/cart' ); ?>
					<span class="shopping-bag__text">Bekijk de producten<br/>in onze <strong>webshop</strong></span>
				</a>

				<!-- <div id="nav--open">
					<span></span>
					<span></span>
					<span></span>
				</div> -->
			</div>
		</div>

		<div class="header__nav">
			<div class="container">
			<div class="nav__where">
				<?php
				get_template_part( '/assets/svg/where-btn' ); ?>
				<p>U bevindt zich nu op<br/><strong>projectinrichting</strong></p>
			</div>
			<?php 
			wp_nav_menu( 
				array( 
					'menu' => 'projectinrichting'
				) 
			);
			?>
				<div id="nav--open">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>

		<div class="header__leader">
			<div class="container">
				<div class="leader__paragraph">
					<?php
					if(is_front_page()) : ?>
					<div class="paragraph__header">
						<h1>Creëer uw ideale<br/>werkomgeving</h1>
						<p>met professionele projectinrichting</p>
					</div>

					<div class="paragraph__form">
					<?php get_template_part('template-parts/forms/projectinrichting'); ?>
					</div>
				<?php
				else : 
					get_template_part( 'template-parts/navigation/breadcrumb' ); ?>
						<h1><?php the_title(); ?></h1>
					<?php
					if(!is_single() && !is_checkout() && !is_cart()) :
						the_content();
					elseif(is_product()) : 
						if(get_field('header_product-subtitel')) :
							the_field('header_product-subtitel');
						endif;
					endif;
				endif; ?>
				</div>
				<div class="leader__images">
					<?php
					the_post_thumbnail( 'hero', array( 'class' => 'header__img lazy' ) ); ?>
					<?php
					if(is_front_page()) : ?>
					<h3>Direct naar</h3>
					<?php
					get_template_part( 'template-parts/swiper/webshop' ); ?>
					<?php
					endif; ?>
				</div>
			</div>
		</div>

	</header>
	<?php
	elseif(get_field('header_select-type') == 'webshop' ||  is_product_category() || is_search()) :  ?>
	<header class="header header-webshop" id="main__header">
		<div class="header__circles">
			<div class="header__circle-blue"></div>
			<div class="header__circle-yellow"></div>
		</div>

		<div class="header__top">
			<div class="container">
				<div class="logo-search">
					<a class="header__logo" href="/" title="Home">
						<?php
						$contactlogo = get_field('contactLogo', 'option');
						if ($contactlogo) : ?>
							<?php the_field('contactLogo', 'option'); ?>
						<?php
						endif; ?>
					</a>
					<a class="header__logo-mobile" href="/" title="Home">
						<?php get_template_part('assets/svg/favicon'); ?>
					</a>

					<?php
					if(!is_checkout()) : ?>
					<div class="header__search">
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
							<input type="search" class="search-field" placeholder="Zoek hier naar producten ..." value="<?php echo get_search_query() ?>" name="s" title="Zoeken naar:" />
							<div class="search__icon">
								<input type="submit" class="search-submit" value="" />
								<?php get_template_part('assets/svg/icon-search'); ?>
							</div>
						</form>
					</div>
					<?php
					endif; ?>
				</div>

				<?php
				if(!is_checkout()) : ?>
				<div class="header__contact">
					<?php
					get_template_part( '/assets/svg/icon-account' ); ?>
					<?php
					if(is_user_logged_in()) : ?>
					<a href="/mijn-account/" title="Mijn account" class="btn btn-account">
						<span class="shopping-bag__text">Mijn account</span>
					</a>
					<?php
					else : ?>
					<a href="/mijn-account/" title="Inloggen" class="btn btn-account">
						<span class="shopping-bag__text">Inloggen</span>
					</a>
					<?php
					endif; ?>
					<div class="btn btn-shopping-bag">
						<?php
						get_template_part( '/assets/svg/cart' );
						echo do_shortcode('[woocommerce_cart_icon]'); ?>
						<span class="shopping-bag__text">Winkelwagen</span>
					</div>
				</div>

				<a class="btn btn-projectinrichting" href="/" title="Hulp bij projectinrichting">
					<?php
					get_template_part( '/assets/svg/icon-projectinrichting' ); ?>
					<span class="projectinrichting__text">Hulp bij<br/><strong>projectinrichting</strong></span>
				</a>
				<?php
				endif; ?>
				<!-- <div id="nav--open">
					<span></span>
					<span></span>
					<span></span>
				</div> -->
			</div>
		</div>

		<?php
		if(!is_checkout()) : ?>
		<div class="header__nav">
			<div class="container">
			<div class="nav__where">
				<?php
				get_template_part( '/assets/svg/where-btn' ); ?>
				<p>U bevindt zich nu in<br/><strong>Onze webshop</strong></p>
			</div>

				<?php 
				wp_nav_menu( 
					array( 
						'menu' => 'webshop'
					) 
				); ?>

				<div id="nav--open">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
		<?php
		endif; ?>
		<?php
		$querydobject = get_queried_object();
		if(!is_product_category() && $querydobject->parent != 0 ) : ?>
		<div class="header__leader">
			<div class="container">
				<div class="leader__paragraph">
					<?php
					if(is_front_page()) : ?>
					<h1>Creëer uw ideale werkomgeving</h1>
					<p>met professionele projectinrichting</p>
					<?php
					else : 
						get_template_part( 'template-parts/navigation/breadcrumb' ); ?>
						<h1><?php the_title(); ?></h1>
						<?php 
						if(!is_single()) :
							the_content(); 
						endif; ?>
					<?php
					endif; ?>
				</div>
				<div class="leader__images">
					<?php
					the_post_thumbnail( 'hero', array( 'class' => 'header__img lazy' ) ); ?>
					<?php
					if(is_front_page()) : ?>
					<h3>Direct naar</h3>
					<div class="images__shortcuts">
						<div class="shortcuts__shortcut">
							<h3>Inrichting</h3>
							<a class="btn btn-primary-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
						</div>
						<div class="shortcuts__shortcut">
							<h3>Inrichting</h3>
							<a class="btn btn-primary-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
						</div>
						<div class="shortcuts__shortcut">
							<h3>Inrichting</h3>
							<a class="btn btn-primary-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
						</div>
					</div>
					<?php
					endif; ?>
				</div>
			</div>
		</div>
		<?php
		else : ?>
		<div class="header__leader header__breadcrumbs">
			<div class="container">
				<div class="leader__paragraph">
					<?php
					get_template_part( 'template-parts/navigation/breadcrumb' ); ?>
				</div>
			</div>
		</div>
		<?php
		endif; ?>

	</header>

	<?php
	endif; ?>

