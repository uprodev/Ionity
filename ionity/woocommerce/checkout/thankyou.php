<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>



        <div class="container-fluid">
            <h2>Your payment was successful</h2>
            <p>Our manager will get in touch with you in the near future</p>
            <div class="buttons">
                <a href="/" class="btn btn-light">to home page</a>
                <a href="<?= get_permalink(485) ?>" class="btn btn-dark">continue shopping</a>
            </div>
        </div>

    <!-- end content-->

