<?php

$data = [
    'user_id' => 19 ,//TODO: session('user_id')
    'car_year' => 2005,
    'brand_id' => 4,
    'modal_id' => 2,
    'plaka' => "09 FD 0648"
];

$res = car::add_car($data);
echo $res;