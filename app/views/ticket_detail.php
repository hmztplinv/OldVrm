<?php require 'mainPage_statics/header.php'; ?>


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
                padding-top: 40px;
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

        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Gezinomi</li>
            <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Bilet Detay</a>
            </li>
        </ol>

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
                                    <p><b>Düzenlendiği Tarih :<?=$response_data['ShoppingCart']['UpdatedAt']?> </b></p>
                                    <p><b>Düzenleyen : <?=$response_data['ShoppingCart']['AirBookings'][0]['Provider']?></b></p>
                                    <p><b>PNR No : </b> <?= substr($response_data['ShoppingCart']['ProcessHistories'][1]['Explanation'], strpos($response_data['ShoppingCart']['ProcessHistories'][1]['Explanation'], ':') + 2) ?></p>

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
                    <div class="col-12">
                        <h2>THY Genel Müdürlüğü Atatürk Havalimanı <br> 34149 - istanbul</h2>
                        <p>Büyük Mükellefler VergiDairesi 8760047464</p>
                        <p>Tel: +90 (212) 463 63 63</p>
                        <p>+90 (212) 444 0 849 <br>+90 (850) 333 0 849</p>
                        <p>verimportal.com/</p>
                    </div>
                </div>
                <div class="col">
                    <?php foreach ($data as $item):
                    ?>
                    <div class="col-12">
                        <p><b>Yolcu ismi : </b> <?= $item['FirstName'] ?> <?= $item['LastName'] ?>  </p>
                        <p><b>Bilet No : </b> <?= $item['TicketNumber'] ?> </p>
                        <p><b>Uçuş Tipi / Farename : </b><?= $item['PaxCode'] ?>  </p>
                        <p><b>Ücret / Price : </b> <?= $item['TotalFare'] ?> <?= $item['Currency'] ?>  </p>
                    </div>
                    <?php endforeach; ?>
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
                        <?php foreach ($response_data['ShoppingCart']['AirBookings'][0]['SelectedFares'] as  $tickets): ?>


                                <p><b>Ödeme : </b> TKT/CC </p>
                                <p><b>Esas Ücret : </b><?= $tickets['BaseFare'] ?>  <?= $tickets['Currency'] ?> </p>
                                <p><b>Vergi : </b><?= $tickets['TotalFare']-$tickets['BaseFare']-$tickets['ServiceFee'] ?>  <?= $tickets['Currency'] ?> </p>
                                <p><b>Servis Ücreti : </b><?= $tickets['ServiceFee'] ?>  <?= $tickets['Currency'] ?> </p>
                                <p><b>Toplam : </b> <?= $tickets['TotalFare'] ?>  <?= $tickets['Currency'] ?>  </p>


                        <?php endforeach; ?>
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
                    <?php foreach ($response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'] as $value): ?>
                        <tr>
                            <td><?= $value['FlightNumber'] ?></td>
                            <td><?= $value['DepartureAirportName'] ?></td>
                            <td><?= $value['ArrivalAirportName'] ?></td>
                            <td><?= $value['Provider'] ?></td>
                            <td><?= $value['DepartureDate'] ?></td>
                            <td><?= $value['DepartureTime'] ?></td>
                            <td><?= $value['JourneyDurationInMinute'] ?></td>
                            <td><?= $value['CabinType'] ?></td>
                        </tr>
                    <?php endforeach; ?>

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
            <form action="ticket_detail" method="post">

                <div class="gonder-btn">
                    <?php if ($getuserticket[0]['is_mail_send']==0) :?>

                        <button type="submit" class="btn btn-md mail-gonder"  name="mail" value="1">Mail Gönder</button>

                        <input name="shoppingid" hidden value="<?=$getuserticket[0]['shoppingid']?>">
                    <?php endif ;?>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>


<?php require 'mainPage_statics/footer.php'; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= returned($message); ?>