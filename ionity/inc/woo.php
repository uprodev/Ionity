<?php
include 'np.php';

$actions = [

    'add_to_cart',
    'get_cities_np',
    'get_warehouses_np'

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

    wp_send_json(
        [
            'url' => get_permalink(541),
        ]
    );


    wp_die();
}


function get_cities_np() {
    $search = $_GET['search'];
    $response = get_cities($search);
    echo  json_encode($response);
    wp_die();
}


function get_warehouses_np() {
    $search = $_GET['ref'];
    $response = get_warehouses($search);
    echo  implode('', $response);
    wp_die();
}
