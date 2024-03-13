<?php require 'mainPage_statics/header.php'; ?>

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var intervalId = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(intervalId);
                window.location.href = "https://dev.verimportal.com/gezinomi_index";
            } else if (timer == 0) {
                display.textContent = "00:00";
            }
            document.cookie = "timer=" + timer + ";expires=" + new Date(new Date().getTime() + duration * 1000).toUTCString() + ";path=/";
        }, 1000);
    }

    window.onload = function () {
        var duration = 1200; // saniye cinsinden zaman aralığı
        var display = document.querySelector('#timer');
        var timerValue = getCookie("timer");
        if (timerValue) {
            // kaydedilen zamanlayıcı değeri varsa, timer'ı o değerden başlatın
            startTimer(timerValue, display);
        } else {
            startTimer(duration, display);
        }
    };

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) {
            return parts.pop().split(";").shift();
        }
    }
</script>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi Uçak</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Ödeme</a>
        </li>
    </ol>
    <div class="row pt-2 p-3 mb-5">
        <header class="card-header d-md-flex align-items-center bg-custom2">
            <h6 class="card-header-title text-light mt-1">Ödeme Ekranı</h6>
            <h6 id="timer" style="color:white;align-self: center; font-size: 17px; margin-left: auto;" class="ml-auto">20:00</h6>
        </header>
        <form class="d-sm-flex" action="<?= site_url('ticket_paying') ?>" method="post">

            <input hidden name="shoppingId" value="<?=$response_data['ShoppingCart']['Id']?>">
            <input hidden name="currency" value="<?=$response_data['ShoppingCart']['AirBookings'][0]['PassengerBreakdowns'][0]['Currency']?>">
            <input hidden name="totalfare" value="<?=$response_data['ShoppingCart']['AirBookings'][0]['PassengerBreakdowns'][0]['TotalFare']?>">
            <input hidden name="sessionId" value="<?=post('sessionId')?>">
            <input hidden   name="sessionToken" value="<?=post('sessionToken')?>">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-dark pt-3">Sepetim</span>
                    <!--<span class="badge badge-pill bg-custom2">3</span>-->
                </h4>
                <?php
                $months = array('January' => 'Ocak', 'February' => 'Şubat', 'March' => 'Mart', 'April' => 'Nisan', 'May' => 'Mayıs', 'June' => 'Haziran', 'July' => 'Temmuz', 'August' => 'Ağustos', 'September' => 'Eylül', 'October' => 'Ekim', 'November' => 'Kasım', 'December' => 'Aralık');
                $days = array('Monday' => 'Pazartesi', 'Tuesday' => 'Salı', 'Wednesday' => 'Çarşamba', 'Thursday' => 'Perşembe', 'Friday' => 'Cuma', 'Saturday' => 'Cumartesi', 'Sunday' => 'Pazar');
                $totalfare = $response_data['ShoppingCart']['AirBookings'][0]['TotalFare'];
                $currency = $response_data['ShoppingCart']['AirBookings'][0]['Currency'];
                $first_option = $response_data['ShoppingCart']['AirBookings'][0];
                $first_segment = $first_option['FlightSegments'][0];
                $second_option=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][1];
                $totalfare=$first_option['PassengerBreakdowns'][0]['TotalFare'];
                ?>
                <ul class="list-group mb-3 sepet">
                    <li class="list-group-item d-flex justify-content-between lh-condensed text-white bg-custom2">
                        <div>

                            <h6 class="my-0"><i class="fa-solid fa-location-dot text-white"></i> <?= $_SESSION['Gidisucagi']?> </h6>

                        </div>
                        <i class="fa-solid fa-arrow-right mt-2 mr-4"></i>
                        <div>
                            <h6 class="my-0"><i class="fa-solid fa-location-dot text-white"></i> <?= $_SESSION['donusucagi']?></h6>

                        </div>
                    </li>
                    <?php $flighsegment=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'];?>
                    <?php foreach ($flighsegment as $option) : ?>
                        <?php if ($option['DirectionInd']==0):?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0 fw-bold"><i class="fa-regular fa-calendar-days"></i> Gidiş Uçuşu</h6>
                                    <small> <?=$option['DepartureTime']." ".strtr(date(" d F Y ",strtotime($option['DepartureDate'])),$months)." ".strtr(date("l ",strtotime($option['DepartureDate'])),$days)?> </small>
                                    <br>
                                    <small><?= $option['DepartureAirportName']?></small>
                                </div>
                                <div>
                                    <small class="moon">
                                        <i class="fa-solid fa-arrow-right mr-1"></i>
                                    </small>
                                </div>
                                <div>
                                    <h6 class="my-0 fw-bold"><i class="fa-regular fa-calendar-days"></i> Gidiş Varış</h6>
                                    <small><?=$option['ArrivalTime']." ".strtr(date(" d F Y ",strtotime($option['ArrivalDate'])),$months)." ".strtr(date("l ",strtotime($option['ArrivalDate'])),$days)?></small>
                                    <br>
                                    <small><?= $option['ArrivalAirportName']?></small>
                                </div>
                            </li>
                        <?php endif;?>
                    <?php endforeach;?>
                    <?php if (!empty($_SESSION['selection2'])):?>
                        <?php foreach ($flighsegment as $option) : ?>
                            <?php if ($option['DirectionInd']==1):?>

                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0 fw-bold"><i class="fa-regular fa-calendar-days"></i> Dönüş Uçuşu</h6>
                                        <small> <?=$option['DepartureTime']." ".strtr(date(" d F Y ",strtotime($option['DepartureDate'])),$months)." ".strtr(date("l ",strtotime($option['DepartureDate'])),$days)?> </small>
                                        <br>
                                        <small><?= $option['DepartureAirportName']?></small>
                                    </div>
                                    <div>
                                        <small class="moon">
                                            <i class="fa-solid fa-arrow-right mr-2"></i>
                                        </small>
                                    </div>
                                    <div>
                                        <h6 class="my-0 fw-bold"><i class="fa-regular fa-calendar-days"></i> Dönüş Varış</h6>
                                        <small><?=$option['ArrivalTime']." ".strtr(date(" d F Y ",strtotime($option['ArrivalDate'])),$months)." ".strtr(date("l ",strtotime($option['ArrivalDate'])),$days)?></small>
                                        <br>
                                        <small><?= $option['ArrivalAirportName']?></small>
                                    </div>
                                </li>

                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Kişiler</h6>
                        </div>
                        <span><?=$_SESSION['paxcount'];?> Kişi</span>

                    </li>


                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Uçuş</h6>
                        </div>
                        <span><?= number_format($subtotal,2,',','.');?> <?= $currency?></span>
                    </li>


                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold"><i class="fa-solid fa-wallet"></i> Toplam Tutar</span>
                        <strong><?= number_format($subtotal,2,',','.');?> <?= $currency?></strong>
                    </li>
                </ul>
                <div class="card-wrapper float-left d-none d-md-block"></div>
            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3 pt-3">Fatura Bilgileri</h4>

                <div class="row">
                    <div class="col-md-6 mb-3 col-6">
                        <label for="firstName" class="form-label text-custom fw-bold mb-0">Ad Soyad</label>
                        <input type="text" class="form-control" id="ad-soyad" name="namesurname" required>
                        <div class="invalid-feedback">Ad Soyad alanı gerekli.</div>
                    </div>
                    <div class="col-md-6 mb-3 col-6">
                        <label for="lastName" class="form-label text-custom fw-bold mb-0">Telefon</label>
                        <input type="text" class="form-control" id="telefon" name="phone" required placeholder="05554443322">
                        <div class="invalid-feedback">Telefon alanı gerekli.</div>
                    </div>
                </div>

                <div class="d-flex mb-3">
                    <label class="container">Bireysel
                        <input type="radio" name="radio" id="inlineRadio1" required>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Kurumsal
                        <input type="radio" name="radio" id="inlineRadio2" required>
                        <span class="checkmark"></span>
                    </label>
                </div>


                <div class="mb-3 tc">
                    <label for="tcno" class="form-label text-custom fw-bold mb-0">TC No
                        <span class="text-muted"></span>
                    </label>
                    <input type="text" class="form-control" id="tcno" placeholder="Tc No Giriniz" name="tcno" required>
                </div>

                <div class="row verginodaire">
                    <div class="col-md-6 mb-3 col-6">
                        <label for="firstName" class="form-label text-custom fw-bold mb-0">Vergi No</label>
                        <input type="text" class="form-control" id="vergino" name="vergino" placeholder="Vergi No Giriniz" required>
                    </div>
                    <div class="col-md-6 mb-3 col-6">
                        <label for="vergidairesi" class="form-label text-custom fw-bold mb-0">Vergi Dairesi</label>
                        <input type="text" class="form-control" id="vergidairesi" name="vergidairesi" placeholder="Vergi Dairesi Giriniz" required>
                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="email" class="form-label text-custom fw-bold mb-0">Email <span
                                class="text-muted">(Opsiyonel)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" name="mail">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label text-custom fw-bold mb-0">Adres</label>
                    <input type="text" class="form-control" id="adres" placeholder="1234 Main St" name="adress"
                           required>
                    <div class="invalid-feedback">Adres alanı gerekli.</div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3 col-6">
                        <label for="Iller" class="form-label text-custom fw-bold mb-0">İl</label>
                        <select class="custom-select d-block w-100" id="Iller" name="Iller" required>
                            <option value="0" selected disabled>Lütfen Bir İl Seçiniz</option>
                        </select>
                        <div class="invalid-feedback">İl alanı gerekli.</div>
                    </div>
                    <div class="col-md-4 mb-3 col-6">
                        <label for="Ilceler" class="form-label text-custom fw-bold mb-0">İlçe</label>
                        <select class="custom-select d-block w-100" id="Ilceler" disabled="disabled" name="Ilceler" required>
                            <option value="0" selected disabled>Lütfen Önce bir İl seçiniz</option>
                        </select>
                        <div class="invalid-feedback">İlçe alanı gerekli.</div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="zip" class="form-label text-custom fw-bold mb-0">Posta Kodu</label>
                        <input type="text" class="form-control" id="posta-kodu" name="postcode" placeholder="" required>
                    </div>
                </div>
                <hr class="mb-4 text-custom">
                <h4 class="mb-3">Ödeme Türü</h4>
                <div class="row">
                    <div class="pay-type kredi col-4 text-center text-custom mb-1">
                        <h6 class="border-active mb-2">Kredi Kartı</h6>
                    </div>
                </div>

                <div class="form-container active pay-type-container kredi">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-custom fw-bold mb-0" for="cc-name">Ad Soyad</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" maxlength="40"
                                   name="cardnamesurname" required>
                            <small class="text-muted">Kredi kartı üzerinde yazılan ad soyad</small>
                            <div class="invalid-feedback">Ad Soyad alanı gerekli.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-custom fw-bold mb-0" for="cc-number">Kredi Kartı Numarası</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" name="cardnumber"
                                   required>
                            <div class="invalid-feedback">Kredi Kartı Numarası alanı gerekli.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="text-custom fw-bold mb-0" for="cc-expiration">Son Kullanım Tarihi</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="cardmonth" required>
                                        <option value="">Ay</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="cardyear" required>
                                        <option value="">Yıl</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                    </select>
                                </div>
                            </div>
                            <small class="text-muted mb-3">AA/YY şeklinde</small>
                            <div class="invalid-feedback">Son Kullanım Tarihi alanı gerekli.</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="text-custom fw-bold mb-0" for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" name="cvc" required>
                            <small class="text-muted">Kartın arkasındaki kod</small>
                            <div class="invalid-feedback">CVV alanı gerekli.</div>
                        </div>


                    </div>
                </div>
                <hr class="mb-4 text-custom">
                <button type="submit" name="pay"  class="btn btn-lg btn-block btn-custom"   value="1">Ödeme
                    İşlemine Devam Et
                </button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/card/2.4.0/jquery.card.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/card/2.4.0/card.css">
    <script>
        $(document).ready(function() {
            // "namesurname" adındaki input alanını seçiyoruz
            var nameInput = $("input[name='namesurname']");

            // Sadece harf, boşluk, ö, ü, ğ gibi karakterlerin girişi için keypress olayını kullanıyoruz
            nameInput.keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]*$/;
                if (!pattern.test(inputValue)) {
                    event.preventDefault(); // Sadece belirtilen karakterlerin girişi yapılmasını sağlıyoruz
                }
            });

            // Maksimum 40 karakter olmasını sağlıyoruz
            nameInput.attr("maxlength", 40);

            // Input alanı odak kaybettiğinde adın uzunluğunu kontrol ediyoruz ve hata mesajını gösteriyoruz
            nameInput.blur(function() {
                var nameLength = nameInput.val().length;
                if (nameLength === 0) {
                    nameInput.get(0).setCustomValidity("Lütfen bir ad girin.");
                } else if (nameLength > 40) {
                    nameInput.get(0).setCustomValidity("Adınız ve Soyadınız 40 karakterden uzun olamaz.");
                } else {
                    nameInput.get(0).setCustomValidity("");
                }
            });
        });

        $(document).ready(function() {
            $("input[name='phone']").attr("maxlength", 11)
                .keypress(function(event) {
                    var inputValue = String.fromCharCode(event.which);
                    var pattern = /^[0-9]*$/;
                    if (!pattern.test(inputValue)) {
                        event.preventDefault();
                    }
                })
                .blur(function() {
                    var phoneInput = $(this);
                    var phoneNumber = phoneInput.val().replace(/[^\d]/g, '');

                    if (phoneNumber.length !== 11 || phoneNumber.charAt(0) !== '0') {
                        phoneInput.get(0).setCustomValidity("Telefon numarası 11 haneli olmalıdır ve ilk hanesi '0' olmalıdır.");
                    } else {
                        phoneInput.get(0).setCustomValidity("");
                    }
                });
        });
        $(document).ready(function() {
            // "contactmail" adındaki input alanını seçiyoruz
            var emailInput = $("input[name='mail']");

            // Sadece belirli karakterlerin girişi için keypress olayını kullanıyoruz
            emailInput.keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[a-zA-Z0-9@\.\-\_]*$/; // E-posta adresinde kullanılabilen karakterlerin regex pattern'i
                if (!pattern.test(inputValue)) {
                    event.preventDefault(); // Belirli karakterler harici bir şey girilmesini engelliyoruz
                }
            });

            emailInput.blur(function() {
                var input = $(this);
                var email = input.val();

                if (email !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    input.get(0).setCustomValidity("Lütfen geçerli bir e-posta adresi girin.");
                } else{
                    input.get(0).setCustomValidity("");
                }
            });
        });
        $(document).ready(function() {
            // "adres" adındaki input alanını seçiyoruz
            var adresInput = $("input[name='adress']");

            // Sadece belirli karakterlerin girişi için keypress olayını kullanıyoruz
            adresInput.keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[a-zA-Z0-9\s\,\.\-\_\#]*$/; // Adreste kullanılabilen karakterlerin regex pattern'i
                if (!pattern.test(inputValue)) {
                    event.preventDefault(); // Belirli karakterler harici bir şey girilmesini engelliyoruz
                }
            });

            // Gerektiğinde hata mesajı göstermek için blur olayını kullanıyoruz
            adresInput.blur(function() {
                var input = $(this);
                var adres = input.val();

                if (adres.length < 10) {
                    input.get(0).setCustomValidity("Adres en az 10 karakter olmalıdır.");
                } else if (adres.length > 50) {
                    input.get(0).setCustomValidity("Adres 50 karakterden fazla olamaz.");
                } else {
                    $(this).get(0).setCustomValidity("");
                }
            });
        });
        $(document).ready(function() {
            // "posta-kodu" adındaki input alanını seçiyoruz
            var postaKoduInput = $("input[name='postcode']");

            // Sadece sayı girişi için keypress olayını kullanıyoruz
            postaKoduInput.keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[0-9]*$/; // Sadece sayı karakterlerinin regex pattern'i
                if (!pattern.test(inputValue)) {
                    event.preventDefault(); // Sayı harici bir şey girilmesini engelliyoruz
                }
            });

            // Gerektiğinde hata mesajı göstermek için blur olayını kullanıyoruz
            postaKoduInput.blur(function() {
                var input = $(this);
                var postaKodu = input.val();

                if (postaKodu.length !== 5 || !/^[0-9]+$/.test(postaKodu)) {
                    input.get(0).setCustomValidity("Lütfen geçerli bir posta kodu girin. Posta kodu, 5 haneli bir sayı olmalıdır.");
                } else {
                    $(this).get(0).setCustomValidity("");
                }
            });
        });
        $(document).ready(function() {
            // "cardnamesurname" adındaki input alanını seçiyoruz
            var nameInput = $("input[name='cardnamesurname']");

            // Sadece harf, boşluk, ç, ü, ğ gibi karakterlerin girişi için keypress olayını kullanıyoruz
            nameInput.keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[a-zA-Zöçüğ\s]*$/;
                if (!pattern.test(inputValue)) {
                    event.preventDefault(); // Sadece belirtilen karakterlerin girişi yapılmasını sağlıyoruz
                }
            });

            // Maksimum 40 karakter olmasını sağlıyoruz
            nameInput.attr("maxlength", 40);

            // Input alanı odak kaybettiğinde adın uzunluğunu kontrol ediyoruz ve hata mesajını gösteriyoruz
            nameInput.blur(function() {
                var nameLength = nameInput.val().length;
                if (nameLength === 0) {
                    nameInput.get(0).setCustomValidity("Lütfen bir ad girin.");
                } else if (nameLength > 40) {
                    nameInput.get(0).setCustomValidity("Adınız ve Soyadınız 40 karakterden uzun olamaz.");
                } else {
                    nameInput.get(0).setCustomValidity("");
                }
            });
        });

        $(document).ready(function() {
            // "cc-number" adındaki input alanını seçiyoruz
            var ccNumberInput = $("input[name='cardnumber']");

            // Sadece sayı girişi için keypress olayını kullanıyoruz
            ccNumberInput.keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[0-9]*$/; // Sadecesayı karakterlerinin regex pattern'i
                if (!pattern.test(inputValue)) {
                    event.preventDefault(); // Sayı harici bir şey girilmesini engelliyoruz
                }
            });

            // Her 4 hanedebir "-" eklemek için input alanına girilen değeri dinliyoruz
            ccNumberInput.on("keyup", function() {
                var input = $(this);
                var ccNumber = input.val();

                // "-" işaretlerini otomatik olarak ekliyoruz
                ccNumber = ccNumber.replace(/-/g, ""); // Önce tüm "-" işaretlerini kaldırıyoruz
                ccNumber = ccNumber.replace(/(.{4})/g, "$1-"); // Her 4 karakter sonrasında "-" işareti ekliyoruz
                ccNumber = ccNumber.replace(/-$/, ""); // Son karakter"-" ise kaldırıyoruz

                input.val(ccNumber);
            });

            // Gerektiğinde hata mesajı göstermek için blur olayını kullanıyoruz
            ccNumberInput.blur(function() {
                var input = $(this);
                var ccNumber = input.val();

                if (  ccNumber.length > 19) { // length kontrolü 16 yerine 19 olmalı
                    input.get(0).setCustomValidity("Kredi kartı numarası 16 haneli olmalıdır.");
                } else {
                    $(this).get(0).setCustomValidity("");
                }
            });


            $("form").submit(function() {
                var ccNumberInput = $("input[name='cardnumber']");
                var ccNumber = ccNumberInput.val();
                ccNumberInput.val(ccNumber.replace(/-/g, ""));
            });
        });
        $("#cc-cvv").keypress(function(e) {
            // Sadece sayısal tuşlara izin ver
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $("#cc-cvv").on("input", function() {
            var cvv = $(this).val();
            if(cvv.length === 3) {
                $(this).get(0).setCustomValidity("");
            } else {
                $(this).get(0).setCustomValidity("CVV 3 haneli olmalıdır.");
            }
        }).blur(function() {
            $(this).trigger("input");
        });

    </script>
    <script>
        var $il = $('#il'),
            $ilce = $('#ilce'),
            $options = $ilce.find('option');

        $il.on('change', function () {
            $ilce.html($options.filter('[value="' + this.value + '"]'));
        }).trigger('change');
    </script>
    <script>
        $('.needs-validation').card({
            container: '.card-wrapper',
        });

        // (function () {
        //     'use strict';
        //
        //     window.addEventListener('load', function () {
        //         var forms = document.getElementsByClassName('needs-validation');
        //
        //         var validation = Array.prototype.filter.call(forms, function (form) {
        //             form.addEventListener('submit', function (event) {
        //                 if (form.checkValidity() === false) {
        //                     event.preventDefault();
        //                     event.stopPropagation();
        //                 }
        //                 form.classList.add('was-validated');
        //             }, false);
        //         });
        //     }, false);
        // })();
        $(document).ready(function () {
            $(".pay-type").click(function (e) {
                $clas = "." + $(this).attr('class').split(" ")[1];
                $(".pay-type-container").addClass("d-none");
                $($clas).removeClass("d-none");
                $(".pay-type >h6").removeClass("border-active").addClass("border-type");
                $($clas + ">h6").removeClass("border-type").addClass("border-active");
            });
        });

    </script>

</div>


<?php require 'mainPage_statics/footer.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= returned($message); ?>

<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $('form').submit(function() {-->
<!--            var il = $('#Iller').val();-->
<!--            var ilce = $('#Ilceler').val();-->
<!--            if (il == null || il == 0 || ilce == null || ilce == 0) {-->
<!--                alert('Lütfen il ve ilçe seçiniz.');-->
<!--                return false;-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script>
    $(document).ready(function () {
        $('.tc').hide();
        $('.verginodaire').hide();
    });
</script>
<script>
    $(function(){
        $('#inlineRadio1').change(function(){
            $('.tc').show();
            $('.verginodaire').hide();
            $('#vergino').prop("required", false);
            $('#vergidairesi').prop("required", false);
            $('#tcno').prop("required", true);
        });

        $('#inlineRadio2').change(function(){
            $('.verginodaire').show();
            $('.tc').hide();
            $('#vergino').prop("required", true);
            $('#vergidairesi').prop("required", true);
            $('#tcno').prop("required", false);
        });

        $('#tcno').on('input', function() {
            var tcno = $(this).val().replace(/\D/g, '');
            if (tcno.length > 11) {
                tcno = tcno.substr(0, 11);
            }
            $(this).val(tcno);

            if (tcno.length === 11 && /^[1-9][0-9]*$/.test(tcno)) {
                var total = 0;
                for (var i = 0; i < 10; i++) {
                    total += parseInt(tcno.charAt(i));
                }
                if (total % 10 !== parseInt(tcno.charAt(10))) {
                    $(this).get(0).setCustomValidity('TC Kimlik Numarası geçersiz.');
                } else {
                    $(this).get(0).setCustomValidity('');
                }
            } else {
                $(this).get(0).setCustomValidity('Lütfen geçerli bir TC Kimlik Numarası girin.');
            }
        });

        $('#vergino').on('input', function() {
            var vergino = $(this).val().replace(/\D/g, '');
            if (vergino.length > 10) {
                vergino = vergino.substr(0, 10);
            }
            $(this).val(vergino);

            if (vergino.length === 10 && /^[1-9][0-9]*$/.test(vergino)) {
                $(this).get(0).setCustomValidity('');
            } else {
                $(this).get(0).setCustomValidity('Lütfen geçerli bir Vergi Numarası girin.');
            }
        });

        $('#vergidairesi').on('input', function() {
            var vergidairesi = $(this).val();
            if (vergidairesi.length > 25) {
                vergidairesi = vergidairesi.substr(0, 25);
            }

            if (vergidairesi.trim().length > 0 && /^[\w\s]*$/.test(vergidairesi)) {
                $(this).get(0).setCustomValidity('');
            } else {
                $(this).get(0).setCustomValidity('Lütfen geçerli bir Vergi Dairesi girin.');
            }

            $(this).val(vergidairesi);
        });
    });
</script>

