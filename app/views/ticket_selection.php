<?php require 'mainPage_statics/header.php'; ?>

<style>

    .hidden {
        display: none;
    }

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
    /*havayolu checkbox başlangıç*/
    .anadolujet {
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }
    .container-check:hover input ~ .anadolujet {
        background-color: #ccc;
    }
    .container-check input:checked ~ .anadolujet {
        background-color: #6B15B6;
    }
    .anadolujet:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container-check input:checked ~ .anadolujet:after {
        display: block;
    }
    .container-check .anadolujet:after {
        left: 3px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .pegasus {
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }
    .container-check:hover input ~ .pegasus {
        background-color: #ccc;
    }
    .container-check input:checked ~ .pegasus {
        background-color: #6B15B6;
    }
    .pegasus:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container-check input:checked ~ .pegasus:after {
        display: block;
    }
    .container-check .pegasus:after {
        left: 3px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }


    .thy {
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }
    .container-check:hover input ~ .thy {
        background-color: #ccc;
    }
    .container-check input:checked ~ .thy {
        background-color: #6B15B6;
    }
    .thy:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container-check input:checked ~ .thy:after {
        display: block;
    }
    .container-check .thy:after {
        left: 3px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }


    .birdenfazla-havayolu {
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }
    .container-check:hover input ~ .birdenfazla-havayolu {
        background-color: #ccc;
    }
    .container-check input:checked ~ .birdenfazla-havayolu {
        background-color: #6B15B6;
    }
    .birdenfazla-havayolu:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container-check input:checked ~ .birdenfazla-havayolu:after {
        display: block;
    }
    .container-check .birdenfazla-havayolu:after {
        left: 3px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    /*havayolu checkbox bitiş*/
    /*Direk uçuş checkbox başlangıç*/
    .container-check input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    .direktucus {
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }
    .container-check:hover input ~ .direktucus {
        background-color: #ccc;
    }
    .container-check input:checked ~ .direktucus {
        background-color: #6B15B6;
    }
    .direktucus:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container-check input:checked ~ .direktucus:after {
        display: block;
    }
    .container-check .direktucus:after {
        left: 3px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    /*Direk uçuş checkbox bitiş*/





    /*Aktarmalı uçuş checkbox başlangıç*/
    .container-check input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    .aktarmalıucus {
        position: absolute;
        top: 0;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }
    .container-check:hover input ~ .aktarmalıucus {
        background-color: #ccc;
    }
    .container-check input:checked ~ .aktarmalıucus {
        background-color: #6B15B6;
    }
    .aktarmalıucus:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container-check input:checked ~ .aktarmalıucus:after {
        display: block;
    }
    .container-check .aktarmalıucus:after {
        left: 3px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    /*Aktarmalı uçuş checkbox bitiş*/
    .carousel-control2 {
        position: absolute;
        top: 50px;
        left: 15px;
        font-size: 60px;
        font-weight: 100;
    }

    .carousel-control2.left-donus {
        left: 15px;
    }

    .carousel-control2.right-donus {
        right: 15px;
        left: auto; /* Sol taraf ayarı sol kontrol için */
    }
    .carousel-control-chart {
        position: absolute;
        top: 50px;
        left: 15px;
        font-size: 60px;
        font-weight: 100;
    }

    .carousel-control-chart.left {
        left: 15px;
    }

    .carousel-control-chart.right {
        right: 15px;
        left: auto; /* Sol taraf ayarı sol kontrol için */
    }

    .right-angele .left-angele{
        display: inline-block; /* Iconlar satır içi blok olarak görünsün */
        padding: 10px; /* Boşlukları ayarlar */
    }
    .fa-circle-check{
        position:absolute;
        top: 25%;
        right:49%;
        font-size: 40px;
        color: #6b15b6;"
    }
    .regular{
        font-size: 14px;
        font-family: "Open Sans", sans-serif;
        font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }
    .small{
        font-size: 12.5px;
        font-family: "Open Sans", sans-serif;
        font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }
    /* radio button başlangıç */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 12px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #eee;
        border-radius: 50%;
    }
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }
    .container input:checked ~ .checkmark {
        background-color: #6B15B6;
    }
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    .container input:checked ~ .checkmark:after {
        display: block;
    }
    .container .checkmark:after {
        top: 6px;
        left: 6px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: white;
    }
    .container-check {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 12px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* radio button bitiş */
    .selection-range{
        -webkit-appearance: none;
        margin-right: 15px;
        width: 100%;
        height: 10px;
        background: #b3b3b3;
        border-radius: 5px;
        background-image: linear-gradient(#6B15B6, #6B15B6);
        background-size: 0% 100%;
        background-repeat: no-repeat;
    }
    .chart-card{
        background: #fff;
        border-radius: 5px;
        padding: 1rem;
    }
</style>
<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var intervalId = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (timer < 0) {
                clearInterval(intervalId); // zamanlayıcıyı durdurun
                // zaman dolunca yapılacak işlemler
                window.location.href = "https://dev.verimportal.com/gezinomi_index"; // istediğiniz sayfaya yönlendirin
            } else if (timer == 0) {
                display.textContent = "00:00"; // sayacı 00:00 olarak ayarlayın
            }
            // her saniye cookie'ye zamanlayıcı değerlerini kaydedin
            document.cookie = "timer=" + timer + ";expires=0";
            timer--;
        }, 1000);
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
<div class="container-fluid bg-light pt-5 p-3 Ömb-5 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi Uçak</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Bilet Seçim</a>
        </li>
    </ol>
    <div class="row pt-2 animate__animated animate__fadeIn sticky-top mobile_position">
        <div class="col-12 col-md-12">
            <div class="card h-100">
                <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bilet Satış <h6 id="timer" style="color:white;align-self: center; font-size: 17px; margin-left: auto;"
                                                                                  class="ml-auto">20:00</h6></h6>
                </header>
                <form action="<?= site_url('ticket_selection') ?>" method="post">
                    <input type="hidden" id="DepartureDay" name="DepartureDay" value="DepartureDay">


                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label class="form-label text-custom mb-0"><strong>Nereden</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">

                                    </div>
                                    <input hidden  name="gidisyeri"  id="gidisyeri" value="İstanbul, Türkiye SAW (Sabiha Gökçen Havalimanı)"
                                    >
                                    <input
                                            hidden
                                            name="donusyeri"
                                            id="donusyeri"
                                            value="İzmir, Türkiye ADB (Adnan Menderes Havalimanı)"
                                    >
                                    <select    name="AirportCode" data-live-search="true" title="Havalimanı Seçiniz" id="city-select1" onchange="disableOption()" class="selectpicker form-control" list="city-list" placeholder="Şehir veya Havalimanı Yazın" required>

                                        <option value="ADA">Adana, Türkiye ADA (Şakirpaşa Havalimanı)</option>
                                        <option value="ADF">Adıyaman, Türkiye ADF (Adıyaman Havalimanı)</option>
                                        <option value="AJI">Ağrı, Türkiye AJI (Ağrı Havalimanı)</option>
                                        <option value="ESB">Ankara, Türkiye ESB (Esenboğa Havalimanı)</option>
                                        <option value="AYT">Antalya, Türkiye AYT (Antalya Havalimanı)</option>
                                        <option value="MZH">Amasya, Türkiye MZH (Merzifon Havalimanı)</option>
                                        <option value="XHQ">Artvin, Türkiye XHQ (Hopa Havalimanı)</option>
                                        <option value="EDO">Balıkesir Edremit, Türkiye EDO (Koca Seyit Havalimanı)</option>
                                        <option value="BDM">Bandırma, Türkiye BDM (Bandırma Havalimanı)</option>
                                        <option value="BAL">Batman, Türkiye BAL (Batman Havalimanı)</option>
                                        <option value="BGG">Bingöl, Türkiye BGG (Bingöl Havalimanı)</option>
                                        <option value="BJV">Bodrum, Türkiye BJV (Milas Havalimanı)</option>
                                        <option value="YEI">Bursa, Türkiye YEI (Yenişehir Havalimanı)</option>
                                        <option value="CKZ">Çanakkale, Türkiye CKZ (Çanakkale Havalimanı)</option>
                                        <option value="DLM">Dalaman, Türkiye DLM (Dalaman Havalimanı)</option>
                                        <option value="DNZ">Denizli, Türkiye DNZ (Çardak Havalimanı)</option>
                                        <option value="DIY">Diyarbakır, Türkiye DIY (Diyarbakır Havalimanı)</option>
                                        <option value="EZS">Elazığ, Türkiye EZS (Elazığ Havalimanı)</option>
                                        <option value="AOE">Eskişehir, Türkiye AOE (Anadolu Havalimanı)</option>
                                        <option value="ERZ">Erzurum, Türkiye ERZ (Erzurum Havalimanı)</option>
                                        <option value="ERC">Erzincan, Türkiye ERC (Erzincan Havalimanı)</option>
                                        <option value="GZT">Gaziantep, Türkiye GZT (Oğuzeli Havalimanı)</option>
                                        <option value="GZP">Gazipaşa, Türkiye GZP (Gazipaşa Havalimanı)</option>
                                        <option value="GKD">Gökçeada, Türkiye GKD (Gökçeada Havalimanı)</option>
                                        <option value="YKO">Hakkari, Türkiye YKO (Hakkari Yüksekova Havalimanı)</option>
                                        <option value="HTY">Hatay, Türkiye HTY (Hatay Havalimanı)</option>
                                        <option value="IGD">Iğdır, Türkiye IGD (Şehit Bülent Aydın Havalimanı)</option>
                                        <option value="ISE">Isparta, Türkiye ISE (Süleyman Demirel Havalimanı)</option>
                                        <option value="SAW">İstanbul, Türkiye SAW (Sabiha Gökçen Havalimanı)</option>
                                        <option value="IST" selected >İstanbul, Türkiye IST (İstanbul Havalimanı)</option>
                                        <option value="ADB"  >İzmir, Türkiye ADB (Adnan Menderes Havalimanı)</option>
                                        <option value="KCM">Kahramanmaraş, Türkiye KCM (Kahramanmaraş Havalimanı)</option>
                                        <option value="KSY">Kars, Türkiye KSY (Kars Havalimanı)</option>
                                        <option value="KFS">Kastamonu, Türkiye KFS (Kastamonu Havalimanı)</option>
                                        <option value="ASR">Kayseri, Türkiye ASR (Erkilet Havalimanı)</option>
                                        <option value="KCO">Kocaeli, Türkiye KCO (Cengiz Topel Havalimanı)</option>
                                        <option value="KYA">Konya, Türkiye KYA (Konya Havalimanı)</option>
                                        <option value="KZR">Kütahya, Türkiye KZR (Zafer Havalimanı)</option>
                                        <option value="MLX">Malatya, Türkiye MLX (Erhaç Havalimanı)</option>
                                        <option value="MQM">Mardin, Türkiye MQM (Mardin Havalimanı)</option>
                                        <option value="MSR">Muş, Türkiye MSR (Muş Havalimanı)</option>
                                        <option value="NAV">Nevşehir, Türkiye NAV (Kapadokya Havalimanı)</option>
                                        <option value="OGU">Ordu, Türkiye OGU (Ordu Giresun Havalimanı)</option>
                                        <option value="RZV">Rize, Türkiye RZV (Rize-Artvin Havalimanı)</option>
                                        <option value="SZF">Samsun, Türkiye SZF (Çarşamba Havalimanı)</option>
                                        <option value="SXZ">Siirt, Türkiye SXZ (Siirt Havalimanı)</option>
                                        <option value="NOP">Sinop, Türkiye NOP (Sinop Havalimanı)</option>
                                        <option value="VAS">Sivas, Türkiye VAS (Nuri Demirağ Havalimanı)</option>
                                        <option value="NKT">Şırnak, Türkiye NKT (Şerafettin Elçi Havalimanı)</option>
                                        <option value="GNY">Şanlıurfa, Türkiye GNY (Güney Anadolu Havalimanı)</option>
                                        <option value="TEQ">Tekirdağ, Türkiye TEQ (Çorlu Havalimanı)</option>
                                        <option value="TZX">Trabzon, Türkiye TZX (Trabzon Havalimanı)</option>
                                        <option value="TJK">Tokat, Türkiye TJK (Tokat Havalimanı)</option>
                                        <option value="USQ">Uşak, Türkiye USQ (Uşak Havalimanı)</option>
                                        <option value="VAN">Van, Türkiye VAN (Ferit Melen Havalimanı)</option>
                                        <option value="ONQ">Zonguldak, Türkiye ONQ (Çaycuma Havalimanı)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">

                                <button type="button" name="" id="transfer-button" class="btn btn-md btn-custom w-100 mt-3" onclick="transferSelection()">
                                    <i class="fa-solid fa-arrow-right-arrow-left fs-4"></i>
                                </button>

                                <div id="loading" style="display: none;">
                                    <div class="loader">
                                        <div class="plane">
                                            <div class="propeller"></div>
                                            <div class="wing"></div>
                                            <div class="wing"></div>
                                            <div class="tail"></div>
                                        </div>
                                    </div>
                                </div>
                                <span id="error" style="font-size: 15px"></span>
                            </div>
                            <div class="col-md-2 ">
                                <label class="form-label text-custom mb-0"><strong>Nereye</strong></label>
                                <div class="input-group mb-2 w-100">
                                    <div class="input-group-prepend">

                                    </div>
                                    <select name="AirportCode1" data-live-search="true" title="Havalimanı Seçiniz" id="city-select2"      onchange="option()" class="selectpicker form-control" list="city-list" placeholder="Şehir veya Havalimanı Yazın" required>
                                        <option value="ADA">Adana, Türkiye ADA (Şakirpaşa Havalimanı)</option>
                                        <option value="ADF">Adıyaman, Türkiye ADF (Adıyaman Havalimanı)</option>
                                        <option value="AJI">Ağrı, Türkiye AJI (Ağrı Havalimanı)</option>
                                        <option value="ESB">Ankara, Türkiye ESB (Esenboğa Havalimanı)</option>
                                        <option value="AYT">Antalya, Türkiye AYT (Antalya Havalimanı)</option>
                                        <option value="MZH">Amasya, Türkiye MZH (Merzifon Havalimanı)</option>
                                        <option value="XHQ">Artvin, Türkiye XHQ (Hopa Havalimanı)</option>
                                        <option value="EDO">Balıkesir Edremit, Türkiye EDO (Koca Seyit Havalimanı)</option>
                                        <option value="BDM">Bandırma, Türkiye BDM (Bandırma Havalimanı)</option>
                                        <option value="BAL">Batman, Türkiye BAL (Batman Havalimanı)</option>
                                        <option value="BGG">Bingöl, Türkiye BGG (Bingöl Havalimanı)</option>
                                        <option value="BJV">Bodrum, Türkiye BJV (Milas Havalimanı)</option>
                                        <option value="YEI">Bursa, Türkiye YEI (Yenişehir Havalimanı)</option>
                                        <option value="CKZ">Çanakkale, Türkiye CKZ (Çanakkale Havalimanı)</option>
                                        <option value="DLM">Dalaman, Türkiye DLM (Dalaman Havalimanı)</option>
                                        <option value="DNZ">Denizli, Türkiye DNZ (Çardak Havalimanı)</option>
                                        <option value="DIY">Diyarbakır, Türkiye DIY (Diyarbakır Havalimanı)</option>
                                        <option value="EZS">Elazığ, Türkiye EZS (Elazığ Havalimanı)</option>
                                        <option value="AOE">Eskişehir, Türkiye AOE (Anadolu Havalimanı)</option>
                                        <option value="ERZ">Erzurum, Türkiye ERZ (Erzurum Havalimanı)</option>
                                        <option value="ERC">Erzincan, Türkiye ERC (Erzincan Havalimanı)</option>
                                        <option value="GZT">Gaziantep, Türkiye GZT (Oğuzeli Havalimanı)</option>
                                        <option value="GZP">Gazipaşa, Türkiye GZP (Gazipaşa Havalimanı)</option>
                                        <option value="GKD">Gökçeada, Türkiye GKD (Gökçeada Havalimanı)</option>
                                        <option value="YKO">Hakkari, Türkiye YKO (Hakkari Yüksekova Havalimanı)</option>
                                        <option value="HTY">Hatay, Türkiye HTY (Hatay Havalimanı)</option>
                                        <option value="IGD">Iğdır, Türkiye IGD (Şehit Bülent Aydın Havalimanı)</option>
                                        <option value="ISE">Isparta, Türkiye ISE (Süleyman Demirel Havalimanı)</option>
                                        <option value="SAW">İstanbul, Türkiye SAW (Sabiha Gökçen Havalimanı)</option>
                                        <option value="IST"   >İstanbul, Türkiye IST (İstanbul Havalimanı)</option>
                                        <option value="ADB" selected >İzmir, Türkiye ADB (Adnan Menderes Havalimanı)</option>
                                        <option value="KCM">Kahramanmaraş, Türkiye KCM (Kahramanmaraş Havalimanı)</option>
                                        <option value="KSY">Kars, Türkiye KSY (Kars Havalimanı)</option>
                                        <option value="KFS">Kastamonu, Türkiye KFS (Kastamonu Havalimanı)</option>
                                        <option value="ASR">Kayseri, Türkiye ASR (Erkilet Havalimanı)</option>
                                        <option value="KCO">Kocaeli, Türkiye KCO (Cengiz Topel Havalimanı)</option>
                                        <option value="KYA">Konya, Türkiye KYA (Konya Havalimanı)</option>
                                        <option value="KZR">Kütahya, Türkiye KZR (Zafer Havalimanı)</option>
                                        <option value="MLX">Malatya, Türkiye MLX (Erhaç Havalimanı)</option>
                                        <option value="MQM">Mardin, Türkiye MQM (Mardin Havalimanı)</option>
                                        <option value="MSR">Muş, Türkiye MSR (Muş Havalimanı)</option>
                                        <option value="NAV">Nevşehir, Türkiye NAV (Kapadokya Havalimanı)</option>
                                        <option value="OGU">Ordu, Türkiye OGU (Ordu Giresun Havalimanı)</option>
                                        <option value="RZV">Rize, Türkiye RZV (Rize-Artvin Havalimanı)</option>
                                        <option value="SZF">Samsun, Türkiye SZF (Çarşamba Havalimanı)</option>
                                        <option value="SXZ">Siirt, Türkiye SXZ (Siirt Havalimanı)</option>
                                        <option value="NOP">Sinop, Türkiye NOP (Sinop Havalimanı)</option>
                                        <option value="VAS">Sivas, Türkiye VAS (Nuri Demirağ Havalimanı)</option>
                                        <option value="NKT">Şırnak, Türkiye NKT (Şerafettin Elçi Havalimanı)</option>
                                        <option value="GNY">Şanlıurfa, Türkiye GNY (Güney Anadolu Havalimanı)</option>
                                        <option value="TEQ">Tekirdağ, Türkiye TEQ (Çorlu Havalimanı)</option>
                                        <option value="TZX">Trabzon, Türkiye TZX (Trabzon Havalimanı)</option>
                                        <option value="TJK">Tokat, Türkiye TJK (Tokat Havalimanı)</option>
                                        <option value="USQ">Uşak, Türkiye USQ (Uşak Havalimanı)</option>
                                        <option value="VAN">Van, Türkiye VAN (Ferit Melen Havalimanı)</option>
                                        <option value="ONQ">Zonguldak, Türkiye ONQ (Çaycuma Havalimanı)</option>
                                    </select>
                                </div>
                            </div>
                            <span id="error" style="font-size: 15px;color: red;  display: none;"></span>
                            <div class="col-md-2 ">
                                <label class="form-label text-custom mb-0"><strong>Gidiş Tarihi</strong></label>
                                <input class="form-control small" name="DepartureDay" type="date" value="<?= date("Y-m-d", strtotime($departure[0]['FlightSegments'][0]['DepartureDate'])) ?>" required>


                            </div>
                            <?php if (!empty($arrival)):?>
                                <div class="col-md-2">
                                    <label for="tarihSecim" class="form-label text-custom mb-0"><strong>Dönüş Tarihi</strong></label>
                                    <input id="tarihSecici" class="form-control small" name="ArrivalDay" type="date" value="<?= date("Y-m-d", strtotime($arrival[0]['FlightSegments'][0]['DepartureDate'])) ?>">
                                </div>
                            <?php endif;?>

                            <div class="col-md-2">
                                <label class="form-label text-custom mb-0"><strong>Yolcu Tipi</strong></label>
                                <button id="buttonpassangertype" type="button" class="travellertype form-control font-type text-left">
                                    <div class="travellertype button-text">
                                        <span class="travellertype" id="t-yetiskin"><?php if ($_SESSION['passanger'][0]['PaxCode']=='ADT') echo $_SESSION['passanger'][0]['PaxCount']?></span> Yetişkin
                                        <input class="travellertype p_yetiskin" type="hidden" name="ADT" value="<?php if ($_SESSION['passanger'][0]['PaxCode']=='ADT') echo $_SESSION['passanger'][0]['PaxCount']?>">
                                        <span class="travellertype" id="t-cocuk"><?php if ($_SESSION['passanger'][1]['PaxCode']=='CHD') echo $_SESSION['passanger'][1]['PaxCount'];
                                            elseif  ($_SESSION['passanger'][2]['PaxCode']=='CHD') echo $_SESSION['passanger'][2]['PaxCount'];
                                            else echo 0 ?></span> Çocuk
                                        <input class="travellertype p_cocuk" type="hidden" name="CHD" value="<?php if ($_SESSION['passanger'][1]['PaxCode']=='CHD') echo $_SESSION['passanger'][1]['PaxCount'];
                                        elseif  ($_SESSION['passanger'][2]['PaxCode']=='CHD') echo $_SESSION['passanger'][2]['PaxCount'];
                                        else echo 0 ?>">
                                        <span class="travellertype" id="t-bebek"><?php if ($_SESSION['passanger'][1]['PaxCode']=='INF') echo $_SESSION['passanger'][1]['PaxCount'];
                                            elseif  ($_SESSION['passanger'][2]['PaxCode']=='INF') echo $_SESSION['passanger'][2]['PaxCount'];
                                            else echo 0 ?></span> Bebek
                                        <input class="travellertype p_bebek" type="hidden" name="INF" value="<?php if ($_SESSION['passanger'][1]['PaxCode']=='INF') echo $_SESSION['passanger'][1]['PaxCount'];
                                        elseif  ($_SESSION['passanger'][2]['PaxCode']=='INF') echo $_SESSION['passanger'][2]['PaxCount'];
                                        else echo 0 ?>">
                                    </div>
                                    <i class="fas fa-user-friends user" style="position: absolute; right: 30px; top: 27px;"></i>
                                </button>
                                <div id="travellertype" class="travellertype d-none row m-0 mt-2 rounded shadow-lg" >
                                    <div class="travellertype col-6 mt-2 text-md-center text-left col-md-12 col-lg-6 text-lg-left">
                                        <p class="travellertype font-type m-0">Yetişkin</p>
                                    </div>
                                    <div class="travellertype col-6 mt-2 text-right text-md-center yetiskin-container type_container col-md-12 col-lg-6 text-lg-right">
                                        <button type="button" class="travellertype rounded-circle traveller-number yetiskin minus">
                                            <i class="travellertype fa fa-minus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                        <span class="travellertype value h6"><?php if ($_SESSION['passanger'][0]['PaxCode']=='ADT') echo $_SESSION['passanger'][0]['PaxCount']?></span>
                                        <button type="button" class="travellertype rounded-circle traveller-number yetiskin plus traveller-display">
                                            <i class="travellertype fa fa-plus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="travellertype col-6 mt-2 text-md-center text-left col-md-12 col-lg-6 text-lg-left">
                                        <p class="travellertype font-type m-0">Çocuk</p>
                                    </div>
                                    <div class="travellertype col-6 mt-2 text-right mb-2 cocuk-container type_container text-md-center col-md-12 col-lg-6 text-lg-right">
                                        <button type="button" class="travellertype rounded-circle traveller-number cocuk minus">
                                            <i class="travellertype fa fa-minus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                        <span class="travellertype value h6"><?php if ($_SESSION['passanger'][1]['PaxCode']=='CHD') echo $_SESSION['passanger'][1]['PaxCount'];
                                            elseif  ($_SESSION['passanger'][2]['PaxCode']=='CHD') echo $_SESSION['passanger'][2]['PaxCount'];
                                            else echo 0 ?>
                                      </span>
                                        <button type="button" class="travellertype rounded-circle traveller-number cocuk plus traveller-display">
                                            <i class="travellertype fa fa-plus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="travellertype col-6 mt-2 text-md-center text-left col-md-12 col-lg-6 text-lg-left">
                                        <p class="travellertype font-type m-0">Bebek</p>
                                    </div>
                                    <div class="travellertype col-6 mt-2 text-right mb-2 bebek-container type_container text-md-center col-md-12 col-lg-6 text-lg-right">
                                        <button type="button" class="travellertype rounded-circle traveller-number bebek minus">
                                            <i class="travellertype fa fa-minus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                        <span class="travellertype value h6"><?php if ($_SESSION['passanger'][1]['PaxCode']=='INF') echo $_SESSION['passanger'][1]['PaxCount'];
                                            elseif  ($_SESSION['passanger'][2]['PaxCode']=='INF') echo $_SESSION['passanger'][2]['PaxCount'];
                                            else echo 0 ?></span>
                                        <button type="button" class="travellertype rounded-circle traveller-number bebek plus traveller-display">
                                            <i class="travellertype fa fa-plus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">

                                <button value="1" type="submit" name="ticketfound" id="ticketfound" class="btn btn-md btn-custom w-100 mt-3  ">Bilet Bul</button>

                                <div id="loading" style="display: none;">
                                    <div class="loader">
                                        <div class="plane">
                                            <div class="propeller"></div>
                                            <div class="wing"></div>
                                            <div class="wing"></div>
                                            <div class="tail"></div>
                                        </div>
                                    </div>
                                </div>
                                <span id="error" style="font-size: 15px"></span>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--    <div class="row pt-2 animate__animated animate__fadeIn">-->
    <!--        <div class="text-center mb-2 mt-3">-->
    <!--            <button type="button" class="gunlukfiyatlar-btn btn fs-6 p-2 font-weight-bold rounded-5"-->
    <!--                  style="border: 1px solid #6B15B6; background-color: #6B15B6;color: white">Günlük Tahmini Fiyatlar-->
    <!--            </button>-->
    <!--        </div>-->
    <!---->
    <!--        <div class="col-sm-6 gidis-fiyat">-->
    <!--            <div class="card-body">-->
    <!--                <div class=" mb-3">-->
    <!--                    <h5>--><?php //=$_SESSION['Gidisucagi']?><!-- &rarr; --><?php //=$_SESSION['donusucagi']?><!-- </h5><p class="text-custom fw-bold">--><?php //=$_SESSION['DepartureDay']?><!-- / Gidiş</p>-->
    <!---->
    <!--                </div>-->
    <!--                <div class="nav nav-underline pl-4" id="nav-tab" role="tablist">-->
    <!--                    <a class="nav-item nav-link active" id="Haz-tabs" data-toggle="tab" href="#Haz" role="tab" aria-controls="nav-Haz" aria-selected="true">Haz</a>-->
    <!--                    <a class="nav-item nav-link" id="Tem-tab" data-toggle="tab" href="#Tem" role="tab" aria-controls="nav-Tem" aria-selected="true">Tem</a>-->
    <!--                    <a class="nav-item nav-link" id="Ağu-tabs" data-toggle="tab" href="#Ağu" role="tab" aria-controls="nav-Ağu" aria-selected="true">Ağu</a>-->
    <!--                    <a class="nav-item nav-link" id="Eyl-tab" data-toggle="tab" href="#Eyl" role="tab" aria-controls="nav-Eyl" aria-selected="true">Eyl</a>-->
    <!--                    <a class="nav-item nav-link" id="Eki-tabs" data-toggle="tab" href="#Eki" role="tab" aria-controls="nav-Eki" aria-selected="true">Eki</a>-->
    <!--                    <a class="nav-item nav-link" id="Kas-tab" data-toggle="tab" href="#Kas" role="tab" aria-controls="nav-Kas" aria-selected="true">Kas</a>-->
    <!--                    <a class="nav-item nav-link" id="Ara-tabs" data-toggle="tab" href="#Ara" role="tab" aria-controls="nav-Ara" aria-selected="true">Ara</a>-->
    <!--                    <a class="nav-item nav-link" id="Ocak-tab" data-toggle="tab" href="#Ocak" role="tab" aria-controls="nav-Ocak" aria-selected="true">Ocak</a>-->
    <!--                    <a class="nav-item nav-link" id="Şub-tabs" data-toggle="tab" href="#Şub" role="tab" aria-controls="nav-Şub" aria-selected="true">Şub</a>-->
    <!--                    <a class="nav-item nav-link" id="Mar-tab" data-toggle="tab" href="#Mar" role="tab" aria-controls="nav-Mar" aria-selected="true">Mar</a>-->
    <!--                    <a class="nav-item nav-link" id="Nis-tabs" data-toggle="tab" href="#Nis" role="tab" aria-controls="nav-Nis" aria-selected="true">Nis</a>-->
    <!--                    <a class="nav-item nav-link" id="May-tab" data-toggle="tab" href="#May" role="tab" aria-controls="nav-May" aria-selected="true">May</a>-->
    <!--                </div>-->
    <!--                <div class="tab-content" id="myTabContent">-->
    <!--                    <div class="tab-pane fade show active" id="Haz" role="tabpanel" aria-labelledby="Haz-tabs">-->
    <!--                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
    <!--                           Indicators -->
    <!--                            <ol class="carousel-indicators">-->
    <!--                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
    <!--                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
    <!--                            </ol>-->
    <!---->
    <!--                         Wrapper for slides -->
    <!--                            <div class="carousel-inner1" role="listbox">-->
    <!--                                <div class="active item" data-graph="1">-->
    <!--                                    <canvas id="myChart" width="500" height="120"></canvas>-->
    <!--                                </div>-->
    <!--                                <div class="item" data-graph="2" style="display:none">-->
    <!--                                    <canvas id="myChart2" width="500" height="120"></canvas>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!---->
    <!--                           Left and right controls -->
    <!--                            <a class="left carousel-control-chart" href="#carousel-example-generic" role="button">-->
    <!--                                <span class="fa fa-angle-left left-angle" style="color: #6B15B6!important;"></span>-->
    <!--                            </a>-->
    <!--                            <a class="right carousel-control-chart" href="#carousel-example-generic" role="button">-->
    <!--                                <span class="fa fa-angle-right right-angle" style="color: #6B15B6!important"></span>-->
    <!--                            </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Tem" role="tabpanel" aria-labelledby="Tem-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Ağu" role="tabpanel" aria-labelledby="Ağu-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Eyl" role="tabpanel" aria-labelledby="Eyl-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Kas" role="tabpanel" aria-labelledby="Kas-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Ara" role="tabpanel" aria-labelledby="Ara-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Ocak" role="tabpanel" aria-labelledby="Ocak-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Şub" role="tabpanel" aria-labelledby="Şub-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Mar" role="tabpanel" aria-labelledby="Mar-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Nis" role="tabpanel" aria-labelledby="Nis-tabs">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="May" role="tabpanel" aria-labelledby="May-tabs">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        --><?php //if (!empty($arrival)):?>
    <!--        <div class="col-sm-6 mt-3 donus-fiyat">-->
    <!--                <div class=" mb-3">-->
    <!--                    <h5>İstanbul &rarr; İzmir </h5><p class="text-custom fw-bold">24 Kasım 2022 / Dönüş</p>-->
    <!--                </div>-->
    <!--                <div class="nav nav-underline pl-4" id="nav-tab" role="tablist">-->
    <!--                    <a class="nav-item nav-link active" id="Haz-tabs-donus" data-toggle="tab" href="#Haz-donus" role="tab" aria-controls="nav-Haz-donus" aria-selected="true">Haz</a>-->
    <!--                    <a class="nav-item nav-link" id="Tem-tab-donus" data-toggle="tab" href="#Tem-donus" role="tab" aria-controls="nav-Tem-donus" aria-selected="true">Tem</a>-->
    <!--                    <a class="nav-item nav-link" id="Ağu-tabs-donus" data-toggle="tab" href="#Ağu-donus" role="tab" aria-controls="nav-Ağu-donus" aria-selected="true">Ağu</a>-->
    <!--                    <a class="nav-item nav-link" id="Eyl-tab-donus" data-toggle="tab" href="#Eyl-donus" role="tab" aria-controls="nav-Eyl-donus" aria-selected="true">Eyl</a>-->
    <!--                    <a class="nav-item nav-link" id="Eki-tabs-donus" data-toggle="tab" href="#Eki-donus" role="tab" aria-controls="nav-Eki-donus" aria-selected="true">Eki</a>-->
    <!--                    <a class="nav-item nav-link" id="Kas-tab-donus" data-toggle="tab" href="#Kas-donus" role="tab" aria-controls="nav-Kas-donus" aria-selected="true">Kas</a>-->
    <!--                    <a class="nav-item nav-link" id="Ara-tabs-donus" data-toggle="tab" href="#Ara-donus" role="tab" aria-controls="nav-Ara-donus" aria-selected="true">Ara</a>-->
    <!--                    <a class="nav-item nav-link" id="Ocak-tab-donus" data-toggle="tab" href="#Ocak-donus" role="tab" aria-controls="nav-Ocak-donus" aria-selected="true">Ocak</a>-->
    <!--                    <a class="nav-item nav-link" id="Şub-tabs-donus" data-toggle="tab" href="#Şub-donus" role="tab" aria-controls="nav-Şub-donus" aria-selected="true">Şub</a>-->
    <!--                    <a class="nav-item nav-link" id="Mar-tab-donus" data-toggle="tab" href="#Mar-donus" role="tab" aria-controls="nav-Mar-donus" aria-selected="true">Mar</a>-->
    <!--                    <a class="nav-item nav-link" id="Nis-tabs-donus" data-toggle="tab" href="#Nis-donus" role="tab" aria-controls="nav-Nis-donus" aria-selected="true">Nis</a>-->
    <!--                    <a class="nav-item nav-link" id="May-tab-donus" data-toggle="tab" href="#May-donus" role="tab" aria-controls="nav-May-donus" aria-selected="true">May</a>-->
    <!--                </div>-->
    <!--                <div class="tab-content" id="myTabContent">-->
    <!--                    <div class="tab-pane fade show active" id="Haz-donus" role="tabpanel" aria-labelledby="Haz-tabs-donus">-->
    <!--                        <div id="carousel-example-generic-donus" class="carousel slide" data-ride="carousel">-->
    <!--                          Indicators -->
    <!--                            <ol class="carousel-indicators">-->
    <!--                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
    <!--                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
    <!--                            </ol>-->
    <!---->
    <!--                             Wrapper for slides -->
    <!--                            <div class="carousel-inner2" role="listbox">-->
    <!--                                <div class="active item" data-graph="1">-->
    <!--                                    <canvas id="myChart3" width="500" height="120"></canvas>-->
    <!--                                </div>-->
    <!--                                <div class="item" data-graph="2" style="display:none">-->
    <!--                                    <canvas id="myChart4" width="500" height="120"></canvas>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!---->
    <!--                             Left and right controls -->
    <!--                            <a class="left-donus carousel-control2" href="#carousel-example-generic-donus" role="button">-->
    <!--                                <span class="fa fa-angle-left left-angle" style="color: #6B15B6!important"></span>-->
    <!--                            </a>-->
    <!--                            <a class="right-donus carousel-control2" href="#carousel-example-generic-donus" role="button">-->
    <!--                                <span class="fa fa-angle-right right-angle" style="color: #6B15B6!important"></span>-->
    <!--                            </a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Tem-donus" role="tabpanel" aria-labelledby="Tem-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Ağu-donus" role="tabpanel" aria-labelledby="Ağu-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Eyl-donus" role="tabpanel" aria-labelledby="Eyl-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Kas-donus" role="tabpanel" aria-labelledby="Kas-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Ara-donus" role="tabpanel" aria-labelledby="Ara-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Ocak-donus" role="tabpanel" aria-labelledby="Ocak-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Şub-donus" role="tabpanel" aria-labelledby="Şub-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Mar-donus" role="tabpanel" aria-labelledby="Mar-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="Nis-donus" role="tabpanel" aria-labelledby="Nis-tabs-donus">-->
    <!--                    </div>-->
    <!---->
    <!--                    <div class="tab-pane fade" id="May-donus" role="tabpanel" aria-labelledby="May-tabs-donus">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--        </div>-->
    <!--        --><?php //endif;?>
    <!--        <div class="col-12 ">-->
    <!--            <div class="card-body d-flex chart-card">-->
    <!--                <div class="col-md-9 col-7" >-->
    <!--                    <p class="date">deneme</p>-->
    <!--                    <p class="total-price m-0">#f8f9fa</p>-->
    <!--                </div>-->
    <!--                <div class="col-md-3 col-5 justify-content" >-->
    <!--                    <button class="btn btn-md btn-custom w-100 mt-3">Bu tarih için ara</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <div class="row mt-4" style="margin-bottom: 120px">
        <div class="col-md-2 mt-4 order-md-1 d-sm-block" >
            <div class="accordion fılter mt-3" id="accordionExample" >
                <div class="accordion-item" >
                    <h6 class="accordion-header" id="headingone">
                        <button class="accordion-button collapsed text-custom" style="font-size: 15px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                            <i class="fa-solid fa-flag me-1" style="color: #6B15B6"></i>Aktarma
                        </button>
                    </h6>

                    <div id="collapseone" class="accordion-collapse collapse show" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <label class="container-check mt-2 text-dark" id="" value="">Direkt Uçuşlar
                                        <input type="checkbox" checked name="direktucus" id="direktucus">
                                        <span class="direktucus"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="container-check mt-2 text-dark" id="" value="">1 Aktarmalı Uçuş
                                        <input type="checkbox" checked name="aktarmali" id="aktarmali">
                                        <span class="aktarmalıucus"></span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed ticket_hover text-custom" style="font-size: 15px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa-solid fa-square-poll-vertical me-1" style="color: #6B15B6"></i>Bilet Fiyatı
                        </button>
                    </h6>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Kalkış : <?=$_SESSION['Gidisucagi']?></p>
                            Kalkış: <output id="rangevalue1"><?=$lowest_fare?></output> TL

                            <input class="selection-range" type="range" id="gprice" value="<?=$lowest_fare?>" min="<?=$lowest_fare?>" max="<?=$highest_fare?>" oninput="updatePrice(this, 'rangevalue1')" />
                        </div>
                        <?php if (!empty($arrival)):?>
                            <div class="accordion-body">
                                <p>Kalkış : <?=$_SESSION['donusucagi']?></p>
                                Dönüş: <output id="rangevalue2"><?=$lowdonus?></output> TL
                                <input class="selection-range" type="range"id="dprice" value="<?=$lowdonus?>" min="<?=$lowdonus?>" max="<?=$highdonus?>" oninput="updatePrice(this, 'rangevalue2')"   />
                            </div>
                        <?php endif ;?>
                    </div>
                </div>
                <script>
                    var slider = document.getElementById("myRange");
                    var output = document.getElementById("demo");
                    output.innerHTML = slider.value;

                    slider.oninput = function() {
                        output.innerHTML = this.value;
                    }
                </script>
                <script>
                    function updatePrice(slider, outputId) {
                        let price = slider.value;
                        document.getElementById(outputId).innerHTML = price;
                    }
                </script>
                <script>

                    function updateTime() {
                        var val=this.value;
                        var hour = parseInt(val.value / 60);
                        var min = parseInt((val.value % 60);
                        var formatedtime=hour+" : "+min;
                        this.innerHTML = formatedtime;
                    }
                </script>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed ticket_hover text-custom" style="font-size: 15px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fa-regular fa-clock me-1" style="color: #6B15B6"></i> Saatler
                        </button>
                    </h6>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Kalkış :<?=$_SESSION['Gidisucagi']?></p>

                            <output id="rangevalue1">
                                <span id="hour1">00 : 00</span>
                            </output>
                            <input class="selection-range" id="gtime" step="30" type="range" value="0" min="0" max="1440"/>
                        </div>
                        <?php if (!empty($arrival)):?>
                            <div class="accordion-body">
                                <p>Kalkış : <?=$_SESSION['donusucagi']?></p>
                                <output id="rangevalue2">
                                    <span id="hour2">00 : 00</span>

                                </output>
                                <input class="selection-range" type="range" step="30" id="dtime" value="0" min="0" max="1440" />
                            </div>
                        <?php endif ;?>
                        <button class="btn btn inissaatleri-btn" style="font-size: 12px;color: #6B15B6">İniş saatlerini göster
                            <i class="fa-solid fa-caret-down text-custom"></i>
                        </button>
                        <div class="accordion-body inissaatleri">
                            <p> Gidiş Varış :   <output id="rangevalue2">
                                    <span id="hour3">00:00</span>

                                </output></p>


                            <input class="selection-range" type="range" id="gvtime"  step="30" value="0" min="0" max="1440" />
                        </div>
                        <?php if (!empty($arrival)):?>
                            <div class="accordion-body inissaatleri">
                                <p>Dönüşün Varış :    <output id="rangevalue2">
                                        <span id="hour4">00:00</span>

                                    </output></p>


                                <input class="selection-range" type="range" id="dvtime" step="30" value="0" min="0" max="1440" />
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        function startChange() {
                            var startTime = start.value();

                            if (startTime) {
                                startTime = new Date(startTime);

                                end.max(startTime);

                                startTime.setMinutes(startTime.getMinutes() + this.options.interval);

                                end.min(startTime);
                                end.value(startTime);
                            }
                        }

                        //init start timepicker
                        var start = $("#start").kendoTimePicker({
                            change: startChange
                        }).data("kendoTimePicker");

                        //init end timepicker
                        var end = $("#end").kendoTimePicker().data("kendoTimePicker");

                        //define min/max range
                        start.min("8:00 AM");
                        start.max("6:00 PM");

                        //define min/max range
                        end.min("8:00 AM");
                        end.max("7:30 AM");
                    });
                </script>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingfour">
                        <button class="accordion-button collapsed ticket_hover text-custom" style="font-size: 15px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            <i class="fa-regular fa-clock me-1" style="color: #6B15B6"></i>Uçuş Süresi
                        </button>
                    </h6>
                    <div id="collapsefour" class="accordion-collapse collapse show" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Maksimum Süre (Gidiş): <output id="range1value"><?=$lowest_duration?></output></p>
                            <input class="selection-range" type="range" id="gduraiton" value="<?=$lowest_duration?>" min="<?=$lowest_duration?>" max="<?=$highest_duration?>" oninput="range1value.value=value"/>
                        </div>
                        <?php if (!empty($arrival)):?>
                            <div class="accordion-body">
                                <p>Maksimum Süre (Dönüş): <output id="range2value"><?=$lowdonusduration?></output></p>
                                <input class="selection-range" type="range" id="dduraiton"value="<?=$lowdonusduration?>" min="<?=$lowdonusduration?>" max="<?=$highdonusduration?>" oninput="range2value.value=value"/>
                            </div>
                        <?php endif;?>
                    </div>
                    <script>
                        function updateTime(slider, outputId) {
                            let hour = parseInt(slider.value / 6) + 1;
                            let min = parseInt((slider.value / 6 - hour) * 60) + 10;
                            // OutputId'ye göre saat ve dakikayı güncelle
                            if(outputId === "range1value") {
                                min += 10;  // Gidiş için 10 dakikadan başla
                            } else {
                                min += 20; // Dönüş için 20 dakikadan başla
                            }

                            document.getElementById(outputId).innerHTML =
                                `${hour<10 ? '0'+hour : hour}:${min<10 ? '0'+min : min}`;
                        }
                    </script>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingfive">
                        <button class="accordion-button collapsed ticket_hover text-custom" style="font-size: 15px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            <i class="fa-solid fa-jet-fighter-up me-1" style="color: #6B15B6"></i> Havayolları
                        </button>
                    </h6>
                    <div id="collapsefive" class="accordion-collapse collapse show" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="d-flex flex-column">
                                <div>
                                    <label class="container-check mt-2 text-dark" id="" value="">Anadolujet
                                        <input type="checkbox" checked id="anadolujet" name="anadolujet">
                                        <span class="anadolujet"></span>
                                    </label>
                                </div>
                                <div>
                                    <label class="container-check mt-2 text-dark"  value="">Pegasus
                                        <input type="checkbox" id="Pegasus"  checked>
                                        <span class="pegasus"></span>
                                    </label>
                                </div>
                                <div>
                                    <label class="container-check mt-2 text-dark" id="" value=""  >Türk Hava Yolları
                                        <input type="checkbox" checked id="turkishava"  name="turkishava">
                                        <span class="thy"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-<?php if( !empty( $arrival ) ) {echo 5;} else {echo 10;} ?> order-md-2" style="margin-bottom: 200px">
            <div class="row mt-4">
                <div class="col-md-12 p-2">
                    <!--<span class="p-2 text-white rounded-2" style="background-color: #6B15B6">Gidiş Biletleri</span>-->
                    <span class="ucusdegistir-gidis">
                        <button id="gidisUcusDegistir" type="button" class="btn">
                            <i class="fa-regular fa-pen-to-square"></i> Uçuş Değiştir
                        </button>
                    </span>
                </div>
            </div>

            <div class="row animate__animated animate__fadeIn mobile_position">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <form action="ticket_selection" method="post">
                            <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">


                                <?php
                                $today = date('Y-m-d');
                                $departureDate = date('Y-m-d', strtotime($departure[0]['FlightSegments'][0]['DepartureDate']));

                                if ($departureDate != $today) {
                                    ?>
                                    <button type="submit" name="oncekigun" class="btn" value="1">
                                        <h6 class="card-header-title text-light mt-1">« Önceki Gün</h6>
                                    </button>
                                    <?php
                                }
                                ?>
                                <h6 class="card-header-title text-light mt-1">GİDİŞ
                                    <?=$departure[0]['FlightSegments'][0]['DepartureDate']?>, <?=$turkishDays[date('w', strtotime($_SESSION['DepartureDay']))]?>
                                </h6>
                                <button type="submit" name="sonrakigun" class="btn" value="1">
                                    <h6 class="card-header-title text-light mt-1">Sonraki Gün »</h6>
                                </button>
                            </header>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-2 p-2 gidisson" >
                <div class="col-md-12 col-12 mt-3 mb-4">
                    <div class="card-body bg-white text-center tk shadow-sm">
                        <div class="row">
                            <i class="fa-solid fa-circle-check"></i>
                            <div class="col-sm-2 mt-3">
                                <span style="font-size: 16px; line-height:0.1;" class="text-right font-weight-bold" id="kalkissuresi"></span>
                                <span style="font-size: 14px; line-height:0.1;" class="text-right font-weight-normal"><i
                                            class="fas fa-plane-departure" style="color: #6b15b6;"></i> </span>
                                <span style="font-size: 14px; line-height:0.1;" class="text-right font-weight-normal" id="kalkishavalimanı"> </span>
                            </div>
                            <div class="col-sm-3">
                                <span class="font-weight-normal text-center" style="font-size: 11px;"><br>
                                    </span>
                                <i class="fa-solid fa-arrow-right-long d-none d-sm-block" style="font-size:30px; color: #6B15B6"></i>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <span style="font-size: 16px; line-height:0.1;" class="font-weight-bold" id="varissuresi"></span>
                                <span style="font-size: 14px; line-height:0.1;" class=" font-weight-normal"><i
                                            class="fas fa-plane-departure" style="color: #6b15b6;"></i></span>
                                <span style="font-size: 14px; line-height:0.1;" class=" font-weight-normal" id="varishavalimani"> </span>
                            </div>
                            <div class="col-sm-5 mt-4">
                                <span style="line-height:0.1; font-size: 16px;"
                                      class="text-custom p-1 bg-custom rounded-2 border border-dark fw-bolder text-center">
                                    <i class="fa-solid fa-wallet" style="color: #6b15b6; font-size: 16px;"></i> <span
                                            id="gidisprice"> 0  </span><span><?=$_SESSION['Currency']?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gidisucusu"  >
                <!--  AKTARMASIZ GİDİŞ UÇUŞU   -->
                <?php foreach ($aktarmasizgidis as $gidis):?>

                    <div class="card-body bg-white text-center tk shadow-sm mt-3  gidis filter" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px" data-aktarma="aktarmasiz"  data-airline="<?=$gidis['FlightSegments'][0]['OperatingAirlineName']?>" data-duration="<?=$gidis['FlightSegments'][0]['JourneyDurationInMinute']?>" data-price="<?=$gidis['TotalFare']?>" data-kalkis=" <?=$gidis['FlightSegments'][0]['DepartureTime']?>" data-varis="<?=$gidis['FlightSegments'][0]['ArrivalTime']?>">
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                            <span class="font-weight-normal" style="font-size: 14px;">
                                 <?php if ($gidis['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                     <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                 <?php elseif ($gidis['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                     <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                 <?php endif; ?> <?=$gidis['FlightSegments'][0]['OperatingAirlineName']?>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <span style="font-size: 15px">
                                <span>
                                    <b><i class="fa-solid fa-jet-fighter" style="color: #6b15b6;"></i> Direkt-Uçuş</b>
                                </span>
                            </span>
                            </div>

                            <div class="col-sm-5 mt-3">
                            <span class="text-custom p-1 bg-custom rounded-2 border border-dark fw-bolder text-center" style="font-size: 16px">
                                <i class="fa-solid fa-wallet" style="color: #6b15b6;"></i>
                                <?php if ($gidis['TotalFare']==0):?>
                                    <?=number_format($gidis['SelectableFares'][0]['TotalFare'],2,',','.')?>
                                <?php else :?>
                                    <?=number_format($gidis['TotalFare'],2,',','.')?>
                                <?php endif;?>
                                <?=$_SESSION['Currency']?>
                            </span>
                            </div>

                            <div class="col-sm-3 mt-3">
                            <span style="font-size: 14px;">
                                <span> <?=$gidis['FlightSegments'][0]['DepartureTime']?> -  <?=$gidis['FlightSegments'][0]['ArrivalTime']?> <b class="planetime" data-duration=""></b>/ <?=$gidis['FlightSegments'][0]['DepartureAirportName']?> - <?=$gidis['FlightSegments'][0]['ArrivalAirportName']?></span>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <button class="collapsed" data-toggle="collapse" data-target="#detaylargidis2-<?=$gidis['FlightSegments'][0]['ProductId']?>" aria-expanded="false" aria-controls="detaylargidis2-<?=$gidis['FlightSegments'][0]['ProductId']?>" style="border: 0px;">
                                    <span class="text-custom">Uçuş Detayı <i class="fa fa-angle-down"></i></span>
                                </button>
                            </div>

                            <div class="col-sm-5 mt-3">
                                <button id="gidissec" type="button" style="width:90px" data-choosen="<?=urlencode(json_encode($gidis,true))?>" data-gprice="<?=$gidis['TotalFare']?>" data-kalkisuresi="<?=$gidis['FlightSegments'][0]['DepartureTime']?>" data-varissuresi="<?=$gidis['FlightSegments'][0]['ArrivalTime']?>" data-kalkishavalimani="<?=$gidis['FlightSegments'][0]['DepartureAirportName']?>" data-varishavalimani="<?=$gidis['FlightSegments'][0]['ArrivalAirportName']?>" class="gidisbuton btn btn-sm btn-custom">
                                    SEÇ <i class="fa fa-angle-right"></i>
                                </button>
                            </div>

                            <div class="collapse mt-3" id="detaylargidis2-<?=$gidis['FlightSegments'][0]['ProductId']?>">
                                <div class="card card-body">
                                    <span class="fw-bold">Uçuş Süresi:  <?=$gidis['FlightSegments'][0]['JourneyDurationInMinute']?>  dakika</span>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <?php if ($gidis['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                                <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php elseif ($gidis['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                                <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php endif; ?> <?=$gidis['FlightSegments'][0]['OperatingAirlineName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fas fa-plane-departure" style="color: #6b15b6;"></i> <?=$gidis['FlightSegments'][0]['DepartureAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$gidis['FlightSegments'][0]['DepartureTime']?> Saat, <?=$gidis['FlightSegments'][0]['DepartureDate']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            Uçuş - <?=$gidis['FlightSegments'][0]['FlightNumber']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fa-solid fa-plane-arrival" style="color: #6b15b6;"></i> <?=$gidis['FlightSegments'][0]['ArrivalAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$gidis['FlightSegments'][0]['ArrivalTime']?> Saat, <?=$gidis['FlightSegments'][0]['ArrivalDate']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-footer">
                                    <span><i class="fa-solid fa-bowl-rice" style="font-size: 20px; color: #6b15b6;"></i> Yiyecekler Ücretlidir. <i class="fa-solid fa-suitcase" style="font-size: 20px; color: #6b15b6;"></i> Bagaj hakkı: <?=$gidis['SelectableFares'][0]['CheckedBaggageAllowance']['Kilos']?> kg/yetişkin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                <!--  AKTARMASIZ GİDİŞ UÇUŞU   -->
                <!--      AKTARMALI GİDİŞ UÇUŞU          -->
                <?php foreach ($aktarmagidis as $aktarmag):?>
                    <div class="card-body bg-white text-center tk shadow-sm mt-3 filter gidis" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px"  data-aktarma="aktarmali" data-airline="<?=$aktarmag['FlightSegments'][0]['OperatingAirlineName']?>" data-duration="<?=$aktarmag['FlightSegments'][0]['JourneyDurationInMinute']?>" data-price="<?=$aktarmag['TotalFare']?>" data-kalkis=" <?=$aktarmag['FlightSegments'][0]['DepartureTime']?>" data-varis="<?=$aktarmag['FlightSegments'][0]['ArrivalTime']?>">
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                            <span class="font-weight-normal" style="font-size: 14px;">
                                <?php if ($aktarmag['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                    <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                <?php elseif ($aktarmag['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                    <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                <?php endif; ?>
                                <?=$aktarmag['FlightSegments'][0]['OperatingAirlineName']?>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <span style="font-size: 15px">
                                <span>
                                    <b><i class="fa-solid fa-jet-fighter" style="color: #6b15b6;"></i> Aktarmalı</b>
                                </span>
                            </span>
                            </div>

                            <div class="col-sm-5 mt-3">
                            <span class="text-custom p-1 bg-custom rounded-2 border border-dark fw-bolder text-center" style="font-size: 16px">
                                <i class="fa-solid fa-wallet" style="color: #6b15b6;"></i>    <?php if ($aktarmag['TotalFare']==0):?>
                                    <?=number_format($aktarmag['SelectableFares'][0]['TotalFare'],2,',','.')?>
                                <?php else :?>
                                    <?=number_format($aktarmag['TotalFare'],2,',','.')?>
                                <?php endif;?>
                                <?=$_SESSION['Currency']?>
                            </span>
                            </div>

                            <div class="col-sm-3 mt-3">
                            <span style="font-size: 14px;">
                                <span><?=$aktarmag['FlightSegments'][0]['DepartureTime']?> - <?=$aktarmag['FlightSegments'][0]['ArrivalTime']?> <b class="planetime" data-duration=""></b>/ <?=$aktarmag['FlightSegments'][0]['DepartureAirportName']?> - <?=$aktarmag['FlightSegments'][0]['ArrivalAirportName']?></span>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <button class="collapsed" data-toggle="collapse" data-target="#detaylargidis-<?=$aktarmag['FlightSegments'][0]['ProductId']?>" aria-expanded="false" aria-controls="detaylargidis-<?=$aktarmag['FlightSegments'][0]['ProductId']?>" style="border: 0px;">
                                    <span class="text-custom">Uçuş Detayı <i class="fa fa-angle-down"></i></span>
                                </button>
                            </div>

                            <div class="col-sm-5 mt-3">

                                <button type="button" style="width:90px" data-choosen="<?=urlencode(json_encode($aktarmag,true))?>" class="gidisbuton btn btn-sm btn-custom" data-gprice="<?=$aktarmag['TotalFare']?>" data-kalkisuresi="<?=$aktarmag['FlightSegments'][0]['DepartureTime']?>" data-varissuresi="<?=$aktarmag['FlightSegments'][0]['ArrivalTime']?>" data-kalkishavalimani="<?=$aktarmag['FlightSegments'][0]['DepartureAirportName']?>" data-varishavalimani="<?=$aktarmag['FlightSegments'][0]['ArrivalAirportName']?>">
                                    SEÇ <i class="fa fa-angle-right"></i>
                                </button>
                            </div>

                            <div class="collapse" id="detaylargidis-<?=$aktarmag['FlightSegments'][0]['ProductId']?>">
                                <div class="card card-body">
                                    <span class="fw-bold">Uçuş Süresi: <?=$aktarmag['FlightSegments'][0]['JourneyDurationInMinute']?> Dakika</span>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <?php if ($aktarmag['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                                <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php elseif ($aktarmag['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                                <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php endif; ?>
                                            <?=$aktarmag['FlightSegments'][0]['OperatingAirlineName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fas fa-plane-departure" style="color: #6b15b6;"></i> <?=$aktarmag['FlightSegments'][0]['DepartureAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmag['FlightSegments'][0]['DepartureTime']?> Saat, <?=$aktarmag['FlightSegments'][0]['DepartureDate']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            Uçuş - <?=$aktarmag['FlightSegments'][0]['FlightNumber']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fa-solid fa-plane-arrival" style="color: #6b15b6;"></i><?=$aktarmag['FlightSegments'][0]['ArrivalAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmag['FlightSegments'][0]['ArrivalTime']?> Saat, <?=$aktarmag['FlightSegments'][0]['ArrivalDate']?>
                                        </div>
                                    </div>

                                    <div class="row mt-3 text-center justify-content-center">
                                        <div class="col-sm-12">
                                        <span class="border border-dark p-1 fw-bold rounded-2">Bekleme Süresi <?php
                                            $giris_saati = new DateTime($aktarmag['FlightSegments'][0]['ArrivalTime']);
                                            $cikis_saati = new DateTime($aktarmag['FlightSegments'][1]['DepartureTime']);

                                            if ($cikis_saati < $giris_saati) {
                                                $cikis_saati->add(new DateInterval('P1D'));
                                            }

                                            $fark = $giris_saati->diff($cikis_saati);
                                            $dakika_farki = ($fark->h * 60) + $fark->i;

                                            echo   $dakika_farki . " dakika";
                                            ?></span>
                                        </div>
                                    </div>
                                    <span class="fw-bold mt-3">Uçuş Süresi: <?=$aktarmag['FlightSegments'][1]['JourneyDurationInMinute']?> Dakika</span>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <?php if ($aktarmag['FlightSegments'][1]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                                <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php elseif ($aktarmag['FlightSegments'][1]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                                <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php endif; ?>
                                            <?=$aktarmag['FlightSegments'][1]['OperatingAirlineName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fas fa-plane-departure" style="color: #6b15b6;"></i>   <?=$aktarmag['FlightSegments'][1]['DepartureAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmag['FlightSegments'][1]['DepartureTime']?> Saat,  <?=$aktarmag['FlightSegments'][1]['DepartureDate']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            Uçuş -   <?=$aktarmag['FlightSegments'][1]['FlightNumber']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fa-solid fa-plane-arrival" style="color: #6b15b6;"></i> <?=$aktarmag['FlightSegments'][1]['ArrivalAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmag['FlightSegments'][1]['ArrivalTime']?> Saat, <?=$aktarmag['FlightSegments'][1]['ArrivalDate']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-footer">
                                    <span><i class="fa-solid fa-bowl-rice" style="font-size: 20px; color: #6b15b6;"></i> Yiyecekler Ücretlidir. <i class="fa-solid fa-suitcase" style="font-size: 20px; color: #6b15b6;"></i> Bagaj hakkı: <?=$aktarmag['SelectableFares'][0]['CheckedBaggageAllowance']['Kilos']?> kg/yetişkin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                <!--      AKTARMALI GİDİŞ UÇUŞU          -->


            </div>
        </div>
        <?php if (!empty($arrival)):?>
        <div class="col-md-5 order-md-2">
            <div class="row mt-4">
                <div class="col-md-12 p-2">
                    <!--<span class="p-2 text-white rounded-2" style="background-color: #6B15B6">Dönüş Biletleri</span>-->
                    <span class="ucusdegistir-donus">
                        <button type="button" id="donusUcusDegistir" class="btn"><i class="fa-regular fa-pen-to-square"></i> Uçuş Değiştir</button>
                    </span>
                </div>
            </div>
            <div class="row animate__animated animate__fadeIn mobile_position">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <form action="ticket_selection" method="post">
                            <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">
                                <?php
                                $today = date('Y-m-d');
                                $arrDate = date('Y-m-d', strtotime($arrival[0]['FlightSegments'][0]['DepartureDate']));
                                $departureDate = date('Y-m-d', strtotime($departure[0]['FlightSegments'][0]['DepartureDate']));

                                if ($arrDate != $today && $arrDate != $departureDate) {
                                    ?>
                                    <button type="submit" name="donusoncekigun" class="btn" value="1">
                                        <h6 class="card-header-title text-light mt-1">« Önceki Gün</h6>
                                    </button>
                                    <?php
                                }
                                ?>
                                <h6 class="card-header-title text-light mt-1">DÖNÜŞ
                                    <?=$arrival[0]['FlightSegments'][0]['DepartureDate']?>, <?=$turkishDays[date('w', strtotime($_SESSION['ArrivalDay']))]?></h6>
                                <button type="submit" name="donussonrakigun" class="btn" value="1"><h6 class="card-header-title text-light mt-1">Sonraki Gün »</h6>   </button>
                            </header>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-2 p-2 donusson">
                <div class="col-md-12 col-12 mt-3 mb-4">
                    <div class="card-body bg-white text-center tk shadow-sm">
                        <div class="row">
                            <i class="fa-solid fa-circle-check"></i>
                            <div class="col-sm-2 mt-3">
                                <span style="font-size: 16px; line-height:0.1;" class="text-right font-weight-bold" id="donuskalkisssuresi">
                                    03.45</span>
                                <span style="font-size: 14px; line-height:0.1;" class="text-right font-weight-normal">
                                    <i class="fas fa-plane-departure" style="color: #6b15b6;"></i>
                                </span>
                                <span style="font-size: 14px; line-height:0.1;"
                                      class="text-right font-weight-normal" id="dkalkishavalimani">SAW Izmir</span>
                            </div>
                            <div class="col-sm-3 mt-1">
                                 <span class="font-weight-normal text-center" style="font-size: 11px;"><br>
                        </span>
                                <i class="fa-solid fa-arrow-right-long d-none d-sm-block" style="font-size:30px; color: #6B15B6"></i>

                            </div>
                            <div class="col-sm-2 mt-3">
                                <span style="font-size: 16px; line-height:0.1;" class="font-weight-bold" id="donusvarissuresi">05.05</span>
                                <span style="font-size: 14px; line-height:0.1;" class=" font-weight-normal"><i
                                            class="fas fa-plane-departure" style="color: #6b15b6;"></i>
                                </span>
                                <span style="font-size: 14px; line-height:0.1;" class=" font-weight-normal" id="dvarishavalimani">ADB Ankara</span>
                            </div>
                            <div class="col-sm-5 mt-4">
                                <span style="line-height:0.1; font-size: 16px;"
                                      class="text-custom p-1 bg-custom rounded-2 border border-dark fw-bolder text-center">
                                    <i class="fa-solid fa-wallet" style="color: #6b15b6; font-size: 16px;"></i>
                                    <span id="donusprice">0 </span><span> <?=$_SESSION['Currency']?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="donusucusu">
                <!--     AKTARMASIZ DÖNÜŞ UÇAĞI           -->
                <?php foreach ($aktarmasizdonus as $donusaktarmasiz):?>
                    <div class="card-body bg-white text-center tk shadow-sm mt-3 donusfilter " style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px" data-aktarma="aktarmasiz" data-airline="<?=$donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName']?>" data-duration="<?=$donusaktarmasiz['FlightSegments'][0]['JourneyDurationInMinute']?>" data-price="<?=$donusaktarmasiz['TotalFare']?>" data-kalkis=" <?=$donusaktarmasiz['FlightSegments'][0]['DepartureTime']?>" data-varis="<?=$donusaktarmasiz['FlightSegments'][0]['ArrivalTime']?>">
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                            <span class="font-weight-normal" style="font-size: 14px;">
                                  <?php if ($donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                      <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                  <?php elseif ($donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                      <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                  <?php endif; ?>
                                <?=$donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName']?>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <span style="font-size: 15px">
                                <span>
                                    <b><i class="fa-solid fa-jet-fighter" style="color: #6b15b6;"></i> Direkt-Uçuş</b>
                                </span>
                            </span>
                            </div>

                            <div class="col-sm-5 mt-3">
                            <span class="text-custom p-1 bg-custom rounded-2 border border-dark fw-bolder text-center" style="font-size: 16px">
                                <i class="fa-solid fa-wallet" style="color: #6b15b6;"></i> <?php if ($donusaktarmasiz['TotalFare']==0):?>
                                    <?=number_format($donusaktarmasiz['SelectableFares'][0]['TotalFare'],2,',','.')?>
                                <?php else :?>
                                    <?=number_format($donusaktarmasiz['TotalFare'],2,',','.')?>
                                <?php endif;?>
                                <?=$_SESSION['Currency']?>
                            </span>
                            </div>

                            <div class="col-sm-3 mt-3">
                            <span style="font-size: 14px;">
                                <span><?=$donusaktarmasiz['FlightSegments'][0]['DepartureTime']?> - <?=$donusaktarmasiz['FlightSegments'][0]['ArrivalTime']?> <b class="planetime" data-duration=""></b>/ <?=$donusaktarmasiz['FlightSegments'][0]['DepartureAirportName']?>  - <?=$donusaktarmasiz['FlightSegments'][0]['ArrivalAirportName']?>  </span>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <button class="collapsed" data-toggle="collapse" data-target="#detaylardonus2-<?=$donusaktarmasiz['FlightSegments'][0]['ProductId']?>" aria-expanded="false" aria-controls="detaylardonus2-<?=$donusaktarmasiz['FlightSegments'][0]['ProductId']?>" style="border: 0px;">
                                    <span class="text-custom">Uçuş Detayı <i class="fa fa-angle-down"></i></span>
                                </button>
                            </div>

                            <div class="col-sm-5 mt-3">

                                <button type="button" style="width:90px"   data-donus="<?=urlencode(json_encode($donusaktarmasiz,true))?>"  class="donusbuton btn btn-sm btn-custom" data-dprice="<?=$donusaktarmasiz['TotalFare']?>" data-dkalkisuresi="<?=$donusaktarmasiz['FlightSegments'][0]['DepartureTime']?>" data-dvarissuresi="<?=$donusaktarmasiz['FlightSegments'][0]['ArrivalTime']?>" data-dkalkishavalimani="<?=$donusaktarmasiz['FlightSegments'][0]['DepartureAirportName']?>" data-dvarishavalimani="<?=$donusaktarmasiz['FlightSegments'][0]['ArrivalAirportName']?>">
                                    SEÇ <i class="fa fa-angle-right"></i>
                                </button>
                            </div>

                            <div class="collapse mt-3" id="detaylardonus2-<?=$donusaktarmasiz['FlightSegments'][0]['ProductId']?>">
                                <div class="card card-body">
                                    <span class="fw-bold">Uçuş Süresi:  <?=$donusaktarmasiz['FlightSegments'][0]['JourneyDurationInMinute']?>  Dakika</span>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <?php if ($donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                                <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php elseif ($donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                                <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php endif; ?>
                                            <?=$donusaktarmasiz['FlightSegments'][0]['OperatingAirlineName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fas fa-plane-departure" style="color: #6b15b6;"></i> <?=$donusaktarmasiz['FlightSegments'][0]['DepartureAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$donusaktarmasiz['FlightSegments'][0]['DepartureTime']?> Saat, <?=$donusaktarmasiz['FlightSegments'][0]['DepartureDate']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            Uçuş -   <?=$donusaktarmasiz['FlightSegments'][0]['FlightNumber']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fa-solid fa-plane-arrival" style="color: #6b15b6;"></i> <?=$donusaktarmasiz['FlightSegments'][0]['ArrivalAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$donusaktarmasiz['FlightSegments'][0]['ArrivalTime']?> Saat,  <?=$donusaktarmasiz['FlightSegments'][0]['ArrivalDate']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-footer">
                                    <span><i class="fa-solid fa-bowl-rice" style="font-size: 20px; color: #6b15b6;"></i> Yiyecekler Ücretlidir. <i class="fa-solid fa-suitcase" style="font-size: 20px; color: #6b15b6;"></i> Bagaj hakkı: <?=$donusaktarmasiz['SelectableFares'][0]['CheckedBaggageAllowance']['Kilos']?> kg/yetişkin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                <!--     AKTARMASIZ DÖNÜŞ UÇAĞI           -->


                <!--     AKTARMALI DÖNÜŞ UÇAĞI           -->
                <?php foreach ($aktarmadonus as $aktarmad):?>
                    <div class="card-body bg-white text-center tk shadow-sm mt-3 donusfilter " style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px" data-aktarma="aktarmali" data-airline="<?=$aktarmad['FlightSegments'][0]['OperatingAirlineName']?>" data-duration="<?=$aktarmad['FlightSegments'][0]['JourneyDurationInMinute']?>" data-price="  <?php if ($aktarmad['TotalFare']==0):?>
                                     <?=$aktarmad['SelectableFares'][0]['TotalFare']?>
                                <?php else :?>
                                <?=$aktarmad['TotalFare']?>
                                <?php endif;?>" data-kalkis=" <?=$aktarmad['FlightSegments'][0]['DepartureTime']?>" data-varis="<?=$aktarmad['FlightSegments'][0]['ArrivalTime']?>">
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                            <span class="font-weight-normal" style="font-size: 14px;">
                                    <?php if ($aktarmad['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                        <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                    <?php elseif ($aktarmad['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                        <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                    <?php endif; ?>
                                <?=$aktarmad['FlightSegments'][0]['OperatingAirlineName']?>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <span style="font-size: 15px">
                                <span>
                                    <b><i class="fa-solid fa-jet-fighter" style="color: #6b15b6;"></i> Aktarmalı</b>
                                </span>
                            </span>
                            </div>

                            <div class="col-sm-5 mt-3">
                            <span class="text-custom p-1 bg-custom rounded-2 border border-dark fw-bolder text-center" style="font-size: 16px">
                                <i class="fa-solid fa-wallet" style="color: #6b15b6;"></i>

                                <?php if ($aktarmad['TotalFare']==0):?>
                                    <?=number_format($aktarmad['SelectableFares'][0]['TotalFare'],2,',','.')?>
                                <?php else :?>
                                    <?=number_format($aktarmad['TotalFare'],2,',','.')?>
                                <?php endif;?>
                                <?=$_SESSION['Currency']?>

                            </span>
                            </div>

                            <div class="col-sm-3 mt-3">
                            <span style="font-size: 14px;">
                                <span class="fw-bold"> <?=$aktarmad['FlightSegments'][0]['DepartureTime']?> -  <?=$aktarmad['FlightSegments'][0]['ArrivalTime']?> <b class="planetime" data-duration=""></b>/  <?=$aktarmad['FlightSegments'][0]['DepartureAirportName']?>  -  <?=$aktarmad['FlightSegments'][0]['ArrivalAirportName']?> </span>
                            </span>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <button class="collapsed" data-toggle="collapse" data-target="#detaylardonus1-<?=$aktarmad['FlightSegments'][0]['ProductId']?>" aria-expanded="false" aria-controls="detaylardonus1-<?=$aktarmad['FlightSegments'][0]['ProductId']?>" style="border: 0px;">
                                    <span class="text-custom">Uçuş Detayı <i class="fa fa-angle-down"></i></span>
                                </button>
                            </div>

                            <div class="col-sm-5 mt-3">

                                <button type="button" style="width:90px"  data-donus="<?=urlencode(json_encode($aktarmad,true))?>" class="donusbuton btn btn-sm btn-custom" data-dprice="<?=$aktarmad['TotalFare']?>" data-dkalkisuresi="<?=$aktarmad['FlightSegments'][0]['DepartureTime']?>" data-dvarissuresi="<?=$aktarmad['FlightSegments'][0]['ArrivalTime']?>" data-dkalkishavalimani="<?=$aktarmad['FlightSegments'][0]['DepartureAirportName']?>" data-dvarishavalimani="<?=$aktarmad['FlightSegments'][0]['ArrivalAirportName']?>">
                                    SEÇ <i class="fa fa-angle-right"></i>
                                </button>
                            </div>

                            <div class="collapse" id="detaylardonus1-<?=$aktarmad['FlightSegments'][0]['ProductId']?>">
                                <div class="card card-body">
                                    <span class="fw-bold">Uçuş Süresi: <?=$aktarmad['FlightSegments'][0]['JourneyDurationInMinute']?>  Dakika</span>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <?php if ($aktarmad['FlightSegments'][0]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                                <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php elseif ($aktarmad['FlightSegments'][0]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                                <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php endif; ?>
                                            <?=$aktarmad['FlightSegments'][0]['OperatingAirlineName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fas fa-plane-departure" style="color: #6b15b6;"></i> <?=$aktarmad['FlightSegments'][0]['DepartureAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmad['FlightSegments'][0]['DepartureTime']?> Saat, <?=$aktarmad['FlightSegments'][0]['DepartureDate']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            Uçuş -  <?=$aktarmad['FlightSegments'][0]['FlightNumber']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fa-solid fa-plane-arrival" style="color: #6b15b6;"></i> <?=$aktarmad['FlightSegments'][0]['ArrivalAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmad['FlightSegments'][0]['ArrivalTime']?> Saat,  <?=$aktarmad['FlightSegments'][0]['ArrivalDate']?>
                                        </div>
                                    </div>

                                    <div class="row mt-3 text-center justify-content-center">
                                        <div class="col-sm-12">
                                             <span class="border border-dark p-1 fw-bold rounded-2">Bekleme Süresi  <?php
                                                 $giris_saati = new DateTime($aktarmad['FlightSegments'][0]['ArrivalTime']);
                                                 $cikis_saati = new DateTime($aktarmad['FlightSegments'][1]['DepartureTime']);

                                                 if ($cikis_saati < $giris_saati) {
                                                     $cikis_saati->add(new DateInterval('P1D'));
                                                 }

                                                 $fark = $giris_saati->diff($cikis_saati);
                                                 $dakika_farki = ($fark->h * 60) + $fark->i;

                                                 echo   $dakika_farki . " dakika";
                                                 ?></span>
                                        </div>
                                    </div>
                                    <span class="fw-bold mt-3">Uçuş Süresi: <?=$aktarmad['FlightSegments'][1]['JourneyDurationInMinute']?>  Dakika</span>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            <?php if ($aktarmad['FlightSegments'][1]['OperatingAirlineName'] === 'Turkish Airlines'):?>
                                                <img src="../../public/img/gezinomi_images/TK.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php elseif ($aktarmad['FlightSegments'][1]['OperatingAirlineName'] === 'Anadolu Jet') : ?>
                                                <img src="../../public/img/gezinomi_images/AJ.png" class="me-1" width="20" height="20" alt="" srcset="">
                                            <?php endif; ?>
                                            <?=$aktarmad['FlightSegments'][1]['OperatingAirlineName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fas fa-plane-departure" style="color: #6b15b6;"></i><?=$aktarmad['FlightSegments'][1]['DepartureAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmad['FlightSegments'][1]['DepartureTime']?> Saat, <?=$aktarmad['FlightSegments'][1]['DepartureDate']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mt-3">
                                            Uçuş -   <?=$aktarmad['FlightSegments'][1]['FlightNumber']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <i class="fa-solid fa-plane-arrival" style="color: #6b15b6;"></i> <?=$aktarmad['FlightSegments'][1]['ArrivalAirportName']?>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <?=$aktarmad['FlightSegments'][1]['ArrivalTime']?> Saat, <?=$aktarmad['FlightSegments'][1]['ArrivalDate']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-footer">
                                    <span><i class="fa-solid fa-bowl-rice" style="font-size: 20px; color: #6b15b6;"></i> Yiyecekler Ücretlidir. <i class="fa-solid fa-suitcase" style="font-size: 20px; color: #6b15b6;"></i> Bagaj hakkı: <?=$donusaktarmasiz['SelectableFares'][0]['CheckedBaggageAllowance']['Kilos']?> kg/yetişkin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                <!--     AKTARMALI DÖNÜŞ UÇAĞI           -->


                <?php endif;?>


            </div>


        </div>

    </div>
</div>

<nav class="navbar nb fixed-bottom navbar-light text-white fs-5 border border-white shadow border-top-3" style="background-color: #232b38">
    <div class="container-fluid justify-content-center">
        <div class="row align-items-center d-flex text-center">
            <?php if (!empty($arrival)): ?>
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <i class="fas fa-plane-departure" style="color: white;"></i> Gidiş :
                    <span><?php if (!empty($arrival)): ?>  <?=$ilkBolum?> <?php endif; ?> → <?php if (!empty($arrival)): ?>  <?=$ikinci?> <?php endif; ?>  </span>
                    <span><?php
                        echo $departure[0]['FlightSegments'][0]['DepartureDate'] ?></span>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <i class="fas fa-plane-departure" style="color: white;"></i> Dönüş :
                    <span> <?php if (!empty($arrival)): ?>  <?=$ikinci?> <?php endif; ?> →   <?php if (!empty($arrival)): ?>  <?=$ilkBolum?> <?php endif; ?></span>
                    <span><?php echo $formatted_dates_arrival; ?></span>
                </div>
            <?php else: ?>
                <div class="col-xs-6 col-sm-3 col-md-4">
                    <i class="fas fa-plane-departure" style="color: white;"></i> Gidiş :
                    <span><?=$_SESSION['Gidisucagi']?> → <?=$_SESSION['donusucagi']?></span>
                    <span><?php
                        $first_option = $response_data['OriginDestinationOptions'][1];
                        $first_segment = $first_option['FlightSegments'][0];
                        echo $first_segment['DepartureDate']; ?></span>
                </div>
            <?php endif; ?>
            <div class="col-xs-5 col-sm-4 col-md-4 mt-2">
                <span id="total-price" class="bg-custom rounded-2 border border-custom text-custom fw-bold p-1 border border-secondary border-2"><i class="fa-solid fa-wallet" style="color: #6b15b6;"></i> <span class="net_price">0  </span><?= $_SESSION['Currency'] ?> </span>
            </div>
            <form action="flight_type" method="post" class="col-xs-1 col-sm-2 text-xs-end col-md-2 mt-2" autocomplete="off">
                <div>
                    <button id="devam"  type="submit" name="selection" class="btn text-white plane fw-bold col-xs-4" style="background-color: #8b93a0" value="1">
                        Devam <i class="fa fa-angle-right"></i>
                    </button>
                    <input hidden value="" id="gidisVeri" name="gidisVeri">
                    <input hidden value="" id="donusVeri" name="donusVeri">

                </div>
            </form>
        </div>
    </div>

</nav>

<style>
    nav-link{
    }
    .active{
        color: #6B15B6!important;
    }

    p{
        color: black;
        text-align: left;
    }
    .tk{
        position: static;
        right: 320px;
        top: 5px;
    }


    .pc{
        position: static;
        top: 150px;
        margin-left: 252px;
    }

    .aj{
        position: static;
        top: 300px;
        margin-left: 252px;
    }

</style>

<?php require 'mainPage_statics/footer.php'; ?>
<script src="<?= public_url('js/gezinomi.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= returned($message); ?>
<script>

    $(document).ready(function(){
        $('input[name="direktucus"]').change(function(){
            if($(this).is(':checked')){
                $('.aktarmasiz').addClass('show').removeClass('hidden');
            }
            else{
                $('.aktarmasiz').addClass('hidden').removeClass('show');
            }
        });
    });
    $(document).ready(function(){
        $('input[name="aktarmali"]').change(function(){
            if($(this).is(':checked')){
                $('.aktarmali').addClass('show').removeClass('hidden');
            }
            else{
                $('.aktarmali').addClass('hidden').removeClass('show');
            }
        });
    });
    $(document).ready(function(){
        $('input[name="anadolujet"]').change(function(){
            if($(this).is(':checked')){
                $('.Anadolu').addClass('show').removeClass('hidden');
            }
            else{
                $('.Anadolu').addClass('hidden').removeClass('show');
            }
        });
    });
    $(document).ready(function(){
        $('input[name="turkishava"]').change(function(){
            if($(this).is(':checked')){
                $('.Turkish').addClass('show').removeClass('hidden');
            }
            else{
                $('.Turkish').addClass('hidden').removeClass('show');
            }
        });
    });



</script>
<script>
    var carousel = document.getElementById("carousel-example-generic");
    var leftControl = carousel.getElementsByClassName("left carousel-control-chart")[0];
    var rightControl = carousel.getElementsByClassName("right carousel-control-chart")[0];

    rightControl.addEventListener("click", () => {
        carousel.getElementsByClassName("active")[0].className = "";
        carousel.getElementsByClassName("item")[0].style.display = "none";
        carousel.getElementsByClassName("item")[1].style.display = "block";
        carousel.getElementsByClassName("item")[1].className = "active";
        if(document.querySelector(".item").dataset.graph == "1") {
        } else {
            document.querySelector(".item").classList.remove("active");
            document.querySelector(".item:first-child").classList.add("active");
            myChart.render();
        }
    });

    leftControl.addEventListener("click", () => {
        carousel.getElementsByClassName("active")[0].className = "";
        carousel.getElementsByClassName("item")[0].style.display = "none";
        carousel.getElementsByClassName("item")[1].style.display = "block";
        carousel.getElementsByClassName("item")[1].className = "active";
        if(document.querySelector(".item.active").dataset.graph == "2") {
        } else {
            document.querySelector(".item.active").classList.remove("active");
            document.querySelector(".item:first-child").classList.add("active");
            myChart2.render();
        }
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["23 Haziran", "24 Cts", "25 Pz", "26 Pt", "27 Sa",
                "28 Çr", "29 Pr"],
            datasets: [{
                barThickness: 25,
                data: [567, 775, 345, 880, 750, 445, 300],
                label: "Günlük Fiyat",
                borderColor: "#dee2e6",
                backgroundColor: ['#dee2e6','#dee2e6','#dee2e6','#dee2e6','#dee2e6','#dee2e6','#dee2e6'],
            }
            ]
        },
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: 'Günlük Fiyat Değişimi'
            },
            onClick: function(e){
                var activeBars = myChart.getElementsAtEvent(e);
                if(activeBars.length > 0){
                    var date=document.getElementsByClassName('date')[0];
                    var price=document.getElementsByClassName('total-price')[0];
                    var clickedIndex = activeBars[0]._index;
                    var clickedValue = this.data.datasets[0].data[clickedIndex];
                    var color=myChart.data.datasets[0].backgroundColor;
                    for (var i=0;i<color.length;i++){
                        myChart.data.datasets[0].backgroundColor[i]='#dee2e6';
                    }
                    myChart.data.datasets[0].backgroundColor[clickedIndex]='#6B15B6';
                    var clickeddate = this.data.labels[clickedIndex];
                    price.innerHTML='HESAPLANAN TAHMİNİ FİYAT : '+clickedValue + ' TRY';
                    date.innerHTML=clickeddate;
                    myChart.update();
                }
            }
        }
    });

    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["30 Cu", "1 Ct", "2 Pz", "3 Sa", "4 Çr",
                "5 Pr", "6 Cu"],
            datasets: [{
                barThickness: 25,
                data: [267, 975, 445, 580, 650, 745, 300],
                label: "Günlük Fiyat",
                borderColor: "#3e95cd",
                backgroundColor: '#6B15B6',
                fill: false
            }
            ]
        },
        options: {
            scales: {
                xAxes: [{
                    barPercentage: 0.9
                }]
            },
            title: {
                display: true,
                text: 'Günlük Fiyat Değişimi'
            }
        }
    });
    document.querySelector(".item[data-graph='2']").style.display = "none";





    var indicators = carousel.getElementsByClassName("carousel-indicators")[0];

    // .. leftControl, rightControl tanımları

    carousel.addEventListener("slid.bs.carousel", function() {
        myChart.render();
        myChart2.render();
    })
</script>
<script>
    // Carousel kontrolleri
    var carousel2 = document.getElementById("carousel-example-generic-donus");
    var leftControl2 = carousel2.getElementsByClassName("left-donus carousel-control2")[0];
    var rightControl2 = carousel2.getElementsByClassName("right-donus carousel-control2")[0];

    rightControl2.addEventListener("click", () => {
        carousel2.getElementsByClassName("active")[0].className = "";
        carousel2.getElementsByClassName("item")[0].style.display = "none";
        carousel2.getElementsByClassName("item")[1].style.display = "block";
        carousel2.getElementsByClassName("item")[1].className = "active";
        if(document.querySelector(".item").dataset.graph == "1") {
        } else {
            document.querySelector(".item").classList.remove("active");
            document.querySelector(".item:first-child").classList.add("active");
            myChart3.render();
        }
    });

    leftControl2.addEventListener("click", () => {
        carousel2.getElementsByClassName("active")[0].className = "";
        carousel2.getElementsByClassName("item")[0].style.display = "none";
        carousel2.getElementsByClassName("item")[1].style.display = "block";
        carousel2.getElementsByClassName("item")[1].className = "active";
        if(document.querySelector(".item.active").dataset.graph == "2") {
        } else {
            document.querySelector(".item.active").classList.remove("active");
            document.querySelector(".item:first-child").classList.add("active");
            myChart4.render();
        }
    });

    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart3 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["23 Haz Çrş", "24 Haz Prş", "25 Haz Cuma", "26 Haz Cts", "27 Haz Pz",
                "28 Haz Pzt", "29 Haz Sal"],
            datasets: [{
                barThickness: 25,
                data: [567, 775, 345, 880, 750, 445, 445],
                label: " Fiyat",
                borderColor: "#3e95cd",
                backgroundColor: '#6B15B6',
            }
            ]
        },
        options: {
            scales: {
                xAxes: [{
                    barPercentage: 0.9
                }]
            },
            title: {
                display: true,
                text: 'Günlük Fiyat Değişimi'
            }
        }
    });

    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart4 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7"],
            datasets: [{
                barThickness: 25,
                data: [12, 19, 3, 5, 2, 3, 18],
                label: "Günlük ",
                borderColor: "#3e95cd",
                backgroundColor: '#6B15B6',
                fill: false
            }
            ]
        },
        options: {
            scales: {
                xAxes: [{
                    barPercentage: 0.9
                }]
            },
            title: {
                display: true,
                text: 'Günlük Fiyat Değişimi'
            }
        }
    });
    document.querySelector(".item[data-graph='2']").style.display = "none";

    // Carousel işlemleri

    var indicators2 = carousel.getElementsByClassName("carousel-indicators2")[0];

    // .. leftControl, rightControl tanımları

    carousel2.addEventListener("slid.bs.carousel", function() {
        myChart3.render();
        myChart4.render();
    })
</script>
<script>
    <?php if(empty($arrival)):?>
    var devamButton=$("#devam");
    devamButton.prop('disabled',true);
    $('.gidisbuton').click(function() {
        devamButton.prop('disabled',false);
    })
    $('#gidisUcusDegistir').click(function() {
        devamButton.prop('disabled',true);
    })
    <?php endif;?>

    <?php if(!empty($arrival)):?>
    var gidisButton = false;
    var donusButton = false;
    var devamButton = $("#devam");
    devamButton.prop('disabled', true);

    $('.gidisbuton').click(function() {
        gidisButton = true;
    })
    $('.donusbuton').click(function() {
        donusButton = true;
    })

    $('#gidisUcusDegistir').click(function() {
        gidisButton = false;
        if (gidisButton && donusButton) {
            devamButton.prop('disabled', false);
        } else {

            devamButton.prop('disabled', true);
        }
    })

    $('#donusUcusDegistir').click(function() {
        donusButton = false;
        if (gidisButton && donusButton) {
            devamButton.prop('disabled', false);
        } else {

            devamButton.prop('disabled', true);
        }
    })
    $('.gidisbuton, .donusbuton').click(function() {
        if (gidisButton && donusButton) {
            devamButton.prop('disabled', false);
        } else {

            devamButton.prop('disabled', true);
        }
    })



    <?php endif;?>



</script>
<script>
    const rangeInputs = document.querySelectorAll('input[type="range"]')
    const numberInput = document.querySelector('input[type="number"]')

    function handleInputChange(e) {
        let target = e.target
        if (e.target.type !== 'range') {
            target = document.getElementById('range')
        }
        const min = target.min
        const max = target.max
        const val = target.value

        target.style.backgroundSize = (val - min) * 100 / (max - min) + '% 100%'
    }

    rangeInputs.forEach(input => {
        input.addEventListener('input', handleInputChange)
    })

    numberInput.addEventListener('input', handleInputChange)
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        var selectedValue = "<?=session('AirportCode')?>";
        $("#city-select1 option").each(function() {
            if ($(this).val() == selectedValue) {
                $(this).prop("selected", true);
            }
        });
    });

    $(document).ready(function() {
        var selectedValue = "<?=session('AirportCode1')?>";
        $("#city-select2 option").each(function() {
            if ($(this).val() == selectedValue) {
                $(this).prop("selected", true);
            }
        });
    });

    function transferSelection() {
        var go = $("#city-select1").val();
        var back = $("#city-select2").val();
        $("#city-select1 option").each(function() {
            if ($(this).val() == back) {
                $(this).prop("selected", true);
            }
        });
        $("#city-select2 option").each(function() {
            if ($(this).val() == go) {
                $(this).prop("selected", true);
            }
        });
        $('.selectpicker').selectpicker('refresh');
    }
</script>
<script>
    var gidis = 0;
    var donus = 0;
    $(document).ready(function () {
        $('.ucusdegistir-gidis').hide();
        $('.ucusdegistir-donus').hide();
        $('.gidisson').hide();
        $('.donusson').hide();
        $('.gidisbuton').click(function() {
                if($('.gidisucusu').is(":visible")) {
                    var choosenValue = $(this).data("choosen");
                    $('#gidisVeri').val(choosenValue);
                    $('.gidisucusu').hide();
                    $('.ucusdegistir-gidis').show();
                    $('.gidisson').show();
                    $('html, body').animate({scrollTop: $('.gidisson').offset().top - 500}, '300');
                    var price = $(this).data("gprice");
                    if (!isNaN(price)) {
                        gidis = parseFloat(price);
                    }
                    updateNetPrice();


                    $('#gidisprice').text(parseFloat(price).toLocaleString('de-DE', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    var kalkisuresi = $(this).data("kalkisuresi");
                    var varissuresi = $(this).data("varissuresi");
                    var kalkishavalimani = $(this).data("kalkishavalimani");
                    var varishavalimani = $(this).data("varishavalimani");
                    $('#kalkissuresi').text(kalkisuresi);
                    $('#varissuresi').text(varissuresi);
                    $('#kalkishavalimanı').text(kalkishavalimani);
                    $('#varishavalimani').text(varishavalimani);

                } else {
                    $('.gidisucusu').show();
                    $('.ucusdegistir-gidis').hide();
                }
            }
        );
        $('.donusbuton').click(function() {
            if($('.donusucusu').is(":visible")) {
                var donusValue = $(this).data("donus");
                $('#donusVeri').val(donusValue);
                var price = $(this).data("dprice");
                if (!isNaN(price)) {
                    donus = parseFloat(price);
                }
                updateNetPrice();

                $('#donusprice').text(parseFloat(price).toLocaleString('de-DE', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                var dkalkisuresi = $(this).data("dkalkisuresi");
                var dvarissuresi = $(this).data("dvarissuresi");
                var dkalkishavalimani = $(this).data("dkalkishavalimani");
                var dvarishavalimani = $(this).data("dvarishavalimani");
                $('#donuskalkisssuresi').text(dkalkisuresi);
                $('#donusvarissuresi').text(dvarissuresi);
                $('#dkalkishavalimani').text(dkalkishavalimani);
                $('#dvarishavalimani').text(dvarishavalimani);

            }
        });
    });





    function updateNetPrice() {
        var netPrice = gidis + donus;
        if (!isNaN(netPrice)) {
            $(".net_price").text(parseFloat(netPrice).toLocaleString('de-DE', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));


        } else {
            $(".net_price").text("Invalid Price");
        }
    }



</script>

<script>
    $(document).ready(function () {
        $('.donusbuton').click(function () {
            if($('.donusucusu').is(":visible")) {
                $('.donusucusu').hide();
                $('.ucusdegistir-donus').show();
                $('.donusson').show();
                $('html, body').animate({
                    scrollTop: $('.donusson').offset().top - 500
                }, '300');
            } else {
                $('.donusucusu').show();
                $('.ucusdegistir-donus').hide();
            }
        });
    });
</script>
<!-- uçuş değiştir butonu -->
<script>
    $(document).ready(function () {
        $('.ucusdegistir-gidis').click(function () {
            $('.gidisucusu').show();
        });

        $('.ucusdegistir-donus').click(function () {
            $('.donusucusu').show();
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.inissaatleri').hide();
        $('.inissaatleri-btn').click(function () {
            if ($('.inissaatleri').is(":visible")) {
                $('.inissaatleri').hide();
            } else {
                $('.inissaatleri').show();
            }
        });
    });
</script>
<script>
    var btn = $('#fly-button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
</script>
<script>
    $(document).ready(function () {
        $('.gunlukfiyatlar-btn').click(function () {
            if ($('.gidis-fiyat').is(':hidden')) {
                $('.gidis-fiyat').show();
                $('.donus-fiyat').show();
            } else {
                $('.gidis-fiyat').hide();
                $('.donus-fiyat').hide();
            }
        });
    });
</script>

<!-- GİDİŞ FİLTRELEMEEE  -->
<script>
    $( "#gtime" ).on( "input", function() {
        var gtime = $('#gtime').val();

        var hour = parseInt(gtime / 60)<10? '0'+parseInt(gtime / 60): parseInt(gtime / 60)==24?23:parseInt(gtime / 60);
        var min = parseInt(gtime / 60)==24 && parseInt(gtime % 60)==0 ? 59:parseInt(gtime % 60)==0?'00':parseInt(gtime % 60);
        var formatedtime=hour+":"+min;
        $('#hour1').text(formatedtime);

    } );
    $( "#gvtime" ).on( "input", function() {
        var gtime = $('#gvtime').val();

        var hour = parseInt(gtime / 60)<10? '0'+parseInt(gtime / 60): parseInt(gtime / 60)==24?23:parseInt(gtime / 60);
        var min = parseInt(gtime / 60)==24 && parseInt(gtime % 60)==0 ? 59:parseInt(gtime % 60)==0?'00':parseInt(gtime % 60);
        var formatedtime=hour+":"+min;
        $('#hour3').text(formatedtime);

    } );

    $('#turkishava ,#anadolujet,#Pegasus,#direktucus,#aktarmali,#gprice ,#gtime,#gduraiton,#birdenfazla,#gvtime').click(function() {
        var turkishava = $('#turkishava').is(':checked')? 'Turkish Airlines':'';
        var anadolujet = $('#anadolujet').is(':checked')?'Anadolu Jet':'';
        var Pegasus = $('#Pegasus').is(':checked');
        var direktucus = $('#direktucus').is(':checked');
        var aktarmali = $('#aktarmali').is(':checked') ;
        var gprice = $('#gprice').val();

        var gtime = $('#hour1').text();

// Extract the hour and minute from the gtime string
        var hourMinute = gtime.split(':');
        var hour = parseInt(hourMinute[0]);
        var minute = parseInt(hourMinute[1]);

// Convert the time to minutes
        var totalMinutes = hour * 60 + minute;

        var gvtime = $('#hour3').text();

// Extract the hour and minute from the gtime string
        var hourMinute = gvtime.split(':');
        var hour = parseInt(hourMinute[0]);
        var minute = parseInt(hourMinute[1]);

// Convert the time to minutes
        var gtotalMinutes = hour * 60 + minute;


        var gduraiton = $('#gduraiton').val();
        var dduraiton = $('#dduraiton').val();
        var birdenfazla = $('#birdenfazla').is(':checked');
        var gidisfilters = document.querySelectorAll('.filter');
        for (var i = 0; i < gidisfilters.length; i++) {

            var aktarma = gidisfilters[i].getAttribute('data-aktarma');
            if (aktarma=="aktarmali"){
                aktarma=true;

            }
            else{
                aktarma=false;

            }
            var airline = gidisfilters[i].getAttribute('data-airline');
            var duration = gidisfilters[i].getAttribute('data-duration');
            var price = gidisfilters[i].getAttribute('data-price');
            var kalkis = gidisfilters[i].getAttribute('data-kalkis');


            var hourMinutes = kalkis.split(':');
            var hours = parseInt(hourMinutes[0]);
            var minutes = parseInt(hourMinutes[1]);


            var totalMinutess = hours * 60 + minutes;
            var varis = gidisfilters[i].getAttribute('data-varis');

            var hourMinutes = varis.split(':');
            var hours = parseInt(hourMinutes[0]);
            var minutes = parseInt(hourMinutes[1]);


            var gtotalMinutess = hours * 60 + minutes;





            if ((gtotalMinutess >= gtotalMinutes) &&(totalMinutess >= totalMinutes) &&(parseFloat(price) >= parseFloat(gprice)) && (gduraiton <= duration) && ((aktarma == true && aktarmali == true)||(aktarma==false && direktucus==true)) && (airline==turkishava||airline==anadolujet)){
                gidisfilters[i].style.display = 'block';

            }else{
                gidisfilters[i].style.display = 'none';
            }
        }
    });
</script>



<script>
    $( "#dtime" ).on( "input", function() {
        var dtime = $('#dtime').val();

        var hour = parseInt(dtime / 60)<10? '0'+parseInt(dtime / 60): parseInt(dtime / 60)==24?23:parseInt(dtime / 60);
        var min = parseInt(dtime / 60)==24 && parseInt(dtime % 60)==0 ? 59:parseInt(dtime % 60)==0?'00':parseInt(dtime % 60);
        var formatedtime=hour+":"+min;
        $('#hour2').text(formatedtime);

    } );
    $( "#dvtime" ).on( "input", function() {
        var gtime = $('#dvtime').val();

        var hour = parseInt(gtime / 60)<10? '0'+parseInt(gtime / 60): parseInt(gtime / 60)==24?23:parseInt(gtime / 60);
        var min = parseInt(gtime / 60)==24 && parseInt(gtime % 60)==0 ? 59:parseInt(gtime % 60)==0?'00':parseInt(gtime % 60);
        var formatedtime=hour+":"+min;
        $('#hour4').text(formatedtime);

    } );
    $('#turkishava ,#anadolujet,#Pegasus,#direktucus,#aktarmali,#dprice,#dtime,#dduraiton,#birdenfazla,#dvtime').click(function() {
        console.log('aa');
        var turkishava = $('#turkishava').is(':checked')? 'Turkish Airlines':'';
        var anadolujet = $('#anadolujet').is(':checked')?'Anadolu Jet':'';
        var Pegasus = $('#Pegasus').is(':checked');
        var direktucus = $('#direktucus').is(':checked');
        var aktarmali = $('#aktarmali').is(':checked') ;
        var dprice = $('#dprice').val();
        var dtime = $('#hour2').text();
        var dvtime = $('#hour4').text();
        var hourMinute = dtime.split(':');
        var hour = parseInt(hourMinute[0]);
        var minute = parseInt(hourMinute[1]);

// Convert the time to minutes
        var totalMinutes = hour * 60 + minute;



        var dhourMinute = dvtime.split(':');
        var dhour = parseInt(dhourMinute[0]);
        var dminute = parseInt(dhourMinute[1]);

// Convert the time to minutes
        var dtotalMinutes = dhour * 60 + dminute;

        var dduraiton = $('#dduraiton').val();
        var birdenfazla = $('#birdenfazla').is(':checked');
        var donusfilters = document.querySelectorAll('.donusfilter');
        for (var i = 0; i < donusfilters.length; i++) {

            var aktarma = donusfilters[i].getAttribute('data-aktarma');
            if (aktarma=="aktarmali"){
                aktarma=true;
            }
            else{
                aktarma=false;
            }
            var airline = donusfilters[i].getAttribute('data-airline');
            var duration = donusfilters[i].getAttribute('data-duration');
            var price = donusfilters[i].getAttribute('data-price');
            var kalkis = donusfilters[i].getAttribute('data-kalkis');
            var varis = donusfilters[i].getAttribute('data-varis');
            var hourMinutes = varis.split(':');
            var hours = parseInt(hourMinutes[0]);
            var minutes = parseInt(hourMinutes[1]);


            var datotalMinutess = hours * 60 + minutes;


            var hourMinutes = kalkis.split(':');
            var hours = parseInt(hourMinutes[0]);
            var minutes = parseInt(hourMinutes[1]);


            var totalMinutess = hours * 60 + minutes;

            if ((datotalMinutess >= dtotalMinutes) &&(totalMinutess >= totalMinutes) &&(parseFloat(price) >= parseFloat(dprice)) && (dduraiton <= duration) && ((aktarma == true && aktarmali == true)||(aktarma==false && direktucus==true)) && (airline==turkishava||airline==anadolujet)){
                donusfilters[i].style.display = 'block';

            }else{
                donusfilters[i].style.display = 'none';
            }
        }
    });
</script><script>
    $('input[name="DepartureDay"]').change(function() {
        var departureDay = new Date($(this).val());
        var today = new Date();

        if (departureDay < today) {
            alert('Geçmiş tarih seçemezsiniz.');
            $(this).val(new Date().toISOString().substr(0, 10));
        }
    });
</script>
<script>
    $("#plane").click(function(e) {
        if ($("#city-select1").val() == $("#city-select2").val()) {
            $("#error").text("Aynı havalimanını seçemezsiniz.").show();

            e.preventDefault();
            return false;
        } else {
            $("#error").hide();
        }

    })
</script>
<script>
    $("#plane").click(function(e) {
        if ($("#gidistarihi").val() == $("#tarihSecici").val()) {
            $("#error").text("Aynı tarihte uçamazsınız  .").show();

            e.preventDefault();
            return false;
        } else {
            $("#error").hide();
        }

    })
</script>