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



?>




    <div class="block-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xxl-6 d-none d-lg-block">
                    <div class="form-image">
                        <figure>
                            <img class="lazy" data-src="<?= get_template_directory_uri() ?>/assets/img/form-img.jpg"
                                 srcset="<?= get_template_directory_uri() ?>/assets/img/form-img.jpg 1x, <?= get_template_directory_uri() ?>/assets/img/form-img@2x.jpg 2x" alt="" />

                        </figure>
                    </div>
                </div>
                <form class="form-checkout col-lg-8 col-xxl-6" >
                    <div class="form-header">
                        <h2><?= __('Make an order', 'ionity') ?></h2>
                        <div class="form-ready">
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                $product = wc_get_product($product_id);



                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                ?>

                                    <div class="item item--product-ready">
                                        <div class="product-header">
                                            <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/noir-logo-duo.svg" alt="" /></span>
                                            Noir <strong><?= $product->get_sku() ?></strong>
                                            <span>(<?php printf( _n( '%s piece', '%s pieces', $cart_item['quantity'], 'ionity' ),  ( $cart_item['quantity'] ) ); ?>)</span>
                                        </div>
                                        <div class="description">
                                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok. ?>

                                        </div>
                                        <div class="price"><?php wc_cart_totals_order_total_html(); ?></div>
                                        <div class="back-link"><a href="<?= $product_permalink ?>"><?= __('Change', 'ionity') ?></a></div>
                                    </div>

                                <?php } ?>
                            <?php } ?>

                            <div class="item item--personal-ready" style="display: none">
                                <div class="personal-data  " data-content="#billing_first_name"></div>
                                <div class="personal-data  " data-content="#billing_phone"></div>
                                <div class="personal-data  " data-content="#billing_email"></div>
                                <div class="back-link"><a class="btn-to-2" href="#"><?= __('Change', 'ionity') ?></a></div>
                            </div>

                            <div class="item item--delivery-ready"  style="display: none">
                                <div class="delivery-image"><img src="<?= get_template_directory_uri() ?>/assets/img/logo-post.png" alt=""></div>
                                <div class="delivery-data" ></div>
                                <div class="back-link"><a class="btn-to-3-change" href="#"><?= __('Change', 'ionity') ?></a></div>
                            </div>


                        </div>
                        <p class="step-title"><?= __('Step 2. Enter personal details', 'ionity') ?></p>
                    </div>
                    <div data-step="2" data-title="<?php _e('Step 2. Enter personal details', 'ionity') ?>" class="form-main">
                        <div action="#">
                            <div class="form-field">
                                <label for="billing_first_name"><?= __('Your name', 'ionity') ?></label>
                                <input maxlength="32" name="billing_first_name" type="text" id="billing_first_name" placeholder="<?= __('Your name', 'ionity') ?>" required/>
                            </div>
                            <div class="form-field">
                                <label for="billing_phone"><?= __('Your phone number', 'ionity') ?></label>
                                <input maxlength="32" name="billing_phone" data-rule-mobileValidation="true" type="tel" id="billing_phone" placeholder="<?= __('Your phone number', 'ionity') ?>" required/>
                            </div>
                            <div class="form-field">
                                <label for="billing_email"><?= __('Your email', 'ionity') ?></label>
                                <input maxlength="32" name="billing_email" type="email" id="billing_email" placeholder="<?= __('Your email', 'ionity') ?>" required />
                            </div>

                            <div class="form-buttons">
                                <button  type="" class="btn-to-3 btn btn-light"><?= __('continue', 'ionity') ?></button>
                            </div>
                        </div>
                    </div>
                    <div style="display: none" data-step="3" class="form-main" data-title="<?php _e('Step 3. Enter shipping details', 'ionity') ?>">
                        <div action="#">
                            <div class="form-delivery-options">


                                <ul>
                                    <li>
                                        <div class="title"><?= __('Shipper', 'ionity') ?></div>
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
                                        <div class="title"><?= __('Delivery method', 'ionity') ?></div>
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
                                    <label for="city_np"><?= __('City', 'ionity') ?></label>
                                    <input type="text" id="city_np" class="np"  name="np_c" placeholder="<?= __('City', 'ionity') ?>" required>


                                </div>
                                <div class="form-field">
                                    <label for="branch"><?= __('Branch number', 'ionity') ?></label>
                                    <select class="select" name="branch" id="branch" required>
                                        <option value="0"><?= __('Select Branch number', 'ionity') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="delivery-variant" data-var="free_shipping:1">
                                <div class="form-field">
                                    <label for="city1"><?= __('City', 'ionity') ?></label>
                                    <input type="text" class="np" name="city_courier" id="city1" placeholder="<?= __('Your city', 'ionity') ?>" required>
                                </div>
                                <div class="form-field">
                                    <label for="street"><?= __('Street', 'ionity') ?></label>
                                    <input type="text" name="shipping_address_1" id="street" placeholder="<?= __('Your street', 'ionity') ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="building"><?= __('Building', 'ionity') ?></label>
                                            <input maxlength="32" type="text" name="shipping_address_2"  id="building" placeholder="<?= __('Your building', 'ionity') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="apartment"><?= __('Apartment', 'ionity') ?></label>
                                            <input maxlength="32" type="text" name="shipping_apartment"  id="apartment" placeholder="<?= __('Your apartment', 'ionity') ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="city" name="shipping_city" >

                            <div class="form-buttons">
                                <button type="" class="btn btn-to-4 btn-light"><?= __('cHeckout', 'ionity') ?></button>
                            </div>
                        </div>
                    </div>
                    <div style="display: none" data-step="4" class="form-main" data-title="<?php _e('Step 4. Enter payment details', 'ionity') ?>">
                        <div action="#">
                            <div class="form-payment">
                                <div class="form-field">
                                    <label for="cardNum"><?= __('Card number', 'ionity') ?></label>
                                    <input   onkeyup="this.value=this.value.replace(/[^\d]/,'')" data-rule-cartNum="true" type="text" id="cardNum" name="cardNum" placeholder="<?= __('Card number', 'ionity') ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="cardDate">MM / YY</label>
                                            <input maxlength='5' data-rule-cartDate="true" type="text" id="cardDate" name="cardDate" placeholder="MM / YY" required>
                                        </div>
                                        <input type="hidden" name="SecureCard-expiryMonth">
                                        <input type="hidden" name="SecureCard-expiryYear">
                                    </div>
                                    <div class="col">
                                        <div class="form-field">
                                            <label for="cvv">CVV</label>
                                            <input maxlength="3" data-rule-number="true" data-rule-minlength="3" data-rule-maxlength="3" type="text" id="cvv" name="cvv" placeholder="CVV" required>
                                        </div>



                                    </div>
                                </div>
<!--                                <div class="form-field">-->
<!--                                    <label for="cardName">--><?//= __('Card holder name', 'ionity') ?><!--</label>-->
<!--                                    <input type="text" id="cardName" placeholder="--><?//= __('Card holder name', 'ionity') ?><!--">-->
<!--                                </div>-->
                                <div class="result"></div>

                                <div class="form-buttons">
                                    <button type="submit" class="btn btn-light"><?= __('cHeckout', 'ionity') ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="action" value="payment_request">

                    <?php foreach (WC()->cart->get_fees() as $fee) { ?>
                        <input type="hidden" name="holder" value="<?= $fee->amount ?>">
                    <?php } ?>
                </form>

            </div>
        </div>
    </div>



<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
