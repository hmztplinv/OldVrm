<?php
$a=1;
if (!session('user_id')){
    header("Location:" .site_url('login'));
}elseif (session('auth')['accountSub']['accountCurrency'] != 0){

    if (session('verify') != 1){
        header('Location:'.site_url('login'));
    }
    if (post('answer')){
        $array = post("cookies");
        $arr = [];
        foreach ($array as $cookie){
            $arr[] = user::get_company_info($cookie);
        }
        $_SESSION['selectedCompany'] = json_encode($arr,true);
        damp(session('selectedCompany'));
    }
    $companyidcheck=0;
    foreach (auth::get_auth(session('user_id')) as $item){
        if ($item['companyid']==2){
            $companyidcheck=1;
        }
    }

    $companycount=User::get_auth_companies();
    if(count($companycount)>1){
        $seperatebalance=[];
        $companies=User::get_auth_companies_filtered();
        for($i=0;$i<count($companies);$i++){
            $encodedcompany[]=$companies[$i];
            $seperatebalance[$i]['companyName']=$companies[$i]['companyName'];
            $seperatebalance[$i]['tl']=balance::get_currency_total_balance_seperate(1,$encodedcompany);

            $seperatebalance[$i]['usd']=balance::get_currency_total_balance_seperate(2,$encodedcompany);
            $seperatebalance[$i]['euro']=balance::get_currency_total_balance_seperate(3,$encodedcompany);
            $seperatebalance[$i]['gbp']=balance::get_currency_total_balance_seperate(4,$encodedcompany);
            $seperatebalance[$i]['chf']=balance::get_currency_total_balance_seperate(9,$encodedcompany);
            $encodedcompany=array();
        }
    }
    $companysession=json_decode(session('selectedCompany'),true);
    if(empty($companysession[0])){
        unset($companysession[0]);
    }

   $balance_detail = api::get_balance();
     $total_tl = balance::get_currency_total_balance(1);
    $total_usd = balance::get_currency_total_balance(2);
    $total_euro = balance::get_currency_total_balance(3);
    $total_gbp = balance::get_currency_total_balance(4);
    $total_chf = balance::get_currency_total_balance(9);
    $rates = balance::get_rate();
    $bank_of_total = balance::get_bank_total_balance();


    //damp($bank_of_total);

    $temp = 0;

    if ($total_tl != 0){
        $temp++;
    }
    if ($total_usd != 0){
        $temp++;
    }
    if ($total_euro != 0){
        $temp++;
    }
    if ($total_gbp != 0){
        $temp++;
    }if ($total_chf != 0){
        $temp++;
    }
 
    //damp($bank_of_total);
    require view("hesap_bakiyeleri");
}else if(session('auth')['complaint'] != 0){
    header("Location:".site_url('complaint'));
}else{
    header("Location:".site_url('complaint'));
}




