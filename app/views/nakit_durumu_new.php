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
        background-color: coral;
        color: #FFFFFF;
        padding: 25px;
    }
    /* Popover Arrow */
    .arrow {
        border-right-color: red !important;
    }

    .modal {
        display: none; /* Varsayılan olarak gizlidir */
        position: fixed; /* Yerinde kal */
        z-index: 1; /* Üstte */
        left: 0;
        top: 0;
        width: 100%; /* Ful Genişlik */
        height: 100%; /* Ful Yükseklik */
        overflow: auto; /* Gerekirse kaydırmayı etkinleştir */
        background-color: rgb(0,0,0); /* Yedek renk */
        background-color: rgba(0,0,0,0.4); /* Siyah w / opaklık */
    }

    /* İçerik / Kutu */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* % 15 üstten ve ortalanmış */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Ekran boyutuna bağlı olarak daha fazla veya daha az olabilir */
    }

    /* Kapat Düğmesi */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

    <!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Nakit Durumu</li>
    </ol>

    <div class="row">
        <div class="col-12">
            <h6 class="ml-2">Ekran Yenileme
                <input id="switch" type="checkbox" data-toggle="switchbutton" <?= $_COOKIE['refresh']==1 ? ' checked ': ' '?> data-onstyle="success" data-size="sm" data-offstyle="danger"></h6>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-2 order-2 mb-4  d-sm-block ">
            <?php if(count($companycount)>1): ?>>
            <div class="card">
                <form method="post" action="<?= site_url('nakit_durumu_new') ?>">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 ml-4">
                                <div class="btn-group" role="group">
                                    <button type="submit" name="answer" value="1" class="btn btn-sm btn-custom">Sorgula</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-items-center">
                        <div class="col-12 col-sm-2 p-2">
                            <label class="form-label text-custom">
                                <strong>Firmalar</strong>
                            </label>
                            <br>
                            <select class="form-select"  title="Firma Seçiniz" style="width: 100%;" name="companies[]" id="firmalar"
                                    multiple="multiple">
                                <?php foreach ($companies as $company): ?>
                                    <option value="<?= $company['id'] ?>"><?= $company['companyName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif;?>

<!--            <div class="card mt-2">-->
<!--                <div class="card-header">-->
<!--                    Bakiye Türleri<button class="btn btn-xs btn-custom float-right"><a href="#" data-toggle="popover" data-html="true"><i class="fa-solid fa-gear text-white"></i></a></button>-->
<!--                </div>-->
<!--                <table class="bakıye display  " style="width:100%">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th class="bg-custom2 text-white fw-bold">Bakiye Türü</td>-->
<!--                        <th class="bg-custom2 text-white fw-bold text-left" colspan="2">Toplam</td>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <td>Kredi Limit</td>-->
<!--                        <td class="text-right">0</td>-->
<!--                        <td>CHF</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Kull. Limit</td>-->
<!--                        <td class="text-right">0</td>-->
<!--                        <td>CHF</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Bakiye</td>-->
<!--                        <td class="text-right">0</td>-->
<!--                        <td>CHF</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Bloklu Bakiye</td>-->
<!--                        <td class="text-right">0</td>-->
<!--                        <td>CHF</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Kull. Bakiye</td>-->
<!--                        <td class="text-right">0</td>-->
<!--                        <td>CHF</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Kredili Kull. Bakiye</td>-->
<!--                        <td class="text-right">0</td>-->
<!--                        <td>CHF</td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->

            <div class="card mt-2">
                <div class="card-header">
                   <span> <strong>Döviz Toplamları</strong>  </span>
<!--                    <button class="btn btn-xs btn-custom float-right"><i class="fa-solid fa-rotate-right"></i></button>-->
                </div>
                <table class="dovız display  " style="width:100%">
                    <thead>
                    <tr>
                        <th class="bg-custom2 text-white fw-bold">Döviz Türü</td>
                        <th class="bg-custom2 text-white fw-bold text-left" colspan="2">Toplam</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>TRY</td>
                        <td class="text-right"><?=number_format($purebalance['puretl'],2,',','.')?></td>
                        <td>TRY</td>
                    </tr>
                    <tr>
                        <td>USD</td>
                        <td class="text-right"><?=number_format($purebalance['pureusd'],2,',','.')?></td>
                        <td>USD</td>
                    </tr>
                    <tr>
                        <td>EUR</td>
                        <td class="text-right"><?=number_format($purebalance['pureeuro'],2,',','.')?></td>
                        <td>EUR</td>
                    </tr>
                    <tr>
                        <td>GBP</td>
                        <td class="text-right"><?=number_format($purebalance['puregbp'],2,',','.')?></td>
                        <td>GBP</td>
                    </tr>
                    <tr>
                        <td>CHF</td>
                        <td class="text-right"><?=number_format($purebalance['purechf'],2,',','.')?></td>
                        <td>CHF</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    Döviz Dönüşüm<button  id="currencyButton" class="btn btn-xs btn-custom float-right"><a><i class="fa-solid fa-gear text-white"></i></a></button>
                    <div id="currencyButtons" style="display: none" class="text-white mt-2" >
                        <a id="chf" class="btn btn-sm btn-custom m-1">CHF</a>
                        <a id="gbp" class="btn btn-sm btn-custom m-1">GBP</a>
                        <a id="tl" class="btn btn-sm btn-custom m-1">TRY</a>
                        <a id="usd" class="btn btn-sm btn-custom m-1">USD</a>
                        <a id="euro" class="btn btn-sm btn-custom m-1">EURO</a>
                    </div>
                </div>
                <table class="banka display  " style="width:100%">
                    <thead>
                    <tr>
                        <th class="bg-custom2 text-white fw-bold text-left">Banka</td>
                        <th class="bg-custom2 text-white fw-bold text-left" >Tutar</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tlbalance as $item): ?>
                    <tr>
                        <td class="text-left" >
                            <img src="<?=$item['logo']?>" class="img-responsive" height="20px" alt="" srcset="">
                        </td>
                        <td class="text-right">
                            <span class="tl">
                                <span ><?=number_format($item['tl'],2,',','.');?></span>
                                <span class="text-left"> TRY</span>
                            </span>
                            <span class="usd" style="display: none" >
                                <span ><?=number_format(($item['tl']/$rates['usd']),2,',','.');?></span>
                                <span class="text-left"> USD</span>
                            </span>
                            <span class="euro" style="display: none" >
                                <span ><?=number_format(($item['tl']/$rates['euro']),2,',','.');?></span>
                                <span class="text-left"> EURO</span>
                            </span>
                            <span  class="gbp" style="display: none" >
                                <span ><?=number_format(($item['tl']/$rates['gbp']),2,',','.');?></span>
                                <span class="text-left"> GBP</span>
                            </span>
                            <span  class="chf" style="display: none" >
                                <span ><?=number_format(($item['tl']/$rates['chf']),2,',','.');?></span>
                                <span class="text-left"> CHF</span>
                            </span>
                        </td>

                    </tr>
                    <?php endforeach;?>
                    <tr>
                        <td class="fw-bold">Toplam</td>
                        <td class="text-right fw-bold">
                            <span class="tl">
                                <span ><?= number_format($totaltl, 2, ',', '.'); ?></span>
                                <span class="fw-bold">TRY</span>
                            </span>
                            <span style="display: none" class="usd">
                                <span ><?= number_format($totaltl/$rates['usd'], 2, ',', '.'); ?></span>
                                <span class="fw-bold">USD</span>
                            </span>
                            <span style="display: none" class="euro">
                                <span ><?= number_format($totaltl/$rates['euro'], 2, ',', '.'); ?></span>
                                <span class="fw-bold">EURO</span>
                            </span>
                            <span style="display: none" class="gbp">
                                <span ><?= number_format($totaltl/$rates['gbp'], 2, ',', '.'); ?></span>
                                <span class="fw-bold">GBP</span>
                            </span>
                            <span style="display: none" class="chf">
                                <span ><?= number_format($totaltl/$rates['chf'], 2, ',', '.'); ?></span>
                                <span class="fw-bold">CHF</span>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-lg-10 col-md-12 order-md-1 col-12">
            <div class="row">

<?php foreach ($bankbalance as $key => $item):?>
                <div class="col-12 col-sm-3 col-md-6 col-lg-3 mt-1">
                    <div class="card">
                        <header class="card-header align-items-center bg-white text-center">
                            <img src="<?=$item['logo']?>" class="img-responsive" height="40px" alt="" srcset="">
                        </header>
                        <table id="bank<?=preg_replace('/\s+/', '',  $key)?>" class="display" style="width:100%">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                <td><?=empty($item['count_tl']) ? '0' : $item['count_tl']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_tl']) ? '0' : number_format($item['total_tl'],2,',','.')?></td>
                                <td>TRY</td>
                                <td>
                                    <a href="https://verimportal.com/account_tx?currency=TRY&bankname=<?=str_replace(' ', '_', $key)?>">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_dolar']) ? '0' : $item['count_dolar']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_dolar']) ? '0' : number_format($item['total_dolar'],2,',','.')?></td>
                                <td>USD</td>
                                <td>
                                    <a href="https://verimportal.com/account_tx?currency=USD&bankname=<?=str_replace(' ', '_', $key)?>">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_euro']) ? '0' : $item['count_euro']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_euro']) ? '0' : number_format($item['total_euro'],2,',','.')?></td>
                                <td>EUR</td>
                                <td>
                                    <a href="https://verimportal.com/account_tx?currency=EUR&bankname=<?=str_replace(' ', '_', $key)?>">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_gbp']) ? '0' : $item['count_gbp']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_gbp']) ? '0' : number_format($item['total_gbp'],2,',','.')?></td>
                                <td>GBP</td>
                                <td>
                                    <a href="https://verimportal.com/account_tx?currency=GBP&bankname=<?=str_replace(' ', '_', $key)?>">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_chf']) ? '0' : $item['count_chf']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_chf']) ? '0' : number_format($item['total_chf'],2,',','.')?></td>
                                <td>CHF</td>
                                <td>
                                    <a href="https://verimportal.com/account_tx?currency=CHF&bankname=<?=str_replace(' ', '_', $key)?>">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    // Popup Al
    var modal = document.getElementById('myModal');

    // Kipi açan düğmeyi al
    var btn = document.getElementById("myBtn");

    // Kipi kapatan <span> öğesini edinin
    var span = document.getElementsByClassName("close")[0];

    // Kullanıcı düğmeyi tıklattığında
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Kullanıcı <span> (x) düğmesini tıkladığında, popup
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Kullanıcı modelden başka herhangi bir yeri tıklattıysa, onu kapatın.
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function(){
        $("#currencyButton").click(function(){
            if ($("#currencyButtons").is(":hidden")) {
                $("#currencyButtons").slideDown( "slow" );
            } else {
                $("#currencyButtons").slideUp("slow");
            }
        });
        $("#tl").click(function(){
            $(".tl").show();
            $(".usd").hide();
            $(".euro").hide();
            $(".gbp").hide();
            $(".chf").hide();
        });
        $("#usd").click(function(){
            $(".tl").hide();
            $(".usd").show();
            $(".euro").hide();
            $(".gbp").hide();
            $(".chf").hide();
        });
        $("#euro").click(function(){
            $(".tl").hide();
            $(".usd").hide();
            $(".euro").show();
            $(".gbp").hide();
            $(".chf").hide();
        });
        $("#gbp").click(function(){
            $(".tl").hide();
            $(".usd").hide();
            $(".euro").hide();
            $(".gbp").show();
            $(".chf").hide();
        });
        $("#chf").click(function(){
            $(".tl").hide();
            $(".usd").hide();
            $(".euro").hide();
            $(".gbp").hide();
            $(".chf").show();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#bakıye').multiselect({
            maxHeight: 200,
            scrollY:true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#hesapturlerı').multiselect({
            maxHeight: 200,
            scrollY:true
        });
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
        $('#bankaservıs').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.banka').DataTable( {
            info:false,
            searching:false,
            paging:false,
            pageLength:15
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.dovız').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.bakıye').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.akbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.akbankdetaıl').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.albarakabank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.alternatifbank').DataTable( {
        });
    })
</script>
<script>
    <?php foreach ($bankbalance as $key => $item): ?>
    $(document).ready(function() {
        $('#bank<?=preg_replace('/\s+/', '',  $key)?>').DataTable();
    } );
    <?php endforeach;?>

</script>
<script>
    $(document).ready(function() {
        $('.denizbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.fibabank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.finansbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.garantibank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.halkbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.isbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.kuveytturk').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.sekerbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.tanımsızbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.tebbank').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.tfınans').DataTable( {
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('.vakıfkatılım').DataTable( {
        });
    })
</script>


<script>

</script>
<script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
    $("#switch").change(function() {
        if ($('#switch').is(':checked')) {
            document.cookie="refresh=1;";
            window.setInterval(function(){
                location.reload();
            }, 60000)
        }
        else{
            document.cookie="refresh=0;";
        }
    });
    $(document).ready(function() {
        if(getCookie('refresh')==1){
            window.setInterval(function(){
                location.reload();
            }, 60000)
        }
        else{
            //
        }
    })
</script>



<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<?php require 'mainPage_statics/footer.php'; ?>



