<?php require 'mainPage_statics/header.php'; ?>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Rezervasyon</a></li>
    </ol>
    <div class="row">
        <div class="col-sm-8" >
            <div class="card">
                <header class="card-body aliacgn-items-center">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-header-title text-custom mt-1"><i class="fa-solid fa-address-card"></i> İletişim Bilgileri</h5>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-6">
                            <span>E-posta adresiniz</span>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="col-md-6 col-6">
                            <span>Telefonunuz</span>
                            <div class="input-group-prepend mt-1">
                                <span class="input-group-text phone-radius" id="basic-addon1">+90</span>
                                <input type="text" class="form-control text-radius" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="card mt-4">
                <header class="card-body align-items-center people-all">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-header-title text-custom mt-1"><i class="fa-solid fa-circle-user"></i> Sürücü Bilgisi <button type="submit" name="ekle" class="btn btn-md btn-custom w-25 ekle float-right  ">Ekle</button>  </h5>
                        </div>
                    </div>

                    <div class="people border-bottom">

                        <div class="row mt-2">
                            <div class="col-md-6 col-6">
                                <span>Ad</span>
                                <input type="text" class="form-control text-radius" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="col-md-6 col-6">
                                <span>Soyad</span>
                                <input type="text" class="form-control text-radius" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <span>Doğum Tarihi</span>
                                <form class="birth-day">
                                    <input type="number" name="day" min="1" max="31" value="1">
                                    <input type="number" name="month" min="1" max="12" value="1">
                                    <input type="number" name="year" min="1900" max="2021" value="2000">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <span>Tc Kimlik</span>
                                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                <div class="form-check pl-0">
                                    <input class="form-check-input ml-0" type="checkbox" value="" id="flexCheckChecked"  >
                                    <label class="form-check-label ml-3" for="flexCheckChecked">
                                        Tc Vatandaşı Değilim
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <span>Cinsiyet</span>
                                <form>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male"> Erkek</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female"> Kadın</label>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <span>Yolcu Tipi</span>
                                <form>
                                    <input type="radio" id="ekonomi" name="gender" value="ekonomi">
                                    <label for="ekonomi"> Ekonomi</label>
                                    <input type="radio" id="business" name="gender" value="business">
                                    <label for="business"> Business</label>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6"><span>Bagaj Hakkı:</span></div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <span><i class="fa-regular fa-ticket-airline"></i>Gidiş (İstanbul-İzmir)1x15 kg check-in bagajı</span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6 mb-3">
                                <span>Dönüş (İzmir-İstanbul) 1x15 kg check-in bagajı</span>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="card mt-4">
                <header class="card-body align-items-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="card-header-title text-custom mt-1">
                                <i class="fa-solid fa-circle-user"></i> Fatura Bilgileri</h5>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-8 col-6"><span>Firma Adı</span><input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"></div>
                        <div class="col-md-4 mt-3 col-6">
                            <input class="form-check-input ml-0" type="checkbox" value="" id="flexCheckChecked" style="width: 25px;height: 25px;">
                            <p class="mt-2 ml-5">Şahıs Şirketi</p>
                        </div>
                    </div>


                    <div class="row mt-1">
                        <div class="col-md-4 col-6"><span>Ülke</span>   <select class="reservation-info" name="country" id="country">
                                <option value="turkey">Türkiye</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-6"><span>İl</span>      <select class="reservation-info" name="city" id="city">
                                <option value="İzmir">İzmir</option>
                            </select></div>
                        <div class="col-md-4 col-6"><span>İlçe</span>     <select class="reservation-info" name="district" id="district">
                                <option value="karabaglar">Karabağlar</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-6"> <span>Fatura Adresi</span>  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">     </div>
                    </div>





                </header>
            </div>
        </div>
        <div class="col-sm-4 mt-4 mt-sm-0">
            <div class="card mb-4">
                <header class="card-body align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-header-title text-custom mt-1 fw-bolder"></i>Renault Clio</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="public/img/gezinomi_images/fiat-egea-sedan.png" class="img-fluid" width="400" height="500" alt="" srcset="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="pt-2 text-left font-weight-bold text-dark"><i class="fas fa-gas-pump me-1"></i>Benzin</p>
                            <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-gear me-1"></i>Manuel</p>
                        </div>
                        <div class="col-4">
                            <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-users me-1"></i>5 Kişilik</p>
                        </div>
                        <div class="col-4">
                            <p class="pt-2 text-left font-weight-bold text-dark"><i class="fa-solid fa-wallet me-1"></i>Depozito</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="pt-2 text-left text-dark"><b class="font-weight-bold">Kiralama Koşulları</b>'nı görmek için <span class="text-custom cursor-pointer kirala" data-toggle="modal" data-target="#modalRelatedContent">tıklayın</span></p>
                    </div>

                </header>
            </div>
            <div class="card mb-4">
                <header class="card-body align-items-center">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="card-header-title text-custom mt-1"><i class='fas fa-hotel mr-1'></i>Kiralama</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2" >
                            <div class="departure">
                                <p class="font-weight-bold mb-2 text-dark">Teslim Alış</p>


                                <p class="mb-2 text-dark"><span class="bg-custom2 text-light p-1 rounded mr-1">14:00</span>15 Haziran 2023, Perşembe</p>
                            </div>
                            <div class="departure">
                                <p class="font-weight-bold mb-2 text-dark">Teslim ediş</p>
                                <p class="mb-2 text-dark">12:00 18 Haziran 2023, Pazar</p>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="card-footer text-light bg-custom2">
                     Toplam 4 Gün
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-12" >
            <div class="col-md-8 col-12 m-auto">
                <div class="row mt-5">
                    <div class="col-md-5 col-6 text-right">
                        <p class="mb-0">Toplam tutar</p>
                        <h6>1.225,99 TL</h6>
                    </div>
                    <div class="col-md-7 col-6">
                        <button type="submit" name="" id="" class="plane btn btn-md btn-custom pay">Ödemeye İlerle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade right pt-5 show" id="modalRelatedContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info mt-5" role="document">
        <!--Content-->
        <div class="modal-content bg-transparent">
            <!--Header-->
            <div class="modal-header bg-custom2 text-light p-2">
                <p class="h6 mb-0 mt-1">Araç Kiralama Koşulları</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body bg-white">
                <div class="row mt-2">
                    <div class="accordion fılter" id="accordionExample">
                        <div class="accordion-item">
                            <h6 class="accordion-header" id="headingone">
                                <button class="accordion-button ticket_hover collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                                    Yakıt
                                </button>
                            </h6>

                            <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-dark">Araçlar teslim edilen yakıt seviyesinde geri alınmaktadır. Alış yakıt seviyesi ile teslim yakıt seviyesi arasındaki yakıt farkı teslim anındaki yakıt fiyatlarına bağlı olarak %30 arasında bir servis ücreti de eklenerek kiracıdan talep edilecektir</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h6 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Tek Yön Kiralamalar
                                </button>
                            </h6>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-dark">Aracın teslim alınıp başka bir ofise iadesi durumunda Carfleet tarafından öngörülmüş olan tek yön ücreti olan 0,85tl+KDV uygulanır.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h6 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Ek Hizmetler
                                </button>
                            </h6>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-dark">Ek hizmetlerin Günlük / Kiralama Başına, 1-15GÜN, +15GÜN değerleri aşağıdaki gibidir:</p>
                                            <ul>
                                                <li>GPS / Navigasyon: 1-15 gün için günlük 21 TL , +15 gün için günlük 17 TL</li>
                                                <li>Bebek / Çocuk Koltuğu: 1-15 gün için günlük 15 TL , +15 gün için günlük 11 TL</li>
                                                <li>Ek Sürücü: 1-15 gün için günlük 14 TL , +15 gün için günlük 14 TL</li>
                                                <li>Ek 250 Km: 1-15 gün için kiralama başına 99 TL , +15 gün için kiralama başına 99 TL</li>
                                                <li>EK 500 Km: 1-15 gün için kiralama başına 189 TL, +15 gün için kiralama başına 189 TL</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h6 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    İptal İade ve Değişiklik
                                </button>
                            </h6>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-dark">İptal talebinizi aracınızı alış saatinizden 24 saat öncesine kadar tarafımıza bildirmeniz halinde kiralama için ödediğiniz toplam tutar kredi kartınıza iade edilecektir. Planlanan araç alış saatinizde tarafımıza bildirimde bulunmaksızın aracı almaktan vazgeçmeniz ve/veya iptal talebinizi alış saatinize 24 saatten az bir süre kala bildirmeniz halinde bir günlük ücret kesinti sonrası geriye kalan tutar kredi kartınıza iade edilecektir.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h6 class="accordion-header" id="headingfive">
                                <button class="accordion-button collapsed ticket_hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                    Trafik Cezaları- HGS/OGS
                                </button>
                            </h6>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-dark">Trafik cezaları kiracıya aittir. Hit rent tarafından ödenen trafik cezalarında 10 TL + KDV servis ücreti ayrı olarak tahsil edilir. Aracın trafikten alıkonulması halinde, bu süre kiralama süresine eklenir. Paralı otoyol ve köprü geçişlerinde kullanılan OGS servisi için kullanım ücreti ve ilaveten 10 TL/kiralama servis bedeli kiralama ücretinden ayrı olarak tahsil edilir.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<?php require 'mainPage_statics/footer.php'; ?>
