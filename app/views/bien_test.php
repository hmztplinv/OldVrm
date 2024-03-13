<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="google-site-verification" content="KHtDpQSXuFFRi4nt4Dgy4JAVjmplqMBL3kIulPCGZgY" />
    <title>Mutlu Müşteri | Mutlu Müşterilerin Buluşma Noktası</title>
    <meta name="description" content="Mutlu Müşterilerin Buluşma Noktası">
    <meta content="" name="keywords">
    <link href="<?= mutlu_public_url('img/favicon.png') ?>" rel="icon">
    <link href="<?= mutlu_public_url('img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="<?= mutlu_public_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= mutlu_public_url('vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= mutlu_public_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= mutlu_public_url('vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= mutlu_public_url('vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= mutlu_public_url('vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= mutlu_public_url('css/main.css') ?>" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
</head>
<!-- style içerisinden çıkarılan içerik overflow: hidden-->
<body style=" ">



<main id="main">


    <!-- ======= Get a Quote Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row g-3">

                <div class="col-lg-5 quote-bg" style="background-image: url(<?= mutlu_public_url('img/back-min.png') ?>);"></div>

                <div style="overflow-y:auto; " class="col-lg-7 php-email-form">
                    <div class="row">
                        <div style="overflow-y:auto; " class="col-md-6 mb-5">
                            <img style="width: 150px"  src="<?= public_url('img/qualogo1.png') ?>" alt="">
                        </div>

                    </div>

                    <form action="<?= site_url('bien_test') ?>"
                          method="post" enctype="multipart/form-data">
                        <h3>Mutlu Müşteri Hattı</h3>
                        <p>Aşağıdaki formu doldurarak her türlü sorununuzu bize iletebilirsiniz.</p>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input required type="text" name="name" class="form-control" placeholder="İsim" >
                            </div>

                            <div class="col-md-6">
                                <input required type="text" name="surname" class="form-control" placeholder="Soyisim" >
                            </div>

                            <div class="col-md-6">
                                <input required type="text" name="phone" class="form-control" maxlength="10" placeholder="Telefon Numarası" >
                                <small>*Numaranızı başında 0 olmadan giriniz.</small>
                            </div>
                            <div class="col-md-6">
                                <input required  type="text" name="email" class="form-control" placeholder="E-Posta Adresi" >
                            </div>

                            <div class="col-lg-12">
                                <h4>Sorun/Öneri Detayları</h4>
                            </div>

                            <div class="col-md-12">
                                <select class="form-control" name="category" id="complaint">
                                    <option selected disabled value="">Şikayet Tipi</option>
                                    <option value="Şikayet/Ürün">Şikayet/Ürün</option>
                                    <option value="Şikayet/Tedarik">Şikayet/Tedarik</option>
                                    <option value="Şikayet/Personel">Şikayet/Personel</option>
                                    <option value="Öneri">Öneri/Memnuniyet</option>
                                </select>
                            </div>
                            <div id="product"  class="col-md-12"  >
                                <select class="form-control selectpicker" data-live-search="true" name="producttype" id="categories">
                                    <option selected disabled value="" >Ürün Tipi</option>

                                        <option value="1">Seramik Karo</option>

                                </select>
                            </div>
                            <div id="sealer"   class="col-md-12" style="display: none">
                                <select class="form-control selectpicker" data-live-search="true" name="sealer" id="Sealer">
                                    <option selected disabled value="">Bayi Adı</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option data-tokens="<?= $city['plantAdress'] ?>" value="<?= $city['plantName'] ?>"><?= $city['plantName']."(".$city['plantProvince'].")" ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div id="productsize"   class="col-md-12" style="display: none">
                                <select style="transition: width 0.4s ease-in-out;" class="form-control selectpicker" data-live-search="true" name="productsize" id="productSize">
                                    <option selected disabled value="">Ürün Ebatları</option>

                                        <option value=" "> 60x120</option>
                                        <option value=" "> 20x120</option>
                                        <option value=" "> 60x60</option>

                                </select>    <!--word-wrap: normal !important;-->
                            </div>
                            <div id="productname"   class="col-md-12" style="display: none">
                                <select  class="form-control  selectpicker" data-live-search="true" name="productname" id="productName">
                                    <option selected disabled value="">Ürün Adı</option>
                                    <option value="60x120 Nervion Oro 7mm Full Lappato">60x120 Nervion Oro 7mm Full Lappato</option>
                                    <option value="60x120 Fluxo 7mm Mat">60x120 Fluxo 7mm Mat</option>
                                    <option value="60x120 Fluxo 7mm Full Lappato">60x120 Fluxo 7mm Full Lappato</option>
                                    <option value="60x120 Luz Sole 7mm Full Lappato">60x120 Luz Sole 7mm Full Lappato</option>
                                    <option value="60x120 Maya 7mm Full Lappato">60x120 Maya 7mm Full Lappato</option>
                                    <option value="60x120 Clara 7mm Full Lappato">60x120 Clara 7mm Full Lappato</option>
                                    <option value="60x120 Mila 7mm Full Lappato">60x120 Mila 7mm Full Lappato</option>
                                    <option value="60x120 Mercan 8.8mm Lappato">60x120 Mercan 8.8mm Lappato</option>
                                    <option value="60x120 Nordstone Ice 7mm Full Lappato">60x120 Nordstone Ice 7mm Full Lappato</option>
                                    <option value="60x120 Nordstone Ice 7mm Mat">60x120 Nordstone Ice 7mm Mat</option>
                                    <option value="60x120 Norden 7mm Mat">60x120 Norden 7mm Mat</option>
                                    <option value="60x120 Arme 7mm Mat">60x120 Arme 7mm Mat</option>
                                    <option value="60x60 Helen 7mm Parlak">60x60 Helen 7mm Parlak</option>
                                    <option value="60x60 Margot 7mm Parlak">60x60 Margot 7mm Parlak</option>
                                    <option value="60x60 Ravenna 7mm Parlak">60x60 Ravenna 7mm Parlak</option>
                                    <option value="60x60 Silvana 7mm Mat">60x60 Silvana 7mm Mat</option>
                                    <option value="60x60 Costalla 7mm Parlak">60x60 Costalla 7mm Parlak</option>
                                    <option value="60x60 Eifel 7mm Parlak">60x60 Eifel 7mm Parlak</option>
                                    <option value="60x60 Creed 7mm Parlak">60x60 Creed 7mm Parlak</option>
                                    <option value="60x60 Tiziana 7mm Parlak">60x60 Tiziana 7mm Parlak</option>
                                    <option value="60x120 Detroit 7mm Lappato">60x120 Detroit 7mm Lappato</option>
                                    <option value="60x120 Luzon 7mm Lappato">60x120 Luzon 7mm Lappato</option>
                                    <option value="60x120 Monte Light Ivory 7mm Full Lappato">60x120 Monte Light Ivory 7mm Full Lappato</option>
                                    <option value="20x120 Hardy Arce Mat">20x120 Hardy Arce Mat</option>
                                </select>
                            </div>
                            <div id="complainttype"   class="col-md-12" style="display: none">
                                <select  class="form-control  selectpicker" data-live-search="true" name="complainttype" id="complaintType">
                                    <option selected disabled value="">Şikayet Konusu</option>

                                        <option value=" ">Çatlak</option>
                                        <option value=" ">Ebat Farkı</option>
                                        <option value=" ">Kalınlık Farkı</option>


                                </select>
                            </div>
                            <div id="productquality"   class="col-md-12" style="display: none">
                                <select class="form-control" name="productquality" id="productQuality">
                                    <option disabled value="">Ürünün Kalitesi</option>
                                    <option selected value="1">1. Kalite</option>
                                    <option value="2">Endüstriyel</option>
                                </select>
                            </div>
                            <div id="productmetraj"  class="col-md-12" style="display: none">
                                <input type="text" name="metraj" class="form-control" placeholder="Ürün Metraj Bilgisi">
                                <small>*Sadece rakam bilgisi girebilirsiniz. Örnek metraj bilgisi: 10.8</small>

                            </div>

                            <div class="col-md-12"   id="proposal"  >
                                <div style="padding: 0; " class="col-md-12">
                                    <select class="form-control" name="propsection" id="propsection">
                                        <option selected disabled value="">İlgili Birim</option>
                                        <option value="">Pazarlama</option>
                                        <option value="">Satış</option>
                                        <option value="">Satış sonrası hizmetler</option>
                                        <option value="">Ürün</option>
                                        <option value="">Sevkiyat</option>
                                        <option value="">Üretim</option>
                                        <option value="">Doküman</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"   id="personal" style="display: none" >
                                <label for="">Olay Tarihi</label>
                                <div style="margin-bottom: 15px;padding:0" class="col-md-12">
                                    <input class="form-control" placeholder="" type="date" name="personaleventdate">
                                </div>
                                <label for="">Olay Saati</label>
                                <div style="margin-bottom: 15px;padding:0" class="col-md-12">
                                    <input class="form-control" placeholder="" type="time" name="personaleventtime">
                                </div>
                            </div>
                            <div id="detailCheck" class="col-md-12" >
                                <input id="detail" type="checkbox" value="1" name="detail">
                                <label for="detail">Detay eklemek istiyorum.</label>
                            </div>
                            <div class="col-md-12" id="detailform" style="display: none">
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <select class="form-control" name="productapply" id="apply">
                                        <option selected disabled value="">Ürünler uygulandı mı ?</option>
                                        <option value="full">Tamamı uygulandı</option>
                                        <option value="no">Uygulanmadı</option>
                                        <option value="part">Bir kısmı uygulandı</option>
                                    </select>
                                </div>

                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <select class="form-control" name="productboxdetail" >
                                        <option selected disabled value="">Ürünün kutu bilgileri var mı ?</option>
                                        <option value="1">Evet</option>
                                        <option value="0">Hayır</option>
                                    </select>
                                </div>
                                <label for="">Üretim Tarihi</label>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <input class="form-control" placeholder="" type="date" name="productiondate">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <input class="form-control" placeholder="Ebat kalibre numarası" type="text" name="productcalibre">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <input class="form-control" placeholder="Renk ton numarası" type="text" name="productcolornumber">
                                </div>
                                <label for="">Ürün Sevk Tarihi</label>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <input class="form-control" placeholder="" type="date" name="productshipmentdate">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <select class="form-control" name="productapplyques" >
                                        <option selected disabled value="">Uygulamada artan bütün seramik var mı ?</option>
                                        <option value="1">Evet</option>
                                        <option value="0">Hayır</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input style="height: 47px" id="files" class="form-control" multiple type="file" name="upload[]">
                                <small>*CTRL tuşuna basılı tutarak çoklu dosya yüklemesi yapabilirsiniz.</small>
                            </div>
                            <div class="col-md-12">
                                <textarea name="productdesc" class="form-control" placeholder="Şikayet açıklaması" id="" cols="20" rows="5"></textarea>
                            </div>
                            <div class="col-md-12">
                                <textarea name="address" class="form-control" placeholder="Açık Adresiniz" id="" cols="20" rows="1"></textarea>
                            </div>
                            <div class="col-md-12">
                                <input id="kvkk" type="checkbox" value="1" required name="kvkk">
                                <label for="kvkk"><a href="<?= site_url('kvkk') ?>">Kişisel verilerin korunması kanunu</a> hakkında bilgilendirmeyi okudum onaylıyorum.</label>

                            </div>
                            <div class="col-md-12">
                                <label class="d-none" for="bien"><a href="https://www.bienseramik.com.tr/">Sitemizi ziyaret edebilirsiniz</label>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                                <button id="send" name="submit" value="1" type="submit" >Şikayet Oluştur</button>
                            </div>
                        </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>
    </section><!-- End Get a Quote Section -->

</main>


<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="<?= mutlu_public_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= mutlu_public_url('vendor/purecounter/purecounter_vanilla.js') ?>"></script>
<script src="<?= mutlu_public_url('vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= mutlu_public_url('vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= mutlu_public_url('vendor/aos/aos.js') ?>"></script>
<!--  <script src="--><?//= public_url('vendor/php-email-form/validate.js') ?><!--"></script>-->
<script src="<?= mutlu_public_url('js/main.js') ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    <?php if (@$response['suc']): ?>
    swal("Başarılı","<?= $response['suc'] ?>","success").then(function () {
    });
    <?php endif; ?>
    <?php if (@$response['err']): ?>
    swal("Başarısız","<?= $response['err'] ?>","error").then(function () {
    });
    <?php endif; ?>
</script>
</body>
</html>

<style>
    .btn-light:not(:disabled):not(.disabled).active, .btn-light:not(:disabled):not(.disabled):active, .show>.btn-light.dropdown-toggle{
        color: #212529;
        background-color: #ffffff;
        border-color: #c5d6e6;
    }
    .btn-light{
        background-color: #ffffff;
        border-color: #bcd0e4;
    }
    .btn-light:hover{
        color: #212529;
        background-color: #ffffff;
        border-color: #c5d6e6;
    }
    .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover{
        color:	#515457
    }
    .bootstrap-select .dropdown-menu.inner {
        position: static;
        float: none;
        border: 0;
        padding: 0;
        margin: 0;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        max-height:150px;
        max-width: 100%!important;
    }
    .bootstrap-select .dropdown-menu{
        max-height: 431.275px;
        min-height: 170px;
        position: absolute;
        /* transform: translate3d(-96px, -216px, 0px); */
        top: 0px;
        left: 0px;
        will-change: transform;
        max-width: 100%;
        overflow-wrap: break-word;
    }

</style>
