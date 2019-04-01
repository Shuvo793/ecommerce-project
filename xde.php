<?php

$array=[
    "id"=>[
        "Quantity"=>1,
        "totla-price"=>200
    ]
];
$array['id']['cupon-code']=12;
var_dump($array);
echo $array['id']['Quantity'];