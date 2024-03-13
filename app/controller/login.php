<?php


if (post("login")){
   $login_res = user::login(post('email'),post('password'));
   if (@$login_res['suc']){
       header("Location:".site_url('sms'));
   }
}


require view('login');
