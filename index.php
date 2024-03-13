<?php

error_reporting(E_ALL);
ini_set("display_errors", 0);
//TODO: active

require __DIR__ . '/app/init.php';




$routeExplode = explode('?', $_SERVER['REQUEST_URI']);   //gelen request_urı'yı '?' ile kesiyor
$route = array_filter(explode('/', $routeExplode[0]));   // ilk url'i alıp array'i sıfırlıyor.



//require_once('vendor/autoload.php');     google api autoload

if (SUBFOLDER === true) {
    array_shift($route);
}


if (!route(1)) {
    $route[1] = 'hesap_bakiyeleri';
}

if (!file_exists(controller(route(1))) && route(1) != "unit_test") {
    $route[1] = '404';
}
if (route(1) == "unit_test"){
    require test(route(2));
}else{

    require controller(route(1));
}




