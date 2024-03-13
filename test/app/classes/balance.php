<?php

class balance
{
public static function list_bank($balance){

    $bankNames = [];

    foreach ($balance['value'] as $bal){
        if (!in_array($bal['bankName'],$bankNames)){
            array_push($bankNames,$bal['bankName']);
        }
    }
    return $bankNames;
}
public static function get_currency_total_balance($currency){
    $balance = api::get_balance();
    $list_bank = self::list_bank($balance);
    $total=0;
    foreach ($balance['value'] as $bal){
        if (in_array($bal['bankName'],$list_bank)){
            if ($bal['currencyId'] == $currency){
                $total += $bal['balance'];
            }
        }
    }

    return $total;
}
public static function get_bank_total_balance(){
    $balance = api::get_balance();
    $list_bank = self::list_bank($balance);

    $bank_total = [
        'isbank' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' => 0,
            'usd' => 0,
            'euro' => 0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'akbank' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'ziraat' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'garanti' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'yapikredi' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'vakifbank' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'kuveyttürk' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'finans' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
        'denizbank' => [
            'name' => "",
            'logo' => "",
            'bankId' => 0,
            'tl' =>0,
            'usd' =>0,
            'euro'=>0,
            'sterlin' => 0,
            'chf' => 0,
            'update' => "",
        ],
    ];

    foreach ($balance['value'] as $bal){

        switch ($bal['bankCode']){
            case $bal['bankCode'] == "0064":
                $bank_total['isbank']['name'] = $bal['bankName'];
                $bank_total['isbank']['logo'] = $bal['bankLogo'];
                $bank_total['isbank']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['isbank']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['isbank']['update'] =$bal['updateDateValue'];
                }

                if ($bal['currencyId'] == 1){
                    $bank_total['isbank']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['isbank']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['isbank']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                $bank_total['isbank']['sterlin']+=$bal['balance'];
            }if ($bal['currencyId'] == 9){
                $bank_total['isbank']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0046":

                $bank_total['akbank']['name'] = $bal['bankName'];
                $bank_total['akbank']['logo'] = $bal['bankLogo'];
                $bank_total['akbank']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['akbank']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['akbank']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['akbank']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['akbank']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['akbank']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['akbank']['sterlin']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 9){
                    $bank_total['akbank']['chf']+=$bal['balance'];
                }
                break;
            case $bal['bankCode'] == "0010":
                $bank_total['ziraat']['name'] = $bal['bankName'];
                $bank_total['ziraat']['logo'] = $bal['bankLogo'];
                $bank_total['ziraat']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['ziraat']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['ziraat']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['ziraat']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['ziraat']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['ziraat']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['ziraat']['sterlin']+=$bal['balance'];
                }if ($bal['currencyId'] == 9){
                $bank_total['ziraat']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0062":
                $bank_total['garanti']['name'] = $bal['bankName'];
                $bank_total['garanti']['logo'] = $bal['bankLogo'];
                $bank_total['garanti']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['garanti']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['garanti']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['garanti']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['garanti']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['garanti']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['garanti']['sterlin']+=$bal['balance'];
                }if ($bal['currencyId'] == 9){
                $bank_total['garanti']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0067":
                $bank_total['yapikredi']['name'] = $bal['bankName'];
                $bank_total['yapikredi']['logo'] = $bal['bankLogo'];
                $bank_total['yapikredi']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['yapikredi']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['yapikredi']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['yapikredi']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['yapikredi']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['yapikredi']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['yapikredi']['sterlin']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 9){
                $bank_total['yapikredi']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0015":
                $bank_total['vakifbank']['name'] = $bal['bankName'];
                $bank_total['vakifbank']['logo'] = $bal['bankLogo'];
                $bank_total['vakifbank']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['vakifbank']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['vakifbank']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['vakifbank']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['vakifbank']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['vakifbank']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['vakifbank']['sterlin']+=$bal['balance'];
                }if ($bal['currencyId'] == 9){
                $bank_total['vakifbank']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0205":
                $bank_total['kuveyttürk']['name'] = $bal['bankName'];
                $bank_total['kuveyttürk']['logo'] = $bal['bankLogo'];
                $bank_total['kuveyttürk']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['kuveyttürk']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['kuveyttürk']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['kuveyttürk']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['kuveyttürk']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['kuveyttürk']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['kuveyttürk']['sterlin']+=$bal['balance'];
                }if ($bal['currencyId'] == 9){
                $bank_total['kuveyttürk']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0111":
                $bank_total['finans']['name'] = $bal['bankName'];
                $bank_total['finans']['logo'] = $bal['bankLogo'];
                $bank_total['finans']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['finans']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['finans']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['finans']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['finans']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['finans']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['finans']['sterlin']+=$bal['balance'];
                }if ($bal['currencyId'] == 9){
                $bank_total['finans']['chf']+=$bal['balance'];
            }
                break;
            case $bal['bankCode'] == "0134":
                $bank_total['denizbank']['name'] = $bal['bankName'];
                $bank_total['denizbank']['logo'] = $bal['bankLogo'];
                $bank_total['denizbank']['bankId'] = $bal['bankId'];
                $update = strtotime($bal['updateDateValue']);
                $bankUpdate = strtotime($bank_total['denizbank']['update']);
                if ($update > $bankUpdate ){
                    $bank_total['denizbank']['update'] =$bal['updateDateValue'];
                }
                if ($bal['currencyId'] == 1){
                    $bank_total['denizbank']['tl']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 2){
                    $bank_total['denizbank']['usd']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 3){
                    $bank_total['denizbank']['euro']+=$bal['balance'];
                }
                if ($bal['currencyId'] == 4){
                    $bank_total['denizbank']['sterlin']+=$bal['balance'];
                }if ($bal['currencyId'] == 9){
                $bank_total['denizbank']['chf']+=$bal['balance'];
            }
                break;

        }

    }
    return $bank_total;
}

public static function get_rate(){
    $xml = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
    if ($xml == ''){
        self::get_rate();
    }
    $usd = $xml->Currency[0]->BanknoteSelling;
    $euro = $xml->Currency[3]->BanknoteSelling;
    $gbp = $xml->Currency[4]->BanknoteSelling;
    $chf = $xml->Currency[5]->BanknoteSelling;
    return[
        'usd' => $usd,
        'euro' => $euro,
        'gbp' => $gbp,
        'chf' => $chf
    ];
}

}