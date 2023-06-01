<?php

use LisDev\Delivery\NovaPoshtaApi2;



function get_cities($key) {
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );


    $result = request('Address', 'searchSettlements',
        $params = [
            "CityName" => $key,
            "Limit" => "50",

        ]);

    $result = json_decode($result, 1);



    if ($result['data']) {

        foreach ($result['data'][0]['Addresses'] as $city) {

            $MainDescription = $city['MainDescription'];
            $city_details  = $city['Area']  ;
            $city_details  .= $city['Region'] ? ', '. $city['Region'] : ''  ;
            $details = $city_details;

//            if ($my_current_lang == 'en') {
//                $MainDescription = translit($MainDescription);
//                $details_en = translit($details);
//            }

            if ($city['Warehouses'] > 0)
                $cities[] = [
                    'label' => $MainDescription. ' (' . $details .')',
                    'value' => $city['DeliveryCity'],
              //      'label_en' => $MainDescription_en. ' (' . $details_en .')',
                    ];
        }
    }

    //DeliveryCity

//    echo '<pre>';
//    print_r($cities );
//
//    die();
    return $cities;

}

function get_warehouses($key) {

    $np = new NovaPoshtaApi2('63ff84977350e47bab0e207c2eb41263');
    $result = $np->getWarehouses(  $key);

    $warehouses[] =  '<option value="0">'. __('Select Branch number', 'ionity') .'</option>';

    if ($result['data']) {
        foreach ($result['data'] as $warehouse) {

            if ($warehouse['CategoryOfWarehouse'] == 'Postomat')
                continue;

            $warehouses[] = '<option value="'.$warehouse['Number'].'">#'.$warehouse['Number'].' - '.$warehouse['ShortAddress'].'</option>';

        }
    }

    return $warehouses;

}


function request($model, $method, $params = null)
{
    // Get required URL
    $url = 'https://api.novaposhta.ua/v2.0/json/';

    $data = array(
        'apiKey' => '63ff84977350e47bab0e207c2eb41263',
        'modelName' => $model,
        'calledMethod' => $method,
        'language' => 'ua',
        'methodProperties' => $params,
    );
    $result = array();
    // Convert data to neccessary format
    $post =  json_encode($data);


        $ch = curl_init($url);
        if (is_resource($ch)) {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: '.('xml' == 2 ? 'text/xml' : 'application/json')));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);



            $result = curl_exec($ch);
            curl_close($ch);
        }

    return  ($result);
}

function translit($s) {
    return transliterator_transliterate('Any-Latin; Latin-ASCII', $s);
}
