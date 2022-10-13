<?php
$featured_posts = get_sub_field('webshop-two_products');
if( $featured_posts ): ?>
<section class="flex-content flex-content-webshop-block-two">
    <div class="row">
        <div class="container">
            <h3 class="webshop-block-two__heading">In onze websshop</h3>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="flex-content-webshop-block-two__products">
            <?php 
            foreach( $featured_posts as $post ): 
            setup_postdata($post);
                get_template_part('template-parts/cards/product-webshop-block');
            endforeach; ?>
            </div>
        </div>

    </div>
</section>
<?php 
wp_reset_postdata(); ?>
<?php 
endif; ?>
