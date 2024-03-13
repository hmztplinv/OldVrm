<?php


class user
{
    public static function userExist($email,$tel = ""){
        global $db;
        $query = $db->prepare("SELECT * FROM users WHERE username=:email");
        $query ->execute([
            'email' => $email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_user(){
        global $db;
        $query = $db->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute([
            'id' => session('user_id')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function add_user($firstname,$lastname,$tel,$password,$email){
        global $db;

        if(!self::userExist($email,$tel)){
            $query = $db->prepare("INSERT INTO users SET first_name=:f_name,last_name=:l_name,telephone=:tel,password=:passw,email=:email");
            $res = $query->execute([
                'f_name' => $firstname,
                'l_name' => $lastname,
                'tel' => $tel,
                'passw' => md5($password),
                'email' => $email
            ]);
            if ($res){
                $message['suc'] = "Başarıyla kayıt oldunuz. Yönlendiriliyorsunuz.";
                header("Refresh: 3; url=".site_url("page"));
            }else{
                $message['err'] = "Kayıt olurken bir hatayla karşılaştınız.";
            }

        }else{
            $message['err'] = "Bu email adresi veya telefon numarası ile bir kayıt bulunmuştur.";
        }

        return $message;
    }
    public static function sms($sms_code){
        global $db;
        $query = $db->prepare("SELECT * FROM smsVerification WHERE username=:username AND smsCode=:smsCode AND valid = 1");
        $query->execute([
            'username' => session('user_email'),
            'smsCode' => $sms_code
        ]);
        $res = $query->fetch(PDO::FETCH_ASSOC);
        if ($res){
            $message['suc'] = "SMS kodunuz doğru yönlendiriliyorsunuz.";
        }else{
            $message['err'] = "SMS kodunuz hatalıdır.";
        }
        return $message;
    }

    public static function login($email,$password){
        $response = self::userExist($email);
        if ($response){
            if ($response['password'] === md5($password)){
                $_SESSION['user_id'] = $response['id'];
                $_SESSION['user_email'] = $response['username'];
                $_SESSION['user_name'] = $response['name'];
                $message['suc'] = "Başarıyla Giriş Yaptınız. Yönlendiriliyorsunuz.";


            }else{
                $message['err'] = "Hatalı e-posta ve/veya şifre";
            }
        }else{
            $message['err'] = "Böyle bir kullanıcı bulunmamaktadır.";
        }
        return $message;
    }
    public static function change_password($old_pass,$new_pass){
        if (session('user_email')){
            $user_verification = self::userExist(session('user_email'));
            if ($user_verification){
                if ($user_verification['password'] === md5($old_pass)){
                    global $db;
                    $query = $db->prepare("UPDATE users SET password=:passw");
                    $res = $query->execute([
                        'passw' => md5($new_pass)
                    ]);
                    if ($res){
                        $message['suc'] = "Şifreniz Başarıyla Değiştirilmiştir.";
                    }else{
                        $message['err'] = "Bir hata oluştu. Lütfen tekrar deneyiniz.";
                    }
                }else{
                    $message['err'] = "Lütfen şu an kullandığınız şifrenizi doğru giriniz.";
                }
            }else{
                $message['err'] = "Veritabanı hatası oluşmuştur. Lütfen teknik desteğe başvurunuz.";
            }

        }else{
            $message['err'] = "İzinsiz girdin PİÇ.";
        }
        return $message;
    }
    public static function save_profile($new_tel){
        global $db;
        $query = $db->prepare("UPDATE users SET telephone=:telephone WHERE id=:id");
        $query->execute([
            'telephone' => $new_tel,
            'id' => session('user_id')
        ]);
    }
}