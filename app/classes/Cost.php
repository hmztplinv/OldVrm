<?php

class Cost
{
    public static function get_cost_officer()
    {
        global $db;
        $array = json_decode(session('selectedCompany'), true);
        $topresult = [];

        foreach ($array as $selectedcompany) {
            $query = $db->prepare("SELECT userid,name FROM auth INNER JOIN users ON users.id=auth.userid WHERE auth.companyid=:companyid AND auth.costAdmin=1");
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
    public static function create_cost($cost){
        global $db;
        $query = $db->prepare("INSERT INTO administrative_cost SET user_id=:user_id,company_id=:company_id,officer_id=:officer_id,date=:date,cost_type=:cost_type,amount=:amount,description=:description");
        return $query->execute($cost);
    }
    public static function get_costs($user_id,$status="")
    {
        if ($status != ""){
            $sql = " AND status=".$status;
        }else{
            $sql = "";
        }
        global $db;
        $query = $db->prepare("SELECT * FROM administrative_cost WHERE user_id=:user_id ".$sql." ORDER BY created_at DESC");
        $query->execute([
            'user_id' => $user_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function set_status($costId,$status){
        global $db;
        $query = $db->prepare("UPDATE administrative_cost SET status=:status WHERE id=:id");
        $result = $query->execute([
            'status' => $status,
            'id' => $costId
        ]);
        if ($status == 4){
            if ($result){
                $response['suc'] = "Fazla mesai talebiniz başarıyla silinmiştir.";
            }else{
                $response['err'] = "Fazla mesai talebiniz silinirken bir hata oluştu. Lütfen destek ekibine başvurunuz.";
            }
        }elseif($status == 1){
            if ($result){
                $response['suc'] = "Fazla mesaiyi kabul ettiniz.";
            }else{
                $response['err'] = "Lütfen destek ekibine başvurunuz.";
            }
        }elseif ($status == 2){
            if ($result){
                $response['suc'] = "Fazla mesaiyi reddettiniz.";
            }else{
                $response['err'] = "Lütfen destek ekibine başvurunuz.";
            }
        }

        return $response;
    }
    public static function get_cost_manager($status = ""){
        if ($status != ""){
            $sql = " AND status=".$status." ORDER BY created_at DESC";
        }else{
            $sql = " ORDER BY created_at DESC";
        }
        global $db;
        $query = $db->prepare("SELECT * FROM administrative_cost WHERE officer_id=:officer_id ".$sql);
        $query->execute([
            'officer_id' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
}