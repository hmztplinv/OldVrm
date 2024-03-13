<?php require 'mainPage_statics/header.php'; ?>


<!-- Upload Photo Modal -->
<div class="modal fade" id="uploadPictureModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-custom" id="staticBackdropLabel">Fotoğraf Yükleme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../execution/" method="POST" enctype="multipart/form-data">
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
            <form action="../../execution/" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Özlük</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">



                        <div class="row">

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Sicil No</strong></label>
                                <input class="form-control small" name="registry" value="<?php echo $personal['registry']?>">
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
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['nationalityCode']?>" <?php if ($query2r['nationalityName']==$query2r['nationalityCode']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['nationalityName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Kimlik No</strong></label>
                                <input class="form-control small" name="identityNumber" value="<?php echo $personal['identityNumber']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Cinsiyet</strong></label>
                                <select class="form-select small" name="sex">
                                    <?php
                                    $query2=$db->prepare("SELECT sexCode, sexName FROM parameters WHERE sexCode<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['sexCode']?>" <?php if ($query2r['sexName']==$query2r['sexCode']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['sexName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Doğum Tarihi</strong></label>
                                <input class="form-control small" name="birthDate" type="date" value="<?php echo $personal['birthDate']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Kan Grubu</strong></label>
                                <select class="form-select small" name="bloodType">
                                    <?php
                                    $query2=$db->prepare("SELECT bloodType FROM parameters WHERE bloodType<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['bloodType']?>" <?php if ($query2r['bloodType']==$query2r['bloodType']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['bloodType']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Medeni Hal</strong></label>
                                <select class="form-select small" name="maritalStatus">
                                    <?php
                                    $query2=$db->prepare("SELECT maritalStatusCode, maritalStatusName FROM parameters WHERE maritalStatusCode<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['maritalStatusCode']?>" <?php if ($query2r['maritalStatusName']==$query2r['maritalStatusCode']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['maritalStatusName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Evlilik Tarihi</strong></label>
                                <input class="form-control small" name="dateOfMarriage" type="date" value="<?php echo $personal['dateOfMarriage']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Çocuk Sayısı</strong></label>
                                <input class="form-control small" name="numberOfKids" type="number" value="<?php echo $personal['numberOfKids']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Sürücü Belgesi</strong></label>
                                <select class="form-select small" name="drivingLicense">
                                    <?php
                                    $query2=$db->prepare("SELECT drivingLicense FROM parameters WHERE drivingLicense<>''");
                                    $query2->execute();
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['drivingLicense']?>" <?php if ($query2r['drivingLicense']==$query2r['drivingLicense']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['drivingLicense']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input class="form-control small" name="startDate" type="date" value="<?php echo $personal['startDate']?>">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Ayrılma Tarihi</strong></label>
                                <input class="form-control small" name="endDate" type="date" value="<?php echo $personal['endDate']?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
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
                                    while($query2r=$query2->fetch(PDO::FETCH_ASSOC)) {?>

                                        <option value="<?php echo $query2r['reasonOfQuittingCode']?>" <?php if ($query2r['reasonOfQuittingName']==$query2r['reasonOfQuittingCode']) { echo "selected"; } else echo ""; ?>><?php echo $query2r['reasonOfQuittingName']?></option>

                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="updateEmployee" class="btn btn-sm btn-custom mt-1">Güncelle</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Öğrenim Türü</th>
                            <th class="text-custom">Okul</th>
                            <th class="text-custom">Bölüm</th>
                            <th class="text-custom text-center">Mezuniyet Durumu</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($educations as $education): ?>

                            <tr>
                                <td align="center">
                                    <form action="ogrenim-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry']?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                </td>
                                <td><?php echo $education['educationLevelName'] ?></td>
                                <td><?php echo $education['educationSchool'] ?></td>
                                <td><?php echo $education['educationDepartment'] ?></td>
                                <td align="center"><?php echo $education['educationCompletionName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="ogrenim-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Dil</th>
                            <th class="text-custom">Genel Düzey</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($langs as $lang): ?>

                            <tr>
                                <td align="center">
                                    <form action="yabanci-dil-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                <td><?php echo $lang['language'] ?></td>
                                <td><?php echo $lang['languageOverallLevelName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="yabanci-dil-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $registry?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Kurum</th>
                            <th class="text-custom">Sertifika Adı</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($certificates as $certificate): ?>

                            <tr>
                                <td align="center">
                                    <form action="sertifika-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                </td>
                                <td><?php echo $certificate['certificationIssuer'] ?></td>
                                <td><?php echo $certificate['certificationName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="sertifika-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Departman</th>
                            <th class="text-custom">Birim</th>
                            <th class="text-custom">Unvan</th>
                            <th class="text-custom">Başlangıç Tarihi</th>
                            <th class="text-custom text-center">Bitiş Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($departments as $department): ?>

                            <tr>
                                <td align="center">
                                    <form action="kurum-ici-deneyim-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                </td>
                                <td><?php echo $department['department'] ?></td>
                                <td><?php echo $department['departmentUnit'] ?></td>
                                <td><?php echo $department['positionTitle'] ?></td>
                                <td><?php echo $department['positionStartDate'] ?></td>
                                <td align="center"><?php echo $department['positionEndDate'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="kurum-ici-deneyim-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $registry?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Tür</th>
                            <th class="text-custom">Periyot</th>
                            <th class="text-custom">Tutar</th>
                            <th class="text-custom">Birim</th>
                            <th class="text-custom text-center">Brüt/Net</th>
                            <th class="text-custom text-center">Başlangıç</th>
                            <th class="text-custom text-center">Bitiş</th>
                            <th class="text-custom text-center">Güncel Ücret</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($salarys as $salary): ?>

                            <tr>
                                <td align="center">
                                    <form action="maas-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                </td>
                                <td><?php echo $salary['salaryType'] ?></td>
                                <td><?php echo $salary['salaryPeriod'] ?></td>
                                <td><?php echo number_format($salary['salaryAmount'],2,',','.') ?></td>
                                <td align="center"><?php echo $salary['salaryCurrency'] ?></td>
                                <td align="center"><?php echo $salary['salaryGrossNet'] ?></td>
                                <td align="center"><?php echo $salary['salaryStartDate'] ?></td>
                                <td align="center"><?php if ($salary['salaryEndDate']==null) { echo "Halen"; } else { echo $salary['salaryEndDate']; } ?></td>
                                <td align="center"><?php echo $salary['Guncel'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="maas-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Yakınlık</th>
                            <th class="text-custom">Adı Soyadı</th>
                            <th class="text-custom">Yükümlülük</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($familys as $family): ?>

                            <tr>
                                <td align="center">
                                    <form action="aile-uyesi-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry']?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                </td>
                                <td><?php echo $family['familyMemberRelationshipTypeName'] ?></td>
                                <td><?php echo $family['familyMemberName'] ?> <?php echo $family['familyMemberSurname'] ?></td>
                                <td><?php echo $family['familyBeLiableToLookAfterName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="aile-uyesi-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Kişi</th>
                            <th class="text-custom">Tür</th>
                            <th class="text-custom">İletişim Bilgisi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($contacts as $contact): ?>

                            <tr>
                                <td align="center">
                                    <form action="iletisim-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                <td><?php echo $contact['contactPerson'] ?></td>
                                <td><?php echo $contact['contactType'] ?></td>
                                <td><?php echo $contact['contactInfo'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="iletisim-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom">Şirket</th>
                            <th class="text-custom">Unvan</th>
                            <th class="text-custom text-center">Süre</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        foreach ($exps as $exp): ?>

                            <tr>
                                <td align="center">
                                    <form action="kurum-disi-deneyim-duzenle/" method="POST">
                                        <input type="hidden" id="id" name="id" value="<?php echo $personal['id'] ?>">
                                        <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                                        <button type="submit button" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form></td>
                                </td>
                                <td><?php echo $exp['experienceEmployer'] ?></td>
                                <td><?php echo $exp['experienceTitle'] ?></td>
                                <td align="center"><?php echo $exp['Month'] ?> ay</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </p>
                </div>

                <div class="card-footer p-3">
                    <div class="d-grid gap-2 d-md-flex">
                        <form action="kurum-disi-deneyim-ekle/" method="POST">
                            <input type="hidden" name="registry" value="<?php echo $personal['registry'] ?>">
                            <button type="submit button" class="btn btn-sm btn-custom mt-1">Yeni</button>
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
