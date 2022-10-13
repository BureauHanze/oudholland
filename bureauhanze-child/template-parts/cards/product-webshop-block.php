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
        <div class="content__prices">
            <!-- <p class="sale-amount__price"><?php echo $sale_price; ?></p> -->
            <p class="sale-amount__regular-price"><span><?php echo $regular_price; ?></span><span class="price__suffix">excl. btw</span></p>
        </div>
    </div>
</a>
