<?php

class Sms
{
public static function send_sms($content,$customer_number){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sms.kobikom.com.tr/api/message/send?api_token='.SMSTOKEN.'&to='.$customer_number.'&from='.SMSTITLE.'&message=testesajıdır',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

}
}