<section class="flex-content flex-content-webshop-block">
    <div class="container">
        <div class="row">
            <div class="flex-content-webshop-block__paragraph">
                <?php
                if(get_sub_field('section_flex-content_webshop-block_paragraph')) :
                    the_sub_field('section_flex-content_webshop-block_paragraph');
                endif; ?>
                <a class="btn btn-secondary-icon" href="#"><?php get_template_part( 'assets/svg/cart' ); ?>Naar de webshop</a>
            </div>
            <div class="flex-content-webshop-block__products">
                <div class="products__product"></div>
                <div class="products__product"></div>
            </div>
        </div>
    </div>
</section>
