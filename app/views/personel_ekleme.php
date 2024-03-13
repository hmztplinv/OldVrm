<?php require 'mainPage_statics/header.php'; ?>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <form action="<?=site_url('personel_ekleme')?>" method="POST">

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
                                <input class="form-control small" required name="email" type="email">
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
                                    <option value="" disabled selected style="display:none;">Seçiniz</option>
                                    <?foreach ($getparameters as $item):?>
                                        <option value="<?=$item['nationalityCode']?>"><?=$item['nationalityName']?></option>
                                    <?endforeach;?>


                                </select>
                            </div>


                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Doğum Tarihi</strong></label>
                                <input class="form-control small" name="birthDate" type="date" required>
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Cinsiyet*</strong></label>
                                <select class="form-select small" name="sex" required>
                                    <option value="" disabled selected style="display:none;">Seçiniz</option>
                                        <option value="E" >Erkek</option>
                                        <option value="K" >Kadın</option>

                                </select>
                            </div>



                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Kan Grubu</strong></label>
                                <select class="form-select small" name="bloodType" title="" required>
                                    <option value="" disabled selected style="display:none;">Seçiniz</option>
                                    <option value="A-">A-</option>
                                    <option value="A+">A+</option>
                                    <option value="B-">B-</option>
                                    <option value="B+">B+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="0-">0-</option>
                                    <option value="0+">0+</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Medeni Hal</strong></label>
                                <select class="form-select small" name="maritalStatus" required>
                                    <option value="" disabled selected style="display:none;">Seçiniz</option>
                                    <option value="E">Evli</option>
                                    <option value="B">Bekar</option>
                                    <option value="D">Boşanmış</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Evlilik Tarihi</strong></label>
                                <input class="form-control small" name="dateOfMarriage" type="date"  >
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Telefon No*</strong></label>
                                <input class="form-control small" name="phone" required type="text" pattern="[0-9]{11}">
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>TC NO*</strong></label>
                                <input class="form-control small" name="identityNumber" required type="text" pattern="[0-9]{11}">
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Çocuk Sayısı</strong></label>
                                <input class="form-control small" name="numberOfKids" type="number" required min="0" value="0">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Sürücü Belgesi</strong></label>
                                <select class="form-select small selectbox" name="drivingLicense" id="drivingLicense" >
                                    <option value="M">M</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A">A</option>
                                    <option value="B1">B1</option>
                                    <option value="B">B</option>
                                    <option value="BE">BE</option>
                                    <option value="C1">C1</option>
                                    <option value="C1E">C1E</option>
                                    <option value="C">C</option>
                                    <option value="CE">CE</option>
                                    <option value="D1">D1</option>
                                    <option value="D1E">D1E</option>
                                    <option value="F">F</option>
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
                        <a href="<?=site_url('departman_yonetimi')?>" class="btn btn-light ml-auto">Ekle</a>
                    </header>

                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="row">
                            <div class="col-4 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Departman</strong></label>
                                <select id="department" class="form-select small" required name="department">
                                    <option value="">Departman Seçiniz</option>



                                    <?foreach ($getdepart as $item):?>
                                        <option value="<?=$item['department']?>"><?=$item['department']?></option>
                                    <?endforeach;?>


                                </select>
                            </div>
                            <div class="col-4 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Rol</strong></label>
                                <select class="form-select small" name="roleId" id="role" required>
                                    <option value="" disabled selected style="display:none;">Seçiniz</option>


                                    <?foreach ($gettitle as $item):?>
                                        <option value="<?=$item['positionTitle']?>"><?=$item['positionTitle']?></option>
                                    <?endforeach;?>


                                </select>

                            </div>


<!--
                            <div class="col-6 col-sm-6 p-2">
                                <input class="p-2" type="checkbox" name="isAdmin" id="isAdmin"><label for="isAdmin" class="form-label text-custom p-2"><strong>isAdmin</strong></label>
                            </div>
-->
                        </div>
                        <div class="d-grid gap-2 d-md-flex float-end">

                            <input type="hidden" name="registry" value="">
                            <button type="submit" name="add_employee" value="1" class="btn btn-sm btn-custom mt-1">Oluştur</button>

                        </div>
                    </div>


                </div>
            </div>


        </div>
        <!-- Row 2 -->

    </form>
</div>
<!-- Container -->

<?php require 'mainPage_statics/footer.php'; ?>

<script>
    window.onmousedown = function (e) {
        var el = e.target;
        if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
            e.preventDefault();

            // toggle selection
            if (el.hasAttribute('selected')) el.removeAttribute('selected');
            else el.setAttribute('selected', '');

            // hack to correct buggy behavior
            var select = el.parentNode.cloneNode(true);
            el.parentNode.parentNode.replaceChild(select, el.parentNode);
        }
    }
</script>
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
