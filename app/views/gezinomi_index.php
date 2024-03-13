<?php require 'mainPage_statics/header.php';?>
<style>
    @media only screen and (max-width: 576px) {
        .mobile_position{
            position: static !important;
        }
    }
    #error {
        color: red;
        display: none;
    }
    #loading {

        position: fixed;

        top: 0;

        left: 0;

        width: 100%;

        height: 100%;

        display: flex;

        align-items:center;

        justify-content:center;

        background-color: #fff;

        z-index: 999

    } </style>
</style>
<div class="container-lg bg-light pt-5  small animate__animated animate__fadeIn">
    <div class="breadcrumb small pt-5 pb-4">
        <div class="row w-100 m-0">
            <div class=" col-lg-6 col-sm-3 mt-2"></div>
            <div class=" col-lg-2 col-sm-3 mt-2">
                <a href="gezinomi_index"">
                <h6 class=" p-3 text-center btn-selection btn-active m-0"><i class="fa-solid fa-plane mr-1 text-custom"></i> <span class="fw-bolder">Uçak </span></h6>
                </a>
            </div>
            <div class="col-lg-2 col-sm-3 mt-2">
                <a hrsticky-topef="gezinomi_otel_index">
                    <h6 class="p-3 text-center btn-selection m-0"><i class="fa-solid fa-hotel mr-1 text-custom"></i><span class="fw-bolder">Otel</span></h6>
                </a>
            </div>
            <div class="col-lg-2 col-sm-3 mt-2">
                <a href="rent_a_car_index">
                    <h6 class="p-3 text-center btn-selection m-0"><i class="fa-solid fa-car mr-1 text-custom"></i> <span class="fw-bolder">Araba</span></h6>
                </a>
            </div>
        </div>
    </div><div class="row pt-2 animate__animated animate__fadeIn sticky-top mobile_position">
        <div class="col-12 col-md-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex justify-content-between align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bilet Satış</h6>
                </header>
                <form action="<?= site_url('ticket_selection') ?>" method="post">
                    <input type="hidden" id="DepartureDay" name="DepartureDay" value="DepartureDay">


                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label class="form-label text-custom mb-0"><strong>Nereden</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">

                                    </div>

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
                            <div class="col-md-3 ">
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
                                        <option value="IST"  >İstanbul, Türkiye IST (İstanbul Havalimanı)</option>
                                        <option value="ADB" selected>İzmir, Türkiye ADB (Adnan Menderes Havalimanı)</option>
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
                            <div class="col-md-3 ">
                                <label class="form-label text-custom mb-0"><strong>Gidiş Tarihi</strong></label>
                                <input class="form-control small" name="DepartureDay" id="gidistarihi" type="date" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="tarihSecim" class="form-label text-custom mb-0"><strong>Dönüş Tarihi</strong></label>
                                <input id="tarihSecici" class="form-control small"   name="ArrivalDay" type="date" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label class="form-label text-custom mb-0"><strong>Fiyat Gösterim Tipi</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text bg-custom">
                                    <i class="fas fa-money-bill-wave"></i>
                                  </span>
                                    </div>
                                    <select  id="fare-display-type-select" class="form-control" name="FareDisplayType">
                                        <option value="Lowest" selected>En Düşük Fiyat</option>
                                        <option value="Alternative">Alternatif Fiyatlar</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-custom mb-0"><strong>Kabin Tipi</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text bg-custom">
                                   <i class="fa-solid fa-chair"></i>
                                  </span>
                                    </div>
                                    <select id="cabin-type-select" class="form-control" name="CabinType">
                                        <option value="First">Birinci Sınıf</option>
                                        <option value="Business">Business Sınıfı</option>
                                        <option value="Premium">Premium Ekonomi</option>
                                        <option value="Promotion">Promosyon</option>
                                        <option value="Economy" selected>Ekonomi Sınıfı</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label text-custom mb-0"><strong>Yolcu Tipi</strong></label>
                                <button id="buttonpassangertype" type="button" class="travellertype form-control font-type text-left">
                                    <div class="travellertype button-text">
                                        <span class="travellertype" id="t-yetiskin">1</span> Yetişkin
                                        <input class="travellertype p_yetiskin" type="hidden" name="ADT" value="1">
                                        <span class="travellertype" id="t-cocuk">0</span> Çocuk
                                        <input class="travellertype p_cocuk" type="hidden" name="CHD" value="0">
                                        <span class="travellertype" id="t-bebek">0</span> Bebek
                                        <input class="travellertype p_bebek" type="hidden" name="INF" value="0">
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
                                        <span class="travellertype value h6">1</span>
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
                                        <span class="travellertype value h6">0</span>
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
                                        <span class="travellertype value h6">0</span>
                                        <button type="button" class="travellertype rounded-circle traveller-number bebek plus traveller-display">
                                            <i class="travellertype fa fa-plus font-weight-bold" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-custom mb-0"><strong>Para Birimi</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text bg-custom">
                                        <i class="fas fa-money-bill"></i>
                                    </span>
                                    </div>
                                    <select id="currency-select" class="form-control" name="Currency">
                                        <option value="TRY">TRY</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                        <option value="CHF">CHF</option>
                                        <option value="KZT">KZT</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">


                            <div class="col-md-3">
                                <label class="form-label text-custom mb-0"><strong>İade Tipi</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text bg-custom">
                                    <i class="fas fa-undo"></i>
                                  </span>
                                    </div>
                                    <select id="refundable-type-select" class="form-control" name="RefundableType">
                                        <option value="AllFlights" selected>Tüm Uçuşlar</option>
                                        <option value="OnlyRefundable">Sadece İade Edilebilir</option>
                                        <option value="OnlyNonRefundable">Sadece İade Edilemez</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button type="button" name="plus" id="plus" class="btn plus btn-md btn-custom w-100 mt-3">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <div class="col-12 col-md-2 acentefiyat">
                                <label class="form-label text-custom mb-0"><strong>Acente Fiyatı : </strong></label>
                                <input class="form-control small" id="acentefiyat" name="acentefiyat" type="text" value="0">
                            </div>

                            <div class="col-md-3">

                                <button value="1" type="submit" name="plane" id="plane" class="btn btn-md btn-custom w-100 mt-3">Bilet Bul</button>

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
    <div class="row position-relative z-index-ozel">
        <div class="col-md-4 mt-2 col-12" style="text-align: center">
            <div class="bg-custom2 p-3 rounded-2">
                <div class="float-left">
                    <i class="fa-regular fa-credit-card fa-4x text-white"></i>
                </div>
                <h5 class="text-light">ACENTE KREDİ LİMİTİ</h5>
                <h4 class="text-light font-weight-bold">1,012</h4>
            </div>
        </div>
        <div class="col-md-4 mt-2 col-12" style="text-align: center">
            <div class="bg-custom2 p-3 rounded-2">
                <div class="float-left">
                    <i class="fa-solid fa-wallet fa-4x text-white"></i>
                </div>
                <h5 class="text-light">KULLANILABİLİR BAKİYE</h5>
                <h4 class="text-light font-weight-bold">1,012</h4>
            </div>
        </div>
        <div class="col-md-4 mt-2 col-12" style="text-align: center">
            <div class="bg-custom2 p-3 rounded-2">
                <div class="float-left">
                    <i class="fa-solid fa-coins fa-6x text-white"></i>
                </div>
                <h5 class="text-light">BAKİYE TUTARI</h5>
                <h4 class="text-light font-weight-bold">1,012</h4>
            </div>
        </div>

    </div>
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
            <ol class="carousel-indicators">  <?php foreach ($gezinomi as $key => $item): ?>

                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="<?php echo $key == 0 ? 'active' : '' ?>"></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($gezinomi as $key =>$item):?>
                    <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?> ">
                        <?php if(empty($item['image'])):?>
                            <img class="d-block" src="public/img/gezinomi_admin/gorsel-hazirlaniyor.png" alt="First slide"  >
                        <?php else:?>
                            <img class="d-block" src="public/img/gezinomi_admin/<?=$item['image']?>" alt="First slide" height="350px" width="350px">
                        <?php endif;?>
                        <div class="carousel-text">
                            <h4> <?=$item['htext']?></h4>
                            <h3><?=$item['mtext']?></h3><br>
                            <p><?=$item['smtext']?></p>
                            <?php if(empty($item['href'])):?>
                            <?php else:?>
                                <a href="<?=$item['href']?>" class="btn btn-md btn-custom w-25 mt-3 float-end">Detaylı Bilgi</a>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <div class="carousel-control">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </div>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <div class="carousel-control">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </div>
            </a>
        </div>
        <!--<div class="col-12">
            <h4 class="mb-3 mt-5 text-center text-dark fw-bold">Kampanyalı Uçuşlar</h4>
        </div>
        <div class="col-12 text-center">
            <a class="btn btn-custom mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-custom mb-3" href="#carouselExampleIndicators2" role="button" data-slide="next">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/balayi-otelleri.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">İstanbul - İzmir Uçuşu</h6>
                                        <p class="card-text text-center">Gidiş uçuşu %10 indirim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/doga-otelleri.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">İstanbul - Antalya Uçuşu</h6>
                                        <p class="card-text text-center">Gidiş uçuşu %30 indirim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/gap-turu.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">Aydın - Mardin Uçuşu</h6>
                                        <p class="card-text text-center">Dönüş uçuşu %10 indirim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/kapadokya-turu.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">Manisa - Ankara Uçuşu</h6>
                                        <p class="card-text text-center">Dönüş uçuşuna %25 indirim</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/sehir-otelleri.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">Ankara - Antalya Uçuşu</h6>
                                        <p class="card-text text-center">Gidiş uçuşu alan dönüş uçuşuna %50 indirim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/kibris-otelleri.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">Kıbrıs - İstanbul Uçuşu</h6>
                                        <p class="card-text text-center">Gidiş uçuşu alan dönüş uçuşuna %40 indirim</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/termal-oteller.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">İzmir - İstanbul Uçuşu</h6>
                                        <p class="card-text text-center">Bayram tatiline özel indirimli uçuş fiyatları</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/tum-kultur-turlari.png">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">İzmir - Antalya Uçuşu</h6>
                                        <p class="card-text text-center">Haftanın indirimli uçuşu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <!-- <div class="row">
         <div class="col-12">
             <h4 class="mb-3 mt-5 text-center text-dark fw-bold">Yurt İçi Popüler Uçuşlar</h4>
         </div>
         <div class="col-lg-3 col-md-6 mb-2 mb-lg-0 col-6 " id="imageContainer">
             <img
                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                     class="w-100 shadow-1-strong rounded mb-4" id="resim"
                     alt="Boat on Calm Water" style="height: 75%"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class="mb-0">İstanbul - Ankara</p>
                 <span>393 TL' den itibaren</span>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 mb-2 mb-lg-0 col-6 ">
             <img
                     src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Wintry Mountain Landscape" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class="mb-0">İzmir - İstanbul</p>
                 <span>443 TL' den itibaren</span>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 mb-2 mb-lg-0  col-6">
             <img
                     src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(55).jpg"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Boat on Calm Water" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class="mb-0">İstanbul - Trabzon</p>
                 <span>493 TL' den itibaren</span>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 mb-2 mb-lg-0 col-6">
             <img
                     src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Mountains in the Clouds" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class=" mb-0">İzmir - Adana</p>
                 <span>530 TL' den itibaren</span>
             </div>
         </div>
         <div class="col-12">
             <h4 class="mb-3 mt-5 text-center text-dark fw-bold">Yurt Dışı Popüler Uçuşlar</h4>
         </div>
         <div class="col-lg-3  mb-lg-0 col-6">
             <img
                     src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Yosemite National Park" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class=" mb-0">İstanbul - Roma</p>
             </div>
         </div>

         <div class="col-lg-3 col-md-6  mb-lg-0 col-6">
             <img
                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Waves at Sea" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class=" mb-0">İstanbul - Paris</p>
             </div>
         </div>
         <div class="col-lg-3 col-md-6  mb-lg-0 col-6">
             <img
                     src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Waves at Sea" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class=" mb-0">İstanbul - New York</p>
             </div>
         </div>
         <div class="col-lg-3 col-md-6   mb-lg-0 col-6">
             <img
                     src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg"
                     class="w-100 shadow-1-strong rounded mb-4"
                     alt="Waves at Sea" style="height: 75%;"
             />
             <div class="col-12 pop-text bold text-center">
                 <p class=" mb-0">İstanbul - Amsterdam</p>
             </div>
         </div>
     </div>-->
    <div class="row mb-3">
        <div class="col-12">
            <h3 class="mb-3 mt-5 text-center text-dark fw-bold">İş Ortaklarımız</h3>
        </div>
        <div class="col-12">
            <div class="slider">
                <div class="logoslide">
                    <a href="https://www.armada.com.tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo1.png" decoding="async" data-src="binance.png" alt="Armada" title="Armada"><noscript><img decoding="async" alt="Armada"></noscript></a>
                    <a href="https://www.b-labs.com.tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo2.png" decoding="async" data-src="binance.png" alt="Binance" title="b-labs"><noscript><img decoding="async" alt="b-labs"></noscript></a>
                    <a href="https://www.datamarket.com.tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo3.png" decoding="async" data-src="binance.png" alt="Binance" title="Datamarket"><noscript><img decoding="async" alt="Datamarket"></noscript></a>
                    <a href=""><img data-lazyloaded="1" src="public/img/gezinomi_images/ecumonsters.png" decoding="async" data-src="binance.png" alt="Binance" title="Ecumonster"><noscript><img decoding="async" alt="Ecumonster"></noscript></a>
                    <a href="https://www.fortinet.com/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo5.png" decoding="async" data-src="binance.png" alt="Binance" title="Fortınet"><noscript><img decoding="async" alt="Fortınet"></noscript></a>
                    <a href="https://www.index.com.tr/><img data-lazyloaded="1" src="public/img/gezinomi_images/logo6.png" decoding="async" data-src="binance.png" alt="Binance" title="Index"><noscript><img decoding="async" alt="Index"></noscript></a>
                    <a href="https://www.metunic.com.tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo7.png" decoding="async" data-src="binance.png" alt="Binance" title="Metunic"><noscript><img decoding="async" alt="Metunic"></noscript></a>
                    <a href="https://n2mobil.com.tr/Index"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo8.png" decoding="async" data-src="binance.png" alt="Binance" title="N2mobil"><noscript><img decoding="async" alt="N2mobil"></noscript></a>
                    <a href="https://www.natro.com/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo9.png" decoding="async" data-src="binance.png" alt="Binance" title="Natro"><noscript><img decoding="async" alt="Natro"></noscript></a>
                    <a href="https://www.netsmart.com.tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo10.png" decoding="async" data-src="binance.png" alt="Binance" title="Netsmart"><noscript><img decoding="async" alt="Netsmart"></noscript></a>
                    <a href="https://shop.mmea.trendmicro.com/tr_tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo11.png" decoding="async" data-src="binance.png" alt="Binance" title="Trendmıcro"><noscript><img decoding="async" alt="Trendmıcro"></noscript></a>
                    <a href="https://www.turboard.com/tr/><img data-lazyloaded="1" src="public/img/gezinomi_images/logo12.png" decoding="async" data-src="binance.png" alt="Binance" title="Turboard"><noscript><img decoding="async" alt="Turboard"></noscript></a>
                    <a href="https://genrpa.com/"><img data-lazyloaded="1" src="public/img/gezinomi_images/genrpa.png" decoding="async" data-src="binance.png" alt="Binance" title="GenRPA"><noscript><img decoding="async" alt="GenRPA"></noscript></a>
                    <a href=""><img data-lazyloaded="1" src="public/img/gezinomi_images/tazi.png" decoding="async" data-src="binance.png" alt="Binance" title="Tazı"><noscript><img decoding="async" alt="Tazı"></noscript></a>
                    <a href="https://www.arena.com.tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/arena.png" decoding="async" data-src="binance.png" alt="Binance" title="arena"><noscript><img decoding="async" alt="arena"></noscript></a>
                    <a href="https://www.qtech.com.tr/tr/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo16.png" decoding="async" data-src="binance.png" alt="Binance" title="QTECH"><noscript><img decoding="async" alt="QTECH"></noscript></a>
                    <a href="https://www.gezinomi.com/"><img data-lazyloaded="1" src="public/img/gezinomi_images/logo17.jpg" decoding="async" data-src="binance.png" alt="Binance" title="Gezinomi"><noscript><img decoding="async" alt="Gezinomi"></noscript></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'mainPage_statics/footer.php'; ?>

<script src="<?= public_url('js/gezinomi.js') ?>"></script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= @returned($message); ?>

<!--<script>-->
<!--    $('input[name="DepartureDay"]').change(function() {-->
<!--        var departureDay = new Date($(this).val());-->
<!--        var today = new Date();-->
<!---->
<!--        if (departureDay < today) {-->
<!--            alert('Geçmiş tarih seçemezsiniz.');-->
<!--            $(this).val(new Date().toISOString().substr(0, 10));-->
<!--        }-->
<!--    });-->
<!--</script>-->

<script>
    $('#tarihSecici').on('input', function() {
        if ($(this).val() !== '') {
            $('#flight-type-select').val('RT');
        }
    });

    $('#flight-type-select').on('change', function() {
        if ($(this).val() === 'RT') {
            $('#tarihSecici').prop('required', true);
            $('#tarihSecici').setCustomValidity(validateDate());
        } else {
            $('#tarihSecici').prop('required', false);
        }
    });

    function validateDate() {
        form = $('#myForm').get(0);
        if ($('#flight-type-select').val() === 'RT' && $('#tarihSecici').val() === '') {
            form.setCustomValidity("Tarih seçimi zorunlu");
            form.checkValidity() // false
            return "Tarih seçimi zorunlu";
        }
        form.setCustomValidity("");
    }

    $('#myForm').submit(function(event) {
        validateDate();
        if (!form.checkValidity()) {
            event.preventDefault();
            alert(validationError);
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
<!--<script>-->
<!--    $("#plane").click(function(e) {-->
<!--        if ($("#gidistarihi").val() == $("#tarihSecici").val()) {-->
<!--            $("#error").text("Aynı tarihte uçamazsınız  .").show();-->
<!---->
<!--            e.preventDefault();-->
<!--            return false;-->
<!--        } else {-->
<!--            $("#error").hide();-->
<!--        }-->
<!---->
<!--    })-->
<!--</script>-->
<script>
    function disableOption() {
        var selectElement = document.getElementById("city-select1");
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        var hiddenInput = document.getElementById("gidisyeri");


        hiddenInput.value = selectedOption;
    }
</script>
<script>
    function option() {
        var selectElement = document.getElementById("city-select2"); // dönüş için farklı select'e bağlı
        var selectedOption = selectElement.options[selectElement.selectedIndex].text;
        var hiddenInput = document.getElementById("donusyeri");

        hiddenInput.value = selectedOption;
    }
</script>
<script>

    window.addEventListener('load', fg_load)
    function fg_load() {

        document.getElementById('loading').style.display = 'none';

    }


</script>
<script>
    $("#acentefiyat").on("input", function() {
        this.value = this.value.replace(/[^\d]/g, "");
    });
</script>

<script>
    $(document).ready(function() {
        $('.acentefiyat').hide(); // Acente fiyatını başlangıçta gizle
        $('.plus').click(function() { // "plus" öğesi değiştirildiğinde
            $('.acentefiyat').toggle(); // Acente fiyatını göster
        });
    });
</script>