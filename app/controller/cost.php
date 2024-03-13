<?php

$officer = Cost::get_cost_officer();
$costTypes = Parameters::get_cost_types();
$company = json_decode(session('selectedCompany'),false);
$acceptedCosts = Cost::get_costs(session('user_id'),1);
$rejectedCosts = Cost::get_costs(session('user_id'),2);
$waitingCosts = Cost::get_costs(session('user_id'),3);

if (post('createcost')){

    if (count($company) != 1){
        $response['err'] = "Lütfen firma seçim menusunden sadece 1 firma seçiniz.";
    }else{
//        damp($_POST);
        $cost = [
            'user_id' => session('user_id'),
            'company_id' => $company[0]->id,
            'officer_id' => post('approvalofficer'),
            'date' => post('costDate'),
            'cost_type' => post('costType'),
            'amount' => post('cost'),
            'description' => post('costDescription')
        ];

        $result = Cost::create_cost($cost);


        if ($result){
            $response['suc'] = "Masraf isteğiniz başarıyla iletilmiştir.";
        }else{
            $response['err'] = "Masraf isteğiniz oluşturulurken bir hata ile karşılaştık. Lütfen teknik ekibe başvurun.";
        }
//        damp($response);
    }
}

require view('cost');