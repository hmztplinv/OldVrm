<?php

class Sms
{
public static function send_sms($content,$customer_number){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sms.kobikom.com.tr/api/message/send?api_token='.SMSTOKEN.'&to='.$customer_number.'&from='.SMSTITLE.'&message='.urlencode($content),
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
//    echo $response;

}
public static function convert_number($number){
    //code
    $gsm='90'.$number;

    //code end
    return $gsm;
}
public static function create_sms_log_complaint_sent($phone)
{
    global $db;
    $query = $db->prepare("INSERT INTO log_sms(complaintId,status,content,createdAt,phone) values((SELECT id FROM complaint ORDER BY id DESC LIMIT 1),6,'Şikayet Oluşturuldu, Sms Gönderildi',:createdAt,:phone)");
    $query->execute([
        'phone' => $phone,
        'createdAt' => date("Y-m-d H:i:s")
    ]);
}
    public static function create_sms_log_complaint_sent_by_complaintid($phone,$complaintid)
    {
        global $db;
        $query = $db->prepare("INSERT INTO log_sms(complaintId,status,content,createdAt,phone) values(:complaintId,1,'Şikayet Sonuçlandı, Sms Gönderildi',:createdAt,:phone)");
        $query->execute([
            'phone' => $phone,
            'createdAt' => date("Y-m-d H:i:s"),
            'complaintId'=>$complaintid
        ]);
    }

}
