<?php
if(1){
    $_SESSION['verify'] = "1";
    $message['suc'] = "Başarıyla Giriş Yaptınız. Yönlendiriliyorsunuz.";
    header("Location:".site_url('hesap_bakiyeleri'));
}
else{
    if (!post('sms')){
        $features = [
            'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
            'username' => "info@qtech.com.tr",      //Hangi mail adresinden mail gidecek
            'password' => "Qof93592",               //Mail adresinin şifresi
            'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
            'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
            'addAddress' => [
                session('user_email')               //hangi mail adreslerine gönderilecek
                //,"m.akyokus@qtech.com.tr" ...     // Şeklinde birden fazla mail adresine gönderebilirsiniz
            ],
            'mailSubject' => "Verimportal Mail Onay Kodu",      //Giden mailin konusu
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
                    <h2>Verim Mail Onay Kodu</h2>
                    <p><b>Verim</b> mail onay kodunuz:  <b><input style="margin-left: 15px" type="text" disabled value="'. user::get_token()['token'] .'"></b></p>
                    <p></p>
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
        mail::send($features);//mail sınıfı içerisindeki send() methoduna yukarıdaki diziyi parametre olarak göndererek mail gönderebilirsiniz.
    }

    if (post('sms')){
        $mailRes = user::mail_verification(post('smsCode'));
    //    damp(post('smsCode'));
        if ($mailRes){

            $_SESSION['verify'] = "1";
            $message['suc'] = "Başarıyla Giriş Yaptınız. Yönlendiriliyorsunuz.";
            header("Location:".site_url('hesap_bakiyeleri'));
        }else{
            $sms_res['err'] = "Hatalı kod girdiniz. Lütfen tekrar deneyiniz.";
            //header("Location:".site_url('login'));
        }
    }
    if (post('timeout')){
        user::valid();
        echo "Süreniz doldu";
        //session_destroy();
    }
}
require view("sms");