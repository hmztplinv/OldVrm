<?php
require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mail{
public static function send($features){
    $mail = new PHPMailer(true); //PHPMailer Sınıfı aktif ettik.
    try {

        $mail->setLanguage('tr');
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = $features['username'];
        $mail->Password = $features['password'];
        $mail->SMTPSecure = $features['smtpSecure'];
        $mail->Port = $features['port'];
        $mail->CharSet = 'UTF-8';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


        $mail->setFrom($features['username'], $features['mailSubject']);
        foreach ($features['addAddress'] as $mailAddress){
            $mail->addAddress($mailAddress);
        }


        $mail->isHTML(true);
        $mail->Subject = $features['mailSubject'];
        $mail->Body = $features['mailContent'];

        if (isset($features['file'])){
            $mail->addAttachment(__DIR__.'../../../public/complaintDocs/file.pdf',"Ek.pdf");
        }
        if (isset($features['videos'])){

            $picindx=1;

            foreach ($features['videos'] as $item){
                $mail->addAttachment(__DIR__.'../../../public/img/'.Complaint::get_pic_name($item),"$picindx.mp4");
            }
        }
        if (isset($features['pics'])){
            $picindx=1;

            foreach ($features['pics'] as $item){
                $mail->addAttachment(__DIR__.'../../../public/img/'.Complaint::get_pic_name($item),"$picindx.jpeg");
            }
        }
        if (isset($features['picsRep'])){
            $picindx=1;

            foreach ($features['picsRep'] as $item){
                $mail->addAttachment(__DIR__.'../../../public/public/img/'.Complaint::get_reppic_name($item),"$picindx.jpeg");
            }
        }

        $sender = $mail->send();
//        echo $sender;

    } catch (Exception $e){
        echo $e;
    }
}
}
