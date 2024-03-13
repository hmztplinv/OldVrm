<?php require 'mainPage_statics/header.php'; ?>
<!-- Upload Photo Modal -->
<div class="modal fade" id="uploadPictureModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-custom" id="staticBackdropLabel">Fotoğraf Yükleme</h5>
            </div>
            <div class="modal-body">
                <form id="" action="../../execution/" method="POST" enctype="multipart/form-data">
                    Lütfen yüklemek istediğiniz görseli seçiniz.
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    <input type="hidden" name="registry" value="<?php echo $registry?>">
                    <button type="submit" name="uploadPicture" class="btn btn-sm btn-custom mt-3">Yükle</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Upload Photo Modal -->

<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">



    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İnsan Kaynakları</li>
        <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Personel</a></li>
        <li class="breadcrumb-item text-custom"><?php echo $personal['name']?> <?php echo $personal['surname']?></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <!-- Photo -->
        <div class="col-12 col-sm-2 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Fotoğraf</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">

                        <?php
                        $file = public_url('avatars/empty.jpg');
                       //TODO: profile photo fix
                        if (file_exists($file)) {?>
                            <img class="img-fluid img-thumbnail" src="<?= public_url('avatars/1001.jpg') ?>" alt="Personel">
                            <?php
                        } else { ?>
                            <img class="img-fluid img-thumbnail" src="<?= public_url('avatars/empty.jpg') ?>" alt="Personel">
                        <?php } ?>
                    </p>
                </div>

                <div class="card-footer p-3">

                    <form action="../../execution/" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="registry" value="<?php echo $personal['registry']?>">

                        <div class="d-grid gap-2 d-md-flex">

                            <button type="button" class="btn btn-sm btn-custom mt-1" data-bs-toggle="modal" data-bs-target="#uploadPictureModal">Yükle</button>

                            <button type="submit" name="removePicture" class="btn btn-sm btn-custom mt-1">Sil</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Photo -->

        <!-- Employee Info -->
        <div class="col-12 col-sm-10 mb-3">
            <form action="<?=site_url('ozluk')?>" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Özlük</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">



                        <div class="row">

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Sicil No</strong></label>
                                <input readonly class="form-control small" name="registry" value="<?php echo $personal['registry']?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Adı</strong></label>
                                <input class="form-control small" name="name" value="<?php echo $personal['name']?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Soyadı</strong></label>
                                <input class="form-control small" name="surname" value="<?php echo $personal['surname']?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Uyruk</strong></label>
                                <select class="form-select small" name="nationality">

                                    <?php
                                    $query2=$db->prepare("SELECT nationalityCode, nationalityName FROM parameters WHERE nationalityCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($query2r as $item):?>

                                        <option value="<?=$item['nationalityCode']?>" <?=$personal['nationality']==$item['nationalityCode'] ?' selected ':''?>><?=$item['nationalityName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Kimlik No</strong></label>
                                <input class="form-control small" name="identityNumber" value="<?php echo $personal['identityNumber']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Cinsiyet</strong></label>
                                <select class="form-select small" name="sex">


                                        <option <?= $personal['sex']=='E'? ' selected ': ''?>value="E" >Erkek</option>
                                        <option <?= $personal['sex']=='K'? ' selected ': ''?> value="K">Kadın</option>

                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Doğum Tarihi</strong></label>
                                <input class="form-control small" name="birthDate" type="date" value="<?php echo $personal['birthDate']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Kan Grubu</strong></label>
                                <select class="form-select small" name="bloodType">
                                    <option value="<?= $personal['bloodType'] ?>" selected disabled><?= $personal['bloodType'] ?></option>
                                    <?
                                    $query2=$db->prepare("SELECT bloodType FROM parameters WHERE bloodType<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['bloodType']?>" <?php if ($personal['bloodType']==$query2r['bloodType']) { echo " selected "; } else echo ""; ?>><?php echo $query2r['bloodType']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Medeni Hal</strong></label>
                                <select class="form-select small" name="maritalStatus">
                                    <?php
                                    $query2=$db->prepare("SELECT maritalStatusCode, maritalStatusName FROM parameters WHERE maritalStatusCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC) ;
                                    foreach ($query2r as $item):?>

                                        <option value="<?=$item['maritalStatusCode']?>" <?=$item['maritalStatusCode']==$personal['maritalStatus'] ? ' selected ': '' ?>><?=$item['maritalStatusName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Evlilik Tarihi</strong></label>
                                <input class="form-control small" name="dateOfMarriage" type="date" value="<?php echo $personal['dateOfMarriage']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Çocuk Sayısı</strong></label>
                                <input class="form-control small" name="numberOfKids" type="number" value="<?php echo $personal['numberOfKids']?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Sürücü Belgesi</strong></label>
                                <select class="form-select small" name="drivingLicense">
                                    <?php
                                    $query2=$db->prepare("SELECT drivingLicense FROM parameters WHERE drivingLicense<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['drivingLicense']?>" <?php if ($personal['drivingLicense']==$query2r['drivingLicense']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['drivingLicense']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input class="form-control small" name="startDate" type="date" value="<?php echo $personal['startDate']?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Ayrılma Tarihi</strong></label>
                                <input class="form-control small" name="endDate" type="date" value="<?php echo $personal['endDate']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Statü</strong></label>
                                <select class="form-select small" name="activePassive">
                                    <?php
                                    $query2=$db->prepare("SELECT activePassiveCode, activePassiveName FROM parameters WHERE activePassiveCode<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['activePassiveCode']?>" <?php if ($query2r['activePassiveName']==$query2r['activePassiveCode']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['activePassiveName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Ayrılma Nedeni</strong></label>
                                <select class="form-select small" name="reasonOfQuitting">
                                    <?php
                                    $query2=$db->prepare("SELECT reasonOfQuittingCode, reasonOfQuittingName FROM parameters WHERE reasonOfQuittingCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($query2r as $item):?>

                                        <option value="<?php echo $item['reasonOfQuittingCode']?>" <?php if ($personal['reasonOfQuitting']==$item['reasonOfQuittingCode']) { echo " selected "; } else echo ""; ?>><?php echo $item['reasonOfQuittingName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" name="updateEmployee" class="btn btn-sm btn-custom mt-1" value="1">Güncelle</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- Employee Info -->

    </div>
    <!-- Row 1 -->

    <!-- Row 2 -->
    <div class="row pt-2">

        <!-- Education -->
        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Öğrenim</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="ogrenimlistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Öğrenim Türü</th>
                            <th class="text-custom">Okul</th>
                            <th class="text-custom">Bölüm</th>
                            <th class="text-custom text-center">Mezuniyet Durumu</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($educations as $education): ?>
                            <tr>
                                <td><?php echo $education['educationLevelName'] ?></td>
                                <td><?php echo $education['educationSchool'] ?></td>
                                <td><?php echo $education['educationDepartment'] ?></td>
                                <td align="center"><?php echo $education['educationCompletionName'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$education['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeeeducation" >
                                        <button type="button" onclick="delete_data(0);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="education" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Education -->

        <!-- Language -->
        <div class="col-12 col-sm-3 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Yabancı Dil</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="yabancidillistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Dil</th>
                            <th class="text-custom">Genel Düzey</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($langs as $lang): ?>

                            <tr>
                                <!--<td align="center">
                                    <form action="yabanci-dil-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>-->
                                <td><?php echo $lang['language'] ?></td>
                                <td><?php echo $lang['languageOverallLevelName'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$lang['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeelanguage" >
                                        <button type="button" onclick="delete_data(1);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="foreign" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Language -->

        <!-- Certification -->
        <div class="col-12 col-sm-3 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Sertifika</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="sertifikalistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Kurum</th>
                            <th class="text-custom">Sertifika Adı</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($certificates as $certificate): ?>

                            <tr>
                                <td><?php echo $certificate['certificationIssuer'] ?></td>
                                <td><?php echo $certificate['certificationName'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$certificate['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeecertification" >
                                        <button type="button" onclick="delete_data(2);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="certificate" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Certification -->

    </div>
    <!-- Row 2 -->

    <!-- Row 3 -->
    <div class="row pt-2">

        <!-- Department -->
        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Kurum İçi Deneyim</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="kurumicideneyimlistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Departman</th>
                            <!-- <th class="text-custom">Birim</th> -->
                            <th class="text-custom">Unvan</th>
                            <th class="text-custom">Başlangıç Tarihi</th>
                            <th class="text-custom text-center">Bitiş Tarihi</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($departments as $department): ?>

                            <tr>
                                <td><?php echo $department['department'] ?></td>
                                <!--  <td><?php echo $department['departmentUnit'] ?></td> -->
                                <td><?php echo $department['positionTitle'] ?></td>
                                <td><?php echo $department['positionStartDate'] ?></td>
                                <td align="center"><?php echo $department['positionEndDate'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$department['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeedepartment" >
                                        <button type="button" onclick="delete_data(3);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="internaleducation" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Department -->

        <!-- Salary -->
        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Ücret</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="ucretlistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Tür</th>
                            <th class="text-custom">Periyot</th>
                            <th class="text-custom">Tutar</th>
                            <th class="text-custom">Birim</th>
                            <th class="text-custom text-center">Brüt/Net</th>
                            <th class="text-custom text-center">Başlangıç</th>
                            <th class="text-custom text-center">Bitiş</th>
                            <th class="text-custom text-center">Güncel Ücret</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($salarys as $salary): ?>

                            <tr>
                                <td><?php echo $salary['salaryType'] ?></td>
                                <td><?php echo $salary['salaryPeriod'] ?></td>
                                <td><?php echo number_format($salary['salaryAmount'],2,',','.') ?></td>
                                <td align="center"><?php echo $salary['salaryCurrency'] ?></td>
                                <td align="center"><?php echo $salary['salaryGrossNet'] ?></td>
                                <td align="center"><?php echo $salary['salaryStartDate'] ?></td>
                                <td align="center"><?php if ($salary['salaryEndDate']==null) { echo "Halen"; } else { echo $salary['salaryEndDate']; } ?></td>
                                <td align="center"><?php echo $salary['Guncel'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$salary['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeesalary" >
                                        <button type="button" onclick="delete_data(4);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="salary" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Salary -->

    </div>
    <!-- Row 3 -->

    <!-- Row 4 -->
    <div class="row pt-2">

        <!-- Family -->
        <div class="col-12 col-sm-4 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Aile</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="ailelistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Yakınlık</th>
                            <th class="text-custom">Adı Soyadı</th>
                            <th class="text-custom">Yükümlülük</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($familys as $family): ?>

                            <tr>
                                <td><?php echo $family['familyMemberRelationshipTypeName'] ?></td>
                                <td><?php echo $family['familyMemberName'] ?> <?php echo $family['familyMemberSurname'] ?></td>
                                <td><?php echo $family['familyBeLiableToLookAfterName'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$family['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeefamilymember" >
                                        <button type="button" onclick="delete_data(5);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="family" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Family -->

        <!-- Contact -->
        <div class="col-12 col-sm-4 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">İletişim</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="iletisimlistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Kişi</th>
                            <th class="text-custom">Tür</th>
                            <th class="text-custom">İletişim Bilgisi</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($contacts as $contact): ?>

                            <tr>
                                <td><?php echo $contact['contactPerson'] ?></td>
                                <td><?php echo $contact['contactType'] ?></td>
                                <td><?php echo $contact['contactInfo'] ?></td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$contact['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeecontact">
                                        <button type="button" onclick="delete_data(6);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="contact" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Contact -->

        <!-- Experience -->
        <div class="col-12 col-sm-4 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Geçmiş Deneyim</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <table id="kurumdisideneyimlistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom">Şirket</th>
                            <th class="text-custom">Unvan</th>
                            <th class="text-custom text-center">Süre</th>
                            <th class="text-custom" width="5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($exps as $exp): ?>

                            <tr>
                                <td><?php echo $exp['experienceEmployer'] ?></td>
                                <td><?php echo $exp['experienceTitle'] ?></td>
                                <td align="center"><?php echo $exp['Month'] ?> ay</td>
                                <td>
                                    <form class="deleteForm" method="POST"?>
                                        <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                                        <input type="hidden" name="id" value="<?=$exp['id']?>">
                                        <input class="delete" type="hidden" name="position" value="false">
                                        <input type="hidden" name="delete" value="hremployeeexperience" >
                                        <button type="button" onclick="delete_data(7);" class="btn btn-sm btn-custom mt-1">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="<?=site_url("ozluk_ekle")?>" method="POST">
                            <input type="hidden" name="registry" value="<?=$personal['registry']?>">
                            <button type="submit" name="type" value="experience" class="btn btn-sm btn-custom mt-1">Yeni</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Experience -->

    </div>
    <!-- Row 4 -->



</div>
<!-- Container -->
<?php require 'mainPage_statics/footer.php';?>
<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>
<script>
    $(document).ready(function() {
        $('#kurumicideneyimlistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#kurumdisideneyimlistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#ogrenimlistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#sertifikalistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#ailelistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#iletisimlistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#yabancidillistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#ucretlistesi').DataTable( {
            responsive: {
                details: false
            },
            "dom": 'rtip',
            pageLength : 5
        });
    })
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.educationInfo').click(function(){
            var id = $(this).data('id');
            $.ajax({
                url: '../../execution/ajax.php',
                type: 'post',
                data: {id: id},
                success: function(response){
                    $('.modal-body').html(response);
                    $('#educationUpdateModal').modal('show');
                }
            });
        });
    });
</script>

</body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="application/javascript">
    function delete_data(number) {
        alert(number);
        // Sweet Alert kullanarak kullanıcıya bir uyarı mesajı gösterin
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu veriyi silmek istediğinize emin misiniz?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementsByClassName("delete")[number].value= "true";
                document.getElementsByClassName("deleteForm")[number].submit();
            }
        })
    }

</script>
