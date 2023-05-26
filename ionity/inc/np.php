<?php

use LisDev\Delivery\NovaPoshtaApi2;



function get_cities($key) {

    $np = new NovaPoshtaApi2('63ff84977350e47bab0e207c2eb41263');

    $result = $np->getCities('', $key);

    if ($result['data']) {
        foreach ($result['data'] as $city) {
            $cities[] = [
                'label' => $city['Description']. ' (' . $city['AreaDescription'] . ')',
                'value' => $city['Ref'],
                ];
        }
    }

    return $cities;

}

function get_warehouses($key) {

    $np = new NovaPoshtaApi2('63ff84977350e47bab0e207c2eb41263');
    $result = $np->getWarehouses(  $key);


   // print_r($np->getCities('', 'Запоро'););
//    print_r($result['data']);
//
//    die();
    if ($result['data']) {
        foreach ($result['data'] as $warehouse) {

            if ($warehouse['CategoryOfWarehouse'] == 'Postomat')
                continue;

            $warehouses[] = '<option value="'.$warehouse['Number'].'">#'.$warehouse['Number'].' - '.$warehouse['ShortAddress'].'</option>';

        }
    }

    return $warehouses;

}
