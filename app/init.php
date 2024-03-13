<?php

session_start();
ob_start();
//
//if (isset($_SESSION['email'])) {
//    if (time() - $_SESSION['time_stamp'] > 6000) {
//        session_destroy();
//        $error = "Oturum süreniz doldu. Lütfen tekrar giriş yapınız.";
//    }
//}             oturum süre sınırı


define('PATH', '.');
define('SUBFOLDER', false);      //subfolder varsa true kalması lazım
define('URL', 'https://verimportal.com');
define('baseUrl','https://polynom-api.finekra.com/api');
define('SMSTOKEN','YGjjdDlVS91g5Uu7k7O7mYpmja3XHjXlVaa8mkBHfLkG3NtzArtCCMvn60nQXxaxF7Ix5xHf8lkAd5eg');
define('SMSTITLE','BIENMSTHZMT');

function loadClasses($className)
{
    require __DIR__ . '/classes/' . $className . '.php';
}

$autoload = spl_autoload_register('loadClasses');   //classları autoload ediyor
//require __DIR__ . '/classes/mail.php';

date_default_timezone_set('Europe/Istanbul');

require __DIR__ . '/db.php';



foreach (glob(__DIR__ . '/helper/*.php') as $helperFile) {
    require $helperFile;    //helperları autoload ediyor
}



