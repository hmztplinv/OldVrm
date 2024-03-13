   <?php require 'mainPage_statics/header.php'; ?>
<link rel="stylesheet" href="<?= public_url('css/jquery.fancybox.css') ?>"/>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">


    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Şikayet</li>
        <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Şikayet
                Yönetimi</a></li>
    </ol>


    <!-- Kullanıcı bilgileri -->
    <form action="<?= site_url('detail_complaint') ?>" method="post">
        <div class="row">


            <div style="margin-bottom: 3.1rem!important;" class="col-sm-12 mb-3">

                <div style="height: 111% !important;" class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Şikayet Takibi  (<?= $complaint['id'] ?>)</h6>
                    </header>

                    <div class="card-body">
                        <div class="col-sm-12 mb-3">
                            <div class="card-body">
                                <p class="card-text">
                                <div class="row">
                                    <div class="mobile_text p-0" for="<?= $stat['progress'] ?>"
                                         class="col-sm-12 p-2 progressBar" >
                                        <?php foreach ($status as $stat): ?>
                                            <input  type="radio"  class="radio mobile-col" name="progress"
                                                     value="<?= $stat['progress'] ?>"
                                                     id="<?= $stat['progress'] ?>" <?= $complaint['status'] == $stat['id'] ? 'checked' : '' ?>>
                                            <label class="label mobile-col" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a style="color:#000000 " href="detail_complaint?id=<?=base64_encode($complaint['id'])?>&status=<?=$stat['id']?>&phone=<?=$complaint['phone']?>"><?= $stat['status'] ?> </a></label>
                                        <?php endforeach; ?>
                                        <div class="progress h-auto">
                                            <div class="progress-bar"></div>
                                        </div>



                                    </div>
                                </div>
                                <div class="row mt-2" style="float: right">


                                    <div class="col-12" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; float: right">
                                        <?php if ($complaint['processConfirm'] == 1): ?>
                                          <label style=""><?=$companyid==2 ? 'Ahmet Pehlivan':'Hasan Hüseyin Topoz'?>:</label>
                                          <label  style="color: green">Onaylı</label>
                                          <br>
                                        <?php endif; ?>
                                        <?php if ($complaint['processConfirm'] == 0): ?>
                                            <label style=""><?=$companyid==2 ? 'Ahmet Pehlivan':'Hasan Hüseyin Topoz'?>:</label>
                                            <label  style="color: red">Onaysız</label>
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($complaint['technicalConfirm'] == 1): ?>
                                           <label style=""><?=$companyid==2 ? 'Cenk Senotay':'Aykut Topal'?>:</label>
                                           <label style="color: green">Onaylı</label>
                                           <br>
                                        <?php endif; ?>
                                        <?php if ($complaint['technicalConfirm'] == 0): ?>
                                            <label style=""><?=$companyid==2 ? 'Cenk Senotay':'Aykut Topal'?>:</label>
                                            <label style="color: red">Onaysız</label>
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($complaint['factoryConfirm'] == 1): ?>
                                            <label style=""><?=$companyid==2 ? 'Yavuz Arıcan':'Yavuz Arıcan'?>:</label>
                                            <label style="color: green">Onaylı</label>
                                        <?php endif; ?>
                                        <?php if ($complaint['factoryConfirm'] == 0): ?>
                                            <label style=""><?=$companyid==2 ? 'Yavuz Arıcan':'Yavuz Arıcan'?>:</label>
                                            <label style="color: red">Onaysız</label>
                                        <?php endif; ?>


                                        <?php if($companyid==8):?>
                                            <?php if ($complaint['technologyConfirm'] == 1): ?>
                                                <label style=""><?=$companyid==2 ? '':'Canan Güven'?>:</label>
                                                <label style="color: green">Onaylı</label>
                                            <?php endif; ?>
                                            <?php if ($complaint['technologyConfirm'] == 0): ?>
                                                <label style=""><?=$companyid==2 ? '':'Canan Güven'?>:</label>
                                                <label style="color: red">Onaysız</label>
                                            <?php endif; ?>
                                        <?php endif;?>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php if($auth==0):?>
                            <div class="col-12 col-sm-12 mb-3">
                                <div class="col-12 col-sm-12 p-2">
                                    <label class="form-label text-custom"><strong>Fabrika Seçimi</strong></label>
                                    <select class="form-select small" name="factory">
                                        <option disabled selected value="">Fabrika Yetkilendir</option>
                                        <?php foreach ($factories as $factory): ?>
                                            <option
                                                <?= $complaint['factoryAuth'] == $factory['factoryCode'] && $complaint['authStatus'] == 1 ? 'selected' : '' ?>
                                                value="<?= $factory['factoryCode'] ?>"><?= $factory['factoryName'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="complaint_id" value="<?= $complaint['id'] ?>">
                                <div class="d-grid gap-2 d-md-flex mb-5">
                                    <button type="submit" name="auth_factory" value="1"
                                            class="btn btn-sm btn-custom mt-2">Fabrikayı Yetkilendir
                                    </button>
                                    <button type="submit" name="cancel_auth" value="1"
                                            class="btn btn-sm btn-custom mt-2">Yetkilendirmeyi İptal Et
                                    </button>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div style="margin-bottom: 3.1rem!important;" class="col-12 col-sm-9 mb-5">

                <div style="height: 111% !important;" class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Şikayet (<?= $complaint['id'] ?>)</h6>
                    </header>

                    <div class="card-body">
                        <div class="row mb-5">

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Adı</strong></label>
                                <input  class="form-control small" name="customername" value="<?= $complaint['name'] ?>">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Soyadı</strong></label>
                                <input  class="form-control small" name="customersurname" value="<?= $complaint['surname'] ?>">
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>Telefon Numarası</strong></label>
                                <input name="customer_phone"  class="form-control small" type="text"
                                       value="<?= $complaint['phone'] ?>">
                                </select>
                            </div>

                            <div class="col-12 col-sm-3 p-2">
                                <label class="form-label text-custom"><strong>E-mail Adresi</strong></label>
                                <input name="customer_email"  class="form-control small" value="<?= $complaint['email'] ?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Şikayet Tarihi</strong></label>
                                <input disabled class="form-control small" type="text"
                                       value="<?= $complaint['createdDate'] ?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Çözülme Tarihi</strong></label>
                                <input readonly class="form-control small" name="endDate" type="text"
                                       value="<?= $complaint['closingDate'] ?>">
                            </div>

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Durumu</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> <?= $complaint['status'] == 1 ? 'active' : '' ?>
                                        class="form-select small" name="activePassive">
                                    <?php foreach ($status as $stat): ?>
                                        <option <?= $complaint['status'] == $stat['id'] ? 'selected' : '' ?>
                                                value="<?= $stat['id'] ?>"><?= $stat['status'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Şikayet Tipi</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                            name="complaintType" id="">
                                    <option <?= $complaint['category'] == "Şikayet/Ürün" ? 'selected' : '' ?>
                                            value="Şikayet/Ürün">Şikayet/Ürün
                                    </option>
                                    <option <?= $complaint['category'] == "Şikayet/Tedarik" ? 'selected' : '' ?>
                                            value="Şikayet/Tedarik">Şikayet/Tedarik
                                    </option>
                                    <option <?= $complaint['category'] == "Şikayet/Personel" ? 'selected' : '' ?>
                                            value="Şikayet/Personel">Şikayet/Personel
                                    </option>
                                    <option <?= $complaint['category'] == "Öneri" ? 'selected' : '' ?>
                                            value="Öneri">Öneri/Memnuniyet
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Ürün Tipi</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                            name="productType">
                                    <?php foreach ($productType as $type): ?>
                                        <option <?= $complaint['productType'] == $type['id'] ? 'selected' : '' ?>
                                                value="<?= $type['id'] ?>"><?= $type['producttype'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Doküman Tipi</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                            name="documentType">
                                    <option value="" <?= $complaint['document_type'] == NULL ? 'selected' : '' ?>
                                            disabled>Seçilmedi
                                    </option>
                                    <?php foreach ($document_types as $type): ?>
                                        <option <?= $complaint['document_type'] == $type['id'] ? 'selected' : '' ?>
                                                value="<?= $type['id'] ?>"><?= $type['documentNo'] ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Müşteri Adresi</strong></label>
                                <textarea <?= $auth == 0 ? '' : 'disabled' ?> rows="1" class="form-control small"
                                                                              name="address"
                                                                              type="text"><?= $complaint['address'] ?: '' ?></textarea>
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Tamamlanma Türü</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?>
                                        class="form-select small" name="complatedType" id="">
                                    <option <?= $complaint['complatedType'] == NULL ? 'selected' : '' ?> disabled
                                                                                                         value="">
                                        Seçilmedi
                                    </option>
                                    <option <?= $complaint['complatedType'] == 1 ? 'selected' : '' ?> value="1">Müşteri
                                        Memnuniyeti
                                    </option>
                                    <option <?= $complaint['complatedType'] == 2 ? 'selected' : '' ?> value="2">Haklı
                                        Şikayet
                                    </option>
                                    <option <?= $complaint['complatedType'] == 3 ? 'selected' : '' ?> value="3">Şikayet
                                        Reddedildi
                                    </option>
                                </select>
                            </div>
                            <?php if (session('company_id')==8): ?>
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Kullanıldığı İl</strong></label>
                                <input class="form-control small" value="<?= $complaint['province'] ?>" readonly type="text">
                            </div>
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Kullanıldığı İlçe</strong></label>
                                <input class="form-control small" value="<?= $complaint['district'] ?>" readonly type="text">
                            </div>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Photo -->
            <div style="margin-bottom: 3.1rem!important;" class="col-12 col-sm-3">
                <div style="height: 111% !important;" class="card h-100 mb-5">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Fotoğraf</h6>
                    </header>

                    <div class="card-body mt-5" style="height:200px;">
                        <div style="margin:0" class="flexslider" id="slider">
                            <ul class="slides">
                                <?php foreach ($files as $file): ?>
                                    <li>
                                        <?php
                                        // Dosya adının sonundaki uzantıyı al
                                        $fileExtension = pathinfo($file['fileName'], PATHINFO_EXTENSION);

                                        // Video uzantılarını içeren dizi
                                        $videoExtensions = ['mp4', 'webm', 'avi', 'mkv', 'mov']; // Dilerseniz bu listeyi genişletebilirsiniz

                                        // Uzantının video uzantıları arasında olup olmadığını kontrol et
                                        if (in_array(strtolower($fileExtension), $videoExtensions)) {
                                            ?>
                                            <a href="<?= public_url('img/' . $file['fileName']) ?>" data-fancybox="photos">
                                                <video width="320" height="240" controls>
                                                    <source src="<?= public_url('img/' . $file['fileName']) ?>" type="video/<?= $fileExtension ?>">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= public_url('img/' . $file['fileName']) ?>" data-fancybox="photos">
                                                <img class="zoom" style="height: 300px; width: 320px" src="<?= public_url('img/' . $file['fileName']) ?>"/>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                <?php endforeach; ?>



                                <?php if (!empty($technicalReports)):
                                    foreach ($technicalReports

                                             as $report):
                                        ?>
                                        <?php if (intval(complaint::get_report_file_count($report['id'])[0]['COUNT(fileName)']) > 3): ?>
                                        <?php foreach (complaint::get_report_files($report['id']) as $file):
                                            if ($file['fileName'] != ""):  ?>

                                                <li>
                                                    <a href="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                       data-fancybox="photos"><img class="zoom" style="height: 300px;width: 320px"
                                                                                   src="<?= public_url('public/img/' . $file['fileName']) ?>"/></a>
                                                </li>
                                            <?php endif; endforeach; ?>

                                    <?php else: ?>
                                        <?php $i = 35;
                                        foreach (complaint::get_report_files($report['id']) as $file):
                                            if ($file['fileName'] != ""):
                                                ?>

                                                <li>
                                                    <a href="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                       data-fancybox="photos"><img class="zoom" style="height: 300px;width: 320px"
                                                                                   src="<?= public_url('public/img/' . $file['fileName']) ?>"/></a>
                                                </li>

                                                <?php $i += 120; endif; endforeach; ?>
                                    <?php endif; ?>



                                    <?php endforeach;
                                endif; ?>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Şikayet detayları-->
        <div class="row mt-5">
            <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Şikayet Detay</h6>
                    </header>

                    <div class="card-body">
                        <div class="row">
							<div id="market" class="col-md-12">
                               <label class="form-label text-custom"><strong>Pazar</strong></label>

                               <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small" name="market" id="market">
                                   <option disabled value="">Pazar Seçimi</option>
                                   <option <?= $complaint['market'] == 1 ? 'selected' : '' ?> value="1">Yurtiçi</option>
                                   <option <?= $complaint['market'] == 2 ? 'selected' : '' ?> value="2">Yurtdışı</option>
                               </select>
                            </div>
                            <div id="sealer" class="col-md-12">
                                <label class="form-label text-custom"><strong> Bayi Adı</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                            data-live-search="true" name="sealerupdate"
                                                                            id="Sealer">
                                    <?php foreach ($sealers as $sealer): ?>
                                        <option <?= $sealer['plantName'] === $complaint['sealer'] ? 'selected' : '' ?>
                                                data-tokens="<?= $sealer['plantAdress'] ?>"
                                                value="<?= $sealer['plantName'] ?>"><?= $sealer['plantName'] . "(" . $sealer['plantProvince'] . ")" ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div  id="otherdealer" class="col-md-12">
                                <label class="form-label text-custom"><strong>Diğer Bayi</strong></label>
                                <textarea <?= $auth == 0 ? '' : 'disabled' ?> class="form-control small"
                                                                              name="otherdealer" placeholder="Bayinizin adı listede yoksa buraya ekleyebilirsiniz"
                                                                              type="text" rows="1"><?= $complaint['otherdealer'] ? $complaint['otherdealer'] : '' ?></textarea>
                            </div>



                             <div id="subdealer" class="col-md-12">
                                <label class="form-label text-custom"><strong>Tali Bayi</strong></label>
                                <textarea <?= $auth == 0 ? '' : 'disabled' ?> class="form-control small"
                                                                              name="subdealer"
                                                                              type="text" rows="1"><?= $complaint['subdealer'] ? $complaint['subdealer'] : '' ?></textarea>
                              </div>
                          <?php if ($complaint['productSize'] != ""  && $complaint['companyId'] == 2): ?>
                            <div id="productsize" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Ürün Ebatları</strong></label>

                                    <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                                name="productSize" id="">
                                        <?php $sizes = bienmutlu::get_sizes();
                                        foreach ($sizes as $item):  ?>
                                            <option <?= strstr($item["size"], $complaint['productSize']) ? 'selected' : '' ?>
                                                    value="<?= $item["size"] ?>"><?= $item["size"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <?php elseif ($complaint['productSize'] != ""  && $complaint['companyId'] == 8):?>
                              <div id="productsize" class="col-md-12">
                                  <label class="form-label text-custom"><strong>Ürün Ebatları</strong></label>

                                  <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                              name="productSize" id="">
                                      <?php $sizes =quamutlu::get_longsizes();
                                      foreach ($sizes as $item):  ?>
                                          <option <?= strstr($item["longsize"], $complaint['productSize']) ? 'selected' : '' ?>
                                                  value="<?= $item["longsize"] ?>"><?= $item["longsize"] ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          <?php endif; ?>

                            <div  class="col-md-9">
                                <label class="form-label text-custom"><strong>Ürün Adı</strong></label>
                                <?php if($complaint['companyId']==2):?>
                                <select data-size="5" <?= $auth == 0 ? '' : 'disabled' ?> class="form-control selectpicker" data-live-search=true name="productName" id="productname">
                                    <?php if(!empty($productName['id'])):?>
                                        <?php foreach ($productsName as $product): ?>
                                            <option <?= $product['id'] == $productName['id'] ? 'selected' : '' ?>
                                                value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif;?>

                                    <?php if(empty($productName['productName'])):?>
                                        <option <?php if(!empty($productName['productName'])) echo ' hidden '; ?> >Müşteri Ürün Adı Seçmedi.</option>
                                        <?php foreach ($productsName as $product): ?>
                                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                </select>
                              <?php elseif ($complaint['companyId']==8):?>
                                    <select data-size="5" <?= $auth == 0 ? '' : 'disabled' ?> class="form-control selectpicker" data-live-search=true name="productName" id="productname">
                                        <?php if(!empty($productName['id'])):?>
                                            <?php foreach ($quaproducts as $product): ?>
                                                <option <?= $product['id'] == $productName['id'] ? 'selected' : '' ?>
                                                        value="<?= $product['id'] ?>"><?= $product['productName'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif;?>

                                        <?php if(empty($productName['productName'])):?>
                                            <option <?php if(!empty($productName['productName'])) echo ' hidden '; ?> >Müşteri Ürün Adı Seçmedi.</option>
                                            <?php foreach ($productsName as $product): ?>
                                                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                <?php endif;?>


                            </div>

                            <div class="col-md-3 mt-4">

                                <button type="button" onclick="myFunction()" class="btn btn-sm btn-custom mt-1 w-100">
                                    <i class="fas fa-copy"></i> Kopyala
                                </button>
                            </div>
                            <div id="complainttype" class="col-md-12">
                                <label class="form-label text-custom"><strong>Şikayet Konusu</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                            data-live-search="true"
                                                                            name="complaintSubject" id="complaintType">
                                    <option selected disabled value="">Şikayet Konusu</option>
                                    <?php foreach ($complaintTypes as $complaintType): ?>
                                        <option <?= $complaint['complaintType'] == $complaintType['id'] ? 'selected' : '' ?>
                                                value="<?= $complaintType['id'] ?>"><?= $complaintType['complaintname'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div id="productquality" class="col-md-12">
                                <label class="form-label text-custom"><strong>Ürünün Kalitesi</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small"
                                                                            name="productQuality" id="productQuality">
                                    <option disabled value="">Ürünün Kalitesi</option>
                                    <option <?= $complaint['productQuality'] == 1 ? 'selected' : '' ?> value="1">1.
                                        Kalite
                                    </option>
                                    <option <?= $complaint['productQuality'] == 2 ? 'selected' : '' ?> value="2">
                                        Endüstriyel
                                    </option>
                                </select>
                            </div>
                            <div id="productmetraj" class="col-md-6">
                                <label class="form-label text-custom"><strong>Ürün Metraj Bilgisi</strong></label>
                                <input <?= $auth == 0 ? '' : 'disabled' ?> type="text" name="metraj"
                                                                           class="form-control small"
                                                                           value="<?= $complaint['productQuantity'] ?>">
                            </div>
                            <div id="productmetrajtype" class="col-md-6">
                                <label class="form-label text-custom"><strong>Ürün Metraj Cinsi</strong></label>
                                <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-select small" name="metrajType"
                                                                            id="">
                                    <option <?= $complaint['quantityType'] == 'm2' ? 'selected' : '' ?> value="m2">m2
                                    </option>
                                    <option <?= $complaint['quantityType'] == 'adet' ? 'selected' : '' ?> value="adet">
                                        Adet
                                    </option>
                                </select>
                            </div>
                            <div id="productmetrajacc" class="col-lg-6">
                                <label class="form-label text-custom"><strong>Kabul Edilen Miktar</strong></label>
                                <input <?= $auth == 0 ? '' : 'disabled' ?> type="text" name="acceptedQuantity"
                                                                           class="form-control small"
                                                                           value="<?= $complaint['acceptedQuantity'] ?>">
                            </div>
                            <div id="productmetrajrej" class="col-lg-6">
                                <label class="form-label text-custom"><strong>Reddedilen Miktar</strong></label>
                                <input <?= $auth == 0 ? '' : 'disabled' ?> type="text" disabled
                                                                           class="form-control small"
                                                                           value="<?= intval($complaint['productQuantity']) - intval($complaint['acceptedQuantity']) ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-custom"><strong>Şikayet Açıklaması</strong></label>
                                <textarea <?= $auth == 0 ? '' : 'disabled' ?> name="productdesc"
                                                                              class="form-control small" cols="20"
                                                                              rows="5"><?= $complaint['message'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 mb-3">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Detay</h6>
                    </header>

                    <div class="card-body">
                        <div class="row" id="detailform" style="display: block">
                            <?php if (!empty($detail)): ?>
                               <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Ürünler uygulandı mı?</strong></label>
                                    <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-control" name="productApply" id="apply">
                                        <option <?= empty($detail['productApply']) ? 'selected' : '' ?> >Ürünler uygulandı mı ?</option>
                                        <option <?= $detail['productApply'] == "full" ? 'selected' : '' ?> value="full">
                                            Tamamı uygulandı
                                        </option>
                                        <option <?= $detail['productApply'] == "no" ? 'selected' : '' ?> value="no">
                                            Uygulanmadı
                                        </option>
                                        <option <?= $detail['productApply'] == "part" ? 'selected' : '' ?> value="part">Bir kısmı uygulandı                                        </option>
                                    </select>
                                   <input hidden name="complaint_id" value="<?=$complaint['id']?>">
                                </div>
                                <?php if ($detail['productApply'] == "part"): ?>
                                    <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                        <label class="form-label text-custom"><strong>Ne kadarı uygulandı
                                                ?</strong></label>
                                        <input <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                                   value="<?= $detail['applyDesc'] ?> metrekaresi uygulandı."
                                                                                   type="text" name="productapplydesc">
                                    </div>
                                <?php endif; ?>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Ürünün kutu bilgileri var mı
                                            ?</strong></label>
                                    <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                                name="productboxdetail">
                                        <option disabled value="">Ürünün kutu bilgileri var mı ?</option>
                                        <option <?= $detail['productBoxDetail'] == 1 ? 'selected' : '' ?> value="1">
                                            Evet
                                        </option>
                                        <option <?= $detail['productBoxDetail'] == 0 ? 'selected' : '' ?> value="0">
                                            Hayır
                                        </option>
                                    </select>
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Üretim Tarihi</strong></label>
                                    <input <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                               value="<?= $detail['productionDate'] ?>"
                                                                               type="date" name="productiondate">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Ebat Kalibre Numarası</strong></label>
                                    <input <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                               value="<?= $detail['productionCalibre'] ?>"
                                                                               type="text" name="productcalibre">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Renk Ton Numarası</strong></label>
                                    <input <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                               value="<?= $detail['productColorNumber'] ?>"
                                                                               type="text" name="productcolornumber">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Ürün Sevk Tarihi</strong></label>
                                    <input <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                               value="<?= $detail['productShipmentDate'] ?>"
                                                                               type="date" name="productshipmentdate">
                                </div>
                                <div style="margin-bottom: 15px;padding: 0" class="col-md-12">
                                    <label class="form-label text-custom"><strong>Uygulamada artan bütün seramik var mı
                                            ?</strong></label>
                                    <select <?= $auth == 0 ? '' : 'disabled' ?> class="form-control"
                                                                                name="productapplyques">
                                        <option selected disabled value="">Uygulamada artan bütün seramik var mı ?
                                        </option>
                                        <option <?= $detail['productApplyQuestion'] == 1 ? 'selected' : '' ?> value="1">
                                            Evet
                                        </option>
                                        <option <?= $detail['productApplyQuestion'] == 0 ? 'selected' : '' ?> value="0">
                                            Hayır
                                        </option>
                                    </select>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($auth == 0): ?>

                        <input type="hidden" name="complaint_id" value="<?= $complaint['id'] ?>">
                        <div class="card-footer p-3">

                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" value="<?= $complaint['id'] ?>" name="updateComplaint"
                                        class="btn btn-sm btn-custom mt-1">Güncelle
                                </button>
                                <button type="submit" value="1" name="complateComplaint"
                                        class="btn btn-sm btn-custom mt-1">Çözüldü
                                </button>
                                <button type="submit"  value="1" name="deletecomplaint"
                                        class="btn btn-sm btn-custom mt-1">Şikayeti Sil
                                </button>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    </form>
    <!-- Şikayet Detayları son -->

</div>
        <!-- Değerlendirme yorumları -->
            <div class="col-12 col-sm-12 mb-3">
                <div class="card ">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Teknik Hizmetler Değerlendirmesi</h6>
                    </header>
                    <?php if ($auth == 0): ?>
                    <div class="card-body">
                        <form method="post" action="<?= site_url('detail_complaint') ?>" enctype="multipart/form-data">
                            <p class="card-text">
                            <div class="col-md-12">
                                <textarea <?php if($auth!=0) echo ' disabled ' ?> name="expert_report" class="form-control" cols="20" rows="5" maxlength="500"></textarea>
                            </div>
                            <input type="hidden" name="complaint_id" value="<?= $complaint['id'] ?>">
                            <input type="hidden" name="complaint_type" value="1">
                            <div class="card-footer p-1">
                                <div class="d-grid gap-2 d-md-flex">
                                    <button type="submit" name="add_report" value="1"
                                            class="btn btn-sm btn-custom mt-2">
                                        Gönder
                                    </button>
                                    <label class="btn btn-sm mt-1" for="files"><img style="width:20px " src="<?= public_url('public/img/attach.svg') ?>" alt=""></label>
                                    <input style="display: none" id="files" class="form-control" multiple type="file" name="upload[]">
                                    <large>*Maximum 500 karakter sınırı vardır.</large>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>


                    <?php if (!empty($technicalReports)):
                        foreach ($technicalReports as $report):
                            ?>
                            <div class="card p-3 mb-2">

                                <div class=" flex-row">
                                    <div class="d-flex flex-column ms-2">
                                        <h6 class="md-12 text-primary"><?= user::get_user_name($report['user_id'])['name'] ?></h6>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p style="text-overflow: clip"
                                                   class="fs-10 "><?= $report['message'] ?></p>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php if (intval(complaint::get_report_file_count($report['id'])[0]['COUNT(fileName)']) > 3): ?>
                                                    <div style="border:solid 1px rgba(158,160,165,0.42);width: 350px;position: absolute;right: 35px"
                                                         class="owl-carousel owl-2">

                                                        <?php foreach (complaint::get_report_files($report['id']) as $file):

                                                            if ($file['fileName'] != ""):
                                                                ?>

                                                                <div class="media-29101">
                                                                    <a target="_blank"
                                                                       href="<?= public_url('public/img/' . $file['fileName']) ?>"><img
                                                                                style="width: 105px;height: 51px;margin-bottom: 0"
                                                                                src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                                alt="Image" class="img-fluid"></a>
                                                                </div>
                                                            <?php endif; endforeach; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <?php $i = 35;
                                                    foreach (complaint::get_report_files($report['id']) as $file):
                                                        if ($file['fileName'] != ""):
                                                            ?>
                                                            <div style="position: absolute;border:solid 1px rgba(158,160,165,0.42);right: <?= $i ?>px;max-height: 150px;">
                                                                <div class="media-29101">
                                                                    <a target="_blank"
                                                                       href="<?= public_url('public/img/' . $file['fileName']) ?>"><img
                                                                                style="width: 105px;height: 51px;margin-bottom: 0"
                                                                                src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                                alt="Image" class="img-fluid"></a>
                                                                </div>
                                                            </div>

                                                            <?php $i += 120; endif; endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                               <span class="comment-text"><?= $report['created_at'] ?>
                                   <?php if($auth==0):?>

                               <input <?= $report['reporting'] == 1 ? 'checked' : '' ?> type="checkbox"
                                                                                        id="check<?= $report['id'] ?>"
                                                                                        class="btn btn-sm btn-custom4 mt-2 check"
                                                                                        value="Rapora ekle"
                                                                                        style="margin-right: 0;margin-bottom: 10px"
                                                                                        onclick="setReporting(<?= $report['reporting'] ?>,<?= $report['id'] ?>)"/>
                               <label for="check<?= $report['id'] ?>">Rapora Ekle</label>
                                                           <?php endif;?>

                                   </span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach;endif; ?>
                </div>
            </div>
        <div class="col-12 col-sm-12 mb-3">
            <div class="card">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Fabrika Değerlendirmesi</h6>
                </header>
                <?php if ($complaint['authStatus'] == 1): ?>
                    <div class="card-body">
                        <form method="post" action="<?= site_url('detail_complaint') ?>" enctype="multipart/form-data">
                            <p class="card-text">
                            <div class="col-md-12">
                                <textarea name="expert_report" class="form-control" cols="20" rows="2" maxlength="500"></textarea>
                            </div>
                            <input type="hidden" name="complaint_id" value="<?= $complaint['id'] ?>">
                            <input type="hidden" name="complaint_type" value="2">
                            <div class="card-footer p-1">
                                <div class="d-grid gap-2 d-md-flex">
                                    <button type="submit" name="add_report" value="1"
                                            class="btn btn-sm btn-custom mt-2">
                                        Gönder
                                    </button>
                                    <label class="btn btn-sm mt-1" for="files"><img style="width:20px "
                                                                                    src="<?= public_url('public/img/attach.svg') ?>"
                                                                                    alt=""></label>
                                    <input style="display: none" id="files" class="form-control" multiple type="file"
                                           name="upload[]">
                                    <large>*Maximum 500 karakter sınırı vardır.</large>


                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>


                <?php if (!empty($factoryReports)):
                    foreach ($factoryReports as $report):
                        ?>
                        <div class="card p-3 mb-2">

                            <div class="flex-row">
                                <div class="d-flex flex-column ms-2">
                                    <h6 class="md-12 text-primary"><?= user::get_user_name($report['user_id'])['name'] ?></h6>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <p style="text-overflow: clip" class="fs-10 "><?= $report['message'] ?></p>
                                        </div>

                                        <div class="col-lg-4">
                                            <?php if (intval(complaint::get_report_file_count($report['id'])[0]['COUNT(fileName)']) > 3): ?>
                                                <div style="border:solid 1px rgba(158,160,165,0.42);width: 350px;position: absolute;right: 35px"
                                                     class="owl-carousel owl-2">

                                                    <?php foreach (complaint::get_report_files($report['id']) as $file):
                                                        if ($file['fileName'] != ""):
                                                            ?>
                                                            <div class="media-29101">
                                                                <a target="_blank"
                                                                   href="<?= public_url('public/img/' . $file['fileName']) ?>"><img
                                                                            style="width: 105px;height: 51px;margin-bottom: 0"
                                                                            src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                            alt="Image" class="img-fluid"></a>
                                                            </div>
                                                        <?php endif; endforeach; ?>
                                                </div>
                                            <?php else: ?>
                                                <?php $i = 35;
                                                foreach (complaint::get_report_files($report['id']) as $file):
                                                    if ($file['fileName'] != ""):
                                                        ?>
                                                        <div style="position: absolute;border:solid 1px rgba(158,160,165,0.42);right: <?= $i ?>px;max-height: 150px;">
                                                            <div class="media-29101">
                                                                <a target="_blank"
                                                                   href="<?= public_url('public/img/' . $file['fileName']) ?>"><img
                                                                            style="width: 105px;height: 51px;margin-bottom: 0"
                                                                            src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                            alt="Image" class="img-fluid"></a>
                                                            </div>
                                                        </div>

                                                        <?php $i += 120; endif; endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row">
                               <span class="comment-text"><?= $report['created_at'] ?>
                               <input <?= $report['reporting'] == 1 ? 'checked' : '' ?> type="checkbox"
                                                                                        id="check<?= $report['id'] ?>"
                                                                                        class="btn btn-sm btn-custom4 mt-2 check"
                                                                                        value="Rapora ekle"
                                                                                        style="margin-right: 0;margin-bottom: 10px"
                                                                                        onclick="setReporting(<?= $report['reporting'] ?>,<?= $report['id'] ?>)"/>
                               <label for="check<?= $report['id'] ?>">Rapora Ekle</label>
                                   </span>
                                </div>
                            </div>

                        </div>
                    <?php endforeach;endif; ?>
            </div>
        </div>
        <div class="col-12 col-sm-12 mb-3">
                <div class="card">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Sonuç Değerlendirmesi</h6>
                    </header>
                    <?php if ($auth == 0): ?>

                    <div class="card-body">
                        <form method="post" action="<?= site_url('detail_complaint') ?>" enctype="multipart/form-data">
                            <p class="card-text">
                            <div class="col-md-12">

                                <textarea name="expert_report" class="form-control" cols="20" rows="2" maxlength="500"></textarea>
                            </div>
                            <input type="hidden" name="complaint_id" value="<?= $complaint['id'] ?>">
                            <input type="hidden" name="complaint_type" value="3">
                            <div class="card-footer p-1">
                                <div class="d-grid gap-2 d-md-flex">
                                    <button type="submit" name="add_report" value="1"
                                            class="btn btn-sm btn-custom mt-2">
                                        Gönder
                                    </button>
                                    <label class="btn btn-sm mt-1" for="files"><img style="width:20px "
                                                                                    src="<?= public_url('public/img/attach.svg') ?>"
                                                                                    alt=""></label>
                                    <input style="display: none" id="files" class="form-control" multiple type="file"
                                           name="upload[]">
                                    <large>*Maximum 500 karakter sınırı vardır.</large>


                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif;?>

                    <?php if (!empty($resultReports)):
                        foreach ($resultReports as $report): ?>
                            <div class="card p-3 mb-2">

                                <div class="flex-row">
                                    <div class="d-flex flex-column ms-2">
                                        <h6 class="md-12 text-primary"><?= user::get_user_name($report['user_id'])['name'] ?></h6>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p style="text-overflow: clip"
                                                   class="fs-10 "><?= $report['message'] ?></p>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php if (intval(complaint::get_report_file_count($report['id'])[0]['COUNT(fileName)']) > 3): ?>
                                                    <div style="border:solid 1px rgba(158,160,165,0.42);width: 350px;position: absolute;right: 35px"
                                                         class="owl-carousel owl-2">
                                                        <?php foreach (complaint::get_report_files($report['id']) as $file):
                                                            if ($file['fileName'] != ""): ?>
                                                                <div class="media-29101">
                                                                    <a target="_blank"
                                                                       href="<?= public_url('public/img/' . $file['fileName']) ?>"><img
                                                                                style="width: 105px;height: 51px;margin-bottom: 0"
                                                                                src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                                alt="Image" class="img-fluid"></a>
                                                                </div>
                                                <?php endif; endforeach; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <?php $i = 35;
                                                    foreach (complaint::get_report_files($report['id']) as $file):
                                                        if ($file['fileName'] != ""):
                                                            ?>
                                                            <div style="position: absolute;border:solid 1px rgba(158,160,165,0.42);right: -<?= $i ?>px;max-height: 150px;">
                                                                <div class="media-29101">
                                                                    <a target="_blank"
                                                                       href="<?= public_url('public/img/' . $file['fileName']) ?>"><img
                                                                                style="width: 105px;height: 51px;margin-bottom: 0"
                                                                                src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                                alt="Image" class="img-fluid"></a>
                                                                </div>
                                                            </div>

                                                            <?php $i += 120; endif; endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                <span class="comment-text"><?= $report['created_at'] ?>
                                    <?php if($auth==0):?>

                                    <input <?= $report['reporting'] == 1 ? 'checked' : '' ?> type="checkbox"
                                                                                             id="check<?= $report['id'] ?>"
                                                                                             class="btn btn-sm btn-custom4 mt-2 check"
                                                                                             value="Rapora ekle"
                                                                                             style="margin-right: 0;margin-bottom: 10px"
                                                                                             onclick="setReporting(<?= $report['reporting'] ?>,<?= $report['id'] ?>)"/>
                                    <label for="check<?= $report['id'] ?>">Rapora Ekle</label>
                                                            <?php endif;?>

                                    </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;endif; ?>
                </div>
            </div>
    <?php if($auth==0): ?>
      <div class="col-12 col-sm-12 mb-3">
        <div class="card">
           <header class="card-header d-md-flex align-items-center bg-custom2">
            <h6 class="card-header-title text-light mt-1">Fatura Bilgileri</h6>
          </header>

                <div class="card-body">
                    <p class="card-text"></p>
                    <form action="<?= site_url('detail_complaint') ?>" method="post">
                      <div class="row">
                            <div class="col-12 col-md-6 col-sm-6 p-2">
                                <label class="form-label text-custom" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><strong>Fatura Numarası</strong></label>
                                <input rows="1"  class="form-control small" name="billNumber" type="text" value="<?= isset($complaint['billNumber'])?$complaint['billNumber']:'' ?>">
                            </div>
                            <div class="col-12 col-md-3 col-sm-3 p-2 mt-1">
                              <label class="form-label text-custom"><strong>Fatura Tutarı</strong></label>
                              <input rows="1"  class="form-control small" name="billAmount" type="text" value="<?php if($complaint['currency']==1){echo $complaint['billAmount'];} else if($complaint['currency']==2){ echo $complaint['billAmountUSD'];}else if ($complaint['currency']==3){echo $complaint['billAmountEuro'];} else if ($complaint['currency']==4){echo $complaint['billAmountGBP'];}?>">
                          </div>
                          <div class="col-12 col-md-3 col-sm-3 p-2 mt-1">
                              <label class="form-label text-custom"><strong>Para birimi</strong></label>
                              <select class="form-select" name="currency">
                                  <option <?=$complaint['currency']==1 ? ' Selected ':''?> value="TRY">TRY</option>
                                  <option <?=$complaint['currency']==2 ? ' Selected ':''?> value="EURO">EURO</option>
                                  <option <?=$complaint['currency']==3 ? ' Selected ':''?> value="USD">USD</option>
                                  <option <?=$complaint['currency']==4 ? ' Selected ':''?> value="USD">GBP</option>
                              </select>
                          </div>


                            <div class="col-12 col-md-6 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Açıklama</strong></label>
                                <input  rows="1" class="form-control small" name="billDesc" type="text" value="<?= isset($complaint['billDesc'])?$complaint['billDesc']:'' ?>">
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 mt-4 p-2">
                                <button type="submit" value="1" name="billSend"
                                        class="btn btn-sm btn-custom mt-1">Gönder
                                </button>
                            </div>
                        <input hidden name="complaint_id" value="<?=$complaint['id']?>" >
                        </div>
                    </form>
                </div>
         </div>
      </div>
    <?php endif;?>




        <?php if (!empty($sum_survey)): ?>
        <div style="text-align-last: justify;" class="col-12 col-sm-12 mb-3">
            <div style="height: 111% !important;" class="card" style="align-items: center;">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Anket Sonucu</h6>
                </header>
                <div class="container">
                    <input type="radio" class="radio" name="progress_survey" value="surveyzero" id="surveyzero">
                    <label for="surveyzero" class="label">0</label>
                    <input type="radio" class="radio" name="progress_survey" value="surveyzero" id="surveyzero">
                    <label for="surveyzero" class="label">5</label>
                    <input type="radio" class="radio" name="progress_survey" value="surveyfive" id="surveyfive">
                    <label for="surveyfive" class="label">10</label>
                    <input type="radio" class="radio" name="progress_survey" value="surveyfive" id="surveytwentyfive">
                    <label for="surveytwentyfive" class="label">15</label>
                    <input type="radio" class="radio" name="progress_survey" value="fifty" id="surveyfifty">
                    <label for="surveyfifty" class="label">20</label>
                    <input type="radio" class="radio" name="progress_survey" value="seventyfive" id="surveyseventyfive">
                    <label for="surveyseventyfive" class="label">25</label>
                    <input type="radio" class="radio" name="progress_survey" value="surveyfive" id="surveyfive">
                    <label for="surveytfive" class="label mr-0">30</label>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?= $sum_progress ?>%"></div>
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>1.Şikayetinizi hızlı ve kolayca iletebildiniz mi?</strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question1'] ?>">
                    </div>

                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>2.Şikayet iletimi sonrası hızlı dönüş sağlandı mı? </strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question2'] ?>">
                    </div>

                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>3.Çözümü üretmek amacıyla sizinle iletişime geçen yada yerinde tespit yapan uzmanımızdan  memnun kaldınız mı?</strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question3'] ?>">
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>4.Şikayetiniz hızlıca sonuçlandırıldı mı?</strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question4'] ?>">
                    </div>
                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>5.Şikayetiniz için üretilen çözümden memnun kaldınız mı?</strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question5'] ?>">
                    </div>
                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>6.Bien markasını tavsiye eder misiniz?</strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question6'] ?>">
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-12 col-sm-3 p-2 ml-5">
                        <label class="form-label text-custom"><strong>Diğer düşünce ve yorumlarınız:</strong></label>
                        <input disabled class="form-control small" value="<?= $survey_results['question7'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php if($auth==0): ?>
        <div class="col-12 col-sm-12 mb-3">

            <div   class="card">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Kişi Yetkilendirme</h6>
                </header>

                <div class="card-body">
                    <p class="card-text"></p>
                    <form action="<?= site_url('detail_complaint') ?>" method="post">
                        <div class="col-12 col-sm-12 p-2">
                            <label class="form-label text-custom"><strong> Yetkili Kişi Seçimi</strong></label>

                            <select style="height: <?= count($auth_person) * 19.5 ?>px; " multiple="multiple"
                                    class="form-select small selectbox" name="persons[]">
                                <?php for ($i = 0; $i < count($auth_person); $i++): ?>
                                    <option <?php
                                    foreach ($auth_persons as $authed_person) {
                                        if ($auth_person[$i]['authorizedCode'] == $authed_person['authPersonId'] && $authed_person['status'] == 1) {
                                            echo ' selected ';
                                        }
                                    }
                                    ?>
                                            value="<?= $auth_person[$i]['authorizedCode'] ?>"><?= $auth_person[$i]['authorizedName'] ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <input id="cmplint_id" type="hidden" name="complaint_id" value="<?= $complaint['id'] ?>">
                        <div class="d-grid gap-2 d-md-flex mb-5">
                            <?php if (empty($auth_persons)): ?>
                                <input type="submit" name="auth_persons" id="AA" class="btn btn-sm btn-custom mt-2"
                                       value="Kişiyi Yetkilendir">
                            <?php endif; ?>
                            <?php if ($auth_persons): ?>
                                <input type="submit" name="update_persons" id="BB" class="btn btn-sm btn-custom mt-2"
                                       value="Yetkilendirmeyi Güncelle">
                            <?php endif; ?>

                        </div>
                    </form>
                </div>
            </div>

            <div class="accordion accordion-flush mt-3 mb-3" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed bg-custom2 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Gönderilecek Fotoğraflar
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <?php foreach ($files as $file): ?>

                                    <?php $fileName = $file['fileName'];
                                $pathInfo = pathinfo($fileName);
                                $extension = strtolower($pathInfo['extension']);
                                $supportedExtensions = array('mp4', 'webm', 'avi', 'mkv', 'mov');?>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox image-checkbox">
                                            <input <?php if (in_array($extension, $supportedExtensions)){echo 'data-video="'.$file['id'].'"';}else{echo 'data-id="'.$file['id'].'"';}?>    type="checkbox"
                                                                                                                                                                                           class="custom-control-input image-ids" id="ck1a<?= $file['fileName'] ?>">
                                            <label class="custom-control-label" for="ck1a<?= $file['fileName'] ?>">
                                                <?php
                                                // Dosya adının sonundaki uzantıyı al
                                                $fileExtension = pathinfo($file['fileName'], PATHINFO_EXTENSION);

                                                // Video uzantılarını içeren dizi
                                                $videoExtensions = ['mp4', 'webm', 'avi', 'mkv', 'mov']; // Dilerseniz bu listeyi genişletebilirsiniz

                                                // Uzantının video uzantıları arasında olup olmadığını kontrol et
                                                if (in_array(strtolower($fileExtension), $videoExtensions)) {
                                                    ?>
                                                    <video class="img-fluid" width="320" height="240" controls>
                                                        <source src="<?= public_url('img/' . $file['fileName']) ?>" type="video/<?= $fileExtension ?>">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="<?= public_url('img/' . $file['fileName']) ?>" class="img-fluid">
                                                    <?php
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                                <?php if (!empty($technicalReports)):
                                    foreach ($technicalReports as $report):
                                        ?>
                                        <?php if (intval(complaint::get_report_file_count($report['id'])[0]['COUNT(fileName)']) > 3): ?>
                                        <?php foreach (complaint::get_report_files($report['id']) as $file):

                                            if ($file['fileName'] != ""):
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox image-checkbox">
                                                        <input data-report="<?= $file['id'] ?>" type="checkbox"
                                                               class="custom-control-input image-ids"
                                                               id="ck1a<?= $file['fileName'] ?>">
                                                        <label class="custom-control-label"
                                                               for="ck1a<?= $file['fileName'] ?>">
                                                            <img src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                 class="img-fluid">
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif; endforeach; ?>
                                    <?php else: ?>
                                        <?php $i = 35;
                                        foreach (complaint::get_report_files($report['id']) as $file):
                                            if ($file['fileName'] != ""):
                                                ?>

                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox image-checkbox">
                                                        <input data-report="<?= $file['id'] ?>" type="checkbox"
                                                               class="custom-control-input image-ids"
                                                               id="ck1a<?= $file['fileName'] ?>">
                                                        <label class="custom-control-label"
                                                               for="ck1a<?= $file['fileName'] ?>">
                                                            <img src="<?= public_url('public/img/' . $file['fileName']) ?>"
                                                                 class="img-fluid">
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php $i += 120; endif; endforeach; ?>
                                    <?php endif; ?>
                                    <?php endforeach;endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




                <script>
                    $('.image-ids').change(function () {
                var reportIds = []; // Seçilen report id'leri içeren dizi
                var dataIds = []; // Seçilen data id'leri içeren dizi
                var datavideoIds = []; // Seçilen video id'leri içeren dizi
                $('.image-ids').each(function () {
                    if ($(this).is(':checked')) {
                        var reportfileid = $(this).attr('data-report');
                        var dataId = $(this).attr('data-id');
                        var videoId = $(this).attr('data-video');

                        // Değerlerin undefined olup olmadığını kontrol et
                        if (reportfileid !== undefined) {
                            reportIds.push(reportfileid);
                        }

                        if (dataId !== undefined) {
                            dataIds.push(dataId);
                        }

                        if (videoId !== undefined) {
                            datavideoIds.push(videoId);
                        }
                    }
                });
                var combinedData = {
                    datavideoIds: datavideoIds,
                    reportIds: reportIds,
                    dataIds: dataIds
                };

                var encodedCombinedData = encodeURIComponent(JSON.stringify(combinedData));




                var customermaillink = "https://verimportal.com/sendcomplaintdocument?complaint=" + btoa($('#cmplint_id').val()) + "&pics=" + encodedCombinedData;
                var authorizedmaaillink = "https://verimportal.com/sendcomplaintdocumenttoauthorities?complaint=" + btoa($('#cmplint_id').val()) + "&pics=" + encodedCombinedData;
                var customerbutton = document.getElementById("customermailbutton");
                var authorizedbutton = document.getElementById("authorizedmailbutton");
                customerbutton.href = customermaillink;
                authorizedbutton.href = authorizedmaaillink;
            });
                </script>

        </div>
    <?php endif; ?>

    <?php if($auth==0 && $complaint['category']=="Şikayet/Tedarik"): ?>
    <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bayi Ürün Stoğu Bilgisi</h6>
                </header>

                <div class="card-body">
                    <p class="card-text"></p>
                    <form action="<?= site_url('detail_complaint') ?>" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6 col-sm-6">
                                <select class="form-control  selectpicker" data-size="8"
                                        title="Stok Bulunan Bayiyi Seçiniz" data-live-search="true"
                                        name="sealeravaible">
                                    <?php if ($complaint['sealeravaible']!=NULL):?>
                                    <option <?= $complaint['sealeravaible']!=NULL ? 'selected' :'' ?>><?=$complaint['sealeravaible']?></option>
                                    <?php endif;?>
                                    <?php foreach ($sealers as $sealer): ?>
                                        <option value="<?= $sealer['plantName'] ?>"><?= $sealer['plantName'] . "(" . $sealer['plantProvince'] . ")" ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 ">
                                <button type="submit" style="width: 100%" value="1" name="sealer"
                                        class="btn btn-sm btn-custom mt-1">Müşteriye Bayi Bilgisini İlet
                                </button>
                            </div>
                            <input hidden name="complaintid" value="<?= $complaint['id'] ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

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

    <!--Değerlendirme yorumları son -->
    <!-- Rapor oluştur -->
    <?php if ($auth == 0): ?>

        <div class="card-footer p-3" style="">
            <?php if ($confirmed == 1): ?>
                <input class="form-check-input" <?= $complaint['technicalConfirm'] != 0 ? 'checked' : '' ?>
                       data-value="<?= $complaint['technicalConfirm'] ?>" type="checkbox" name="confirm"
                       id="technicalConfirm" style="margin-left: 32%;height: 16px;width:16px"><label
                        style="margin-top: 0!important;margin-left: 35%; font-size: 15px;font-weight: 950!important;color: black; text-align:center;alignment: center "
                        class="form-label" for="technicalConfirm">Teknik   <?php if ($complaint['companyId']==2) {echo 'Hizmetler  Şefi';}else{echo ' İşler Formeni';} ?> olarak raporu elektronik ortamda imzala</label>
            <?php elseif ($confirmed == 2): ?>
                <input class="form-check-input" <?= $complaint['processConfirm'] != 0 ? 'checked' : '' ?>
                       data-value="<?= $complaint['processConfirm'] ?>" type="checkbox" name="confirm"
                       id="processConfirm" style="margin-left: 32%;height: 16px;width:16px"><label
                        style="margin-top: 0!important;margin-left: 35%;font-weight: 750!important;color: black"
                        class="form-label" for="processConfirm">Kalite Güvence Ve Proses Kontrol Müdürü olarak raporu
                    elektronik ortamda imzala</label>
            <?php elseif ($confirmed == 3): ?>
                <input class="form-check-input" <?= $complaint['factoryConfirm'] != 0 ? 'checked' : '' ?>
                       data-value="<?= $complaint['factoryConfirm'] ?>" type="checkbox" name="confirm"
                       id="factoryConfirm" style="margin-left: 32%;height: 16px;width:16px"><label
                        style="margin-top: 0!important;margin-left: 35%;font-weight: 750!important;color: black"
                        class="form-label" for="factoryConfirm">Fabrikalar Direktörü olarak raporu elektronik ortamda
                    imzala</label>
            <?php elseif ($confirmed == 4): ?>
                <input class="form-check-input" <?= $complaint['technologyConfirm'] != 0 ? 'checked' : '' ?>
                       data-value="<?= $complaint['technologyConfirm'] ?>" type="checkbox" name="confirm"
                       id="technologyConfirm" style="margin-left: 32%;height: 16px;width:16px"><label
                        style="margin-top: 0!important;margin-left: 35%;font-weight: 750!important;color: black"
                        class="form-label" for="factoryConfirm">Arge ve Teknoloji Direktörü olarak raporu elektronik ortamda
                    imzala</label>
            <?php endif; ?>
    <?php endif; ?>

            <div class="row" style=" margin:auto">
                <div class="d-grid gap-6 "><a target="_blank"
                                              href="<?= site_url('complaint_form?complaint=') . base64_encode($complaint['id']) ?>"
                                              type="submit" name="createForm" class="btn btn-custom mt-1">Bildirim Formu
                        Oluştur</a>
                </div>
                <div class="d-grid gap-6 "><a target="_blank"
                                              href="<?= site_url('complaint_report?complaint=') . base64_encode($complaint['id']) ?>"
                                              type="submit" name="updateEmployee" class="btn btn-custom mt-1">Rapor
                        Oluştur</a>
                </div>
                <?php if ($auth == 0): ?>

                    <div class="d-grid gap-6 "><a id="customermailbutton" style="" target="_blank"
                                                  href="<?= site_url('sendcomplaintdocument?complaint=') . base64_encode($complaint['id']) ?>"
                                                  type="submit" name="updateEmployee" class="btn btn-custom mt-1">Müşteriye Rapor
                            İlet</a>
                    </div>
                    <div class="d-grid gap-6 "><a style="" id="authorizedmailbutton" target="_blank"
                                                  href="<?= site_url('sendcomplaintdocumenttoauthorities?complaint=') . base64_encode($complaint['id']) ?>"
                                                  type="submit" name="authPersonReport" class="btn btn-custom mt-1"> Yetkili Kişilere Rapor İlet</a>
                    </div>
                <?php endif;?>
            </div>


        </div>


<!-- Rapor oluştur son -->


<?php require 'mainPage_statics/footer.php';?>

<script defer src="<?= public_url('js/jquery.fancybox.js') ?>"></script>
<script defer src="<?= public_url('js/jquery.flexslider-min.js') ?>"></script>
<script defer src="<?= public_url('js/lightbox.min.js') ?>"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


    <style>

    .form-label {
        margin-bottom: 0;
        margin-top: 0.5rem;
    }

    p {
        color: #000000;
        font-weight: bold !important;
    }

    .owl-nav {
        display: none;
    }

    .owl-dots {
        display: none;

    }

    body {
        font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
        color: #A9A9A9;
        background: #2a2a2a;
    }

    .container {
        margin: 60px auto;
        width: 900px;
        text-align: center;
    }

    .container .progress {
        margin: 0px;
        width: 900px;
    }

    .progress {
        padding: 4px;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 6px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    }

    .progress-bar {
        height: 16px;
        border-radius: 4px;
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        -webkit-transition: 0.4s linear;
        -moz-transition: 0.4s linear;
        -o-transition: 0.4s linear;
        transition: 0.4s linear;
        -webkit-transition-property: width, background-color;
        -moz-transition-property: width, background-color;
        -o-transition-property: width, background-color;
        transition-property: width, background-color;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    }

    #zero:checked ~ .progress > .progress-bar {
        width: 0%;
        background-color: #4f5050;
    }


    #twenty:checked ~ .progress > .progress-bar {
        width: 15%;
        background-color: #f27011;
    }

    #thirty:checked ~ .progress > .progress-bar {
        width: 22.8%;
        background-color: #f2b01e;
    }

    #thirtytwo:checked ~ .progress > .progress-bar {
        width: 29%;
        background-color: #f2b01e;
    }
    #fifty:checked ~ .progress > .progress-bar {
        width: 45%;
        background-color: #f2d31b;
    }
    #sixty:checked ~ .progress > .progress-bar {
        width: 60%;
        background-color: #f2d31b;
    }
    #sixtyfive:checked ~ .progress > .progress-bar {
        width: 73%;
        background-color: #9EC73B;
    }

    #seventy:checked ~ .progress > .progress-bar {
        width: 85%;
        background-color: #98FB98;
    }

    #onehundred:checked ~ .progress > .progress-bar {
        width: 100%;
        background-color: #86e01e;
    }


    .radio {
        display: none;
    }

    .label {
        border: #95999c solid 1px;
        margin-bottom: 5px;
        display: inline-block;
        font-weight: bolder;
        padding: 3px 8px;
        color: #000000;
        border-radius: 3px;
        cursor: pointer;
    }

    .radio:checked + .label {
        color: #6b15b6;
        background: rgba(0, 0, 0, 0.25);
    }

    .btn-custom4 {
        height: 30px;
        color: #ffffff;
        margin: 14px;
    }


</style>

<style>

    .flex-direction-nav a:before {
        font-family: "flexslider-icon";
        font-size: 30px;
        display: block;
        content: '\f001';
        line-height: 40px;
    }

</style>


<script>
    function myFunction() {
        var e = document.getElementById("productname");
        var text = e.options[e.selectedIndex].text;
        // Copy the text inside the text field
        navigator.clipboard.writeText(text);
    }
</script>



<script>
    $(document).ready(function () {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 50,
            itemMargin: 5,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
</script>

<script>
    <?php if ($confirmed == 3): ?>
    document.getElementById("factoryConfirm").onclick = function () {
        if (document.getElementById("factoryConfirm").dataset.value == "0") {
            $.post("<?= site_url('detail_complaint') ?>", {
                setFactoryConfirm: 1,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("factoryConfirm").dataset.value = "1";
        } else {
            $.post("<?= site_url('detail_complaint') ?>", {
                setFactoryConfirm: 0,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("factoryConfirm").dataset.value = "0";
        }

    }
    <?php elseif ($confirmed == 1): ?>
    document.getElementById("technicalConfirm").onchange = function () {
        if (document.getElementById("technicalConfirm").dataset.value == "0") {

            $.post("<?= site_url('detail_complaint') ?>", {
                setTechnicalConfirm: 1,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("technicalConfirm").dataset.value = "1";
        } else {
            $.post("<?= site_url('detail_complaint') ?>", {
                setTechnicalConfirm: 0,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("technicalConfirm").dataset.value = "0";
        }
    }
    <?php elseif ($confirmed == 2): ?>
    document.getElementById("processConfirm").onchange = function () {
        if (document.getElementById("processConfirm").dataset.value == "0") {
            $.post("<?= site_url('detail_complaint') ?>", {
                setProcessConfirm: 1,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("processConfirm").dataset.value = "1";
        } else {
            $.post("<?= site_url('detail_complaint') ?>", {
                setProcessConfirm: 0,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("processConfirm").dataset.value = "0";
        }

    } 
    <?php elseif ($confirmed == 4): ?>
    document.getElementById("technologyConfirm").onchange = function () {
        if (document.getElementById("technologyConfirm").dataset.value == "0") {
            $.post("<?= site_url('detail_complaint') ?>", {
                settechnologyConfirm: 1,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("technologyConfirm").dataset.value = "1";
        } else {
            $.post("<?= site_url('detail_complaint') ?>", {
                setProcessConfirm: 0,
                complaint_id: <?= $complaint['id'] ?>
            }, function (result) {
                //alert(result);
            });
            document.getElementById("technologyConfirm").dataset.value = "0";
        }

    }
    <?php endif; ?>

    function setReporting(reporting, reportId) {

        $.post("<?= site_url('detail_complaint') ?>", {
            setReport: 1,
            reporting: reporting,
            reportId: reportId
        }, function (result) {
            //alert(result)
        });


    }
</script>
<style>
    .form-label {
        margin-bottom: 0;
        margin-top: 0.5rem;
    }

    p {
        color: #000000;
        font-weight: bold !important;
    }

    .owl-nav {
        display: none;
    }

    .owl-dots {
        display: none;

    }

    body {
        font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
        color: #A9A9A9;
        background: #2a2a2a;
    }

    .container {
        margin: 60px auto;
        width: 900px;
        text-align: center;
    }

    .container .progress {
        margin: 0px;
        width: 900px;
    }

    .progress {
        padding: 4px;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 6px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    }

    .progress-bar {
        height: 16px;
        border-radius: 4px;
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
        -webkit-transition: 0.4s linear;
        -moz-transition: 0.4s linear;
        -o-transition: 0.4s linear;
        transition: 0.4s linear;
        -webkit-transition-property: width, background-color;
        -moz-transition-property: width, background-color;
        -o-transition-property: width, background-color;
        transition-property: width, background-color;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    }

    #surveyzero:checked ~ .progress > .progress-bar {
        width: 0%;
        background-color: #4f5050;
    }


    #surveyfive:checked ~ .progress > .progress-bar {
        width: 16.6%;
        background-color: #ff0000;
    }

    #surveytwentyfive:checked ~ .progress > .progress-bar {
        width: 32.8%;
        background-color: #f27011;
    }

    #surveyfifty:checked ~ .progress > .progress-bar {
        width: 46.4%;
        background-color: #f2b01e;
    }

    #surveyseventyfive:checked ~ .progress > .progress-bar {
        width: 66%;
        background-color: #f2d31b;
    }

    #surveytfive:checked ~ .progress > .progress-bar {
        width: 79%;
        background-color: #98FB98;
    }


    #surveyonehundred:checked ~ .progress > .progress-bar {
        width: 100%;
        background-color: #86e01e;
    }


    .radio {
        display: none;
    }

    .label {
        border: #95999c solid 1px;
        margin-bottom: 5px;
        display: inline-block;
        font-weight: bolder;
        padding: 3px 8px;
        color: #000000;
        border-radius: 3px;
        cursor: pointer;
    }

    .radio:checked + .label {
        color: #6b15b6;
        background: rgba(0, 0, 0, 0.25);
    }

    .btn-custom4 {
        height: 30px;
        color: #ffffff;
        margin: 14px;
    }


</style>

<script>
    function setStatus(status) {

    $.post("<?= site_url('detail_complaint') ?>", {

        status: <?= $status['id'] ?>

    }, function (status) {
    });

    }
</script>
    <script>
        var ctx = document.getElementById("surveyChart");
        var myChart = new Chart(ctx, {
            type: "bar",

            data: {
                labels: [
                    'KASİLEMEME',
                    'DEFRORMASYON',
                    'ALT ENGOB İZİ',
                    'RENK FARKI',
                    'HASARLI PALET VE KIRIK...',
                    'ÇİZİK',
                    'YÜZEY KALİTE HATASI',
                    'KOD/TARİH HATASI ',
                    'DEFOLUDAN ŞİKAYET',
                    'EBAT HATASI',
                    'BİEN ÜRÜNÜ',
                    'YANLIŞ ÜRÜN SEVK',
                    'ISLAK/KÜFLÜ KUTU/PALET',
                    'KİRLENME',
                    'TEMİZLENEMEME',
                    'YÜZEYDE ÇAPAK',
                    'MATLAŞMA',
                    'KENAR KÖŞE KIRILIĞI',
                    'DİĞER',
                    'KENAR MATLIĞI',
                    'PALETTE KARIŞIK ÜRÜN',
                    'YÜKLEME PROBLEMİ',
                    'GECİKME',
                    'REKTİPİYE HATASI',
                    'KULLANICI HATASI',
                    'KULLANIMDA KIRILMA',
                    'YANLIŞ ETŞİKRTTEN HATASI',
                    'YAPIŞMAMA',
                    'MASSE RENK FARKI',
                    'KALINLIK FARKI',
                    'ALT KIRIK',
                    'PAH HATASI',
                    'BELİRTİLMEYEN',
                    'STDTAN KAYMA',
                    'PAKETLEME VANTUZ İZİ',
                    'TANER İNŞ ÜRÜNÜ',
                    'PARLATMA HATASI',
                    'MATLIK',
                    'SU LEKESİ',
                    'BARKOD OKUNAMAMA',
                    'DAMGASIZ PALET',
                    'KENAR ÇATLAĞI',
                    'YANLIŞ EVRAK',
                    'NANO LEKESİ',
                    'ÇİN ÜRÜNÜ',
                    'PASLANMA',
                    'RÖLYEF KAYBI HATASI LEKESİ',
                    'HAVALI PRESLEME',
                    'KATALUĞA GÖRE RENK...',
                ],
                datasets: [{
                    data: [68, 48, 34, 33, 27, 23, 23, 15, 14, 13, 12, 12, 11, 9, 9, 9, 6, 6, 5, 5, 5, 4, 4, 4, 3, 3, 3, 3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,

                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                    ],
                    borderWidth: 1,

                }]
            },
            options: {
                responsive: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>

