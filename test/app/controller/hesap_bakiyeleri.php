<?php

if (!session('user_id')){
    header('Location:'.site_url('login'));
}
$balance_detail = api::get_balance();

//damp($balance_detail['value']);
$total_tl = balance::get_currency_total_balance(1);
$total_usd = balance::get_currency_total_balance(2);
$total_euro = balance::get_currency_total_balance(3);
$total_gbp = balance::get_currency_total_balance(4);
$total_chf = balance::get_currency_total_balance(9);
$rates = balance::get_rate();
$bank_of_total = balance::get_bank_total_balance();
//damp($bank_of_total);
$temp = 0;
//$total_tl = 0;
//$total_chf =0;
//$total_gbp =0;
//$total_euro= 0;
//$total_usd = 0;
if ($total_tl != 0){
    $temp++;
}
if ($total_usd != 0){
    $temp++;
}
if ($total_euro != 0){
    $temp++;
}
if ($total_gbp != 0){
    $temp++;
}if ($total_chf != 0){
    $temp++;
}

//damp($balance_detail);
if (post('answer')){
   // damp(post('vkn'));
}

//damp($balance_detail);

require view("hesap_bakiyeleri");


