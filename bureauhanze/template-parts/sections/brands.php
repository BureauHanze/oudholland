<div class="brands">
<?php 
$images = get_field('section_brands', 'options');
$size = 'brand';
if( $images ): ?>    
<div class="container">
    <div class="row">
        <h2>Referenties</h2>
    </div>
    <div class="row">
        <div class="swiper swiper-brands">
            <div class="swiper-wrapper">
            <?php 
            foreach( $images as $image_id ): ?>
                <div class="swiper-slide">
                    <div class="brands__image">
                        <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                    </div>
                </div>
            <?php 
            endforeach; ?>
            </div>
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
            <?php 
            get_template_part( 'template-parts/swiper/swiper' ); ?>
        </div>
    </div>
</div>
<?php 
endif; ?>