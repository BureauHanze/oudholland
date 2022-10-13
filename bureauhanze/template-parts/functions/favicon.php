<?php
function add_favicon(){ 
$faviconcompany = get_field('contactFavicon', 'option'); ?>
<link rel="shortcut icon" href="<?php echo ($faviconcompany['sizes']['favicon']); ?>"/>
<link rel="icon" type="image/png" href="<?php echo ($faviconcompany['sizes']['favicon-chrome']); ?>" sizes="192x192">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo ($faviconcompany['sizes']['favicon-apple']); ?>">
<?php 
}
add_action('wp_head','add_favicon');