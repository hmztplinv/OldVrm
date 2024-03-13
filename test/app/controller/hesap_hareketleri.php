<?php

$details = api::get_detail();
 
$bank_of_list = [];
$currency_of_list = [];
$iban_of_list = [];
$transcode_of_list = [];
$startdate_of_list = [];
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
}
$bank_of_list['bankName'] = array_unique($bank_of_list['bankName']);
$bank_of_list['bankName'] = array_values($bank_of_list['bankName']);
$bank_of_list['bankCode'] = array_unique($bank_of_list['bankCode']);
$bank_of_list['bankCode'] = array_values($bank_of_list['bankCode']);


if (@post('bankName') || post('iban') || post('currency') || post('transcode') || post('startDate') || post('endDate') || post('startAmount') || post('endAmount') || post('description')){
    $startDate = new DateTime(post('startDate'));
    $startDate = $startDate->format("Y-m-d");
    $endDate = new DateTime(post('endDate'));
    $endDate = $endDate->format("Y-m-d");

    $urlString = "";

        if (isset($_POST['bankName'])){
            if (count(post('bankName')) <= 1){
                $urlString = "?\$filter=bankId%20eq%20".post('bankName')[0];
            }else{
                for ($i=0;$i<count(post('bankName'));$i++){
                    if ($i == 0){
                        $urlString = "?\$filter=bankId%20eq%20".post('bankName')[$i];
                    }else{
                        $urlString .= "%20or%20bankId%20eq%20".post('bankName')[$i];
                    }
                }
            }
        }

        if (post('iban')){
            if (count(post('iban')) <= 1){
                if ($urlString !== ""){
                    $urlString .= "%20and%20tenantIban%20eq%20'".post('iban')[0]."'";
                }else{
                    $urlString = "?\$filter=tenantIban%20eq%20'".post('iban')[0]."'" ;
                }
            }else{
                if ($urlString !== ""){
                    for ($i=0;$i<count(post('iban'));$i++){
                        $urlString .= "%20or%20tenantIban%20eq%20'".post('iban')[$i]."'";
                    }
                }else{
                    for ($i=0;$i<count(post('iban'));$i++){
                        if ($i == 0){
                            $urlString = "?\$filter=tenantIban%20eq%20'".post('iban')[$i]."'" ;
                        }else{
                            $urlString .= "%20or%20tenantIban%20eq%20'".post('iban')[$i]."'";
                        }

                    }
                }
            }

        }
    if (post('currency')){
        if (count(post('currency')) <= 1){
            if ($urlString !== ""){
                $urlString .= "%20and%20currency%20eq%20'".post('currency')[0]."'";
            }else{
                $urlString = "?\$filter=currency%20eq%20'".post('currency')[0]."'" ;
            }
        }else{
            if ($urlString !== ""){
                for ($i=0;$i<count(post('currency'));$i++){
                    $urlString .= "%20or%20currency%20eq%20'".post('currency')[$i]."'";
                }
            }else{
                for ($i=0;$i<count(post('currency'));$i++){
                    if ($i == 0){
                        $urlString = "?\$filter=currency%20eq%20'".post('currency')[$i]."'" ;
                    }else{
                        $urlString .= "%20or%20currency%20eq%20'".post('currency')[$i]."'";
                    }

                }
            }
        }

    }
    if (post('transcode')){
       // damp("transcode girdi".count(post('transcode')));
        if (count(post('transcode')) <= 1){
            if ($urlString !== ""){
                $urlString .= "%20and%20transactionCode%20eq%20'".post('transcode')[0]."'";
            }else{
                $urlString = "?\$filter=transactionCode%20eq%20'".post('transcode')[0]."'" ;
            }
        }else{
            if ($urlString !== ""){
                for ($i=0;$i<count(post('transcode'));$i++){
                    $urlString .= "%20or%20transactionCode%20eq%20'".post('transcode')[$i]."'";
                }
            }else{
                for ($i=0;$i<count(post('transcode'));$i++){
                    if ($i == 0){
                        $urlString = "?\$filter=transactionCode%20eq%20'".post('transcode')[$i]."'" ;
                    }else{
                        $urlString .= "%20or%20transactionCode%20eq%20'".post('transcode')[$i]."'";
                    }

                }
            }
        }

    }
   // damp($urlString);

        if (post('startDate')){
            if ($urlString !== ""){
                $urlString .= "%20and%20date(TransactionDateValue)%20gt%20".$startDate;
            }else{
                $urlString = "?\$filter=date(TransactionDateValue)%20gt%20".$startDate;
            }
        }if (post('endDate')){
            if ($urlString !== ""){
                 $urlString .= "%20and%20date(TransactionDateValue)%20lt%20".$endDate;
            }else{
                $urlString = "?\$filter=date(TransactionDateValue)%20lt%20".$endDate;
            }
        }
        if (post('startAmount')){
            if ($urlString !== ""){
                $urlString .= "%20and%20Amount%20gt%20".post('startAmount');
            }else{
                $urlString = "?\$filter=Amount%20gt%20".post('startAmount');
            }
        }if (post('endAmount')){
            if ($urlString !== ""){
                $urlString .= "%20and%20Amount%20lt%20".post('endAmount');
            }else{
                $urlString = "?\$filter=Amount%20lt%20".post('endAmount');
            }
        }
        if (post('description')){
            if ($urlString !== ""){
                $urlString .= "%20and%20Contains(Description,'".post('description')."')";
            }else{
                $urlString = "?\$filter=Contains(Description,'".post('description')."')";
            }
        }


    $filter_list = api::get_detail($urlString);
     //damp($filter_list);
    $response = '<tbody id="changing">';
    foreach (@$filter_list as $filter){

        $response .= '<tr>
                            <td align="center">
                                <form action="ozluk/" method="POST">
                                    <input type="hidden" id="registry" name="registry" value="'.session("user_id").'">
                                    <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </td>
                            <td>'.$filter["transactionDate"].'</td>
                            <td align="center"><img class="img-fluid" src="'.$filter["bankLogo"].'" alt="'.$filter["bankName"].'"></td>
                            <td>'.$filter['tenantBranchCode']."/".$filter['tenantBranchName'].'</td>
                            <td>'.$filter['tenantIban'].'</td>
                            <td align="center">'.$filter['currency'].'</td>
                            <td align="center">'.$filter['transactionCode'].'</td>
                            <td align="center">'.$filter['amountString'].'</td>
                            <td align="center">'.$filter['balanceAfterTransaction'].'</td>
                            <td>'.$filter['description'].'</td>
                       </tr>';
    }
    $response .= '</tbody>';

    damp($response);

}
if (post('clear')){
    $filter_list = api::get_detail();
    $response = '<tbody id="changing">';
    foreach ($filter_list as $filter){
        if ($filter['bankId'] !== 999){
            $response .= '<tr>
                            <td align="center">
                                <form action="ozluk/" method="POST">
                                    <input type="hidden" id="registry" name="registry" value="'.session("user_id").'">
                                    <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </td>
                            <td>'.$filter["transactionDate"].'</td>
                            <td align="center"><img class="img-fluid" src="'.$filter["bankLogo"].'" alt="'.$filter["bankName"].'"></td>
                            <td>'.$filter['tenantBranchCode']."/".$filter['tenantBranchName'].'</td>
                            <td>'.$filter['tenantIban'].'</td>
                            <td align="center">'.$filter['currency'].'</td>
                            <td align="center">'.$filter['transactionCode'].'</td>
                            <td align="center">'.$filter['amountString'].'</td>
                            <td align="center">'.$filter['balanceAfterTransaction'].'</td>
                            <td>'.$filter['description'].'</td>
                       </tr>';
        }

    }
    $response .= '</tbody>';

    damp($response);

}
if (post('id')){
    $dsa = post('id');
}

if (post('selectIban')){
    $selectIban = post('selectIban');

}
if (isset($_POST['changeBankId'])){
    if (count($_POST['changeBankId']) <= 1){
        $urlString = "?\$filter=bankId%20eq%20".post('changeBankId')[0];
    }else{
        for ($i=0;$i<count(post('changeBankId'));$i++){
            if ($i == 0){
                $urlString = "?\$filter=bankId%20eq%20".post('changeBankId')[$i];
            }else{
                $urlString .= "%20or%20bankId%20eq%20".post('changeBankId')[$i];
            }
        }
    }
   // damp($urlString);
    $bank_filters = api::get_detail($urlString);
    unset($iban_of_list);
    $iban_of_list = [];
    foreach ($bank_filters as $bank_filter){
            $iban_of_list['bankName'][] = $bank_filter['tenantIban'];
            $iban_of_list['currency'][] = $bank_filter['currency'];
            $iban_of_list['transcode'][] = $bank_filter['transactionCode'];
    }
    $iban_of_list['bankName'] = array_unique($iban_of_list['bankName']);
    $iban_of_list['bankName'] = array_values($iban_of_list['bankName']);
    $iban_of_list['currency'] = array_unique($iban_of_list['currency']);
    $iban_of_list['currency'] = array_values($iban_of_list['currency']);
    $iban_of_list['transcode'] = array_unique($iban_of_list['transcode']);
    $iban_of_list['transcode'] = array_values($iban_of_list['transcode']);

    $iban_of_list = json_encode($iban_of_list);
    damp($iban_of_list);

}
if (post('changeIban')){
    $ibanList = [];
    if (count($_POST['changeIban']) <= 1){
        $urlString = "?\$filter=tenantIban%20eq%20'".post('changeIban')[0]."'";
    }else{
        for ($i=0;$i<count(post('changeIban'));$i++){
            if ($i == 0){
                $urlString = "?\$filter=tenantIban%20eq%20'".post('changeIban')[$i]."'";
            }else{
                $urlString .= "%20or%20tenantIban%20eq%20'".post('changeIban')[$i]."'";
            }
        }
    }
   // damp($urlString);
    $selectBanks = api::get_detail($urlString);



    foreach ($selectBanks as $selectBank){
        $ibanList['bankName'][] = $selectBank['bankId'];
        $ibanList['currency'][] = $selectBank['currency'];
        $ibanList['transcode'][] = $selectBank['transactionCode'];
    }
    $ibanList['bankName'] = array_unique($ibanList['bankName']);
    $ibanList['bankName'] = array_values($ibanList['bankName']);
    $ibanList['currency'] = array_unique($ibanList['currency']);
    $ibanList['currency'] = array_values($ibanList['currency']);
    $ibanList['transcode'] = array_unique($ibanList['transcode']);
    $ibanList['transcode'] = array_values($ibanList['transcode']);
    damp(json_encode($ibanList));
}
if (post('changeCurrency')){
    $currencyList = [];
    if (count($_POST['changeCurrency']) <= 1){
        $urlString = "?\$filter=currency%20eq%20'".post('changeCurrency')[0]."'" ;
    }else{
        for ($i=0;$i<count(post('changeCurrency'));$i++){
            if ($i == 0){
                $urlString = "?\$filter=currency%20eq%20'".post('changeCurrency')[$i]."'" ;
            }else{
                $urlString .= "%20or%20currency%20eq%20'".post('changeCurrency')[$i]."'";
            }
        }
    }

    $selectBanks = api::get_detail($urlString);

    foreach ($selectBanks as $selectBank){

        $currencyList['bankName'][] = $selectBank['bankId'];
        $currencyList['iban'][] = $selectBank['tenantIban'];
        $currencyList['transcode'][] = $selectBank['transactionCode'];
    }
    $currencyList['bankName'] = array_unique($currencyList['bankName']);
    $currencyList['bankName'] = array_values($currencyList['bankName']);
    $currencyList['iban'] = array_unique($currencyList['iban']);
    $currencyList['iban'] = array_values($currencyList['iban']);
    $currencyList['transcode'] = array_unique($currencyList['transcode']);
    $currencyList['transcode'] = array_values($currencyList['transcode']);
    damp(json_encode($currencyList));

}
if (post('changeTranscode')){
    $transcodeList = [];

    if (count($_POST['changeTranscode']) <= 1){
        $urlString = "?\$filter=TransactionCode%20eq%20'".post('changeTranscode')[0]."'" ;
    }else{
        for ($i=0;$i<count(post('changeTranscode'));$i++){
            if ($i == 0){
                $urlString = "?\$filter=TransactionCode%20eq%20'".post('changeTranscode')[$i]."'" ;
            }else{
                $urlString .= "%20or%20TransactionCode%20eq%20'".post('changeTranscode')[$i]."'";
            }
        }
    }


    $selectBanks = api::get_detail($urlString);

    foreach ($selectBanks as $selectBank){

        $transcodeList['bankName'][] = $selectBank['bankId'];
        $transcodeList['iban'][] = $selectBank['tenantIban'];
        $transcodeList['transcode'][] = $selectBank['transactionCode'];
    }
    $transcodeList['bankName'] = array_unique($transcodeList['bankName']);
    $transcodeList['bankName'] = array_values($transcodeList['bankName']);
    $transcodeList['iban'] = array_unique($transcodeList['iban']);
    $transcodeList['iban'] = array_values($transcodeList['iban']);
    $transcodeList['transcode'] = array_unique($transcodeList['transcode']);
    $transcodeList['transcode'] = array_values($transcodeList['transcode']);
    damp(json_encode($transcodeList));

}

if (!post('bankName') || !post('iban') || !isset($_POST['changeIban']) || post('changeBankId')){
    require view('hesap_hareketleri');
}