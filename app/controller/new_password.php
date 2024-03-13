<?php
if (post('password')){
    if (post('password') == post('password_repeat')){
        $result = user::recovery_password(post('email'),post('password'));
        if ($result){
            $message['suc'] = "Şifreniz başarıyla güncellendi !" ;
        }else{
            $message['err'] = "Teknik bir hata ile karşılaştık. Lütfen teknik ekibe başvurun.";
        }
    }else{
        $message['err'] = "Şifreleriniz birbiriyle uyuşmamaktadır.";
    }
    require view("new_password");
}

if (get('r')){
    $result = user::check_recovery(get('r'));
    if ($result){
        require view('new_password');
    }
}

