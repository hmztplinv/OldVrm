<?php

if (post('sms')){
    $sms_res = user::sms(post('smsCode'));
    if ($sms_res){

    }
}
header("Location:".site_url('hesap_bakiyeleri'));
require view("sms");