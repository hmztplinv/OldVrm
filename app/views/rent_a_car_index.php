<?php require 'mainPage_statics/header.php'; ?>
<style>
    #wrapper {
        width: 100%;
        max-width: 1300px;
        position: relative;
    }

    #carousel {
        overflow: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
    }

    #carousel::-webkit-scrollbar {
        height: 0;
    }

    #prev,
    #next {
        display: flex;
        justify-content: center;
        align-content: center;
        background: white;
        border: none;
        padding: 8px;
        border-radius: 50%;
        outline: 0;
        cursor: pointer;
        position: absolute;
    }

    #prev {
        top: 50%;
        left: 0;
        transform: translate(50%, -50%);
        display: none;
    }

    #next {
        top: 50%;
        right: 0;
        transform: translate(-50%, -50%);
    }

    #content {
        display: grid;
        grid-gap: 16px;
        grid-auto-flow: column;
        margin: auto;
        box-sizing: border-box;
    }

    .item {
        width: 180px;
        height: 180px;
        background: rgb(255, 255, 255);
    }

    .card-popular {
        height: 250px;
        text-shadow: 0 1px 3px rgba(0,0,0,0.6);
        background-size: cover !important;
        color: white;
        position: relative;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .card-category {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 20px;
    }
    .card-description {
        position: absolute;
        bottom: 10px;
        left: 10px;
    }
    .card-description h2 {
        font-size: 22px;
    }
    .card-description p {
        font-size: 15px;
    }
    .card-link {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
        z-index:2;
        background: black;
        opacity: 0;
    }
    .card-link:hover{
        opacity: 0.1;
    }
    .features img {
        width: 100px;
    }
    .features h2 {
        font-size: 20px;
        margin-bottom: 10px;
    }
    .features p {
        font-size: 15px;
        font-weight: lighter;
    }
    a:hover,a:focus{
        text-decoration: none;
        outline: none;
    }
    @media only screen and (max-width: 479px){
    .accordion-header{
        color: #fff;
        background: #202d3c !important;
    }
</style>
    <div class="container-lg bg-light pt-5  small animate__animated animate__fadeIn">
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
                        <h6 class="p-3 text-center btn-selection m-0"><i class="fa-solid fa-hotel mr-1 text-custom"></i><span class="fw-bolder">Otel</span></h6>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-3 mt-2">
                    <a href="rent_a_car_index">
                        <h6 class="p-3 text-center btn-selection btn-active m-0"><i class="fa-solid fa-car mr-1 text-custom"></i> <span class="fw-bolder">Araba</span></h6>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-md-12">
                <div class="card h-100">

                    <header class="card-header card-bg d-flex p-0">
                        <div class="col-4 text-center p-3 card-click kirala card-active">
                            <h6 class="card-header-title text-custom mt-1 ">Araç Kiralama</h6>
                        </div>
                        <div class="col-4 text-center p-3 card-click sorgula">
                            <h6 class="card-header-title text-custom mt-1">Rezervasyon Sorgula</h6>
                        </div>
                        <div class="col-4 text-center p-3 card-click iptal">
                            <h6 class="card-header-title text-custom mt-1">Rezervasyon İptal</h6>
                        </div>
                    </header>
                    <div class="card-body">
                        <div class="row kirala d-flex">
                            <div class="row m-0">
                                <div class="col-md-3 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Teslim Alış Yeri</strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="" class="form-control" id="" value="" placeholder="Şehir veya Havalimanı Yazın">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Teslim Ediş Yeri</strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="" class="form-control" id="" value="" placeholder="Şehir veya Havalimanı Yazın">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Teslim Alış Tarihi</strong></label>
                                    <input class="form-control small" name="" id="" type="date">
                                </div>
                                <div class="col-md-3 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Teslim Ediş Tarihi</strong></label>
                                    <input class="form-control small" name="" id="sendbtn" type="date">
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-md-3 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Teslim Alış Saati</strong></label>
                                    <input class="form-control small" name="" id="sendbtn" type="time">
                                </div>
                                <div class="col-md-3 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Teslim Ediş Saati</strong></label>
                                    <input class="form-control small" name="" id="sendbtn" type="time">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="plane" id="plane" class="btn btn-md btn-custom w-100 mt-3 ticket">Araç Bul</button>
                                </div>
                            </div>
                        </div>
                        <div class="row sorgula d-none">
                            <div class="row m-0">
                                <div class="col-md-5">
                                    <label class="form-label text-custom mb-0"><strong>Rezervasyon Kodu</strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class='fas fa-shield-alt'></i>
                                            </span>
                                        </div>
                                        <input type="text" name="" class="form-control" id="" value="" placeholder="Şehir veya Havalimanı Yazın">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Sürücü Adı Soyadı</strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="" class="form-control" id="" value="" placeholder="Sürücü Adı Soyadını Yazın">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <button type="submit" name="plane" id="plane" class="btn btn-md btn-custom w-100 mt-3 ticket">Rezervasyon Sorgula</button>
                                </div>
                            </div>
                        </div>
                        <div class="row iptal d-none">
                            <div class="row m-0">
                                <div class="col-md-5">
                                    <label class="form-label text-custom mb-0"><strong>Rezervasyon Kodu</strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class='fas fa-shield-alt'></i>
                                            </span>
                                        </div>
                                        <input type="text" name="" class="form-control" id="" value="" placeholder="Şehir veya Havalimanı Yazın">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <label class="form-label text-custom mb-0"><strong>Sürücü Adı Soyadı</strong></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="" class="form-control" id="" value="" placeholder="Sürücü Adı Soyadını Yazın">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <button type="submit" name="plane" id="plane" class="btn btn-md btn-custom w-100 mt-3 ticket">Rezervasyon Sorgula</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-5">
            <h2 class="mb-3">Araç Kiralamada Birbirinden Özel Fırsatlar</h2>
            <div class="col-xl-3 col-sm-6 mb-5 col-6">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="public/img/gezinomi_images/secure_payment.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Güvenli Ödeme</h5>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-5  col-6">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="public/img/gezinomi_images/ýcon_clock.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Hızlı Araç Kiralama</h5>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-5  col-6">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="public/img/gezinomi_images/cash.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Kesintisiz İade</h5>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-5  col-6"  >
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="public/img/gezinomi_images/announcement.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">En iyi Kampanyalar</h5>
                </div>
            </div>
        </div>



        <div class="wrapper">
            <h2 class="text-center mb-3">Popüler Lokasyonlar</h2>
            <div class="row">
                    <div class="col-xs-3 col-sm-4  col-6">
                        <div class="card-popular" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('public/img/gezinomi_images/istanbul.jpg');">
                            <div class="card-category">İstanbul</div>
                            <div class="card-description">
                                <h2>home</h2>
                                <p>Lovely house</p>
                            </div>
                            <a class="card-link" href="#" ></a>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-4  col-6">
                        <div class="card-popular" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('public/img/gezinomi_images/izmir.jpg');">
                            <div class="card-category">İzmir</div>
                            <div class="card-description">
                                <h2>home</h2>
                                <p>Lovely house</p>
                            </div>
                            <a class="card-link" href="#" ></a>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-4  col-12">
                        <div class="card-popular" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('public/img/gezinomi_images/ankara.jpg');">
                            <div class="card-category">Ankara</div>
                            <div class="card-description">
                                <h2>Home</h2>
                                <p>Lovely house</p>
                            </div>
                            <a class="card-link" href="#" ></a>
                        </div>
                    </div>
                </div>

            <div class="row">
                    <div class="col-xs-3 col-sm-6  col-6">
                        <div class="card-popular" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('public/img/gezinomi_images/antalya.jpg');">
                            <div class="card-category">Antalya</div>
                            <div class="card-description">
                                <h2>home</h2>
                                <p>Lovely house</p>
                            </div>
                            <a class="card-link" href="#" ></a>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-6  col-6">
                        <div class="card-popular" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('public/img/gezinomi_images/eskisehir.jpg');">
                            <div class="card-category">Eskişehir</div>
                            <div class="card-description">
                                <h2>home</h2>
                                <p>Lovely house</p>
                            </div>
                            <a class="card-link" href="#" ></a>
                        </div>
                    </div>
                </div>
        </div>



        <div id="wrapper">
            <h2 class="text-center mb-3">Kiralık Araç Modelleri</h2>
            <div id="carousel">
                <div id="content">
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Peugeot 301</figcaption>
                    </figure>

                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Renault Symbol</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Ford Focus</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Kia Picanto</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Kia Rio</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Ford Tourneo Courier</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Renault Clio 5</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Fiat Egea</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Renault Clio 4</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Fiat Fiorino</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Fiat Linea</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Peugeot Rifter</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Dacia Sandero Stepway</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Peugeot 301</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Renault Symbol</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Ford Focus</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Kia Picanto</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Kia Rio</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Ford Tourneo Courier</figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="public/img/gezinomi_images/cars.png" class="item">
                        <figcaption class="figure-caption bg-white text-center fw-bold p-2">Renault Clio 5</figcaption>
                    </figure>
                </div>
            </div>
            <button id="prev">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                >
                    <path fill="none" d="M0 0h24v24H0V0z" />
                    <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                </svg>
            </button>
            <button id="next">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                >
                    <path fill="none" d="M0 0h24v24H0V0z" />
                    <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                </svg>
            </button>
        </div>


        <div class="row mt-5">
            <div class="col-12 mb-4 d-sm-block ">
                <h2 class="mb-4">Sıkça Sorulan Sorular</h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingone">
                            <button class="accordion-button collapsed" style="font-size: initial;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="flush-collapseOneX">
                                <h6 id="baslık1">Gezinomi, en ucuz araç kiralama seçeneklerini nasıl sunuyor?</h6>
                            </button>
                        </h6>

                        <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-dark fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Modi odio quidem officiis distinctio voluptates non culpa,
                                    iusto aliquam molestiae ex sint rem eius eos facilis cumque
                                    eligendi voluptatibus, tempore natus. Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Gezinomi, araç kiralama işlemlerimin güvenliğini nasıl sağlıyor?
                            </button>
                        </h6>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-dark fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Modi odio quidem officiis distinctio voluptates non culpa,
                                    iusto aliquam molestiae ex sint rem eius eos facilis cumque
                                    eligendi voluptatibus, tempore natus. Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Gezinomi’de hangi marka araçları kiralayabilirim?
                            </button>
                        </h6>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-dark fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Modi odio quidem officiis distinctio voluptates non culpa,
                                    iusto aliquam molestiae ex sint rem eius eos facilis cumque
                                    eligendi voluptatibus, tempore natus. Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                Gezinomi’de nasıl araç kiralayabilirim?
                            </button>
                        </h6>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-dark fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Modi odio quidem officiis distinctio voluptates non culpa,
                                    iusto aliquam molestiae ex sint rem eius eos facilis cumque
                                    eligendi voluptatibus, tempore natus. Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingfive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                Araba kiralamak için hangi evraklar gerekiyor?
                            </button>
                        </h6>
                        <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-dark fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Modi odio quidem officiis distinctio voluptates non culpa,
                                    iusto aliquam molestiae ex sint rem eius eos facilis cumque
                                    eligendi voluptatibus, tempore natus. Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center d-flex mt-4">
                    <button type="button" id="" name="" class="btn border border-3 btn-md btn-custom2">Tümünü Gör</button>
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
    const gap = 16;

    const carousel = document.getElementById("carousel"),
        content = document.getElementById("content"),
        next = document.getElementById("next"),
        prev = document.getElementById("prev");

    next.addEventListener("click", e => {
        carousel.scrollBy(width + gap, 0);
        if (carousel.scrollWidth !== 0) {
            prev.style.display = "flex";
        }
        if (content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
            next.style.display = "none";
        }
    });
    prev.addEventListener("click", e => {
        carousel.scrollBy(-(width + gap), 0);
        if (carousel.scrollLeft - width - gap <= 0) {
            prev.style.display = "none";
        }
        if (!content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
            next.style.display = "flex";
        }
    });

    let width = carousel.offsetWidth;
    window.addEventListener("resize", e => (width = carousel.offsetWidth));

</script>
<script src="<?= public_url('js/gezinomi.js') ?>"></script>
