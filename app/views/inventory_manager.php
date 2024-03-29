<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İdari İşler</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Envanter Yönetimi</a></li>
    </ol>

    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onay Bekleyen Envanter Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="waitingovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center" width="5%">İşlem</th>
                            <th class="text-custom text-center">Departman</th>
                            <th class="text-custom text-center">Kullanıcı</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Tip Adı</th>
                            <th class="text-custom text-center">Marka</th>
                            <th class="text-custom text-center">Model</th>
                            <th class="text-custom text-center">Fiyat</th>
                            <th class="text-custom text-center">Ürün Alım Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($waitingInventory as $inventory): ?>
                            <tr>
                                <td align="center">
                                    <a onclick="approval(<?= $inventory['id'] ?>,1)" style="cursor: pointer"><i class="text-success fa-solid fa-check-circle"></i></a>
                                    <a onclick="approval(<?= $inventory['id'] ?>,2)" style="cursor: pointer"><i class="text-danger fa-solid fa-xmark-circle"></i></a>
                                </td>
                                <td align="center"><?= Parameters::specific_parameter('departmentId','departmentName',$inventory['department_id'])['departmentName'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['owner_id'])['name'] ?></td>
                                <td align="center"><?= $inventory['created_at'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryTypeId','inventoryTypeName',$inventory['type_id'])['inventoryTypeName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryBrandId','inventoryBrandName',$inventory['brand_id'])['inventoryBrandName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryModelId','inventoryModelName',$inventory['model_id'])['inventoryModelName'] ?></td>
                                <td align="center"><?= $inventory['amount'] ?></td>
                                <td align="center"><?= $inventory['purchase_date'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">Onayladığınız Fazla Mesai Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="acceptedovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Departman</th>
                            <th class="text-custom text-center">Kullanıcı</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Tip Adı</th>
                            <th class="text-custom text-center">Marka</th>
                            <th class="text-custom text-center">Model</th>
                            <th class="text-custom text-center">Fiyat</th>
                            <th class="text-custom text-center">Ürün Alım Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($acceptedInventory as $inventory): ?>
                            <tr>
                                <td align="center"><?= Parameters::specific_parameter('departmentId','departmentName',$inventory['department_id'])['departmentName'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['owner_id'])['name'] ?></td>
                                <td align="center"><?= $inventory['created_at'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryTypeId','inventoryTypeName',$inventory['type_id'])['inventoryTypeName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryBrandId','inventoryBrandName',$inventory['brand_id'])['inventoryBrandName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryModelId','inventoryModelName',$inventory['model_id'])['inventoryModelName'] ?></td>
                                <td align="center"><?= $inventory['amount'] ?></td>
                                <td align="center"><?= $inventory['purchase_date'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">Reddettiğiniz Fazla Mesai Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="rejectedovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Departman</th>
                            <th class="text-custom text-center">Kullanıcı</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Tip Adı</th>
                            <th class="text-custom text-center">Marka</th>
                            <th class="text-custom text-center">Model</th>
                            <th class="text-custom text-center">Fiyat</th>
                            <th class="text-custom text-center">Ürün Alım Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rejectedInventory as $inventory): ?>
                            <tr>
                                <td align="center"><?= Parameters::specific_parameter('departmentId','departmentName',$inventory['department_id'])['departmentName'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['owner_id'])['name'] ?></td>
                                <td align="center"><?= $inventory['created_at'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryTypeId','inventoryTypeName',$inventory['type_id'])['inventoryTypeName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryBrandId','inventoryBrandName',$inventory['brand_id'])['inventoryBrandName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryModelId','inventoryModelName',$inventory['model_id'])['inventoryModelName'] ?></td>
                                <td align="center"><?= $inventory['amount'] ?></td>
                                <td align="center"><?= $inventory['purchase_date'] ?></td>
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
        $('#acceptedovertimelist').DataTable( {
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
        $('#rejectedovertimelist').DataTable( {
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
        $('#waitingovertimelist').DataTable( {
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
        $.post("<?= site_url('inventory_manager') ?>",{
            id: id,
            approval: approval
        },function (result) {
            response(JSON.parse(result))
        });
    }

</script>