<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İnsan Kaynakları</li>
        <li class="breadcrumb-item text-custom"><a href="../../" class="text-decoration-none text-custom">Personel</a></li>

        <li class="breadcrumb-item text-custom">
            <?php if (post('type')=='education'){ echo 'Öğrenim';}
            if (post('type')=='foreign'){ echo 'Yabancı Dil';}
            if (post('type')=='certificate'){ echo 'Sertifika';}
            if (post('type')=='internaleducation'){ echo 'Kurum İçi Deneyim';}
            if (post('type')=='salary'){ echo 'Ücret';}
            if (post('type')=='family'){ echo 'Aile';}
            if (post('type')=='contact'){ echo 'İletişim';}
            if (post('type')=='experience'){ echo 'Geçmiş Deneyim';}?></li>
    </ol>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
<!-- EDUCATİON  -->
<?php if(post('type')=='education'):?>
            <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
                <input type="hidden" name="registry" value="<?=post('registry')?>">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Öğrenim Bilgisi Ekleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Öğrenim Türü</strong></label>
                                <select class="form-select small" name="educationLevel" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT educationLevelCode, educationLevelName FROM parameters WHERE educationLevelCode<>'' and educationLevelCode<>'999'");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($query2r as $item):?>
                                        <option value="<?=$item['educationLevelCode']?>"><?=$item['educationLevelName']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Okul</strong></label>
                                <input class="form-control small" name="educationSchool">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Fakülte/Enstitü</strong></label>
                                <input class="form-control small" name="educationFaculty">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Bölüm</strong></label>
                                <input class="form-control small" name="educationDepartment">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Mezuniyet Durumu</strong></label>
                                <select class="form-select small" name="educationCompletion">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT educationCompletionCode, educationCompletionName FROM parameters WHERE educationCompletionCode<>'' and educationLevelCode<>'999'");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>

                                        <option value="<?=$item['educationCompletionCode']?>"><?=$item['educationCompletionName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input class="form-control small" name="startingDate" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Mezuniyet Tarihi</strong></label>
                                <input class="form-control small" name="completionDate" type="date">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Diploma Notu</strong></label>
                                <input class="form-control small" name="diplomaGrade">
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="insertEducation" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif;?>
<!-- EDUCATİON BİTİŞ  -->
<!-- YABANCI DİL-->
            <?php if(post('type')=='foreign'):?>
                <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
                    <input type="hidden" name="registry" value="<?=post('registry')?>">
                    <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Yabancı Dil Bilgisi Ekleme</h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Dil</strong></label>
                                <select class="form-select small" name="language">
                                    <option value="" selected disabled>Seçiniz</option>
                                   <?php
                                    $query2=$db->prepare("SELECT languageName FROM parameters WHERE languageName<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['languageName']?>"><?=$item['languageName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Genel Düzey</strong></label>
                                <select class="form-select small" name="languageOverallLevel">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare(" SELECT languageLevelCode,languageLevelName FROM parameters WHERE languageLevelCode<>'' ");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['languageLevelCode']?>"><?=$item['languageLevelName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Okuma Düzeyi</strong></label>
                                <select class="form-select small" name="languageReadingLevel">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT languageLevelCode, languageLevelName FROM parameters WHERE languageLevelCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['languageLevelCode']?>"><?=$item['languageLevelName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Konuşma Düzeyi</strong></label>
                                <select class="form-select small" name="languageSpeakingLevel">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT languageLevelCode, languageLevelName FROM parameters WHERE languageLevelCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['languageLevelCode']?>"><?=$item['languageLevelName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Yazma Düzeyi</strong></label>
                                <select class="form-select small" name="languageWritingLevel">
                                    <option value="" selected disabled>Seçiniz</option>-->
                                    <?php
                                    $query2=$db->prepare("SELECT languageLevelCode, languageLevelName FROM parameters WHERE languageLevelCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['languageLevelCode']?>"><?=$item['languageLevelName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Sınav Bilgisi</strong></label>
                                <input class="form-control small" name="languageExam">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Sınav Tarihi</strong></label>
                                <input class="form-control small" name="languageExamDate" type="date">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Sınav Sonucu</strong></label>
                                <input class="form-control small" name="languageExamResult">
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="insertLanguage" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif;?>
            <!-- YABANCI DİL BİTİŞ-->
            <!-- SERTİFİKA  -->
            <?php if(post('type')=='certificate'):?>
            <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
            <input type="hidden" name="registry" value="<?=post('registry')?>">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Sertifika Bilgisi Ekleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Kurum</strong></label>
                                <input class="form-control small" name="certificationIssuer">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Sertifika Adı</strong></label>
                                <input class="form-control small" name="certificationName">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Sertifika No</strong></label>
                                <input class="form-control small" name="certificationNumber">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Alınma Tarihi</strong></label>
                                <input class="form-control small" name="certificationDate" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Geçerlilik Tarihi</strong></label>
                                <input class="form-control small" name="certificationExpiryDate" type="date">
                            </div>

                        </div>
                        </p>
                    </div>
                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="insertCertification" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif;?>
<!--             SERTİFİKA BİTİŞ -->
<!--           Kurum İçi Deneyim -->
<!--            --><?php //if(post('type')=='internaleducation'):?>
<!--            <form action="--><?php //= site_url('ozluk_ekle') ?><!--" method="POST">-->
<!--            <input type="hidden" name="registry" value="--><?php //=post('registry')?><!--">-->
<!--                <div class="card h-100">-->
<!--                    <header class="card-header d-md-flex align-items-center bg-custom2">-->
<!--                        <h6 class="card-header-title text-light mt-1">Kurum İçi Deneyim Ekleme</h6>-->
<!--                    </header>-->
<!---->
<!--                    <div class="card-body">-->
<!--                        <p class="card-text">-->
<!---->
<!--                        <div class="row">-->
<!---->
<!--                            <div class="col-12 col-sm-4 p-2">-->
<!--                                <label class="form-label text-custom"><strong>Departman</strong></label>-->
<!--                                <select required class="form-select" name="department" id="deparment">-->
<!--                                    <option selected disabled value=""></option>-->
<!--                                        <option value=" "> </option>-->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-12 col-sm-4 p-2">-->
<!--                                <label class="form-label text-custom"><strong>Birim</strong></label>-->
<!--                                <select class="form-select" name="department" id="">-->
<!--                                    <option value=""></option>-->
<!---->
<!--                                        <option value=" "></option>-->
<!---->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-12 col-sm-4 p-2">-->
<!--                                <label class="form-label text-custom"><strong>Unvan</strong></label>-->
<!--                                <select class="form-select" name="roleId" id="role">-->
<!--                                    <option selected disabled value=""></option>-->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-12 col-sm-2 p-2">-->
<!--                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>-->
<!--                                <input class="form-control small" name="positionStartDate" type="date">-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-12 col-sm-2 p-2">-->
<!--                                <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>-->
<!--                                <input class="form-control small" name="positionEndDate" type="date">-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-12 col-sm-2 p-2">-->
<!--                                <label class="form-label text-custom"><strong>Mevcut Görev</strong></label>-->
<!--                                <select class="form-select small" name="positionActivePassive">-->
<!--                                    <option value="" selected disabled>Seçiniz</option>-->
<!--                                    <option value="A">Evet</option>-->
<!--                                    <option value="P">Hayır</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->
<!--                        </p>-->
<!--                    </div>-->
<!---->
<!--                    <div class="card-footer p-3">-->
<!--                        <div class="d-grid gap-2 d-md-flex">-->
<!--                            <button type="submit" name="insertInternalPosition" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>-->
<!--            </form>-->
<!--            --><?php //endif;?>
<!--            Kurum İçi Deneyim bitiş -->
<!--            Ücret -->
            <?php if(post('type')=='salary'):?>
            <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
            <input type="hidden" name="registry" value="<?=post('registry')?>">
                            <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Maaş Bilgisi Ekleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Tür</strong></label>
                                <select class="form-select small" name="salaryType">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT salaryType FROM parameters WHERE salaryType<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['salaryType']?>"><?=$item['salaryType']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Periyot</strong></label>
                                <select class="form-select small" name="salaryPeriod">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT salaryPeriod FROM parameters WHERE salaryPeriod<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['salaryPeriod']?>"><?=$item['salaryPeriod']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Tutar</strong></label>
                                <input class="form-control small" name="salaryAmount" type="number">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Birim</strong></label>
                                <select class="form-select small" name="salaryCurrency">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT salaryCurrency FROM parameters WHERE salaryCurrency<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['salaryCurrency']?>"><?=$item['salaryCurrency']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Brüt/Net</strong></label>
                                <select class="form-select small" name="salaryGrossNet">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT salaryGrossNet FROM parameters WHERE salaryGrossNet<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['salaryGrossNet']?>"><?=$item['salaryGrossNet']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input class="form-control small" name="salaryStartDate" type="date">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>
                                <input class="form-control small" name="salaryEndDate" type="date">
                            </div>

                            <div class="col-12 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Güncel Ücret</strong></label>
                                <select class="form-select small" name="positionActivePassive">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="A">Evet</option>
                                    <option value="P">Hayır</option>
                                </select>
                            </div>


                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="salary" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif;?>
            <!-- Ücret bitiş -->
            <!-- Aile -->
            <?php if(post('type')=='family'):?>
            <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
            <input type="hidden" name="registry" value="<?=post('registry')?>">
                            <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Aile Üyesi Ekleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Yakınlık</strong></label>
                                <select class="form-select small" name="familyMemberRelationshipType">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT familyMemberRelationshipTypeCode, familyMemberRelationshipTypeName FROM parameters WHERE familyMemberRelationshipTypeCode<>'' and familyMemberRelationshipTypeCode<>'999'");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>

                                        <option value="<?=$item['familyMemberRelationshipTypeCode']?>"><?=$item['familyMemberRelationshipTypeName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Adı</strong></label>
                                <input class="form-control small" name="familyMemberName" required>
                            </div>

                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Soyadı</strong></label>
                                <input class="form-control small" name="familyMemberSurname">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Uyruk</strong></label>
                                <select class="form-select small" name="familyMemberNationality">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT nationalityCode, nationalityName FROM parameters WHERE nationalityCode<>'' and nationalityCode<>'999'");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['nationalityCode']?>"><?=$item['nationalityName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Kimlik No</strong></label>
                                <input class="form-control small" name="familyMemberIdentityNumber">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Cinsiyet</strong></label>
                                <select class="form-select small" name="familyMemberSex">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT sexCode, sexName FROM parameters WHERE sexCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['sexCode']?>"><?=$item['sexName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Doğum Tarihi</strong></label>
                                <input class="form-control small" name="familyMemberBirthDate" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Yükümlülük</strong></label>
                                <select class="form-select small" name="familyBeLiableToLookAfter">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT familyBeLiableToLookAfterCode, familyBeLiableToLookAfterName FROM parameters WHERE familyBeLiableToLookAfterCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['familyBeLiableToLookAfterCode']?>"><?=$item['familyBeLiableToLookAfterName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Öğrenim Türü</strong></label>
                                <select class="form-select small" name="familyMemberEducationType">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT educationLevelCode, educationLevelName FROM parameters WHERE educationLevelCode<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['educationLevelCode']?>"><?=$item['educationLevelName']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Mezuniyet Durumu</strong></label>
                                <select class="form-select small" name="familyMemberEducationCompletion">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT educationCompletionCode, educationCompletionName FROM parameters WHERE educationCompletionCode<>'' and educationCompletionCode<>'999'");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['educationCompletionCode']?>"><?= $item['educationCompletionName']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>



                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="insertFamilyMember" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif;?>
<!--             Aile bitiş -->
<!--             İletişim -->
            <?php if(post('type')=='contact'):?>
            <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
            <input type="hidden" name="registry" value="<?=post('registry')?>">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">İletişim Bilgisi Ekleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Kişi</strong></label>
                                <select class="form-select small" name="contactPerson">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT contactPerson FROM parameters WHERE contactPerson<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>

                                        <option value="<?=$item['contactPerson']?>"><?=$item['contactPerson']?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Tür</strong></label>
                                <select class="form-select small" name="contactType">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <?php
                                    $query2=$db->prepare("SELECT contactType FROM parameters WHERE contactType<>''");
                                    $query2->execute();
                                    $query2r=$query2->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($query2r as $item):?>
                                        <option value="<?=$item['contactType']?>"><?=$item['contactType']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-8 p-2">
                                <label class="form-label text-custom"><strong>İletişim Bilgisi</strong></label>
                                <input class="form-control small" name="contactInfo">
                            </div>
                        </div>
                        </p>
                    </div>
                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="insertContact" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif?>
<!--             İletişim bitiş -->
<!--             Geçmiş Deneyim -->
            <?php if (post('type')=='experience'):?>
            <form action="<?= site_url('ozluk_ekle') ?>" method="POST">
            <input type="hidden" name="registry" value="<?=post('registry')?>">
                            <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Kurum Dışı Deneyim Ekleme</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Şirket</strong></label>
                                <input class="form-control small" name="experienceEmployer">
                            </div>

                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Departman</strong></label>
                                <input class="form-control small" name="experienceDepartment">
                            </div>

                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Unvan</strong></label>
                                <input class="form-control small" name="experienceTitle">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                                <input class="form-control small" name="experienceStartDate" type="date">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>
                                <input class="form-control small" name="experienceEndDate" type="date">
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="insertExternalPosition" value="1" class="btn btn-sm btn-custom mt-1">Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php endif?>

<!--            Geçmiş Deneyim bitiş -->

        </div>
    </div>
</div>

<?php require 'mainPage_statics/footer.php'; ?>

<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
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

</body>
</html>
