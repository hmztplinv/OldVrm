<?php

class MailFactory
{
    public static function send_mail_to_factories($mails,$id)
    {
            $complaint = complaint::get_complaint_by_id($id);
            $companyid=$complaint['companyId'];
            $complaint['market'] == "1" ? $complaint['market'] = "Yurtiçi" : $complaint['market'] = "Yurtdışı";
            $document = Document::report_or_form_exist($id, 1);
            $mailinfo=complaint::get_mail_info($companyid);
            $mailinfo['password']=base64_decode($mailinfo['password']);//decoding password
            if (!empty($document)) {
                Document::update_form($id);
            } else {
                Document::set_form($id);
            }
            $id=base64_encode($id);
            $bildirimformu=site_url('complaint_form?complaint=').$id;
            define('K_PATH_IMAGES', '/public/img/');
        $features = [
            'host' => $mailinfo['host'],         //Hangi mail sağlayıcısı kullanılacak
            'username' => $mailinfo['username'],      //Hangi mail adresinden mail gidecek
            'password' => $mailinfo['password'],                 //Mail adresinin şifresi
            'smtpSecure' => $mailinfo['smtpSecure'],                  //Güvenlik protokolü tls,smtp,ssl vs.
            'port' => $mailinfo['port'],                          //Port güvenlik protokolüne göre belirlenir
            'addAddress' => $mails,
            'mailSubject' => ($companyid==2 ? 'bien':'qua').'.mutlumusteri.org '.$complaint['id'].' Numaralı Şikayet Eklendi',       //Giden mailin konusu
            'mailContent' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true" href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
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
            font-size: 20px;
            font-weight: 800;
        }

        p {
            font-size: 12px;
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
    <table role="presentation" width="100%" style="text-align: center">
        <tr>
            <h2 align="center"><a href="'.$bildirimformu.'" > Şikayet Bildirim Formu Linki</a></h2>            
            <td bgcolor="#ffffff" align="center" style="color: white;"><br><br>
                <img alt="VerimPortal" src="'.($companyid==2 ? public_url('img/bienlogo.png'):public_url('img/qualogo.png')).'" width="150px" align="middle"><br><br><br>
            </td>
        </tr>
        <tr><h1>Yeni şikayet eklenmiştir.</h1><h2>Sağlıklı günler dileriz.</h2>
        </tr>
        <br><br>
 </table>

<br><br><br>

    <! Banner Row -->
    <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 50px;" >
        <tr>
            <td align="center" style="padding: 30px 30px;">
                <a href="https://'.($companyid==2 ? 'bien':'qua').'.mutlumusteri.org">'.($companyid==2 ? 'bien':'qua').'.mutlumusteri.org</a>
            </td>
        </tr>
    </table>

</div>
</body>
</html>'
            ];

        mail::send($features);
    }

}
