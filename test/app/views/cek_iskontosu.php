<?php require 'mainPage_statics/header.php'; ?>

<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

	<ol class="breadcrumb small pt-5">
		<li class="breadcrumb-item text-custom">Kredi İşlemleri</li>
		<li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Çek İskontosu</a></li>
	</ol>

	<!-- Row 1 -->
	<div class="row pt-2">

		<div class="col-12 col-sm-12 mb-3">
		<form action="../../../execution/" method="POST">
			<div class="card h-100">

			    <header class="card-header d-md-flex align-items-center bg-custom2">
				<h6 class="card-header-title text-light mt-1">Çek İskontosu</h6>
				</header>

			  	<div class="card-body">
			    <p class="card-text">

				<div class="row">

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Keşideci VKN/TCKN</strong></label>
				      	<input class="form-control small" name="startDate" type="number">
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				    	<label class="form-label text-custom"><strong>Çek Bankası</strong></label>
				      	<select class="form-select small" name="bank">
				      	<option value="" selected disabled>Seçiniz</option>
					    <option value="">Akbank</option>
					    <option value="">Alternatif Bank</option>
					    <option value="">Anadolu Bank</option>
					    <option value="">Burgan Bank</option>
					    <option value="">Denizbank</option>
					    <option value="">Fibabank</option>
					    <option value="">Garanti BBVA</option>
					    <option value="">Halk Bank</option>
					    <option value="">ING</option>
					    <option value="">İş Bankası</option>
					    <option value="">Odea</option>
					    <option value="">QNB Finansbank</option>
					    <option value="">Şekerbank</option>
					    <option value="">Ziraat Bankası</option>
					    <option value="">TEB</option>
					    <option value="">Vakıfbank</option>
					    <option value="">Yapı Kredi</option>
					    </select>
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Çek No</strong></label>
				      	<input class="form-control small" name="startDate" type="number">
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Vade</strong></label>
				      	<input class="form-control small" name="startDate" type="date">
				    </div>

				    <div class="col-12 col-sm-1 p-2">
				      	<label class="form-label text-custom"><strong>Çek Tutarı</strong></label>
				      	<input class="form-control small" name="startDate" type="number">
				    </div>

				</div>
				</p>
			</div>

				<div class="card-footer p-3">
				<div class="d-grid gap-2 d-md-flex">
					<button type="button" class="btn btn-sm btn-custom mt-1"><i class="fa-solid fa-camera"></i> Çekin Önyüzü</button>
					<button type="button" class="btn btn-sm btn-custom mt-1"><i class="fa-solid fa-camera"></i> Çekin Arkayüzü</button>
					<button type="button" class="btn btn-sm btn-custom mt-1"><i class="fa-solid fa-camera"></i> Fatura</button>
					<button type="button" name="answer" value="Show Div" onclick="showDiv()" class="btn btn-sm btn-custom mt-1">Gönder</button>
				</div>
				</div>
		</form>
		</div>
	</div>

	</div>
	<!-- Row 1  -->


	<!-- Row 2 -->
	<div class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv"  style="display:none;" class="answer_list">

		<div class="row">

		  <div class="col-12 col-sm-2">
		    <div class="card h-100">
		      <div class="card-body">
		      	<header class="card-header d-md-flex align-items-center bg-custom2">
		        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/bienfinansw.png') ?>" alt="Banka"></h6>
		        </header>
		        <ul class="list-group list-group-flush mt-3">
			    	<li class="list-group-item"><b>Durum</b>: Onaylandı</li>
			    	<li class="list-group-item"><b>Faiz Oranı</b>: %35</li>
			    	<li class="list-group-item"><b>Masraf/Komisyon</b>: 0,00 TL</li>
			    	<li class="list-group-item"><b>Net Ödeme</b>: 23.208,50 TL</li>
			    </ul>
		        <div class="d-grid gap-2 mt-3">
		        	<button type="button" class="btn btn-sm btn-custom mt-1">Başvur</button>
		    	</div>
		      </div>
		    </div>
		  </div>

		  <div class="col-12 col-sm-2">
		    <div class="card h-100">
		      <div class="card-body">
		      	<header class="card-header d-md-flex align-items-center bg-custom2">
		        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/isfaktoringw.png') ?>" alt="Banka"></h6>
		        </header>
		        <ul class="list-group list-group-flush mt-3">
			    	<li class="list-group-item"><b>Durum</b>: Onaylandı</li>
			    	<li class="list-group-item"><b>Faiz Oranı</b>: %35</li>
			    	<li class="list-group-item"><b>Masraf/Komisyon</b>: 500,00 TL</li>
			    	<li class="list-group-item"><b>Net Ödeme</b>: 22.708,50 TL</li>
			    </ul>
		        <div class="d-grid gap-2 mt-3">
		        	<button type="button" class="btn btn-sm btn-custom mt-1">Başvur</button>
		    	</div>
		      </div>
		    </div>
		  </div>

		  <div class="col-12 col-sm-2">
		    <div class="card h-100">
		      <div class="card-body">
		      	<header class="card-header d-md-flex align-items-center bg-custom2">
		        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/yapikredifaktoringw.png') ?>" alt="Banka"></h6>
		        </header>
		        <ul class="list-group list-group-flush mt-3">
			    	<li class="list-group-item"><b>Durum</b>: Değerlendiriliyor</li>
			    	<li class="list-group-item"><b>Faiz Oranı</b>: -</li>
			    	<li class="list-group-item"><b>Masraf/Komisyon</b>: -</li>
			    	<li class="list-group-item"><b>Net Ödeme</b>: -</li>
			    </ul>
		        <div class="d-grid gap-2 mt-3">
		        	<button type="button" class="btn btn-sm btn-custom mt-1">Başvur</button>
		    	</div>
		      </div>
		    </div>
		  </div>

		</div>

	</div>
	<!-- Row 2 -->

</div>
<!-- Container -->


<?php require 'mainPage_statics/footer.php'; ?>


<script>
$(document).ready(function() {
    $('#hesaphareketilistesi').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'copy', 'print'
        ],
        responsive: {
	        details: false
        },
  		pageLength : 5
	});
})
</script>

<script>
	function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
</script>

</body>
</html>