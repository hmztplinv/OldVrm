<?php

if($_SESSION['is_admin']==1){
    if(get('company')){
        $company=get('company');
        $users=user::get_usermanager($company);
    }else{
        $users=user::get_usermanager();
    }
    $company=user::get_usermanager_company();
    if(get('id')){
        $id=get('id');
        $user=user::get_verified($id);
        if($user["verified"]==1){$veri=0;}
        else{$veri=1;}
        user::user_update($id,$veri);
        header('Location: '.site_url("user_manager"));
    }
    require view('user_manager');
}
else{
    header("Location:".site_url('hesap_bakiyeleri'));
}

