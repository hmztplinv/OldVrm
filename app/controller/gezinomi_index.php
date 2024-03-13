<?php
if (!session('user_id')){
    header("Location:" .site_url('login'));
}
if (session('auth')['travelSub']['gezinomiIndex'] != 0) {
//    session('flight')['contactmail'] = $_SESSION['contactmail'];
//    session('flight')['contactphone'] = "dsa";
//    session('flight')['contactname'] = "dsa";
    $ticket = Parameters::get_parameters('flightPageId','flightPageName');
    $spe_ticket = Parameters::specific_parameter('flightPageId','flightPageName','1');
    $gezinomi=gezinomi::get_gezinomi_admin();
    unset($_SESSION['contactmail']);
    unset($_SESSION['contactphone']);
    unset($_SESSION['contactname']);
    unset($_SESSION['contactsurname']);
    unset($_SESSION['shoppingId']);
    unset($_SESSION['selection']);
    unset($_SESSION['FareCode']);
    unset($_SESSION['pax_code']);
    unset($_SESSION['old_shoppingId']);
    unset($_SESSION['is_old']);
    unset($_SESSION['passanger']);
    unset($_SESSION['paxcount']);
    unset($_SESSION['SessionToken']);
    unset($_SESSION['pageid']);
    unset($_SESSION['product_id']);
    unset($_SESSION['pnr']);
    unset($_SESSION['FlightNumber']);
    unset($_SESSION['DepartureAirportName']);
    unset($_SESSION['DepartureDate']);
    unset($_SESSION['DepartureTime']);
    unset($_SESSION['ArrivalAirportName']);
    unset($_SESSION['ArrivalDate']);
    unset($_SESSION['totalfare']);
    unset($_SESSION['ArrivalTime']);
    unset($_SESSION['price']);
    unset($_SESSION['Currency']);
    unset($_SESSION['RefundableType']);
    unset($_SESSION['FlightType']);
    unset($_SESSION['CabinType']);
    unset($_SESSION['selection2']);
    unset($_SESSION['FareCode2']);
    unset($_SESSION['Gidisucagi']);
    unset($_SESSION['donusucagi']);
    unset($_SESSION['ticketnumber']);
    unset($_SESSION['ArrivalDay']);
    unset($_SESSION['DepartureDay']);
    unset($_SESSION['AirportCode1']);
    unset($_SESSION['AirportCode']);
    unset($_SESSION['FareDisplayType']);
    unset($_SESSION['SessionId']);
    unset($_SESSION['passanger']);
    unset($_SESSION['Provider']);
    unset($_SESSION['BaseFare']);
    unset($_SESSION['ServiceFee']);
    unset($_SESSION['TicketNo']);
    unset($_SESSION['notformattedDep']);
    unset($_SESSION['notformattedArr']);
    unset($_SESSION['acente']);
    unset($_SESSION['Ifcompany']);
    unset($_SESSION['namesurname']);
    unset($_SESSION['taxOffice']);
    unset($_SESSION['taxNo']);
    unset($_SESSION['il']);
    unset($_SESSION['ilce']);
    unset($_SESSION['postCode']);
    unset($_SESSION['adress']);
    $data = array(
        "Username" => "Arkgsa",
        "Password" => "3paPVcsbbpf5Lwj",
        "IpAddress"=> "string",
        "IsTest" => true
    );
    $json_data = json_encode($data);
    // cURL isteği oluştur
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Login");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_data)
    ));

    // İsteği gönder ve cevabı al
    $response = curl_exec($ch);

    curl_close($ch);

    // Cevabı işled
    $response_data = json_decode($response, true);

    $sessionid=$response_data['SessionId'];
    $sessiontoken=$response_data['SessionToken'];
    $data = array(
        "SessionId" => $sessionid,
        "SessionToken" => $sessiontoken,

    );
    $json_data = json_encode($data);

    // cURL isteği oluştur
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Airport/Get");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_data)
    ));

    // İsteği gönder ve cevabı al
    $response = curl_exec($ch);

    curl_close($ch);

    // Cevabı işled
    $response_data = json_decode($response, true);



    require view('gezinomi_index');
}
