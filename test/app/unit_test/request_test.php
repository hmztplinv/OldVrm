<?php
$data = [
    'user_id' => 3, //TODO: session('user_id')
    'car_id' => 3,  //TODO:from selectbox
    'issue' => "Title",
    'description' => "content",
    'pic_id' => 0   //TODO:is exist picture get lastInsertID from fileUpload class
];
$res = request::create_request($data);
echo $res;