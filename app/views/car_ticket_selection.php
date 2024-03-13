<?php require 'mainPage_statics/header.php'; ?>

<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Rent A Car</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Rent A Car Seçim</a>
        </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header bg-custom2">
                    <h6 class="card-header-title text-light mt-1">İstanbul, İstanbul Havalimanı (IST) - İzmir, İzmir Adnan Menderes Havalimannı (ABD) | 24 Ocak 10.00 - 27 Ocak 10.00  </h6>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-6 col-md-3">
                            <label class="form-label text-custom mb-0"><strong>Teslim Alış Yeri</strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                </div>
                                <input type="text" name="" class="form-control" id="" value="" placeholder="İstanbul Havalimanı(IST)">
                            </div>
                            <div class="">
                                <label class="form-label text-custom mb-0"><strong>Teslim Ediş Yeri</strong></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                    </div>
                                    <input type="text" name="" class="form-control" id="" value="" placeholder="İzmir Adnan Menderes Havalimanı (ABD)">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Teslim Alış Tarihi</strong></label>
                            <input class="form-control small mb-2" name="" id="" type="date">
                            <div class="">
                                <label class="form-label text-custom mb-0"><strong>Teslim Alış Saati</strong></label>
                                <input class="form-control small" name="" id="" type="time">
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Teslim Ediş Tarihi</strong></label>
                            <input class="form-control small mb-2" name="" id="sendbtn" type="date">
                            <div class="">
                                <label class="form-label text-custom mb-0"><strong>Teslim Ediş Saati</strong></label>
                                <input class="form-control small" name="" id="" type="time">
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <button type="submit" name="" id="" class=" text-center mt-3 btn btn-lg btn-custom w-100 mt-5">Araç Bul<i class="fa-solid fa-arrow-right ms-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-0 mt-3">
        <div class="col-8">
            <h3>Araçlar</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3 p-2">Önerilen<i class="fa-solid fa-filter ms-1"></i></button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">Fiyata Göre Artan<i class="fa-solid fa-arrow-up ms-1"></i></button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3  p-2">Fiyata Göre Azalan<i class="fa-solid fa-arrow-down ms-1"></i></button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3 p-2">Kilometre Aralığı<i class="fas fa-tachometer-alt ms-1"></i></button>
        </div>
    </div>


    <div class="row mt-4">

        <div class="col-md-4 order-md-2 mb-4 d-none d-sm-block">
            <div class="accordion fılter" id="accordionExample">
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class=""></i>Fiyat Aralığı
                        </button>
                    </h6>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <p>Maksimum fiyat: <output id="rangevalue">70</output> TL</p>
                                    <input class="selection-range" type="range" value="70" min="0" max="100" oninput="rangevalue.value=value"/>
                                </div>
                            </div>
                        </div>
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

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingone">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                            <i class="me-1 text-secondary"></i>Vites
                        </button>
                    </h6>

                    <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Otomatik</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Manuel</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingfive">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            <i class="me-1 text-secondary"></i>Lorem, ipsum.
                        </button>
                    </h6>
                    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingsix">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                            <i class="me-1 text-secondary"></i>Lorem, ipsum.
                        </button>
                    </h6>
                    <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingseven">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                            <i class="me-1 text-secondary"></i>Lorem, ipsum.
                        </button>
                    </h6>
                    <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Lorem.</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-12">
            <div class="card bg-white p-2  shadow-sm ">
                <div class="row">
                    <div class="col-md-6  col-12">
                        <img src="public/img/gezinomi_images/fiat-egea-sedan.png" class="img-fluid" width="400" height="500" alt="" srcset="">
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-car me-1"></i>Renault Clio</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fas fa-gas-pump me-1"></i>Benzin</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-gear me-1"></i></i>Manuel</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-users me-1"></i>5 Kişilik</p>
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-solid fa-wallet me-1"></i>Depozito</p>

                    </div>
                    <div class="col-md-3 col-6">
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-money-check me-1"></i>3 Gün Toplam: 960 TL</p>
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-money-check me-1"></i>Günlük Fiyat: 320 TL</p>
                        <p class="pt-3 text-left font-weight-bold text-success"><i class="fa-sharp fa-solid fa-check me-1"></i>Ücretsiz İptal</p>
                        <button type="submit" name="" class="car mt-4 btn btn-md btn-custom btn_selected reservasion">Kirala<i class="fa-solid fa-arrow-right ms-1"></i></button>
                    </div>
                </div>
            </div>
            <div class=" mt-4 card bg-white p-2 shadow-sm ">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img src="public/img/gezinomi_images/fiat-egea-sedan.png" class="img-fluid" width="400" height="500" alt="" srcset="">
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-car me-1"></i>Renault Clio</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fas fa-gas-pump me-1"></i>Benzin</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-gear me-1 "></i></i>Manuel</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-users me-1"></i>5 Kişilik</p>
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-solid fa-wallet me-1"></i>Depozito</p>

                    </div>
                    <div class="col-md-3 col-6">
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-money-check me-1"></i>3 Gün Toplam: 960 TL</p>
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-money-check me-1"></i>Günlük Fiyat: 320 TL</p>
                        <p class="pt-3 text-left font-weight-bold text-success"><i class="fa-sharp fa-solid fa-check me-1 "></i>Ücretsiz İptal</p>
                        <button type="submit" name="" id="" class=" mt-4 btn btn-md btn-custom btn_selected">Kirala<i class="fa-solid fa-arrow-right ms-1"></i></button>
                    </div>
                </div>
            </div>
            <div class=" mt-4 card bg-white p-2 shadow-sm ">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img src="public/img/gezinomi_images/fiat-egea-sedan.png" class="img-fluid" width="400" height="500" alt="" srcset="">
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-car me-1"></i>Renault Clio</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fas fa-gas-pump me-1"></i>Benzin</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-gear me-1"></i></i>Manuel</p>
                        <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-users me-1"></i>5 Kişilik</p>
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-solid fa-wallet me-1"></i>Depozito</p>

                    </div>
                    <div class="col-md-3 col-6">
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-money-check me-1"></i>3 Gün Toplam: 960 TL</p>
                        <p class="pt-3 text-left font-weight-bold text-dark"><i class="fa-sharp fa-solid fa-money-check me-1"></i>Günlük Fiyat: 320 TL</p>
                        <p class="pt-3 text-left font-weight-bold text-success"><i class="fa-sharp fa-solid fa-check me-1 "></i>Ücretsiz İptal</p>
                        <button type="submit" name="" id="" class=" mt-4 btn btn-md btn-custom btn_selected">Kirala<i class="fa-solid fa-arrow-right ms-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <h3 class="mb-3 mt-5 text-center">İş Ortaklarımız</h3>
        </div>
        <div class="col-12">
            <div class="slider">
                <div class="logoslide">
                    <img data-lazyloaded="1" src="img/gezinomi_images/logo1.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo2.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo3.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo4.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo5.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo6.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo7.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo8.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo9.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo10.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo11.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo12.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo13.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo14.jpg" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo15.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo16.png" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                    <img data-lazyloaded="1" src="public/img/gezinomi_images/logo17.jpg" decoding="async" data-src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"><noscript><img decoding="async" src="binance.png" alt="Binance" title="Css Carousel Logo Slider Efekti 1"></noscript>
                </div>

            </div>
        </div>

    </div>
</div>

<?php require 'mainPage_statics/footer.php'; ?>
