<?php

if (session('auth')['creditSub']['creditRetail'] != 0){
    require view('cek_iskontosu');
}else{
    header("Location:".site_url('yetkisiz'));
}
