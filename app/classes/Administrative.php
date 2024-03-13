<?php

class Administrative
{
public static function get_officer(){
    global $db;
    $array = json_decode(session('selectedCompany'), true);
    $topresult = [];

    foreach ($array as $selectedcompany) {
        $query = $db->prepare("SELECT userid,name FROM auth INNER JOIN users ON users.id=auth.userid WHERE auth.companyid=:companyid AND auth.inventoryAdmin=1");
        $query->execute([
            'companyid' => $selectedcompany['id']
        ]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!in_array($result, $topresult)) {
            $topresult[] = $result;
        }
    }

    return $topresult[0];
}
    public static function get_inventory_owners($department){
        global $db;
        $query = $db->prepare("SELECT users.id,users.name FROM users INNER JOIN auth on auth.userid=users.id WHERE auth.department=:department");
        $query->execute([
            'department' => $department
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public static function add_inventory($inventory){
    global $db;
    $query = $db->prepare("INSERT INTO administrative_inventory SET user_id=:user_id,officer_id=:officer_id,owner_id=:owner_id,type_id=:type_id,brand_id=:brand_id,model_id=:model_id,department_id=:department_id,amount=:amount,purchase_date=:purchase_date");
    return $query->execute($inventory);
    }
    public static function get_inventories($user_id,$status=""){
        if ($status != ""){
            $sql = " AND status=".$status;
        }else{
            $sql = "";
        }
        global $db;
        $query = $db->prepare("SELECT * FROM administrative_inventory WHERE user_id=:user_id ".$sql." ORDER BY created_at DESC");
        $query->execute([
            'user_id' => $user_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_inventories_manager($status = ""){
        if ($status != ""){
            $sql = " AND status=".$status." ORDER BY created_at DESC";
        }else{
            $sql = " ORDER BY created_at DESC";
        }
        global $db;
        $query = $db->prepare("SELECT * FROM administrative_inventory WHERE officer_id=:officer_id ".$sql);
        $query->execute([
            'officer_id' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function set_status($id,$status){
        global $db;
        $query = $db->prepare("UPDATE administrative_inventory SET status=:status WHERE id=:id");
        $result = $query->execute([
            'status' => $status,
            'id' => $id
        ]);
        if($status == 1){
            if ($result){
                $response['suc'] = "Envanteri kabul ettiniz.";
            }else{
                $response['err'] = "Lütfen destek ekibine başvurunuz.";
            }
        }elseif ($status == 2){
            if ($result){
                $response['suc'] = "Envanteri reddettiniz.";
            }else{
                $response['err'] = "Lütfen destek ekibine başvurunuz.";
            }
        }


        return $response;
    }
}