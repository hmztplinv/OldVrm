<?php

$waitingOvertimes = Hr::get_overtimes_manager(3);
$acceptedOvertimes = Hr::get_overtimes_manager(1);
$rejectedOvertimes = Hr::get_overtimes_manager(2);
//damp($acceptedOvertimes);
if (post('id')){
    $response = Hr::set_status(post('id'),post('approval'));
    damp(json_encode($response,true));
}
require view("overtime_manager");