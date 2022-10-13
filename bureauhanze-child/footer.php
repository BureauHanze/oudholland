<footer class="footer">

    <div class="container">
        <div class="footer__spinning-text">
            <?php get_template_part('assets/svg/spinning-text'); ?>
        </div>
        <div class="row">
            <h2 class="footer__main-heading">Laten we er eens<br/>voor gaan zitten</h2>
            <div class="footer__steps">
                <div class="steps__step">
                    <div class="step__image">
                        <?php get_template_part('assets/svg/support'); ?>
                    </div>
                    <div class="step__text">
                        <p>We beginnen met en <strong>Vrijblijvend adviesgesprek</strong></p>
                    </div>
                </div>
                <div class="steps__step">
                    <div class="step__image">
                        <?php get_template_part('assets/svg/design'); ?>
                    </div>
                    <div class="step__text">
                        <p>Vervolgens maken we een <strong>Uitgebreid interieurontwerp</strong></p>
                    </div>
                </div>
                <div class="steps__step">
                    <div class="step__image">
                        <?php get_template_part('assets/svg/work'); ?>
                    </div>
                    <div class="step__text">
                        <p>Met als resultaat <strong>Een optimale werkomgeving</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-banner">
            <h2>Hulp nodig bij uw<br/>kantoorinrichting?</h2>
            <a class="btn" href="">Wij helpen u graag verder</a>
        </div>

        <div class="row row-information">
            <div class="footer__contact">
                <div class="footer__logo">
                <?php
                $contactlogo = get_field('contactLogo', 'option');
                if ($contactlogo) : ?>
                    <?php the_field('contactLogo', 'option'); ?></p>
                <?php
                endif; ?>
                </div>
                <?php
                $contactphone = get_field('contactPhone', 'option');
                if($contactphone):?>
                <a class="main__contact" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); echo $contactphone['title']; ?></a>
                <?php
                endif; ?>
                <?php
                $contactmail = get_field('contactMail', 'option');
                if($contactmail):?>
                <a class="main__contact" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); echo $contactmail['title']; ?></a>
                <?php
                endif; ?>
            </div>
            <div class="footer__divider"></div>
            <div class="footer__links">
                <div class="links__column">
                    <h3>Assortiment</h3>
                    <a href="/webshop/kantoormeubelen/" title="Kantoormeubelen">Kantoormeubelen</a>
                    <a href="/webshop/lockers/" title="Lockers">Lockers</a>
                    <a href="/webshop/magazijninstellingen/" title="Magazijninstellingen">Magazijninstellingen</a>
                    <a href="/webshop/outlet-kantoormeubulair/" title="Outlet kantoormeubulair"">Outlet kantoormeubulair</a>
                </div>
                <div class="links__column">
                    <h3>Belangrijke info</h3>
                    <a href="/catalogus/" title="Catalogus">Catalogus</a>
                    <a href="/levering/" title="Levering">Levering</a>
                    <a href="/retourbeleid/" title="Retourbeleid">Retourbeleid</a>
                    <a href="/veelgestelde-vragen/" title="Veelgestelde vragen">Veelgestelde vragen</a>
                </div>
                <div class="links__column">
                    <h3>In onze regio en tips</h3>
                    <a href="/kantoormeubelen-zwolle/" title="Kantoormeubelen Zwolle">Kantoormeubelen Zwolle</a>
                    <a href="/kantoormeubelen-apeldoorn/" title="Kantoormeubelen Zwolle">Kantoormeubelen Apeldoorn</a>
                    <a href="/kantoormeubelen-amersfoort/" title="Kantoormeubelen Zwolle">Kantoormeubelen Amersfoort</a>
                    <a href="/klein-kantoor-inrichten/" title="Klein katoor inrichten">Klein katoor inrichten</a>
                </div>
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
                <a href="/privacy-statement">Privacy beleid</a>
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
