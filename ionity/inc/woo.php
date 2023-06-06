<?php
include 'np.php';

$actions = [

    'add_to_cart',
    'get_cities_np',
    'get_warehouses_np',
    'payment_request',
    'payment_processing'

];
foreach ($actions as $action) {
    add_action("wp_ajax_{$action}", $action);
    add_action("wp_ajax_nopriv_{$action}", $action);
}

/**
 * add_to_cart
 */


function add_to_cart()
{

    WC()->cart->empty_cart();

    $product_id = (int)$_GET['product_id'];
    $variation_id = (int)$_GET['variation_id'];
    $qty = $_GET['qty'] > 0 ? (int)$_GET['qty'] : 1;
    $added = WC()->cart->add_to_cart($product_id, $qty, $variation_id);

    $_SESSION['val'] = (int)$_GET['holders'] * $qty ;


    wp_send_json(
        [
            'url' => get_permalink(541),
        ]
    );


    wp_die();
}

add_action('woocommerce_cart_calculate_fees', 'woo_add_cart_fee');

function woo_add_cart_fee() {
    session_start();
    $extracost = $_SESSION['val'];
    WC()->cart->add_fee( 'Holder', $extracost);
}


function get_cities_np() {
    $search = $_GET['search'];
    $response = get_cities($search);
    echo  json_encode($response);
    wp_die();
}


function get_warehouses_np() {
    $search = $_GET['city'];
    $response = get_warehouses($search);
    echo  implode('', $response);
    wp_die();
}

function payment_request() {


    $method = $_POST['shipping_method'][0];

    if ($method === 'local_pickup:2') {
        $address_2 =  __('Nova Poshta #', 'ioniti') .$_POST['branch'];
        $method_title = __('Self-checkout', 'ioniti');
    }
    else {
        $address_2 =  __('House ', 'ioniti') . $_POST['shipping_address_2'] . ', ' . __('Apartment ', 'ioniti') . $_POST['shipping_apartment'];
        $method_title = __('By courier', 'ioniti');
    }


    $address = array(
        'first_name' => $_POST['billing_first_name'],
        'email'      => $_POST['billing_email'],
        'phone'      => $_POST['billing_phone'],
        'address_1'  => $_POST['shipping_address_1'],
        'address_2'  => $address_2,
        'city'       => $_POST['shipping_city'],
        'country'    => 'UA'
    );

    // Now we create the order
    $order = wc_create_order();


    foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
        $item_id = $order->add_product(
            $values['data'], $values['quantity'], array(
                'variation' => $values['variation'],
                'totals' => array(
                    'subtotal' => $values['line_subtotal'],
                    'subtotal_tax' => $values['line_subtotal_tax'],
                    'total' => $values['line_total'],
                    'tax' => $values['line_tax'],
                    'tax_data' => $values['line_tax_data'] // Since 2.2
                )
            )
        );
    }



    if ($_POST['holder']) {
        $fee = new WC_Order_Item_Fee();
        $fee->set_name( 'Holders' );
        $fee->set_amount( $_POST['holder']);
        $fee->set_total( $_POST['holder'] );
        $order->add_item( $fee );

    }



    $order->set_address( $address, 'billing' );
    $order->set_address( $address, 'shipping' );

    $shipping = new WC_Order_Item_Shipping();
    $shipping->set_method_title( $method_title );
    $shipping->set_method_id($method );
    $shipping->set_total( 0 );

    $order->add_item( $shipping );

    $total = $order->calculate_totals();
    $order->update_status("Pending", '', TRUE);


    $public_key = 'sandbox_i87646462385';
    $private_key = 'sandbox_5kJMR5GxnTknVGWC3YwMMBMimXQCpOOsemw1WO3i';

    $card_exp_month = explode('/', $_POST['cardDate']);
    $liqpay = new LiqPay($public_key, $private_key);
    $res = $liqpay->api("request", array(
        'action'         => 'pay',
        'version'        => '3',
        'phone'          => $_POST['billing_phone'],
        'amount'         =>$total,
        'currency'       => 'USD',
        'description'    => 'Ionity order',
        'order_id'       => $order->get_id(),
        'card'           => $_POST['cardNum'],
        'card_exp_month' => $card_exp_month[0],
        'card_exp_year'  => $card_exp_month[1],
        'card_cvv'       => $_POST['cvv'],
        'server_url' => admin_url('admin-ajax.php') . '?action=payment_processing'
    ));

    $order_received_url = wc_get_endpoint_url( 'order-received', $order->get_id(), wc_get_checkout_url() );
    $res = (array)$res;
    $res['success_url'] = $order_received_url;

    wp_send_json($res);

    wp_die();
}

function payment_processing() {

    $public_key = 'sandbox_i87646462385';
    $private_key = 'sandbox_5kJMR5GxnTknVGWC3YwMMBMimXQCpOOsemw1WO3i';
    $liqpay = new LiqPay($public_key, $private_key);

    $data = $_POST['data'];
    $result = $liqpay->decode_params($data);


    if ($result['status'] === 'success') {
        $order = new WC_Order($result['order_id']);
        $order->update_status("processing", http_build_query($result,'','<br> '), TRUE);
    }




    wp_die();

}
