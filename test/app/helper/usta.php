<?php

function usta_controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/usta/controller/'.$controllerName.'.php';
}
function usta_view($viewName){
    return PATH . '/usta/view/' . $viewName . '.php';
}

function usta_public($publicName){
    return PATH . '/public/usta/'. $publicName;
}

function usta_url($url = false){
    return URL . '/usta/' . $url;
}
