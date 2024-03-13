<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="QTech">
    <title>ANKET </title>
    <link rel="shortcut icon" href="<?= public_url('img/favicon.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= public_url('css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/buttons.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/fontawesome6/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/boostrap-multiselect.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/main.css') ?>">
    <link rel="stylesheet" href="<?= public_url('css/flexslider.css') ?>">
    <link rel="stylesheet" href="<?= public_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= public_url('public/css/icomoonstyle.css') ?>">
    <link rel="stylesheet" href="<?= public_url('public/css/owl.carousel.min.css') ?>">
    <link href="<?= public_url('css/shCore.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= public_url('css/shThemeDefault.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= public_url('css/lightbox.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <style>
        .regular{
            font-size: 14px;
            font-family: "Open Sans", sans-serif;
            font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }
        .small{
            font-size: 12.5px;
            font-family: "Open Sans", sans-serif;
            font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }
        #send{
            background-color: #ff14a4;
            color: white;
        }
        #send:hover{
            background-color:  #0a53be;
        }
    </style>
</head>
<body>

<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn"  >
    <div class="row " style="background-color:  #c5d6e6">


        <div   class="col-md-12 col-12">
            <img style="width: 95px" class="mt-3"  src="<?= public_url('img/bienlogo.png') ?>" alt="">
            <img style="width: 95px;height: 60px;float: right" class="mt-2" src="<?= public_url('img/destek.png') ?>" alt="">

        </div>

    </div>
    <div class="row " style="background-color:  #c5d6e6;height:40 ">
        <div   class="col-md-12 col-12 mt-4 text-center "style="margin: auto; ">
            <span class="fw-bolder mb-4" style="font-size: 22px;"  >BİEN YAPI ÜRÜNLERİ SAN. TURZ. VE TİC A.Ş.MÜŞTERİ MEMNUNİYET ANKETİ</span>
        </div>
    </div>

    <div class="row mt-3" >

        <div style="overflow-y:auto;max-height: 756px; text-align: center ;font-family: Anaheim" class="col-md-12 col-sm-12 col-lg-12 mt-3 mb-3">
            <h5>Lütfen memnuniyetinizi 5'ten 1'e doğru  derecelendirin.  </h5>
			<h5>5 en yüksek puan 1 en düşük puan değerindedir.</h5>
        </div>
    </div>
    <form action="<?=site_url('anket')?>" method="post">
        <input type="hidden" name="complaint" value="<?= base64_decode(get('s')); ?>">
        <input type="hidden" name="companyid" value="<?= complaint::get_company_id_by_complaint_id(base64_decode(get('s')))['companyId'] ?>">
        <div class="" style="background-color:  #c5d6e6;width: 80%;margin: auto;border-radius: 25px ;">
       <div class="row">
           <div class="container" style="text-align: center" >
                   <div class="form-group  mt-2 "  >
                       <label for="question" style="font-size: 18px ; "><b>1.Şikayetinizi hızlı ve kolayca iletebildiniz mi?</b></label>
                       <br>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q1" id="input1" value="5">
                           <label class="form-check-label" for="red" >5</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q1" id="input1" value="4">
                           <label class="form-check-label" for="red">4</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q1" id="input1" value="3">
                           <label class="form-check-label" for="red">3</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q1" id="input1" value="2">
                           <label class="form-check-label" for="red">2</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q1" id="input1" value="1">
                           <label class="form-check-label" for="red">1</label>
                       </div>
                   </div>
           </div>
       </div>
       <div class="row">
           <div class="container" style="text-align: center  ">
                   <div class="form-group  "  style="background-color:  #c5d6e6" >
                       <label for="question" style="font-size: 18px"><b>2.Şikayet iletimi sonrası hızlı dönüş sağlandı mı?</b></label>
                       <br>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q2" id="input2" value="5">
                           <label class="form-check-label" for="red" >5</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q2" id="input2" value="4">
                           <label class="form-check-label" for="red">4</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q2" id="input2" value="3">
                           <label class="form-check-label" for="red">3</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q2" id="input2" value="2">
                           <label class="form-check-label" for="red">2</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q2" id="input2" value="1">
                           <label class="form-check-label" for="red">1</label>
                       </div>
                   </div>
           </div>
       </div>
       <div class="row">
           <div class="container   border-dark">
                   <div class="form-group" style=" text-align: center" >
                       <label for="question" style="font-size: 18px; "><b>3.Çözümü üretmek amacıyla sizinle iletişime geçen yada yerinde tespit yapan uzmanımızdan  memnun kaldınız mı? </b></label>
                       <br>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q3" id="3" value="5">
                           <label class="form-check-label" for="red">5</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q3" id="3" value="4">
                           <label class="form-check-label" for="red">4</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q3" id="3" value="3">
                           <label class="form-check-label" for="red">3</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q3" id="3" value="2">
                           <label class="form-check-label" for="red">2</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">

                           <input class="form-check-input btn-lg" type="radio" name="q3" id="3" value="1">
                           <label class="form-check-label" for="red">1</label>
                       </div>
                   </div>
           </div>
       </div>
       <div class="row">
           <div class="container" style="text-align: center">
                   <div class="form-group rounded-pill"   >
                       <label for="question" style="font-size: 18px"><b>4.Şikayetiniz hızlıca sonuçlandırıldı mı?</b></label>
                       <br>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q4" id="4" value="5">
                           <label class="form-check-label" for="red">5</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q4" id="red" value="4">
                           <label class="form-check-label" for="red">4</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q4" id="red" value="3">
                           <label class="form-check-label" for="red">3</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q4" id="red" value="2">
                           <label class="form-check-label" for="red">2</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q4" id="red" value="1">
                           <label class="form-check-label" for="red">1</label>
                       </div>
                   </div>
           </div>
       </div>
       <div class="row">
           <div class="container" style="text-align: center">
                   <div class="form-group rounded-pill"   >
                       <label for="question" style="font-size: 18px"><b>5.Şikayetiniz için üretilen çözümden memnun kaldınız mı? </b></label>
                       <br>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q5" id="red" value="5">
                           <label class="form-check-label" for="red">5</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q5" id="red" value="4">
                           <label class="form-check-label" for="red">4</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q5" id="red" value="3">
                           <label class="form-check-label" for="red">3</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q5" id="red" value="2">
                           <label class="form-check-label" for="red">2</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q5" id="red" value="1">
                           <label class="form-check-label" for="red">1</label>
                       </div>
                   </div>
           </div>
       </div>
       <div class="row">
           <div class="container" style="text-align: center">
                   <div class="form-group rounded-pill"  >
                       <label for="question" style="font-size: 18px"><b>6.Bien markasını tavsiye eder misiniz?  </b></label>
                       <br>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q6" id="red" value="5">
                           <label class="form-check-label" for="red">5</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q6" id="red" value="4">
                           <label class="form-check-label" for="red">4</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q6" id="red" value="3">
                           <label class="form-check-label" for="red">3</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q6" id="red" value="2">
                           <label class="form-check-label" for="red">2</label>
                       </div>
                       <div class="form-check form-check-inline" style="size: 15px">
                           <input class="form-check-input btn-lg" type="radio" name="q6" id="red" value="1">
                           <label class="form-check-label" for="red">1</label>
                       </div>
                   </div>
           </div>
       </div>
       <div class="col-md-12">
           <textarea name="q7" class="form-control" placeholder="Diğer düşünce ve yorumlarınız: " id="" cols="15" rows="3" style="width:70%;margin: auto"></textarea>
       </div>
       <div style="text-align: center ; " >
           <a><button id="send" name="submit" value="1" type="submit" class=" btn mb-3 mt-3">Gönder</button></a>
       </div>
   </div>

    </form>
<div style="height:200px "></div>



</div>

    <?php require 'mainPage_statics/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    <?php if (@$message): ?>
    swal("Başarılı","<?= $message ?>","success").then(function () {
        window.location = "<?= site_url("transaction") ?>";
    });
    <?php endif; ?>
</script>
</body>
</html>
