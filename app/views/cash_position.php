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
         <?php if (count(user::get_auth_companies()) > 1): ?>
		 
                <div style="position: fixed;top:15%;right: 1.2%;z-index: 5000">
                    <a id="vkn_click" style="cursor: pointer" id="vkn_"><img style="border: #6b15b6;border-style: solid ;border-width:2px ;border-radius: 10px;width: 50px;height: 50px" src="<?= public_url('img/loader.gif') ?>" alt=""></a>
                </div>
        <div id="window" style="display: none" class="vkn_window">
                <select name="companySelect[]" multiple class="selectBox checkboxselect" id="test">
                    <?php foreach (user::get_auth_companies() as $company): ?>
                    <option style="cursor: pointer" value="<?= $company['tenantId'] ?>"><?= $company['companyName'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="paddingtop d-grid gap-12">
                    <button type="submit" id="answer" name="answer" value="1" class="btn btn-sm btn-custom mt-1">Sorgula</button>
                </div>

        </div> 
        <?php endif; ?>


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
                                <td><span name="crncy" hidden value="1">1</span>TRY<span hidden name="bnknm"><?=$key?></span></td>
                                <td>
                                    <a href="#">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_dolar']) ? '0' : $item['count_dolar']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_dolar']) ? '0' : number_format($item['total_dolar'],2,',','.')?></td>
                                <td><span name="crncy" value="2" hidden >2</span>USD<span hidden name="bnknm"><?=$key?></span></td>
                                <td>
                                    <a href="#">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_euro']) ? '0' : $item['count_euro']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_euro']) ? '0' : number_format($item['total_euro'],2,',','.')?></td>
                                <td><span name="crncy" value="3" hidden>3</span>EUR<span hidden name="bnknm"><?=$key?></span></td>
                                <td>
                                    <a href="#">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_gbp']) ? '0' : $item['count_gbp']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_gbp']) ? '0' : number_format($item['total_gbp'],2,',','.')?></td>
                                <td><span name="crncy" value="4" hidden>4</span>GBP<span hidden name="bnknm"><?=$key?></span></td>
                                <td>
                                    <a href="#">
                                        <img src="public/img/eye_icon_red.png"  class="img-responsive" height="22px" alt="" srcset="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?=empty($item['count_chf']) ? '0' : $item['count_chf']?> Hesap</td>
                                <td class="text-right"><?=empty($item['total_chf']) ? '0' : number_format($item['total_chf'],2,',','.')?></td>
                                <td><span name="crncy" value="9" hidden>9</span>CHF<span hidden name="bnknm"><?=$key?></span></td>
                                <td>
                                    <a href="#">
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
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <table id="modaltable" class="akbankdetaıl display table-responsive-md" style="width:100%">
            <thead>
            <tr class="bg-danger text-white">
                <th class="text-center">Firma</th>
                <th class="text-center">Şube</th>
                <th class="text-center">Iban</th>
                <th class="text-center">Hesap Numarası</th>
                <th class="text-center">Bakiye</th>
                <th class="text-center">Son Güncelleme</th>
            </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
            <tfoot class="text-white bg-secondary fw-bolder">
            <tr>
                <td>Toplam</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"> <span id="total_by_bank">1</span> <span id="total_by_crncy">TRY</span></td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


</div>
<script src="https://cdn.datatables.net/plug-ins/1.13.4/api/sum().js"></script>
<script>
    var mymodal = document.getElementById("myModal");

    function openModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }
        $('table').on('click', 'a', function(event) {
            event.preventDefault();
            var crncy = $(this).closest('tr').find('[name="crncy"]').text();
            var bnknm = $(this).closest('tr').find('[name="bnknm"]').text();
            $.post("<?= site_url('cash_position') ?>", {
                bnknm: bnknm,
                crncy: crncy,
            }, function (result) {
                openModal();
                var table = $('#modaltable').DataTable();
                table.clear().draw();
                var newData=JSON.parse(result);
                var totalblnc=0;
                var a='';

                if(crncy=='1')a='TRY';else if(crncy=='2')a='USD';else if(crncy=='3')a='EUR';else if(crncy=='4')a='GBP';else if(crncy=='9')a='CHF';
                newData.forEach(function(element) {
                    var data = [
                        element.name,
                        element.branchName,
                        element.iban,
                        element.accountNumber,
                        element.balance.toLocaleString('tr-TR', { style: 'decimal', minimumFractionDigits: 2 }),
                        element.lastUpdate
                    ];
                    totalblnc+=parseFloat(element.balance);
                    table.row.add(data).draw();
                });
                $('#total_by_bank').text(totalblnc.toLocaleString('tr-TR', { style: 'decimal', minimumFractionDigits: 2 }));
                $('#total_by_crncy').text(a);
                table
                    .order( [ 4, 'desc' ] )
                    .draw();
                //alert(newData);
            })
        });
    // close buttonunun HTML elementini seçmek için:
    const closeBtn = document.querySelector('.close');

    // modal elementini seçmek için:
    const modal = document.querySelector('#myModal');

    // modal-content öğesini seçmek için:
    const modalContent = document.querySelector('.modal-content');

    // modal dışındaki herhangi bir yere tıklandığında modalı kapatmak için:
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    // close buttonuna tıklanınca modal'ı kapatmak için:
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // modal-content öğesi üzerindeki herhangi bir tıklamayı engellemek için:
    modalContent.addEventListener('click', function(event) {
        event.stopPropagation();
    });



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


<style>
    multiselect{
    }
    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }

    #checkboxes label {
        display: block;
        line-height: 2;
        padding: 5px;
    }

    #checkboxes label:hover {
        background-color: #8918cb;
    }
</style>

<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
    <script>
        var ctx = document.getElementById("bankChart").getContext("2d");

        var bankChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels: [<?php
                    $bankString = "";
                    foreach ($bank_of_total as $bank){
                        if ($bank['name'] != "")
                    $bankString .= "'".$bank['name']."'".",";
                }echo rtrim($bankString,","); ?>],
                datasets: [
                    {
                    label: 'TL',
                    backgroundColor: 'rgba(107, 21, 182, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            if ($bank['name'] != "")
                            echo $bank['tl'].",";
                        }

                        ?>]
                },{
                    label: 'USD',
                    backgroundColor: 'rgba(255, 185, 35, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            if ($bank['name'] != "")
                            echo $bank['usd'].",";
                        }

                        ?>]
                },{
                    label: 'EUR',
                    backgroundColor: 'rgba(255, 87, 86, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            if ($bank['name'] != "")
                            echo $bank['euro'].",";
                        }

                        ?>]
                },{
                    label: 'GBP',
                    backgroundColor: 'rgba(124, 241, 219, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            if ($bank['name'] != "")
                            echo $bank['sterlin'].",";
                        }

                        ?>]
                },{
                    label: 'CHF',
                    backgroundColor: 'rgba(61, 182, 21, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            echo $bank['chf'].",";
                        }

                        ?>]
                }]
            },

            options: {

                tooltips: {
                    displayColors: true,
                    callbacks:{
                        mode: 'x',
                    },
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                        },
                        type: 'linear',
                    }]
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: { position: 'bottom' },
            },

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#bankabazindabakiyelistesi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy', 'print'
                ],
                responsive: {
                    details: false
                },
                pageLength : 5
            });
        })
    </script>


<script>

    $(document).ready(function () {
        var opened = false;
        $(document).on("click", ".MultiCheckBox", function () {
            if (opened == true){
                opened = false;
                document.getElementsByClassName("MultiCheckBoxDetail").style.display = "none";

            }else{
                opened = true;
                var detail = $(this).next();
                detail.show();
            }
            if (document.getElementsByClassName("MultiCheckBoxDetail").style.display === "block"){
                document.getElementsByClassName("MultiCheckBoxDetail").style.display = "content";
            }


        });

        $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {

            e.stopPropagation();
            var hc = $(this).prop("checked");
            $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
        });

        $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {

            var inp = $(this).find("input");
            var chk = inp.prop("checked");
            inp.prop("checked", !chk);
            $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
        });

        $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
            e.stopPropagation();
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

            var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
            $(".MultiCheckBoxDetailHeader input").prop("checked", val);
        });

        $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
            var inp = $(this).find("input");
            var chk = inp.prop("checked");
            inp.prop("checked", !chk);

            var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
            var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
            multiCheckBoxDetail.next().UpdateSelect();

            var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
            $(".MultiCheckBoxDetailHeader input").prop("checked", val);

        });

        $(document).mouseup(function (e) {
            var container = $(".MultiCheckBoxDetail");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }

        });
    });

    var defaultMultiCheckBoxOption = {  defaultText: 'Select Below', height: '200px' };

    jQuery.fn.extend({
        CreateMultiCheckBox: function (options) {

            var localOption = {};
            localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
            localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
            localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

            this.hide();
            this.attr("multiple", "multiple");
            var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
            divSel.css({ "width": localOption.width });

            var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Hepsini Seç</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
            detail.css({ "width": 300, "max-height": 300,"display": "contents" });
            var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");
            var session = <?php echo session("selectedCompany") ?>;
            this.find("option").each(function () {
                var val = $(this).attr("value");
                var values = document.getElementById("test").value;
                var select = "";
                for (var i =0;i<session.length;i++){
                    if (session[i]['tenantId'] == val){
                        select = "checked";
                    }
                }
                if (val == undefined)
                    val = '';
                multiCheckBoxDetailBody.append("<div class='cont'><div ><input "+select+" type='checkbox' class='mulinput' value='" + val + "' /></div><div style='font-weight: normal;white-space: nowrap;min-height: 1.2em;padding: 0px 10px 1px;'>" + $(this).text() + "</div></div>");
            });

            multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
        },
        UpdateSelect: function () {
            var arr = [];

            this.prev().find(".mulinput:checked").each(function () {
                arr.push($(this).val());

            });
            $.post("<?= site_url('hesap_bakiyeleri') ?>", {
                answer: "1",
                cookies: arr
            }, function (result) {
                //alert(result);
            })
            this.val(arr);
        },
    });


    $(document).ready(function () {
        $("#test").CreateMultiCheckBox({  defaultText : 'TC seçiniz' });

    });

document.getElementById("answer").onclick = function () {
    location.reload();
}
</script>
<script>
    $(document).ready(function() {
        $('#gbphesaplistesi').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength : 5
        });
    })
</script>
<script>
    function goBankDetail(e){
        $.post("<?= site_url('hesap_hareketleri') ?>", {
            bankName: e,
        }, function (result) {


            location.href = "<?= site_url('hesap_hareketleri') ?>";
            $('#hesaphareketilistesi').DataTable( {
                stateSave: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy', 'print'
                ],
                responsive: {
                    details: false
                },
                pageLength : 6
            });
            document.getElementById('changing').innerHTML = result;
            document.getElementById("welcomeDiv").style = "display:absolute";

        })

    }

</script>

<script>
    $(document).ready(function() {
        $('#chfhesaplistesi').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength : 5
        });
    })
</script>
    <script>
        $(document).ready(function() {
            $('#tlhesaplistesi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy', 'print'
                ],
                responsive: {
                    details: false
                },
                pageLength : 5
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#usdhesaplistesi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy', 'print'
                ],
                responsive: {
                    details: false
                },
                pageLength : 5
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#eurhesaplistesi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy', 'print'
                ],
                responsive: {
                    details: false
                },
                pageLength : 5
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#digerhesaplistesi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy', 'print'
                ],
                responsive: {
                    details: false
                },
                pageLength : 5
            });
        })
    </script>
<script>
    document.getElementById("vkn_click").onclick = function () {
        if (document.getElementById("window").style.display == 'none'){
            document.getElementById("window").style.display = "";
        }else{
            document.getElementById("window").style.display = "none";
        }
    }
</script>
