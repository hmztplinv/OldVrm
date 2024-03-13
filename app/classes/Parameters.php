<?php

class Parameters
{
public static function get_cost_types(){
    global $db;
    $query = $db->prepare("SELECT costTypeId,costTypeName FROM parameters WHERE costTypeId<>''");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
public static function get_cost_type($type_id){
    global $db;
    $query = $db->prepare("SELECT costTypeId,costTypeName FROM parameters WHERE costTypeId=:id");
    $query->execute([
        'id' => $type_id
    ]);
    return $query->fetch(PDO::FETCH_ASSOC)['costTypeName'];
}
public static function add_inventory_types_name($id,$name){
    global $db;
    $query = $db->prepare("INSERT INTO parameters SET inventoryTypeId=:id,inventoryTypeName=:name");
    $result = $query->execute([
        'id' => $id,
        'name' => $name
    ]);

    if ($result){
        $response['suc'] = "Tip adı başarıyla eklenmiştir.";
    }else{
        $response['err'] = "Tip adı eklenirken bir hata oluştu. Lütfen destek ekibine başvurunuz.";
    }
    return $response;
}
public static function get_parameters($id,$name){
    global $db;
    $query = $db->prepare("SELECT ".$id.",".$name." FROM parameters WHERE ".$id."<>''");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
public static function get_inventory_brands($tag){
    global $db;
    $query = $db->prepare("SELECT inventoryBrandId,inventoryBrandName FROM parameters WHERE inventoryBrandTag=:tag");
    $query->execute([
        'tag' => $tag
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
public static function get_inventory_models($brand){
    global $db;
    $query = $db->prepare("SELECT inventoryModelId,inventoryModelName FROM parameters WHERE inventoryModelTag=:tag");
    $query->execute([
        'tag' => $brand
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
public static function specific_parameter($id,$name,$value){
    global $db;
    $query = $db->prepare("SELECT ".$name." FROM parameters WHERE ".$id."=:value");
    $query->execute([
        'value' => $value
    ]);
    return $query->fetch(PDO::FETCH_ASSOC);
}
    public static function get_parameters_country( ){
        global $db;
        $query = $db->prepare("SELECT nationalityCode,nationalityName FROM `parameters`");
        $query->execute([

        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}