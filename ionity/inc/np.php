<?php

use LisDev\Delivery\NovaPoshtaApi2;


function get_cities0() {

    $np = new NovaPoshtaApi2('63ff84977350e47bab0e207c2eb41263');

    $result = $np->getCities('', 'Запор');




    return $result;

}

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

    $np = new NovaPoshtaApi2($key);
    $result = $np->getWarehouses(  $key);
    if ($result['data']) {
        foreach ($result['data'] as $warehouse) {
            $warehouses[] = '<option value="'.$warehouse['SiteKey'].'">'.$warehouse['SiteKey'].' - '.$warehouse['Description'].'</option>';

        }
    }

    return $warehouses;

}
