		<footer class="footer">
			<div class="container">

				<div class="footer__top">
					<div class="footer__column footer__logo">
						<?php
						$contactlogo = get_field('contactLogo', 'option');
						if ($contactlogo) : ?>
							<?php the_field('contactLogo', 'option'); ?></p>
						<?php
						endif; ?>
					</div>

					<div class="footer__column footer__address">
						<h3 class="footer__heading">Adres</h3>
						<div class="main__address">
							<?php
							$contactaddress = get_field('contactAddress', 'option');
							if ($contactaddress) : ?>
								<p>
									<?php the_field('contactAddress', 'option'); ?>
								</p>
							<?php
							endif; 
							$contactpostal = get_field('contactPostal', 'option');
							if ($contactpostal) : ?>
								<p>
									<?php the_field('contactPostal', 'option');
									$contactplace = get_field('contactPlace', 'option');
									if ($contactplace) : ?>
										<?php the_field('contactPlace', 'option');
									endif; ?>
								</p>
							<?php
							endif; ?>

							<?php
							$contactcoutry = get_field('contactCountry', 'option');
							if ($contactcoutry) : ?>
								<p>
									<?php the_field('contactCountry', 'option'); ?>
								</p>
							<?php
							endif; ?>
						</div>
					</div>

					<div class="footer__column footer__contact">
						<h3 class="footer__heading">Contactgegevens</h3>
						<?php
						$contactmail = get_field('contactMail', 'option');
						if($contactmail):?>
						<a class="main__contact" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); echo $contactmail['title']; ?></a>
						<?php
						endif; ?>

						<?php
						$contactphone = get_field('contactPhone', 'option');
						if($contactphone):?>
						<a class="main__contact" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); echo $contactphone['title']; ?></a>
						<?php
						endif; ?>
					</div>

				</div>
			</div>

			<div class="footer__copyright">
				<div class="container">
					<p>
						&copy;
						<?php echo date('Y');
						$contactcompany = get_field('contactCompany', 'option');
						if ($contactcompany) : ?>
							<?php the_field('contactCompany', 'option');
						endif; ?> 
					</p>
					<div class="bottom__links">
						<a href="/privacy-statement">Privacy statement</a>
						<button id="scrollToTop" class="to-top" onclick="scrollToTop()">
						<?php get_template_part( 'assets/svg/chevron'); ?>
						</button>
					</div>
				</div>
			</div>

		</footer><!-- #colophon -->


<?php 
wp_footer(); ?>
</body>
</html>
