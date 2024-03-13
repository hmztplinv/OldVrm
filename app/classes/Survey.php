<?php

class Survey
{
public static function surveyComplaintControl($complaintId){
    global $db;
    $query = $db->prepare("SELECT id FROM complaint WHERE id=:id AND status=1");
    $query->execute([
        'id' => $complaintId
    ]);
    if ($query->fetch(PDO::FETCH_ASSOC)){
        return true;
    }else{
        return false;
    }
}
public static function surveyActiveControl($complaintId){
    global $db;
    $query = $db->prepare("SELECT id FROM surveys WHERE complaintID=:cid");
    $query->execute([
        'cid' => $complaintId
    ]);
    if ($query->fetch(PDO::FETCH_ASSOC)){
        return false;
    }else{
        return true;
    }
}
    public static function survey_exist($complaint_id)
    {
        global $db;
        $query = $db->prepare("SELECT id FROM surveys WHERE complaintID=:cid");
        $query->execute([
            'cid' => $complaint_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_companyid_by_complaint_id($complaint_id)
    {
        global $db;
        $query = $db->prepare("SELECT companyId FROM complaint WHERE id=:cid");
        $query->execute([
            'cid' => $complaint_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['companyId'];
    }
public static function saveSurvey($survey){
    global $db;
    $query = $db->prepare("INSERT INTO surveys SET complaintID=:complaint,question1=:q1,question2=:q2,question3=:q3,question4=:q4,question5=:q5,question6=:q6,question7=:q7,sum_survey=(:q1+:q2+:q3+:q4+:q5+:q6),companyId=:companyid");
    $result = $query->execute($survey);
    return $result;
}
}
