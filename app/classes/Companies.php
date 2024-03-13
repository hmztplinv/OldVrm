<?php

class Companies
{
public static function get_company($company_id){
    global $db;
    $query = $db->prepare("SELECT companyName FROM companies WHERE id=:id");
    $query->execute([
        'id' => $company_id
    ]);
    return $query->fetch(PDO::FETCH_ASSOC);
}
}