<?php
// $product = wc_get_product(); 
// var_dump($product);
?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="webshop-block__product">
    <div class="product__image">
        <?php the_post_thumbnail(); ?>
        <?php 
        // echo $product-> get_image('full'); 
        ?>
    </div>
    <div class="product__content">
        <h3><?php the_title(); ?></h3>
        <div class="content__prices">
            <!-- <p class="sale-amount__regular-price"><span><?php echo $regular_price; ?></span><span class="price__suffix">excl. btw</span></p> -->
        </div>
    </div>
</a>
