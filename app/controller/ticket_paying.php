<?php
header('Set-Cookie: ' . session_name() . '=' . session_id() . '; SameSite=None; Secure', false);
if (session('auth')['travelSub']['ticketPaying'] != 0) {
    if (!session('user_id')){
        header("Location:" .site_url('login'));
    }
    if (post('pay')){

        $il_listesi = [
            1 => "Adana",
            2 => "Adıyaman",
            3 => "Afyonkarahisar",
            4 => "Ağrı",
            5 => "Amasya",
            6 => "Ankara",
            7 => "Antalya",
            8 => "Artvin",
            9 => "Aydın",
            10 => "Balıkesir",
            11 => "Bilecik",
            12 => "Bingöl",
            13 => "Bitlis",
            14 => "Bolu",
            15 => "Burdur",
            16 => "Bursa",
            17 => "Çanakkale",
            18 => "Çankırı",
            19 => "Çorum",
            20 => "Denizli",
            21 => "Diyarbakır",
            22 => "Edirne",
            23 => "Elazığ",
            24 => "Erzincan",
            25 => "Erzurum",
            26 => "Eskişehir",
            27 => "Gaziantep",
            28 => "Giresun",
            29 => "Gümüşhane",
            30 => "Hakkari",
            31 => "Hatay",
            32 => "Isparta",
            33 => "Mersin",
            34 => "İstanbul",
            35 => "İzmir",
            36 => "Kars",
            37 => "Kastamonu",
            38 => "Kayseri",
            39 => "Kırklareli",
            40 => "Kırşehir",
            41 => "Kocaeli",
            42 => "Konya",
            43 => "Kütahya",
            44 => "Malatya",
            45 => "Manisa",
            46 => "Kahramanmaraş",
            47 => "Mardin",
            48 => "Muğla",
            49 => "Muş",
            50 => "Nevşehir",
            51 => "Niğde",
            52 => "Ordu",
            53 => "Rize",
            54 => "Sakarya",
            55 => "Samsun",
            56 => "Siirt ",
            57 => "Sinop ",
            58 => "Sivas",
            59 => "Tunceli",
            60 => "Şanlıurfa",
            61 => "Uşak",
            62 => "Van",
            63 => "Yozgat",
            64 => "Zonguldak",
            65 => "Aksaray",
            66 => "Bayburt",
            67 => "Karaman",
            68 => "Kırıkkale",
            69 => "Batman",
            70 => "Şırnak",
            71 => "Bartın",
            72 => "Ardahan",
            73 => "Iğdır",
            74 => "Yalova",
            75 => "Karabük",
            76 => "Kilis",
            77 => "Osmaniye",
            78 => "Düzce",
            79 => "Tekirdağ",
            79 => "Tekirdağ",
            80 => "Tokat",
            81 => "Düzce"
        ];
        $secilen_il_plaka = (int) $_POST['Iller'];
        $secilen_il_ad = isset($il_listesi[$secilen_il_plaka]) ? $il_listesi[$secilen_il_plaka] : null;
        $ifCompany = post('flexRadioDefault') === "true" ? 1 : 0;
        if ($ifCompany == 1) {
            $taxNo = post('vergino');
        } else {
            $taxNo = post('tcno');
        }
        if ($ifCompany == 1) {
            $taxoffice = post('vergidairesi');
        } else {
            "string";
        }
        $_SESSION['Ifcompany']=$ifCompany;
        $_SESSION['namesurname']=post('namesurname');
        $_SESSION['taxOffice']=$taxoffice;
        $_SESSION['taxNo']=$taxNo;
        $_SESSION['il']=$secilen_il_ad;
        $_SESSION['ilce']=post('Ilceler');
        $_SESSION['postCode']=post('postcode');
        $_SESSION['adress']=post('adress');


        $getshoppingcart = [
            "SessionHeader" => [
                "SessionId" => $_SESSION['SessionId'],
                "SessionToken" =>  $_SESSION['SessionToken']
            ],
            "ShoppingCartId" =>   $_SESSION['shoppingId']
        ];
        $shopping=json_encode($getshoppingcart);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/GetShoppingCart");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $shopping);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($shopping)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);

        // Cevabı işle
        $response_data = json_decode($response, true);

        $instalmentid=$response_data['ShoppingCart']['PaymentOption']['InstallmentOptions'][0]['InstallmentOptionId'];
        $subtotal=$response_data['ShoppingCart']['PaymentOption']['InstallmentOptions'][0]['SubTotal'];

        $pay=[
            "Id" => "string",
            "IpAddress" => "string",
            "SessionHeader" => [
                "SessionId" => $_SESSION['SessionId'],
                "SessionToken" => $_SESSION['SessionToken']
            ],
            "ShoppingCartId" =>   $_SESSION['shoppingId'],
            "Amount" => $subtotal,
            "PaymentType" => 'ThreeDPayment',
            "PayableBank" => 5,
            "PaymentForm" => [
                "CardHolder" => post('cardnamesurname'),
                "CardNumber" => post('cardnumber'),
                "CardType" => "Visa",
                "Cvv" => post('cvc'),
                "ExpirationYear" => post('cardyear'),
                "ExpirationMonth" => post('cardmonth'),
                "ExtraAmount" => 0,
                "InstallmentId" => $instalmentid,
                "InstallmentCount" => 1,
                "Currency" => post('currency'),
                //"ReturnUrl" => "http://arkmanpayment.gezinomi.com/Payment/Process?ShopCartId=". $_SESSION['shoppingId']
                "ReturnUrl" => "https://verimportal.com/ticket_paying/Process?ShopCartId=". $_SESSION['shoppingId']
            ],
            "PartialPaymentForm" =>  null,
            "ExternalCreditCardPaymentForm" =>null,
            "CouponForm" =>null,
            "PaymentChannel" => 0,
            "ExpireAt" => "2023-04-13T10:10:47.343Z"
        ];
        $paying=json_encode($pay);

        $ch = curl_init();
		
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/MakePayment");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paying);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($paying)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);
        header('location:'.$response_data['ContinueUrl']);
    }
    if (get('Success')=='False' && get('Approved')=='False'){
        $message['err'] = 'Message : '.urldecode(get('BankMsg')).'\n Hata Kodu : '.urldecode(get('BankMsgCode'));
        $message['redirects'] = 'gezinomi_index';
    }else if(get('Success')=='True' && get('Approved')=='False'){
        $message['err'] = 'Message : '.urldecode(get('BankMsg')).'\n Hata Kodu : '.urldecode(get('BankMsgCode'));
        $message['redirects'] = 'gezinomi_index';
    }else if(get('Success')=='true' && get('Approved')=='True'){





        $finalizeshopping= [
            "SessionHeader" => [
                "SessionId" =>  $_SESSION['SessionId'],
                "SessionToken" => $_SESSION['SessionToken']
            ],
            "ShoppingCartId" =>  $_SESSION['shoppingId'],
            "LinkUrl" => "string",
            "SendInformationEmails" => false
        ];

        $finalize=json_encode($finalizeshopping);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/FinalizeShopping");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $finalize);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($finalize)
        ));
        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);
        // Cevabı işle
        $response_data = json_decode($response, true);


        if(isset($response_data['HasError']) && $response_data['HasError'] === true){
            $error_messages = $response_data['ServiceError']['ErrorMessages'];
            $message['err'] = implode(", ", $error_messages);

        }
        else{
//
//            $psngrs=[];
//            foreach ($response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'] as $passanger){
//                $ticket_flight=[
//                    'shopping_id'=>$response_data['ShoppingCart']['Id'],
//                    'OperatingAirlineName'=>$passanger['OperatingAirlineName'],
//                    'CabinType'=>$passanger['CabinType'],
//                    'DirectionInd'=>$passanger['DirectionInd'],
//                    'IsConnected'=>$passanger['IsConnected'],
//                    'FlightNumber'=>$passanger['FlightNumber'],
//                    'JourneyDurationInMinute'=>$passanger['JourneyDurationInMinute'],
//                    'DepartureAirportName'=>$passanger['DepartureAirportName'],
//                    'ArrivalAirportName'=>$passanger['ArrivalAirportName'],
//                    'DepartureDate'=>$passanger['DepartureDate'],
//                    'DepartureTime'=>$passanger['DepartureTime'],
//                    'ArrivalDate'=>$passanger['ArrivalDate'],
//                    'ArrivalTime'=>$passanger['ArrivalTime'],
//                    'user_id'=>$_SESSION['user_id'],
//                ];
//                array_push($psngrs,$ticket_flight);
//            }
//
//            foreach ($psngrs as $psngr){
//                gezinomi::insert_ticket_flight($psngr);
//            }
//
//            $tick=[];
//            foreach ($response_data['ShoppingCart']['AirBookings'][0]['SelectedFares'] as $ticket){
//                $ticket_description=[
//                    'user_id'=>$_SESSION['user_id'],
//                    'shopping_id'=>$response_data['ShoppingCart']['Id'],
//                    'FareName'=>$ticket['FareName'],
//                    'Cabin'=>$ticket['Cabin'],
//                    'PaxCount'=>$ticket['PaxCount'],
//                    'TotalFare'=>$response_data['ShoppingCart']['AirBookings'][0]['TotalFare'],
//                    'Currency'=>$response_data['ShoppingCart']['AirBookings'][0]['Currency'],
//                    'BaseFare'=>$response_data['ShoppingCart']['AirBookings'][0]['BaseFare'],
//                    'TotalTax'=>$response_data['ShoppingCart']['AirBookings'][0]['TotalTax'],
//                    'TotalServiceFee'=>$response_data['ShoppingCart']['AirBookings'][0]['TotalServiceFee'],
//                    'pnr'=>$response_data['ShoppingCart']['ProcessHistories'][1]['Explanation'],
//                    'DirectionInd'=>$ticket['DirectionInd'],
//
//                ];
//                array_push($tick,$ticket_description);
//
//            }
//
//            foreach ($tick as $item) {
//                gezinomi::insert_ticket_description($item);
//
//            }
//            $passangerdescription=[];
//            foreach ($response_data['ShoppingCart']['Passengers'] as $passanger_info){
//                $passanger_personel_info=[
//                    'user_id'=>$_SESSION['user_id'],
//                    'shopping_id'=>$response_data['ShoppingCart']['Id'],
//                    'first_name'=>$passanger_info['FirstName'],
//                    'LastName'=>$passanger_info['LastName'],
//                    'PaxType'=>$passanger_info['PaxType'],
//                    'PaxReferanceId'=>$passanger_info['PaxReferanceId'],
//                    'email'=>$_SESSION['contactmail']
//                ];
//
//                array_push($passangerdescription,$passanger_personel_info);
//            }
//
//            foreach ($passangerdescription as $item){
//
//                gezinomi::insert_ticket_passenger_detail($item);
//            }
//
//            $passangertick=[];
//            foreach ($response_data['ShoppingCart']['AirBookings'][0]['PassengerBreakdowns'] as $passenger_ticket){
//
//                $passenger_ticket=[
//                    'user_id'=>$_SESSION['user_id'],
//                    'shopping_id'=>$response_data['ShoppingCart']['Id'],
//                    'PaxReferanceId'=>$passenger_ticket['PaxReference']['PaxReferanceId'],
//                    'TotalFare'=>$passenger_ticket['TotalFare'],
//                    'TicketNumber'=>$passenger_ticket['TicketNumber'],
//                    'Currency'=>$passenger_ticket['Currency'],
//
//                ];
//                damp($passangertick);
//                array_push($passangertick,$passenger_ticket);
//            }
//
//            foreach ($passangertick as $item){
//                gezinomi::insert_ticket_passenger($item);
//            }




            $billing=[
                "SessionHeader" => [
                    "SessionId" => $_SESSION['SessionId'],
                    "SessionToken" => $_SESSION['SessionToken']
                ],
                "ShoppingCartId" =>  $_SESSION['shoppingId'],
                "BillingInformation" => [
                    "IfCompany" =>  $_SESSION['Ifcompany'],
                    "IfCurrentCodeSet" => true,
                    "BillingName" =>$_SESSION['namesurname'] ,
                    "TaxOffice" => $_SESSION['taxOffice'],
                    "TaxNo" => $_SESSION['taxNo'],
                    "City" => $_SESSION['il'],
                    "District" => $_SESSION['ilce'],
                    "ZipCode" =>  $_SESSION['postCode'],
                    "CountryCode" => 90,
                    "Address" =>  $_SESSION['adress'],
                    "AutoBill" => true,
                    "ServiceFee" => 0
                ]
            ];
            $fatura=json_encode($billing);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Billing/Submit");

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fatura);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($fatura)
            ));
            // İsteği gönder ve cevabı al
            $response = curl_exec($ch);
            curl_close($ch);
            // Cevabı işle
            $response_data = json_decode($response, true);

            $_SESSION['pnr']=$response_data['ShoppingCart']['ProcessHistories'][1]['Explanation'];
            $_SESSION['FlightNumber']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['FlightNumber'];
            $_SESSION['DepartureAirportName']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['DepartureAirportName'];
            $_SESSION['DepartureDate']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['DepartureDate'];
            $_SESSION['DepartureTime']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['DepartureTime'];
            $_SESSION['ArrivalAirportName']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['ArrivalAirportName'];
            $_SESSION['ArrivalDate']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['ArrivalDate'];
            $_SESSION['ArrivalTime']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['ArrivalTime'];
            $_SESSION['price']=$response_data['ShoppingCart']['ShoppingSummary']['GrandTotal'];
            $_SESSION['BaseFare']=$response_data['ShoppingCart']['AirBookings'][0]['SelectedFares'][0]['BaseFare'];
            $_SESSION['ServiceFee']=$response_data['ShoppingCart']['AirBookings'][0]['SelectedFares'][0]['ServiceFee'];
            $_SESSION['Currency']=$response_data['ShoppingCart']['PaymentHistories'][0]['Currency'];
            $_SESSION['Provider']=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][0]['Provider'];

            if(isset($response_data['HasError']) && $response_data['HasError'] === true){
                $error_messages = $response_data['ServiceError']['ErrorMessages'];
                $error_message = str_replace("'","",$response_data['ServiceError']['ErrorMessages'][0]);
                $message['err'] = $error_message;
                $message['redirects'] = 'gezinomi_index';

            }
            else{
                $getticket = [
                    "SessionHeader" => [
                        "SessionId" => $_SESSION['SessionId'],
                        "SessionToken" => $_SESSION['SessionToken'],
                    ],
                    "ShoppingCartId" =>$_SESSION['shoppingId'],
                ];
                $jsonbooking=json_encode($getticket);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/GetShoppingCart");
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonbooking);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($jsonbooking)
                ));
                // İsteği gönder ve cevabı al
                $response = curl_exec($ch);
                curl_close($ch);
                // Cevabı işle
                $response_data = json_decode($response, true);
                $passengersbreakdown=$response_data['ShoppingCart']['AirBookings'][0]['PassengerBreakdowns'];
                $passenger=$response_data['ShoppingCart']['Passengers'];

                $data = [];

                foreach ($passengersbreakdown as $pb) {
                    foreach ($passenger as $p) {
                        if ($pb['PaxReference']['PaxReferanceId'] == $p['PaxReferanceId']) {

                            $item = [
                                'FirstName' => $p['FirstName'],
                                'LastName' => $p['LastName'],
                                'TicketNumber' => $pb['TicketNumber'],
                                'PaxCode' => $pb['PaxReference']['PaxCode'],
                                'TotalFare' => $pb['TotalFare'],
                                'Currency' => $pb['Currency']
                            ];

                            $data[] = $item;

                        }
                    }
                }
                $list="";

                foreach ($response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'] as $item){
                    $list=$list."<tr>";
                    $list=$list."<td>".$item['FlightNumber']."</td>";
                    $list=$list."<td>".$item['DepartureAirportName']."</td>";
                    $list=$list."<td>".$item['ArrivalAirportName']."</td>";
                    $list=$list."<td>".$response_data['ShoppingCart']['AirBookings'][0]['SelectedFares'][0]['FareName']."</td>";
                    $list=$list."<td>".$item['CabinType']."</td>";
                    $list=$list."<td>".$item['DepartureDate']."</td>";
                    $list=$list."<td>".$item['DepartureTime']."</td>";
                    $list=$list."<td>".$item['JourneyDurationInMinute']."</td>";
                    $list=$list."<td>".$item['Provider']."</td>";

                    $list=$list."</tr>";
                }

                $features = [
                    'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
                    'username' => "info@qtech.com.tr",      //Hangi mail adresinden mail gidecek
                    'password' => "Qof93592",               //Mail adresinin şifresi
                    'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
                    'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
                    'addAddress' => [
                        $_SESSION['contactmail']// Şeklinde birden fazla mail adresine gönderebilirsiniz
                    ],
                    'mailSubject' => "Verimportal Gezinomi Uçak Bilet Bilgileri",      //Giden mailin konusu
                    'mailContent' => '<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title>UÇUŞ BİLETİ BİLGİLERİ</title>
  <style>
    .container{
      width: 100%;
      margin-right: auto;
      margin-left: auto;
      padding-right: 15px;
      padding-left: 15px;
    }
    header{
      position: relative;
      display: flex;
      align-items: center;
      padding-top: 30px;
      margin: 15px;
    }
    header img{
      width: 18%;
    }
    .gezinomi{
      position: absolute;
      right: 0px;
      width: 13%;
    }
    .title{
      padding-top: 40px;
      margin: 15px;
    }
    .info{
      display: flex;
      flex-wrap: wrap;
    }
    .col-12 {
      flex: 0 0 100%;
      max-width: 100%;
      border: solid 1px black;
      margin: 15px;
      border-radius: 10px;
      padding: 0 20px;
    }
    .col {
      flex: 0 0 100%;
      max-width: 100%;
    }
    .col-8 {
      flex: 0 0 66.66666667%;
      max-width: 66.66666667%;
    }
    .col-4 {
      flex: 0 0 33.33333333%;
      max-width: 33.33333333%;
    }
    .table{
      box-sizing: border-box;
      max-width: 100%;
      padding: 15px;
    }
    .container table{
      width: 100%;
      border-collapse: collapse;
    }
    .container th, .container td{
      border: solid 1px white;
      background: lightgrey;
      padding: 10px;
    }
    thead th{
      background: #6B15B6 !important;
      color: white;
    }
    .text{
      box-sizing: border-box;
      width: 100%;
      padding: 15px;
    }
    .text p, .text h4{
      margin: 5px;
    }
    @media (max-width: 576px) {
      .col-8 {
        flex: 0 0 100%;
        max-width: 100%;
      }
      .col-4 {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }
    @media (min-width: 576px) {
      .container{
        width: 540px;
      }
      .col-12 h2{
        padding-bottom: 8px !important;
        font-size: 1.2em;
      }

    }
    @media (min-width: 768px) {
      .container{
        width: 720px;
      }
      .col-12 h2{
        padding-bottom: 32px !important;
        font-size: 1.5em;
      }
    }
    @media (max-width: 992px) {
      .table{
        overflow-x: auto;
        display: inline-block;
      }
    }
    @media (min-width: 992px) {
      .container{
        width: 960px;
      }
    }
    @media (min-width: 1200px) {
      .container{
        width: 1140px;
      }
    }
  </style>
</head>
<body style="margin:0;padding:0; ">
  <div class="container">
    <header>
      <img class="gezinomi" src="https://dev.verimportal.com/public/img/verimlogo.png">
      <img class="gezinomi" style="float: right" src="https://images.gezinomi.com/fit-in/182x47/filters:format(webp)/assets/images/logo.png">
    </header>
    <div class="title">
      <h1>ELEKTRONİK BİLET YOLCU SEYAHAT BELGESİ</h1>
    </div>
    <div class="info">
      <div class="col-8">
        <div class="col-12">
              <p><b>Düzenlendiği Tarih : </b>'.$response_data['ShoppingCart']['UpdatedAt'].'</p>
                                <p><b>Düzenleyen : </b>'.$response_data['ShoppingCart']['AirBookings'][0]['Provider'].'</p>
                                <p><b>PNR No : </b>'. substr($response_data['ShoppingCart']['ProcessHistories'][1]['Explanation'], strpos($response_data['ShoppingCart']['ProcessHistories'][1]['Explanation'], ':') + 2) .'</p>
                
        </div>
        <div class="col-12">
          <p>
            462 Sıra No.lu VUK Genel Tebliği uyarınca elektronik olarakimzalanan ve tevsik edici belge olarak kullanalabilen mali
             e-biletlere, biletin düzenlenmesinden itibaren en geç 72 saatiçerisindeebiletfatura.turkishairlines.com adresindenerişilebilmektedir. Acente tarafından düzenlenen biletlereilişkin faturaların acenteden temin edilmesi gerekmektedir.
          </p>
        </div>
        <div class="col-12">
          <p>OTOMATİK BİR MESAJDIR, LÜTFEN YANITLAMAYINIZ.</p>
        </div>
      </div>
      <div class="col-4">
        <div class="col-12">
          <h2>THY Genel Müdürlüğü Atatürk Havalimanı <br> 34149 - istanbul</h2>
          <p>Büyük Mükellefler VergiDairesi 8760047464</p>
          <p>Tel: +90 (212) 463 63 63</p>
          <p>+90 (212) 444 0 849 <br>+90 (850) 333 0 849</p>
          <p>verimportal.com/</p>
        </div>
      </div>
      <div class="col">
        <div class="col-12">
          <p><b>Yolcu ismi : </b> '.post('namesurname').' </p>
          <p><b>Bilet No : </b> '.$_SESSION['TicketNo'].' </p>
          <p><b>Rezervasyon No : </b> '.$_SESSION['Provider'].' </p>
          <p><b>Adres : </b>  '.post('adress').' </p>
        </div>
      </div>
    
      <div class="col">
        <div class="col-12">
         <p><b>Firma ismi : </b> </p>
          <p><b>Vergi Dairesi : </b> '.post('vergidairesi').'</p>
          <p><b>T.C. Kimlik Numaras : </b> '.post('tcno').' </p>
        <!-- <p><b>Kısıtlama : </b>  INVOL INVOL REVAL DUE TO.COV19 RESTRICT ION.</p> -->
        </div>
      </div>
      <div class="col">
        <div class="col-12">

                            <p><b>Ödeme : </b> TKT/CC </p>
                            <p><b>Esas Ücret : </b>'.$response_data['ShoppingCart']['AirBookings'][0]['BaseFare'].'  '.$response_data['ShoppingCart']['AirBookings'][0]['Currency'].'  </p>
                            <p><b>Vergi : </b>'.$response_data['ShoppingCart']['AirBookings'][0]['TotalTax'].'  '.$response_data['ShoppingCart']['AirBookings'][0]['Currency'].'  </p>
                            <p><b>Servis Ücreti : </b>'.$response_data['ShoppingCart']['AirBookings'][0]['TotalServiceFee'].'  '.$response_data['ShoppingCart']['AirBookings'][0]['Currency'].'   </p>
                            <p><b>Toplam : </b>'.$response_data['ShoppingCart']['AirBookings'][0]['TotalFare'].'   '.$response_data['ShoppingCart']['AirBookings'][0]['Currency'].'   </p>

                       
        </div>
      </div>
    </div>
    <div class="table">
      <table>
        <thead>
        <tr>
          <th>Flight Number</th>
          <th>Dep</th>
          <th>Arr</th>
          <th>Uçuş Tipi</th>
          <th>Cabin</th>
          <th>Kalkış Tarihi</th>
          <th>Kalkış Saati</th>
          <th>Uçuş Süresi</th>
          <th>Uçuş Fİrması</th>
          
     
          
     
        </tr>
        </thead>
        <tbody>
         
        </tbody>
      </table>
    </div>
    <div class="text">
      <p>BİLET VE BAGAJ KONTROLU İÇİN TARİFELİ KALKIŞ SAATİNDEN İÇ HATLARDA 45 DK. DIŞHATLARDA 60 DK. ÖNCE CHECK-IN IŞLEMLERİNİZİ TAMAMLAYINIZ.</p>
      <p>Biletinizde yer alan uçuşların sıralı olarak kullanılması gerekmektedir. Söz konusu uçuşlardanherhangi birine katılmamanız halinde, dönüş parkurlarınız da dahil olmak üzere devam uçuşlarınızıntamamı sistem tarafından otomatik olarak iptal edilmektedir.</p>
      <p>Türk Hava Yolları, rezervasyon yapılan an ile biletleme işleminin tamamlandığı an arasında,herhangi bir bildirimde bulunmaksızın, bilet fiyatlarında değişiklik yapma hakkını saklı tutmaktadır.Aşağıda belirtilen bilgiler US çıkışlı/varışlı TK online taşımalarında ve TK marketing olduğucode-share uçuşlarda geçerli olup diğer code-share uçuşları kapsamamaktadır.</p>
      <h4>Kabin Bagajı:</h4>
      <p>Kabin bagajı ücretsiz olarak taşınmakta olup parça başı max 8 Kg ağırlığında olmalıdır.Business kabinde 2 parça, ekonomi ve comfort kabinde 1 er parça kabin bagajı ücretsiz olaraktaşınabilmektedir. Kabin bagajı max ölçüleri 23X40X55 cm dir.</p>
      <h4>Serbest Bagaj:</h4>
      <p>Serbest bagaj hakkı business, comfort ve ekonomi kabinde 2 parça olup max ölçüleri 158 cm dir.</p>
    </div>
  </div>
</body>
</html>'    //Giden mailin içeriği HTML formatında olmalıdır.
                ];
                mail::send($features);  //mail sınıfı içerisindeki send() methoduna yukarıdaki diziyi parametre olarak göndererek mail gönderebilirsiniz.
                $message['suc'] = "Ödeme ve Faturalandırmanız yapılmıştır biletlerim sayfasına yönlendiriliyorsunuz";
                $message['redirects'] = 'ticket';

            }
        }
    }
    if (post('payment')){

        $passangers=[];
        for($i=0;$i<count(post('name'));$i++){
            array_push($passangers,array(
                    'FirstName'=>post('name')[$i],
                    'LastName'=>post('surname')[$i],
                    'PaxType'=>post('PaxCode')[$i],
                    'Gender'=>post($i.'gender'),
                    "BirthDate" => post('birthday')[$i],
                    "Email" =>  post('mail')[$i],
                    "Phone" => '+90'.post('phone')[$i],
                    "CitizenNo" => post('tcno')[$i],
                    "PassportNo" => "",
                    "PassportExpireDate" => "",
                    "Nationality" => "TR",
                    "HesCode" => null,
                    "FrequentFlayerNo" => "",
                    "WheelChairService" => 0,
                    "PaxReferanceId" => post('PaxReferanceId')[$i],
                    "ExtraPosAmount" => 0,
                    "isChild" => false,
                    "SelectedShuttle" => null
                )
            );
        }

        $_SESSION['passanger']=$passangers;
        $first_names = array();
        $last_names = array();

        foreach ($_SESSION['passanger'] as $passenger) {
            array_push($first_names, $passenger['FirstName']);
            array_push($last_names, $passenger['LastName']);
        }


        $first_name=implode(', ', $first_names);
        $lastname=implode(', ', $last_names);


        $_SESSION['contactmail']=post('contactmail');
        $_SESSION['contactphone']=post('contactphone');
        $_SESSION['contactname']=post('contactname');
        $_SESSION['contactsurname']=post('contactsurname');


        $passengerupdate=[
            "SessionHeader" => [
                "SessionId" => $_SESSION['SessionId'],
                "SessionToken" => $_SESSION['SessionToken']
            ],
            "ShoppingCartId" =>  $_SESSION['shoppingId'],
            "CorporatePin" => " ",
            "Contact" => [
                "Name" => post('contactname'),
                "LastName" => post('contactsurname'),
                "Phone" =>  '+90'.post('contactphone'),
                "Email" =>  post('contactmail')
            ],
            "Passengers" =>
                $_SESSION['passanger']
            ,

            "EArchiveWebAddress" => 0,
            "Notes" => "string",
            "PickupPointExplanation" => "string",
            "DropPointExplanation" => "string"
        ];

 

        $passenger=json_encode($passengerupdate);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/UpdatePassengers");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $passenger);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($passenger)
        ));

        // İsteği gönder ve cevabı al
        $response = curl_exec($ch);
        curl_close($ch);

        // Cevabı işle
        $response_data = json_decode($response, true);

        $subtotal=$response_data['ShoppingCart']['PaymentOption']['InstallmentOptions'][0]['SubTotal'];

        if( $response_data['HasError'] == 1){


            $sa = str_replace(array('(', ')', '.', ',', 'ğ', "\n"), array('', '', '', '', 'g', ''), $response_data['ServiceError']['ErrorMessages'][0]);

            $message['err'] = $sa;
            $message['redirects'] = 'reservation';

        }
        else{

            $user_ticket_payment=user_ticket::update_user_ticket_payment($first_name,$lastname);


            $Makeprebooking=[
                "SessionHeader" => [
                    "SessionId" => $_SESSION['SessionId'],
                    "SessionToken" => $_SESSION['SessionToken']
                ],
                "ShoppingCartId" =>  $_SESSION['shoppingId'],
                "LinkUrl" => "",
                "SelectedServiceFee" => 0,
                "ContinueWithoutReservation" => false
            ];

            $jsonbooking=json_encode($Makeprebooking);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://arkmanapi.gezinomi.com/Air/MakePrebooking");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonbooking);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonbooking)
            ));

            // İsteği gönder ve cevabı al
            $response = curl_exec($ch);
            curl_close($ch);

            // Cevabı işle
            $response_data = json_decode($response, true);
        }



    }



    require view('ticket_paying');
}
