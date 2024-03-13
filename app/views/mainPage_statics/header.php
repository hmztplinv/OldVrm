<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="disable-prompt-on-repost" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="QTech">
    <title>Verim | Akıllı İşletme Portalı</title>
    <link rel="shortcut icon" href="<?= public_url('img/favicon.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= public_url('css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/buttons.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/fontawesome6/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/boostrap-multiselect.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/main.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/flexslider.css') ?>">
    <link rel="stylesheet" href="<?= public_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= public_url('public/css/icomoonstyle.css') ?>">
    <link rel="stylesheet" href="<?= public_url('public/css/owl.carousel.min.css') ?>">
    <link href="<?= public_url('css/shCore.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= public_url('css/shThemeDefault.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= public_url('css/lightbox.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= public_url('css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/animate.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/slider.style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= public_url('css/bootstrap-multiselect.css') ?>" type="text/css">

    <style>
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


        .moon:hover {
            background-color: #6B15B6;
            color: white;
        }
        .sepet li:not(:first-child):hover{
            background-color: #6B15B6;
            color: white;
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



        /* 3d Secure başlangıç */
        .container-check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        .checkmark2 {
            position: absolute;
            top: 0;
            left: 0;
            height: 15px;
            width: 15px;
            background-color: #eee;
        }
        .container-check:hover input ~ .checkmark2 {
            background-color: #ccc;
        }
        .container-check input:checked ~ .checkmark2 {
            background-color: #6B15B6;
        }
        .checkmark2:after {
            content: "";
            position: absolute;
            display: none;
        }
        .container-check input:checked ~ .checkmark2:after {
            display: block;
        }
        .container-check .checkmark2:after {
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
        /* 3d secure bitiş */
    </style>
    <div id="loading">
        <img  src="<?= public_url('img/loader.gif') ?>" alt="Yükleniyor..." />
    </div>
</head>
<body style="background-color:#f7f7f7;">

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-custom2 regular">
    <div class="container-fluid">

        <a href="<?= site_url('hesap_bakiyeleri') ?>" class="navbar-brand"><img class="animate__animated animate__bounceInLeft" src="<?= public_url('img/logow.png')?>" width="150" alt="Verim">
        </a>

        <button type="button" class="navbar-toggler text-light" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span><i class="fas fa-bars" style="color:#fff"></i></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end animate__animated animate__bounceInRight" id="navbarCollapse">

            <div class="navbar-nav pe-5">

                <a href="<?= site_url('hesap_bakiyeleri') ?>" class="nav-item nav-link text-light ms-3">Anasayfa</a>
                <?php if (in_array(1,session('auth')['account'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Hesap</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['accountSub']['accountCurrency'] != 0 ? '<a  href="'. site_url("hesap_bakiyeleri").'" class="dropdown-item regular text-custom">Bakiye</a>' : '' ?>
                            <?= session('auth')['accountSub']['accountTX'] != 0 ? '<a  href="'. site_url("account_tx").'" class="dropdown-item regular text-custom">Hareket</a>' : '' ?>
                            <?= session('auth')['accountSub']['accountTX'] != 0 ? '<a  href="'. site_url("cash_position").'" class="dropdown-item regular text-custom">Nakit Durumu</a>' : '' ?>
                            <?= session('auth')['accountSub']['accountTransfer'] != 0 ? '<a    class="dropdown-item regular text-custom">Ödeme</a>' : '' ?>
                            <?= session('auth')['accountSub']['accountPos'] != 0 ? '<a   class="dropdown-item regular text-custom">POS</a>' : '' ?>
                            <?= session('auth')['accountSub']['accountDbs'] != 0 ? '<a   class="dropdown-item regular text-custom">DBS</a>' : '' ?>
                        </div>
                    </div>
                <?php endif;  if (in_array(1,session('auth')['credit'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Kredi</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['creditSub']['myCredit'] != 0 ? '<a   class="dropdown-item regular text-custom">KredimCepte</a>' : '' ?>
                            <?= session('auth')['creditSub']['creditSCF'] != 0 ? '<a  class="dropdown-item regular text-custom">Tedarik Zinciri Finansmanı</a>' : '' ?>
                            <?= session('auth')['creditSub']['creditRetail'] != 0 ? '<a   class="dropdown-item regular text-custom">Çek İskontosu</a>' : '' ?>
                        </div>
                    </div>
                <?php endif; if (in_array(1,session('auth')['sales'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Satış Yönetimi</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['salesSub']['salesOpportunities'] != 0 ? '<a  class="dropdown-item regular text-custom">Müşteri Kartonları</a>' : '' ?>
                            <?= session('auth')['salesSub']['customerCartons'] != 0 ? '<a  class="dropdown-item regular text-custom">Satış Fırsatları</a>' : '' ?>
                        </div>
                    </div>
                <?php endif; if (in_array(1,session('auth')['hr'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">İK</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['hrSub']['hrEmployeeManagement'] != 0 ? '<a  href="'.site_url("personel").'" class="dropdown-item regular text-custom">Personel</a>' : '' ?>
                            <?= session('auth')['hrSub']['hrEmployeePermission'] != 0 ? '<a   class="dropdown-item regular text-custom">İzin</a>' : '' ?>
                            <?= session('auth')['hrSub']['hrEmployeeShift'] != 0 ? '<a  href="'.site_url("overtime_manager").'" class="dropdown-item regular text-custom">Fazla Mesai</a>' : '' ?>
                            <?= session('auth')['hrSub']['hrEmployeePerformance'] != 0 ? '<a  class="dropdown-item regular text-custom">Performans</a>' : '' ?>
                            <?= session('auth')['hrSub']['hrEmployeeAcademia'] != 0 ? '<a class="dropdown-item regular text-custom">Gelişim Akademisi</a>' : '' ?>
                            <?= session('auth')['hrSub']['hrEmployeeRecruitment'] != 0 ? '<a class="dropdown-item regular text-custom">İşe Alım</a>' : '' ?>
                            <a href="<?= site_url("score_card") ?>" class="dropdown-item regular text-custom">Puantaj</a>
                            <a href="<?= site_url("payroll") ?>" class="dropdown-item regular text-custom">Bordro</a>
                            <a href="<?= site_url("permissions") ?>" class="dropdown-item regular text-custom">İzinler</a>
                            <a href="<?= site_url("incomplete_work") ?>" class="dropdown-item regular text-custom">Geç Gelme ve Erken Çıkış Bildirim</a>
                            <a href="<?= site_url("card_read") ?>" class="dropdown-item regular text-custom">Kart Okutmama Mazeret Formu</a>
                            <a href="<?= site_url("hourly_permission") ?>" class="dropdown-item regular text-custom">Saatlik İzin Formu</a>


                        </div>
                    </div>
                <?php endif; if (in_array(1,session('auth')['administrative'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">İdari İşler</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['administrativeSub']['administrativeBuy'] != 0 ? '<a class="dropdown-item regular text-custom">Satın Alma</a>' : '' ?>
                            <?= session('auth')['administrativeSub']['administrativeCost'] != 0 ? '<a  href="'.site_url("cost_manager").'" class="dropdown-item regular text-custom">Masraf</a>' : '' ?>
                            <?= session('auth')['administrativeSub']['administrativeTrip'] != 0 ? '<a class="dropdown-item regular text-custom">Seyahat</a>' : '' ?>
                            <?= session('auth')['administrativeSub']['administrativeInventory'] != 0 ? '<a  class="dropdown-item regular text-custom">Envanter Yönetimi</a>' : '' ?>
                        </div>
                    </div>
                <?php endif; if (in_array(1,session('auth')['it'])):

                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Bilgi Teknolojileri</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['itSub']['ITHelpDesk'] != 0 ? '<a  class="dropdown-item regular text-custom">Yardım Masası</a>' : '' ?>
                            <?= session('auth')['itSub']['ITProjectMan'] != 0 ? '<a  class="dropdown-item regular text-custom">Proje Yönetimi</a>' : '' ?>
                            <?= session('auth')['itSub']['ITWorkMan'] != 0 ? '<a  class="dropdown-item regular text-custom">İş Yönetimi</a>' : '' ?>
                        </div>
                    </div>
                <?php endif; if (in_array(1,session('auth')['travel'])): ?>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Seyahat</a>
                        <div class="dropdown-menu bg-custom">


                            <?= session('auth')['travelSub']['ticketSelection'] != 0 ? '<a href="'.site_url('gezinomi_index').'" class="dropdown-item regular text-custom">Uçak Bileti</a>' : '' ?>
                            <?= session('auth')['travelSub']['gezinomi_otel_index'] != 0 ? '<a href="gezinomi_otel_index" class="dropdown-item regular text-custom">Otel Rezervasyon</a>' : '' ?>
                            <?= session('auth')['travelSub']['rent_a_car_index'] != 0 ? '<a href="rent_a_car_index" class="dropdown-item regular text-custom">Araç Kiralama</a>' : '' ?>
                        </div>
                    </div>




                <?php endif; if (in_array(1,session('auth')['complaint'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Şikayet</a>
                        <div class="dropdown-menu bg-custom">
                            <?= session('auth')['complaintSub']['complaint'] != 0 ? '<a  href="'.site_url('complaint').'" class="dropdown-item regular text-custom">Şikayet Yönetimi</a>' : '' ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="nav-item dropdown pe-2">
                <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown"><img src="<?= public_url('avatars/empty.jpg') ?>" class=" rounded-circle border" width="45" alt="Profil"/></a>
                <div class="dropdown-menu bg-custom">
                    <a href="<?= site_url("profile") ?>" class="dropdown-item regular text-custom">Profilim</a>

                    <?= session('auth')['travelSub']['gezinomiIndex'] != 0 ? '<a href="ticket" class="dropdown-item regular text-custom">Biletler</a>' : '' ?>
                    <a href="<?= site_url('logout') ?>" class="dropdown-item regular text-custom">Oturumu Kapat</a>
                </div>
            </div>

        </div>

    </div>
</nav>
<style>
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
