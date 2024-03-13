<?php
$getparameters=Parameters::get_parameters_country();

$gettitle=personal::get_depart_title();
$getdepart=personal::get_departman();

//mail yolla

if(post('add_employee')){
    //create random password
    $bytes = random_bytes(4); // 4 byte rastgele veri oluştur
    $password = bin2hex($bytes); // rastgele veriyi hexadecimal formata dönüştür
    $features = [
        'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
        'username' => "info@qtech.com.tr",      //Hangi mail adresinden mail gidecek
        'password' => "Caw50864",               //Mail adresinin şifresi
        'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
        'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
        'addAddress' => [
            post('email')                       //hangi mail adreslerine gönderilecek
            //,"m.akyokus@qtech.com.tr" ...     // Şeklinde birden fazla mail adresine gönderebilirsiniz
        ],
        'mailSubject' => "Verimportal Giriş Bilgileri",      //Giden mailin konusu
        'mailContent' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">
    
    <head>
        <link rel="stylesheet" type="text/css" hs-webfonts="true" href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
        <title>Demireks Library</title>
        <meta property="og:title" content="Email">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            a{
                text-decoration: none;
                color: inherit;
                font-weight: bold;
                color: #253342;
            }
            h2{
                font-size: 28px;
                font-weight: 900;
            }
    
            p {
                font-weight: 100;
            }
    
            td {
                vertical-align: top;
            }
    
            #email {
                margin: auto;
                width: 100%;
                background-color: white;
            }
        </style>
    
    </head>
    
    <body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">
    
    <div id="email">
    
        <! Banner -->
        <table role="presentation" width="100%">
            <tr>
                <td bgcolor="#6b15b6" align="center" style="color: white;"><br><br>
                    <img alt="VerimPortal" src="https://verimportal.com/public/img/logow.png" width="300px" align="middle"><br><br><br>
                </td>
        </table>
    
        <! First Row -->
        <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 30px 30px 30px 60px;">
            <tr>
                <td>
                    <h2>Merhaba '.post('name').' '.post('surname').'. Verimportala hoş geldiniz.Giriş bilgileriniz aşağıda yer almaktadır.</h2>
                    <p>Verim giriş mailiniz: '.post('email').'</p>
                    <p>Verim giriş şifreniz: '.$password.'</p>
                </td>
            </tr>
        </table>
    
        <! Banner Row -->
        <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 50px;" >
            <tr>
                <td align="center" style="padding: 30px 30px;">
                    <a href="https://verimportal.com">www.verimportal.com</a>
                </td>
            </tr>
        </table>    
    </div>
    </body>
    </html>'    //Giden mailin içeriği HTML formatında olmalıdır.
    ];
    mail::send($features);  //mail sınıfı içerisindeki send() methoduna yukarıdaki diziyi parametre olarak göndererek mail gönderebilirsiniz.
   
    //Kullanıcı oluşturma
    $user=[
        'email'=>post('email'),
        'company'=>'Qua İnsan Kaynakları',
        'name'=>post('name').' '.post('surname'),//ad ve soyad
        'password'=>md5($password),
        'phone'=>post('phone')
    ];

    $result=user::create_user($user);

    //$result kullanıcı id'si döndürür
    if($result){
        $auth=[
            'userid'=>$result,
            'companyid'=>session('company_id')
        ];
        $authresult=personal::auth_employee($auth);

        $employee=[
            'registry'=>$result,
            'name'=>post('name'),
            'surname'=>post('surname'),
            'nationality'=>post('nationality'),
            'identityNumber'=>post('identityNumber'),
            'sex'=>post('sex'),
            'birthDate'=>post('birthDate'),
            'bloodType'=>post('bloodType'),
            'maritalStatus'=>(post('maritalStatus')),
            'drivingLicense'=>post('drivingLicense'),
            'startDate'=>post('startDate'),
            'numberOfKids'=>post('numberOfKids'),
            'lastUpdateUser'=>session('user_email'),
            'dateOfMarriage'=>post('dateOfMarriage')=='' ? NULL: post('dateOfMarriage')
        ];

        personal::insert_personel($employee);

        $addtitle=[
            'registry'=>$result,
            'department'=>post('department'),
            'roleId'=>post('roleId'),
            'startDate'=>post('startDate'),
            'date'=>date('Y-m-d'),
            'lastUpdateUser'=>session('user_email')

        ];

        personal::insert_personel_depart_title($addtitle);
        $message['suc']='Kullanıcı başarılı bir şekilde eklendi';
        $message['redirect']=site_url('personel');
    }
    else{
        $message['err']='Bir Hata Oluştu Lütfen Sistem Yöneticinİzle İrtibata Geçiniz';
        $message['redirect']=site_url('personel_ekleme');
    }
header('location'.site_url('personel_ekleme') );
}
require view('personel_ekleme');