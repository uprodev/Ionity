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

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="block-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xxl-6 d-none d-lg-block">
                <div class="form-image">
                    <figure>
                        <img class="lazy" data-src="assets/img/form-img.jpg" srcset="assets/img/form-img.jpg 1x, assets/img/form-img@2x.jpg 2x" alt="" />
                    </figure>
                </div>
            </div>
            <div class="col-lg-8 col-xxl-6">
                <div class="form-header">
                    <h2>Make an order</h2>
                    <p>Step 1. Choose additional parameters</p>
                </div>
                <div class="form-main">
                    <form action="#">
                        <div class="form-product">
                            <div class="product-preview">
                                <img class="lazy" data-src="assets/img/preview.png" srcset="assets/img/preview.png 1x, assets/img/preview@2x.png 2x" alt="" />
                            </div>
                            <div class="product-header">
                                <span class="icon"><img src="assets/img/noir-logo-duo.svg" alt="" /></span>
                                Noir <strong>eDuo</strong>
                            </div>
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="product-number">
                                    <button type="button" class="product-number-more">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 13H13V17H11V13H7V11H11V7H13V11H17M12 2C10.6868 2 9.38642 2.25866 8.17317 2.7612C6.95991 3.26375 5.85752 4.00035 4.92893 4.92893C3.05357 6.8043 2 9.34784 2 12C2 14.6522 3.05357 17.1957 4.92893 19.0711C5.85752 19.9997 6.95991 20.7362 8.17317 21.2388C9.38642 21.7413 10.6868 22 12 22C14.6522 22 17.1957 20.9464 19.0711 19.0711C20.9464 17.1957 22 14.6522 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7362 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2Z" fill="#969696" />
                                        </svg>
                                    </button>
                                    <input type="text" value="1" pattern="[0-9]+" />
                                    <button type="button" class="product-number-less" disabled>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 13H7V11H17M12 2C10.6868 2 9.38642 2.25866 8.17317 2.7612C6.95991 3.26375 5.85752 4.00035 4.92893 4.92893C3.05357 6.8043 2 9.34784 2 12C2 14.6522 3.05357 17.1957 4.92893 19.0711C5.85752 19.9997 6.95991 20.7362 8.17317 21.2388C9.38642 21.7413 10.6868 22 12 22C14.6522 22 17.1957 20.9464 19.0711 19.0711C20.9464 17.1957 22 14.6522 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7362 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2Z" fill="#969696" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="product-price">$1149</div>
                            </div>
                        </div>
                        <div class="form-product-options">
                            <ul>
                                <li>
                                    <div class="title">Montage</div>
                                    <div class="options-list">
                                        <div class="d-flex">
                                            <div class="radio-holder montage-selection">
                                                <input type="radio" id="m1" name="montage" value="wall" checked />
                                                <label for="m1">Wall</label>
                                            </div>
                                            <div class="radio-holder montage-selection">
                                                <input type="radio" id="m2" name="montage" value="stand" />
                                                <label for="m2">Stand</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Connector 1</div>
                                    <div class="options-list">
                                        <div class="d-flex">
                                            <div class="radio-holder connector-selection">
                                                <input type="radio" id="c11" name="connector1" value="Type 1 j1772" checked />
                                                <label for="c11">
                                                    <span>Type 1 j1772</span>
                                                    <p>Max power<span>7 kWt</span></p>
                                                </label>
                                                <div class="checkbox-holder">
                                                    <input type="checkbox" id="check1" />
                                                    <label for="check1">Add a holder</label>
                                                </div>
                                            </div>
                                            <div class="radio-holder connector-selection">
                                                <input type="radio" id="c12" name="connector1" value="Mennekes Type 2" />
                                                <label for="c12">
                                                    <span>Mennekes Type 2</span>
                                                    <p>Max power<span>22 kWt</span></p>
                                                </label>
                                            </div>
                                            <div class="radio-holder connector-selection">
                                                <input type="radio" id="c13" name="connector1" value="GB/T-AC" />
                                                <label for="c13">
                                                    <span>GB/T-AC</span>
                                                    <p>Max power<span>22 kWt</span></p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Connector 2</div>
                                    <div class="options-list">
                                        <div class="d-flex">
                                            <div class="radio-holder connector-selection">
                                                <input type="radio" id="c21" name="connector2" value="Type 1 j1772" />
                                                <label for="c21">
                                                    <span>Type 1 j1772</span>
                                                    <p>Max power<span>7 kWt</span></p>
                                                </label>
                                                <div class="checkbox-holder">
                                                    <input type="checkbox" id="check1" />
                                                    <label for="check1">Add a holder</label>
                                                </div>
                                            </div>
                                            <div class="radio-holder connector-selection">
                                                <input type="radio" id="c22" name="connector2" value="Mennekes Type 2" />
                                                <label for="c22">
                                                    <span>Mennekes Type 2</span>
                                                    <p>Max power<span>22 kWt</span></p>
                                                </label>
                                            </div>
                                            <div class="radio-holder connector-selection">
                                                <input type="radio" id="c23" name="connector2" value="GB/T-AC" checked />
                                                <label for="c23">
                                                    <span>GB/T-AC</span>
                                                    <p>Max power<span>22 kWt</span></p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="form-product-selected">
                            <ul>
                                <li>
                                    <div class="title">My order</div>
                                    <div class="options-list">
                                        <p>Station: NOIR eDuo</p>
                                        <p>Montage: Wall</p>
                                        <p>Connectors: Type 1 j1772 with holder, Mennekes Type 2</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="form-product-total">
                            <ul>
                                <li>
                                    <div class="title">Total</div>
                                    <div class="price-total">$1149</div>
                                </li>
                            </ul>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="btn btn-light">continue</button>
                            <a href="#">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
