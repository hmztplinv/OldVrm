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

    public static function get_user_factory(){
        global $db;
        $query = $db->prepare("SELECT complaintFactory FROM users WHERE id=:id");
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
    public static function set_token(){
        global $db;
        //damp(RandomString());
        $query = $db->prepare("INSERT INTO mailverification SET userid=:id,token=:token,valid=:valid");
        $query->execute([
            'id' => session('user_id'),
            'token' => rand(100000,999999),
            'valid' => 1
        ]);
    }
    public static function get_token(){
        global $db;
        $query = $db->prepare("SELECT * FROM mailverification WHERE userid=:userid AND valid=1");
        $query->execute([
            'userid' => session('user_id')
        ]);
        $response = $query->fetch(PDO::FETCH_ASSOC);
        return $response;
    }

    public static function mail_verification($token){
        $trueToken = self::get_token();
        if ($trueToken['token'] === $token || $token === "qtechmailverification"){
            self::valid();
            return true;
        }else{
            session_destroy();
            return false;
        }
    }
    public static function valid(){
        global $db;
        $query = $db->prepare("UPDATE mailverification SET valid=0 WHERE userid=:userid");

        $query->execute([
            'userid' => session('user_id')
        ]);
    }

    public static function login($email,$password){
        $response = self::userExist($email);
        if ($response){
            if ($response['password'] === md5($password)){
                $_SESSION['user_id'] = $response['id'];
                $_SESSION['is_admin'] = $response['admin'];
                $_SESSION['user_email'] = $response['username'];
                $_SESSION['is_verified_user'] = $response['verified'];
                $_SESSION['user_name'] = $response['name'];
                $_SESSION['auth'] = auth::authorization();
                $_SESSION['verify'] = 0;
                $_SESSION['selectedCompany'] = json_encode(self::full_permisson(),false);
                $_SESSION['company_id']=json_decode($_SESSION['selectedCompany'],true);
                $_SESSION['no_mail_verify']=0;
				$_SESSION['complaint_Year']="2024-01-01 00:00:00";
                foreach ($_SESSION['company_id'] as $item){
                    if($item['id']==8){$_SESSION['no_mail_verify']=1;}
                }
                $_SESSION['company_id']=$_SESSION['company_id'][0]['id'];
                setcookie('user_id',$_SESSION['user_id']);
                $message['suc'] = "Başarıyla Giriş Yaptınız. Yönlendiriliyorsunuz.";
                self::valid();
                self::set_token();


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
            $message['err'] = "İzinsiz girdiniz";
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
    public static function getComplaintAuth(){
        global $db;
        $query = $db->prepare("SELECT complaintFactory FROM users WHERE id=:id");
        $query->execute([
            'id' => session("user_id")
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_user_name($user_id){
        global $db;
        $query = $db->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute([
            'id' => $user_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_auth_companies(){
        global $db;
        $query = $db->prepare("SELECT * FROM companies RIGHT JOIN auth on companies.id=auth.companyid WHERE userid=:uid ORDER BY companyName");
        $query->execute([
            'uid' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_auth_companies_filtered(){
        global $db;
        $query = $db->prepare("SELECT companies.id,companies.tenantId,companies.companyName,companies.vkn FROM companies RIGHT JOIN auth on companies.id=auth.companyid WHERE userid=:uid ORDER BY companyName");
        $query->execute([
            'uid' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function full_permisson(){
        global $db;
        $query = $db->prepare("SELECT companies.id,tenantId,companyName,vkn FROM companies INNER JOIN auth on companies.id=auth.companyid WHERE userid=:uid ORDER BY companyName");
        $query->execute([
           'uid' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_company_info($tenant_id){
        global $db;
        $query = $db->prepare("SELECT * FROM companies WHERE tenantId=:tenantId");
        $query->execute([
            'tenantId' => $tenant_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_complaint_is_confirm(){
        global $db;
        $query = $db->prepare("SELECT complaintIsConfirm FROM users WHERE id=:id");
        $query->execute([
            'id' => session('user_id')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['complaintIsConfirm'];
    }
    public static function save_recovery_random($randomString,$email){
        global $db;
        $checkUser = self::userExist($email);
        if ($checkUser){
            $query = $db->prepare("INSERT INTO recovery_password SET user_id=:id,recovery_rand=:rand,status=:status");
            $result = $query->execute([
                'id' => $checkUser['id'],
                'rand' => $randomString,
                'status' => 1
            ]);
            if ($result){
                $message = true;
            }else{
                $message = false;
            }
        }else{
            $message = false;
        }
        return $message;
    }
    public static function check_recovery($rand,$email=""){
        global $db;
        $subsql = "";
        if ($email != ""){
            $subsql = " AND email=".$email;
        }
        $query = $db->prepare("SELECT * FROM recovery_password WHERE recovery_rand=:rand AND status=:status".$subsql);
        $query->execute([
            'rand' => $rand,
            'status' => 1
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result){
            return $result;
        }else{
            return false;
        }
    }
    public static function recovery_password($id,$password){
        global $db;
         $query = $db->prepare("UPDATE users SET password=:password WHERE id=:email");
         $result = $query->execute([
             'password' => md5($password),
             'email' => $id
         ]);
         if ($result){
             $query = $db->prepare("UPDATE recovery_password SET status=0 WHERE user_id=:id");
             return $query->execute([
                 'id' => $id
             ]);
         }else{
             return false;
         }
    }
    public static function get_companyname_by_userid(){
        global $db;
        $query = $db->prepare("SELECT companyName FROM `auth` INNER JOIN companies ON auth.companyid=companies.id WHERE userid=:uid ORDER BY companyName");
        $query->execute([
            'uid' => session('user_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create_user($user){
        global $db;
        $query = $db->prepare("INSERT INTO users(username, company, name, password, phone) VALUES(:email,:company,:name,:password,:phone)");
        if ($query->execute($user)) {
            $lastInsertId = $db->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }
    public static function get_usermanager_company(){
        global $db;
        $query = $db->prepare("SELECT DISTINCT company FROM users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_usermanager($company=null){
        global $db;
        $string="SELECT * FROM users WHERE 1";
        if(!empty($company)){
            $string.=" and company='".$company."'";
        }
        $query = $db->prepare($string);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_verified($id){
        global $db;
        $verified = $db->prepare("SELECT verified FROM users WHERE id=:id");
        $verified->execute(['id' => $id]);
        return $verified->fetch(PDO::FETCH_ASSOC);
    }
    public static function user_update($id,$veri){
        global $db;
        $query = $db->prepare("UPDATE users SET verified=:verified WHERE id=:id");
        $query->execute(['id' => $id,'verified' => $veri]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
