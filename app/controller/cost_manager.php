<?php

$waitingCosts = Cost::get_cost_manager(3);
$acceptedCosts = Cost::get_cost_manager(session('user_id'),1);
$rejectedCosts = Cost::get_cost_manager(session('user_id'),2);
//damp($waitingCosts);
if (post('id')){
    $response = Cost::set_status(post('id'),post('approval'));
    damp(json_encode($response,true));
}

require view("cost_manager");