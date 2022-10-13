<?php 
get_header(); ?>

<main id="main" class="site-main cheatsheet" role="main">

    <section class="cheatsheet__logo-favicon">
        <div class="container">
            <div class="row">
                <h2>Logo & Favicon</h2>
            </div>
            <div class="row">
                <a class="header__logo" href="/" title="Home">
                    <?php
                    $contactlogo = get_field('contactLogo', 'option');
                    if ($contactlogo) : ?>
                        <?php the_field('contactLogo', 'option'); ?></p>
                    <?php
                    endif; ?>
                </a>
                <a class="header__logo" href="/" title="Home">
                    <?php
                    $faviconcompany = get_field('contactFavicon', 'option'); ?>
                    <img src="<?php echo ($faviconcompany['sizes']['favicon-mail']); ?>" alt="Logo">
                </a>
            </div>
        </div>
    </section>

    <section class="cheatsheet__headings">
        <div class="container">
            <h1>Heading H1</h1>
            <h2>Heading H2</h2>
            <h3>Heading h3</h3>
            <h4>Heading H4</h4>
            <h5>Heading H5</h5>
            <h6>Heading H6</h6>
        </div>
    </section>

    <section class="cheatsheet__paragraph">
        <div class="container">
            <div class="row">
                <h2>Paragraph</h2>
            </div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, mollitia. Culpa nam est iste fugiat magni quia dolorum laudantium nobis ab molestiae nulla facilis accusamus voluptatem exercitationem nisi itaque blanditiis, quaerat dolorem harum eaque iusto doloremque sapiente beatae? Aliquid voluptates voluptatibus sint expedita illo, quo suscipit consequatur voluptate tempora perferendis Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus quod maxime debitis quis odit, alias dolores consequatur, cum impedit iusto modi atque totam quam non. Possimus, animi doloribus rem quasi ex laboriosam labore magnam corporis obcaecati explicabo aut reiciendis fugiat, vitae rerum, minima quisquam quia autem quam odit impedit! Maiores Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias nisi a aliquid aut ut error ducimus. Totam rem impedit obcaecati alias dignissimos at, ullam necessitatibus facere assumenda temporibus ipsa animi minus deleniti provident fuga illo placeat consequatur accusantium eum repudiandae earum esse! Iusto incidunt similique nulla natus minima eveniet deserunt?</p>
        </div>
    </section>

    <section class="cheatsheet__ul-li">
        <div class="container">
            <div class="row">
                <h2>List items</h2>
            </div>
            <div class="row">
                <ul>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ul>
                <ol>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="colors">
        <div class="container">
            <div class="row">
                <h2>Colors</h2>
            </div>
            <div class="colors-primary">
                <h4>primary-color</h4>
                <div class="color-wrapper">
                    <div class="color">(+)-l-10</div>
                    <div class="color">(+)-l-8</div>
                    <div class="color">(+)-l-6</div>
                    <div class="color">(+)-l-4</div>
                    <div class="color">(+)-l-2</div>
                    <div class="color">primary-color</div>
                    <div class="color">(+)-d-2</div>
                    <div class="color">(+)-d-4</div>
                    <div class="color">(+)-d-6</div>
                    <div class="color">(+)-d-8</div>
                    <div class="color">(+)-d-10</div>
                </div>
            </div>
            <div class="colors-secondary">
                <h4>secondary-color</h4>
                <div class="color-wrapper">
                    <div class="color">(+)-l-10</div>
                    <div class="color">(+)-l-8</div>
                    <div class="color">(+)-l-6</div>
                    <div class="color">(+)-l-4</div>
                    <div class="color">(+)-l-2</div>
                    <div class="color">secondary-color</div>
                    <div class="color">(+)-d-2</div>
                    <div class="color">(+)-d-4</div>
                    <div class="color">(+)-d-6</div>
                    <div class="color">(+)-d-8</div>
                    <div class="color">(+)-d-10</div>
                </div>
            </div>
            <div class="colors-secondary-2">
                <h4>secondary-color-2</h4>
                <div class="color-wrapper">
                    <div class="color">(+)-l-10</div>
                    <div class="color">(+)-l-8</div>
                    <div class="color">(+)-l-6</div>
                    <div class="color">(+)-l-4</div>
                    <div class="color">(+)-l-2</div>
                    <div class="color">secondary-color-2</div>
                    <div class="color">(+)-d-2</div>
                    <div class="color">(+)-d-4</div>
                    <div class="color">(+)-d-6</div>
                    <div class="color">(+)-d-8</div>
                    <div class="color">(+)-d-10</div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
        <h2>Bedrijfsinformatie</h2>

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
                <p><?php the_field('contactCountry', 'option'); ?></p>
            <?php
            endif; ?>
        </div>
            

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

            <?php
            $contactfacebook = get_field('contactFacebook', 'option');
            if($contactfacebook):?>
            <a class="main__contact" href="<?php echo $contactfacebook['url']; ?>" target="<?php echo $contactfacebook['target']; ?>" title="<?php echo $contactfacebook['title']; ?>"><?php get_template_part( 'assets/svg/facebook'); echo $contactfacebook['title']; ?></a>
            <?php
            endif; ?>

            <?php
            $contactyoutube = get_field('contactYouTube', 'option');
            if($contactyoutube):?>
            <a class="main__contact" href="<?php echo $contactyoutube['url']; ?>" target="<?php echo $contactyoutube['target']; ?>" title="<?php echo $contactyoutube['title']; ?>"><?php get_template_part( 'assets/svg/youtube'); echo $contactyoutube['title']; ?></a>
            <?php
            endif; ?>

            <?php
            $contactlinkedin = get_field('contactLinkedIn', 'option');
            if($contactlinkedin):?>
            <a class="main__contact" href="<?php echo $contactlinkedin['url']; ?>" target="<?php echo $contactlinkedin['target']; ?>" title="<?php echo $contactlinkedin['title']; ?>"><?php get_template_part( 'assets/svg/linkedin'); echo $contactlinkedin['title']; ?></a>
            <?php
            endif; ?>

            <?php
            $contactinstagram = get_field('contactInstagram', 'option');
            if($contactinstagram):?>
            <a class="main__contact" href="<?php echo $contactinstagram['url']; ?>" target="<?php echo $contactinstagram['target']; ?>" title="<?php echo $contactinstagram['title']; ?>"><?php get_template_part( 'assets/svg/instagram'); echo $contactinstagram['title']; ?></a>
            <?php
            endif; ?>

            <?php
            $contactwhatsapp = get_field('contactWhatsApp', 'option');
            if($contactwhatsapp):?>
            <a class="main__contact" href="<?php echo $contactwhatsapp['url']; ?>" target="<?php echo $contactwhatsapp['target']; ?>" title="<?php echo $contactwhatsapp['title']; ?>"><?php get_template_part( 'assets/svg/whatsapp'); echo $contactwhatsapp['title']; ?></a>
            <?php
            endif; ?>

        </div>
    </section>

    <section id="cheatsheet__buttons">
        <div class="container">
            <h2>Buttons</h2>
            <div class="buttons__container">
                <a class="btn btn-primary" href="#">Btn Primary</a>
                <a class="btn btn-primary-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?>Btn Primary</a>
                <a class="btn btn-secondary" href="#">Btn Secondary</a>
                <a class="btn btn-secondary-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?>Btn Secondary</a>
                <a class="btn btn-primary-outline" href="#">Btn Outline</a>
                <a class="btn btn-primary-outline-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?>Btn Outline</a>
                <a class="btn btn-link" href="#">Btn Link</a>
                <a class="btn btn-link-icon" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?>Btn Link</a>
            </div>
        </div>
    </section>

    <section class="cheatsheet__modals">
        <div class="container">
            <div class="row">
                <h2>Modals</h2>
            </div>
            <div class="row">
                <button class="btn btn-primary open-modal">Open modal with form</button>
                <?php
                get_template_part( 'template-parts/modals/modal-contact' ); ?>
            </div>
        </div>
    </section>

    <section class="cheatsheet__swiper">
        <div class="container">
            <div class="row">
                <h2>Swiper (with Lightbox)</h2>
            </div>
            <div class="row">
                <div class="single-gallery__gallery">
                    <div class="swiper swiper-gallery">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/colin.webp">
                                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/colin.webp">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/jaap.webp">
                                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/jaap.webp">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/henrick.webp">
                                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/henrick.webp">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/reinier.webp">
                                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/reinier.webp">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/melanie.webp">
                                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/melanie.webp">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php get_template_part( 'template-parts/swiper/swiper' ); ?>
    </section>

    <section class="cheatsheet__lightbox">
        <div class="container">
            <div class="row">
                <h2>Lightbox</h2>
            </div>
            <div class="row">
                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/colin.webp">
                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/colin.webp">
                </a>
                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/jaap.webp">
                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/jaap.webp">
                </a>
                <a data-fslightbox href="/wp-content/themes/bureauhanze/assets/img/cheatsheet/henrick.webp">
                    <img src="/wp-content/themes/bureauhanze/assets/img/cheatsheet/henrick.webp">
                </a>
                <script src="/wp-content/themes/bureauhanze/assets/js/fslightbox.min.js"></script>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
