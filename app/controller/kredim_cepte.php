<?php
if (session('auth')['creditSub']['myCredit'] != 0){
    require view('kredim_cepte');
}else{
    header("Location:".site_url('yetkisiz'));
}

