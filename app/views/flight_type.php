<?php require 'mainPage_statics/header.php';?>
<style>

    #fly-button {
        display: inline-block;
        /*background-color: #6B15B6;*/
        width: 50px;
        height: 50px;
        text-align: center;
        /*border-radius: 4px;*/
        position: fixed;
        bottom: 60px;
        left: 30px;
        transition: background-color .3s,
        opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
        transition: all .5s ease-in-out;
    }
    #fly-button::after {
        content: "";
        font-family: FontAwesome;
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #ffffff;
    }
    #fly-button:hover {
        cursor: pointer;
        /*background-color: #6B15B6;*/
        transform: scale(1.5);
        -webkit-transform: scale(1.5);
    }
    #fly-button:active {
        /*background-color: #6B15B6;*/
    }
    #fly-button.show {
        opacity: 1;
        visibility: visible;
    }

    /* Styles for the content section */
    @media (min-width: 500px) {
        #fly-button {
            margin: 30px;
        }
    }
</style>
<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var intervalId;

        function updateTimer() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (timer < 0) {
                clearInterval(intervalId);
                window.location.href = "https://dev.verimportal.com/gezinomi_index";
            } else if (timer == 0) {
                display.textContent = "00:00";
            }
            localStorage.setItem("timer", timer);
            timer--;
        }

        function resumeTimer() {
            intervalId = setInterval(updateTimer, 1000);
        }

        var savedTimer = localStorage.getItem("timer");
        if (savedTimer !== null) {
            timer = savedTimer;
        }

        resumeTimer();

        document.addEventListener("visibilitychange", function() {
            if (document.hidden) {
                clearInterval(intervalId);
                localStorage.setItem("timer", timer);
            } else {
                savedTimer = localStorage.getItem("timer");
                if (savedTimer !== null) {
                    timer = savedTimer;
                }
                resumeTimer();
                localStorage.removeItem("timer");
            }
        });
    }

    window.onload = function () {
        var duration = 1200; // 20 dakika (saniye cinsinden)
        var display = document.getElementById("timer");
        startTimer(duration, display);
    };
</script>
<a id="fly-button">
    <i class="fa-solid fa-jet-fighter-up text-custom" style="font-size: 30px;"></i>
</a>
<div class="modal fade" id="modalRelatedContent" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent">

            <div class="modal-header bg-custom2 text-light p-2">
                <p class="h6 mb-0 mt-1">Önemli Bilgilendirme</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>


            <div class="modal-body bg-white">
                <div class="row">
                    <div class="col-12">
                        <ul>
                            <li>Bilet satın alma işlemlerinde, hava yolundan kaynaklanan sistem hataları, teknik problemler nedeniyle havayolu firması tarafından kesilemeyen düzenlenemeyen biletlerden veya havayolu firması tarafından acente sistemlerine eksik ya da hatalı yansıtılan fiyatlar vb. nedenlerle oluşabilecek durumlardan dolayı acentenin herhangi bir sorumluluğu yoktur.</li>
                            <li>Gidiş-Dönüş (RT) uçuşlarda iptal, değişiklik işlemlerinde en kısıtlı sınıfın kuralalrı her zaman için tüm segmentlerde geçerli olacaktır.</li>
                            <li> Yapılan bir rezervasyon bir başkasına devredilemez, isim değişikliği yapılamaz.</li>
                            <li>Transit veya varış noktasındaki ülkeye giriş çıkış kısıtlamaları ve yeni uygulamalar hakkında, ilgili ülkenin konsolosluğundan güncel bilgileri kontrol ediniz. Ülkeye girişlerdezorunlu tutulan, COVID-19 PCR testi uygulamaları ile ilgili prosedürleri kontrol ediniz.</li>
                            <li>Tek başına seyahat edecek 12-18 yaş aralığındaki yolcuların uçuşları ile ilgili bazı kısıtlamalar olabilir. Söz konusu tüm koşulları kontroletmemizi ve gerekli koşulları sağladıktan sonra satın alma işlemlerinizi gerçekleştirmenizi öneririz.</li>
                            <li>Bu ücret sadece sayfa üzerinden direkt satın alımlarınızda geçerlidir. Ön rezervasyon yaparak, biletinizi yetkili acentelerimizden satın almak isterseniz, söz konusu fiyat geçerli olmayacaktır.</li>
                            <li>Genel hava yolu kuralı olarak, bilet kuponlarının sıralı kullanılması zorunludur. Gidişi uçulmamış biletlerin dönüşleri hava yolları tarafındanotomatik iptal edilmektedir.</li>
                            <li>Seçmiş olduğunuz uçuşta iptal, iade ve değişiklik hava yolları kurallarına göre yapılacaktır. Uçak bileti satışlarında, mesafeli sözleşmeler yönetmeler gereği cayma hakkı uygulanmaktadır. Lütfen kuralalrı dikkatlice okuyunuz.</li>
                            <li>Vize ve pasaport işlemlerinin kontrolü yolcularımızın sorumluluğundadır.</li>
                            <li>Bilet numarası ve bilet detaylarını mutlaka kontrol ediniz.</li>
                            <li> Yapılan bir rezervasyon bir başkasına devredilemez, isim değişikliği yapılamaz.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn" style="font-family: "Montserrat", Helvetica, Arial, sans-serif;">

<div class="row mt-5 pt-2 animate__animated animate__fadeIn mobile_position">
    <div class="col-12 col-md-12 mb-3">
        <div class="card h-100">
            <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">
                <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-jet-fighter-up"></i> Uçuş Bilgileri            <h6 id="timer" style="color:black;align-self: center; font-size: 17px; margin-left: auto;color: white" class="ml-auto">20:00</h6></h6>
            </header>
            <div class="breadcrumb-item text-custom breadcrumb d-flex flex-row justify-content-center text-center">
                <div class="col-sm-4">
                    <span>Durum: Ön Rezervasyon</span>
                </div>
                <div class="col-sm-4">
                    <span>Gidiş Uçuşu</span>
                </div>
                <div class="col-sm-4">
                        <span>Toplam Uçuş Süresi :<?php
                            $toplamSure = $gidisveri['FlightSegments'][0]['JourneyDurationInMinute'] + $gidisveri['FlightSegments'][1]['JourneyDurationInMinute'];
                            echo $toplamSure;
                            ?>  Dakika</span>
                </div>
            </div>
            <?php foreach ($gidisveri['FlightSegments'] as $key => $gidis) :?>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 d-flex flex-column">
                            <span class="font-weight-bold" style="font-size: 14px;">
                                 <?php if ($gidis['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                     <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                 <?php elseif ($gidis['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                     <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                 <?php endif; ?><?=$gidis['OperatingAirlineName']?>
                            </span>
                        </div>

                        <div class="col-sm-2 d-flex flex-column">
                            <span class="fw-bold" style="font-size: 15px">
                                <?=$gidis['FlightNumber']?>
                            </span>
                            <span>Sınıf:  <?=$gidis['CabinType']?> <?= $gidis['BookingClass'] ?></span>
                        </div>

                        <div class="col-sm-5 d-flex flex-column">
                            <span>
                                Kalkış : <?=$gidis['DepartureDate']?> <?=$turkishDays[date('w',strtotime($gidis['DepartureDate']))]?>, <?=$gidis['DepartureTime']?>  -<?=$gidis['DepartureCityName']?>  (<?=$gidis['DepartureAirportName']?> )
                            </span>
                            <span>
                                Varış : <?=$gidis['ArrivalDate']?> <?=$turkishDays[date('w',strtotime($gidis['ArrivalDate']))]?>, <?=$gidis['ArrivalTime']?> - <?=$gidis['ArrivalCityName']?> (<?=$gidis['ArrivalAirportName']?>)
                            </span>
                        </div>
                        <div class="col-sm-1 d-flex flex-column">
                            <span>
                                <i class="fa-regular fa-clock me-1" style="color: #6B15B6"></i>
                                <?=$gidis['JourneyDurationInMinute']?> DK
                              </span>

                        </div>
                        <div class=" d-flex flex-column">
                            <span>
                                <button class="bg-white" data-toggle="modal" data-target="#modalRelatedContent" style="border: 0px;">
                                <i class="fas fa-exclamation-circle" style="color: #6B15B6!important"></i> Önemli Bilgilendirme</button>

                            </span>
                        </div>
                        <div class="row mt-3 text-center justify-content-center">
                            <?php if ($key == 0): ?>
                                <?php if (count($gidisveri['FlightSegments'])>1):?>
                                    <div class="col-sm-12">
                                  <span class="border border-dark p-1 fw-bold rounded-2">Bekleme Süresi  <?php
                                      $giris_saati = new DateTime($gidisveri['FlightSegments'][0]['ArrivalTime']);
                                      $cikis_saati = new DateTime($gidisveri['FlightSegments'][1]['DepartureTime']);

                                      if ($cikis_saati < $giris_saati) {
                                          $cikis_saati->add(new DateInterval('P1D'));
                                      }

                                      $fark = $giris_saati->diff($cikis_saati);
                                      $dakika_farki = ($fark->h * 60) + $fark->i;

                                      echo   $dakika_farki . " dakika";
                                      ?></span>
                                    </div>
                                <?php endif;?>
                            <?php endif;?>
                        </div>



                    </div>

                </div>

            <?php endforeach;?>

            <?php if (!empty($donusveri)):?>

                <div class="breadcrumb-item text-custom breadcrumb d-flex flex-row justify-content-center text-center">
                    <div class="col-sm-4">
                        <span>Durum: Ön Rezervasyon</span>
                    </div>
                    <div class="col-sm-4">
                        <span>Dönüş Uçuşu</span>
                    </div>
                    <div class="col-sm-4">
                        <span>Toplam Uçuş Süresi :<?php
                            $toplamSure = $donusveri['FlightSegments'][0]['JourneyDurationInMinute'] + $donusveri['FlightSegments'][1]['JourneyDurationInMinute'];
                            echo $toplamSure;
                            ?> dakika</span>
                    </div>
                </div>

                <?php foreach ($donusveri['FlightSegments'] as $key => $donus): ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                    <span class="font-weight-bold" style="font-size: 14px;">
                          <?php if ($donus['OperatingAirlineName'] === 'Turkish Airlines'):?>
                              <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                          <?php elseif ($donus['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                              <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                          <?php endif; ?><?=$donus['OperatingAirlineName']?>
                    </span>
                            </div>

                            <div class="col-sm-2 d-flex flex-column">
                    <span class="fw-bold" style="font-size: 15px">
                        TK4283
                    </span>
                                <span>Sınıf: <?=$donus['CabinType']?> <?= $donus['BookingClass'] ?></span>
                            </div>

                            <div class="col-sm-5 d-flex flex-column">
                    <span>
                         Kalkış :<?=$donus['DepartureDate']?> <?=$turkishDays[date('w',strtotime($donus['DepartureDate']))]?>, <?=$donus['DepartureTime']?>  -<?=$donus['DepartureCityName']?>  (<?=$donus['DepartureAirportName']?> )
                    </span>
                                <span>
                       <?=$donus['ArrivalDate']?> <?=$turkishDays[date('w',strtotime($donus['ArrivalDate']))]?>, <?=$donus['ArrivalTime']?> - <?=$donus['ArrivalCityName']?> (<?=$donus['ArrivalAirportName']?>)
                    </span>
                            </div>
                            <div class="col-sm-1 d-flex flex-column">
                            <span > <?=$donus['JourneyDurationInMinute']?> DK
                              </span>

                            </div>
                            <div class=" d-flex flex-column">
                            <span>
                                <button class="bg-white" data-toggle="modal" data-target="#modalRelatedContent" style="border: 0px;">
                                <i class="fas fa-exclamation-circle" style="color: #6B15B6!important"></i> Önemli Bilgilendirme</button>

                            </span>
                            </div>
                            <div class="row mt-3 text-center justify-content-center">
                                <?php if ($key == 0): ?>
                                    <?php if (count($donusveri['FlightSegments'])>1):?>
                                        <div class="col-sm-12">
                                        <span class="border border-dark p-1 fw-bold rounded-2">Bekleme Süresi  <?php
                                            $giris_saati = new DateTime($donusveri['FlightSegments'][0]['ArrivalTime']);
                                            $cikis_saati = new DateTime($donusveri['FlightSegments'][1]['DepartureTime']);

                                            if ($cikis_saati < $giris_saati) {
                                                $cikis_saati->add(new DateInterval('P1D'));
                                            }

                                            $fark = $giris_saati->diff($cikis_saati);
                                            $dakika_farki = ($fark->h * 60) + $fark->i;

                                            echo   $dakika_farki . " dakika";
                                            ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<form action="reservation" method="post">
    <div class="row pt-2 animate__animated animate__fadeIn mobile_position">
        <div class="col-12 col-md-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-tags"></i> Paketler</h6>
                </header>
                <div class="breadcrumb-item text-custom breadcrumb">
                    Gidiş Paketleri
                </div>

                <div class="card-body">

                    <div class="d-flex row flex-row">


                        <?php foreach ($gidisveri['SelectableFares'] as $key => $gidis) :?>
                            <?php if($gidis['PaxCode']=='ADT'):?>

                                <div class="card col-sm-12 col-md-3 cardbg align-items-center p-3 gidiscard   <?php echo $key == 0 ? 'active selected' : '' ?>" onclick="selectCard(this)"
                                     data-gtotalfare="<?= $gidis['FareCode'] === 'EF' ? $totalEF : '' ?><?= $gidis['FareCode'] === 'XF' ? $totalXF : '' ?><?= $gidis['FareCode'] === 'PF' ? $totalPF : '' ?><?= $gidis['FareCode'] === 'BU' ? $totalBU : '' ?>"
                                     data-gtotalbase="<?= $gidis['FareCode'] === 'EF' ? $baseEF : '' ?><?= $gidis['FareCode'] === 'XF' ? $baseXF : '' ?><?= $gidis['FareCode'] === 'PF' ? $basePF : '' ?><?= $gidis['FareCode'] === 'BU' ? $baseBU : '' ?>"
                                     data-gtotalfee="<?= $gidis['FareCode'] === 'EF' ? $serviceFeeEF : '' ?><?= $gidis['FareCode'] === 'XF' ? $serviceFeeXF : '' ?><?= $gidis['FareCode'] === 'PF' ? $serviceFeePF : '' ?><?= $gidis['FareCode'] === 'BU' ? $serviceFeeBU : '' ?>"
                                     data-gtax="<?= ($gidis['FareCode'] === 'EF') ? ($totalEF - $baseEF - $serviceFeeEF) : '' ?>
               <?= ($gidis['FareCode'] === 'XF') ? ($totalXF - $baseXF - $serviceFeeXF) : '' ?>
               <?= ($gidis['FareCode'] === 'PF') ? ($totalPF - $basePF - $serviceFeePF) : '' ?>
               <?= ($gidis['FareCode'] === 'BU') ? ($totalBU - $baseBU - $serviceFeeBU) : '' ?>"
                                >
                                    <h5 class="text-custom pt-4">
                                        <label class="container fs-6 rounded-1 fw-bold"><?=$gidis['FareName']?>
                                            <input type="radio" name="card-selection" data-gidisprice=" <?= $gidis['FareCode'] === 'EF' ? number_format($totalEF, 2, ',', '.') : '' ?>
                                        <?= $gidis['FareCode'] === 'XF' ? number_format($totalXF, 2, ',', '.') : '' ?>
                                        <?= $gidis['FareCode'] === 'PF' ? number_format($totalPF, 2, ',', '.') : '' ?>
                                        <?= $gidis['FareCode'] === 'BU' ? number_format($totalBU, 2, ',', '.') : '' ?>"   value="<?= $gidisveri['FlightSegments'][0]['ProductId']?> <?= $gidis['FareCode'] ?>" class="card-radio gidisradiobutton gidis-price-radio" <?php echo $key == 0 ? 'checked' : '' ?>  >

                                            <span class="checkmark"></span>
                                        </label>
                                    </h5>

                                    <span class="lh-5"><i class="fa-solid fa-circle" style="color: #6B15B6!important; font-size: 10px"></i> <?=$gidis['MealName']?></span>
                                    <span ><i class="fa-solid fa-circle" style="color: #6B15B6!important; font-size: 10px"></i> Standart Koltuk
                                    Seçimi</span>


                                    <div class="d-flex flex-row mt-5 text-center ">

                                        <div class="card d-flex flex-column p-2">
                                            <span>Taşıma Bagajı</span>
                                            <span><?=$gidis['CarryOnBaggageAllowance']['Kilos']?> kg</span>
                                        </div>
                                        <div class="card d-flex flex-column p-2">
                                            <span>Kabin Bagajı</span>
                                            <span><?=$gidis['CheckedBaggageAllowance']['Kilos']?> kg</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mt-4">
                                    <span class="fs-5">
                                        <?=$_SESSION['paxcount']?> Kişi
                                    </span>
                                        <span class="ml-5 fs-5 fw-bold text-custom">
                                       <?= $gidis['FareCode'] === 'EF' ? number_format($totalEF, 2, ',', '.') : '' ?>
                                            <?= $gidis['FareCode'] === 'XF' ? number_format($totalXF, 2, ',', '.') : '' ?>
                                            <?= $gidis['FareCode'] === 'PF' ? number_format($totalPF, 2, ',', '.') : '' ?>
                                            <?= $gidis['FareCode'] === 'BU' ? number_format($totalBU, 2, ',', '.') : '' ?>

                                            <?php if ($gidis['Currency'] === 'TRY'): ?>
                                                <i class="fa-solid fa-turkish-lira-sign"></i>
                                            <?php endif; ?>
                                            <?php if ($gidis['Currency'] === 'USD'): ?>
                                                <i class="fa-solid fa-dollar-sign"></i>
                                            <?php endif; ?>
                                            <?php if ($gidis['Currency'] === 'EURO'): ?>
                                                <i class="fa-solid fa-euro-sign"></i>
                                            <?php endif; ?>
                                    </span>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endforeach;?>
                    </div>

                </div>
                <?php if (!empty($donusveri)):?>
                <div class="breadcrumb-item text-custom breadcrumb">
                    Dönüş Paketleri
                </div>
                <div class="card-body">
                    <div class="d-flex row flex-row">
                        <?php foreach ($donusveri['SelectableFares'] as $key => $donus) :?>
                        <?php if($donus['PaxCode']=='ADT'):?>
                        <div class="card col-sm-12 col-md-3 cardbg align-items-center p-3 donuscard " onclick="selectCard(this)"
                             data-dtotalfare="<?= $donus['FareCode'] === 'EF' ? $totalEF_return : '' ?><?= $donus['FareCode'] === 'XF' ? $totalXF_return : '' ?><?= $donus['FareCode'] === 'PF' ? $totalPF_return : '' ?><?= $donus['FareCode'] === 'BU' ? $totalBU_return : '' ?>"
                             data-dtotalbase="<?= $donus['FareCode'] === 'EF' ? $baseEF_return : '' ?><?= $donus['FareCode'] === 'XF' ? $baseXF_return : '' ?><?= $donus['FareCode'] === 'PF' ? $basePF_return : '' ?><?= $donus['FareCode'] === 'BU' ? $baseBU_return : '' ?>"
                             data-dtotalfee="<?= $donus['FareCode'] === 'EF' ? $serviceFeeEF_return : '' ?><?= $donus['FareCode'] === 'XF' ? $serviceFeeXF_return : '' ?><?= $donus['FareCode'] === 'PF' ? $serviceFeePF_return : '' ?><?= $donus['FareCode'] === 'BU' ? $serviceFeeBU_return : '' ?>"
                             data-dtax="<?= ($donus['FareCode'] === 'EF') ? ($totalEF_return - $baseEF_return - $serviceFeeEF_return) : '' ?>
           <?= ($donus['FareCode'] === 'XF') ? ($totalXF_return - $baseXF_return - $serviceFeeXF_return) : '' ?>
           <?= ($donus['FareCode'] === 'PF') ? ($totalPF_return - $basePF_return - $serviceFeePF_return) : '' ?>
           <?= ($donus['FareCode'] === 'BU') ? ($totalBU_return - $baseBU_return - $serviceFeeBU_return) : '' ?>"
                        <h5 class="text-custom pt-4">
                            <label class="container fs-6 rounded-1 fw-bold"><?=$donus['FareName']?>
                                <input type="radio" name="card-selection1" data-donusprice=" <?= $donus['FareCode'] === 'EF' ? number_format($totalEF_return, 2, ',', '.') : '' ?>
                                        <?= $donus['FareCode'] === 'XF' ? number_format($totalXF_return, 2, ',', '.') : '' ?>
                                        <?= $donus['FareCode'] === 'PF' ? number_format($totalPF_return, 2, ',', '.') : '' ?>
                                        <?= $donus['FareCode'] === 'BU' ? number_format($totalBU_return, 2, ',', '.') : '' ?>" value="<?= $donusveri['FlightSegments'][0]['ProductId']?> <?= $donus['FareCode'] ?>" class="card-radio donus-price-radio" <?php echo $key == 0 ? 'checked' : '' ?>  >

                                <span class="checkmark"></span>
                            </label>
                        </h5>

                        <span class="lh-5"><i class="fa-solid fa-circle" style="color: #6B15B6!important; font-size: 10px"></i> <?=$donus['MealName']?></span>
                        <span ><i class="fa-solid fa-circle" style="color: #6B15B6!important; font-size: 10px"></i> Standart Koltuk
                                    Seçimi</span>


                        <div class="d-flex flex-row mt-5 text-center ">

                            <div class="card d-flex flex-column p-2">
                                <span>Taşıma Bagajı</span>
                                <span><?=$donus['CarryOnBaggageAllowance']['Kilos']?> kg</span>
                            </div>
                            <div class="card d-flex flex-column p-2">
                                <span>Kabin Bagajı</span>
                                <span><?=$donus['CheckedBaggageAllowance']['Kilos']?> kg</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-4">
                                    <span class="fs-5">
                                        <?=$_SESSION['paxcount']?> Kişi
                                    </span>
                            <span class="ml-5 fs-5 fw-bold text-custom">
                                       <?= $donus['FareCode'] === 'EF' ? number_format($totalEF_return, 2, ',', '.') : '' ?>
                                <?= $donus['FareCode'] === 'XF' ? number_format($totalXF_return, 2, ',', '.') : '' ?>
                                <?= $donus['FareCode'] === 'PF' ? number_format($totalPF_return, 2, ',', '.') : '' ?>
                                <?= $donus['FareCode'] === 'BU' ? number_format($totalBU_return, 2, ',', '.') : '' ?>

                                <?php if ($donus['Currency'] === 'TRY'): ?>
                                    <i class="fa-solid fa-turkish-lira-sign"></i>
                                <?php endif; ?>
                                <?php if ($donus['Currency'] === 'USD'): ?>
                                    <i class="fa-solid fa-dollar-sign"></i>
                                <?php endif; ?>
                                <?php if ($donus['Currency'] === 'EURO'): ?>
                                    <i class="fa-solid fa-euro-sign"></i>
                                <?php endif; ?>
                                    </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach;?>


                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="row pt-2 animate__animated animate__fadeIn mobile_position">
        <div class="col-12 col-md-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-ticket"></i>  Fiyat Bilgileri</h6>
                    <span class="text-white">Taksit seçenekleri ödeme aşamasında gösterilmektedir</span>
                </header>
                <div class="fiyatbilgi card-body">
                    <div class="row text-center ml-5">
                        <div class="col-sm-2 d-flex flex-column ml-5">
                                    <span class="text-custom fs-6">
                                        Yolcu
                                    </span>
                            <span style="font-size: 15px">
                                         <?=$_SESSION['paxcount']?> Kişi
                                    </span>
                        </div>

                        <div class="col-sm-2  ">
                            <h4 class="text-custom fs-6">
                                Fiyat
                            </h4>
                            <span style="font-size: 15px" id="totalbasefare">
                                      <?php
                                      $gidisFare = $baseEF;
                                      $donusFare = $donusveri['SelectableFares'][0]['BaseFare'];
                                      $toplamSure = $gidisFare + $donusFare;

                                      echo number_format($toplamSure,2,',','.');
                                      ?>


                                    </span>   <span class="d-inline">
                                            <?php if ($gidis['Currency'] === 'TRY'): ?>
                                                <i class="fa-solid fa-turkish-lira-sign"></i>
                                            <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'USD'): ?>
                                    <i class="fa-solid fa-dollar-sign"></i>
                                <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'EURO'): ?>
                                    <i class="fa-solid fa-euro-sign"></i>
                                <?php endif; ?>
                                    </span>
                        </div>

                        <div class="col-sm-2 ">
                            <h3 class="text-custom fs-6"  >
                                Vergi
                            </h3>
                            <span style="font-size: 15px" id="totaltax" >
                                         <?php


                                         echo number_format($totalEF - $baseEF - $serviceFeeEF,2,',','.') ;


                                         ?>


                                    </span>   <span class="d-inline">
                                            <?php if ($gidis['Currency'] === 'TRY'): ?>
                                                <i class="fa-solid fa-turkish-lira-sign"></i>
                                            <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'USD'): ?>
                                    <i class="fa-solid fa-dollar-sign"></i>
                                <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'EURO'): ?>
                                    <i class="fa-solid fa-euro-sign"></i>
                                <?php endif; ?>
                                    </span>
                        </div>

                        <div class="col-sm-2 ">
                            <h4 class="text-custom fs-6"  >
                                Hizmet
                            </h4>
                            <span style="font-size: 15px" id="totalfee" class="d-inline">
                                         <?php
                                         $gidisFare = $serviceFeeEF;
                                         $donusFare = $donusveri['SelectableFares'][0]['ServiceFee'];
                                         $toplamSure = $gidisFare + $donusFare;

                                         echo number_format($toplamSure,2,',','.');
                                         ?>

                                    </span>
                            <span class="d-inline">
                                            <?php if ($gidis['Currency'] === 'TRY'): ?>
                                                <i class="fa-solid fa-turkish-lira-sign"></i>
                                            <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'USD'): ?>
                                    <i class="fa-solid fa-dollar-sign"></i>
                                <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'EURO'): ?>
                                    <i class="fa-solid fa-euro-sign"></i>
                                <?php endif; ?>
                                    </span>
                        </div>

                        <div class="col-sm-2  ">
                            <h3 class="text-custom fs-6"  >
                                Toplam
                            </h3>
                            <span style="font-size: 15px" id="totalfare"><?php
                                $gidisFare = $totalEF;
                                $donusFare = $donusveri['SelectableFares'][0]['TotalFare'];
                                $toplamSure = $gidisFare + $donusFare;

                                echo number_format($toplamSure,2,',','.');
                                ?>

                                        </span>   <span class="d-inline">
                                            <?php if ($gidis['Currency'] === 'TRY'): ?>
                                                <i class="fa-solid fa-turkish-lira-sign"></i>
                                            <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'USD'): ?>
                                    <i class="fa-solid fa-dollar-sign"></i>
                                <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'EURO'): ?>
                                    <i class="fa-solid fa-euro-sign"></i>
                                <?php endif; ?>
                                    </span>
                        </div>
                    </div>
                </div>
                <div class="card card-footer text-right">
                        <span class="text-custom fs-6"  >
                            <button type="button" class="btn btn fiyatbilgi-btn"><i class="fa-solid fa-caret-down text-custom"></i></button>
                            Toplam Ücret : <span class="fs-5 fw-bold"  id="generaltotalfare" ><?php
                                $gidisFare = $totalEF;
                                $donusFare = $donusveri['SelectableFares'][0]['TotalFare'];
                                $toplamSure = $gidisFare + $donusFare;

                                echo number_format($toplamSure,2,',','.');
                                ?>

                                 </span><span><?php if ($gidis['Currency'] === 'TRY'): ?>
                                    <i class="fa-solid fa-turkish-lira-sign"></i>
                                <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'USD'): ?>
                                    <i class="fa-solid fa-dollar-sign"></i>
                                <?php endif; ?>
                                <?php if ($gidis['Currency'] === 'EURO'): ?>
                                    <i class="fa-solid fa-euro-sign"></i>
                                <?php endif; ?></span>
                        </span>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row text-center mb-5 mt-2">

        <div class="col-sm-6">

        </div>

        <div class="col-sm-6">
            <button class="btn text-white w-50 rounded-2" style="background-color: #6B15B6" type="submit" value="1" name="selection">İlerle</button>
        </div>
    </div>
</form>
</div>
<?php require 'mainPage_statics/footer.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= returned($message); ?>
<script>
    $(document).ready(function () {
        $('.fiyatbilgi').hide();
        $('.fiyatbilgi-btn').click(function () {
            if ($('.fiyatbilgi').is(":visible")) {
                $('.fiyatbilgi').hide();
            } else {
                $('.fiyatbilgi').show();
            }
        });
    });
</script>
<style>
    .card.selected {
        border: 3px solid #6B15B6;
    }
    .card.selected1 {
        border: 3px solid #6B15B6;
    }
</style>

<script>
    function selectCard(card) {
        // Seçili olan varsa seçimini kaldır
        let selected = document.querySelector(".selected");
        if (selected) {
            selected.classList.remove("selected");
        }

        // Yeni karta seçim ekle
        card.classList.add("selected");

        // Eşleşen inputu seç
        card.querySelector(".card-radio").checked = true;
    }
</script>
<script>
    $(document).ready(function () {
        $('.gidiscard:first').addClass('active').siblings().removeClass('active');
        $('.donuscard:first').addClass('active').siblings().removeClass('active');

    });

    $('.gidiscard').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        var gidisTotalFare = $(this).data("gtotalfare");
        var gidisTotalBase = $(this).data("gtotalbase");
        var gidisTotalFee = $(this).data("gtotalfee");
        var gidisTotalFax = $(this).data("gtax");
        $('#totalbasefare').text(gidisTotalBase);
        $('#totalfee').text(gidisTotalFee);
        $('#totaltax').text(gidisTotalFax);
        $('#totalfare').text(gidisTotalFare);
    });


    <?php if (!empty($donusveri)):?>
    $('.gidiscard, .donuscard').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        // Gidiş bileti fiyatını al
        var gidisTotalFare = parseFloat($('.gidiscard.active').data("gtotalfare")) || 0 ;
        var donusTotalFare = parseFloat($('.donuscard.active').data("dtotalfare")) || 0 ;
        var gidisTotalBase = parseFloat($('.gidiscard.active').data("gtotalbase")) || 0 ;
        var donusTotalBase = parseFloat($('.donuscard.active').data("dtotalbase")) || 0 ;
        var gidisTotalFee = parseFloat($('.gidiscard.active').data("gtotalfee")) || 0 ;
        var donusTotalFee = parseFloat($('.donuscard.active').data("dtotalfee")) || 0 ;
        var gidisTotalFax = parseFloat($('.gidiscard.active').data("gtax")) || 0 ;
        var donusTotalFax = parseFloat($('.donuscard.active').data("dtax")) || 0 ;
        // Toplam fiyatı hesapla ve yazdır
        var totalFare = gidisTotalFare + donusTotalFare;
        var totalBase = gidisTotalBase + donusTotalBase;
        var totalFee = gidisTotalFee + donusTotalFee;
        var totalFax = gidisTotalFax + donusTotalFax;

        $('#generaltotalfare').text(totalFare.toFixed(2));
        $('#totalfare').text(totalFare.toFixed(2));
        $('#totalbasefare').text(totalBase.toFixed(2));
        $('#totalfee').text(totalFee.toFixed(2));
        $('#totaltax').text(totalFax.toFixed(2));

    });
    <?php endif;?>


    <?php if (empty($donusveri)):?>
    $('.gidiscard').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        var gidisTotalFare = parseFloat($('.gidiscard.active').data("gtotalfare"));
        var totalFare = gidisTotalFare;
        $('#generaltotalfare').text(totalFare.toFixed(2));
    });
    <?php endif;?>



</script>
