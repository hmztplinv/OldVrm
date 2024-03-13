
<?php require 'mainPage_statics/header.php'; ?>
<style>
    .popup, .wireless {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .popup .popuptext, .wireless .wirelesstext {
        visibility: hidden;
        width: 160px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
    }

    .popup .popuptext::after, .wireless .wirelesstext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .popup .show, .wireless .show2 {
        visibility: visible;
    }

    .popup .hidden, .wireless .hidden2 {
        visibility: hidden;
    }

</style>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi Otel</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Otel Seçim</a>
        </li>
    </ol>

    <div class="row pt-2 mb-5 animate__animated animate__fadeIn sticky-top" >
        <div class="col-12">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Otel Seçim</h6>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-12">
                            <label class="form-label text-custom mb-0"><strong>Şehir, İlçe, Otel Adı Ara</strong></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" name="" class="form-control" id="" value="" placeholder="Şehir, İlçe, Otel Adı">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-6">
                            <label class="form-label text-custom mb-0"><strong>Giriş Tarihi</strong></label>
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-lg-2 col-md-6 col-6">
                            <label class="form-label text-custom mb-0"><strong>Çıkış Tarihi</strong></label>
                            <input class="form-control small" name="" id="sendbtn" type="date">
                        </div>
                        <div class="col-lg-2 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
                            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3 ">Yeniden Ara</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-0 mt-5">
        <div class="col-12">
            <h3>Antalya Otelleri</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">Fiyat Artan </button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">Fiyat Azalan</button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">İlgiye Göre</button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">Puan Azalan</button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">Merkeze Yakınlık</button>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100 mt-3">Haritada Göster</button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 order-md-2 mb-4  d-sm-block">
            <div class="accordion fılter" id="accordionExample">
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingone">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                            <i class="fa-sharp fa-solid fa-flag me-1 text-secondary"></i>Bölge
                        </button>
                    </h6>
                    <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Kaş</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Alanya</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Kemer</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Manavgat</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Muratpaşa</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Konyaaltı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Kumluca</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Serik</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Antalya Merkez</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa-sharp fa-solid fa-bed me-1 text-secondary"></i>Toplam Oda Fiyatı
                        </button>
                    </h6>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <p>Maksimum fiyat: <output id="rangevalue">300</output> TL</p>
                                    <input class="selection-range" type="range" value="300" min="0" max="5000" oninput="rangevalue.value=value"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapsefive">
                            <i class="fa-solid fa-hotel me-1 text-secondary"></i>Otel Tipi
                        </button>
                    </h6>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby=""headingFour"" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Alkolsuz Her Şey Dahil</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Basit Kahvaltı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Ultra Her Şey Dahil</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Tam Pansiyon</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Yarım Pansiyon</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Oda Kahvaltı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Sadece Oda</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapsesix">
                            <i class="fa-solid fa-star me-1 text-secondary"></i>Konuk Değerlendirmesi</button>
                    </h6>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Mükemmel (9 ve üzeri)</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Çok İyi (8 ve üzeri)</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>İyi (7 ve üzeri)</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Keyifli (6 ve üzeri)</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseseven">
                            <i class="fa-solid fa-suitcase-rolling me-1 text-secondary"></i>Rezervasyon Koşulları
                        </button>
                    </h6>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Ücretsiz İptal</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapsesix">
                            <i class="fa-solid fa-plane-departure me-1 text-secondary"></i> Tema
                        </button>
                    </h6>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Bayram Oteli</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Havuz</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Konferans</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Aile Oteli</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Alkolsüz</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Aquapark</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Balayı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Bebek Dostu</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Butik</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Çevreye Duyarlı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Çocuklu Aile</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Denize Sıfır</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Ekonomik </strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Engelli Dostu</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Evcil Hayvan Dostu</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>İslami</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Konsept</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Kum Plajı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Mavi Bayraklı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Resort</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Spa</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Yetişkin Oteli</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Bungalov</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapsesix">
                            <i class="fa-solid fa-gears me-1 text-secondary"></i>Özellikler
                        </button>
                    </h6>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Spa Merkezi</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Wi-Fi</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Plaj</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Engelli Odaları</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Şehir Merkezine Uzaklık</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Su Kaydırağı</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Açık Havuz</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Kapalı Havuz</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>Spor Salonu</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapsesix">
                            <i class="fa-solid fa-location-dot me-1 text-secondary"></i>En Yakın Merkeze Uzaklığı
                        </button>
                    </h6>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col">
                                    <input  id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>1 km ve daha az</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>3 km ve daha az</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input id="" name="" type="checkbox">
                                    <label class="form-label text-custom"><strong>5 km ve daha az</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>





        <div class="col-md-8 col-12">
            <div class="card bg-white text-center  shadow-sm ">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <img src="../../public/img/gezinomi_images/grand-park-lara-antalya-39098322.jpg" class="img-fluid" width="400" height="500" alt="" srcset="">
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mt-5 text-left font-weight-bold text-dark">Oruçoğlu Termal Resort</p>
                        <p class="text-left font-weight-bold text-dark"><i class="fa-solid fa-location-crosshairs me-1"></i>Afyon / Merkez</p>
                        <p class="text-left font-weight-bold text-dark"><i class="fa-solid fa-martini-glass me-1"></i>Yarım Pansiyon</p>

                        <p class=" mt-2 fa-stack float-left popup" onmouseover="mouseOver()" onmouseout="mouseOut()">
                            <span class="popuptext" id="myPopup">Bebek Bakımı</span>
                            <i class="fa-regular fa-circle fa-stack-2x" ></i>
                            <i class="fa-solid fa-baby-carriage fa-stack-1x"></i>
                        </p>

                        <p class=" mt-2 fa-stack float-left wireless" onmouseover="wirelessOver()" onmouseout="wirelessOut()">
                            <span class="wirelesstext" id="myPopup2">Wireless</span>
                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-wifi fa-stack-1x"></i>
                        </p>
                        <p class=" mt-2 fa-stack float-left">
                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-water-ladder fa-stack-1x"></i>
                        </p>
                        <p class=" mt-2 fa-stack float-left">
                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-seedling fa-stack-1x"></i>
                        </p>
                        <p class=" mt-2 fa-stack float-left">
                            <i class="fa-regular fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-spa fa-stack-1x"></i>
                        </p>
<script>
                            // When the user clicks on div, open the popup
                            function myFunction() {
                                var popup = document.getElementById("myPopup");
                                popup.classList.toggle("show");
                            }
                        </script>

                    </div>
                    <div class="col-md-3 col-6">
                       <p class="mt-5 text-center font-weight-bold   border p-1" style="color: #6b15b6" >1 Gece Toplam Tutar</p>
                        <p class="text-center font-weight-bold text-dark">1978 TL</p>
                        <p class="text-center font-weight-bold text-dark">Puan: 10,0</p>
                        <button type="submit" name="" id="" class="btn btn-sm btn-custom btn_selected detail">SEÇ<i class="fa-solid fa-arrow-right"></i></button>
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
<script>
    function mouseOver() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }

    function mouseOut() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("hidden");
    }
</script>

<script>
    function wirelessOver() {
        var wireless = document.getElementById("myPopup2");
        wireless.classList.toggle("show2");
    }

    function wirelessOut() {
        var wireless = document.getElementById("myPopup2");
        wireless.classList.toggle("hidden2");
    }
</script>
<script src="<?= public_url('js/gezinomi.js') ?>"></script>
