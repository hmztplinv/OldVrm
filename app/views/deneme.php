
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


<!-- $queryAccept=$db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE status=1 AND factoryAuth=2");-->
<!-- $queryAccept=$db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE status=1 AND factoryAuth="3"");-->
<!-- $queryAccept=$db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE status=1 AND factoryAuth="4"");-->
<!-- $queryAccept=$db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE status=1 AND factoryAuth="5"");-->
<!-- $queryAccept=$db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE status=1 AND factoryAuth="6"");-->




---
<script>
    <?php if (factoryAuth == 2): ?>
    document.getElementById("$factory").onclick = function () {
        if (document.getElementById("factoryConfirm").dataset.value == "0"){
            $.post("<?= site_url('detail_complaint') ?>",{
                setFactoryConfirm:1,
                complaint_id:<?= $complaint['id'] ?>
            },function (result) {
                alert(result);
            });
            document.getElementById("factoryConfirm").dataset.value = "1";
        }else{
            $.post("<?= site_url('detail_complaint') ?>",{
                setFactoryConfirm:0,
                complaint_id:<?= $complaint['id'] ?>
            },function (result) {
                alert(result);
            });
            document.getElementById("factoryConfirm").dataset.value = "0";
        }

    }
    <?php elseif ($factoryAuth == 3): ?>
    document.getElementById("technicalConfirm").onchange = function () {
        if (document.getElementById("technicalConfirm").dataset.value == "0"){

            $.post("<?= site_url('detail_complaint') ?>",{
                setTechnicalConfirm:1,
                complaint_id:<?= $complaint['id'] ?>
            },function (result) {
                alert(result);
            });
            document.getElementById("technicalConfirm").dataset.value = "1";
        }else{
            $.post("<?= site_url('detail_complaint') ?>",{
                setTechnicalConfirm:0,
                complaint_id:<?= $complaint['id'] ?>
            },function (result) {
                alert(result);
            });
            document.getElementById("technicalConfirm").dataset.value = "0";
        }

    }
    <?php elseif ($confirmed == 2): ?>
    document.getElementById("processConfirm").onchange = function () {
        if (document.getElementById("processConfirm").dataset.value == "0"){
            $.post("<?= site_url('detail_complaint') ?>",{
                setProcessConfirm:1,
                complaint_id:<?= $complaint['id'] ?>
            },function (result) {
                alert(result);
            });
            document.getElementById("processConfirm").dataset.value = "1";
        }else{
            $.post("<?= site_url('detail_complaint') ?>",{
                setProcessConfirm:0,
                complaint_id:<?= $complaint['id'] ?>
            },function (result) {
                alert(result);
            });
            document.getElementById("processConfirm").dataset.value = "0";
        }

    }
    <?php endif; ?>

    function setReporting(reporting,reportId){

        $.post("<?= site_url('detail_complaint') ?>", {
            setReport:1,
            reporting:reporting,
            reportId: reportId
        }, function (result) {
            alert(result)
        });


    }
</script>



var ctx = document.getElementById("totalChart");
var myChart = new Chart(ctx, {
type: 'doughnut',
data: {
labels: [
'Kabul Edilen Metraj Bilgisi',
'Red Edilen Metraj Bilgisi'
],
datasets: [{
label: 'Total',
data: [

<?php
$queryAccept=$db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE status=1");
$queryAccept->execute();
$accept=$queryAccept->fetch(PDO::FETCH_ASSOC)['kabul'];
print_r($accept);
?>,
<?php

$queryTotal=$db->prepare("SELECT SUM(productQuantity) AS toplam FROM complaint WHERE status=1");
$queryTotal->execute();
$total=$queryTotal->fetch(PDO::FETCH_ASSOC)['toplam'];?>
<?php print_r($total-$accept) ?>

],
backgroundColor: [
'rgba(107, 21, 182, 0.8)',
'rgba(255, 185, 35, 0.8)',
'rgba(255, 87, 86, 0.8)',
'rgba(114, 211, 220, 0.8)',
'rgba(123, 192, 67, 0.8)',
'rgba(77, 100, 141, 0.8)',
'rgba(170, 170, 170, 0.8)',
'rgba(223, 162, 144, 0.8)',
'rgba(255, 238, 173, 0.8)',
'rgba(133, 68, 66, 0.8)',
'rgba(249, 180, 45, 0.8)',
'rgba(253, 244, 152, 0.8)',
],
borderWidth: 1
}]
},
options: {
responsive: true,
width: 400,
height:400,
},
options: {
plugins: {
legend: {
display: false
},
},
}
});
