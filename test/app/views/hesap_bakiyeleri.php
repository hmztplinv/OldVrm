<?php require 'mainPage_statics/header.php'; ?>



    <!-- Container -->
    <div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Hesap Yönetimi</li>
            <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Hesap Bakiyeleri</a></li>
        </ol>

                <div style="position: fixed;top: 15%;right: 3%;z-index: 5000">
                    <a id="vkn_click" style="cursor: pointer" id="vkn_"><img style="border: #6b15b6;border-style: solid ;border-width:2px ;border-radius: 10px;width: 50px;height: 50px" src="<?= public_url('img/loader.gif') ?>" alt=""></a>
                </div>
        <div id="window" style="display: none" class="vkn_window">
            <form action="<?= site_url('hesap_bakiyeleri') ?>" method="post">

                <select class="selectBox checkboxselect" id="test">
                    <option value="1">22222222222</option>
                    <option value="2">65566666666</option>
                    <option value="3">Vertus LTD</option>
                    <option value="4">Q AŞ</option>
                    <option value="5">77777777777</option>
                    <option value="6">45626879566</option>
                    <option value="7">56489653648</option>
                    <option value="8">20986566666</option>
                </select>




                <div class="paddingtop d-grid gap-12">
                    <button type="submit" name="answer" value="1" class="btn btn-sm btn-custom mt-1">Sorgula</button>
                </div>
            </form>
        </div>


        <!-- Row 1 -->
        <div class="row pt-2">
        <?php if ($total_tl != 0): ?>
            <div class="col-6 col-sm-2 mb-2">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-turkish-lira-sign"></i></h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-end text-dark"><?= number_format($total_tl, 2, ',', '.'); ?></h4>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-2 mb-2">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-dollar-sign"></i></h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-end text-dark"><?= number_format($total_usd, 2, ',', '.'); ?></h4>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-2 mb-2">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-euro-sign"></i></h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-end text-dark"><?= number_format($total_euro, 2, ',', '.'); ?></h4>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-2 mb-2">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-sterling-sign"></i></h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-end text-dark"><?= number_format($total_gbp, 2, ',', '.'); ?></h4>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-2 mb-2">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><i class="fa-solid fa-franc-sign"></i></h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-end text-dark"><?= number_format($total_chf, 2, ',', '.'); ?></h4>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-6 col-sm-2 mb-2">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Toplam</i> (<i class="fa-solid fa-turkish-lira-sign"></i>)</h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <h4 class="text-end text-dark"><?= number_format($total_tl + ($total_chf*$rates['chf'])+ ($total_gbp*$rates['gbp'])+ ($total_usd*$rates['usd']) + ($total_euro*$rates['euro']),2,',','.') ?></h4>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row 1 -->
        <div class="row pt-2">
            <div class="col-12 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card h-100">
                        <header class="card-header d-md-flex align-items-center bg-custom2">
                            <h6 class="card-header-title text-light mt-1">Banka Bazında Bakiye Dağılımı</h6>
                        </header>
                        <div class="card-body" style="height: 400px">
                            <canvas id="bankChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $tl=0;$usd=0;$euro=0;$gbp=0;$chf=0; ?>
        <!-- Row 2 -->
        <div class="row pt-2">
                <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Banka Bazında Bakiye Listesi</h6>
                    </header>
                    <div class="card-body">

                        <table id="bankabazindabakiyelistesi" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Banka</th>
                                <th class="text-custom text-center">TL</th>
                                <th class="text-custom text-center">USD</th>
                                <th class="text-custom text-center">EUR</th>
                                <th class="text-custom text-center">Toplam (TL)</th>
                                <th class="text-custom">Son Güncelleme</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bank_of_total as $bank): ?>
                            <tr>
                                <td align="center">
                                    <form action="<?= site_url("hesap_hareketleri") ?>" method="post">
                                        <button name="id" value="<?= $bank['bankId'] ?>" type="submit"  class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                <td align="center"><img class="img-fluid" src="<?=  $bank['logo']  ?>" alt="<?= $bank['name'] ?>"></td>
                                </td>
                                <td align="center"><?= $bank['tl'] ?></td>
                                <td align="center"><?= $bank['usd'] ?></td>
                                <td align="center"><?= $bank['euro'] ?></td>
                                <td align="center"><?= number_format($bank['tl'] + ($bank['usd']*$rates['usd']) + ($bank['euro']*$rates['euro']),2,',','.') ?></td>
                                <td><?= $bank['update'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

                <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">TL Hesap Listesi</h6>
                    </header>
                    <div class="card-body">

                        <table id="tlhesaplistesi" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Banka</th>
                                <th class="text-custom text-center">Hesap Bakiyesi</th>
                                <th class="text-custom">IBAN</th>
                                <th class="text-custom">Son Güncelleme</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($balance_detail['value'] as $tl_detail):
                                if ($tl_detail['currencyId'] == 1):
                                    if ($tl_detail['bankId'] != 999):
                                    ?>
                                    <tr>
                                        <td align="center">
                                            <form action="<?= site_url("hesap_hareketleri") ?>" method="post">
                                                <button name="selectIban" value="<?= $tl_detail['iban'] ?>" type="submit"  class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </form>
                                        <td align="center"><img class="img-fluid" src="<?= $tl_detail['bankLogo'] ?>" alt="<?= $tl_detail['bankName'] ?>"></td>
                                        </td>
                                        <td align="center"><?= $tl_detail['balanceString'] ?></td>
                                        <td><?= $tl_detail['iban'] ?></td>
                                        <td><?= $tl_detail['updateDateValue'] ?></td>
                                    </tr>
                                <?php
                                    endif;
                                endif;
                            endforeach;  ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- Row 2 -->

        <!-- Row 3 -->
        <div class="row pt-2">

                <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">USD Hesap Listesi</h6>
                    </header>
                    <div class="card-body">

                        <table id="usdhesaplistesi" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Banka</th>
                                <th class="text-custom text-center">Hesap Bakiyesi</th>
                                <th class="text-custom">IBAN</th>
                                <th class="text-custom">Son Güncelleme</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($balance_detail['value'] as $tl_detail):
                            if ($tl_detail['currencyId'] == 2):
                                if ($tl_detail['bankId'] != 999):
                            ?>
                            <tr>
                                <td align="center">
                                    <form action="<?= site_url("hesap_hareketleri") ?>" method="post">
                                        <button name="selectIban" value="<?= $tl_detail['iban'] ?>" type="submit"  class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                <td align="center"><img class="img-fluid" src="<?=  $tl_detail['bankLogo']  ?>" alt="<?= $tl_detail['bankName'] ?>"></td>
                                </td>
                                <td align="center"><?= $tl_detail['balanceString'] ?></td>
                                <td><?= $tl_detail['iban'] ?></td>
                                <td><?= $tl_detail['updateDateValue'] ?></td>
                            </tr>
                            <?php
                            endif;
                            endif;
                            endforeach;  ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

                <div class="col-12 col-sm-6 mb-3">
                    <div class="card h-100">
                        <header class="card-header d-md-flex align-items-center bg-custom2">
                            <h6 class="card-header-title text-light mt-1">EUR Hesap Listesi</h6>
                        </header>
                        <div class="card-body">

                            <table id="eurhesaplistesi" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-custom" width="5%"></th>
                                    <th class="text-custom" width="15%">Banka</th>
                                    <th class="text-custom text-center">Hesap Bakiyesi</th>
                                    <th class="text-custom">IBAN</th>
                                    <th class="text-custom">Son Güncelleme</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($balance_detail['value'] as $tl_detail):
                                    if ($tl_detail['currencyId'] == 3):
                                        if ($tl_detail['bankId'] != 999):
                                        ?>
                                        <tr>
                                            <td align="center">
                                                <form action="<?= site_url("hesap_hareketleri") ?>" method="post">
                                                    <button name="selectIban" value="<?= $tl_detail['iban'] ?>" type="submit"  class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                </form>
                                            <td align="center"><img class="img-fluid" src="<?= $tl_detail['bankLogo'] ?>" alt="<?= $tl_detail['bankName'] ?>"></td>
                                            </td>
                                            <td align="center"><?= $tl_detail['balanceString'] ?></td>
                                            <td><?= $tl_detail['iban'] ?></td>
                                            <td><?= $tl_detail['updateDateValue'] ?></td>
                                        </tr>
                                    <?php
                                     endif;
                                     endif;
                                endforeach;
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

        </div>
        <!-- Row 3 -->

        <!-- Row 4 -->
        <div class="row pt-2">

            <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">GBP Hesap Listesi</h6>
                    </header>
                    <div class="card-body">

                        <table id="gbphesaplistesi" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Banka</th>
                                <th class="text-custom text-center">Hesap Bakiyesi</th>
                                <th class="text-custom">IBAN</th>
                                <th class="text-custom">Son Güncelleme</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($balance_detail['value'] as $tl_detail):
                                if ($tl_detail['currencyId'] == 4):
                                    if ($tl_detail['bankId'] != 999):
                                    ?>
                                    <tr>
                                        <td align="center">
                                            <form action="<?= site_url("hesap_hareketleri") ?>" method="post">
                                                <button name="selectIban" value="<?= $tl_detail['iban'] ?>" type="submit"  class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </form>
                                        <td align="center"><img class="img-fluid" src="<?=  $tl_detail['bankLogo']  ?>" alt="<?= $tl_detail['bankName'] ?>"></td>
                                        </td>
                                        <td align="center"><?= $tl_detail['balanceString'] ?></td>
                                        <td><?= $tl_detail['iban'] ?></td>
                                        <td><?= $tl_detail['updateDateValue'] ?></td>
                                    </tr>
                                <?php
                                endif;
                                endif;
                            endforeach;  ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">CHF Hesap Listesi</h6>
                    </header>
                    <div class="card-body">

                        <table id="chfhesaplistesi" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Banka</th>
                                <th class="text-custom text-center">Hesap Bakiyesi</th>
                                <th class="text-custom">IBAN</th>
                                <th class="text-custom">Son Güncelleme</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($balance_detail['value'] as $tl_detail):
                                if ($tl_detail['currencyId'] == 9):
                                    if ($tl_detail['bankId'] != 999):
                                    ?>
                                    <tr>
                                        <td align="center">
                                            <form action="<?= site_url("hesap_hareketleri") ?>" method="post">
                                                <button name="selectIban" value="<?= $tl_detail['iban'] ?>" type="submit"  class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </form>
                                        <td align="center"><img class="img-fluid" src="<?=  $tl_detail['bankLogo']  ?>" alt="<?= $tl_detail['bankName'] ?>"></td>
                                        </td>
                                        <td align="center"><?= $tl_detail['balanceString'] ?></td>
                                        <td><?= $tl_detail['iban'] ?></td>
                                        <td><?= $tl_detail['updateDateValue'] ?></td>
                                    </tr>
                                <?php
                                endif;
                                endif;
                            endforeach;  ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
        <!-- Row 4 -->




    <!-- Container -->


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
                    $bankString .= "'".$bank['name']."'".",";
                }echo rtrim($bankString,","); ?>],
                datasets: [
                    {
                    label: 'TL',
                    backgroundColor: 'rgba(107, 21, 182, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            echo $bank['tl'].",";
                        }

                        ?>]
                },{
                    label: 'USD',
                    backgroundColor: 'rgba(255, 185, 35, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            echo $bank['usd'].",";
                        }

                        ?>]
                },{
                    label: 'EUR',
                    backgroundColor: 'rgba(255, 87, 86, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
                            echo $bank['euro'].",";
                        }

                        ?>]
                },{
                    label: 'GBP',
                    backgroundColor: 'rgba(124, 241, 219, 0.8)',
                    data: [<?php
                        foreach ($bank_of_total as $bank){
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
                alert("sa");
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

            this.find("option").each(function () {
                var val = $(this).attr("value");

                if (val == undefined)
                    val = '';

                multiCheckBoxDetailBody.append("<div class='cont'><div ><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
            });

            multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
        },
        UpdateSelect: function () {
            var arr = [];

            this.prev().find(".mulinput:checked").each(function () {
                arr.push($(this).val());
            });

            this.val(arr);
        },
    });

    $(document).ready(function () {
        $("#test").CreateMultiCheckBox({  defaultText : 'TC seçiniz' });
        
    });


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

    </body>
    </html>
