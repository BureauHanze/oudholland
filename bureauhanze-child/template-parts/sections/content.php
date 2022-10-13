<?php
if(!is_product()) : ?>
<section class="content">
<?php
else : ?>
<section class="content content-product">
<?php
endif; ?>
<section class="content">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</section>