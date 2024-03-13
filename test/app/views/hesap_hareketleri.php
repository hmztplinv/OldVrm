<?php require 'mainPage_statics/header.php'; ?>

<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

	<ol class="breadcrumb small pt-5">
		<li class="breadcrumb-item text-custom">Hesap Yönetimi</li>
		<li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Hesap Hareketleri</a></li>
	</ol>

	<!-- Row 1 -->
	<div class="row pt-2">

		<div class="col-12 col-sm-12 mb-3">
		<form action="../../../execution/" method="POST">
			<div class="card h-100">

			    <header class="card-header d-md-flex align-items-center bg-custom2">
				<h6 class="card-header-title text-light mt-1">Filtreleme</h6>
				</header>

			  	<div class="card-body">
			    <p class="card-text">

				<div class="row">

				    <div class="col-12 col-sm-1 p-2">

				    	<label class="form-label text-custom"><strong>Banka</strong></label>
				      	<select class="form-select small selectbox" name="bank" id="bankName">
				      	<option value="" selected >Seçiniz</option>
                            <?php for ($i=0;$i<count($bank_of_list['bankName']);$i++): ?>

					    <option id="bank"  value="<?= $bank_of_list['bankCode'][$i] ?>"><?= $bank_of_list['bankName'][$i] ?></option>
					        <?php endfor; ?>
					    </select>
				    </div>

				    <div class="col-12 col-sm-2 p-2">
				    	<label class="form-label text-custom"><strong>IBAN</strong></label>
				      	<select class="form-select small" name="iban" id="iban">
				      	<option value="" selected >Seçiniz</option>
                            <?php foreach ($iban_of_list as $iban): ?>
					    <option value="<?= $iban ?>"><?= $iban ?></option>
                            <?php endforeach; ?>
					    </select>
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				    	<label class="form-label text-custom"><strong>Para Birimi</strong></label>
				      	<select class="form-select small" name="currency" id="currency">
				      	<option value="" selected >Seçiniz</option>
                            <?php foreach ($currency_of_list as $currency): ?>
					    <option value="<?= $currency ?>"><?= $currency ?></option>
                            <?php endforeach; ?>
					    </select>
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				    	<label class="form-label text-custom"><strong>Hareket Tipi</strong></label>
				      	<select class="form-select small" name="currency" id="transcode">
				      	<option value="" selected >Seçiniz</option>
                            <?php foreach ($transcode_of_list as $transcode): ?>
					    <option value="<?= $transcode ?>"><?= $transcode ?></option>
                            <?php endforeach; ?>
					    </select>
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
				      	<input class="form-control small" name="startDate" id="startDate" type="date">
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>
				      	<input class="form-control small" name="endDate" id="endDate" type="date">
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Başlangıç Tutarı</strong></label>
				      	<input class="form-control small" name="startDate" id="startAmount" type="number">
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Bitiş Tutarı</strong></label>
				      	<input class="form-control small" name="endDate" id="endAmount" type="number">
				    </div>

				    <div class="col-12 col-sm-3 p-2">
				    	<label class="form-label text-custom"><strong>Açıklama</strong></label>
				      	<input class="form-control small" id="description" name="familyMemberSurname">
				    </div>

				</div>
				</p>
			</div>

				<div class="card-footer p-3">
				<div class="d-grid gap-2 d-md-flex">
					<button type="button" name="answer" value="Show Div" onclick="showDiv()" class="btn btn-sm btn-custom mt-1">Sorgula</button>
                    <button type="button" id="clear" class="btn btn-sm btn-custom mt-1">Temizle</button>
				</div>
				</div>
		</form>
		</div>
	</div>

	</div>
	<!-- Row 1  -->


	<!-- Row 2 -->
	<div  class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv"  style="display:none;" class="answer_list">

		<div class="col-12 col-sm-12 mb-3">
			<div class="card h-100">
			  <header class="card-header d-md-flex align-items-center bg-custom2">
				<h6 class="card-header-title text-light mt-1">Hesap Hareketleri</h6>
			  </header>
			  <div class="card-body">

			    <table id="hesaphareketilistesi" class="display" style="width:100%">
				    <thead>
				        <tr>
				           	<th class="text-custom" width="5%"></th>
				            <th class="text-custom">İşlem Tarihi</th>
				            <th class="text-custom" width="10%">Banka</th>
				            <th class="text-custom">Şube</th>
				            <th class="text-custom">IBAN</th>
				            <th class="text-custom text-center">Para Birimi</th>
				            <th class="text-custom text-center">İşlem Tipi</th>
				            <th class="text-custom text-center">Tutar</th>
				            <th class="text-custom text-center">Bakiye</th>
				            <th class="text-custom" width="25%">Açıklama</th>
				        </tr>
				    </thead>
				    <tbody id="changing">
                    <?php foreach ($details as $detail):
                        if ($detail['bankCode'] != "0999"):
                        ?>
                        <tr>
                            <td align="center">
                                <form action="ozluk/" method="POST">
                                    <input type="hidden" id="registry" name="registry" value="<?= session('user_id') ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </td>
                            <td><?= $detail['transactionDate'] ?></td>
                            <td align="center"><img class="img-fluid" src="<?= $detail['bankLogo'] ?>" alt="<?= $detail['bankName'] ?>"></td>
                            <td><?= $detail['tenantBranchCode']."/".$detail['tenantBranchName'] ?></td>
                            <td><?= $detail['tenantIban'] ?></td>
                            <td align="center"><?= $detail['currency'] ?></td>
                            <td align="center"><?= $detail['transactionCode'] ?></td>
                            <td align="center"><?= $detail['amountString'] ?></td>
                            <td align="center"><?= $detail['balanceAfterTransaction'] ?></td>
                            <td><?= $detail['description'] ?></td>
                        </tr>
                    <?php
                     endif;
                     endforeach; ?>
                    </tbody>
                </table>

</div>
</div>
</div>

</div>
<!-- Row 2 -->

</div>
<!-- Container -->


<?php require 'mainPage_statics/footer.php';?>


<script>
    $(document).ready(function() {
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
    })
</script>

<script>


    function showDiv() {
        var bankName = [];
        for (var i=1;i<document.getElementById("bankName").options.length;i++){
            if (document.getElementById("bankName").options[i].selected === true){
                bankName.push(document.getElementById("bankName").options[i].value);
            }
        }
        var iban = [];
        for (var i=1;i<document.getElementById("iban").options.length;i++){
            if (document.getElementById("iban").options[i].selected === true){
                iban.push(document.getElementById("iban").options[i].value);
            }
        }
        var currency = [];
        for (var i=1;i<document.getElementById("currency").options.length;i++){
            if (document.getElementById("currency").options[i].selected === true){
                currency.push(document.getElementById("currency").options[i].value);
            }
        }
        var transcode = [];
        for (var i=1;i<document.getElementById("transcode").options.length-1;i++){
            if (document.getElementById("transcode").options[i].selected === true){
                transcode.push(document.getElementById("transcode").options[i].value);
            }
        }
        var startDate = document.getElementById("startDate").value;
        var endDate = document.getElementById("endDate").value;
        var startAmount = document.getElementById("startAmount").value;
        var endAmount = document.getElementById("endAmount").value;
        var description = document.getElementById("description").value;

        if (bankName.length !== 0 || iban.length !== 0 || currency.length !== 0 || transcode.length !== 0 || startDate != "" || endDate != "" || startAmount != "" || endAmount != "" || description != ""){

            $.post("<?= site_url('hesap_hareketleri') ?>", {
                bankName: bankName,
                iban: iban,
                currency: currency,
                transcode: transcode,
                startDate: startDate,
                endDate: endDate,
                startAmount: startAmount,
                endAmount: endAmount,
                description: description
            }, function (result) {

                $('#hesaphareketilistesi').DataTable().destroy();
                document.getElementById('changing').innerHTML = result;
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
                document.getElementById("welcomeDiv").style = "display:absolute";

            })
        }else{
            document.getElementById("welcomeDiv").style = "display:absolute";
        }

    }

    <?php if (@$dsa != 0): ?>
        document.getElementById("bankName").value = "<?= $dsa ?>";
    $.post("<?= site_url('hesap_hareketleri') ?>", {
        bankName: <?= $dsa ?>
    }, function (result) {
        $('#hesaphareketilistesi').DataTable().destroy();
        document.getElementById('changing').innerHTML = result;
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
        document.getElementById("welcomeDiv").style = "display:absolute";

    });
    <?php endif; ?>

</script>
<script>
    <?php if (@$selectIban != ""): ?>
        document.getElementById("iban").value = "<?= $selectIban ?>";
    $.post("<?= site_url('hesap_hareketleri') ?>", {
        iban: "<?= $selectIban ?>"
    }, function (result) {
        $('#hesaphareketilistesi').DataTable().destroy();
        document.getElementById('changing').innerHTML = result;
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
        document.getElementById("welcomeDiv").style = "display:absolute";

    });
    <?php endif; ?>
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
                        $.post("<?= site_url('hesap_hareketleri') ?>", {
                            changeBankId: bankId
                        }, function (result) {
                            result = JSON.parse(result);
                            for (var i = 1; i < document.getElementById("iban").options.length; i++) {
                                document.getElementById(document.getElementById("iban").options[i].value).style.display = "none";
                                if (result['bankName'].includes(document.getElementById("iban").options[i].value)) {
                                    document.getElementById(document.getElementById("iban").options[i].value).style.display = "block";
                                }
                            }
                            for (var i = 1; i < document.getElementById("currency").options.length; i++) {
                                document.getElementById(document.getElementById("currency").options[i].value).style.display = "none";
                                if (result['currency'].includes(document.getElementById("currency").options[i].value)) {
                                    document.getElementById(document.getElementById("currency").options[i].value).style.display = "block";
                                }
                            }
                            for (var i = 1; i < document.getElementById("transcode").options.length; i++) {
                                document.getElementById(document.getElementById("transcode").options[i].value).style.display = "none";
                                if (result['transcode'].includes(document.getElementById("transcode").options[i].value)) {
                                    document.getElementById(document.getElementById("transcode").options[i].value).style.display = "block";
                                }
                            }


                        });
                    }
                    changeIban = [];
                    for (var i=1;i<document.getElementById("iban").options.length;i++){
                        if (document.getElementById("iban").options[i].selected === true){
                            changeIban.push(document.getElementById("iban").options[i].value);
                        }
                    }
                    if (changeIban.length != 0) {
                        $.post("<?= site_url('hesap_hareketleri') ?>", {
                            changeIban: changeIban
                        }, function (result) {
                            result = JSON.parse(result);
                            for (var i = 1; i < document.getElementById("bankName").options.length; i++) {
                                document.getElementById(document.getElementById("bankName").options[i].value).style.display = "none";
                                if (result['bankName'].includes(parseInt(document.getElementById("bankName").options[i].value))) {
                                    document.getElementById(document.getElementById("bankName").options[i].value).style.display = "block";
                                }
                            }

                            for (var i = 1; i < document.getElementById("currency").options.length; i++) {
                                document.getElementById(document.getElementById("currency").options[i].value).style.display = "none";
                                if (result['currency'].includes(document.getElementById("currency").options[i].value)) {
                                    document.getElementById(document.getElementById("currency").options[i].value).style.display = "block";
                                }
                            }
                            for (var i = 1; i < document.getElementById("transcode").options.length; i++) {
                                document.getElementById(document.getElementById("transcode").options[i].value).style.display = "none";
                                if (result['transcode'].includes(document.getElementById("transcode").options[i].value)) {
                                    document.getElementById(document.getElementById("transcode").options[i].value).style.display = "block";
                                }
                            }


                        });
                    }
                    changeCurrency = [];
                    for (var i=1;i<document.getElementById("currency").options.length;i++){
                        if (document.getElementById("currency").options[i].selected === true){
                            changeCurrency.push(document.getElementById("currency").options[i].value);
                        }
                    }
                    if (changeCurrency.length != 0) {
                        $.post("<?= site_url('hesap_hareketleri') ?>", {
                            changeCurrency: changeCurrency
                        }, function (result) {
                            result = JSON.parse(result);
                            for (var i = 1; i < document.getElementById("bankName").options.length; i++) {
                                document.getElementById(document.getElementById("bankName").options[i].value).style.display = "none";
                                if (result['bankName'].includes(parseInt(document.getElementById("bankName").options[i].value))) {
                                    document.getElementById(document.getElementById("bankName").options[i].value).style.display = "block";
                                }
                            }

                            for (var i = 1; i < document.getElementById("iban").options.length; i++) {
                                document.getElementById(document.getElementById("iban").options[i].value).style.display = "none";
                                if (result['iban'].includes(document.getElementById("iban").options[i].value)) {
                                    document.getElementById(document.getElementById("iban").options[i].value).style.display = "block";
                                }
                            }
                            for (var i = 1; i < document.getElementById("transcode").options.length; i++) {
                                document.getElementById(document.getElementById("transcode").options[i].value).style.display = "none";
                                if (result['transcode'].includes(document.getElementById("transcode").options[i].value)) {
                                    document.getElementById(document.getElementById("transcode").options[i].value).style.display = "block";
                                }
                            }


                        });
                    }
                    changeTranscode = [];
                    for (var i=1;i<document.getElementById("transcode").options.length;i++){
                        if (document.getElementById("transcode").options[i].selected === true){
                            changeTranscode.push(document.getElementById("transcode").options[i].value);
                        }
                    }
                    if (changeTranscode.length != 0){
                        $.post("<?= site_url('hesap_hareketleri') ?>",{
                            changeTranscode: changeTranscode
                        },function (result){
                            result = JSON.parse(result);
                            for (var i=1;i<document.getElementById("bankName").options.length;i++){
                                document.getElementById(document.getElementById("bankName").options[i].value).style.display = "none";
                                if (result['bankName'].includes(parseInt(document.getElementById("bankName").options[i].value))){
                                    document.getElementById(document.getElementById("bankName").options[i].value).style.display = "block";
                                }
                            }

                            for (var i=1;i<document.getElementById("iban").options.length;i++){
                                document.getElementById(document.getElementById("iban").options[i].value).style.display = "none";
                                if (result['iban'].includes(document.getElementById("iban").options[i].value)){
                                    document.getElementById(document.getElementById("iban").options[i].value).style.display = "block";
                                }
                            }
                            for (var i=1;i<document.getElementById("currency").options.length;i++){
                                document.getElementById(document.getElementById("currency").options[i].value).style.display = "none";
                                if (result['currency'].includes(document.getElementById("currency").options[i].value)){
                                    document.getElementById(document.getElementById("currency").options[i].value).style.display = "block";
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

                var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
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
            $("#bankName").CreateMultiCheckBox({ width: '108px', defaultText : 'Seçiniz', height:'250px',optionwidth: '250px' });
        });
        $(document).ready(function () {
            $("#iban").CreateMultiCheckBox({ width: '232px', defaultText : 'Seçiniz', height:'250px',optionwidth: '290px' });
        });
        $(document).ready(function () {
            $("#currency").CreateMultiCheckBox({ width: '108px', defaultText : 'Seçiniz', height:'250px',optionwidth: '150px' });
        });
        $(document).ready(function () {
            $("#transcode").CreateMultiCheckBox({ width: '108px', defaultText : 'Seçiniz', height:'250px',optionwidth: '150px' });
        });
</script>
<script>





    document.getElementById("clear").onclick = function (){
        //$("#bankName").val([]);

            var inp = $(".MultiCheckBoxDetailBody").find("input");
            var chk = inp.prop("checked");
            inp.prop("checked", !chk);
            $(".MultiCheckBoxDetailBody").closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
            $(".MultiCheckBoxDetailBody").closest(".MultiCheckBoxDetail").next().UpdateSelect();
        var inp = $(".MultiCheckBoxDetailBody").find("input");
        var chk = inp.prop("checked");
        inp.prop("checked", !chk);
        $(".MultiCheckBoxDetailBody").closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
        $(".MultiCheckBoxDetailBody").closest(".MultiCheckBoxDetail").next().UpdateSelect();


        document.getElementById("startDate").value = "";
        document.getElementById("endDate").value = "";
        document.getElementById("startAmount").value = "";
        document.getElementById("endAmount").value = "";
        document.getElementById("description").value = "";

        $.post("<?= site_url('hesap_hareketleri') ?>", {
            clear: 1
        }, function (result) {
            $('#hesaphareketilistesi').DataTable().destroy();
            document.getElementById('changing').innerHTML = result;
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
            document.getElementById("welcomeDiv").style = "display:absolute";

        })


    }
</script>