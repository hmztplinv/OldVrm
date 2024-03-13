<?php require 'mainPage_statics/header.php' ?>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Hesap Yönetimi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">POS</a></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Valör Raporu</h6>
                </header>
                <div class="card-body">

                    <table id="valorraporu" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom text-center" width="15%">Valör Tarihi</th>
                            <th class="text-custom text-center">İşlem Tutarı</th>
                            <th class="text-custom text-center">Komisyon</th>
                            <th class="text-custom text-center">Net Tutar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=1;$i<=12;$i++): ?>
                        <tr>
                            <td align="center">
                                <form action="../hesap-hareketleri/" method="POST">
                                    <input type="hidden" id="iban" name="iban" value="TR323232323232323223232">
                                    <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            <td align="center"><?= $i-1<=(12-date("m")) ? date("Y") : date("Y",strtotime("+1 year")) ?>/<?= $i == 1 ? $monthsTR[date("m")] : $monthsTR[date("m",strtotime("+".($i-1)." Month"))] ?></td>
                            <td align="center"><?= $total[$i]['transaction'] ?></td>
                            <td align="center"><?= $total[$i]['commission'] ?></td>
                            <td align="center"><?= $total[$i]['amount'] ?></td>
                        </tr>
                        <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Banka Bazında Valör</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="bankChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row 1 -->


    <!-- Row 2 -->
    <div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <form action="../../../execution/" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">POS Hareketleri</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Banka</strong></label>
                                <select id="bankName" class="form-select small" name="bank">
                                    <?php for($i=0;$i<count($list_bank['bankName']);$i++): ?>
                                    <option value="<?= $list_bank['bankId'][$i] ?>"><?= $list_bank['bankName'][$i] ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Üye İşyeri</strong></label>
                                <select id="member" class="form-select small" name="currency">
                                    <?php foreach ($list_member as $member): ?>
                                    <option value="<?= $member ?>"><?= $member ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input id="startDate" class="form-control small" name="startDate" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>
                                <input id="endDate" class="form-control small" name="endDate" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tutarı</strong></label>
                                <input id="startAmount" class="form-control small"  name="startAmount" type="number">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Bitiş Tutarı</strong></label>
                                <input id="endAmount" class="form-control small" name="endAmount" type="number">
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" name="answer" value="Show Div" onclick="showDiv()" class="btn btn-sm btn-custom mt-1">Sorgula</button>
                            <button type="button"  id="clear" class="btn btn-sm btn-custom mt-1">Temizle</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
<!-- Row 2 -->


<!-- Row 3 -->
<div class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv"  style="display:none;" class="answer_list">

    <div class="col-12 col-sm-12 mb-3">
        <div class="card h-100">
            <header class="card-header d-md-flex align-items-center bg-custom2">
                <h6 class="card-header-title text-light mt-1">POS Hareketleri</h6>
            </header>
            <div class="card-body">

                <table id="poshareketleri" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-custom" width="5%"></th>
                        <th class="text-custom" width="7%">Banka</th>
                        <th class="text-custom text-center">Üye İşyeri</th>
                        <th class="text-custom text-center">Terminal</th>
                        <th class="text-custom text-center">Provizyon</th>
                        <th class="text-custom text-center">İşlem Tar.</th>
                        <th class="text-custom text-center">Valör Tar.</th>
                        <th class="text-custom text-center">Tutar</th>
                        <th class="text-custom text-center">Komisyon Oranı</th>
                        <th class="text-custom text-center">Komisyon Tutarı</th>
                        <th class="text-custom text-center">Net Tutar</th>
                        <th class="text-custom text-center">Para Birimi</th>
                        <th class="text-custom text-center">Taksit Sayısı</th>
                        <th class="text-custom text-center">Taksit Sırası</th>
                    </tr>
                    </thead>
                    <tbody id="changingPOS">
                    <?php foreach ($pos['value'] as $po): ?>
                    <tr>
                        <td align="center">
                            <form action="../hesap-hareketleri/" method="POST">
                                <input type="hidden" id="iban" name="iban" value="TR323232323232323223232">
                                <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        <td align="center"><img class="img-fluid" src="<?= $po['posBankLogo'] ?>" alt="<?= $po['posBankName'] ?>"></td>
                        </td>
                        <td align="center"><?= $po['memberWorkplaceName']. " (". $po['memberWorkplaceNumber'].")" ?></td>
                        <td align="center"><?= $po['terminalNumber'] ?></td>
                        <td align="center"><?= $po['provisionNumber'] ?></td>
                        <?php $clock =  explode('T',$po['operationDate'])[1] ?>
                        <td><?= explode('T',$po['operationDate'])[0]." ".explode('+',$clock)[0] ?></td>
                        <?php $clock =  explode('T',$po['valueDate'])[1] ?>
                        <td><?= explode('T',$po['valueDate'])[0]." ".explode('+',$clock)[0] ?></td>
                        <td align="center"><?= $po['amount'] ?></td>
                        <td align="center"><?= $po['commissionRate'] ?></td>
                        <td align="center"><?= $po['totalCommissionAmount'] ?></td>
                        <td align="center"><?= $po['netAmount'] ?></td>
                        <td align="center"><?= $po['currency'] ?></td>
                        <td align="center"><?= $po['installmentCount'] ?></td>
                        <td align="center"><?= $po['installmentOrder'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- Row 3 -->


</div>
<!-- Container -->


<?php require 'mainPage_statics/footer.php'; ?>

<script>
    function showDiv() {
        var bankName = [];
        for (var i=1;i<document.getElementById("bankName").options.length;i++){
            if (document.getElementById("bankName").options[i].selected === true){
                bankName.push(document.getElementById("bankName").options[i].value);
            }
        }

        var member = [];
        for (var i=1;i<document.getElementById("member").options.length;i++){
            if (document.getElementById("member").options[i].selected === true){
                member.push(document.getElementById("member").options[i].value);
            }
        }

        var startDate = document.getElementById("startDate").value;
        var endDate = document.getElementById("endDate").value;
        var startAmount = document.getElementById("startAmount").value;
        var endAmount = document.getElementById("endAmount").value;
        if (bankName.length != 0 || member != "" ||  startDate != "" || endDate != "" || startAmount != "" || endAmount != "" ){
            $.post("<?= site_url('pos') ?>", {

                bankName: bankName,
                member: member,
                startDate: startDate,
                endDate: endDate,
                startAmount: startAmount,
                endAmount: endAmount,
            }, function (result) {
                $('#poshareketleri').DataTable().destroy();
                document.getElementById('changingPOS').innerHTML = result;
                $('#poshareketleri').DataTable( {
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
                document.getElementById("welcomeDiv").style = "display:block";

            })
        }else{
            document.getElementById("welcomeDiv").style = "display:block";
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
                foreach ($list_bank['bankName'] as $item){
                    $bankString .= "'".$item ."',";
                }
                echo rtrim($bankString,",");
                ?>],
            datasets: [{
                label: <?= "'".$monthsTR[date("m")]."'" ?>,
                backgroundColor: 'rgba(107, 21, 182, 0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                            if (array_key_exists(1,$bank)){
                                if (intval($bank[1]) > 0)
                                @$valueString .= intval($bank[1]).",";
                            }else{
                                $valueString .= "0".",";
                            }
                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php if (@$totalBank[0][2] != 0): ?> {
                label: <?= "'".$monthsTR[date("m",strtotime("+1 Months"))]."'" ?>,
                backgroundColor: 'rgba(255, 185, 35, 0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                            if (array_key_exists(2,$bank)){
                                if (intval($bank[2]) > 0)
                                @$valueString .= intval($bank[2]).",";
                            }else{
                                $valueString .= "0".",";
                            }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][3] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+2 Months"))]."'" ?>,
                backgroundColor: 'rgba(255, 87, 86, 0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                            if (array_key_exists(3,$bank)){
                                if (intval($bank[3]) > 0)
                                @$valueString .= intval($bank[3]).",";
                            }else{
                                $valueString .= "0".",";
                            }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][4] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+3 Months"))]."'" ?>,
                backgroundColor: 'rgba(114, 211, 220, 0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                            if (array_key_exists(4,$bank)){
                                if (intval($bank[4]) > 0)
                                @$valueString .= intval($bank[4]).",";
                            }else{
                                $valueString .= "0".",";
                            }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][5] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+4 Months"))]."'" ?>,
                backgroundColor: 'rgba(67,148,192,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                            if (array_key_exists(5,$bank)){
                                if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                            }else{
                                $valueString .= "0".",";
                            }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][6] != 0): ?> {
                label: <?= "'".$monthsTR[date("m",strtotime("+5 Months"))]."'" ?>,
                backgroundColor: 'rgba(5,110,92,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][7] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+6 Months"))]."'" ?>,
                backgroundColor: 'rgba(225,171,70,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][8] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+7 Months"))]."'" ?>,
                backgroundColor: 'rgba(246,5,25,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][9] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+8 Months"))]."'" ?>,
                backgroundColor: 'rgba(13,79,23,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][10] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+9 Months"))]."'" ?>,
                backgroundColor: 'rgba(22,39,224,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif; if (@$totalBank[0][11] != 0): ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+10 Months"))]."'" ?>,
                backgroundColor: 'rgba(215,46,231,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php echo ","; endif;if (@$totalBank[0][12] != 0):  ?>{
                label: <?= "'".$monthsTR[date("m",strtotime("+11 Months"))]."'" ?>,
                backgroundColor: 'rgba(150,195,227,0.8)',
                data: [<?php
                    $valueString = "";
                    foreach ($totalBank as $bank){
                        if (array_key_exists(5,$bank)){
                            if (intval($bank[5]) > 0)
                                @$valueString .= intval($bank[5]).",";
                        }else{
                            $valueString .= "0".",";
                        }

                    }
                    echo rtrim($valueString,",");
                    ?>]
            }<?php endif; ?>]
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
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#valorraporu').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength : 6
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#poshareketleri').DataTable({
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

    document.getElementById("clear").onclick = function (){
        var bank = document.getElementById("bankName");
        var member = document.getElementById("member");
        document.getElementById("startDate").value = "";
        document.getElementById("endDate").value = "";
        document.getElementById("startAmount").value = "";
        document.getElementById("endAmount").value = "";
        bank.selectedIndex = "0";
        $(bank.options[0]).removeAttr('disabled').show();
        member.selectedIndex = "0";
        $(member.options[0]).removeAttr('disabled').show();
        $.post("<?= site_url('pos') ?>", {
            clear: 1
        }, function (result) {
            $('#poshareketleri').DataTable().destroy();
            document.getElementById('changingPOS').innerHTML = result;
            $('#poshareketleri').DataTable( {
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
            document.getElementById("welcomeDiv").style = "display:block";

        })
    }

</script>

</body>
</html>

<script>
    $(document).ready(function () {
        $(document).on("click", ".MultiCheckBox", function () {
            var detail = $(this).next();
            detail.show();
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

                bankId = [];
                for (var i=1;i<document.getElementById("bankName").options.length;i++){
                   if (document.getElementById("bankName").options[i].selected === true){
                       bankId.push(document.getElementById("bankName").options[i].value);
                   }
                }
                if (bankId.length != 0) {
                    $.post("<?= site_url('pos') ?>", {
                        changeBankId: bankId
                    }, function (result) {
                        result = JSON.parse(result);
                        for (var i = 0; i < document.getElementById("member").options.length; i++) {
                            document.getElementById(document.getElementById("member").options[i].value).style.display = "none";
                            if (result.includes(document.getElementById("member").options[i].value)) {
                                document.getElementById(document.getElementById("member").options[i].value).style.display = "block";
                            }
                        }
                    });
                }
                var changeMember = [];
                for (var i=1;i<document.getElementById("member").options.length;i++){
                    if (document.getElementById("Pos Deneme").options[i].selected === true){
                        changeMember.push(document.getElementById("member").options[i].value);
                    }
                }
                if (changeMember.length != 0) {
                    $.post("<?= site_url('pos') ?>", {
                        changeMember: changeMember
                    }, function (result) {
                        result = JSON.parse(result);
                        for (var i = 0; i < document.getElementById("bankName").options.length; i++) {
                            document.getElementById(document.getElementById("bankName").options[i].value).style.display = "none";
                            if (result.includes(document.getElementById("bankName").options[i].value)) {
                                document.getElementById(document.getElementById("bankName").options[i].value).style.display = "block";
                            }
                        }
                    });
                }

                container.hide();
            }
        });
    });

    var defaultMultiCheckBoxOption = { width: '220px', defaultText: 'Select Below', height: '200px' };

    jQuery.fn.extend({
        CreateMultiCheckBox: function (options) {

            var localOption = {};
            localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
            localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
            localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

            this.hide();
            this.attr("multiple", "multiple");
            var divSel = $("<div class='MultiCheckBox form-select small' id='bankNam' style='font-size: 12.5px'>" + localOption.defaultText + "<span class=''></span></div>").insertBefore(this);
            divSel.css({ "width": localOption.width });

            var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Hepsini Seç</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
            detail.css({ "width": options.optionwidth, "max-height": localOption.height });
            var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

            this.find("option").each(function () {
                var val = $(this).attr("value");

                if (val == undefined)
                    val = '';

                multiCheckBoxDetailBody.append("<div class='cont'  id='"+val+"'><div><input id='bank"+val+"' type='checkbox' class='mulinput' value='" + val + "' /></div><div style='font-weight: normal;white-space: nowrap;min-height: 1.2em;padding: 0px 10px 1px;'>" +"  "+ $(this).text() + "</div></div>");
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
        $("#bankName").CreateMultiCheckBox({ width: '232px', defaultText : 'Seçiniz', height:'250px',optionwidth: '233px' });
    });
    $(document).ready(function () {
        $("#member").CreateMultiCheckBox({ width: '232px', defaultText : 'Seçiniz', height:'250px',optionwidth: '233px' });
    });
</script>