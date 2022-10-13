<?php
/**
 * Composite Navigation template
 *
 * Override this template by copying it to 'yourtheme/woocommerce/single-product/js/composite-navigation.php'.
 *
 * On occasion, this template file may need to be updated and you (the theme developer) will need to copy the new files to your theme to maintain compatibility.
 * We try to do this as little as possible, but it does happen.
 * When this occurs the version of the template file will be bumped and the readme will list any important changes.
 *
 * @version  3.7.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>


<script type="text/template" id="tmpl-wc_cp_composite_navigation">
	<div id="navBtns" class="composite_navigation_inner">
		<span id="prevBtn" class="btn page_button prev {{ data.prev_btn.btn_classes }}"><span class="last">Gekozen accessoires aanpassen</span><span class="standard"><svg width="8px" height="13px" viewBox="0 0 8 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Projectinrichting" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Home" transform="translate(-193.000000, -928.000000)" fill-rule="nonzero" stroke="currentColor" stroke-width="2">
            <path d="M201.884377,931.455422 L192.068601,931.455422 C191.604105,931.455422 191.367474,932.016324 191.70051,932.349359 L196.608397,937.257247 C196.809971,937.458821 197.143006,937.458821 197.344668,937.257247 L202.252556,932.349359 C202.585503,932.016324 202.348873,931.455422 201.884377,931.455422 Z" id="Path-Copy-6" transform="translate(196.976502, 934.431925) rotate(-90.000000) translate(-196.976502, -934.431925) "></path>
        </g>
    </g>
</svg>Vorige</span></span>
		<span id="nextBtn" onclick="incVATtime()" class="btn page_button next {{ data.next_btn.btn_classes }}"><span class="last">Afronden</span><span class="standard"><svg width="8px" height="13px" viewBox="0 0 8 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Projectinrichting" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Home" transform="translate(-193.000000, -928.000000)" fill-rule="nonzero" stroke="currentColor" stroke-width="2">
            <path d="M201.884377,931.455422 L192.068601,931.455422 C191.604105,931.455422 191.367474,932.016324 191.70051,932.349359 L196.608397,937.257247 C196.809971,937.458821 197.143006,937.458821 197.344668,937.257247 L202.252556,932.349359 C202.585503,932.016324 202.348873,931.455422 201.884377,931.455422 Z" id="Path-Copy-6" transform="translate(196.976502, 934.431925) rotate(-90.000000) translate(-196.976502, -934.431925) "></path>
        </g>
    </g>
</svg>Volgende</span></span>
	</div>

</script>
