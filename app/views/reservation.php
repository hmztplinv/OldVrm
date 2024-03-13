<?php require 'mainPage_statics/header.php'; ?>

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var intervalId = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(intervalId);
                window.location.href = "https://dev.verimportal.com/gezinomi_index";
            } else if (timer == 0) {
                display.textContent = "00:00";
            }
            document.cookie = "timer=" + timer + ";expires=" + new Date(new Date().getTime() + duration * 1000).toUTCString() + ";path=/";
        }, 1000);
    }

    window.onload = function () {
        var duration = 1200; // saniye cinsinden zaman aralığı
        var display = document.querySelector('#timer');
        var timerValue = getCookie("timer");
        if (timerValue) {
            // kaydedilen zamanlayıcı değeri varsa, timer'ı o değerden başlatın
            startTimer(timerValue, display);
        } else {
            startTimer(duration, display);
        }
    };

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) {
            return parts.pop().split(";").shift();
        }
    }
</script>

<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Rezervasyon</a></li>
    </ol>
    <div class="row mt-5">
        <div class="col-12 mb-0">
            <?php $totalfare = $response_data['ShoppingCart']['AirBookings'][0]['TotalFare'];
            $first_option = $response_data['ShoppingCart']['AirBookings'][0];
            $first_segment = $first_option['FlightSegments'][0];
            $seg = $first_option['FlightSegments'][0];
            $flighsegment=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'];

            $second_segment=$response_data['ShoppingCart']['AirBookings'][0]['FlightSegments'][1] ;?>

            <h2><?= $_SESSION['Gidisucagi']?>-<?= $_SESSION['donusucagi']?>   <strong class="fs-6">Gidiş  </strong></h2>

            <h6 id="timer" style="color:black;align-self: center; font-size: 17px; margin-left: auto;" class="ml-auto">20:00</h6>
        </div>
    </div>
    <div class="row">
        <form class="d-sm-flex" action="<?= site_url('ticket_paying') ?>" method="post">
            <?php foreach ($response_data['ShoppingCart']['AirBookings'] as $airBooking) {

                // PassengerBreakdowns dizisine eriş
                $passengerBreakdowns = $airBooking['PassengerBreakdowns'];

                // PassengerBreakdowns dizisi içindeki her bir dizi öğesi için döngü oluştur
                foreach ($passengerBreakdowns as $passengerBreakdown) {

                    // PaxReference dizisine eriş
                    $paxReference = $passengerBreakdown['PaxReference'];

                    // PaxReferanceId değerini yazdır
                    echo "<input type='hidden' name='PaxReferanceId' value='" . $paxReference['PaxReferanceId'] . "'>";
                }
            }?>
            <input type="hidden" id=" " name="paxcount" value="<?=post('paxcount')?>">
            <input type="hidden" id=" " name="shoppingId" value="<?=$response_data['ShoppingCart']['Id']?>">
            <input type="hidden" id=" " name="sessionId" value="<?=$response_data['ShoppingCart']['Session']['SessionId']?>">
            <input type="hidden" id=" " name="sessionToken" value="<?=$response_data['ShoppingCart']['Session']['SessionToken']?>">
            <div class="col-sm-8" >
                <div class="card">
                    <header class="card-body aliacgn-items-center">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-header-title text-custom mt-1"><i class="fa-solid fa-address-card"></i> İletişim Bilgileri</h5>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6 col-6">
                                <span style="font-size: 15px;">E-posta adresiniz</span>
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white" style="background-color: #6B15B6">
                                        <i class="fa-regular fa-envelope"></i>
                                    </span>
                                    <input name="contactmail" type="email" class="form-control" placeholder="örnek@gmail.com" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  value="<?=$_SESSION['contactmail']?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="font-size: 15px;">Telefonunuz</span>
                                <div class="input-group-prepend">
                                    <span class="input-group-text phone-radius text-white" id="basic-addon1" style="background-color: #6B15B6">+90</span>
                                    <input name="contactphone" type="text" class="form-control text-radius" placeholder="5xxxxxxxx" aria-label="Username" value="<?=$_SESSION['contactphone']?>" aria-describedby="basic-addon1" required onblur="formatPhoneNumber(this)">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 col-6 ">
                                <span style="font-size: 15px">Ad</span>
                                <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #6B15B6">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                    <input name="contactname" type="text" class="form-control text-radius" value="<?=$_SESSION['contactname']?>" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="font-size: 15px">Soyad</span>
                                <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #6B15B6">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                    <input name="contactsurname" type="text" class="form-control text-radius" placeholder="" value="<?=$_SESSION['contactsurname']?>"  aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <?php for ($i=0;$i<$_SESSION['paxcount'];$i++): ?>
                    <div class="card mt-4">

                        <header class="card-body align-items-center people-all">

                            <div class="row">

                                <div class="col-12">
                                    <h5 class="card-header-title text-custom mt-1"><i class="fa-solid fa-circle-user"></i> Yolcu | <?php if( $_SESSION['pax_code'][$i]['PaxCode']=='ADT'){
                                            echo 'Yetişkin';
                                        }
                                        else if( $_SESSION['pax_code'][$i]['PaxCode']=='MIL'){
                                            echo 'Askeri Personel';
                                        }
                                        else if( $_SESSION['pax_code'][$i]['PaxCode']=='CHD'){
                                            echo 'Çocuk';
                                        }
                                        else if( $_SESSION['pax_code'][$i]['PaxCode']=='INF'){
                                            echo 'Bebek';
                                        }
                                        else if( $_SESSION['pax_code'][$i]['PaxCode']=='SRC'){
                                            echo 'Yaşlı';
                                        }
                                        else if( $_SESSION['pax_code'][$i]['PaxCode']=='YTH'){
                                            echo 'Genç';
                                        }
                                        else if( $_SESSION['pax_code'][$i]['PaxCode']=='STD'){
                                            echo 'Öğrenci';
                                        }
                                        ?> </h5>
                                </div>
                            </div>
                            <input hidden name="PaxReferanceId[]" value="<?= $_SESSION['pax_code'][$i]['PaxReferanceId']?>">
                            <input hidden name="PaxCode[]" value="<?= $_SESSION['pax_code'][$i]['PaxCode']?>">

                            <div class="people border-bottom">
                                <div class="row mt-2">
                                    <div class="col-md-6 col-6">
                                        <span style="font-size: 15px">Cinsiyet</span>

                                        <div class="d-flex mb-3 mt-1">
                                            <label class="container">Erkek
                                                <input type="radio" name="<?=$i?>gender" id="inlineRadio1" required>
                                                <span class="checkmark"></span>
                                                <i class="fa-solid fa-person" style="font-size: 20px;color: #6B15B6"></i>
                                            </label>
                                            <label class="container">Kadın
                                                <input type="radio" name="<?=$i?>gender" id="inlineRadio2" required>
                                                <span class="checkmark"></span>
                                                <i class="fa-solid fa-person-dress" style="font-size: 20px;color: #6B15B6"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-6 ">
                                        <span style="font-size: 15px">Ad</span>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #6B15B6">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                            <input name="name[]" type="text" class="form-control text-radius" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <span style="font-size: 15px">Soyad</span>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #6B15B6">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                            <input name="surname[]" type="text" class="form-control text-radius" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 mt-3">
                                        <span style="font-size: 15px">Doğum Tarihi</span>
                                        <input class="form-control small" name="birthday[]" type="date"  required>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <span style="font-size: 15px">Tc Kimlik</span>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #6B15B6">
                                            <i class="fa-regular fa-address-card"></i>
                                        </span>
                                            <input name="tcno[]" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-6 mt-3">
                                        <span style="font-size: 15px">E-posta adresiniz</span>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #6B15B6">
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                            <input name="mail[]" type="text" placeholder="örnek@gmail.com" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-3">
                                        <span style="font-size: 15px">Telefonunuz</span>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text phone-radius text-white" id="basic-addon1" style="background-color: #6B15B6">+90</span>
                                            <input name="phone[]" type="text" class="form-control text-radius" placeholder="5xxxxxxxx" aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 text-custom"><span>Bagaj Hakkı:</span></div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <span class="text-custom"><i class="fa-regular fa-ticket-airline"></i>Gidiş (<? echo $first_segment['DepartureCityName']." - ".$first_segment['ArrivalCityName'];?>) 1x <?=$first_option['PassengerBreakdowns'][$i]['BaggageAllowance']?> check-in bagajı</span>
                                    </div>
                                </div>


                            </div>

                        </header>

                    </div>
                <?php endfor;?>
            </div>

            <div class="col-sm-4 mt-4 mt-sm-0">
                <div class="card mb-4">
                    <header class="card-body align-items-center">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="card-header-title text-custom mt-1"><i class="fas fa-plane-departure"></i> Gidiş Uçuşu</h6>
                            </div>
                            <div class="col-6">
                                <button  type="button" class="float-right border-0 text-custom bg-transparent" data-toggle="modal" data-target="#modalRelatedContent"> <i class='fas fa-exclamation-circle'></i> Uçuş Kuralları</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12" >
                                <i class="fa fa-plane" aria-hidden="true"></i>
                                <span><?= $first_segment['MarkettingAirlineName'];?></span>
                            </div>
                            <?php foreach ($flighsegment as $option) : ?>
                                <?php if ($option['DirectionInd']==0):?>
                                    <div class="col-12 mt-2">
                                        <div class="departure">
                                            <p class="font-weight-bold mb-2 text-dark"><span class="bg-custom2 text-light p-1 rounded mr-1">Kalkış</span></p>
                                            <p class="mb-2" style="font-weight: normal; color: black"><span><i class="fa-solid fa-clock-rotate-left" style="color: #6b15b6;"></i> <?= $option['DepartureTime'];?></span> - <i class="fa-regular fa-calendar-days" style="color: #6b15b6;"></i> <?= $option['DepartureDate'];?></p>
                                            <p class="mb-2" style="font-weight: normal; color: black"><?= $option['DepartureCityName'].", ".$option['DepartureAirportName']." Havalimanı";?></p>
                                        </div>
                                        <div class="departure">
                                            <p class="font-weight-bold mb-2 text-dark"><span class="bg-custom2 text-light p-1 rounded mr-1">Varış</span></p>
                                            <p class="mb-2" style="font-weight: normal; color: black"> <?= $option['ArrivalTime']." ".$option['ArrivalDate'];?></p>
                                            <p class="mb-2" style="font-weight: normal; color: black"><?= $option['ArrivalCityName'].", ".$option['ArrivalAirportName']." Havalimanı";?></p>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                            <div class="col-12" >
                                <p class="mb-2 mesage" style="font-weight: normal; color: black">
                                    <i class="fa fa-ticket"></i>
                                    Özel fiyatlı bilet
                                    <i class='fas fa-exclamation-circle'></i>
                                    <span class="mesagetext p-2">Bu bilet özel fiyatlı bir promosyon bilettir. Bu nedenle bilette değişiklik yapılamaz, bilet iptalinde ise ceza kesintisi uygulanabilir.</span>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <?php if (!empty($_SESSION['selection2'])):?>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="card-header-title text-custom mt-1"><i class="fas fa-plane-departure"></i> Dönüş Uçuşu</h6>
                                </div>
                                <div class="col-6">
                                    <button  type="button" class="float-right border-0 text-custom bg-transparent" data-toggle="modal" data-target="#modalRelatedContent"> <i class='fas fa-exclamation-circle'></i> Uçuş Kuralları</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" >
                                    <i class="fa fa-plane" aria-hidden="true"></i>
                                    <span><?= $second_segment['MarkettingAirlineName'];?></span>
                                </div>
                                <?php foreach ($flighsegment as $option) : ?>
                                    <?php if ($option['DirectionInd']==1):?>
                                        <div class="col-12 mt-2">
                                            <div class="departure">
                                                <p class="font-weight-bold mb-2"><span class="bg-custom2 text-light p-1 rounded mr-1">Kalkış</span></p>
                                                <p class="mb-2" style="font-weight: normal; color: black"><span><i class="fa-solid fa-clock-rotate-left" style="color: #6b15b6;"></i> <?= $option['DepartureTime'];?></span> - <i class="fa-regular fa-calendar-days" style="color: #6b15b6;"></i> <?= $option['DepartureDate'];?></p>
                                                <p class="mb-2" style="font-weight: normal; color: black"><?= $option['DepartureCityName'].", ".$option['DepartureAirportName']." Havalimanı";?></p>
                                            </div>
                                            <div class="departure">
                                                <p class="font-weight-bold mb-2"><span class="bg-custom2 text-light p-1 rounded mr-1">Varış</span></p>
                                                <p class="mb-2" style="font-weight: normal; color: black"><i class="fa-solid fa-clock-rotate-left" style="color: #6b15b6;"></i> <?= $option['ArrivalTime']." ".$option['ArrivalDate'];?></p>
                                                <p class="mb-2" style="font-weight: normal; color: black"> <?= $option['ArrivalCityName'].", ".$option['ArrivalAirportName']." Havalimanı";?></p>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <div class="col-12" >
                                    <p class="mb-2 mesage" style="font-weight: normal; color: black">
                                        <i class="fa fa-ticket"></i>
                                        Özel fiyatlı bilet
                                        <i class='fas fa-exclamation-circle'></i>
                                        <span class="mesagetext p-2">Bu bilet özel fiyatlı bir promosyon bilettir. Bu nedenle bilette değişiklik yapılamaz, bilet iptalinde ise ceza kesintisi uygulanabilir.</span>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </header>
                    <div class="card-footer text-light bg-custom2">
                        <i class="fa-regular fa-clock"></i> <span class="font-weight-bold"> Toplam Seyahat Süresi: </span>
                        <?php if($first_segment['JourneyDurationInMinute']>=60){
                            echo intval($first_segment['JourneyDurationInMinute']/60)."saat ";
                            if($first_segment['JourneyDurationInMinute']%60!=0){
                                echo ($first_segment['JourneyDurationInMinute']%60)."dk";
                            }
                        } else{$first_segment['JourneyDurationInMinute']."dk";}?>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-sm-10 col-12 mt-3">
        <div class="col-md-8 col-12 m-auto">
            <div class="row">
                <div class="col-md-5 col-6 text-right">
                    <p class="mb-0 text-dark fw-bold">Toplam tutar</p>
                    <h6 style="color: #6B15B6; font-weight: bold"><i class="fa-solid fa-wallet" style="color: #6b15b6;"></i> <?=number_format(($totalfare),2,',','.')   ?> <?= $first_option['SelectedFares'][0]['Currency']?></h6>
                </div>
                <div class="col-md-7 col-6">
                    <button type="submit" name="payment" id="payment" class="plane btn btn-md btn-custom btn_selected " value="1">Ödemeye İlerle</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class="modal fade" id="modalRelatedContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">

            <div class="modal-header bg-custom2 text-light p-2">
                <p class="h6 mb-0 mt-1">Uçuş Kuralları</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>


            <div class="modal-body bg-white">
                <div class="row">
                    <div class="col-12" >
                        <h6 class="text-dark">Genel Kurallar</h6>
                        <ul>
                            <li>Havayolları genellikle biletlerin sıralı olarak kullanılmasını şart koşar. Bu nedenle gidişi kullanılmayan biletlerin dönüşleri havayolu şirketleri tarafından otomatik olarak iptal edilir.</li>
                            <li>Herhangi bir gecikme yaşamamak adına uçuştan 180 dakika önce havalimanında olarak bagaj kontrolü ve check-in işlemlerinizi tamamlamanız tavsiye edilir.</li>
                            <li>Değişiklik işlemlerinde mevcut sınıftan daha yüksek bir sınıfa değişiklik yapılıyorsa sınıf ve/veya paket farkı ücreti alınır.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal: modalRelatedContent-->
<!--
<div class="modal fade right pt-5" id="modalRelatedContent" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info mt-5" role="document">

        <div class="modal-content bg-transparent">

            <div class="modal-header bg-custom2 text-light p-2">
                <p class="h6 mb-0 mt-1">Uçuş Kuralları</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>


            <div class="modal-body bg-white">
                <div class="row">
                    <div class="col-12" >
                        <h6 class="text-dark">Genel Kurallar</h6>
                        <ul>
                            <li>Havayolları genellikle biletlerin sıralı olarak kullanılmasını şart koşar. Bu nedenle gidişi kullanılmayan biletlerin dönüşleri havayolu şirketleri tarafından otomatik olarak iptal edilir.</li>
                            <li>Herhangi bir gecikme yaşamamak adına uçuştan 180 dakika önce havalimanında olarak bagaj kontrolü ve check-in işlemlerinizi tamamlamanız tavsiye edilir.</li>
                            <li>Değişiklik işlemlerinde mevcut sınıftan daha yüksek bir sınıfa değişiklik yapılıyorsa sınıf ve/veya paket farkı ücreti alınır.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<!--Modal: modalRelatedContent-->
<?php require 'mainPage_statics/footer.php'; ?>
<script src="<?= public_url('js/gezinomi.js') ?>"></script>
<?= returned($message); ?>
<script>
    $(document).ready(function() {
        // "contactmail" adındaki input alanını seçiyoruz
        var emailInput = $("input[name='contactmail']");

        // Sadece belirli karakterlerin girişi için keypress olayını kullanıyoruz
        emailInput.keypress(function(event) {
            var inputValue = String.fromCharCode(event.which);
            var pattern = /^[a-zA-Z0-9@\.\-\_]*$/; // E-posta adresinde kullanılabilen karakterlerin regex pattern'i
            if (!pattern.test(inputValue)) {
                event.preventDefault(); // Belirli karakterler harici bir şey girilmesini engelliyoruz
            }
        });

        emailInput.blur(function() {
            var input = $(this);
            var email = input.val();

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                input.get(0).setCustomValidity("Lütfen geçerli bir e-posta adresi girin.");
            } else {
                input.get(0).setCustomValidity("");
            }
        });
    });
    $(document).ready(function() {
        $("input[name='contactphone']").attr("maxlength", 10)
            .keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[0-9]*$/;
                if (!pattern.test(inputValue)) {
                    event.preventDefault();
                }
            })
            .blur(function() {
                var phoneInput = $(this);
                var phoneNumber = phoneInput.val().replace(/[^\d]/g, '');

                if (phoneNumber.length < 10 || phoneNumber.charAt(0) === '0') {
                    phoneInput.get(0).setCustomValidity("Telefon numarası en az 10 haneli olmalıdır ve ilk hanesi '0' olmamalıdır.");
                } else {
                    phoneInput.get(0).setCustomValidity("");
                }
            });
    });
    $(document).ready(function() {
        // "contactname" adındaki input alanını seçiyoruz
        var nameInput = $("input[name='contactname']");

        // Maksimum 30 karakter olmasını sağlıyoruz
        nameInput.attr("maxlength", 30);

        // Input alanı odak kaybettiğinde adın uzunluğu kontrol ediyoruz ve hata mesajını gösteriyoruz
        nameInput.blur(function() {
            var nameValue = nameInput.val().trim(); // Boşlukları silerek giriş değerini alıyoruz
            var nameLength = nameValue.length;
            if (nameLength === 0) {
                nameInput.get(0).setCustomValidity("Lütfen bir ad girin.");
            } else if (nameLength > 30) {
                nameInput.get(0).setCustomValidity("Adınız 30 karakterden uzun olamaz.");
            } else {
                nameInput.get(0).setCustomValidity("");
            }
        });
    });
    $(document).ready(function() {
        // "contactsurname" adındaki input alanını seçiyoruz
        var surnameInput = $("input[name='contactsurname']");

        // Maksimum 30 karakter olmasını sağlıyoruz
        surnameInput.attr("maxlength", 30);

        // Input alanı odak kaybettiğinde soyadın uzunluğunu kontrol ediyoruz ve hata mesajını gösteriyoruz
        surnameInput.blur(function() {
            var surnameValue = surnameInput.val().trim(); // Boşlukları silerek giriş değerini alıyoruz
            var surnameLength = surnameValue.length;
            if (surnameLength === 0) {
                surnameInput.get(0).setCustomValidity("Lütfen bir soyad girin.");
            } else if (surnameLength > 30) {
                surnameInput.get(0).setCustomValidity("Soyadınız 30 karakterden uzun olamaz.");
            } else {
                surnameInput.get(0).setCustomValidity("");
            }
        });
    });
    $(document).ready(function() {
        var nameInputs = $("input[name='name[]']");

        nameInputs.keypress(function(event) {
            var inputValue = String.fromCharCode(event.which);
            var pattern = /^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]*$/; // Boşlukları ve bazı özel karakterleri ekledik
            if (!pattern.test(inputValue)) {
                event.preventDefault();
            }
        });

        nameInputs.attr("maxlength", 30);

        nameInputs.blur(function() {
            var inputLength = $(this).val().length;
            if (inputLength === 0) {
                this.setCustomValidity("Lütfen bir ad girin.");
            } else if (inputLength > 30) {
                this.setCustomValidity("Adınız 30 karakterden uzun olamaz.");
            } else {
                this.setCustomValidity("");
            }
        });
    });

    $(document).ready(function() {
        var surnameInputs = $("input[name='surname[]']");

        surnameInputs.keypress(function(event) {
            var inputValue = String.fromCharCode(event.which);
            var pattern = /^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]*$/; // Boşlukları ve bazı özel karakterleri ekledik
            if (!pattern.test(inputValue)) {
                event.preventDefault();
            }
        });

        surnameInputs.attr("maxlength", 30);

        surnameInputs.blur(function() {
            var inputLength = $(this).val().length;
            if (inputLength === 0) {
                this.setCustomValidity("Lütfen bir soyad girin.");
            } else if (inputLength > 30) {
                this.setCustomValidity("Soyadınız 30 karakterden uzun olamaz.");
            } else {
                this.setCustomValidity("");
            }
        });
    });

    $(document).ready(function() {
        var birthdayInputs = $("input[name='birthday[]']");

        birthdayInputs.blur(function() {
            var inputDate = new Date($(this).val());
            var inputYear = inputDate.getFullYear();
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();

            // Yılın 4 haneli olmasını ve 1900-2200 arasında olmasını kontrol ediyoruz
            if ($(this).val().length !== 10 || isNaN(inputDate) || isNaN(inputYear) || inputYear < 1900 || inputYear > 2200) {
                this.setCustomValidity("Lütfen geçerli bir tarih girin (GG.AA.YYYY).");
            }   else {
                this.setCustomValidity("");
            }
        });
    });
    $(document).ready(function() {
        $("input[name='tcno[]']")
            .keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[0-9]*$/;
                if (!pattern.test(inputValue)) {
                    event.preventDefault();
                }
            })
            .blur(function() {
                var input = $(this);
                var tcno = input.val().replace(/[^\d]/g, '');

                if (tcno.length !== 11) {
                    input.get(0).setCustomValidity("TC kimlik numarası 11 haneli olmalıdır.");
                } else if (!/[02468]$/.test(tcno)) {
                    input.get(0).setCustomValidity("Lütfen geçerli bir TC NO giriniz.   ");
                } else {
                    input.get(0).setCustomValidity("");
                }
            });
    });
    $(document).ready(function() {
        $("input[name='mail[]']")
            .keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[a-zA-Z0-9@\.\-\_]*$/;
                if (!pattern.test(inputValue)) {
                    event.preventDefault();
                }
            })
            .blur(function() {
                var input = $(this);
                var email = input.val();

                if (email.length > 30) {
                    input.get(0).setCustomValidity("E-posta adresi 30 karakterden fazla olamaz.");
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    input.get(0).setCustomValidity("Lütfen geçerli bir e-posta adresi girin.");
                } else {
                    input.get(0).setCustomValidity("");
                }
            });
    });
    $(document).ready(function() {
        $("input[name='phone[]']").attr("maxlength", 10)
            .keypress(function(event) {
                var inputValue = String.fromCharCode(event.which);
                var pattern = /^[0-9]*$/;
                if (!pattern.test(inputValue)) {
                    event.preventDefault();
                }
            })
            .blur(function() {
                var phoneInput = $(this);
                var phoneNumber = phoneInput.val().replace(/[^\d]/g, '');

                if (phoneNumber.length !== 10 || phoneNumber.charAt(0) !== '5') {
                    phoneInput.get(0).setCustomValidity("Telefon numarası 10 haneli olmalıdır ve '5' ile başlamalıdır.");
                } else {
                    phoneInput.get(0).setCustomValidity("");
                }
            });
    });
</script>
<script>
    const notTcCitizenCheckbox = document.getElementById('not-tc-citizen');
    const nationalityLabel = document.getElementById('nationality-label');
    const nationalitySelect = document.getElementById('nationality-select');

    notTcCitizenCheckbox.addEventListener('change', () => {
        if (notTcCitizenCheckbox.checked) {
            nationalityLabel.classList.add('d-none');
            nationalitySelect.classList.remove('d-none');
        } else {
            nationalityLabel.classList.remove('d-none');
            nationalitySelect.classList.add('d-none');
        }
    });
</script>