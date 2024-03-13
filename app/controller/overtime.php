<?php

    $officer = Hr::get_approval_officer();
    $waitingOvertimes = Hr::get_overtimes(session('user_id'),3);
//  damp($waitingOvertimes);
    $rejectedOvertimes = Hr::get_overtimes(session('user_id'),2);
    $acceptedOvertimes = Hr::get_overtimes(session('user_id'),1);
    $canceledOvertimes = Hr::get_overtimes(session('user_id'),4);
    $company = json_decode(session('selectedCompany'),false);

    if (post('id')){

        $response = Hr::set_status(post('id'),4);
        damp(json_encode($response,true));
    }

    if (post('createovertime')){
        if (count($company) != 1){
            $response['err'] = "Lütfen firma seçim menusunden sadece 1 firma seçiniz.";
        }else{
            $overtime = [
                'user_id' => session('user_id'),
                'company_id' => $company[0]->id,
                'officer_id' => post('approvalofficer'),
                'date' => post('overtimedate'),
                'starttime' => post('overtimestart'),
                'finishtime' => post('overtime'),
                'comment' => post('description')
            ];
            $result = Hr::create_overtime($overtime);



            if ($result){
                $features = [
                    'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
                    'username' => "info@qtech.com.tr",      //Hangi mail adresinden mail gidecek
                    'password' => "Qof93592",               //Mail adresinin şifresi
                    'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
                    'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
                    'addAddress' => [
                        user::get_user_name(post('approvalofficer'))['username']    // Şeklinde birden fazla mail adresine gönderebilirsiniz
                    ],
                    'mailSubject' => $company[0]->companyName." Fazla Mesai İsteği",      //Giden mailin konusu
                    'mailContent' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true" href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <title>VerimPortal</title>
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
                <h2>VerimPortal Fazla Mesai İsteği</h2>
            </td>
        </tr>
    </table>
    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 30px 30px 30px 60px;">
            <tr>
              <th>Firma Adı</th>
              <th>Çalışan Adı</th>
              <th>Fazla Mesai Tarihi</th>
              <th>Fazla Mesai Bitiş Zamanı</th>
              <th>Fazla Mesai Açıklaması</th>
            </tr>
            <tr>
              <td>'.$company[0]->companyName.'</td>
              <td>'.session('user_name').'</td>
              <td>'.post('overtimedate').'</td>
              <td>'.post('overtime').'</td>
              <td>'.post('description').'</td>
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
                mail::send($features);
                $response['suc'] = "Fazla mesai isteğiniz başarıyla iletilmiştir.";
            }else{
                $response['err'] = "Fazla mesai isteğiniz oluşturulurken bir hata ile karşılaştık. Lütfen teknik ekibe başvurun.";
            }
        }
    }


    require view('overtime');
