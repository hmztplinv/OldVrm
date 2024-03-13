<?php require 'mainPage_statics/header.php'; ?>
<!-- Container -->
<script>
    function val(event) {
        var selectElement = event.target;
        var value = selectElement.value;
        if(value==1){
            window.location.replace("<?=site_url("user_manager");?>");
        }else{
            window.location.replace("<?=site_url("user_manager");?>?company="+value);
        }
    }
</script>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Kullanıcı Yönetimi</li>
    </ol>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="justify-content-between card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Kullanıcılar Listesi</h6>
                    <div class="row ">
                        <div class="col-12 col-sm-12">
                            <select onchange="val(event)" class="form-select small" name="factory" id="factory">
                                <option disabled selected value=""> Firma Seçin</option>
                                <option value=""> Firma Seçin</option>
                                <?php foreach ($company as $item): ?>
                                    <option
                                            value="<?= $item['company'] ?>"><?= $item['company'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </header>
                <div class="card-body">
                    <table id="waitingdepartmentlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center" width="5%">İşlem</th>
                            <th class="text-custom text-center">İsim Soyisim</th>
                            <th class="text-custom text-center">Firma</th>
                            <th class="text-custom text-center">Mail</th>
                            <th class="text-custom text-center">Telefon Numarası</th>
                            <th class="text-custom text-center">Yetki</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $item): ?>
                            <tr>
                                <td align="center">
                                    <?if($item["verified"]==1){?>
                                        <a href="<?=site_url("user_manager?id=".$item["id"]);?>" style="cursor: pointer"><i class="text-danger fa-solid fa-xmark-circle"></i></a>
                                    <?}
                                    else{?>
                                        <a href="<?=site_url("user_manager?id=".$item["id"]);?>" style="cursor: pointer"><i class="text-success fa-solid fa-check-circle"></i></a>
                                    <? }?>
                                </td>
                                <td align="center"><?=$item["name"]?></td>
                                <td align="center"><?=$item["company"]?></td>
                                <td align="center"><?=$item["username"]?></td>
                                <td align="center"><?=$item["phone"]?></td>
                                <td align="center">
                                    <?if($item["verified"]==1){echo "Aktif Hesap";}
                                    else{echo "Kapalı Hesap";}?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </
</div>
<!-- Container -->

<?php require 'mainPage_statics/footer.php'; ?>
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
    <?=$item["verified"]?>
    function approval(id,approval){
        $.post("<?= site_url('hrEmployee/department_manager') ?>",{
            id: id,
            approval: approval
        },function (result) {
            response(JSON.parse(result))
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#waitingdepartmentlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength: 10,
        });
    });
</script>
</body>
</html>
