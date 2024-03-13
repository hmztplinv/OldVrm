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
                        <div class="col-md-6 col-6 ">
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
                            <h5 class="card-header-title text-custom mt-1"><i class="fa-solid fa-circle-user"></i> Yetişkin <button type="submit" name="ekle" class="btn btn-md btn-custom w-25 ekle float-right  ">Ekle</button>  </h5>
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
                            <img src="https://verimportal.com/public/img/deneme/slider-3.jpg" class="img-fluid rounded w-100 mb-2" alt="" srcset="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-header-title text-custom mt-1 fw-bolder"></i>Oruçoğlu Termal Resort</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-2" >
                            <div class="departure">
                                <p class="mb-2 text-dark"> <i class='fas fa-concierge-bell mr-2'></i>Oda Kahvaltısı</p>
                            </div>
                        </div>
                        <div class="col-6 mt-2" >
                            <div class="departure">
                                <p class="mb-2 text-dark"> <i class='fas fa-users mr-2'></i> 2 Yetişkin</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2" >
                            <div class="departure">
                                <p class="mb-2 text-dark"> <i class='fas fa-bed mr-2'></i>Superior Oda</p>
                            </div>
                        </div>
                    </div>

                </header>
            </div>
            <div class="card mb-4">
                <header class="card-body align-items-center">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="card-header-title text-custom mt-1"><i class='fas fa-hotel mr-1'></i>Konaklama</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2" >
                            <div class="departure">
                                <p class="font-weight-bold mb-2 text-dark">Giriş</p>


                                <p class="mb-2 text-dark"><span class="bg-custom2 text-light p-1 rounded mr-1">14:00</span>15 Haziran 2023, Perşembe</p>
                            </div>
                            <div class="departure">
                                <p class="font-weight-bold mb-2 text-dark">Çıkış</p>
                                <p class="mb-2 text-dark">12:00 18 Haziran 2023, Pazar</p>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="card-footer text-light bg-custom2">

                    <i class='fas fa-moon'></i> 3 Gece <i class="fa fa-sun mr-1 ml-1"></i> 4 Gün
                </div>
            </div>
        </div>
        <div class="col-sm-8" >
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

<?php require 'mainPage_statics/footer.php'; ?>
<script src="<?= public_url('js/gezinomi.js') ?>"></script>