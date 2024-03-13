<?php

class api
{

public static function get_balance(){

    $token = self::get_token();

    $subUrl = "?\$filter=tenantVknTckn%20in(";
    $selectedCompanies = json_decode(session('selectedCompany'),true);

    foreach ($selectedCompanies as $item){
        if (is_array($item))
        $subUrl .= "'".$item["vkn"]."',";
    }
    $subUrl = rtrim($subUrl,",");
    $subUrl .= ")";

    $url = baseUrl."/TenantAccount".$subUrl;

    //damp($url);

//    echo $url;
//    damp($token);
//    echo "<br>";
    $curl = curl_init($url);
//damp($url);
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token,
    'isConsolidated:true'
  ),
));
    $resp = curl_exec($curl);
    curl_close($curl);
	
	
    $resp = json_decode($resp,true);
//damp($resp);
    return $resp;
}
    public static function get_seperate_balance($company){

        $token = self::get_token();

        $subUrl = "?\$filter=tenantVknTckn%20in(";
        $selectedCompanies = $company;

        foreach ($selectedCompanies as $item){
            if (is_array($item))
                $subUrl .= "'".$item["vkn"]."',";
        }
        $subUrl = rtrim($subUrl,",");
        $subUrl .= ")";

        $url = baseUrl."/TenantAccount".$subUrl;

//    echo $url;
//    damp($token);
//    echo "<br>";
        $curl = curl_init($url);

        curl_setopt_array($curl, array(

            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token,
                'isConsolidated:true'
            ),
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($resp,true);
//damp($resp);
        return $resp;
    }
public static function get_token(){
    $login = array(
            "email" => "api-finekra@qtech.com.tr",
            "password" => "IS5OD9YLGSjAIIqy",
            "tenantCode" => "1700621759",
            "screenOption" => "0",
            "securityKey" => ""
    );

    $login_string = json_encode($login);
    $ch = curl_init(baseUrl.'/Auth/DealerLogin');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $login_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json;odata.metadata=minimal;odata.streaming=true',
            'Content-Length: ' . strlen($login_string))
    );

    $result = curl_exec($ch);

    $token = json_decode($result,true)['data']['token'];

//print_r($token);
    curl_close($ch);
 
    return $token;
}

public static function set_tenant ($tenant){
    $ch = curl_init();
    $headers  = [
        'Content-Type: application/json'
    ];
    $postData = [
        'name' => $tenant['name'],
        'vkn' => $tenant['vkn'],
        'address'=>$tenant['address'],
        'tenantPhoneNumber'=>$tenant['tenantPhoneNumber'],
        'businessPartnerId'=>'8C76E7A7-8769-ED11-A2D0-005056B667E2',
        'moduleIds'=>[1,6],
        'firstName'=>'info',
        'lastName'=>'info@qtech.com.tr',
        'phoneNumber'=>'5555555555'
    ];
    curl_setopt($ch, CURLOPT_URL,"https://polynom-api.finekra.com/api/Tenant");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result     = curl_exec ($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return $statusCode;
    }


public static function get_detail($urlString = '',$skip=""){

    if ($urlString == ""){
        $subUrl = "?\$filter=tenantVknTckn%20in(";
    }else{
        $subUrl = "%20and%20tenantVknTckn%20in(";
    }
    $selectedCompanies = json_decode(session('selectedCompany'),true);

    foreach ($selectedCompanies as $item){
        if (is_array($item))
            $subUrl .= "'".$item["vkn"]."',";
    }
    $subUrl = rtrim($subUrl,",");
    $subUrl .= ")";

    $token = self::get_token();
	if ($skip == ""){
        $url = baseUrl."/AccountTransaction".$urlString.$subUrl;

    }else{
        $url = $skip;
    }

//    print_r($url);
//    echo "<br>";

    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token,
            'isConsolidated:true'
        )
    ));
	
    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response,true);

    return @$response;
}
public static function get_vkn_list(){
    $list_vkn = [];
    $details = self::get_detail();
    foreach ($details as $detail){
        if (!in_array($detail['vkn'],$list_vkn) && $detail['vkn'] != ''){
            $list_vkn[] = $detail['vkn'];
        }
    }
    return $list_vkn;
}
public static function API_url($url){
    $token = self::get_token();
   
    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

}
