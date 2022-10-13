<?php 
$image = get_sub_field('section_flex-content-banner-image_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) { ?>

<div class="flex-content-banner-image">
    <div class="container" style="background-image: url(<?php echo $image; ?>);">
    <h2>Vergaderruimte inrichten?</h2>
    <a class="btn btn-primary" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
    </div>

</div>
<?php
} ?>