<?php

class Document
{
    public static function report_or_form_exist($complaintId,$status)
    {
        global $db;
        $query = $db->prepare("select * from complaint_document where complaintId=:complaintId and status=:status");
        $query->execute([
            'complaintId'=>$complaintId,
            'status'=>$status
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function set_report($complaint_id){
        global $db;
        $query = $db->prepare("insert into complaint_document SET complaintId=:complaintId,revise=1,createdAt=:createdAt,updatedAt=:updatedAt, status=2");
        $query->execute([
            'complaintId' => $complaint_id,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        ]);
    }
    public static function set_form($complaintId){
        global $db;
        $query = $db->prepare("insert into complaint_document SET complaintId=:complaintId,revise=1,createdAt=:createdAt,updatedAt=:updatedAt,status=1");
        $query->execute([
            'complaintId' => $complaintId,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        ]);
    }
    public static function update_report($complaintId){
        global $db;
        $query = $db->prepare("update complaint_document SET revise=revise+1,updatedAt=:updatedAt where status=2 and complaintId=:complaintId");
        $query->execute([
            'complaintId' => $complaintId,
            'updatedAt' => date('Y-m-d H:i:s')
        ]);
    }
    public static function update_form($complaintId){
        global $db;
        $query = $db->prepare("update complaint_document SET revise=revise+1,updatedAt=:updatedAt where status=1 and complaintId=:complaintId");
        $query->execute([
            'complaintId' => $complaintId,
            'updatedAt' => date('Y-m-d H:i:s')
        ]);
    }
}
