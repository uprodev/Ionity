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

do_action( 'woocommerce_before_checkout_form', $checkout );

//print_r(get_warehouses('db5c88c6-391c-11dd-90d9-001a92567626'));

//



?>

<div class="page-content">
    <div class="block-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xxl-6 d-none d-lg-block">
                    <div class="form-image">
                        <img class="lazy" data-src="<?= get_template_directory_uri() ?>/assets/img/form-img.jpg"
                             srcset="<?= get_template_directory_uri() ?>/assets/img/form-img.jpg 1x, <?= get_template_directory_uri() ?>/assets/img/form-img@2x.jpg 2x" alt="" />
                    </div>
                </div>
                <form class="col-lg-8 col-xxl-6" >
                    <div class="form-header">
                        <h2>Make an order</h2>
                        <div class="form-ready">
                            <div class="item item--product-ready">
                                <div class="product-header">
                                    <span class="icon"><img src="assets/img/noir-logo-duo.svg" alt="" /></span>
                                    Noir <strong>eDuo</strong>
                                    <span>(1 piece)</span>
                                </div>
                                <div class="description">
                                    <p>Montage: Stand</p>
                                    <p>Connectors: Type 1 j1772 (with holder), Mennekes Type 2</p>
                                </div>
                                <div class="price">$1149</div>
                                <div class="back-link"><a href="#">Change</a></div>
                            </div>
                        </div>
                        <p>Step 2. Enter personal details</p>
                    </div>
                    <div data-step="2" data-title="<?php _e('Step 2. Enter personal details', 'ionity') ?>" class="form-main">
                        <div action="#">
                            <div class="form-field">
                                <label for="billing_first_name">Your name</label>
                                <input name="billing_first_name" type="text" id="billing_first_name" placeholder="Your name" required/>
                            </div>
                            <div class="form-field">
                                <label for="billing_phone">Your phone number</label>
                                <input name="billing_phone" type="tel" id="billing_phone" placeholder="Your phone number" required/>
                            </div>
                            <div class="form-field">
                                <label for="billing_email">Your email</label>
                                <input name="billing_email" type="email" id="billing_email" placeholder="Your email" required />
                            </div>

                            <div class="form-buttons">
                                <button  type="" class="btn-to-3 btn btn-light">continue</button>
                            </div>
                        </div>
                    </div>
                    <div style="display: none0" data-step="3" class="form-main" data-title="<?php _e('Step 3. Enter shipping details', 'ionity') ?>">
                        <div action="#">
                            <div class="form-delivery-options">
                                <ul>
                                    <li>
                                        <div class="title">Shipper</div>
                                        <div class="options-list">
                                            <div class="d-flex">
                                                <div class="radio-holder delivery-selection">
                                                    <input type="radio" id="shipper1" name="shipper" value="post" checked="">
                                                    <label for="shipper1"><img src="assets/img/logo-post.png" alt=""></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">Delivery method</div>
                                        <div class="options-list">
                                            <div class="d-flex">
                                                <div class="radio-holder delivery-selection">
                                                    <input type="radio" id="method1" name="method" value="self" checked="">
                                                    <label for="method1">Self-checkout</label>
                                                </div>
                                                <div class="radio-holder delivery-selection">
                                                    <input type="radio" id="method2" name="method" value="courier">
                                                    <label for="method2">By courier</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="delivery-variant active" data-var="self">
                                <div class="form-field">
                                    <label for="city_np">City</label>
                                    <input type="text" id="city_np" name="np_c" placeholder="City">
                                    <input type="hidden" id="city" name="shipping_city" placeholder="City">

                                </div>
                                <div class="form-field">
                                    <label for="branch">Branch number</label>
                                    <select class="select" id="branch">
                                        <option value="0">Select branch number</option>
                                        <option value="branch1">Branch 1</option>
                                        <option value="branch2">Branch 2</option>
                                        <option value="branch3">Branch 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="delivery-variant" data-var="courier">
                                <div class="form-field">
                                    <label for="city1">City</label>
                                    <input type="text" id="city1" placeholder="Your city">
                                </div>
                                <div class="form-field">
                                    <label for="street">Street</label>
                                    <input type="text" id="street" placeholder="Street">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="building">Building</label>
                                            <input type="text" id="building" placeholder="Your building">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="apartment">Apartment</label>
                                            <input type="text" id="apartment" placeholder="Your apartment">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-buttons">
                                <button type="submit" class="btn btn-light">cHeckout</button>
                            </div>
                        </div>
                    </div>
                    <div style="display: none" data-step="4" class="form-main" data-title="<?php _e('Step 4. Enter payment details', 'ionity') ?>">
                        <div action="#">
                            <div class="form-payment">
                                <div class="form-field">
                                    <label for="cardNum">Card number</label>
                                    <input type="text" id="cardNum" placeholder="Card number">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="cardDate">MM / YY</label>
                                            <input type="text" id="cardDate" placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" placeholder="CVV">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-field">
                                    <label for="cardName">Card holder name</label>
                                    <input type="text" id="cardName" placeholder="Card holder name">
                                </div>
                                <div class="form-buttons">
                                    <button type="submit" class="btn btn-light">cHeckout</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
