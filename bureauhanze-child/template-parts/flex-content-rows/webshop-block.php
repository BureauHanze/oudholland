<section class="flex-content flex-content-webshop-block">
    <div class="container">
        <div class="row">
            <div class="flex-content-webshop-block__paragraph">
                <?php
                if(get_sub_field('section_flex-content_webshop-block_paragraph')) :
                    the_sub_field('section_flex-content_webshop-block_paragraph');
                endif; ?>
                <a class="btn btn-secondary-icon" href="/webshop/" title="Webshop"><?php get_template_part( 'assets/svg/cart' ); ?>Naar de webshop</a>
            </div>
            <?php
            $featured_posts = get_sub_field('products');
            if( $featured_posts ): ?>
            <div class="flex-content-webshop-block__products">
                <?php 
                foreach( $featured_posts as $post ): 
                    setup_postdata($post); ?>
                    <div class="products__product">
                        <?php 
                        get_template_part('template-parts/cards/product-webshop'); 
                        ?>
                    </div>
                <?php 
                endforeach; ?>
                <?php 
                wp_reset_postdata(); ?>
            </div>
            <?php 
            endif; ?>
        </div>
    </div>
</section>
