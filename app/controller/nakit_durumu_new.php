<?php
$balance_detail = api::get_balance();
$balance_details=$balance_detail['value'];
$rates = balance::get_rate();

$companycount=User::get_auth_companies();
//damp(count($companycount));

$banks=[];
for($i=0;$i<count($balance_details);$i++){
    array_push($banks,$balance_details[$i]['bankName']);
}

$banks=array_values(array_unique($banks));

$tlbalance=[];
foreach ($banks as $bank){
    $tlbalance[$bank]=array(
        'logo'=>'',
        'tl'=>0);
}

$bankbalance=[];
foreach ($banks as $bank){
    $bankbalance[$bank]=array(
        'logo'=>'',
        'count_tl'=>0,
        'total_tl'=>0,
        'count_dolar'=>0,
        'total_dolar'=>0,
        'count_euro'=>0,
        'total_euro'=>0,
        'count_gbp'=>0,
        'total_gbp'=>0,
        'count_chf'=>0,
        'total_chf'=>0);
}


for($i=0;$i<count($balance_details);$i++){
    if($balance_details[$i]['currencyId']==1){
        $bankbalance[$balance_details[$i]['bankName']]['logo']=$balance_details[$i]['bankLogo'];
        $bankbalance[$balance_details[$i]['bankName']]['count_tl']++;
        $bankbalance[$balance_details[$i]['bankName']]['total_tl'] += $balance_details[$i]['balance'];
    }
    else if($balance_details[$i]['currencyId']==2){
        $bankbalance[$balance_details[$i]['bankName']]['count_dolar']++;
        $bankbalance[$balance_details[$i]['bankName']]['total_dolar'] += $balance_details[$i]['balance'];
    }
    else if($balance_details[$i]['currencyId']==3){
        $bankbalance[$balance_details[$i]['bankName']]['count_euro']++;
        $bankbalance[$balance_details[$i]['bankName']]['total_euro'] += $balance_details[$i]['balance'];
    }
    else if($balance_details[$i]['currencyId']==4){
        $bankbalance[$balance_details[$i]['bankName']]['count_gbp']++;
        $bankbalance[$balance_details[$i]['bankName']]['total_gbp'] += $balance_details[$i]['balance'];
    }
    else if($balance_details[$i]['currencyId']==9){
        $bankbalance[$balance_details[$i]['bankName']]['count_chf']++;
        $bankbalance[$balance_details[$i]['bankName']]['total_chf'] += $balance_details[$i]['balance'];
    }
}


$totaltl=0;
$purebalance=[];

foreach ($bankbalance as $key=>$item){
    foreach ($tlbalance as $value){
        $tlbalance[$key]['logo']=$bankbalance[$key]['logo'];

        $tlbalance[$key]['tl']=$bankbalance[$key]['total_tl']+($bankbalance[$key]['total_dolar']*$rates['usd'])+($bankbalance[$key]['total_euro']*$rates['euro'])+($bankbalance[$key]['total_gbp']*$rates['gbp'])+($bankbalance[$key]['total_chf']*$rates['chf']);
    }
    $purebalance['puretl']+=$bankbalance[$key]['total_tl'];
    $purebalance['pureusd']+=$bankbalance[$key]['total_dolar'];
    $purebalance['pureeuro']+=$bankbalance[$key]['total_euro'];
    $purebalance['puregbp']+=$bankbalance[$key]['total_gbp'];
    $purebalance['purechf']+=$bankbalance[$key]['total_chf'];
    $totaltl+=$tlbalance[$key]['tl'];
}
$companies=User::get_auth_companies_filtered();
//damp($companies);
if (post('answer')){
    $selectedids=post('companies');
    //damp($selectedids);
    $selectedcompany=[];
    foreach ($selectedids as $selectedid){
        foreach ($companies as $key => $company){
            if($selectedid==$company['id']){
                //damp('work');
                array_push($selectedcompany,$companies[$key]);
            }
        }
    }
    //damp(json_encode($selectedcompany,true));
    $_SESSION['selectedCompany'] = json_encode($selectedcompany,true);
    header('location:'.site_url('nakit_durumu_new'));
}


//damp($companies);
//damp(json_decode(session('selectedCompany'),true));



//damp($purebalance);

//$totaltl=number_format($totaltl,2,',','.');



//damp($totaltl);
//damp($bankbalance);

//damp($tlbalance);







require view("nakit_durumu_new");