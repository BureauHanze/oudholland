<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
} ?>

<div class="progression">
    <div class="stap1 current" id="stap1" onclick="navStepCheckout(1)">
     	<?php echo get_template_part( '/assets/svg/accept' ); ?>
        <p class="stapcount">stap 1</p>
        <p><b>Gegevens</b></p>
    </div>

    <div class="overflowLijn">
        <span id="tussen1-2" class="tussenLijn"></span>
        <span class="achtergrondLijn"></span>
    </div>

    <div class="stap2" id="stap2" onclick="navStepCheckout(2)">
  		<?php echo get_template_part( '/assets/svg/accept' ); ?>
        <p class="stapcount">stap 2</p>
        <p><b>Verzending</b></p>
    </div>

	<div class="overflowLijn">
        <span id="tussen2-3" class="tussenLijn"></span>
        <span class="achtergrondLijn"></span>
    </div>

    <div class="stap3" id="stap3" onclick="navStepCheckout(3)">
  		<?php echo get_template_part( '/assets/svg/accept' ); ?>
        <p class="stapcount">stap 3</p>
        <p><b>Overzicht</b></p>
    </div>

	<div class="overflowLijn">
        <span id="tussen3-4" class="tussenLijn"></span>
        <span class="achtergrondLijn"></span>
    </div>

    <div class="stap4" id="stap4" onclick="navStepCheckout(4)">
  		<?php echo get_template_part( '/assets/svg/accept' ); ?>
        <p class="stapcount">stap 4</p>
        <p><b>Betaling</b></p>
    </div>
</div>

<p id="formValidation">Niet alle verplichte velden zijn ingevuld</p>


<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	

	<div id="checkoutWrap">

		<?php if ( $checkout->get_checkout_fields() ) : ?>
			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div id="checkout_step1">
				<h3 class="order_review">Gegevens</h3>
				<div class="col2-set" id="customer_details">
					<div class="col-1">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>
				</div>
				<div class="btns_footer">
					<div class="btn btn-secondary next_step_button" onclick="nextStepCheckout(1)">Ga verder</div>
				</div>
			</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		<?php endif; ?>


		<div id="checkout_step2">
			<h3>Verzending</h3>
			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
			<div class="btns_footer">
				<div class="btn btn-primary-outline prev_step_button" onclick="prevStepCheckout(2)">Ga Terug</div>
				<div class="btn btn-secondary next_step_button" onclick="nextStepCheckout(2)">Ga verder</div>
			</div>
		</div>

		<div id="checkout_step3_4">
			<div id="order_review" class="woocommerce-checkout-review-order">

				<h3 class="order_review">Overzicht</h3>
				<h3 class="order_pay">Betaling</h3>
				
				<div class="order__info">
					<h4>Gegevens</h4>
					<div class="general__info">
						<h6>Factuuradres</h6>
						<div><span id="firstname"></span> <span id="lastname"></span></div>
						<div id="company"></div>
						<div id="street"></div>
						<div><span id="zipcode"></span>, <span id="city"></span></div>
					</div>	
					
					<div class="shipping__info">
						<h6>Bezorgadres</h6>
						<div><span id="shipfirstname"></span> <span id="shiplastname"></span></div>
						<div id="shipcompany"></div>
						<div id="shipstreet"></div>
						<div><span id="shipzipcode"></span>, <span id="shipcity"></span></div>
					</div>
				
					<div class="contact__info">
						<h6>Contactgegevens</h6>
						<div id="phone"></div>
						<div id="email"></div>		
					</div>
					<div class="btn btn-link" onclick="prevStepCheckout(2)">Wijzigen</div>				
				</div>
			
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
			
			<div class="btns_footer">
				<div class="btn btn-primary-outline prev_step_button" onclick="prevStepCheckout(3)">Ga Terug</div>				
				<div class="btn btn-secondary next_step_button" onclick="nextStepCheckout(3)">Ga verder</div>
			</div>
		</div>

	</div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
