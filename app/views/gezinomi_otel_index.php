<?php require 'mainPage_statics/header.php'; ?>

<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat:200);
    .snip1577 {
        font-family: 'Montserrat', Arial, sans-serif;
        position: relative;
        display: inline-block;
        overflow: hidden;
        color: #fff;
        text-align: left;
        font-size: 16px;
        background: #000;
        font-weight: bolder !important;
    }

    .snip1577 *,
    .snip1577:before,
    .snip1577:after {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .snip1577 img {
        max-width: 100%;
        backface-visibility: hidden;
        vertical-align: top;
        opacity: 0.8;
    }

    .snip1577:before,
    .snip1577:after {
        position: absolute;
        top: 20px;
        right: 20px;
        content: '';
        background-color: #fff;
        z-index: 1;
        opacity: 1;
    }

    .snip1577:before {
        width: 0;
        height: 1px;
    }

    .snip1577:after {
        height: 0;
        width: 1px;
    }

    .snip1577 figcaption {
        position: absolute;
        left: 0;
        bottom: 0;
        padding: 15px 20px;
    }

    .snip1577 h3,
    .snip1577 h4 {
        margin: 0;
        font-size: 1.1em;
        font-weight: bolder;
        opacity: 1;
    }

    .snip1577 h4 {
        font-size: .8em;
        text-transform: uppercase;
    }

    .snip1577 a {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
    }

    .snip1577:hover img,
    .snip1577.hover img {
        zoom: 1;
        filter: alpha(opacity=20);
        -webkit-opacity: 0.2;
        opacity: 0.2;
    }

    .snip1577:hover:before,
    .snip1577.hover:before,
    .snip1577:hover:after,
    .snip1577.hover:after {

        -webkit-transition-delay: 0.25s;
        transition-delay: 0.25s;
    }

    .snip1577:hover:before,
    .snip1577.hover:before {
        width: 40px;
    }

    .snip1577:hover:after,
    .snip1577.hover:after {
        height: 40px;
    }

    .snip1577:hover h3,
    .snip1577.hover h3,
    .snip1577:hover h4,
    .snip1577.hover h4 {
        opacity: 1;
    }

    .snip1577:hover h3,
    .snip1577.hover h3 {
        -webkit-transition-delay: 0.3s;
        transition-delay: 0.3s;
    }

    .snip1577:hover h4,
    .snip1577.hover h4 {
        -webkit-transition-delay: 0.35s;
        transition-delay: 0.35s;
    }
    .container-fırsat {
        position: relative;
        width: 50%;
    }

    .image-fırsat {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay-fırsat {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: #008CBA;
    }

    .container-fırsat:hover .overlay-fırsat {
        opacity: 1;
    }

    .text-fırsat {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
    /*DEMO ONLY*/

    .service-categories {
        padding-top: 3em;
        padding-bottom: 3em;
        background-size: cover;
    }
    .text-xs-center {
        text-align: center!important;
    }

    /*DEMO ONLY*/

    .service-categories .card {
        transition: all 0.3s;
    }

    .service-categories .card-title {
        padding-top: 0.5em;
    }

    .service-categories a:hover {
        text-decoration: none;
    }

    .service-card {
        background: #ffffff;
        border: 0;
    }

    .service-card:hover {
        box-shadow: 2px 4px 8px 4px rgba(46, 61, 73, 0.2);
        border: 2px solid #6B15B6;
    }

    .tema-title{
        color: #979797;
    }

    .tema-title:hover{
        color: #6B15B6;
    }

    .icon {
        color: #979797;
    }

    .icon:hover{
        color: #6B15B6;
    }
</style>

<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <div class="breadcrumb small pt-5 pb-4">
        <div class="row w-100">
            <div class=" col-lg-6 col-sm-3 mt-2"></div>
            <div class=" col-lg-2 col-sm-3 mt-2">
                <a href="gezinomi_index"">
                <h6 class=" p-3 text-center btn-selection m-0"><i class="fa-solid fa-plane mr-1 text-custom"></i> <span class="fw-bolder">Uçak</span></h6>
                </a>
            </div>
            <div class="col-lg-2 col-sm-3 mt-2">
                <a href="gezinomi_otel_index">
                    <h6 class="p-3 text-center btn-selection btn-active m-0"><i class="fa-solid fa-hotel mr-1 text-custom"></i><span class="fw-bolder">Otel</span></h6>
                </a>
            </div>
            <div class="col-lg-2 col-sm-3 mt-2">
                <a href="rent_a_car_index">
                    <h6 class="p-3 text-center btn-selection m-0"><i class="fa-solid fa-car mr-1 text-custom"></i> <span class="fw-bolder">Araba</span></h6>
                </a>
            </div>
        </div>
    </div>
    <div  class="row pt-2 mb-5 animate__animated animate__fadeIn sticky-top">
        <div class="col-12 col-md-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bilet Satış</h6>
                </header>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label class="form-label text-custom mb-0"><strong>Otel Bul - Rezervasyon Sorgula</strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                </div>
                                <input type="text" name="" class="form-control" id="" value="" placeholder="Şehir, İlçe, Tema, Otel adı ara">
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label text-custom mb-0"><strong>Giriş Tarihi</strong></label>
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label text-custom mb-0"><strong>Çıkış Tarihi</strong></label>
                            <input class="form-control small" name="" id="sendbtn" type="date">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label text-custom mb-0"><strong>Konuk Sayısı</strong></label>
                            <button id="buttonpassangertype" type="button" class="form-control font-type text-left">
                                <div class="button-text">
                                    <span id="t-ekonomi">1</span> Yetişkin
                                    <span id="t-business">0</span> Çocuk
                                </div>
                                <i class="fas fa-user-friends user" style="position: absolute; right: 30px; top: 27px;"></i>
                            </button>
                            <div id="travellertype" class="d-none row m-0 mt-2 rounded shadow-lg" >
                                <div class="col-6 mt-2 text-md-center text-left col-md-12 col-lg-6 text-lg-left">
                                    <p class="font-type m-0">Yetişkin</p>
                                </div>
                                <div class="col-6 mt-2 text-right text-md-center ekonomi-container col-md-12 col-lg-6 text-lg-right">
                                    <button class="rounded-circle traveller-number ekonomi minus">
                                        <i class="fa fa-minus font-weight-bold" aria-hidden="true"></i>
                                    </button>
                                    <span id="value" class="h6">1</span>
                                    <button class="rounded-circle traveller-number ekonomi plus traveller-display">
                                        <i class="fa fa-plus font-weight-bold" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-6 mt-2 text-md-center text-left col-md-12 col-lg-6 text-lg-left">
                                    <p class="font-type m-0">Çocuk</p>
                                </div>
                                <div class="col-6 mt-2 text-right mb-2 business-container text-md-center col-md-12 col-lg-6 text-lg-right">
                                    <button class="rounded-circle traveller-number business minus">
                                        <i class="fa fa-minus font-weight-bold" aria-hidden="true"></i>
                                    </button>
                                    <span id="value" class="h6">0</span>
                                    <button class="rounded-circle traveller-number business plus traveller-display">
                                        <i class="fa fa-plus font-weight-bold" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="hotel" class="hotel btn btn-md btn-custom w-100 mt-3 ticket">Otel Bul</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="mb-3 mt-5 text-center"><i class="fa-regular fa-star"></i> Özel Fırsat Otelleri</h3>
            <hr>
        </div>
        <div class="col-sm-3 col-6">
            <figure class="snip1577">
                <img src="public/img/gezinomi_images/elegance-hotels-international-marmaris.jpg" alt="sample99" />
                <figcaption>
                    <h3>Son Dakika Fırsatları</h3>
                    <h4>Gezinomi'de tatil fırsatları bitmez!</h4>
                </figcaption>
                <a href="#"></a>
            </figure>
        </div>

        <div class="col-sm-3 col-6">
            <figure class="snip1577">
                <img src="public/img/gezinomi_images/acapulco-resort-convention-spa-hotel.jpg" alt="sample109" />
                <figcaption>
                    <h3>İki Çocuk Ücretsiz Oteller</h3>
                    <h4>Çocuklu ailelere özel tatil fırsatlarını inceleyin.</h4>
                </figcaption>
                <a href="#"></a>
            </figure>
        </div>

        <div class="col-sm-3 col-12">
            <figure class="snip1577">
                <img src="public/img/gezinomi_images/boyalik-beach-hotel-spa.jpg" alt="sample117" />
                <figcaption>
                    <h3>Bir Günü Ücretsiz Oteller</h3>
                    <h4>Daha az ödeyin, 1 gün daha fazla tatil yapın!</h4>
                </figcaption>
                <a href="#"></a>
            </figure>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-sm-3 col-6">
            <figure class="snip1577">
                <img src="public/img/gezinomi_images/d-resort-gocek.jpg" alt="sample117" />
                <figcaption>
                    <h3>İslami Oteller</h3>
                    <h4>Size sunulan ayrıcalıkları değerlendirebilirsiniz.</h4>
                </figcaption>
                <a href="#"></a>
            </figure>
        </div>

        <div class="col-sm-3 col-6">
            <figure class="snip1577">
                <img src="public/img/gezinomi_images/limak-limra-hotel.jpg" alt="sample117" />
                <figcaption>
                    <h3>Luxury Oteller</h3>
                    <h4>En konforlu tatili şimdi planlayabilirsiniz.</h4>
                </figcaption>
                <a href="#"></a>
            </figure>
        </div>

    </div>


    <section class="service-categories text-xs-center mt-5 mb-5">
        <div class="container">
            <div class="col-12">
                <h3 class="mb-3 mt-5 text-center">Temalarına Göre Oteller</h3>
                <hr>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4 col-6">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-regular fa-circle-check fa-3x icon fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></span>
                                <h6 class="card-title tema-title">Her Şey Dahil Oteller</h6>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-6">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-solid fa-heart-circle-check fa-3x icon fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></span>
                                <h6 class="card-title tema-title">Ultra Her Şey Dahil Oteller</h6>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-12">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-sharp fa-solid fa-people-roof fa-3x icon"></span>
                                <h6 class="card-title tema-title">Aile Otelleri</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 mt-4 col-6">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <i class="fa-solid fa-hotel fa-3x icon"></i>
                                <h6 class="card-title tema-title">Deluxe Otelleri</h6>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 mt-4 col-6">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-solid fa-tree-city fa-3x icon"></span>
                                <h6 class="card-title tema-title">Butik Oteller</h6>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 mt-4 col-12">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-solid fa-champagne-glasses fa-3x icon"></span>
                                <h6 class="card-title tema-title">Balayı Otelleri</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 mt-4 col-6">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-solid fa-water-ladder fa-3x icon"></span>
                                <h6 class="card-title tema-title">Aquaparklı Oteller</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mt-4 col-6">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-solid fa-house-chimney-crack fa-3x icon"></span>
                                <h6 class="card-title tema-title">Tatil Köyleri</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mt-4 col-12">
                    <a href="#">
                        <div class="card service-card card-inverse p-2 shadow-sm">
                            <div class="card-block">
                                <span class="fa-solid fa-house-tsunami fa-3x icon"></span>
                                <h6 class="card-title tema-title">Akdeniz Otelleri</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!--End Row-->

        </div>
    </section>


    <div class="row mt-5 mb-5">
        <div class="col-12">
            <h3 class="mb-3 mt-5 text-center">Yurt İçi Otellerimiz</h3>
            <hr>
        </div>
        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide1" data-ride="carousel1">
                <div class="carousel-inner1">
                    <div class="carousel-item1 active">
                        <div class="row justify-content-center">
                            <div class="col-sm-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/acapulco-resort-convention-spa-hotel.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Antalya Otelleri</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/altin-yunus-resort-thermal-hotel.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Muğla Otelleri</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 col-12">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/azka-hotel.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">İzmir Otelleri</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/boyalik-beach-hotel-spa.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Balıkesir Otelleri</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 col-6">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/concorde-luxury-resort-casino-cyprus.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Aydın Otelleri</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="public/img/gezinomi_images/d-resort-gocek.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Çanakkale Otelleri</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="<?= public_url('js/gezinomi.js') ?>"></script>
