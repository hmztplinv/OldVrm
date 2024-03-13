<?php require 'mainPage_statics/header.php'; ?>
    <style>
        #yolcu{
            border-top: black 2px solid;
        }
        #inp{
            border-bottom: black 2px solid ;
        }
    </style>
    <div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Gezinomi</li>
            <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Uçuş Özeti</a></li>
        </ol>
    </div>

    <div class="col-12 col-sm-12 mb-4" id="transform">
        <div class="card h-100">
            <header class="card-header d-md-flex align-items-center bg-custom2">
                <h6 class="card-header-title text-light mt-1">Özet Bilgiler ve Yolcu Bilgilendirme Sayfası</h6>
            </header>
            <div class="row ml-2 mt-3">
                <div class="col-md-4 col-4"><span>Uçak Bilgileri Detayı</span></div>
                <div class="col-md-4 col-4"><span>Pnr No:1355115</span></div>
                <div class="col-md-3 col-3"><span><button class="btn btn-primary btn-sm">PNR</button</span></div>
                <div><p class="text-dark">ATLASJET</p></div>
                <div class="col-md-6 col-6"><span><b>Kalkış</b> </span><div><span>Sabiha Gökçen Havalimanı(SAW),TR</span><div><span>25.12.2022 20:05</span></div></div></div>
                <div class="col-md-6 col-6"><span><b>Varış</b></span><div><span>Antalya Havalimanı(AYT),TR</span><div><span>25.12.2022 21:15</span></div></div></div>
                <div style="height: 20px"></div>
                <div class="col-md-3 col-3"><span><b>Uçuş No</b> </span><div><span>TC7745</span></div></div>
                <div class="col-md-3 col-3"><span><b>Uçuş Sınıfı</b></span><div><span>Economy(S)</span></div></div>
                <div class="col-md-3 col-3"><span><b>Seyahat Süresi</b></span><div><span>1 Saat 10 dk</span></div></div>
                <div class="col-md-3 col-3"><span><b>Bagaj Limiti</b></span><div><span>kg</span></div></div>
                <div style="height: 20px;"></div>
                <div class="row  mt-1"   >
                    <div class="col-md-12" id="yolcu"><span>1. Yolcu</span></div>
                </div>
                <div class="col-md-2 col-2"  ><span><input type="text" placeholder="Ad"></span></div>
                <div class="col-md-2 col-2"  ><span><input type="text" placeholder="Soyad"></span></div>
                <div class="col-md-2 col-2" ><span><button class="btn btn-primary btn-sm">Mail Gönder</button</span></div>
                <div class="col-md-2 col-2 "  ><span><button class="btn btn-primary btn-sm">SMS Gönder</button</span></div>
                <div class="col-md-2 col-2  " ><span><button class="btn btn-primary btn-sm">Check_in</button</span></div>



                <div class="row  mt-1"   >
                    <div class="col-md-12" id="yolcu"><span>2. Yolcu</span></div>
                </div>
                <div class="col-md-2 col-2"  ><span><input type="text" placeholder="Ad"></span></div>
                <div class="col-md-2 col-2"  ><span><input type="text" placeholder="Soyad"></span></div>
                <div class="col-md-2 col-2" ><span><button class="btn btn-primary btn-sm">Mail Gönder</button</span></div>
                <div class="col-md-2 col-2 "  ><span><button class="btn btn-primary btn-sm">SMS Gönder</button</span></div>
                <div class="col-md-2 col-2  " ><span><button class="btn btn-primary btn-sm">Check_in</button</span></div>


                <div class="row  mt-1"   >
                    <div class="col-md-12" id="yolcu"><span>3. Yolcu</span></div>
                </div>
                <div class="col-md-2 col-2"  ><span><input type="text" placeholder="Ad"></span></div>
                <div class="col-md-2 col-2"  ><span><input type="text" placeholder="Soyad"></span></div>
                <div class="col-md-2 col-2" ><span><button class="btn btn-primary btn-sm">Mail Gönder</button</span></div>
                <div class="col-md-2 col-2 "  ><span><button class="btn btn-primary btn-sm">SMS Gönder</button</span></div>
                <div class="col-md-2 col-2  " ><span><button class="btn btn-primary btn-sm">Check_in</button</span></div>

            </div>

        </div>
    </div>


<?php require 'mainPage_statics/footer.php'; ?>