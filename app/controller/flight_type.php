<?php
if (!session('user_id')){
    header("Location:" .site_url('login'));
}
if (session('auth')['travelSub']['gezinomiIndex'] != 0) {

    $expires = date('D, d M Y H:i:s', time() + 600);  // 600 saniye = 10 dakika
    header("Expires: " . $expires . " GMT");
    header("Cache-Control: max-age=2592000");  // 30 gün
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

    $turkishDays = array("Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi");
    $gidisveri=json_decode(urldecode(post('gidisVeri')),true);


    $donusveri=json_decode(urldecode(post('donusVeri')),true);

    $totalEF = 0;
    $totalXF = 0;
    $totalPF = 0;
    $totalBU = 0;
    $baseEF = 0;
    $baseXF = 0;
    $basePF = 0;
    $baseBU = 0;
    $serviceFeeEF = 0;
    $serviceFeeXF = 0;
    $serviceFeePF = 0;
    $serviceFeeBU = 0;

    foreach ($gidisveri['SelectableFares'] as $item) {
        if ($item['FareCode'] === 'EF') {
            $totalEF += (float) $item['TotalFare'];
            $baseEF += (float) $item['BaseFare'];
            $serviceFeeEF += (float) $item['ServiceFee'];
        } elseif ($item['FareCode'] === 'XF') {
            $totalXF += (float) $item['TotalFare'];
            $baseXF += (float) $item['BaseFare'];
            $serviceFeeXF += (float) $item['ServiceFee'];
        } elseif ($item['FareCode'] === 'PF') {
            $totalPF += (float) $item['TotalFare'];
            $basePF += (float) $item['BaseFare'];
            $serviceFeePF += (float) $item['ServiceFee'];
        } elseif ($item['FareCode'] === 'BU') {
            $totalBU += (float) $item['TotalFare'];
            $baseBU += (float) $item['BaseFare'];
            $serviceFeeBU += (float) $item['ServiceFee'];
        }
    }
    $totalEF_return = 0;
    $totalXF_return = 0;
    $totalPF_return = 0;
    $totalBU_return = 0;
    $baseEF_return = 0;
    $baseXF_return = 0;
    $basePF_return = 0;
    $baseBU_return = 0;
    $serviceFeeEF_return = 0;
    $serviceFeeXF_return = 0;
    $serviceFeePF_return = 0;
    $serviceFeeBU_return = 0;

    foreach ($donusveri['SelectableFares'] as $item) {
        if ($item['FareCode'] === 'EF') {
            $totalEF_return += (float) $item['TotalFare'];
            $baseEF_return += (float) $item['BaseFare'];
            $serviceFeeEF_return += (float) $item['ServiceFee'];
        } elseif ($item['FareCode'] === 'XF') {
            $totalXF_return += (float) $item['TotalFare'];
            $baseXF_return += (float) $item['BaseFare'];
            $serviceFeeXF_return += (float) $item['ServiceFee'];
        } elseif ($item['FareCode'] === 'PF') {
            $totalPF_return += (float) $item['TotalFare'];
            $basePF_return += (float) $item['BaseFare'];
            $serviceFeePF_return += (float) $item['ServiceFee'];
        } elseif ($item['FareCode'] === 'BU') {
            $totalBU_return += (float) $item['TotalFare'];
            $baseBU_return += (float) $item['BaseFare'];
            $serviceFeeBU_return += (float) $item['ServiceFee'];
        }
    }





    require view('flight_type');
}
