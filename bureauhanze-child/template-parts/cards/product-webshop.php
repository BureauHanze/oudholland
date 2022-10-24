<?php
$product = wc_get_product(); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="webshop-block__product">
    <div class="product__image">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="product__content">
        <h3><?php the_title(); ?></h3>
        <div class="content__prices">
            <p class="price card__price"><?php echo $product->get_price_html(); ?></p>
        </div>
    </div>
</a>
