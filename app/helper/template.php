<?php
//views kısmında kullanılan fonksiyonlar
function returned($message){
    if(isset($message['redirects'])){
        $redirect = site_url($message['redirects']);
        if (isset($message['suc']))
        {
            $messages = $message['suc'];


            echo "<script>swal('Başarılı','$messages','success').then(function() {
window.location = '$redirect';
});</script>";
        }
        if (isset($message['err']))
        {
            $messages = $message['err'];

            echo "<script>swal('Başarısız','$messages','error').then(function() {
window.location = '$redirect';
});</script>";
        }

    }else{
        if (isset($message['suc']))
        {
            $messages = $message['suc'];

            echo "<script>swal('Başarılı','$messages','success');</script>";
        }
        if (isset($message['err']))
        {
            $messages = $message['err'];

            echo "<script>swal('Başarısız','$messages','error');</script>";
        }
    }

}

function site_url($url = false){
    return URL . '/' . $url ;
}

function public_url($url = false){
    return URL . '/public/' . $url;
}

function mutlu_public_url($url=false){
    return URL. '/public/public/'.$url;
}


function public_urls($url = false){
    return URL . '/public/customer/' . $url;

}

function error(){
    global $error;
    return isset($error) ? $error : false;
}
function success(){
    global $success;
    return isset($success) ? $success : false;
}

function damp($string){
    if (gettype($string) == "array"){
        print_r($string);
        exit();

    }else{
        echo $string;
        exit();
    }
}


