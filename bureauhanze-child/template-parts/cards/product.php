<?php 

$product = wc_get_product();

?>
<div class="product__card">

    <?php if($product->is_on_sale()): ?>
        <?php echo woocommerce_show_product_sale_flash(); ?>
    <?php endif; ?>

    <div class="card__image">
        <a href="<?php echo get_permalink(); ?>">
            <?php echo $product-> get_image('full'); ?>
        </a>
    </div>

    <div class="card__info">
        <a href="<?php echo get_permalink(); ?>">
            <h4 class="info__heading"><?php the_title(); ?></h4>
            <!-- <?php
            if(!is_product_category()) : ?>
            <div class="info__description"><?php the_content(); ?></div>
            <?php
            endif; ?> -->
        </a>
        
        <div class="card__footer">
            <p class="price card__price"><?php echo $product->get_price_html(); ?></p>

            <div class="footer__buttons">
                <a class="btn btn-primary-icon" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
            </div>

        </div>

    </div>

</div>

