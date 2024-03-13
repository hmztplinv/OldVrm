<?php
if (!session('user_id')){
    header("Location:" .site_url('login'));
}


if (session('auth')['travelSub']['ticketSelection'] != 0) {

    header_remove("Expires");
    header_remove("Cache-Control");
    header_remove("Pragma");
    header_remove("Last-Modified");

    $turkishDays = array("Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi");
    $data = array(
        "Username" => "Arkgsa",
        "Password" => "3paPVcsbbpf5Lwj",
        "IpAddress"=> "string",
        "IsTest" => false
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

    $_SESSION['SessionId']=$response_data['SessionId'];
    $_SESSION['SessionToken']=$response_data['SessionToken'];





    // response_data içinde cevap verisi olacak



    if (post('plane')){


        $_SESSION['acente']=post('acentefiyat');

        $gidisyeri=post('gidisyeri');
        $ilkBolum = explode(',', $gidisyeri)[0];
        $donusyeri=post('donusyeri');
        $ikinci = explode(',', $donusyeri)[0];
        $_SESSION['Gidisucagi']=$ilkBolum;
        $_SESSION['donusucagi']=$ikinci;
        $_SESSION['FareDisplayType']=post('FareDisplayType');
        $_SESSION['AirportCode']=post('AirportCode');
        $_SESSION['AirportCode1']=post('AirportCode1');
        $_SESSION['Currency']=post('Currency');


        $_SESSION['CabinType']=post('CabinType');
        $_SESSION['FlightType']=post('FlightType');
        $_SESSION['RefundableType']=post('RefundableType');
        $_SESSION['DepartureAirportName']=post('DepartureAirportName');




        $_SESSION['notformattedDep']=$date = post('DepartureDay');
        $formatted_dates_departure = strftime('%d.%m.%Y', strtotime($date));
        $_SESSION['DepartureDay']=$formatted_dates_departure;
        $_SESSION['notformattedArr']=$arrivalDate = post('ArrivalDay');
        $formatted_dates_arrival= strftime('%d.%m.%Y', strtotime($arrivalDate));
        $_SESSION['ArrivalDay']=$formatted_dates_arrival;
        $timestamp = strtotime($date);
        $formatted_date = date('Y-m-d\TH:i:s.u\Z', $timestamp);

        $planearrival = [];
        $aircode=post('AirportCode');
        $aircode1=post('AirportCode1');
        if (!empty($arrivalDate)) {
            $timestamp_arrival = strtotime($arrivalDate);
            $formatted_date_arrival = date('Y-m-d\TH:i:s.u\Z', $timestamp_arrival);
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $formatted_date,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ],[
                "SequenceNo" => 2,
                "DepartureDay" => $formatted_date_arrival,
                "Origin" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ]
            ]
            ];
        }
        else{
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $formatted_date,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ]
            ];
        }



        //passangers
        $passanger=[];
        if(post('ADT')>0){
            array_push($passanger,array('PaxCode'=>'ADT','PaxCount'=>post('ADT')));
        }
        if(post('CHD')>0){
            array_push($passanger,array('PaxCode'=>'CHD','PaxCount'=>post('CHD')));
        }
        if(post('INF')>0){
            array_push($passanger,array('PaxCode'=>'INF','PaxCount'=>post('INF')));
        }

        $jpassanger=urlencode(json_encode($passanger,true));

        $total_passanger=0;
        foreach($passanger as $item){
            $total_passanger=$total_passanger+$item['PaxCount'];
        }
        $_SESSION['passanger']=$passanger;
        $_SESSION['paxcount']=$total_passanger;
        $air = [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "AirSearchOptions" => [
                "FlightType" =>   "OW",
                "CabinType" => $_SESSION['CabinType'],
                "CabinTypeOptions" => [
                    [
                        "Airline" => "THY",
                        "IncludeBusinessClass" => true
                    ]
                ],
                "RefundableType" =>  $_SESSION['RefundableType'],
                "Currency" => $_SESSION['Currency'],
                "FareDisplayType" => $_SESSION['FareDisplayType'],
                "PreferedAirlines" => [
                    "string"
                ],
                "MarkupFareList" => $_SESSION['acente'],
                "CompanyCode" => "string",
                "DirectFlightsOnly" => false,
                "AvailableFlightsOnly" => false,
                "SelectableFaresOnly" => true
            ],
            "AirSearchPaxItems" =>$passanger,
            "AirSearchSegments" =>  $planearrival
        ];

        $json_air=json_encode($air);
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Search");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_air);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_air)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);

        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);

        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';

        }
        $departure = [];
        $arrival = [];
        foreach ($response_data['OriginDestinationOptions'] as $item){
            if ($item['FlightSegments'][0]['DirectionInd'] ==  0)
            {
                //damp('work');
                $departure[] = $item;
            }
            if ($item['FlightSegments'][0]['DirectionInd']==1){
                $arrival[] = $item;

            }
        }

        $aktarmagidis = [];
        $aktarmadonus = [];
        $aktarmasizgidis=[];
        $aktarmasizdonus=[];


        $highest_fare = $departure[0]['SelectableFares'][0]['TotalFare'];
        $lowest_fare = 0;
        $lowest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($departure as $item) {
            if ($item['TotalFare'] > $highest_fare) {
                $highest_fare = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowest_fare || $lowest_fare == 0) {
                $lowest_fare = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowest_duration) {
                    $lowest_duration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highest_duration) {
                    $highest_duration = $segment['JourneyDurationInMinute'];
                }
            }
        }


        $lowdonus=0;
        $highdonus=$arrival[0]['SelectableFares'][0]['TotalFare'];
        $lowdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($arrival as $item) {
            if ($item['TotalFare'] > $highdonus) {
                $highdonus = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowdonus || $lowdonus == 0) {
                $lowdonus = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowdonusduration) {
                    $lowdonusduration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highdonusduration) {
                    $highdonusduration = $segment['JourneyDurationInMinute'];
                }
            }
        }

        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmagidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmadonus[] = $item;
            }
        }
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizgidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizdonus[] = $item;
            }
        }

        $user_ticket=user_ticket::insert_user_ticket();

    }
    if (post('ticketfound')){

        $_SESSION['notformattedDep']=$date = post('DepartureDay');
        $formatted_dates_departure = strftime('%d.%m.%Y', strtotime($date));
        $_SESSION['DepartureDay']=$formatted_dates_departure;
        $_SESSION['notformattedArr']=$arrivalDate = post('ArrivalDay');
        $formatted_dates_arrival= strftime('%d.%m.%Y', strtotime($arrivalDate));
        $_SESSION['ArrivalDay']=$formatted_dates_arrival;
        $timestamp = strtotime($date);
        $formatted_date = date('Y-m-d\TH:i:s.u\Z', $timestamp);

        $planearrival = [];
        $aircode=post('AirportCode');
        $aircode1=post('AirportCode1');
        $_SESSION['AirportCode']=post('AirportCode');
        $_SESSION['AirportCode1']=post('AirportCode1');
        if (!empty($arrivalDate)) {
            $timestamp_arrival = strtotime($arrivalDate);
            $formatted_date_arrival = date('Y-m-d\TH:i:s.u\Z', $timestamp_arrival);
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $formatted_date,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ],[
                "SequenceNo" => 2,
                "DepartureDay" => $formatted_date_arrival,
                "Origin" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ]
            ]
            ];
        }
        else{
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $formatted_date,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ]
            ];
        }
        //passangers
        $passanger=[];
        if(post('ADT')>0){
            array_push($passanger,array('PaxCode'=>'ADT','PaxCount'=>post('ADT')));
        }
        if(post('CHD')>0){
            array_push($passanger,array('PaxCode'=>'CHD','PaxCount'=>post('CHD')));
        }
        if(post('INF')>0){
            array_push($passanger,array('PaxCode'=>'INF','PaxCount'=>post('INF')));
        }

        $jpassanger=urlencode(json_encode($passanger,true));

        $total_passanger=0;
        foreach($passanger as $item){
            $total_passanger=$total_passanger+$item['PaxCount'];
        }
        $_SESSION['passanger']=$passanger;
        $_SESSION['paxcount']=$total_passanger;

        $air = [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "AirSearchOptions" => [
                "FlightType" =>   "OW",
                "CabinType" => $_SESSION['CabinType'],
                "CabinTypeOptions" => [
                    [
                        "Airline" => "THY",
                        "IncludeBusinessClass" => true
                    ]
                ],
                "RefundableType" =>  $_SESSION['RefundableType'],
                "Currency" => $_SESSION['Currency'],
                "FareDisplayType" => $_SESSION['FareDisplayType'],
                "PreferedAirlines" => [
                    "string"
                ],
                "MarkupFareList" => $_SESSION['acente'],
                "CompanyCode" => "string",
                "DirectFlightsOnly" => false,
                "AvailableFlightsOnly" => false,
                "SelectableFaresOnly" => true
            ],
            "AirSearchPaxItems" =>$_SESSION['passanger'],
            "AirSearchSegments" =>  $planearrival
        ];
        $json_air=json_encode($air);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Search");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_air);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_air)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);
        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';
        }
        $departure = [];
        $arrival = [];
        foreach ($response_data['OriginDestinationOptions'] as $item){
            if ($item['FlightSegments'][0]['DirectionInd'] ==  0)
            {
                //damp('work');
                $departure[] = $item;
            }
            if ($item['FlightSegments'][0]['DirectionInd']==1){
                $arrival[] = $item;
            }
        }
        $aktarmagidis = [];
        $aktarmadonus = [];
        $aktarmasizgidis=[];
        $aktarmasizdonus=[];
        setlocale(LC_TIME, 'tr_TR.utf8');
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmagidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmadonus[] = $item;
            }
        }
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizgidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizdonus[] = $item;
            }
        }
        $highest_fare = $departure[0]['SelectableFares'][0]['TotalFare'];
        $lowest_fare = 0;
        $lowest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($departure as $item) {
            if ($item['TotalFare'] > $highest_fare) {
                $highest_fare = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowest_fare || $lowest_fare == 0) {
                $lowest_fare = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowest_duration) {
                    $lowest_duration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highest_duration) {
                    $highest_duration = $segment['JourneyDurationInMinute'];
                }
            }
        }


        $lowdonus=0;
        $highdonus=$arrival[0]['SelectableFares'][0]['TotalFare'];
        $lowdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($arrival as $item) {
            if ($item['TotalFare'] > $highdonus) {
                $highdonus = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowdonus || $lowdonus == 0) {
                $lowdonus = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowdonusduration) {
                    $lowdonusduration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highdonusduration) {
                    $highdonusduration = $segment['JourneyDurationInMinute'];
                }
            }
        }


    }
    if (post('oncekigun')){
        if ($_SESSION['ArrivalDay']=='01.01.1970'){
            unset($_SESSION['ArrivalDay']);
        }
        $_SESSION['notformattedDep']=$date = $_SESSION['DepartureDay'];

        $formatted_dates_departure = strftime('%d.%m.%Y', strtotime($date));
        $_SESSION['DepartureDay']=$formatted_dates_departure;
        $_SESSION['notformattedArr']=$arrivalDate =  $_SESSION['ArrivalDay'];

        $formatted_dates_arrival= strftime('%d.%m.%Y', strtotime($arrivalDate));
        $_SESSION['ArrivalDay']=$formatted_dates_arrival;
        $timestamp = strtotime($date);
        $formatted_date = date('Y-m-d\TH:i:s.u\Z', $timestamp);
        $yesterday = date('Y-m-d\TH:i:s.u\Z', strtotime($formatted_date . ' -1 day'));
        $_SESSION['DepartureDay']=date('d.m.Y', strtotime($formatted_date . ' -1 day'));

        $planearrival = [];
        $aircode=post('AirportCode');
        $aircode1=post('AirportCode1');
        if (!empty($arrivalDate)) {
            $timestamp_arrival = strtotime($arrivalDate);
            $formatted_date_arrival = date('Y-m-d\TH:i:s.u\Z', $timestamp_arrival);

            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ],[
                "SequenceNo" => 2,
                "DepartureDay" => $formatted_date_arrival,
                "Origin" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ]
            ]
            ];
        }
        else{
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ]
            ];
        }

        $air = [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "AirSearchOptions" => [
                "FlightType" =>   "OW",
                "CabinType" => $_SESSION['CabinType'],
                "CabinTypeOptions" => [
                    [
                        "Airline" => "THY",
                        "IncludeBusinessClass" => true
                    ]
                ],
                "RefundableType" =>  $_SESSION['RefundableType'],
                "Currency" => $_SESSION['Currency'],
                "FareDisplayType" => $_SESSION['FareDisplayType'],
                "PreferedAirlines" => [
                    "string"
                ],
                "MarkupFareList" => $_SESSION['acente'],
                "CompanyCode" => "string",
                "DirectFlightsOnly" => false,
                "AvailableFlightsOnly" => false,
                "SelectableFaresOnly" => true
            ],
            "AirSearchPaxItems" =>$_SESSION['passanger'],
            "AirSearchSegments" =>  $planearrival
        ];


        $json_air=json_encode($air);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Search");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_air);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_air)
        ));

        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);

        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);
        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';
        }
        $departure = [];
        $arrival = [];
        foreach ($response_data['OriginDestinationOptions'] as $item){
            if ($item['FlightSegments'][0]['DirectionInd'] ==  0)
            {
                //damp('work');
                $departure[] = $item;
            }
            if ($item['FlightSegments'][0]['DirectionInd']==1){
                $arrival[] = $item;
            }
        }
        $aktarmagidis = [];
        $aktarmadonus = [];
        $aktarmasizgidis=[];
        $aktarmasizdonus=[];


        setlocale(LC_TIME, 'tr_TR.utf8');
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmagidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmadonus[] = $item;
            }
        }
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizgidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizdonus[] = $item;
            }
        }
        $highest_fare = $departure[0]['SelectableFares'][0]['TotalFare'];
        $lowest_fare = 0;
        $lowest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($departure as $item) {
            if ($item['TotalFare'] > $highest_fare) {
                $highest_fare = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowest_fare || $lowest_fare == 0) {
                $lowest_fare = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowest_duration) {
                    $lowest_duration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highest_duration) {
                    $highest_duration = $segment['JourneyDurationInMinute'];
                }
            }
        }


        $lowdonus=0;
        $highdonus=$arrival[0]['SelectableFares'][0]['TotalFare'];
        $lowdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($arrival as $item) {
            if ($item['TotalFare'] > $highdonus) {
                $highdonus = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowdonus || $lowdonus == 0) {
                $lowdonus = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowdonusduration) {
                    $lowdonusduration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highdonusduration) {
                    $highdonusduration = $segment['JourneyDurationInMinute'];
                }
            }
        }
    }

    if (post('sonrakigun')){
        if ($_SESSION['ArrivalDay']=='01.01.1970'){
            unset($_SESSION['ArrivalDay']);
        }

        $_SESSION['notformattedDep'] = $date = $_SESSION['DepartureDay'];

        $formatted_dates_departure = strftime('%d.%m.%Y', strtotime($date));
        $_SESSION['DepartureDay']=$formatted_dates_departure;
        $_SESSION['notformattedArr']=$arrivalDate =  $_SESSION['ArrivalDay'];

        $formatted_dates_arrival= strftime('%d.%m.%Y', strtotime($arrivalDate));
        $_SESSION['ArrivalDay']=$formatted_dates_arrival;
        $timestamp = strtotime($date);
        $formatted_date = date('Y-m-d\TH:i:s.u\Z', $timestamp);
        $yesterday = date('Y-m-d\TH:i:s.u\Z', strtotime($formatted_date . ' +1 day'));
        $_SESSION['DepartureDay']=date('d.m.Y', strtotime($formatted_date . ' +1 day'));


        $planearrival = [];
        $aircode=post('AirportCode');
        $aircode1=post('AirportCode1');
        if (!empty($arrivalDate)) {
            $timestamp_arrival = strtotime($arrivalDate);
            $formatted_date_arrival = date('Y-m-d\TH:i:s.u\Z', $timestamp_arrival);

            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ],[
                "SequenceNo" => 2,
                "DepartureDay" => $formatted_date_arrival,
                "Origin" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ]
            ]
            ];
        }
        else{
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ]
            ];
        }

        $air = [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "AirSearchOptions" => [
                "FlightType" =>   "OW",
                "CabinType" => $_SESSION['CabinType'],
                "CabinTypeOptions" => [
                    [
                        "Airline" => "THY",
                        "IncludeBusinessClass" => true
                    ]
                ],
                "RefundableType" =>  $_SESSION['RefundableType'],
                "Currency" => $_SESSION['Currency'],
                "FareDisplayType" => $_SESSION['FareDisplayType'],
                "PreferedAirlines" => [
                    "string"
                ],
                "MarkupFareList" => $_SESSION['acente'],
                "CompanyCode" => "string",
                "DirectFlightsOnly" => false,
                "AvailableFlightsOnly" => false,
                "SelectableFaresOnly" => true
            ],
            "AirSearchPaxItems" =>$_SESSION['passanger'],
            "AirSearchSegments" =>  $planearrival
        ];

        $json_air=json_encode($air);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Search");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_air);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_air)
        ));

        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);

        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);
        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';
        }
        $departure = [];
        $arrival = [];
        foreach ($response_data['OriginDestinationOptions'] as $item){
            if ($item['FlightSegments'][0]['DirectionInd'] ==  0)
            {
                //damp('work');
                $departure[] = $item;
            }
            if ($item['FlightSegments'][0]['DirectionInd']==1){
                $arrival[] = $item;
            }
        }
        $aktarmagidis = [];
        $aktarmadonus = [];
        $aktarmasizgidis=[];
        $aktarmasizdonus=[];


        setlocale(LC_TIME, 'tr_TR.utf8');
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmagidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmadonus[] = $item;
            }
        }
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizgidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizdonus[] = $item;
            }
        }
        $highest_fare = $departure[0]['SelectableFares'][0]['TotalFare'];
        $lowest_fare = 0;
        $lowest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($departure as $item) {
            if ($item['TotalFare'] > $highest_fare) {
                $highest_fare = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowest_fare || $lowest_fare == 0) {
                $lowest_fare = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowest_duration) {
                    $lowest_duration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highest_duration) {
                    $highest_duration = $segment['JourneyDurationInMinute'];
                }
            }
        }


        $lowdonus=0;
        $highdonus=$arrival[0]['SelectableFares'][0]['TotalFare'];
        $lowdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($arrival as $item) {
            if ($item['TotalFare'] > $highdonus) {
                $highdonus = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowdonus || $lowdonus == 0) {
                $lowdonus = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowdonusduration) {
                    $lowdonusduration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highdonusduration) {
                    $highdonusduration = $segment['JourneyDurationInMinute'];
                }
            }
        }
    }
    if (post('donusoncekigun')){
        if ($_SESSION['ArrivalDay']=='01.01.1970'){
            unset($_SESSION['ArrivalDay']);
        }
        $_SESSION['notformattedDep']=$date = $_SESSION['DepartureDay'];

        $formatted_dates_departure = strftime('%d.%m.%Y', strtotime($date));
        $_SESSION['DepartureDay']=$formatted_dates_departure;
        $_SESSION['notformattedArr']=$arrivalDate =  $_SESSION['ArrivalDay'];

        $formatted_dates_arrival= strftime('%d.%m.%Y', strtotime($arrivalDate));
        $_SESSION['ArrivalDay']=$formatted_dates_arrival;
        $timestamp = strtotime($date);
        $formatted_date = date('Y-m-d\TH:i:s.u\Z', $timestamp);


        $planearrival = [];
        $aircode=post('AirportCode');
        $aircode1=post('AirportCode1');
        if (!empty($arrivalDate)) {

            $timestamp_arrival = strtotime($arrivalDate);
            $formatted_date_arrival = date('Y-m-d\TH:i:s.u\Z', $timestamp_arrival);
            $yesterday = date('Y-m-d\TH:i:s.u\Z', strtotime($formatted_date_arrival . ' -1 day'));
            $_SESSION['ArrivalDay']=date('d.m.Y', strtotime($formatted_date_arrival . ' -1 day'));
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $formatted_date,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ],[
                "SequenceNo" => 2,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ]
            ]
            ];

        }
        else{
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ]
            ];
        }

        $air = [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "AirSearchOptions" => [
                "FlightType" =>   "OW",
                "CabinType" => $_SESSION['CabinType'],
                "CabinTypeOptions" => [
                    [
                        "Airline" => "THY",
                        "IncludeBusinessClass" => true
                    ]
                ],
                "RefundableType" =>  $_SESSION['RefundableType'],
                "Currency" => $_SESSION['Currency'],
                "FareDisplayType" => $_SESSION['FareDisplayType'],
                "PreferedAirlines" => [
                    "string"
                ],
                "MarkupFareList" => $_SESSION['acente'],
                "CompanyCode" => "string",
                "DirectFlightsOnly" => false,
                "AvailableFlightsOnly" => false,
                "SelectableFaresOnly" => true
            ],
            "AirSearchPaxItems" =>$_SESSION['passanger'],
            "AirSearchSegments" =>  $planearrival
        ];


        $json_air=json_encode($air);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Search");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_air);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_air)
        ));

        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);

        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);
        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';
        }
        $departure = [];
        $arrival = [];
        foreach ($response_data['OriginDestinationOptions'] as $item){
            if ($item['FlightSegments'][0]['DirectionInd'] ==  0)
            {
                //damp('work');
                $departure[] = $item;
            }
            if ($item['FlightSegments'][0]['DirectionInd']==1){
                $arrival[] = $item;
            }
        }
        $aktarmagidis = [];
        $aktarmadonus = [];
        $aktarmasizgidis=[];
        $aktarmasizdonus=[];


        setlocale(LC_TIME, 'tr_TR.utf8');
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmagidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmadonus[] = $item;
            }
        }
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizgidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizdonus[] = $item;
            }
        }
        $highest_fare = $departure[0]['SelectableFares'][0]['TotalFare'];
        $lowest_fare = 0;
        $lowest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($departure as $item) {
            if ($item['TotalFare'] > $highest_fare) {
                $highest_fare = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowest_fare || $lowest_fare == 0) {
                $lowest_fare = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowest_duration) {
                    $lowest_duration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highest_duration) {
                    $highest_duration = $segment['JourneyDurationInMinute'];
                }
            }
        }


        $lowdonus=0;
        $highdonus=$arrival[0]['SelectableFares'][0]['TotalFare'];
        $lowdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($arrival as $item) {
            if ($item['TotalFare'] > $highdonus) {
                $highdonus = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowdonus || $lowdonus == 0) {
                $lowdonus = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowdonusduration) {
                    $lowdonusduration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highdonusduration) {
                    $highdonusduration = $segment['JourneyDurationInMinute'];
                }
            }
        }
    }
    if (post('donussonrakigun')){
        if ($_SESSION['ArrivalDay']=='01.01.1970'){
            unset($_SESSION['ArrivalDay']);
        }
        $_SESSION['notformattedDep']=$date = $_SESSION['DepartureDay'];

        $formatted_dates_departure = strftime('%d.%m.%Y', strtotime($date));
        $_SESSION['DepartureDay']=$formatted_dates_departure;
        $_SESSION['notformattedArr']=$arrivalDate =  $_SESSION['ArrivalDay'];

        $formatted_dates_arrival= strftime('%d.%m.%Y', strtotime($arrivalDate));
        $_SESSION['ArrivalDay']=$formatted_dates_arrival;
        $timestamp = strtotime($date);
        $formatted_date = date('Y-m-d\TH:i:s.u\Z', $timestamp);


        $planearrival = [];
        $aircode=post('AirportCode');
        $aircode1=post('AirportCode1');
        if (!empty($arrivalDate)) {

            $timestamp_arrival = strtotime($arrivalDate);
            $formatted_date_arrival = date('Y-m-d\TH:i:s.u\Z', $timestamp_arrival);
            $yesterday = date('Y-m-d\TH:i:s.u\Z', strtotime($formatted_date_arrival . ' +1 day'));
            $_SESSION['ArrivalDay']=date('d.m.Y', strtotime($formatted_date_arrival . ' +1 day'));
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $formatted_date,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ],[
                "SequenceNo" => 2,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" =>  $_SESSION['AirportCode1'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ]
            ]
            ];

        }
        else{
            $planearrival = [[
                "SequenceNo" => 1,
                "DepartureDay" => $yesterday,
                "Origin" => [
                    "AirportCode" => $_SESSION['AirportCode'],
                    "IsCity" => true
                ],
                "Destination" => [
                    "AirportCode" => $_SESSION['AirportCode1'],
                    "IsCity" => true
                ]
            ]
            ];
        }

        $air = [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "AirSearchOptions" => [
                "FlightType" =>   "OW",
                "CabinType" => $_SESSION['CabinType'],
                "CabinTypeOptions" => [
                    [
                        "Airline" => "THY",
                        "IncludeBusinessClass" => true
                    ]
                ],
                "RefundableType" =>  $_SESSION['RefundableType'],
                "Currency" => $_SESSION['Currency'],
                "FareDisplayType" => $_SESSION['FareDisplayType'],
                "PreferedAirlines" => [
                    "string"
                ],
                "MarkupFareList" => $_SESSION['acente'],
                "CompanyCode" => "string",
                "DirectFlightsOnly" => false,
                "AvailableFlightsOnly" => false,
                "SelectableFaresOnly" => true
            ],
            "AirSearchPaxItems" =>$_SESSION['passanger'],
            "AirSearchSegments" =>  $planearrival
        ];


        $json_air=json_encode($air);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Search");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_air);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_air)
        ));

        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);

        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);
        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';
        }
        $departure = [];
        $arrival = [];
        foreach ($response_data['OriginDestinationOptions'] as $item){
            if ($item['FlightSegments'][0]['DirectionInd'] ==  0)
            {
                //damp('work');
                $departure[] = $item;
            }
            if ($item['FlightSegments'][0]['DirectionInd']==1){
                $arrival[] = $item;
            }
        }
        $aktarmagidis = [];
        $aktarmadonus = [];
        $aktarmasizgidis=[];
        $aktarmasizdonus=[];


        setlocale(LC_TIME, 'tr_TR.utf8');
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmagidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==1) {
                $aktarmadonus[] = $item;
            }
        }
        foreach ($departure as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizgidis[] = $item;
            }
        }
        foreach ($arrival as $item){

            if ($item['FlightSegments'][0]['IsConnected']==null) {
                $aktarmasizdonus[] = $item;
            }
        }
        $highest_fare = $departure[0]['SelectableFares'][0]['TotalFare'];
        $lowest_fare = 0;
        $lowest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highest_duration = $departure[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($departure as $item) {
            if ($item['TotalFare'] > $highest_fare) {
                $highest_fare = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowest_fare || $lowest_fare == 0) {
                $lowest_fare = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowest_duration) {
                    $lowest_duration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highest_duration) {
                    $highest_duration = $segment['JourneyDurationInMinute'];
                }
            }
        }


        $lowdonus=0;
        $highdonus=$arrival[0]['SelectableFares'][0]['TotalFare'];
        $lowdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        $highdonusduration=$arrival[0]['FlightSegments'][0]['JourneyDurationInMinute'];
        foreach ($arrival as $item) {
            if ($item['TotalFare'] > $highdonus) {
                $highdonus = $item['SelectableFares'][0]['TotalFare'];
            }
            if ($item['TotalFare'] < $lowdonus || $lowdonus == 0) {
                $lowdonus = $item['TotalFare'];
            }
            foreach ($item['FlightSegments'] as $segment) {
                if ($segment['JourneyDurationInMinute'] < $lowdonusduration) {
                    $lowdonusduration = $segment['JourneyDurationInMinute'];
                }
                if ($segment['JourneyDurationInMinute'] > $highdonusduration) {
                    $highdonusduration = $segment['JourneyDurationInMinute'];
                }
            }
        }
    }

    require view('ticket_selection');



}