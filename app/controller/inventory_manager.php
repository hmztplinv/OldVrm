<?php

$acceptedInventory = Administrative::get_inventories_manager(1);
$rejectedInventory = Administrative::get_inventories_manager(2);
$waitingInventory = Administrative::get_inventories_manager(3);
//damp($waitingInventory);
if (post('id')){
    $response = Administrative::set_status(post('id'),post('approval'));
    damp(json_encode($response,true));
}
require view('inventory_manager');