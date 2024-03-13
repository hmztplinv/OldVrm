<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);






if ( $xls = \Shuchkin\SimpleXLSX::parse('BienSeramik.xlsx')) {
    $rows = $xls->rows();
    //print_r($rows);
    for ($i=1;$i<count($rows);$i++){
        echo "<br>".$i."<br>";
        echo setClient($rows[$i][1],$rows[$i][2],$rows[$i][3]);
    }



} else {
    echo "dsa". SimpleXLS::parseError();
}


function setClient($companyname,$contactname,$email){

    $query = @$db->prepare("INSERT INTO complaintseramikproducts SET name=:name,sizes=:sizes,colors=:colors");
    return $query->execute([
        'name' => $companyname,
        'sizes' => $contactname,
        'colors' => $email
    ]);
}