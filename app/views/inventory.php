<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İdari İşler</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Envanter Yönetimi</a></li>
    </ol>

    <div class="row pt-2">

        <!-- Photo -->

        <!-- Employee Info -->
        <div class="col-12 col-sm-12 mb-3">
            <form action="<?= site_url('inventory') ?>" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Envanter Yönetimi</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Tür Adı</strong></label>
                                <select class="form-select" name="typeName" id="typeName">
                                    <option value="">Seçiniz</option>
                                    <?php foreach ($typeNames as $type): ?>
                                    <option value="<?= $type['inventoryTypeId'] ?>"><?= $type['inventoryTypeName'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Marka</strong></label>
                                <select class="form-select" name="brandName" id="brandName">
                                    <option value="">Seçiniz</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Model</strong></label>
                                <select class="form-select" name="modelName" id="modelName">
                                    <option value="">Seçiniz</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Alım Fiyatı</strong></label>
                                <input class="form-control small" name="amount" type="text">
                            </div>
                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Alım Tarihi</strong></label>
                                <input class="form-control small" name="purchase" type="date">
                            </div>
                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Verilecek Kişinin Departmanı</strong></label>
                                <select class="form-select" name="departmentName" id="department">
                                    <option value="">Seçiniz</option>
                                    <?php foreach ($departments as $department): ?>
                                            <option value="<?= $department['departmentId'] ?>"><?= $department['departmentName'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Verilecek Kişinin Adı</strong></label>
                                <select class="form-select" name="owner" id="owner">
                                    <option value="">Seçiniz</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Onaycı</strong></label>
                                <select class="form-select" name="approval" id="">
                                <?php foreach ($officers as $officer): ?>
                                    <?php if ($officer['userid'] != session('user_id')): ?>
                                        <option value="<?= $officer['userid'] ?>"><?= $officer['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="createinventory" value="1" class="btn btn-sm btn-custom mt-1">Onaya Gönder</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- Employee Info -->
    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onaylanan Envanter Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="acceptedovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Departman</th>
                            <th class="text-custom text-center">Kullanıcı</th>
                            <th class="text-custom text-center">Tip Adı</th>
                            <th class="text-custom text-center">Marka</th>
                            <th class="text-custom text-center">Model</th>
                            <th class="text-custom text-center">Fiyat</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Ürün Alım Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($acceptedInventory as $inventory): ?>
                            <tr>
                                <td align="center"><?= $inventory['created_at'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('departmentId','departmentName',$inventory['department_id'])['departmentName'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['owner_id'])['name'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryBrandId','inventoryBrandName',$inventory['brand_id'])['inventoryBrandName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryModelId','inventoryModelName',$inventory['model_id'])['inventoryModelName'] ?></td>
                                <td align="center"><?= $inventory['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['officer_id'])['name'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">Onay Bekleyen Envanter Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="waitingovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Departman</th>
                            <th class="text-custom text-center">Kullanıcı</th>
                            <th class="text-custom text-center">Tip Adı</th>
                            <th class="text-custom text-center">Marka</th>
                            <th class="text-custom text-center">Model</th>
                            <th class="text-custom text-center">Fiyat</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Ürün Alım Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($waitingInventory as $inventory): ?>
                            <tr>
                                <td align="center"><?= $inventory['created_at'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('departmentId','departmentName',$inventory['department_id'])['departmentName'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['owner_id'])['name'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryTypeId','inventoryTypeName',$inventory['type_id'])['inventoryTypeName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryBrandId','inventoryBrandName',$inventory['brand_id'])['inventoryBrandName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryModelId','inventoryModelName',$inventory['model_id'])['inventoryModelName'] ?></td>
                                <td align="center"><?= $inventory['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['officer_id'])['name'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">Reddedilen Envanter Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="rejectedovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Departman</th>
                            <th class="text-custom text-center">Kullanıcı</th>
                            <th class="text-custom text-center">Tip Adı</th>
                            <th class="text-custom text-center">Marka</th>
                            <th class="text-custom text-center">Model</th>
                            <th class="text-custom text-center">Fiyat</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Ürün Alım Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($rejectedInventory as $inventory): ?>
                            <tr>
                                <td align="center"><?= $inventory['created_at'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('departmentId','departmentName',$inventory['department_id'])['departmentName'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['owner_id'])['name'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryTypeId','inventoryTypeName',$inventory['type_id'])['inventoryTypeName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryBrandId','inventoryBrandName',$inventory['brand_id'])['inventoryBrandName'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('inventoryModelId','inventoryModelName',$inventory['model_id'])['inventoryModelName'] ?></td>
                                <td align="center"><?= $inventory['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($inventory['officer_id'])['name'] ?></td>
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
            order:false,
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
            order:false,
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
            order:false,
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
        window.location.href = "/inventory";
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
                window.location.href = "/inventory";
            });
        }else{
            swal("Başarısız",result['err'],"error").then(function () {
            });
        }
    }
</script>
<script>
    document.getElementById("typeName").onchange = function () {
        $.post("<?= site_url('inventory') ?>",{
            type:document.getElementById("typeName").value
        },function (result) {
            $('#brandName').empty();
            var arr = JSON.parse(result,false);
            for (var i=0;i<arr.length;i++){
                const newOption = document.createElement('option');
                const optionText = document.createTextNode(arr[i]['inventoryBrandName']);
                newOption.appendChild(optionText);
                newOption.setAttribute('value',arr[i]['inventoryBrandId']);
                const select = document.getElementById("brandName");
                select.appendChild(newOption);
                document.getElementById("brandName").onchange();
            }
        });
    }
    document.getElementById("brandName").onchange = function () {
        $.post("<?= site_url('inventory') ?>",{
            brand:document.getElementById("brandName").value
        },function (result) {
            $('#modelName').empty();
            var arr = JSON.parse(result,false);
            for (var i=0;i<arr.length;i++){
                const newOption = document.createElement('option');
                const optionText = document.createTextNode(arr[i]['inventoryModelName']);
                newOption.appendChild(optionText);
                newOption.setAttribute('value',arr[i]['inventoryModelId']);
                const select = document.getElementById("modelName");
                select.appendChild(newOption);
            }
        });
    }
    document.getElementById("department").onchange = function () {
        $.post("<?= site_url('inventory') ?>",{
            department:document.getElementById("department").value
        },function (result) {
            $('#owner').empty();
            var arr = JSON.parse(result,false);
            for (var i=0;i<arr.length;i++){
                const newOption = document.createElement('option');
                const optionText = document.createTextNode(arr[i]['name']);
                newOption.appendChild(optionText);
                newOption.setAttribute('value',arr[i]['id']);
                const select = document.getElementById("owner");
                select.appendChild(newOption);
            }
        });
    }
</script>

