<?php require 'mainPage_statics/header.php';  ?>


<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Şikayet</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Şikayet Ekle</a></li>
    </ol>

    <div class="row pt-2">
        <form action="<?= site_url('complaint_add') ?>"
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
                    <select required title="Şikayet Tipi" class="form-control selectpicker" name="category" id="complaint">
                        <option value="Şikayet/Ürün">Şikayet/Ürün</option>
                        <option value="Şikayet/Tedarik">Şikayet/Tedarik</option>
                        <option value="Şikayet/Personel">Şikayet/Personel</option>
                        <option value="Öneri">Öneri/Memnuniyet</option>
                    </select>
                </div>
                <div id="product" style="display: none" class="col-md-12">
                    <select  class="form-control selectpicker"  data-live-search="true" name="producttype" id="categories">
                        <option selected disabled value="">Ürün Tipi</option>
                        <?php foreach ($producttypes as $producttype): ?>
                            <option value="<?= $producttype['id'] ?>"><?= $producttype['producttype'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="sealer" style="display: none" class="col-md-12">
                    <select class="form-control selectpicker" data-live-search="true" name="sealer" id="Sealer">
                        <option selected disabled value="">Bayi Adı</option>
                        <?php foreach ($cities as $city): ?>
                            <option data-tokens="<?= $city['plantAdress'] ?>" value="<?= $city['plantName'] ?>"><?= $city['plantName']."(".$city['plantProvince'].")" ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="productsize" style="display: none" class="col-md-12">
                    <select style="transition: width 0.4s ease-in-out;" class="form-control selectpicker" data-live-search="true" name="productsize" id="productSize">
                        <option selected disabled value="">Ürün Ebatları</option>
                        <?php foreach ($sizes as $size): ?>
                            <option value="<?= $size['size'] ?>"><?= $size['size'] ?></option>
                        <?php endforeach; ?>
                    </select>    <!--word-wrap: normal !important;-->
                </div>
                <div id="productname" style="display: none;" class="col-md-12">
                    <select  class="form-control  selectpicker" data-live-search="true" name="productname" id="productName">
                        <option selected disabled value="">Ürün Adı</option>
                        <option value="">Ark Ivory</option>
                        <option value="">Ark Silver</option>
                        <option value="">Aurora</option>
                        <option value="">Blue Jeans</option>
                        <option value="">Canyon Grigio</option>
                    </select>
                </div>
                <div id="complainttype" style="display: none" class="col-md-12">
                    <select  class="form-control  selectpicker" data-live-search="true" name="complainttype" id="complaintType">
                        <option selected disabled value="">Şikayet Konusu</option>
                        <?php for($i=0;$i<20;$i++):?>
                            <option value="<?= $complaintTypes[$i]['id'] ?>"><?= $complaintTypes[$i]['complaintname'] ?></option>
                        <?php endfor; ?>

                    </select>
                </div>
                <div id="productquality" style="display: none" class="col-md-12">
                    <select class="form-control" name="productquality" id="productQuality">
                        <option disabled value="">Ürünün Kalitesi</option>
                        <option selected value="1">1. Kalite</option>
                        <option value="2">Endüstriyel</option>
                    </select>
                </div>
                <div id="productmetraj" style="display: none" class="col-md-12">
                    <input type="text" name="metraj" class="form-control" placeholder="Ürün Metraj Bilgisi">
                    <small>*Sadece rakam bilgisi girebilirsiniz. Örnek metraj bilgisi: 10.8</small>

                </div>

                <div class="col-md-12" style="display: none" id="proposal">
                    <div style="padding: 0" class="col-md-12">
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
                <div class="col-md-12" style="display: none" id="personal">
                    <label for="">Olay Tarihi</label>
                    <div style="margin-bottom: 15px;padding:0" class="col-md-12">
                        <input class="form-control" placeholder="" type="date" name="personaleventdate">
                    </div>
                    <label for="">Olay Saati</label>
                    <div style="margin-bottom: 15px;padding:0" class="col-md-12">
                        <input class="form-control" placeholder="" type="time" name="personaleventtime">
                    </div>
                </div>
                <div id="detailCheck" class="col-md-12">
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
                    <div id="applydesc" style="display: none" class="col-md-12">
                        <input class="form-control" placeholder="x metrekaresi uygulandı." type="text" name="productapplydesc">
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


                    <button id="send" name="submit" value="1" type="submit"class="btn button btn-primary"  >Şikayet Oluştur</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require 'mainPage_statics/footer.php';  ?>
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

<script>
    $('.selectpicker').selectpicker({ liveSearchNormalize: true });
    function removeAll(param){
        if (param == 0){
            document.getElementById("product").style = "display:none";
            document.getElementById("sealer").style = "display:none";
            document.getElementById("productsize").style = "display:none";
            document.getElementById("productname").style = "display:none";
            document.getElementById("productquality").style = "display:none";
            document.getElementById("productmetraj").style = "display:none";
            document.getElementById("proposal").style = "display:none";
            document.getElementById("personal").style = "display:none";
            document.getElementById("complainttype").style = "display:none"
        }else if (param == 1){
            document.getElementById("sealer") .style = "display:none";
            document.getElementById("Sealer").value = "";
            $('.selectpicker').selectpicker('refresh');
            document.getElementById("productsize").style = "display:none";
            document.getElementById("productname").style = "display:none";
            document.getElementById("productquality").style = "display:none";
            document.getElementById("productmetraj").style = "display:none";
            document.getElementById("proposal").style = "display:none";
            document.getElementById("personal").style = "display:none";
            document.getElementById("complainttype").style = "display:none"
        }else if (param == 2){
            document.getElementById("sealer") .style = "display:none";
            document.getElementById("Sealer").value = "";
            $('.selectpicker').selectpicker('refresh');
            document.getElementById("productsize").style = "display:none";
            document.getElementById("productname").style = "display:none";
            document.getElementById("productquality").style = "display:none";
            document.getElementById("productmetraj").style = "display:none";
            document.getElementById("personal").style = "display:none";
            document.getElementById("complainttype").style = "display:none"
        }

    }
    document.getElementById("complaint").onchange = function (){
        removeAll(0);
        document.getElementById("categories").value = "";
        $(".selectpicker").selectpicker('refresh');
        if (document.getElementById("complaint").value  == "Şikayet/Ürün"){
            document.getElementById("product").style = "display:block";
            document.getElementById("product").attributes = "required";
        }else if(document.getElementById("complaint").value  == "Şikayet/Tedarik"){
            document.getElementById("product").style = "display:block";
            document.getElementById("product").attributes = "required";
        }else if(document.getElementById("complaint").value  == "Öneri"){
            document.getElementById("product").style = "display:block";
            document.getElementById("proposal").style = "display:block";
        }else if (document.getElementById("complaint").value == "Şikayet/Personel"){
            document.getElementById("sealer").style =  "display:block";
            document.getElementById("personal").style =  "display:block";
            document.getElementById("sealer").attributes = "required";

        }
    }
    document.getElementById("categories").onchange = function () {

        if (document.getElementById("complaint").value != "Öneri"){
            removeAll(1);
            document.getElementById("sealer").style =  "display:block";
            document.getElementById("sealer").attributes = "required";
            if (document.getElementById("categories").value == 1){
                $.post("<?= site_url('mutlu_musteri_bien') ?>", {
                    detailtypeid : document.getElementById("categories").value
                }, function (result) {
                    $('#productSize').selectpicker('destroy');
                    document.getElementById("productSize").innerHTML = result;
                    $('#productSize').selectpicker('render');
                })
            }else{
                $.post("<?= site_url('mutlu_musteri_bien') ?>",{
                    typeid: document.getElementById("categories").value
                },function (result){
                    $('#productName').selectpicker('destroy');
                    document.getElementById("productName").innerHTML = result;
                    $('#productName').selectpicker('render');
                })
            }
        }else{
            removeAll(2);
        }

    }
    document.getElementById("Sealer").onchange = function () {
        if (document.getElementById("complaint").value != "Şikayet/Personel"){
            if (document.getElementById("categories").value == 1){
                document.getElementById("productsize").style = "display:block;";
                document.getElementById("productsize").attributes = "required";
            }else{
                document.getElementById("productname").style = "display:block";
                document.getElementById("productname").attributes = "required";
            }
        }

    }
    document.getElementById("productSize").onchange = function () {
        $.post("<?= site_url('mutlu_musteri_bien') ?>", {
            size:document.getElementById("productSize").value
        }, function (result) {
            $('#productName').selectpicker('destroy');
            document.getElementById("productName").innerHTML = result;
            $('#productName').selectpicker('render');
        })
        document.getElementById("productname").style = "display:block";
        document.getElementById("productname").attributes = "required";
    }
    document.getElementById("productName").onchange = function () {

            document.getElementById("productquality").style = "display:block";
            document.getElementById("productquality").attributes = "required";
            document.getElementById("complainttype").style = "display:block";
            document.getElementById("complainttype").attributes = "required";
            document.getElementById("productmetraj").style = "display:block";


    }

    document.getElementById("detail").onchange = function () {
        if (document.getElementById("detail").checked){
            document.getElementById("detailform").style = "display:block";
            document.getElementById("apply").setAttribute("required")
        }else{
            document.getElementById("detailform").style = "display:none";
        }
    }
    document.getElementById("apply").onchange = function () {
        if (document.getElementById("apply").value == "part"){
            document.getElementById("applydesc").style = "display:block;padding: 0";
        }else{
            document.getElementById("applydesc").style = "display:none";
        }
    }

</script>
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

