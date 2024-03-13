<?php

if (session('auth')['accountSub']['accountDbs'] != 0){
    require view('dbs');
}else{
    header("Location:".site_url('yetkisiz'));
}

