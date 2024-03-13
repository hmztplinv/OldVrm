<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Satış Yönetimi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Masraf</a></li>
    </ol>

    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onay Bekleyen Masraf Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="waitingcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center" width="5%">İşlem</th>
                            <th class="text-custom text-center">Şirket Adı</th>
                            <th class="text-custom text-center">Çalışan Adı</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($waitingCosts as $cost): ?>
                            <tr>
                                <td align="center">
                                    <a onclick="approval(<?= $cost['id'] ?>,1)" style="cursor: pointer"><i class="text-success fa-solid fa-check-circle"></i></a>
                                    <a onclick="approval(<?= $cost['id'] ?>,2)" style="cursor: pointer"><i class="text-danger fa-solid fa-xmark-circle"></i></a>
                                </td>
                                <td align="center"><?= Companies::get_company($cost['company_id'])['companyName'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['user_id'])['name'] ?></td>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onayladığınız Masraf Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="acceptedcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Şirket Adı</th>
                            <th class="text-custom text-center">Çalışan Adı</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($acceptedCosts as $cost): ?>
                            <tr>
                                <td align="center"><?= Companies::get_company($cost['company_id'])['companyName'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['user_id'])['name'] ?></td>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Reddettiğiniz Masraf Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="rejectedcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Şirket Adı</th>
                            <th class="text-custom text-center">Çalışan Adı</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rejectedCosts as $cost): ?>
                            <tr>
                                <td align="center"><?= Companies::get_company($cost['company_id'])['companyName'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['user_id'])['name'] ?></td>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'mainPage_statics/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#acceptedcostlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#rejectedcostlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#waitingcostlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>

    <?php if (@$response['suc']): ?>
    swal("Başarılı","<?= $response['suc'] ?>","success").then(function () {
        window.location.reload(false);
    });
    <?php endif; ?>
    <?php if (@$response['err']): ?>
    swal("Başarısız","<?= $response['err'] ?>","error").then(function () {
    });
    <?php endif; ?>
</script>
<script>
    function response(result){

        if (result['suc']){
            swal("Başarılı",result['suc'],"success").then(function () {
                window.location.reload(false);
            });
        }else{
            swal("Başarısız",result['err'],"error").then(function () {
            });
        }
    }
</script>
<script>

    function approval(id,approval){
        $.post("<?= site_url('cost_manager') ?>",{
            id: id,
            approval: approval
        },function (result) {
            response(JSON.parse(result))
        });
    }

</script>