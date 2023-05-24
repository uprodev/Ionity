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
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                $product = wc_get_product($product_id);
                                $unit = get_field('_woo_uom_input', $product_id);


                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                ?>

                                    <div class="item item--product-ready">
                                        <div class="product-header">
                                            <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/noir-logo-duo.svg" alt="" /></span>
                                            Noir <strong><?= $product->get_sku() ?></strong>
                                            <span>(1 piece)</span>
                                        </div>
                                        <div class="description">
                                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok. ?>

                                        </div>
                                        <div class="price"><?= WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ) ?></div>
                                        <div class="back-link"><a href="<?= $product_permalink ?>">Change</a></div>
                                    </div>

                                <?php } ?>
                            <?php } ?>

                            <div class="item item--personal-ready" style="display: none">
                                <div class="personal-data  " data-content="#billing_first_name"></div>
                                <div class="personal-data  " data-content="#billing_phone"></div>
                                <div class="personal-data  " data-content="#billing_email"></div>
                                <div class="back-link"><a class="btn-to-2" href="#">Change</a></div>
                            </div>

                            <div class="item item--delivery-ready"  style="display: none">
                                <div class="delivery-image"><img src="<?= get_template_directory_uri() ?>/assets/img/logo-post.png" alt=""></div>
                                <div class="delivery-data" ></div>
                                <div class="back-link"><a class="btn-to-3-change" href="#">Change</a></div>
                            </div>


                        </div>
                        <p class="step-title">Step 2. Enter personal details</p>
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
                    <div style="display: none" data-step="3" class="form-main" data-title="<?php _e('Step 3. Enter shipping details', 'ionity') ?>">
                        <div action="#">
                            <div class="form-delivery-options">


                                <ul>
                                    <li>
                                        <div class="title">Shipper</div>
                                        <div class="options-list">
                                            <div class="d-flex">
                                                <div class="radio-holder delivery-selection">
                                                    <input type="radio" id="shipper1" name="shipper" value="post" checked="">
                                                    <label for="shipper1"><img src="<?= get_template_directory_uri() ?>/assets/img/logo-post.png" alt=""></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">Delivery method</div>
                                        <div class="options-list">

                                            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                                                <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

                                                <?php wc_cart_totals_shipping_html(); ?>

                                                <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

                                            <?php endif; ?>


                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="delivery-variant active" data-var="local_pickup:2">
                                <div class="form-field">
                                    <label for="city_np">City</label>
                                    <input type="text" id="city_np" class="np"  name="np_c" placeholder="City" required>


                                </div>
                                <div class="form-field">
                                    <label for="branch">Branch number</label>
                                    <select class="select" name="branch" id="branch" required>

                                    </select>
                                </div>
                            </div>
                            <div class="delivery-variant" data-var="free_shipping:1">
                                <div class="form-field">
                                    <label for="city1">City</label>
                                    <input type="text" class="np" name="city_courier" id="city1" placeholder="Your city" required>
                                </div>
                                <div class="form-field">
                                    <label for="street">Street</label>
                                    <input type="text" name="shipping_address_1" id="street" placeholder="Street" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="building">Building</label>
                                            <input type="text" name="shipping_address_2"  id="building" placeholder="Your building" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="apartment">Apartment</label>
                                            <input type="text" name="shipping_apartment"  id="apartment" placeholder="Your apartment">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="city" name="shipping_city" placeholder="City">

                            <div class="form-buttons">
                                <button type="submit" class="btn btn-to-4 btn-light">cHeckout</button>
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
