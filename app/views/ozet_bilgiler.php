<?php require 'mainPage_statics/header.php'; ?>
<div class="container-lg bg-light pt-5 p-5 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">UÇAK VE YOLCU BİLGİLENDİRME SAYFASI</li>
    </ol>

    <div class="row mt-2 small animate__animated animate__fadeIn">
        <div class="col-12 col-md-12">
            <div class="card">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Uçak Bilgilendirme Detayı</h6>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Kalkış Havalimanı</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="Sabiha Gökçen Havalimanı (SAW)">
                            </div>
                        </div>

                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Varış Havalimanı</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="Antalya Havalimanı (AYT)">
                            </div>
                        </div>
                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Kalkış Saati-Tarihi</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="20:15-15.12.2022">
                            </div>
                        </div>
                        <div class="col-md-3 mt-3 col-6" >
                            <label class="form-label text-custom mb-0"><strong>Varış Saati-Tarihi</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="21:15-25.12.2022">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Havayolu</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="Atlas Jet">
                            </div>
                        </div>

                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Uçuş No</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="TC7745">
                            </div>
                        </div>
                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Seyahat Süresi</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="1 Saat 10 Dakika">
                            </div>
                        </div>
                        <div class="col-md-3 mt-3 col-6">
                            <label class="form-label text-custom mb-0"><strong>Bagaj Limiti</strong></label>
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="15 Kg">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="Pnr Kodu">
                            </div>
                        </div>

                        <div class="col-md-4 mt-3 col-6">
                            <button type="submit" name="" id="" class="btn btn-md btn-custom">PNR SORGULA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3 small animate__animated animate__fadeIn">
        <div class="col-12 col-md-12">
            <div class="card">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Yolcu Bilgilendirme Detayı</h6>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mt-3 col-6">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="1.Yolcu Adı Soyadı">
                            </div>

                        </div>
                        <div class="col-md-3 mt-3 col-6">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder=" Business">

                            </div>
                        </div>
                        <div class="col-md-2 mt-3 col-6">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Mail Gönder</button>
                            </div>

                        </div>
                        <div class="col-md-2 mt-3 col-6">
                            <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Sms Gönder</button>

                        </div>
                        <div class="col-md-2 mt-3 ">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Check-In</button>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mt-3 col-6">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="2.Yolcu Adı Soyadı">
                            </div>

                        </div>
                        <div class="col-md-3 mt-3 col-6">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder=" Economy">

                            </div>
                        </div>
                        <div class="col-md-2 mt-3 col-6">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Mail Gönder</button>
                            </div>

                        </div>
                        <div class="col-md-2 mt-3 col-6">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Sms Gönder</button>
                            </div>

                        </div>
                        <div class="col-md-2 mt-3 ">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Check-In</button>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mt-3 col-6">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder="3.Yolcu Adı Soyadı">

                            </div>
                        </div>

                        <div class="col-md-3 mt-3 col-6">
                            <div class="input-group mb-2">
                                <input type="text" name="" class="form-control" id="" value="" placeholder=" Economy">

                            </div>
                        </div>

                        <div class="col-md-2 mt-3 col-6">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Mail Gönder</button>
                            </div>

                        </div>
                        <div class="col-md-2 mt-3 col-6">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Sms Gönder</button>
                            </div>

                        </div>
                        <div class="col-md-2 mt-3">
                            <div class="input-group mb-2">
                                <button type="submit" name="" id="" class="btn btn-md btn-custom w-100">Check-In</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require 'mainPage_statics/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .tk{
        position: static;
        right: 320px;
        top: 5px;
    }


    .pc{
        position: static;
        top: 150px;
        margin-left: 252px;
    }

    .aj{
        position: static;
        top: 300px;
        margin-left: 252px;
    }

</style>
<script>
    const rangeInputs = document.querySelectorAll('input[type="range"]')
    const numberInput = document.querySelector('input[type="number"]')

    function handleInputChange(e) {
        let target = e.target
        if (e.target.type !== 'range') {
            target = document.getElementById('range')
        }
        const min = target.min
        const max = target.max
        const val = target.value

        target.style.backgroundSize = (val - min) * 100 / (max - min) + '% 100%'
    }

    rangeInputs.forEach(input => {
        input.addEventListener('input', handleInputChange)
    })

    numberInput.addEventListener('input', handleInputChange)



    /* gezinomi.js start */
    $(document).ready(function(){
        /* Yolcu Tipi Button Start */
        $('#buttonpassangertype').click(function(e) {
            if($("#travellertype").attr('class').split(" ")[6]=="active"){
                $("#travellertype").removeClass("d-flex").addClass("d-none");
                $("#travellertype").removeClass("active");
            }
            else{
                $("#travellertype").removeClass("d-none").addClass("d-flex");
                $("#travellertype").addClass("active");
            }
        });
        $('.traveller-number').click(function(e) {
            if($(this).attr('class').split(" ")[2]=="ekonomi"){
                $contanir=".ekonomi-container";
                $noncontainer=".business-container";
                $text="#t-ekonomi";
            }else{
                $contanir=".business-container";
                $noncontainer=".ekonomi-container";
                $text="#t-business";
            }
            $number=parseInt($($contanir+">#value").html());
            if($(this).attr('class').split(" ")[3]=="plus"){
                if($number<9){
                    $number=$number+1;
                    if($number==9){
                        $($contanir+'>.plus').removeClass("traveller-display");
                    }
                }
            }
            if(parseInt($($noncontainer+">#value").html())==0){
                $min=1;
            }else{
                $min=0;
            }
            if($(this).attr('class').split(" ")[3]=="minus"){
                if($number>$min){
                    $number=$number-1;
                    if($number==$min){
                        $($contanir+'>.minus').removeClass("traveller-display");
                        if(parseInt($($noncontainer+">#value").html())==1 && $min==0){
                            $($noncontainer+'>.minus').removeClass("traveller-display");
                        }
                    }
                }
            }
            $($contanir+">#value").html($number);
            $($text).html($number);
            if($number<9){
                $($contanir+'>.plus').addClass("traveller-display");
            }
            //alert($(this).attr('class').split(" ")[2]);
            if($number>$min){
                $($contanir+'>.minus').addClass("traveller-display");
                if(parseInt($($noncontainer+">#value").html())>0){
                    $($noncontainer+'>.minus').addClass("traveller-display");
                }
            }
        });
        /* Yolcu Tipi Button Finish */
        /* Rezarvasyon Yolcu Ekleme Start */
        $('.ekle').click(function(e) {
            $clone=$(".people:first").clone();
            $clone.find("input:text").val("").end();
            $clone.find("input[name=day]").val("1").end();
            $clone.find("input[name=month]").val("1").end();
            $clone.find("input[name=year]").val("2000").end();
            $clone.find("input:checkbox").prop("checked", false);
            $clone.find("input:radio").prop("checked", false);
            $clone.appendTo(".people-all");
        });
        /* Rezarvasyon Yolcu Ekleme Finish */
        /* Otel Card Seçimi Start */
        $('.card-click').click(function(e) {
            $(".card-body>.row").removeClass("d-flex").addClass("d-none");
            $(".card-body>."+$(this).attr('class').split(" ")[4]).removeClass("d-none").addClass("d-flex");
            $(".card-header>.card-click").removeClass("card-active");
            $(".card-header>."+$(this).attr('class').split(" ")[4]).addClass("card-active");
        });
        /* Otel Card Seçimi Finish */
    });
    /* gezinomi.js finish */
    window.addEventListener('load', fg_load)

    function fg_load() {
        document.getElementById('loading').style.display = 'none';
    }
</script>
