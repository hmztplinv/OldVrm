<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="QTech">
	<title>Verim | Akıllı İşletme Portalı</title>
	<link rel="shortcut icon" href="<?= public_url("img/favicon.png") ?>" type="image/x-icon">
	<link rel="stylesheet" href="<?= public_url("css/animate.min.css") ?>">
	<link rel="stylesheet" href="<?= public_url("css/bootstrap.min.css") ?>">
	<link rel="stylesheet" href="<?= public_url("css/jquery.dataTables.min.css") ?>">
	<link rel="stylesheet" href="<?= public_url("css/buttons.dataTables.min.css") ?>">
	<link rel="stylesheet" href="<?= public_url("css/fontawesome6/css/all.min.css") ?>">
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
		#menu_screen > .row {
		    min-height: 100vh;
		}
		.flex-fill {
		    flex:1 1 auto;
		}
		</style>
</head>
<body>

<div id="menu_screen" class="container-fluid main_container d-flex regular">

    <div class="row flex-fill">

        <div class="col-lg-3 d-flex flex-column justify-content-center align-items-center bg-light mnh-100vh animate__animated animate__slideInLeft">

        	<div class="col-12 ps-5 pe-5">
	        <div><h1 class="text-custom">Merhaba!</h1></div>

	        <form action="<?= site_url('login') ?>" method="POST">

			  	<div class="mt-4">
				    <input class="form-control" type="email" id="email" name="email" placeholder="E-posta" required>
				</div>

				<div class="mt-2">
				    <input class="form-control" type="password" id="password" name="password" placeholder="Şifre" required>
				</div>

				<button type="submit" name="login" value="1" class="btn btn-custom btn-sm mt-3">Oturum Aç</button>

			</form>
                <?php if (@$login_res['err']): ?>
                	<div class="mt-3">
		        		<button type="button" class="btn btn-sm btn-custom2 animate__animated animate__backInLeft"><i class="fa fa-exclamation-circle alert-icon mr-3"></i><span><?= $login_res['err'] ?></span></button>
		        	</div>
                <?php endif; ?>





				<p class="small mt-5 text-custom">
					<a href="<?= site_url('recovery_password') ?>" class="text-decoration-none text-custom"><strong>Şifremi unuttum</strong></a><br>
					Problem mi yaşıyorsunuz? Lütfen <a href="mailto:info@qtech.com.tr" class="text-decoration-none text-custom"><strong>bize iletin</strong></a>.</a>
				</p>

				<p class="small mt-5 text-custom">
					<small>&copy; 2022 <a href="https://www.qtech.com.tr" target="_blank" class="text-decoration-none text-custom"><strong>QTech</strong></a>. Tüm hakları saklıdır.</small>
				</p>
			</div>

        </div>

        <div class="col-lg-9 d-none d-lg-flex flex-column align-items-center justify-content-center bg-custom2 animate__animated animate__slideInRight">
            <img src="<?= public_url('img/logo.gif') ?>" class="img-fluid animate__animated animate__fadeInUpBig" width="750" alt="Verim">
        </div>
    </div>
</div>
</body>
</html>