<?php

if (session('auth')['administrativeSub']['administrativeInventory'] == "0"){
    header("Location:".site_url('yetkisiz'));
}

if (auth::get_auth(session('user_id'))[0]['inventoryAdmin'] == "1"){
    header("Location:".site_url('inventory_manager'));
}
$typeNames = Parameters::get_parameters("inventoryTypeId","inventoryTypeName");
$officers = Administrative::get_officer();
$departments = Parameters::get_parameters("departmentId","departmentName");
$acceptedInventory = Administrative::get_inventories(session('user_id'),1);
$rejectedInventory = Administrative::get_inventories(session('user_id'),2);
$waitingInventory = Administrative::get_inventories(session('user_id'),3);

if (post('department')){
    $owners = Administrative::get_inventory_owners(post('department'));
    damp(json_encode($owners,true));
}

if (post('type')){
//    damp(post('type'));
    $brands = Parameters::get_inventory_brands(post('type'));
    damp(json_encode($brands,true));
}

if (post('brand')){
    $models = Parameters::get_inventory_models(post('brand'));
    damp(json_encode($models),true);
}

if (post('createinventory')){
    $inventory = [
        'user_id' => session('user_id'),
        'officer_id' => post('approval'),
        'owner_id' => post('owner'),
        'type_id' => post('typeName'),
        'brand_id' => post('brandName'),
        'model_id' => post('modelName'),
        'department_id' => post('departmentName'),
        'amount' => post('amount'),
        'purchase_date' => post('purchase')
    ];

    $result = Administrative::add_inventory($inventory);

    if ($result){
        $response['suc'] = "Envanter ekleme başarıyla iletilmiştir.";
    }else {
        $response['err'] = "Envanter eklenirken bir hata ile karşılaştık. Lütfen teknik ekibe başvurun.";
    }

}
require view('inventory');