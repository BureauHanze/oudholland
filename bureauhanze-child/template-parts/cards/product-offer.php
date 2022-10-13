<div class="offer__content">
    <div class="content__content">
        <h3><?php the_title(); ?></h3>
        <p class="sale-amount__price"><?php echo $regular_price; ?></p>
        <p class="sale-amount__regular-price"><span><?php echo $regular_price; ?></span>incl. btw</p>
    </div>

    <a class="btn btn-primary btn-yellow" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_template_part( 'assets/svg/arrow' ); ?>Samenstellen</a>
</div>
<div class="offer__image">
    <?php the_post_thumbnail(); ?>
</div>