<?php
if (!session('user_id')){
    header("Location:" .site_url('login'));
}

if (session('auth')['travelSub']['reservation'] != 0) {

    if(post('selection')){





        $parts = explode(" ", post('card-selection'));

        $productId = $parts[0];
        $fareCode = $parts[1];
        $_SESSION['selection']=$productId;
        $_SESSION['FareCode']=$fareCode;

        $parts2 = explode(" ", post('card-selection1'));
        $productId2 = $parts2[0];
        $fareCode2 = $parts2[1];

        $_SESSION['selection2']=$productId2;
        $_SESSION['FareCode2']=$fareCode2;
        $radio2=post('card-selection1');
        $allocate=[];

        if (!empty($radio2)){
            $allocate=[[
                "ProductId" =>  $_SESSION['selection'],
                "FareCode" =>$_SESSION['FareCode'],
                "MarkupFare" => 0,
                "SetServiceFare" => 0
            ],[
                "ProductId" =>  $_SESSION['selection2'],
                "FareCode" =>$_SESSION['FareCode2'],
                "MarkupFare" => 0,
                "SetServiceFare" => 0
            ]];
        }
        else{
            $allocate=[[
                "ProductId" =>  $_SESSION['selection'],
                "FareCode" =>$_SESSION['FareCode'],
                "MarkupFare" => 0,
                "SetServiceFare" => 0
            ]];
        }
        $selection= [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" => $_SESSION['SessionToken']
            ],
            "AllocateItems" => $allocate,
            "CreateShoppingCart" => true,
            "IncludeBags" => false,
            "IncludedBags" => [
                ""
            ],
            "IsYdus"=>false

        ];



        $select=json_encode($selection);

        $ch = curl_init();
 
 	
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Allocate");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $select);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($select)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);

        // Cevabı işle
        $response_data = json_decode($response, true);


        $_SESSION['shoppingId']=$response_data['ShoppingCart']['Id'];
        $user_ticket_reservation_update=user_ticket::update_user_ticket_reservation();

        $pax_code_and_ref=[];
        foreach ($response_data['ShoppingCart']['AirBookings'][0]['PassengerBreakdowns'] as $item){
            array_push($pax_code_and_ref,array(
                    'PaxCode'=>$item['PaxReference']['PaxCode'],
                    'PaxReferanceId'=>$item['PaxReference']['PaxReferanceId']
                )
            );
            $_SESSION['pax_code']=$pax_code_and_ref;

        }

        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);
            $message['redirects'] = 'gezinomi_index';
        }

    }
    else{


        $selection= [
            "SessionHeader" => [
                "SessionId" => $_SESSION['sessionId'],
                "SessionToken" => $_SESSION['SessionToken']
            ],
            "AllocateItems" => [
                [
                    "ProductId" => $_SESSION['selection'],
                    "FareCode" => $_SESSION['FareCode'],
                    "MarkupFare" => 0,
                    "SetServiceFare" => 0
                ]
            ],
            "CreateShoppingCart" => true,
            "IncludeBags" => false,
            "IncludedBags" => [
                ""
            ],
            "IsYdus"=>false

        ];


        $select=json_encode($selection);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/Allocate");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $select);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($select)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);

        // Cevabı işle
        $response_data = json_decode($response, true);


    }
    require view('reservation');


}


