<?php require 'mainPage_statics/header.php' ?>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Hesap Yönetimi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Ödeme İşlemleri</a></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <form action="../../../execution/" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Ödeme İşlemleri</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Banka</strong></label>
                                <select class="form-select small" name="bank">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php for ($i=0;$i<count($list_bank['bankName']);$i++): ?>
                                    <option value="<?= $list_bank['bankId'][$i] ?>"><?= $list_bank['bankName'][$i] ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>IBAN</strong></label>
                                <select class="form-select small" name="iban">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php foreach ($list_iban as $iban): ?>
                                        <option value="<?= $iban ?>"><?= $iban ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Alıcı Adı</strong></label>
                                <input class="form-control small" name="endDate">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Alıcı IBAN</strong></label>
                                <input class="form-control small" name="endDate">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Ödeme Tarihi</strong></label>
                                <input class="form-control small" name="startDate" type="date">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Tutar</strong></label>
                                <input class="form-control small" name="startDate" type="number">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Açıklama</strong></label>
                                <input class="form-control small" name="familyMemberSurname">
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-sm btn-custom mt-1">Onaya Gönder</button>
                            <button type="button" class="btn btn-sm btn-custom mt-1">Excel Yükle</button>
                        </div>

                    </div>
            </form>
        </div>
    </div>

</div>
<!-- Row 1  -->

</div>
<!-- Container -->


<?php require 'mainPage_statics/footer.php'; ?>


<script>
    $(document).ready(function() {
        $('#hesaphareketilistesi').DataTable( {
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
    function showDiv() {
        document.getElementById('welcomeDiv').style.display = "block";
    }
</script>

</body>
</html>