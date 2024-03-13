<?php
if (session('auth')['accountSub']['accountTransfer'] != 0){
    $payments = api::API_url("https://test-api.finekra.com/api/Payment");
//damp($payments);
    $list_iban = [];

    foreach ($payments['value'] as $payment){
        $list_bank['bankName'][] = explode(".",explode("/",$payment['bankLogo'])[5])[0];
        $list_bank['bankId'][] = $payment['bankId'];
        if (!in_array($payment['iban'],$list_iban)){
            $list_iban[] = $payment['iban'];
        }
    }

    $list_bank['bankName'] = array_unique($list_bank['bankName']);
    $list_bank['bankId'] = array_unique($list_bank['bankId']);
    $list_bank['bankName'] = array_values($list_bank['bankName']);
    $list_bank['bankId'] = array_values($list_bank['bankId']);

//damp($list_bank);
    require view('odeme_islemleri');
}else{
    header("Location:".site_url('yetkisiz'));
}
