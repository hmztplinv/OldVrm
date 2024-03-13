<?php require 'mainPage_statics/header.php'; ?>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Anasayfa</a>
        </li>
    </ol>
    <div  class="row pt-2 mb-3 animate__animated animate__fadeIn sticky-top">
        <div class="col-12 col-md-12">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bilet Satış</h6>
                </header>
                <div class="card-body">
                    <div class="row mt-3">

                        <div class="col-md-2 col-6">
                            <label class="form-label text-custom mb-0"><strong>Giriş Tarihi</strong></label>
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label text-custom mb-0"><strong>Çıkış Tarihi</strong></label>
                            <input class="form-control small" name="" id="sendbtn" type="date">
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label text-custom mb-0"><strong>Konaklama</strong></label>
                            <div class="input-group mb-2">
                                <div class="form-control">
                                    <span>4 Gece</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Konuk Sayısı</strong></label>
                            <button id="buttonpassangertype" type="button" class="form-control font-type text-left">
                                <div class="button-text">
                                    <span id="t-ekonomi">1</span> Standart
                                    <span id="t-business">0</span> Dublex
                                </div>
                                <i class="fas fa-user-friends user" style="position: absolute; right: 30px; top: 27px;"></i>
                            </button>
                            <div id="travellertype" class="d-none row m-0 mt-2 rounded shadow-lg" >
                                <div class="col-6 mt-2 text-md-center text-left col-md-12 col-lg-6 text-lg-left">
                                    <p class="font-type m-0">Standart</p>
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
                                    <p class="font-type m-0">Dublex</p>
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
                            <!--<a href="#" data-toggle="popover3" data-html="true"><button class="form-control font-type" style="text-align: left">1 Yolcu<span>&nbsp;/&nbsp;Ekonomi</span><i class='fas fa-user-friends user'></i></button></a>-->
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="" id="" class="hotel btn btn-md btn-custom w-100 mt-3 ticket">Otel Bul</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2"><h3>Oruçoğlu Termal Resort</h3></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="slider-hero">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(<?= public_url('img/deneme/slider-1.jpg') ?>);">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="work">

                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(<?= public_url('img/deneme/slider-2.jpg') ?>);">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(<?= public_url('img/deneme/slider-3.jpg') ?>);">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-5 text-center">
                    <ul class="thumbnail">
                        <li class="active img"><a href="#"><img src="<?= public_url('img/deneme/thumb-1.jpg') ?>" alt="Image" class="img-fluid"></a></li>
                        <li><a href="#"><img src="<?= public_url('img/deneme/thumb-2.jpg') ?>" alt="Image" class="img-fluid"></a></li>
                        <li><a href="#"><img src="<?= public_url('img/deneme/thumb-3.jpg') ?>" alt="Image" class="img-fluid"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card bg-white shadow-sm">
                <div class="row m-0">
                    <div class="col-md-4 mb-3 pr-0">
                        <h6 class="mt-3 fw-bold">Superior Oda</h6>
                        <div class="w-100 pr-3 b border-right">
                            <img src="<?= public_url('img/deneme/slider-3.jpg') ?>" class="img-fluid rounded" alt="" srcset="">
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 mt-md-5 p-0" >
                        <div class=" col-6 col-sm-12 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Balkon</div>
                        <div class=" col-6 col-sm-12 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Saç Kurutma Makinesi</div>
                        <div class=" col-6 col-sm-12 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Wireless İnternet</div>
                        <div class=" col-6 col-sm-12 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Mini Bar</div>
                        <div class=" col-6 col-sm-12 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Oda Kasası</div>
                        <div class=" col-6 col-sm-12 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Split Klima</div>
                        <div class=" col-6 col-sm-12 float-left mt-2"><i class="fa fa-bed" aria-hidden="true"></i> <b>Oda Kapasitesi:</b> En Fazla 3 Yetişkin veya 3 yetişkin + 1 çocuk</div>
                        <div class="col-12 otel-list float-left"><button type="submit" name="" id="" class="btn btn-sm btn-custom w-50  col mt-lg-2 mb-3 mt-2" data-toggle="modal" data-target="#modalRelatedContent">Detay</button></div>
                    </div>
                    <div class="col-sm-6 col-md-4 mt-md-4">
                        <div class="row pt-2 pb-2 bg-custom">
                            <div class="col-6 float-left" >
                                <p class="text-custom border-custom text-center rounded">Sadece Oda</p>
                                <p class="border-ligh text-center rounded">Tesiste Ödeme İmkanı</p>
                                <p class="text-dark">İptal Edilemez</p>
                            </div>
                            <div class="col-6 float-left text-right" >
                                <p class="text-dark mb-0"><strike>9.120 TL</strike></p>
                                <p class="text-custom mb-0 otel-list"> 3 gece <b>8.208 TL</b> </p>
                                <p class="text-dark mb-1">(gecelik 2.736 TL)</p>
                                <button class="hotel traveller-button room w-75 reservasion"> <i class='fas fa-door-open'></i> Odayı Seç</button>
                            </div>
                        </div>
                        <div class="row pt-2 pb-2 mt-1 bg-custom">
                            <div class="col-6 float-left" >
                                <p class="text-custom border-custom text-center rounded">Oda Kahvaltı</p>
                                <p class="border-ligh text-center rounded">Tesiste Ödeme İmkanı</p>
                                <p class="text-dark">İptal Edilemez</p>
                            </div>
                            <div class="col-6 float-left text-right" >
                                <p class="text-dark mb-0"> <strike>9.670 TL</strike></p>
                                <p class="text-custom mb-0 otel-list"> 3 gece <b>8.702 TL</b> </p>
                                <p class="text-dark mb-1">(gecelik  2.901 TL)</p>
                                <button class="traveller-button room w-75"> <i class='fas fa-door-open'></i> Odayı Seç</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-12">
            <div class="card h-100">
                <header class="card-header card-bg d-flex p-0">
                    <div class="col-4 text-center p-3 card-click otel card-active">
                        <h6 class="card-header-title text-custom mt-1 ">Otel Özellikleri</h6>
                    </div>
                    <div class="col-4 text-center p-3 card-click uyarı">
                        <h6 class="card-header-title text-custom mt-1">Önemli Bilgi</h6>
                    </div>
                    <div class="col-4 text-center p-3 card-click harita">
                        <h6 class="card-header-title text-custom mt-1">Konum Bilgisi</h6>
                    </div>
                </header>
                <div class="card-body">
                    <div class="row otel d-flex">
                        <div class="row m-0 p-0">
                            <div class="col-md-2 col-4"><p class="text-custom fw-bold ">Otel Özellikleri</p></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Kuru Temizleme </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Market </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Otopark</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Toplantı Salonu </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Çamaşırhane Hizmetleri </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Minibar</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Oda Sayısı</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Wireless İnternet</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>A’la Carte Restaurant</div>
                                </div>
                                <hr >
                            </div>

                            <div class="col-md-2 col-4"><p class="text-custom fw-bold ">Plaj ve Havuz Özellikleri</p></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>1 Adet Açık Havuz </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>3 Adet Kapalı Havuz </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Termal Havuz</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Aile Banyoları </div>
                                </div>
                                <hr >
                            </div>

                            <div class="col-md-2 col-4"><p class="text-custom fw-bold ">Aktiviteler</p></div>
                            <div class="col-md-10 col-12 ">
                                <div class="row">
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Basketbol </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Bilardo</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Canlı Müzik</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Dart</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Su Kaydırağı</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Masa Tenisi</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Oyun Salonu</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Voleybol</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>İnternet Cafe</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Soft Animasyon</div>
                                </div>
                                <hr >
                            </div>

                            <div class="col-md-2 col-4"><p class="text-custom fw-bold ">Çocuklar İçin</p></div>
                            <div class="col-md-10 col-12">
                                <div class="row">
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Bebek Bakımı </div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Çocuk Animasyonu</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>3 Adet Termal Çocuk Havuzu</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Çocuk Kulübü</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Çocuk Parkı</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Özel Çocuk Bakımı</div>
                                    <div class="col-6 col-sm-3"><i class="fa fa-check mr-2" aria-hidden="true"></i>Çocuk Oyun Alanı</div>
                                </div>
                                <hr >
                            </div>

                        </div>
                    </div>
                    <div class="row uyarı d-none">
                        <div class="col-12">
                            <h6 class="text-custom">Genel Uyarı !!!</h6>
                            <ul>
                                <li>Tesis odalarına giriş saati 14:00 ile başlar, odalardan çıkış saati ise en geç 12:00'dir.</li>
                                <li>Evcil hayvan kabul edilmemektedir.</li>
                                <li>Taze sıkılmış meyve suları, Türk kahvesi ve import içecekler ücretlidir.</li>
                                <li>Tesiste hizmet veren açık alanların kullanımı mevsim koşullarına bağlıdır.</li>
                                <li>Yaz boyunca soft animasyon hizmeti bulunmaktadır.</li>
                                <li>Tesisin fizik tedavi merkezi tadilat nedeni ile kısa süreli hizmet vermeyecektir.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row harita d-none">
                        <div class="col-md-6">
                            <h6 class="text-custom mb-3 ">Dörtyol Mh. Ömer Cd. No:1-1A Merkez/Afyonkarahisar</h6>
                            <div class="col-12 p-0"><p class="text-custom fw-bold ">Hava Alanına Uzaklığı</p></div>
                            <div class="col-12 p-0"><p class="text-dark">37 km Zafer Havalimanı</p></div>
                            <div class="col-12 p-0"><p class="text-custom fw-bold">Şehir Merkezine Uzaklığı</p></div>
                            <div class="col-12 p-0"><p class="text-dark">14 km Afyonkarahisar</p></div>
                            <div class="col-12 p-0"><p class="text-custom fw-bold">Kurulu Alan</p></div>
                            <div class="col-12 p-0"><p class="text-dark">110000 M2</p></div>
                        </div>
                        <div class="col-md-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3107.7966777885435!2d30.42741581559958!3d38.83711705809957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cf249b0e1613a5%3A0xf9901dc9951c5c60!2sOru%C3%A7o%C4%9Flu%20Termal%20Otel!5e0!3m2!1str!2str!4v1676284876421!5m2!1str!2str" class="w-100" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<!--Modal: modalRelatedContent-->
<div class="modal fade right pt-5" id="modalRelatedContent" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info mt-5" role="document">
        <!--Content-->
        <div class="modal-content bg-transparent">
            <!--Header-->
            <div class="modal-header bg-custom2 text-light p-2">
                <p class="h6 mb-0 mt-1">Related article</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body bg-white">

                <div class="row">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?=public_url('img/deneme/slider-1.jpg')?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?=public_url('img/deneme/slider-2.jpg')?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?=public_url('img/deneme/slider-3.jpg')?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12"><i class="fa fa-bed" aria-hidden="true"></i> <b>Oda Kapasitesi:</b> En Fazla 3 Yetişkin veya 3 yetişkin + 1 çocuk</div>
                    <div class=" col-6 col-sm-4 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Balkon</div>
                    <div class=" col-6 col-sm-4 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Saç Kurutma Makinesi</div>
                    <div class=" col-6 col-sm-4 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Wireless İnternet</div>
                    <div class=" col-6 col-sm-4 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Mini Bar</div>
                    <div class=" col-6 col-sm-4 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Oda Kasası</div>
                    <div class=" col-6 col-sm-4 otel-list float-left"><i class="fa fa-check-square mr-2 text-custom"></i>Split Klima</div>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalRelatedContent-->
<?php require 'mainPage_statics/footer.php'; ?>
<script src="<?= public_url('js/jquery.min.js') ?>"></script>
<script src="<?= public_url('js/popper.js') ?>"></script>
<script src="<?= public_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= public_url('js/owl.carousel.min.js') ?>"></script>
<script src="<?= public_url('js/main.js') ?>"></script>
<script src="<?= public_url('js/gezinomi.js') ?>"></script>
