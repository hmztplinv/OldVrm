<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
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

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Hesap</a>
                    <div class="dropdown-menu bg-custom">
                        <a href="<?= site_url('hesap_bakiyeleri') ?>" class="dropdown-item regular text-custom">Bakiye</a>
                        <a href="<?= site_url('hesap_hareketleri') ?>" class="dropdown-item regular text-custom">Hareket</a>
                        <a href="<?= site_url('odeme_islemleri') ?>" class="dropdown-item regular text-custom">Ödeme</a>
                        <a href="<?= site_url('pos') ?>" class="dropdown-item regular text-custom">POS</a>
                        <a href="<?= site_url('dbs') ?>" class="dropdown-item regular text-custom">DBS</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Kredi</a>
                    <div class="dropdown-menu bg-custom">
                        <a href="<?= site_url('kredim_cepte') ?>" class="dropdown-item regular text-custom">KredimCepte</a>
                        <a href="#" class="dropdown-item regular text-custom">Tedarik Zinciri Finansmanı</a>
                        <a href="<?= site_url('cek_iskontosu') ?>" class="dropdown-item regular text-custom">Çek İskontosu</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">İK</a>
                    <div class="dropdown-menu bg-custom">
                        <a href="<?= site_url('personel') ?>" class="dropdown-item regular text-custom">Personel</a>
                        <a href="#" class="dropdown-item regular text-custom">İzin</a>
                        <a href="#" class="dropdown-item regular text-custom">Fazla Mesai</a>
                        <a href="#" class="dropdown-item regular text-custom">Performans</a>
                        <a href="#" class="dropdown-item regular text-custom">Gelişim Akademisi</a>
                        <a href="#" class="dropdown-item regular text-custom">İşe Alım</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">İdari İşler</a>
                    <div class="dropdown-menu bg-custom">
                        <a href="#" class="dropdown-item regular text-custom">Satın Alma</a>
                        <a href="#" class="dropdown-item regular text-custom">Masraf</a>
                        <a href="#" class="dropdown-item regular text-custom">Seyahat</a>
                        <a href="#" class="dropdown-item regular text-custom">Envanter Yönetimi</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown">Bilgi Teknolojileri</a>
                    <div class="dropdown-menu bg-custom">
                        <a href="#" class="dropdown-item regular text-custom">Yardım Masası</a>
                        <a href="#" class="dropdown-item regular text-custom">Proje Yönetimi</a>
                        <a href="#" class="dropdown-item regular text-custom">İş Yönetimi</a>
                    </div>
                </div>
            </div>

            <div class="nav-item dropdown pe-2">
                <a href="#" class="nav-link dropdown-toggle text-light ms-3" data-bs-toggle="dropdown"><img src="<?= public_url('avatars/ermanpeker.jpg') ?>" class=" rounded-circle border" width="45" alt="Profil"/></a>
                <div class="dropdown-menu bg-custom">
                    <a href="#" class="dropdown-item regular text-custom">Profilim</a>
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