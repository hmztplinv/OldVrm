<?php require 'statics/header.php'; ?>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <form action="<?= site_url('hrEmployee/save/personal') ?>" method="POST">

        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">İnsan Kaynakları</li>
            <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Personel</a></li>
            <li class="breadcrumb-item text-custom">Personel Ekle</li>
        </ol>

        <!-- Row 1 -->
        <div class="row pt-2">



            <!-- Employee Info -->
            <div class="col-12 col-sm-12 mb-3">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Özlük</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>E-mail*</strong></label>
                                <input class="form-control small" required name="email">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Adı*</strong></label>
                                <input class="form-control small" required name="name">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Soyadı*</strong></label>
                                <input class="form-control small" required name="surname">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Uyruk*</strong></label>
                                <select class="form-select small" required name="nationality">
                                    <option value="">Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT nationalityCode, nationalityName FROM parameters WHERE nationalityCode<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['nationalityCode']?>"><?php echo $query2r['nationalityName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Kimlik No*</strong></label>
                                <input class="form-control small" name="identityNumber" required>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Doğum Tarihi</strong></label>
                                <input class="form-control small" name="birthDate" type="date">
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Cinsiyet*</strong></label>
                                <select class="form-select small" name="sex" required>
                                    <option value="">Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT sexCode, sexName FROM parameters WHERE sexCode<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['sexCode']?>"><?= $query2r['sexName'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>



                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Kan Grubu</strong></label>
                                <select class="form-select small" name="bloodType">
                                    <option value="">Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT bloodType FROM parameters WHERE bloodType<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>
                                        <option value="<?= $query2r['bloodType'] ?>"><?php echo $query2r['bloodType'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Medeni Hal</strong></label>
                                <select class="form-select small" name="maritalStatus">
                                    <option value="">Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT maritalStatusCode, maritalStatusName FROM parameters WHERE maritalStatusCode<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['maritalStatusCode']?>" ><?php echo $query2r['maritalStatusName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Evlilik Tarihi</strong></label>
                                <input class="form-control small" name="dateOfMarriage" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Çocuk Sayısı</strong></label>
                                <input class="form-control small" name="numberOfKids" type="number">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Sürücü Belgesi</strong></label>
                                <select class="form-select small" name="drivingLicense">
                                    <option value="">Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT drivingLicense FROM parameters WHERE drivingLicense<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>
                                        <option value="<?php echo $query2r['drivingLicense']?>"><?php echo $query2r['drivingLicense']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi*</strong></label>
                                <input class="form-control small" name="startDate" type="date" required>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <!-- Employee Info -->

        </div>
        <!-- Row 1 -->

        <!-- Row 2 -->
        <div class="row pt-2">

            <div class="col-12 col-sm-12 mb-3">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Yetkilendirme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="row">
                            <div class="col-4 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Departman</strong></label>
                                <select id="department" class="form-select small" required name="department">
                                    <option value="">Departman Seçiniz</option>
                                    <?php foreach ($departments as $department): ?>
                                        <option value="<?= $department['id'] ?>"><?= $department['departmentName'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-4 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Rol</strong></label>
                                <select class="form-select small" name="roleId" id="role" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <?php foreach ($auth as $au): ?>
                                <div class="col-6 col-sm-6 p-2">
                                    <input class="p-2" type="checkbox" name="<?= 'auth|'.$au ?>" id="check|<?= $au ?>"><label for="check|<?= $au ?>" class="form-label text-custom p-2"><strong><?= $au ?></strong></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-6 col-sm-6 p-2">
                                <input class="p-2" type="checkbox" name="isAdmin" id="isAdmin"><label for="isAdmin" class="form-label text-custom p-2"><strong>isAdmin</strong></label>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex float-end">

                            <input type="hidden" name="registry" value="<?= post('registry') ?>">
                            <button type="submit" name="add_personal" value="<?= Encrpyt::inProgressEncode(1) ?>" class="btn btn-sm btn-custom mt-1">Oluştur</button>

                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- Row 2 -->

    </form>
</div>
<!-- Container -->

<?php require 'statics/footer.php';?>

<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>
<script>
    document.getElementById("department").onchange = function () {
        var department = document.getElementById("department").value;
        $.post(BaseUrl+"hrEmployee/save/personal", {
            department: department
        }, function (result) {
            var roles = JSON.parse(result,false);
            if (document.getElementById("role").options.length !== 0){
                var size = document.getElementById("role").options.length+1
                for (var i = 1;i<=size;i++){
                    document.getElementById("role").remove(i)
                }
            }
            for(var i = 0;i<roles.length;i++){
                var opt = document.createElement("option");
                document.getElementById("role").options.add(opt);
                opt.text = roles[i]['roleName'];
                opt.value = roles[i]['id'];
            }
        })
    }

</script>

</body>
</html>
