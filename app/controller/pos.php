<?php
if (session('auth')['accountSub']['accountPos'] != 0){
    $pos = api::API_url(baseUrl.'/PosTransaction');
    $list_bank = [];
    $list_member = [];
    $climbMonth  = ["01","03","05","07","08","10","12"];
    $month = date("m");
    $monthsTR = [
        "01" => 'Ocak',
        "02" => 'Şubat',
        "03" => 'Mart',
        "04" => 'Nisan',
        "05" => 'Mayıs',
        "06" => 'Haziran',
        "07" => 'Temmuz',
        "08" => 'Ağustos',
        "09" => 'Eylül',
        "10" => 'Ekim',
        "11" => 'Kasım',
        "12" => 'Aralık'
    ];

    $currentMonthStart = date("Y-m-d",mktime(0,0,0,date("m"),1,1970));
    $currentMonthEnd = date("Y-m-d",mktime(0,0,0,date("m"),in_array(date("m"),$climbMonth) ? 31 : 30 ,2021));
//damp($currentMonthEnd);

    for ($i=1;$i<=12;$i++){
        if ($i == 1){

            $currentMonth[1] = api::API_url(baseUrl."/PosTransaction?\$filter=date(valueDate)%20gt%20".$currentMonthStart."%20and%20date(valueDate)%20lt%20".$currentMonthEnd);
        }else{
            $currentMonthStart = date("Y-m-d",mktime(0,0,0,date("m",strtotime("+".($i-1)." month")),1,$i-1<=(12-date("m")) ? date("Y") : date("Y",strtotime("+1 year"))));
            if (date("m",strtotime("+".($i-1)." month")) != "2"){
                $currentMonthEnd = date("Y-m-d",mktime(0,0,0,date("m",strtotime("+".($i-1)." month")),in_array(date("m",strtotime("+".($i-1)." month")),$climbMonth) ? 31 : 30 ,$i-1<=(12-date("m")) ? date("Y") : date("Y",strtotime("+1 year"))));
            }else{
                $currentMonthEnd = date("Y-m-d",mktime(0,0,0,date("m",strtotime("+".($i-1)." month")),intval(date("Y",strtotime("+1 year"))) % 4 != 0 ? 28 : 29,12-date("m") == $i-1 ? date("Y") : date("Y",strtotime("+1 year"))));
            }

            if (in_array(date("m",strtotime("+".$i."month")),$climbMonth)){

                $currentMonth[$i] = api::API_url(baseUrl."/PosTransaction?\$filter=date(valueDate)%20gt%20".$currentMonthStart."%20and%20date(valueDate)%20lt%20".$currentMonthEnd);
            }else{

                $currentMonth[$i] = api::API_url(baseUrl."/PosTransaction?\$filter=date(valueDate)%20gt%20".$currentMonthStart."%20and%20date(valueDate)%20lt%20".$currentMonthEnd);
            }

        }
    }

    for ($i=1;$i<=12;$i++){
        $total[$i]['transaction'] = 0;
        $total[$i]['commission'] = 0;
        $total[$i]['amount'] = 0;
    }

    for ($i=1;$i<=12;$i++){
        foreach ($currentMonth[$i]['value'] as $item){

            $total[$i]['transaction'] += $item['amount'];
            $total[$i]['commission'] += $item['totalCommissionAmount'];
            $total[$i]['amount'] += $item['netAmount'];
        }
    }


    foreach ($pos['value'] as $po){
        if (!in_array($po['memberWorkplaceName'],$list_member)){
            $list_member[] = $po['memberWorkplaceName'];
        }

        $list_bank['bankName'][] = $po['posBankName'];
        $list_bank['bankId'][] = $po['posBankId'];
    }

    $list_bank['bankName'] = array_unique($list_bank['bankName']);
    $list_bank['bankId'] = array_unique($list_bank['bankId']);
    $list_bank['bankName'] = array_values($list_bank['bankName']);
    $list_bank['bankId'] = array_values($list_bank['bankId']);


//damp($list_bank);
    $totalBank = [];
    for ($i = 1;$i<count($list_bank['bankName']);$i++){
        foreach ($currentMonth[$i]['value'] as $item){
            foreach ($list_bank['bankName'] as $bank){
                if ($item['posBankName'] === $bank){
                    @$totalBank[$item['posBankName']][$i] += $item['amount'];
                }
            }

        }
    }


//damp($totalBank);
    $urlString = "";
    if (post('bankName')  || post('member') || post('startDate') || post('endDate') || post('startAmount') || post('endAmount')){

        if (isset($_POST['bankName'])){
            if (count(post('bankName')) <= 1){
                $urlString = "?\$filter=posBankId%20eq%20".post('bankName')[0];
            }else{
                for ($i=0;$i<count(post('bankName'));$i++){
                    if ($i == 0){
                        $urlString = "?\$filter=posBankId%20eq%20".post('bankName')[$i];
                    }else{
                        $urlString .= "%20or%20posBankId%20eq%20".post('bankName')[$i];
                    }
                }
            }
        }

        if (post('member')){
            if (count(post('member')) <= 1){
                if ($urlString !== ""){
                    $urlString .= "%20or%20memberWorkplaceName%20eq%20'".post('member')[0]."'";
                }else{
                    $urlString = "?\$filter=memberWorkplaceName%20eq%20'".post('member')[0]."'" ;
                }
            }else{
                if ($urlString !== ""){
                    for ($i=0;$i<count(post('member'));$i++){
                        $urlString .= "%20or%20memberWorkplaceName%20eq%20'".post('member')[$i]."'";
                    }
                }else{
                    for ($i=0;$i<count(post('member'));$i++){
                        if ($i == 0){
                            $urlString = "?\$filter=memberWorkplaceName%20eq%20'".post('member')[$i]."'" ;
                        }else{
                            $urlString .= "%20or%20memberWorkplaceName%20eq%20'".post('member')[$i]."'";
                        }

                    }
                }
            }

        }

        if (post('startDate')){
            if ($urlString != ""){
                $urlString .= "%20and%20date(valueDate)%20gt%20".post('startDate');
            }else{
                $urlString = "?\$filter=date(valueDate)%20gt%20".post('startDate');
            }
        }
        if (post('endDate')){
            if ($urlString != ""){
                $urlString .= "%20and%20date(valueDate)%20lt%20".post('endDate');
            }else{
                $urlString = "?\$filter=date(valueDate)%20lt%20".post('endDate');
            }
        }
        if (post('startAmount')){
            if ($urlString != ""){
                $urlString .= "%20and%20amount%20gt%20".post('startAmount');
            }else{
                $urlString = "?\$filter=amount%20gt%20".post('startAmount');
            }
        }
        if (post('endAmount')){
            if ($urlString != ""){
                $urlString .= "%20and%20amount%20lt%20".post('endAmount');
            }else{
                $urlString = "?\$filter=amount%20lt%20".post('endAmount');
            }
        }
        //damp($urlString);
        $pos = api::API_url(baseUrl.'/PosTransaction'.$urlString);
        $response = '<tbody id="changingPOS">';
        foreach ($pos["value"] as $po){

            $response .= '<tr>
                        <td align="center">
                            <form action="../hesap-hareketleri/" method="POST">
                                <input type="hidden" id="iban" name="iban" value="TR323232323232323223232">
                                <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        <td align="center"><img class="img-fluid" src="'.$po["posBankLogo"].'" alt="'. $po["posBankName"].'"></td>
                        </td>
                        <td align="center">'.$po["memberWorkplaceName"].'</td>
                        <td align="center">'.$po["terminalNumber"].'</td>
                        <td align="center">'.$po["provisionNumber"].'</td>';
            $clock =  explode("T",$po["operationDate"])[1];
            $response .='<td>'.explode("T",$po["operationDate"])[0]." ".explode("+",$clock)[0].'</td>';
            $clock =  explode("T",$po["valueDate"])[1];
            $response .='<td>'.explode("T",$po["valueDate"])[0]." ".explode("+",$clock)[0].'</td>
                        <td align="center">'.$po["amount"].'</td>
                        <td align="center">'.$po["commissionRate"].'</td>
                        <td align="center">'.$po["totalCommissionAmount"] .'</td>
                        <td align="center">'.$po["netAmount"].'</td>
                        <td align="center">'.$po["currency"] .'</td>
                        <td align="center">'. $po["installmentCount"] .'</td>
                        <td align="center">'. $po["installmentOrder"] .'</td>
                    </tr>';
        }
        $response .= '</tbody>';
        damp($response);
    }
    if (post('changeMember')){
        $urlString = "?\$filter=posBankId%20eq%20".post('changeMember');
        $posd = api::API_url(baseUrl.'/PosTransaction'.$urlString);
        $listMember = [];
        foreach ($posd["value"] as $po){
            if (!in_array($po['memberWorkplaceName'],$listMember)){
                $listMember[] = $po["memberWorkplaceName"];
            }
        }
        damp(json_encode($listMember));
    }
    if (post('changeBank')){
        $urlString = "?\$filter=memberWorkplaceName%20eq%20'".str_replace(" ","%20",post('changeBank'))."'";
        $cBank = api::API_url(baseUrl.'/PosTransaction'.$urlString);
        $listBank = [];
        foreach ($cBank["value"] as $bank){
            if (!in_array($bank['posBankName'],$list_bank)){
                $listBank[] = $bank['posBankName'];
            }
        }
        $listBank = array_unique($listBank);
        $listBank = array_values($listBank);
        damp(json_encode($listBank));
    }
    if (post('clear')){
        $pos = api::API_url(baseUrl.'/PosTransaction');
        $response = '<tbody id="changingPOS">';
        foreach ($pos["value"] as $po){

            $response .= '<tr>
                        <td align="center">
                            <form action="../hesap-hareketleri/" method="POST">
                                <input type="hidden" id="iban" name="iban" value="TR323232323232323223232">
                                <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        <td align="center"><img class="img-fluid" src="'.$po["posBankLogo"].'" alt="'. $po["posBankName"].'"></td>
                        </td>
                        <td align="center">'.$po["memberWorkplaceName"].'</td>
                        <td align="center">'.$po["terminalNumber"].'</td>
                        <td align="center">'.$po["provisionNumber"].'</td>';
            $clock =  explode("T",$po["operationDate"])[1];
            $response .='<td>'.explode("T",$po["operationDate"])[0]." ".explode("+",$clock)[0].'</td>';
            $clock =  explode("T",$po["valueDate"])[1];
            $response .='<td>'.explode("T",$po["valueDate"])[0]." ".explode("+",$clock)[0].'</td>
                        <td align="center">'.$po["amount"].'</td>
                        <td align="center">'.$po["commissionRate"].'</td>
                        <td align="center">'.$po["totalCommissionAmount"] .'</td>
                        <td align="center">'.$po["netAmount"].'</td>
                        <td align="center">'.$po["currency"] .'</td>
                        <td align="center">'. $po["installmentCount"] .'</td>
                        <td align="center">'. $po["installmentOrder"] .'</td>
                    </tr>';
        }
        $response .= '</tbody>';
        damp($response);
    }

    if (post('changeBankId')){
        if (isset($_POST['changeBankId'])){
            if (count(post('changeBankId')) <= 1){
                $urlString = "?\$filter=posBankId%20eq%20".post('changeBankId')[0];
            }else{
                for ($i=0;$i<count(post('changeBankId'));$i++){
                    if ($i == 0){
                        $urlString = "?\$filter=posBankId%20eq%20".post('changeBankId')[$i];
                    }else{
                        $urlString .= "%20or%20posBankId%20eq%20".post('changeBankId')[$i];
                    }
                }
            }
        }

        $posd = api::API_url(baseUrl.'/PosTransaction'.$urlString);

        $listMember = [];
        foreach ($posd["value"] as $po){
            if (!in_array($po['memberWorkplaceName'],$listMember)){
                $listMember[] = $po["memberWorkplaceName"];
            }
        }

        damp(json_encode($listMember));
    }
    if (post('changeMember')){
        if (isset($_POST['changeMember'])){
            if (count(post('changeMember')) <= 1){
                $urlString = "?\$filter=memberWorkplaceName%20eq%20".post('changeMember')[0];
            }else{
                for ($i=0;$i<count(post('changeMember'));$i++){
                    if ($i == 0){
                        $urlString = "?\$filter=memberWorkplaceName20eq%20".post('changeMember')[$i];
                    }else{
                        $urlString .= "%20or%20memberWorkplaceName%20eq%20".post('changeMember')[$i];
                    }
                }
            }
        }

        $posd = api::API_url(baseUrl.'/PosTransaction'.$urlString);

        $bankList = [];
        foreach ($posd["value"] as $po){
            $bankList['bankId'][] = $po['posBankId'];
            $bankList['bankName'][] = $po['posBankName'];
        }

        damp(json_encode($listMember));
    }

    require view('pos');
}else{
    header("Location:".site_url('yetkisiz'));
}
