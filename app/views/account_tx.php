<?php require 'mainPage_statics/header.php';  ?>
<!--<style>-->
<!--    .selectpicker {-->
<!--        width: 330px !important;-->
<!--    }-->
<!---->
<!--</style>-->
<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Hesap Yönetimi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Hesap Hareketleri</a></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <form action="<?=site_url('account_tx')?>" method="post" >
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Filtreleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row ">
                            <div class="col-12 col-sm-2 p-2  ">
                                <label class="form-label text-custom "><strong>Banka</strong></label>
                                <br>
                                <select multiple title="Seçiniz"  class="small selectpicker" data-live-search="true" name="bank" id="bankName">

                                    <?php for ($i=0;$i<count($bank_of_list['bankName']);$i++): ?>
                                        <option id="bank"  value="<?= $bank_of_list['bankName'][$i] ?>"><?= $bank_of_list['bankName'][$i] ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom">
                                     <strong>IBAN  </strong>
                                </label>
                                <br>
                                <select multiple title="Seçiniz" class="small selectpicker" data-live-search="true" name="iban" id="iban">


                                    <?php foreach ($iban_of_list as $iban): ?>
                                        <option value="<?= $iban ?>"><?= $iban ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Para Birimi</strong></label>
                                <br>
                                <select id="currency" multiple title="Seçiniz" class="small selectpicker" data-live-search="true" name="currency" >
                                    <?php foreach ($currency_of_list as $currency): ?>
                                        <option value="<?= $currency ?>"><?= $currency ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Hareket Tipi</strong></label>
                                <br>
                                <select multiple title="Seçiniz" class="selectpicker" data-live-search="true" data-width="200px" data-size="50" name="transcode" id="transcode">
                                    <option disabled value="">Seçiniz</option>
                                    <?php foreach ($transcode_of_list as $transcode): ?>
                                        <option value="<?= $transcode ?>"><?= $transcode ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input id="minDate"  name="minDate" type="date" class="dateselector  form-control" >
                                <!--<input class="form-control small" name="startDate" id="startDate" type="date"> -->
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>

                               <!-- <input class="form-control small" name="endDate" id="endDate" type="date">-->
                                <input id="maxDate" name="maxDate" type="date"  class="dateselector form-control">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-2 p-2  ">
                                <label class="form-label text-custom "><strong>Firma</strong></label>
                                <br>
                                <select title="Seçiniz"  class="small selectpicker" name="companyName" id="companyName">
                                    <?php foreach ($companynames as $companyname):?>
                                    <option><?=$companyname['companyName']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom "><strong>Başlangıç Tutarı</strong></label>
                              <input value="0.00" class="form-control small money" name="startDate" id="startAmount" step="0.01" type="number"  onchange="formatNumber()" onblur="addZeros(event)">

                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Bitiş Tutarı</strong></label>
                                <input value="0.00" class="form-control small money" name="endDate" id="endAmount" step="0.01" type="number" onchange="formatNumber()" onblur="addZeros(event)">
                            </div>

                            <div class="col-12 col-sm-2 p-2" >
                                <label class="form-label text-custom"  ><strong>Açıklama</strong></label>
                                <br>
                                <input class="form-control small" id="description" name="description">
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class=" row card-footer p-3">
                        <div style="width: 100%" class=" col-1 d-grid gap-2 d-md-flex">
                            <button type="button" id="clear" class="btn btn-sm btn-custom mt-1">Temizle</button>
                        </div>
                        <div class=" col-1 d-grid gap-2 d-md-flex">
                            <button type="submit" name="all" value="1" class="btn btn-sm btn-custom mt-1">Tümünü Getir</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
<!-- Row 1  -->


<!-- Row 2 -->
<div  class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv"  style="" class="answer_list">

    <div class="col-12 col-sm-12 mb-3">
        <div class="card h-100">
            <header class="card-header d-md-flex align-items-center bg-custom2">
                <h6 class="card-header-title text-light mt-1">Hesap Hareketleri</h6>
            </header>
            <?php if(!post('all')):?>
            <small class="ml-1 mt-1">* <?=$daydif.' günlük veri görüntülemektesiniz.'?></small>
            <?php endif;?>
            <div class="card-body">

                <table id="hesaphareketilistesi" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-custom text-center" width="5%">Dekont</th>
                        <th class="text-custom text-center">İşlem Tarihi</th>
                        <th class="text-custom text-center" id="bankNameTH" width="10%">Banka</th>
                        <th class="text-custom text-center">Banka Logo</th>
                        <th class="text-custom text-center">Şube</th>
                        <th class="text-custom text-center">IBAN</th>
                        <th class="text-custom text-center">Hesap No</th>
                        <th class="text-custom text-center" >İşlem Tipi</th>
                        <th class="text-custom text-center">Para Birimi</th>
                        <th class="text-custom text-center">Tutar</th>
                        <th class="text-custom text-center">Bakiye</th>
                        <th class="text-custom text-center" width="25%">Açıklama</th>
                        <th class="text-custom text-center">Firma</th>
                    </tr>
                    </thead>
                    <tbody id="changing">
                    <?php foreach ($details as $detail):
                        if ($detail['bankCode'] != "0999"):

                            ?>
                            <tr>
                                <td align="center">
                                    <a target="_blank" href="<?= site_url('receipt?receiptId='.$detail['id']) ?>"><i style="color: #6B15B6" class="fa-solid fa-file-invoice-dollar"></i></a>
                                </td>
                                <td><?= date("Y-m-d H:i",strtotime($detail['transactionDate'])) ?></td>
                                <td id="bankNameTD" align="center"><?= $detail['bankName'] ?></td>
                                <td align="center"><img style="width:100px" src="<?= $detail['bankLogo'] ?>" alt="<?= $detail['bankName'] ?>"></td>
                                <td><?= $detail['tenantBranchCode']."/".$detail['tenantBranchName'] ?></td>
                                <td><?= $detail['tenantIban'] ?></td>
                                <td align="center"><?= $detail['tenantAccountNumber'] ?></td>
                                <td align="center"><?= $detail['transactionCode'] ?></td>
                                <td align="center"><?= $detail['currency'] ?></td>
                                <td align="center">
                                    <?= number_format( $detail['amountForExcel'],2,',','.') ?>
                                </td>
                                <td align="center"><?= number_format($detail['balanceAfterTransaction'],2,',','.') ?></td>
                                <td><?= $detail['description'] ?></td>
                                <td><?=User::get_company_info($detail['tenantId'])['companyName']?></td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" ></script>
<script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>

<script>
    //reset values when page loading
    $( document ).ready(function() {
        hesaphareketilistesi.columns(1).search("").draw();
        <?php if(get('bankname')):?>
        hesaphareketilistesi.columns(2).search(<?='"'.str_replace('_', ' ', get('bankname')).'"'?>).draw();
        <?php endif;?>
        <?php if(!get('bankname')):?>
        hesaphareketilistesi.columns(2).search("").draw();
        <?php endif;?>
        hesaphareketilistesi.columns(3).search("").draw();
        hesaphareketilistesi.columns(4).search("").draw();
        <?php if(get('iban')):?>
        hesaphareketilistesi.columns(5).search(<?='"'.get('iban').'"'?>).draw();
        <?php endif;?>
        <?php if(!get('iban')):?>
        hesaphareketilistesi.columns(5).search("").draw();
        <?php endif;?>
        <?php if(get('accountno')):?>
        hesaphareketilistesi.columns(6).search(<?='"'.get('accountno').'"'?>).draw();
        <?php endif;?>
        <?php if(!get('accountno')):?>
        hesaphareketilistesi.columns(6).search("").draw();
        <?php endif;?>
         <?php if(get('currency')):?>
        hesaphareketilistesi.columns(7).search(<?='"'.get('currency').'"'?>).draw();
        <?php endif;?>
        <?php if(!get('currency')):?>
        hesaphareketilistesi.columns(7).search("").draw();
        <?php endif;?>

        hesaphareketilistesi.columns(8).search("").draw();
        hesaphareketilistesi.columns(9).search("").draw();
        hesaphareketilistesi.columns(10).search("").draw();
        hesaphareketilistesi.columns(11).search("").draw();
        const curdate = new Date();
        const adaybeforedate = new Date();
        adaybeforedate.setDate(adaybeforedate.getDate()-1);
        $("#minDate").val(moment(adaybeforedate).format('YYYY-MM-DD'));
        $("#maxDate").val(moment(curdate).format('YYYY-MM-DD'));
    });
</script>

<script>
    //reset values when reset button click
    $('#clear').click(function() {
        hesaphareketilistesi.columns(1).search("").draw();
        hesaphareketilistesi.columns(2).search("").draw();
        hesaphareketilistesi.columns(3).search("").draw();
        hesaphareketilistesi.columns(4).search("").draw();
        hesaphareketilistesi.columns(5).search("").draw();
        hesaphareketilistesi.columns(6).search("").draw();
        hesaphareketilistesi.columns(7).search("").draw();
        hesaphareketilistesi.columns(8).search("").draw();
        hesaphareketilistesi.columns(9).search("").draw();
        hesaphareketilistesi.columns(10).search("").draw();
        hesaphareketilistesi.columns(11).search("").draw();
        $("#iban").val([]).trigger('change');
        $("#bankName").val([]).trigger('change');
        $("#currency").val([]).trigger('change');
        $("#transcode").val([]).trigger('change');
        $("#companyName").val("").trigger('change');
        $("#startAmount").val("0");
        $("#endAmount").val("0");
        $("#description").val("");
        const curdate = new Date();
        const adaybeforedate = new Date();
        adaybeforedate.setDate(adaybeforedate.getDate()-1);
        $("#minDate").val(moment(adaybeforedate).format('YYYY-MM-DD'));
        $("#maxDate").val(moment(curdate).format('YYYY-MM-DD'));
    });
</script>

<script>
    function addZeros(event) {
        var input = event.target; // Kullanıcının girdisine erişim sağlar.
        var value = parseFloat(input.value); // Girdideki sayıyı bir ondalık sayıya dönüştürür.
        if (!isNaN(value)) { // Girdi bir sayı ise işleme devam eder.
            value = value.toFixed(2); // Sayıya iki sıfır ekler.
            input.value = value; // Girdiye güncellenmiş değeri yazar.
        }
    }
</script>

<script>
    var hesaphareketilistesi = $('#hesaphareketilistesi').DataTable({
        scrollX: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Excel',
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                    // DataTable'dan ilgili sütunu al
                    var columnData = hesaphareketilistesi.column(8).data().toArray();
                    var columnData1 = hesaphareketilistesi.column(9).data().toArray();
                    // Her bir hücre için işlemleri yap
                    columnData.forEach(function (cellValue, rowIndex) {
                        var parsedString=cellValue.replace('.', '');
                        var parsedValue = parseFloat(parsedString.replace(',', '.'));
                        if (!isNaN(parsedValue) && Math.abs(parsedValue) < 1000) {
                            var cellRef = 'I' + (rowIndex + 3); // rowIndex 0 tabanlı olduğu için +2 eklenir
                            var cell = $('c[r="' + cellRef + '"]', sheet);
                            cell.find('v').text(""+parsedString); // parsedValue'yu direk kullanabilirsiniz
                        }
                    });
                    columnData1.forEach(function (cellValue, rowIndex) {
                        var parsedString=cellValue.replace('.', '');
                        var parsedValue = parseFloat(parsedString.replace(',', '.'));
                        if (!isNaN(parsedValue) && Math.abs(parsedValue) < 1000) {
                            var cellRef = 'J' + (rowIndex + 3); // rowIndex 0 tabanlı olduğu için +2 eklenir
                            var cell = $('c[r="' + cellRef + '"]', sheet);
                            cell.find('v').text(""+parsedString); // parsedValue'yu direk kullanabilirsiniz
                        }
                    });

                }
            },
            'pdf', 'copy', 'print'
        ],
        pageLength: 50
    });


    document.getElementById("bankName").onchange=function () {
        //search for bankname
        var selectedBank = [];
        for (var option of document.getElementById('bankName').options) {
            if (option.selected) {
                selectedBank.push(option.value);
            }
        }
        var textBank = selectedBank.toString().replaceAll(",", "|");
        hesaphareketilistesi.columns(2).search(textBank, true, false).draw();
        //search for bankname done

        //insert to array currently ibans
        var filterIban = hesaphareketilistesi
            .column(5, {search: 'applied'})
            .data()
            .toArray();
        //insert to array currently ibans done

        //clear select opitons
        var itemSelectorOption = $('#iban option');
        itemSelectorOption.remove();
        $('#iban').selectpicker('refresh');
        //clear done

        //unique current ibans
        function unique(arr) {
            var i,
                len = arr.length,
                out = [],
                obj = {};
            for (i = 0; i < len; i++) {
                obj[arr[i]] = 0;
            }
            for (i in obj) {
                out.push(i);
            }
            return out;
        }
        var uniqueIban = unique(filterIban);
        //unique done

        //insert ibans to select options
        $.each(uniqueIban, function(key, value) {
            $('#iban').append($('<option>', { value : value }).text(value));
        });

        $("#iban").selectpicker("refresh");
        //insert ibans to select options done

    }



        document.getElementById("iban").onchange=function () {
            var selectedIban = [];
            for (var option of document.getElementById('iban').options)
            {
                if (option.selected) {
                    selectedIban.push(option.value);
                }
            }
            var textIban=selectedIban.toString().replaceAll(",", "|");
            hesaphareketilistesi.columns(5).search(textIban,true,false).draw();
        }
        document.getElementById("currency").onchange=function () {
            var selectedCurrency = [];
            for (var option of document.getElementById('currency').options)
            {
                if (option.selected) {
                    selectedCurrency.push(option.value);
                }
            }
            var textCurrency=selectedCurrency.toString().replaceAll(",", "|");
            hesaphareketilistesi.columns(7).search(textCurrency,true,false).draw();
        }
        document.getElementById("transcode").onchange=function () {
            var selectedTranscode = [];
            for (var option of document.getElementById('transcode').options)
            {
                if (option.selected) {
                    selectedTranscode.push(option.value);
                }
            }
            var textTranscode=selectedTranscode.toString().replaceAll(",", "|");
            hesaphareketilistesi.columns(6).search(textTranscode,true,false).draw();
        }
            document.getElementById("companyName").onchange=function () {
                hesaphareketilistesi.columns(11).search($('#companyName').val()).draw();
            }


        $('#description').keyup(function() {
            var descriptionArray = $('#description').val().split(" ");
            var descriptionString=descriptionArray.join("|");
            hesaphareketilistesi.columns(10).search(descriptionString,true,false).draw();
        })

        $(".selectpicker").attr("data-size","8");

</script>




<!--date range searching-->
<script>

    $( ".dateselector" ).change(function() {
        var minDate = moment($("#minDate").val()).format('YYYY-MM-DD');
        var maxDate = moment($("#maxDate").val()).format('YYYY-MM-DD');
        var start = new Date(minDate);
        var end = new Date(maxDate);
        var loop = new Date(start);
        var textDateSearh="";
        while(loop <= end){
            var datei=moment(loop).format('YYYY-MM-DD');
            if(moment(loop).format('YYYY-MM-DD')==maxDate){
                textDateSearh+=datei;
            }
            else{
                textDateSearh+=datei+"|";
            }
            var newDate = loop.setDate(loop.getDate() + 1);
            loop = new Date(newDate);
        }
        hesaphareketilistesi.columns(1).search(textDateSearh,true,false).draw();
    });
</script>
<!--money range searching-->
<script>
    $( ".money" ).change(function() {
        //getting values from inputs
        var startAmount=$('#startAmount').val();
        var endAmount=  $('#endAmount').val() ;
        //removing special characters from input
        var startAmount = parseInt(startAmount.replace(',', '').replace('.', ''));
        var endAmount = parseInt(endAmount.replace(',', '').replace('.', ''));
        //resetting money column
        var column = hesaphareketilistesi.column(8);
        column.search("").draw();

        var searchArray = [];
        var parsevalue=0;
        var valuestring="";

        column.data().each(function(value) {//getting each value of column
            valuestring=value.replace(',','').replaceAll('.', "").replace(' ','');//removing special characters
            parsevalue=parseInt(valuestring);//converting values to integer
            if(parsevalue<0){
                parsevalue*=-1; //converting negative values to positive cause want to see all export and import money value
            }
            if(startAmount<=parsevalue){//checking if money values on between startAmount and endAmount
                if(endAmount>=parsevalue){
                    searchArray.push("^"+value+"$");//making values special for exact matching
                }
            }
        });

        var searchValue= searchArray.join("|");//combining values and seperating with |

        column.search(searchValue,true,false).draw();//searching
    });
</script>

</body>
</html>
