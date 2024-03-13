<?php

class Hr
{
    public static function get_approval_officer()
    {
        global $db;
        $array = json_decode(session('selectedCompany'), true);
        $topresult = [];

        foreach ($array as $selectedcompany) {
            $query = $db->prepare("SELECT userid,name FROM auth INNER JOIN users ON users.id=auth.userid WHERE auth.companyid=:companyid AND auth.overtimeAdmin=1");
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


    public static function create_overtime($overtime)
    {
        global $db;
        $query = $db->prepare("INSERT INTO hremployee_overtime SET user_id=:user_id,company_id=:company_id,officer_id=:officer_id,date=:date,starttime=:starttime,finishtime=:finishtime,comment=:comment");
        return $query->execute($overtime);
    }

    public static function get_overtimes($user_id,$status="")
    {
        if ($status != ""){
            $sql = " AND status=".$status;
        }else{
            $sql = "";
        }
        global $db;


        $query = $db->prepare("SELECT * FROM hremployee_overtime WHERE user_id=:user_id".$sql." ORDER BY created_at DESC");
        $query->execute([
            'user_id' => $user_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_overtimes_manager($status = ""){
        if ($status != ""){
            $sql = " AND status=".$status." ORDER BY created_at DESC";
        }else{
            $sql = " ORDER BY created_at DESC";
        }
        global $db;
        $query = $db->prepare("SELECT * FROM hremployee_overtime WHERE officer_id=:officer_id ".$sql);
        $query->execute([
            'officer_id' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public static function get_status($status){
        global $db;
        $query = $db->prepare("SELECT overtimeStatusCode,overtimeStatusName FROM parameters WHERE overtimeStatusCode=:code");
        $query->execute([
            'code' => $status
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function set_status($overtimeId,$status){
        global $db;
        $query = $db->prepare("UPDATE hremployee_overtime SET status=:status WHERE id=:id");
        $result = $query->execute([
            'status' => $status,
            'id' => $overtimeId
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
}