<?php require 'mainPage_statics/header.php'; ?>
<style>
    .moon:hover{
        background-color: #6B15B6!important;
        color: white !important;
    }
    .sepet li:hover{
        background-color: #6B15B6!important;
        color: white !important;
    }
</style>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi Otel</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Ödeme</a>
        </li>
    </ol>

    <div class="row pt-2 p-3 mb-5">
        <header class="card-header d-md-flex align-items-center bg-custom2">
            <h6 class="card-header-title text-light mt-1">Ödeme Ekranı</h6>
        </header>
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span   class="text-dark pt-3">Sepetim</span>
                <span class="badge badge-pill" style="background-color: #6B15B6!important">3</span>
            </h4>
            <ul class="list-group mb-3 sepet">
                <li class="list-group-item d-flex justify-content-between lh-condensed text-white bg-custom2">
                    <div>
                        <h6 class="my-0"  >Naz Konak Alaçatı</h6>
                        <small><i class="fa-solid fa-location-dot"></i> İzmir / Çeşme / Alaçatı</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed border text-custom">
                    <div  >
                        <h6 class="my-0"  ><i class="fa-regular fa-calendar-days"></i> GİRİŞ TARİHİ</h6>
                        <small>17.02.2023 Cuma</small>
                    </div>
                    <div>
                        <small class="     "><i class="fa-solid fa-moon"></i> 8 Gece
                            9 Gün</small>
                    </div>
                    <div>
                        <h6 class="my-0"  ><i class="fa-regular fa-calendar-days"></i> ÇIKIŞ TARİHİ</h6>
                        <small>25.02.2023 Cumartesi</small>
                    </div>
                </li>


                <li class="list-group-item d-flex justify-content-between lh-condensed border">
                    <div>
                        <h6 class="my-0"  >1. Oda</h6>
                        <small>25.02.2023 Cumartesi</small>
                    </div>
                    <span>Oda + Kahvaltı</span>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed border">
                    <div>
                        <h6 class="my-0"  >Kişiler</h6>
                    </div>
                    <span>2 yetişkin</span>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed border">
                    <div>
                        <h6 class="my-0"  >Oda Tipi</h6>
                    </div>
                    <span>Deluxe Oda</span>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed border">
                    <div>
                        <h6 class="my-0"  >Konaklama</h6>
                    </div>
                    <span>8.000,00 TL</span>
                </li>


                <li class="list-group-item d-flex justify-content-between border">
                    <span class="fw-bold"  style="font-size: 17px;">Toplam Tutar</span>
                    <strong>8.000,00 TL</strong>
                </li>
            </ul>
            <div class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="İndirim Kodu">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-custom">Kullan</button>
                    </div>
                </div>
            </div>
            <hr class="mb-4 text-custom">
            <h4 class="justify-content-between align-items-center mb-3 d-md-flex">
                <span class="text-dark">Kredi Kartı Bilgileri</span>
            </h4>
            <div class="card-wrapper float-left d-md-block" style="width: 50px;height: 100px"></div>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-5 pt-3">Fatura Bilgileri</h4>
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3 col-6">
                        <label for="firstName" class="form-label text-custom fw-bold">Ad Soyad</label>
                        <input type="text" class="form-control" id="ad-soyad" required>
                        <div class="invalid-feedback">Ad Soyad alanı gerekli.</div>
                        <label for="address" class="form-label text-custom fw-bold">Adres</label>
                        <input type="text" class="form-control" id="adres" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">Adres alanı gerekli.</div>
                    </div>
                    <div class="col-md-6 mb-3 col-6">
                        <label for="lastName" class="form-label text-custom fw-bold">Telefon</label>
                        <input type="text" class="form-control" id="telefon" required>
                        <div class="invalid-feedback">Telefon alanı gerekli.</div>
                        <label for="email" class="form-label text-custom fw-bold">Email <span class="text-muted">(Opsiyonel)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3 col-6">
                        <label for="country" class="form-label text-custom fw-bold">İl</label>
                        <select class="custom-select d-block w-100" id="il" required>
                            <option value="">Seçiniz...</option>
                            <option value="1">İzmir</option>
                            <option value="2">İstanbul</option>
                            <option value="3">Ankara</option>
                        </select>
                        <div class="invalid-feedback">İl alanı gerekli.</div>
                    </div>
                    <div class="col-md-4 mb-3 col-6">
                        <label for="state" class="form-label text-custom fw-bold">İlçe</label>
                        <select class="custom-select d-block w-100" id="ilce" required>
                            <option value="">Seçiniz...</option>
                            <option value="1">Aliağa</option>
                            <option value="1">Balçova</option>
                            <option value="1">Bayındır</option>
                            <option value="1">Bayraklı</option>
                            <option value="1">Bergama</option>
                            <option value="1">Beydağ</option>
                            <option value="1">Bornova</option>
                            <option value="1">Buca</option>
                            <option value="1">Çeşme</option>
                            <option value="1">Çiğli</option>
                            <option value="1">Dikili</option>
                            <option value="1">Foça</option>
                            <option value="1">Gaziemir</option>
                            <option value="1">Güzelbahçe</option>
                            <option value="1">Karabağlar</option>
                            <option value="1">Karaburun</option>
                            <option value="1">Karşıyaka</option>
                            <option value="1">Kemalpaşa</option>
                            <option value="1">Kınık</option>
                            <option value="1">Kiraz</option>
                            <option value="1">Konak</option>
                            <option value="1">Menderes</option>
                            <option value="1">Menemen</option>
                            <option value="1">Narlıdere</option>
                            <option value="1">Ödemiş</option>
                            <option value="1">Seferihisar</option>
                            <option value="1">Selçuk</option>
                            <option value="1">Tire</option>
                            <option value="1">Torbalı</option>
                            <option value="1">Urla</option>

                            <option value="2">Adalar</option>
                            <option value="2">Arnavutköy</option>
                            <option value="2">Ataşehir</option>
                            <option value="2">Avcılar</option>
                            <option value="2">Bağcılar</option>
                            <option value="2">Bahçelievler</option>
                            <option value="2">Bakırköy</option>
                            <option value="2">Başakşehir</option>
                            <option value="2">Bayrampaşa</option>
                            <option value="2">Beşiktaş</option>
                            <option value="2">Beykoz</option>
                            <option value="2">Beylikdüzü</option>
                            <option value="2">Beyoğlu</option>
                            <option value="2">Büyükçekmece</option>
                            <option value="2">Çatalca</option>
                            <option value="2">Çekmeköy</option>
                            <option value="2">Esenler</option>
                            <option value="2">Esenyurt</option>
                            <option value="2">Eyüpsultan</option>
                            <option value="2">Fatih</option>
                            <option value="2">Gaziosmanpaşa</option>
                            <option value="2">Güngören</option>
                            <option value="2">Kadıköy</option>
                            <option value="2">Kağıthane</option>
                            <option value="2">Kartal</option>
                            <option value="2">Küçükçekmece</option>
                            <option value="2">Maltepe</option>
                            <option value="2">Pendik</option>
                            <option value="2">Sancaktepe</option>
                            <option value="2">Sarıyer</option>
                            <option value="2">Silivri</option>
                            <option value="2">Sultanbeyli</option>
                            <option value="2">Sultangazi</option>
                            <option value="2">Şile</option>
                            <option value="2">Şişli</option>
                            <option value="2">Tuzla</option>
                            <option value="2">Ümraniye</option>
                            <option value="2">Üsküdar</option>
                            <option value="2">Zeytinburnu</option>

                            <option value="3">Akyurt</option>
                            <option value="3">Altındağ</option>
                            <option value="3">Ayaş</option>
                            <option value="3">Balâ</option>
                            <option value="3">Beypazarı</option>
                            <option value="3">Çamlıdere</option>
                            <option value="3">Çankaya</option>
                            <option value="3">Çubuk</option>
                            <option value="3">Elmadağ</option>
                            <option value="3">Etimesgut</option>
                            <option value="3">Evren</option>
                            <option value="3">Gölbaşı</option>
                            <option value="3">Güdül</option>
                            <option value="3">Haymana</option>
                            <option value="3">Kahramankazan</option>
                            <option value="3">Kalecik</option>
                            <option value="3">Keçiören</option>
                            <option value="3">Kızılcahamam</option>
                            <option value="3">Mamak</option>
                            <option value="3">Nallıhan</option>
                            <option value="3">Polatlı</option>
                            <option value="3">Pursaklar</option>
                            <option value="3">Sincan</option>
                            <option value="3">Şereflikoçhisar</option>
                            <option value="3">Yenimahalle</option>
                        </select>
                        <div class="invalid-feedback">İlçe alanı gerekli.</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip" class="form-label text-custom fw-bold">Posta Kodu</label>
                        <input type="text" class="form-control" id="posta-kodu" placeholder="">
                    </div>
                </div>
                <hr class="mb-4 text-custom">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="aynı-adres" checked>
                    <label class="custom-control-label" for="aynı-adres">Gönderi adresi fatura adresimle aynı olsun</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="bilgiyi-kaydet">
                    <label class="custom-control-label" for="bilgiyi-kaydet">Bu bilgileri bir dahaki sefere sakla</label>
                </div>
                <hr class="mb-4 text-custom">
                <h4 class="mb-3">Ödeme Türü</h4>
                <div class="row">
                    <div class="pay-type kredi col-4 text-center text-custom mb-1">
                        <h6 class="border-active">Kredi Kartı</h6>
                    </div>
                    <div class="pay-type havale col-4 text-center text-custom mb-1">
                        <h6 class="border-type">Havale</h6>
                    </div>
                    <div class="pay-type cari col-4 text-center text-custom mb-1">
                        <h6 class="border-type">Cari</h6>
                    </div>
                </div>
                <div class="form-container active pay-type-container kredi">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Ad Soyad</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" maxlength="40" name="name" required>
                            <small class="text-muted">Kredi kartı üzerinde yazılan ad soyad</small>
                            <div class="invalid-feedback">Ad Soyad alanı gerekli.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Kredi Kartı Numarası</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" name="number" required>
                            <div class="invalid-feedback">Kredi Kartı Numarası alanı gerekli.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3 col-6">
                            <label for="cc-expiration">Son Kullanım Tarihi</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" name="expiry" required>
                            <small class="text-muted">AA/YY şeklinde</small>
                            <div class="invalid-feedback">Son Kullanım Tarihi alanı gerekli.</div>
                        </div>
                        <div class="col-md-3 mb-3 col-6">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" name="cvc" required>
                            <small class="text-muted">Kartın arkasındaki kod</small>
                            <div class="invalid-feedback">CVV alanı gerekli.</div>
                        </div>
                    </div>
                </div>
                <div class="row pay-type-container havale d-none">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Firma Adı</label>
                            <input type="text" class="form-control" placeholder="" maxlength="40" name="company-name" required>
                            <div class="invalid-feedback">Firma Adı alanı gerekli.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>IBAN Numarası</label>
                            <label class="form-control">TR00 0000 0000 0000 0000</label>
                            <div class="invalid-feedback">IBAN Numarası alanı gerekli.</div>
                        </div>
                    </div>
                </div>
                <div class="row pay-type-container cari d-none">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Firma Adı</label>
                            <input type="text" class="form-control" placeholder="" maxlength="40" name="company-name" required>
                            <div class="invalid-feedback">Firma Adı alanı gerekli.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Cari Numarası</label>
                            <input type="text" class="form-control" placeholder="" name="cari-number" required>
                            <div class="invalid-feedback">Cari Numarası alanı gerekli.</div>
                        </div>
                    </div>
                </div>

                <hr class="mb-4 text-custom">
                <button name="save" id="" class="btn btn-lg btn-block btn-custom" type="submit">Ödeme İşlemine Devam Et</button>
            </form>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/card/2.4.0/jquery.card.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/card/2.4.0/card.css">

    <script>
        var $il = $( '#il' ),
            $ilce = $( '#ilce' ),
            $options = $ilce.find( 'option' );

        $il.on( 'change', function() {
            $ilce.html( $options.filter( '[value="' + this.value + '"]' ) );
        } ).trigger( 'change' );
    </script>
    <script>
        $('.needs-validation').card({
            container: '.card-wrapper',
        });

        (function() {
            'use strict';

            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');

                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        $(document).ready(function(){
            $(".pay-type").click(function(e){
                $clas="."+$(this).attr('class').split(" ")[1];
                $(".pay-type-container").addClass("d-none");
                $($clas).removeClass("d-none");
                $(".pay-type >h6").removeClass("border-active").addClass("border-type");
                $($clas+">h6").removeClass("border-type").addClass("border-active");
            });
        });
    </script>
</div>

<?php require 'mainPage_statics/footer.php'; ?>
