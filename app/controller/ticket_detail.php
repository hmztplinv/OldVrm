<?php

if (session('auth')['travelSub']['ticketPaying'] != 0) {
    if (!session('user_id')){
        header("Location:" .site_url('login'));
    }
    if(get('shoppingid')){
        $shoppingid=base64_decode(get('shoppingid'));
        $getuserticket=user_ticket::get_user_ticket_detail($shoppingid);

        $getticket = [
            "SessionHeader" => [
                "SessionId" => $getuserticket[0]['session_Id'],
                "SessionToken" => $getuserticket[0]['session_Token'],
            ],
            "ShoppingCartId" => $getuserticket[0]['shoppingid'],
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


// $response_data'i istediğin gibi kullan








    }
    if (post('mail')){
        $ticket=gezinomi::get_ticket_info(post('shoppingid'),0);
        $ticketarr=gezinomi::get_ticket_info(post('shoppingid'),1);
        $passanger=gezinomi::get_ticket_passanger_info(post('shoppingid'));

        $shoppingid=post('shoppingid');
        $getuserticket=user_ticket::get_user_ticket_detail($shoppingid);

        $getticket = [
            "SessionHeader" => [
                "SessionId" => $getuserticket[0]['session_Id'],
                "SessionToken" => $getuserticket[0]['session_Token'],
            ],
            "ShoppingCartId" => $getuserticket[0]['shoppingid'],
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

        $passangers='';
        foreach ($data as $item){
            $passangers=$passangers.'<div class="col-12">
                                        <p><b>Yolcu ismi : </b>'.$item['FirstName'].' '.$item['LastName'].'  </p>
                                        <p><b>Bilet No : </b>'.$item['TicketNumber'].' </p>
                                        <p><b>Uçuş Tipi / Farename : </b> '.$response_data['ShoppingCart']['AirBookings'][0]['SelectedFares'][0]['FareName'].' </p>
                                        <p><b>Ücret / Price : </b>'.$item['TotalFare'].' '.$item['Currency'].' </p>
                                    </div>';
        }

        $deparrival='';
        foreach ($response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'] as $item){
            $deparrival=$deparrival.'
             <tr> 
                        <td>'.$item['FlightNumber'].'</td>
                        <td>'.$item['DepartureCityName'].'</td>
                        <td>'.$item['ArrivalAirportName'].'</td>
                        <td>'.$item['Provider'].'</td>
                        <td>'.$item['DepartureDate'].'</td>
                        <td>'.$item['DepartureTime'].'</td>
                        <td>'.$item['JourneyDurationInMinute'].'</td>
                        <td>'.$item['CabinType'].'</td>
             </tr>
                        ';
        }




        $features = [
            'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
            'username' => "info@qtech.com.tr",      //Hangi mail adresinden mail gidecek
            'password' => "Qof93592",               //Mail adresinin şifresi
            'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
            'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
            'addAddress' => [
                strtolower($response_data['ShoppingCart']['Contact']['Email'])// Şeklinde birden fazla mail adresine gönderebilirsiniz
            ],
            'mailSubject' => "Verimportal Gezinomi Uçak Bilet Bilgileri",      //Giden mailin konusu
            'mailContent' => '
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>UÇUŞ BİLETİ BİLGİLERİ</title>
    <style>
        p{
            color: black;
            font-size: 15px;
            margin-top: 10px;
        }

        .logo img {
            max-width: 180px;
            height: auto;
        }

        @media (max-width: 767px) {
            .logo img {
                max-width: 100%;
                height: auto;
            }
        }

        .container-arkman {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
            background-color: white;
            border-radius: 20px;
            margin-bottom: 50px;
        }

        header {
            position: relative;
            display: flex;
            align-items: center;
            padding-top: 30px;
            margin: 15px;
        }

        header img {
            width: 18%;
        }

        .title {
            padding-top: 20px;
            margin: 15px;
            text-align: center;
        }

        .info {
            display: flex;
            flex-wrap: wrap;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
            border: solid 1px black;
            margin: 15px;
            border-radius: 10px;
            padding: 10px;
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

        .table {
            box-sizing: border-box;
            max-width: 100%;
            padding: 15px;
        }

        .container-arkman table {
            width: 100%;
            border-collapse: collapse;
        }

        .container-arkman th, .container-arkman td {
            border: solid 1px white;
            background: lightgrey;
            padding: 10px;
        }

        thead th {
            background: #6B15B6 !important;
            color: white;
        }

        .text {
            box-sizing: border-box;
            width: 100%;
            padding: 15px;
        }

        .text p, /*.text h4*/ {
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
            .container-arkman {
                width: 500px;
            }

            .col-12 h2 {
                padding-bottom: 8px !important;
                font-size: 1.2em;
                margin-top: 10px;
            }

        }

        @media (min-width: 768px) {
            .container-arkman {
                width: 700px;
            }

            .col-12 h2 {
                padding-bottom: 32px !important;
                font-size: 1.5em;
            }
        }

        @media (max-width: 992px) {
            .table {
                overflow-x: auto;
                display: inline-block;
            }
        }

        @media (min-width: 992px) {
            .container-arkman {
                width: 900px;
            }
        }

        @media (min-width: 1200px) {
            .container-arkman {
                width: 1100px;
            }
        }

        .gonder-btn{
            text-align: center;
            margin:15px 5px 5px 5px;
        }

        .mail-gonder:hover{
            color: white;
        }
        .mail-gonder{
            background-color: #6B15B6 ;color: white;
            margin-bottom: 30px;
        }
    </style>
</head>
<body style="margin:0;padding:0; ">
<div class="container-lg pt-5 p-3 small animate__animated animate__fadeIn">

     

    <div class="container-arkman">
        <table width="100%" cellpadding="0" cellspacing="0" >
            <tr  style="background-color: white">
                <td align="left" style="background-color: white;border: 0px;float: left">
                    <img src="https://dev.verimportal.com/public/img/verimlogo.png" width="100">
                </td>
                <td align="right" style="background-color: white;border: 0px; float: right">
                    <img src="https://images.gezinomi.com/fit-in/182x47/filters:format(webp)/assets/images/logo.png" width="182">
                </td>
            </tr>
        </table>
        <div class="title">
            <h2>ELEKTRONİK BİLET YOLCU SEYAHAT BELGESİ</h2>
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
                        462 Sıra No.lu VUK Genel Tebliği uyarınca elektronik olarakimzalanan ve tevsik edici belge
                        olarak kullanalabilen mali
                        e-biletlere, biletin düzenlenmesinden itibaren en geç 72
                        saatiçerisindeebiletfatura.turkishairlines.com adresindenerişilebilmektedir.
                    </p>
                    <p>
                        Acente tarafından
                        düzenlenen biletlereilişkin faturaların acenteden temin edilmesi gerekmektedir.
                    </p>

                </div>

            </div>
            <div class="col-4">
                <div class="col-12" style="text-align: center">
                    <h2>THY Genel Müdürlüğü Atatürk Havalimanı <br> 34149 - istanbul</h2>
                    <p>Büyük Mükellefler VergiDairesi 8760047464</p>
                    <p>Tel: +90 (212) 463 63 63</p>
                    <p>+90 (212) 444 0 849 <br>+90 (850) 333 0 849</p>
                </div>
            </div>
            <div class="col">
               
                  '.$passangers.'
               
            </div>

            <!--        <div class="col">-->
            <!--            <div class="col-12">-->
            <!--                <p><b>Firma ismi : </b> </p>-->
            <!--                <p><b>Vergi Dairesi : </b>  </p>-->
            <!--                <p><b>T.C. Kimlik Numaras : </b>   </p>-->
            <!--                <p><b>Kısıtlama : </b>  INVOL INVOL REVAL DUE TO.COV19 RESTRICT ION.</p> -->
            <!--            </div>-->
            <!--        </div>-->
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
                    <th>Airline Name</th>
                    <th>Dep Date</th>
                    <th>Dep Time</th>
                    <th>Duration Minutes</th>
                    <th>Cabin Type</th>
                </tr>
                </thead>
                <tbody>
          
             
                     '.$deparrival.'
                      
                 
                
               
                   
              
                </tbody>
            </table>
        </div>
        <div class="text">
            <p>BİLET VE BAGAJ KONTROLU İÇİN TARİFELİ KALKIŞ SAATİNDEN İÇ HATLARDA 45 DK. DIŞHATLARDA 60 DK. ÖNCE
                CHECK-IN IŞLEMLERİNİZİ TAMAMLAYINIZ.</p>
            <p>Biletinizde yer alan uçuşların sıralı olarak kullanılması gerekmektedir. Söz konusu uçuşlardanherhangi
                birine katılmamanız halinde, dönüş parkurlarınız da dahil olmak üzere devam uçuşlarınızıntamamı sistem
                tarafından otomatik olarak iptal edilmektedir.</p>
            <p>Türk Hava Yolları, rezervasyon yapılan an ile biletleme işleminin tamamlandığı an arasında,herhangi bir
                bildirimde bulunmaksızın, bilet fiyatlarında değişiklik yapma hakkını saklı tutmaktadır.Aşağıda
                belirtilen bilgiler US çıkışlı/varışlı TK online taşımalarında ve TK marketing olduğucode-share
                uçuşlarda geçerli olup diğer code-share uçuşları kapsamamaktadır.</p>
            <h4>Kabin Bagajı:</h4>
            <p>Kabin bagajı ücretsiz olarak taşınmakta olup parça başı max 8 Kg ağırlığında olmalıdır.Business kabinde 2
                parça, ekonomi ve comfort kabinde 1 er parça kabin bagajı ücretsiz olaraktaşınabilmektedir. Kabin bagajı
                max ölçüleri 23X40X55 cm dir.</p>
            <h4>Serbest Bagaj:</h4>

            <p>Serbest bagaj hakkı business, comfort ve ekonomi kabinde 2 parça olup max ölçüleri 158 cm dir.</p>

        </div>
      
    </div>
</div>
</body>
</html>'    //Giden mailin içeriği HTML formatında olmalıdır.
        ];
        mail::send($features);  //mail sınıfı içerisindeki send() methoduna yukarıdaki diziyi parametre olarak göndererek mail gönderebilirsiniz.
        $shopid=[
            'shoppingid'=>post('shoppingid')
        ];

        gezinomi::update_gezinomi_mail_status($shopid);

        $message['suc'] = "Mail başarıyla gönderildi";
        $message['redirects']='ticket';
    }
    require view('ticket_detail');
}
