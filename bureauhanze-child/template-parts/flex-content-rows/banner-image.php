<?php 
$image = get_sub_field('section_flex-content-banner-image_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) { ?>
<div class="flex-content-banner-image">
    <div class="container" style="background-image: url(<?php echo $image; ?>);">
        <h2>Vergaderruimte inrichten?</h2>
        <?php 
        $link = get_sub_field('section_flex-content-banner-image_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php get_template_part( 'assets/svg/chevron' ); ?></a>
        <?php endif; ?>
        <!-- <a class="btn btn-primary" href="#"><?php get_template_part( 'assets/svg/chevron' ); ?></a> -->
    </div>
</div>
<?php
} ?>