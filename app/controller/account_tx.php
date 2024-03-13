<?php
if (!session('user_id')){
    header("Location:" .site_url('login'));
}elseif (session('auth')['accountSub']['accountTX'] != 0){
    if (session('verify') != 1){
        header('Location:'.site_url('login'));
    }
    $end = 0;
    $details = [];
    $skip= api::get_detail();
    $details = array_merge($details, $skip['value']);
	 
    if(!post('all')){
        for ($i=0;$i<13;$i++){
            if ($end == 0){
                if (isset($skip['@odata.nextLink'])){
                    $skip = api::get_detail("",$skip['@odata.nextLink']);
					
                    $subDetail = $skip['value'];
                    $details = array_merge($details,$subDetail);
                }else{
                    $end = 1;
                }
            }else{
                break;
            }
        }
        $firstdate=date('d.m.Y',strtotime(end($details)['transactionDate']));
        $enddate=date('d.m.Y');
        $daydif=(strtotime($enddate)-strtotime($firstdate))/86400;
    }
    if(post('all')){
        for ($i=0;$i<50;$i++){
            if ($end == 0){
                if (isset($skip['@odata.nextLink'])){
                    $skip = api::get_detail("",$skip['@odata.nextLink']);
                    $subDetail = $skip['value'];
                    $details = array_merge($details,$subDetail);
                }else{
                    $end = 1;
                }
            }else{
                break;
            }
        }
    }

    $companynames=User::get_companyname_by_userid();
 
    $bank_of_list = [];
    $currency_of_list = [];
    $iban_of_list = [];
    $transcode_of_list = [];
    $startdate_of_list = [];
    $enddate_of_list = [];
    $startAmount_of_list= [];
    $endAmount_of_list= [];
    $description_of_list= [];
    $filter_list = [];
    $filter_list2= [];
    foreach ($details as $detail){
        if ($detail['bankId'] != "999"){
            $bank_of_list['bankName'][] = $detail['bankName'];
            $bank_of_list['bankCode'][] = $detail['bankId'];
        }
        if (!in_array($detail['currency'],$currency_of_list)){
            $currency_of_list[] = $detail['currency'];
        }
        if (!in_array($detail['tenantIban'],$iban_of_list)){
            if ($detail['tenantIban'] != "")
                $iban_of_list[] = $detail['tenantIban'];
        }
        if (!in_array($detail['transactionCode'],$transcode_of_list)){
            if ($detail['transactionCode'] != "")
                $transcode_of_list[] = $detail['transactionCode'];
        }
        if (!in_array($detail['startDate'],$startdate_of_list)){
            $startdate_of_list[] = $detail['startDate'];
        }
        if (!in_array($detail['endDate'],$enddate_of_list)){
            $enddate_of_list[] = $detail['endDate'];
        }
        if (!in_array($detail['startAmount'],$startAmount_of_list)){
            $startAmount_of_list[] = $detail['startAmount'];
        }
        if (!in_array($detail['endAmount'],$endAmount_of_list)){
            $endAmount_of_list[] = $detail['endAmount'];
        }
        if (!in_array($detail['description'],$description_of_list)){
            $description_of_list[] = $detail['description'];
        }

    }
    //damp($details);
    $bank_of_list['bankName'] = array_unique($bank_of_list['bankName']);
    $bank_of_list['bankName'] = array_values($bank_of_list['bankName']);
    $bank_of_list['bankCode'] = array_unique($bank_of_list['bankCode']);
    $bank_of_list['bankCode'] = array_values($bank_of_list['bankCode']);

  
 
    require view("account_tx");
}else{
    header("Location:".site_url('yetkisiz'));
}

