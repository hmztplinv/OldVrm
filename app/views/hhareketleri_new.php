<?php require 'mainPage_statics/header.php'; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">

<style>
    /* Popover */
    .popover {
        border: 2px dotted #6B15B6!important;
    }
    /* Popover Header */
    .popover-title {
        background-color: #73AD21;
        color: #FFFFFF;
        font-size: 28px;
        text-align:center;
    }
    /* Popover Body */
    .popover-content {
        background-color: rgb(255, 255, 255);
        color: #FFFFFF;
        padding: 25px;
    }
    /* Popover Arrow */
    .arrow {
        border-right-color: rgb(255, 255, 255) !important;
    }
</style>
<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Hesap Hareketleri</li>
    </ol>
    <div class="row">
        <div class="col-md-12 col-lg-10  col-sm-12  mb-4   order-2  ">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <button class="btn btn-custom btn-sm dropdown-toggle float-left  mb-2"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Seçili Kayıtlar</button>
                    <ul class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ssdsf</a></li>
                        <li><a class="dropdown-item" href="#">sdfsf</a></li>
                        <li><a class="dropdown-item" href="#">sdeef</a></li>
                    </ul>

                    <button class="btn btn-custom btn-sm dropdown-toggle float-left ml-2"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Menü</button>
                    <ul class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ssdsf</a></li>
                        <li><a class="dropdown-item" href="#">sdfsf</a></li>
                        <li><a class="dropdown-item" href="#">sdeef</a></li>
                    </ul>

                    <button class="btn btn-custom btn-sm dropdown-toggle float-left ml-2 mb-2"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Dışarı Aktar</button>
                    <ul class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ssdsf</a></li>
                        <li><a class="dropdown-item" href="#">sdfsf</a></li>
                        <li><a class="dropdown-item" href="#">sdeef</a></li>
                    </ul>

                    <button class="btn btn-custom btn-sm dropdown-toggle float-left ml-2 mb-2"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">İçeri Aktar</button>
                    <ul class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ssdsf</a></li>
                        <li><a class="dropdown-item" href="#">sdfsf</a></li>
                        <li><a class="dropdown-item" href="#">sdeef</a></li>
                    </ul>

                    <button class="btn btn-custom btn-sm dropdown-toggle float-left ml-2 mb-2"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Hesaplar</button>
                    <ul class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ssdsf</a></li>
                        <li><a class="dropdown-item" href="#">sdfsf</a></li>
                        <li><a class="dropdown-item" href="#">sdeef</a></li>
                    </ul>
                </div>

                <div class="col-12 col-sm-6 col-md-6">
                    <button type="submit" name="" id="" class="btn btn-sm btn-custom float-right">
                        <i class="fas fa-cog" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card mt-3">
                        <table class="hesaphareketlerı display table-bordered table-responsive-md" style="width:100%">
                            <thead>
                            <tr class="text-dark">
                                <th></th>
                                <th class="text-center">Tarih</th>
                                <th class="text-center">İşlem Id</th>
                                <th class="text-center">Firma</th>
                                <th class="text-center">Şube Numarası</th>
                                <th class="text-center">Banka</th>
                                <th class="text-left">Hesap Numarası</th>
                                <th class="text-center">Bakiye</th>
                                <th class="text-center">Val Tarihi</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <td>
                                    <a href="#" data-toggle="popover3" data-html="true"><button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog text-white" aria-hidden="true"></i></a></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-xs btn-custom"><i class="fas fa-cog" aria-hidden="true"></i></button>
                                </td>
                                <td>20.01.2023 10:39</td>
                                <td>146</td>
                                <td>Gezinomi</td>
                                <td>Aydın Girişimci Şb.</td>
                                <td>Ziraat Bank</td>
                                <td>32462482-2342</td>
                                <td>7.454.233,80</td>
                                <td>20.01.2023</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-lg-2  col-md-12 col-sm-12 order-1   mb-4  d-sm-block ">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 ml-4">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-custom">Temizle</button>
                                <button class="btn btn-sm btn-custom">Sorgula</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                        <div class="col-md-12 col-6">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-12 col-6">
                            <input class="form-control small mt-1" name="" id="" type="time">
                        </div>

                    </div>

                    <div class="row mt-3">
                        <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>
                        <div class="col-md-12 col-6">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-12 col-6">
                            <input class="form-control small mt-1" name="" id="" type="time">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 col-12">
                            <label class="form-label text-custom align-bottom mb-3"><strong>Para Birimi</strong></label>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="parabırımı[]" id="parabırımı" multiple="multiple">
                            <option value="">İsveç Frangı</option>
                            <option value="">Euro</option>
                            <option value="">İngiliz Sterlini</option>
                            <option value="">Rus Rublesi</option>
                            <option value="">Türk Lirası</option>
                            <option value="">Amerikan Doları</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label text-custom align-bottom mb-3"><strong>Borç/Alacak</strong></label>
                        <select class="form-select" name="borcalacak[]" id="borcalacak" multiple="multiple">
                            <option value="">Giriş Alacak (A)</option>
                            <option value="">Çıkış Borç (B)</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 col-6">
                            <label class="form-label text-custom align-bottom mb-3"><strong>Firmalar</strong></label>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="firmalar[]" id="firmalar" multiple="multiple">
                            <option value="">Ceratile</option>
                            <option value="">Demireks</option>
                            <option value="">Demireks Seramik</option>
                            <option value="">Evim</option>
                            <option value="">Fly Express</option>
                            <option value="">Gezinomi</option>
                            <option value="">Gezinomi Turizm</option>
                            <option value="">Hayal</option>
                            <option value="">Qua Concept</option>
                            <option value="">Qua Tradıng</option>
                            <option value="">Qua Yapı</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label text-custom align-bottom mb-3"><strong>Bankalar</strong></label>
                        </div>
                        <div class="col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="bankalar[]" id="bankalar" multiple="multiple">
                            <option value="">Akbank</option>
                            <option value="">Albaraka Türk</option>
                            <option value="">Alternatif Bank</option>
                            <option value="">Anadolu Bank</option>
                            <option value="">Denizbank</option>
                            <option value="">Fibabank</option>
                            <option value="">Finansbank</option>
                            <option value="">Garanti Bankası</option>
                            <option value="">Halk Bankası</option>
                            <option value="">İş Bankası</option>
                            <option value="">Kuveyt Türk</option>
                            <option value="">Şekerbank</option>
                            <option value="">Tanymsyz Banka</option>
                            <option value="">TEB Banka</option>
                            <option value="">Türkiye Finans</option>
                            <option value="">Vakıf Katılım</option>
                            <option value="">Vakıfbank</option>
                            <option value="">Yapı Kredi Bankası</option>
                            <option value="">Ziraat Bankası</option>
                            <option value="">Ziraat Katılım</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label text-custom align-bottom mb-3"><strong>Şubeler</strong></label>
                        </div>
                        <div class="col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="subeler[]" id="subeler" multiple="multiple">
                            <option value="">Afyonkarahisar</option>
                            <option value="">İzmir</option>
                            <option value="">İmes Ticari</option>
                            <option value="">Ege Kurumsal</option>
                            <option value="">Söke</option>
                            <option value="">Başkent Ticari</option>
                            <option value="">Side Ticari Mk.</option>
                            <option value="">Eskişehir San.</option>
                            <option value="">Kavaklıdere</option>
                            <option value="">Aydın Girişimci</option>
                            <option value="">Bilecik</option>
                            <option value="">EGE Ticari</option>
                            <option value="">Ege Ticari</option>
                            <option value="">Merkez</option>
                            <option value="">Eskişehir</option>
                            <option value="">İzmir Ticari Şb.</option>
                            <option value="">Aydın Şube</option>
                            <option value="">Afyon Organize San.</option>
                            <option value="">Imes Ticari Şb.</option>
                            <option value="">Aydın Girişimci Şb.</option>
                            <option value="">Imes Ticari</option>
                            <option value="">Ege Kurumsal/İzmir</option>
                            <option value="">Ege Kurumsal</option>
                            <option value="">Eskişehir Tic.</option>
                            <option value="">Aydın</option>
                            <option value="">Yenişehir</option>
                            <option value="">Afyon Organize San.</option>
                            <option value="">Imes Ticari</option>
                            <option value="">Eskişehir Tic. Şube</option>
                            <option value="">Ege Kurumsal/İzmir</option>
                            <option value="">Yenişehir Şube</option>
                            <option value="">Aydın Girişimci Şb.</option>
                            <option value="">Imes Ticari Şb.</option>
                            <option value="">Eskişehir Osb Şb.</option>
                            <option value="">Mecidiyeköy Tic. Şb.</option>
                            <option value="">Başkent Ticari</option>
                            <option value="">Eskişehir Tic. Şb.</option>
                            <option value="">Eskişehir Osb</option>
                            <option value="">Ege Ticari Şube</option>
                            <option value="">Aydın Ticari Şube</option>
                            <option value="">Maslak/İstanbul Şb.</option>
                            <option value="">İzmir Ticari Şb.</option>
                            <option value="">İstanbul</option>
                            <option value="">Aydın Ticari</option>
                            <option value="">Bornova</option>
                            <option value="">İzmir Kurumsal Tic. Şb.</option>
                            <option value="">848</option>
                            <option value="">Eskişehir Osb Şb.</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label text-custom align-bottom mt-2"><strong>Tutar Aralığı</strong></label>
                        </div>
                        <div class="d-block">
                            <input class="form-control small" id="tutar" name="tutar" placeholder="En Az">
                            <input class="form-control small mt-1" id="" name="" placeholder="En Çok">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <label class="form-label text-custom"><strong>Vergi veya Tckn</strong></label>
                            <input class="form-control small" id="" name="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <label class="form-label text-custom"><strong>Iban Numarası</strong></label>
                            <input class="form-control small" id="" name="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label text-custom"><strong>Valor Başlangıç - Bitiş Tarihi</strong></label>
                        <div class="col-md-12 col-6">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-12 col-6">
                            <input class="form-control small mt-1" name="" id="" type="date">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label text-custom"><strong>Oluşturma Zaman Aralığı</strong></label>
                        <div class="col-md-12 col-6">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-12 col-6">
                            <input class="form-control small mt-1" name="" id="" type="date">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label text-custom"><strong>Güncelleme Zaman Aralığı</strong></label>
                        <div class="col-md-12 col-6">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-12 col-6">
                            <input class="form-control small mt-1" name="" id="" type="date">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover3"]').popover({
            placement : 'top',
            maxWidth:'330px',
            html : true,
            content : '<a href="#" id="checkOut" class="btn btn-sm btn-custom">Dekont</a>'
        });
        $(document).on("click", ".popover .close" , function(){
            $(this).parents(".popover").popover('hide');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#borcalacak').multiselect({
            maxHeight: 200,
            scrollY:true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#parabırımı').multiselect({
            maxHeight: 200,
            scrollY:true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#bankalar').multiselect({
                maxHeight: 200,
                scrollY:true
            }
        );
    });
</script>
<script>
    $(document).ready(function() {
        $('#subeler').multiselect({
                maxHeight: 200,
                scrollY:true
            }
        );
    });
</script>
<script>
    $(document).ready(function() {
        $('#firmalar').multiselect({
            maxHeight: 200,
            scrollY:true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.hesaphareketlerı').DataTable( {
        });
    })
</script>
<?php require 'mainPage_statics/footer.php'; ?>


