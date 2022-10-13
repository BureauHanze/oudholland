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
page page__<?php echo basename(get_permalink());
elseif(is_page('webshop')) : ?>
webshop webshop__<?php echo basename(get_permalink());
elseif(is_page('webshop')) : ?>
elseif(is_singular()) : ?>
singular singular__<?php echo basename(get_permalink());
elseif(is_single()) : ?>
single single__<?php echo basename(get_permalink());
elseif(is_product_category()) :?>
category category__<?php echo basename(get_permalink());
elseif(is_shop()) : ?>
shop webshop__<?php echo basename(get_permalink());
endif; ?>">

	<div id="page-overlay" class="page-overlay"></div>

	<div class="nav">
		<nav class="nav__content">
			<div class="nav__header">
				<button id="nav--close">&#10005;</button>
			</div>
			<div class="container">
				<nav class="nav__links">
				<?php

				wp_nav_menu( 
					array( 
						'menu' => 'webshop'
					) 
				); ?>
				</nav>
			</div>
		</nav>
	</div>

	<?php
	// get_template_part( 'template-parts/navigation/mobile-navigation' ); 
	get_template_part( 'template-parts/sections/can-i-help' ); ?>

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
							<?php the_field('contactLogo', 'option'); ?></p>
						<?php
						endif; ?>
					</a>
					<a class="header__logo-mobile" href="/" title="Home">
						<?php get_template_part('assets/svg/favicon'); ?>
					</a>
					<div class="header__search">
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
							<input type="search" class="search-field" placeholder="Stabureau, bureaustoel, thuiswerkplek…" value="<?php echo get_search_query() ?>" name="s" title="Zoeken naar:" />
							<div class="search__icon">
								<input type="submit" class="search-submit" value="" />
								<?php get_template_part('assets/svg/icon-search'); ?>
							</div>
						</form>
					</div>
				</div>

				<div class="header__contact">
					<?php
					if(is_user_logged_in()) : ?>
		

					<a href="/mijn-account/" title="Mijn account" class="btn btn-account">
						<?php
						get_template_part( '/assets/svg/icon-account' ); ?>
						<span class="shopping-bag__text">Mijn account</span>
					</a>
					<?php
					else : ?>
					<a href="/mijn-account/" title="Inloggen" class="btn btn-account">
						<?php
						get_template_part( '/assets/svg/icon-account' ); ?>
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
				<p>U bevindt zich nu in<br/><strong>Onze webshop</strong></p>
			</div>
			<?php 
			wp_nav_menu( 
				array( 
					'menu' => 'webshop'
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
		<?php
		if(!is_singular() && !is_product_category()): ?>
		<div class="header__leader">
			<div class="container">
				<div class="leader__paragraph">
                    <div class="paragraph__header">
						<h1>Kantoor- en<br/>bedrijfsmeubelen</h1>
						<p>voor een optimale werkomgeving.</p>
						<?php
						$shop_page_id = wc_get_page_id('shop');
						$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($shop_page_id), 'large');
						list($url, $width, $height, $is_intermediate) = $thumbnail;
						?>
						<a href="#" class="leader__content" style="height:<?php echo $height; ?>px;background-image:url(<?php echo $url; ?>);background-repeat:no-repeat;">
							<h2>Vergaderruimte inrichten?</h2>
							<div class="btn btn-primary"><?php get_template_part( 'assets/svg/chevron' ); ?></div>
						</a>
					</div>
				</div>
				<div class="leader__offer">

				<?php
				$shop_page_id = wc_get_page_id('shop');
				$featured_posts = get_field('webshop_main-offer', $shop_page_id);
				if( $featured_posts ): 
					foreach( $featured_posts as $post ):
					setup_postdata($post); ?>
					<?php
					$product = new WC_Product($post->ID);
					$regularPrice = wc_get_price_including_tax($product);
					$salePrice = wc_get_price_excluding_tax($product);

					// $regularpriceHTML
					
					// $regular_price = wc_price($product->get_price_excluding_tax(1,$product->get_regular_price()));
					// $sale_price = wc_price($product->get_price_excluding_tax(1,$product->get_sale_price()));
					// $regular_priceVat = ($regular_price / 100) * 21;
					// echo $regular_priceVat;
					$calculate_discount = round( ( ( $regularPrice - $salePrice ) / $regularPrice ) * 100 ); 
					?>
					<div class="offer__content">
						<div class="content__content">
							<p class="content__sale-amount">Nu <?php 
							echo $calculate_discount; 
							?>% korting</p>
							<h3><?php the_title(); ?></h3>

							<?php
							if($product->get_sale_price()) : ?>
								<p class="sale-amount__price">
								<?php
								echo $product->get_price_html(); ?>
								</p>						
							<?php
							else : ?>
								<p class="regular-amount__price">
								<?php
								echo $product->get_price_html(); ?>
								</p>
							<?php
							endif ;?>
							<!-- <p class="sale-amount__regular-price"><span><?php 
							echo wc_get_price_including_tax( $product, array( 'price' => $product->get_regular_price() ) );
							?></span>incl. btw</p> -->
						</div>

						<a class="btn btn-primary btn-yellow" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_template_part( 'assets/svg/arrow' ); ?>Samenstellen</a>
					</div>
					<div class="offer__image">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php 
					endforeach;
					wp_reset_postdata();
				endif; ?>
				</div>
			</div>
		</div>
		<?php
		else: ?>
		<div class="header__leader header__breadcrumbs">
			<div class="container">
				<div class="leader__paragraph">
					<?php
					get_template_part( 'template-parts/navigation/breadcrumb' ); ?>
				</div>
			</div>
		</div>
	</header>
	<?php
	endif; ?>