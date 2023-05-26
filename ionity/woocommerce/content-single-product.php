<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

$image_id = get_post_thumbnail_id(get_the_id());
$image = get_the_post_thumbnail_url(get_the_id(), 'large');
$srcset = wp_get_attachment_image_srcset($image_id ,'large');


?>
<div class="block-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xxl-6 d-none d-lg-block">
                <div class="form-image">
                    <figure>
                        <img class="lazy" data-src="<?=  $image  ?>"
                             srcset="<?= $srcset ?>" alt="" />
                    </figure>
                </div>
            </div>
            <div class="col-lg-8 col-xxl-6">
                <div class="form-header">
                    <h2>Make an order</h2>
                    <p>Step 1. Choose additional parameters</p>
                </div>
                <div class="form-main">


                    <?=  woocommerce_template_single_add_to_cart(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
