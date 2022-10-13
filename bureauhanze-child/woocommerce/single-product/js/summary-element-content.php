<?php
/**
 * Composite Summary Element Content template
 *
 * Override this template by copying it to 'yourtheme/woocommerce/single-product/js/summary-element-content.php'.
 *
 * On occasion, this template file may need to be updated and you (the theme developer) will need to copy the new files to your theme to maintain compatibility.
 * We try to do this as little as possible, but it does happen.
 * When this occurs the version of the template file will be bumped and the readme will list any important changes.
 *
 * @version 3.7.0
 * @since   3.7.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><script type="text/template" id="tmpl-wc_cp_summary_element_content">
	
		<a class="summary_element_tap" href="#" ></a>
		<# if ( data.element_image_src ) { #>
			<div class="summary_element_image summary_element_data">
				<img class="summary_element_content" alt="{{ data.element_image_title }}" src="{{ data.element_image_src }}" srcset="{{ data.element_image_srcset }}" sizes="{{ data.element_image_sizes }}" />
			</div>
		<# } #>
		<# if ( data.element_selection_title || data.element_action ) { #>
				<# if ( data.element_selection_title ) { #>
					<div class="summary_element_selection summary_element_data"><span class="summary_element_content">{{{ data.element_selection_title }}}</span></div>
				<# } #>
				<# if ( data.element_action ) { #>
					<div class="summary_element_change summary_element_data"><span class="summary_element_content summary_element_selection_prompt"><a href="#">Wijzigen</a></span></div>
				<# } #>
		<# } #>
		<# if ( data.element_price ) { #>
			<div class="summary_element_price summary_element_data">{{{ data.element_price }}} <span>excl. btw</span></div>
		<# } #>
	
</script>
