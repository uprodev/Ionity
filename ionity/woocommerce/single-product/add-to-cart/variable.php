<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );


do_action( 'woocommerce_before_add_to_cart_form' ); ?>

    <form action="#">
        <div class="form-product">
            <div class="product-preview">
                <img class="lazy" data-src="<?=  $image  ?>"
                     srcset="<?= $srcset ?>" alt="" />
            </div>
            <div class="product-header" data-title="<?= $product->get_name() ?>">
                <span class="icon"><img src="<?= get_template_directory_uri() ?>/assets/img/noir-logo-duo.svg" alt="" /></span>
                Noir <strong><?= $product->get_sku() ?></strong>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <div class="product-number">
                    <button type="button" class="product-number-more">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 13H13V17H11V13H7V11H11V7H13V11H17M12 2C10.6868 2 9.38642 2.25866 8.17317 2.7612C6.95991 3.26375 5.85752 4.00035 4.92893 4.92893C3.05357 6.8043 2 9.34784 2 12C2 14.6522 3.05357 17.1957 4.92893 19.0711C5.85752 19.9997 6.95991 20.7362 8.17317 21.2388C9.38642 21.7413 10.6868 22 12 22C14.6522 22 17.1957 20.9464 19.0711 19.0711C20.9464 17.1957 22 14.6522 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7362 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2Z" fill="#969696" />
                        </svg>
                    </button>
                    <input type="text" name="quantity" value="1" pattern="[0-9]+" />
                    <button type="button" class="product-number-less" disabled>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 13H7V11H17M12 2C10.6868 2 9.38642 2.25866 8.17317 2.7612C6.95991 3.26375 5.85752 4.00035 4.92893 4.92893C3.05357 6.8043 2 9.34784 2 12C2 14.6522 3.05357 17.1957 4.92893 19.0711C5.85752 19.9997 6.95991 20.7362 8.17317 21.2388C9.38642 21.7413 10.6868 22 12 22C14.6522 22 17.1957 20.9464 19.0711 19.0711C20.9464 17.1957 22 14.6522 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7362 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2Z" fill="#969696" />
                        </svg>
                    </button>
                </div>
                <div class="product-price"></div>
            </div>
        </div>
        <div class="form-product-options variations">
            <ul>

                <?php foreach ( $attributes as $attribute_name => $options ) {  ?>
                    <li>
                        <div class="title"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></div>
                        <div class="options-list">
                            <div class="d-flex">

                                <?php
                                $terms = wc_get_product_terms(
                                    $product->get_id(),
                                    $attribute_name,
                                    array(
                                        'fields' => 'all',
                                    )
                                );
                                foreach ($terms as $term) {
                                    $default = $product->get_variation_default_attribute($attribute_name);
                                    $holder = get_field('holder', $term);
                                    ?>
                                    <div class="radio-holder <?= $term->taxonomy === 'pa_montage' ? 'montage' : 'connector'  ?>-selection">
                                        <input <?php checked($default, $term->slug) ?> type="radio" data-name="<?= $term->taxonomy ?>" id="<?= $attribute_name ?>_<?= $term->slug ?>" name="attribute_<?= $attribute_name ?>" value="<?= $term->slug ?>"  />
                                        <label for="<?= $attribute_name ?>_<?= $term->slug ?>">

                                            <?php if ($term->description) { ?>
                                                <span><?= $term->name ?></span>
                                                <p><?= __('Max power', 'ionity') ?><span><?= $term->description ?> kWt</span></p>
                                            <?php } else { ?>
                                                <?= $term->name ?>
                                            <?php } ?>

                                        </label>

                                        <?php if ($holder > 0) { ?>
                                        <div class="checkbox-holder">
                                            <input class="holder" type="checkbox" name="holder[]" id="check<?= $term->taxonomy ?>" value="<?= $holder ?>">
                                            <label for="check<?= $term->taxonomy ?>"><?= __('Add a holder', 'ionity') ?></label>
                                        </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </li>
                <?php } ?>

            </ul>
        </div>
        <div class="form-product-selected">
            <ul>
                <li>
                    <div class="title"><?= __('My order', 'ionity') ?></div>
                    <div class="options-list">

                    </div>
                </li>
            </ul>
        </div>
        <div class="form-product-total">
            <ul>
                <li>
                    <div class="title"><?= __('Total', 'ionity') ?></div>
                    <div class="price-total"></div>
                </li>
            </ul>
        </div>
        <div class="form-buttons">
            <button data-product_id="<?= $product->get_id() ?>" data-qty="1" data-variation_id="" type="submit" class="add-to-cart btn btn-light"><?= __('continue', 'ionity') ?></button>
            <a href="#"><?= __('Back', 'ionity') ?></a>
        </div>
    </form>


<form  style="display: none !important;" class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0" role="presentation">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<th class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></th>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>

		<div class="single_variation_wrap" >
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
