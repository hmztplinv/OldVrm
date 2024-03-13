<?php

class api
{
public static function get_balance(){

    $token = self::get_token();
    $url = "https://test-api.finekra.com/api/TenantAccount";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Accept: application/json",
        "Authorization: Bearer ".$token,
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $resp = curl_exec($curl);
    curl_close($curl);
    $resp = json_decode($resp,true);
    return $resp;
}
public static function get_token(){
    $login = array(
        "email" => "api_test@polynomtech.com",
        "password" => "Api1234",
        "tenantCode" => "6299079474",
        "screenOption" => "0",
        "securityKey" => ""
    );

    $login_string = json_encode($login);

    $ch = curl_init('https://test-api.finekra.com/api/Auth/DealerLogin');
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
public static function get_detail($urlString = ''){
    $token = self::get_token();

    $url = "https://test-api.finekra.com/api/AccountTransaction".$urlString;

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
    $response = json_decode($response,true);

    return @$response['value'];
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
    $response = json_decode($response,true);

    return $response;
}
}
