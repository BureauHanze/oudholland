<?php
$product = new WC_Product(get_the_ID());
$regular_price = wc_price($product->get_price_excluding_tax(1,$product->get_regular_price()));
$sale_price = wc_price($product->get_price_excluding_tax(1,$product->get_sale_price())); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="webshop-block__product">
    <div class="product__image">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="product__content">
        <h3><?php the_title(); ?></h3>


        <div class="card__footer">
            <p class="price card__price"><?php echo $product->get_price_html(); ?></p>

            <div class="footer__buttons">
                <a class="btn btn-primary-icon" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
            </div>

        </div>
        
    </div>
</a>
