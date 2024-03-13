<?php
//error_reporting(E_ALL);

if(session('company_id')==0){
    header('location:'.site_url('logout'));
}
if (post('chooseCompany')){
    if (post('selectedCompanyId')==2){
        $_SESSION['company_id']=2;
    }
    else if (post('selectedCompanyId')==8){
        $_SESSION['company_id']=8;
    }
    header("Location:".site_url('complaint'));
}

if (get('year')){
  if (get('year')==2024){
      $_SESSION['complaint_Year']="2024-01-01 00:00:00";
  }
    if (get('year')==2023){
        $_SESSION['complaint_Year']="2023-01-01 00:00:00";
    }

}
if(session('company_id')==8){$totalreport=[];

    $quatotal=complaint::qua_get_total_complaint_count();

    foreach ($quatotal as $item){
        $totalreport[$item['yil']]=array('totalComplaintCount'=>$item['acceptedComplaintCount']);
        $totalreport[$item['yil']]['acceptedComplaintCount']=0;
        $totalreport[$item['yil']]['firstClassAcceptedComplaint']=0;
        $totalreport[$item['yil']]['secondClassAcceptedComplaint']=0;
        $totalreport[$item['yil']]['allClassAcceptedComplaint']=0;
        $totalreport[$item['yil']]['domesticComplaintCount']=0;
        $totalreport[$item['yil']]['abroadComplaintCount']=0;
        $totalreport[$item['yil']]['abroadSpentUSD']=0;
        $totalreport[$item['yil']]['abroadSpentEURO']=0;
        $totalreport[$item['yil']]['abroadSpentTRY']=0;
        $totalreport[$item['yil']]['domesticSpentTRY']=0;
        $totalreport[$item['yil']]['totalSpentTRY']=0;
    }
    $quaaccepted=complaint::qua_get_accepted_complaint_count();
    foreach ($quaaccepted as $item){
        $totalreport[$item['yil']]['acceptedComplaintCount']=$item['acceptedComplaintCount'];
    }
    $quatotalacceptedfirstclass=complaint::qua_get_total_accepted_first_class();
    foreach ($quatotalacceptedfirstclass as $item){
        $totalreport[$item['yil']]['firstClassAcceptedComplaint']=$item['acceptedComplaint'];
    }

    $quatotalacceptedsecondclass=complaint::qua_get_total_accepted_second_class();
    foreach ($quatotalacceptedsecondclass as $item){
        $totalreport[$item['yil']]['secondClassAcceptedComplaint']=$item['acceptedComplaint'];
    }

    $quatotalacceptedallclass=complaint::qua_get_total_accepted_all_class();
    foreach ($quatotalacceptedallclass as $item){
        $totalreport[$item['yil']]['allClassAcceptedComplaint']=$item['acceptedQuantity'];
    }
    $domesticaccepted=complaint::get_total_accepted_domestic();
    foreach ($domesticaccepted as $item){
        $totalreport[$item['yil']]['domesticComplaintCount']=$item['acceptedComplaintCount'];
    }
    $abroadaccepted=complaint::get_total_accepted_abroad();
    foreach ($abroadaccepted as $item){
        $totalreport[$item['yil']]['abroadComplaintCount']=$item['acceptedComplaintCount'];
    }
    $fcurrencyusd=complaint::get_total_foreigner_currency(2);
    foreach ($fcurrencyusd as $item){
        $totalreport[$item['yil']]['abroadSpentUSD']=$item['usd'];
    }
    $fcurrencyeuro=complaint::get_total_foreigner_currency(3);
    foreach ($fcurrencyeuro as $item){
        $totalreport[$item['yil']]['abroadSpentEURO']=$item['euro'];
    }
    $fcurrencytry=complaint::get_total_domestic_spent();
    foreach ($fcurrencytry as $item){
        $totalreport[$item['yil']]['domesticSpentTRY']=$item['try'];
    }
    $lcurrency=complaint::get_total_local_currency();
    foreach ($lcurrency as $item){
        $totalreport[$item['yil']]['abroadSpentTRY']=$item['try'];
    }
    $totalpayment=complaint::get_total_payment();
    foreach ($totalpayment as $item){
        $totalreport[$item['yil']]['totalSpentTRY']=$item['try'];
    }



    $totalreportResult=[
        'totalComplaintCount'=>0,
        'acceptedComplaintCount'=>0,
        'firstClassAcceptedComplaint'=>0,
        'firstClassAcceptedComplaint'=>0,
        'secondClassAcceptedComplaint'=>0,
        'allClassAcceptedComplaint'=>0,
        'domesticComplaintCount'=>0,
        'abroadComplaintCount'=>0,
        'abroadSpentUSD'=>0,
        'abroadSpentEURO'=>0,
        'abroadSpentTRY'=>0,
        'domesticSpentTRY'=>0,
        'totalSpentTRY'=>0
    ];
    foreach ($totalreport as $item){
        $totalreportResult['totalComplaintCount'] += isset($item['totalComplaintCount']) ? $item['totalComplaintCount'] : 0;
        $totalreportResult['acceptedComplaintCount'] += isset($item['acceptedComplaintCount']) ? $item['acceptedComplaintCount'] : 0;
        $totalreportResult['firstClassAcceptedComplaint'] += isset($item['firstClassAcceptedComplaint']) ? $item['firstClassAcceptedComplaint'] : 0;
        $totalreportResult['secondClassAcceptedComplaint'] += isset($item['secondClassAcceptedComplaint']) ? $item['secondClassAcceptedComplaint'] : 0;
        $totalreportResult['allClassAcceptedComplaint'] += isset($item['allClassAcceptedComplaint']) ? $item['allClassAcceptedComplaint'] : 0;
        $totalreportResult['domesticComplaintCount'] += isset($item['domesticComplaintCount']) ? $item['domesticComplaintCount'] : 0;
        $totalreportResult['abroadComplaintCount'] += isset($item['abroadComplaintCount']) ? $item['abroadComplaintCount'] : 0;
        $totalreportResult['abroadSpentUSD'] += isset($item['abroadSpentUSD']) ? $item['abroadSpentUSD'] : 0;
        $totalreportResult['abroadSpentEURO'] += isset($item['abroadSpentEURO']) ? $item['abroadSpentEURO'] : 0;
        $totalreportResult['abroadSpentTRY'] += isset($item['abroadSpentTRY']) ? $item['abroadSpentTRY'] : 0;
        $totalreportResult['domesticSpentTRY'] += isset($item['domesticSpentTRY']) ? $item['domesticSpentTRY'] : 0;
        $totalreportResult['totalSpentTRY'] += isset($item['totalSpentTRY']) ? $item['totalSpentTRY'] : 0;

    }

}

$rates = balance::get_rate();

$this_month_total_complaint=complaint::get_this_month_total_complaint();

$last_month_total_complaint=complaint::get_last_month_total_complaint();

$yearlycomplaintbyfactory=complaint::get_yearly_total_complaint_by_factory();
//$yearlycomplaintbyfactory=complaint::get_yearly_total_complaint_by_factory();

$get_average_surveys=complaint::get_average_surveys();

if (session('auth')['complaintSub']['complaint'] != 0) {
    $complaintreport=complaint::complaint_report();
    $factory = user::get_user_factory()['complaintFactory'];
    $auth=$factory;
    if($auth==0){
        $complaintcategoriesforchart=complaint::complaint_categories_with_quantity_for_admin();

    }
    else{
        $complaintcategoriesforchart=complaint::complaint_categories_with_quantity_for_auth($auth);
}

    if ($factory != 0){

        $complaints = complaint::get_complaint($factory,0);
        $suggestioncomplaint=complaint::get_suggestion_complaint($factory,0);
        $supplycomplaint=complaint::get_supply_complaint($factory,0);
        $personelcomplaint=complaint::get_personel_complaint($factory,0);
        $factories = complaint::get_factories();

    }else{
        $categorycounts=complaint::categoryCount();

        $complaints = complaint::get_complaint('',0);

        $suggestioncomplaint=complaint::get_suggestion_complaint('',0);
        $supplycomplaint=complaint::get_supply_complaint('',0);
        $personelcomplaint=complaint::get_personel_complaint('',0);
        $factories = complaint::get_factories();

        $accepted = complaint::get_accepted_quantity();
        $total = complaint::get_total_quantity();
    }

    $sumsurveys=complaint::get_sum_surveys();
    $surveycount=complaint::get_survey_count();

    if (post("factoryAuth")){

        $accepted = complaint::get_accepted_quantity(post('factoryAuth'));
        $total = complaint::get_total_quantity(post('factoryAuth'));
        $rejekted=$total-$accepted;
        echo $accepted.",".$rejekted;
        exit();
    }
    if(post('market')){

        $accepted = complaint::get_accepted_quantity_by_market(post('factoryId'),post('market'));
        $total = complaint::get_total_quantity_by_market(post('factoryId'),post('market'));
        $rejekted=$total-$accepted;
        echo $accepted.",".$rejekted;
        exit();
    }

    require view("complaint");
}else if(session('auth')['travelSub']['gezinomiIndex'] != 0){
    header("Location:".site_url('gezinomi_index'));
}
else{
    header("Location:".site_url('yetkisiz'));
}