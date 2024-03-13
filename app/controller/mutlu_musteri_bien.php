<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

//bienmutlu::set_products();
//bienmutlu::get_plants();
//bienmutlu::get_bien_products();
$genuses = bienmutlu::get_genuses();
$cities = bienmutlu::get_cities();
$sizes = bienmutlu::get_sizes();
$complaintTypes = complaint::get_complaint_type();
if (post('size')) {
    $products = bienmutlu::get_products(post('size'));
    $html = '<div class="dropdown bootstrap-select form-control"><select required style="transition: width 0.4s ease-in-out;" class="form-control selectpicker" data-live-search="true" name="productname" id="productName" tabindex="null">
                                    <option selected="" disabled="" value="">Ürün Adı</option>';
    foreach ($products as $product) {
        $html .= '<option value="' . $product["id"] . '">' . $product["name"] . '</option>';
    }

    $html .= '</select>';
    damp($html);
}
$producttypes = complaint::get_product_type();
if (post('detailtypeid')) {
    $sizes = complaint::get_size_by_type();
    $html = '<div id="productsize" style="display: none" class="col-md-12">
                                <select required style="transition: width 0.4s ease-in-out;" class="form-control selectpicker" data-live-search="true" name="productsize" id="productSize">
                                    <option selected disabled value="">Ürün Ebatları</option>';
    foreach ($sizes as $size) {
        $html .= '<option value="' . $size . '">' . $size . '</option>';
    }
    $html .= '</select>';
    damp($html);
}
if (post('typeid')) {
    $products = complaint::get_products_by_type(post('typeid'));


    $html = '<div class="dropdown bootstrap-select form-control"><select required style="transition: width 0.4s ease-in-out;" class="form-control selectpicker" data-live-search="true" name="productname" id="productName" tabindex="null">
                                    <option selected="" disabled="" value="">Ürün Adı</option>';
    foreach ($products as $product) {
        $html .= '<option value="' . $product["id"] . '">' . $product["name"] . '</option>';
    }

    $html .= '</select>';
    damp($html);
}
if (post('productid')) {
    $colors = complaint::get_color_by_name(post('productid'));
    $html = '<div id="productcolor" style="display: none" class="col-md-12">
                                <select required class="form-control  selectpicker" data-live-search="true" name="productcolor" id="productColor">
                                    <option selected disabled value="">Ürün Rengi</option>';
    foreach ($colors as $color) {
        $html .= '<option value="' . $color . '">' . $color . '</option>';
    }
    $html .= '</select>';
    damp($html);
}
//damp(complaint::get_product_type());

//damp($sizes);
if (post('submit')) {
    function tr_strtoupper($text)
    {
        $search=array("ç","i","ı","ğ","ö","ş","ü");
        $replace=array("Ç","İ","I","Ğ","Ö","Ş","Ü");
        $text=str_replace($search,$replace,$text);
        $text=strtoupper($text);
        return $text;
    }

    $query = [
        'name' => post('name'),
        'surname' => post('surname'),
        'phone' => post('phone'),
        'email' => post('email'),
        'category' => post('category'),
        'productType' => post('producttype') ? post('producttype') : NULL,
        'sealer' => post('sealer') ? post('sealer') : '',
        'productSize' => post('productsize') ? post('productsize') : '',
        'productName' => post('productname') ? post('productname') : '',
        'productColor' => post('productcolor') ? post('productcolor') : '',
        'complaintType' => post('complainttype') ? post('complainttype') : '',
        'productQuality' => post('productquality') ? post('productquality') : '',
        'productQuantity' => post('metraj') ? doubleval(post('metraj')) : NULL,
        'proposalSection' => post('propsection') ? post('propsection') : '',
        'personalEventDate' => post('personaleventdate') ? post('personaleventdate') : '',
        'personalEventTime' => post('personaleventtime') ? post('personaleventtime') : '',
        'msg' => tr_strtoupper(post('productdesc')),
        'address' => post('address') ? post('address') : NULL,
        'companyId'=>2,
        'province'=>post('province')? post('province') : '',
        'district'=>post('district')? post('district') : ''
    ];
    sms::send_sms("Şikayetiniz Başarıyla İletilmiştir.",sms::convert_number(post('phone')));
    sms::create_sms_log_complaint_sent($query['phone']);
    $complaintId = complaint::set_complaint($query);
    if ($complaintId != NULL) {
        if ($_FILES['upload']['name'][0] != "") {
            $fileResponse = file_upload::files_upload($complaintId, $_FILES['upload'], "complaint_file", "public/img/");
        }
        if (post('detail')) {
            $detail = [
                'complaintID' => $complaintId,
                'productApply' => post('productapply'),
                'applyDesc' => post('productapplydesc'),
                'productBoxDetail' => post('productboxdetail'),
                'productionDate' => post('productiondate'),
                'productionCalibre' => post('productcalibre'),
                'productColorNumber' => post('productcolornumber'),
                'productShipmentDate' => post('productshipmentdate'),
                'productApplyQuestion' => post('productapplyques')
            ];
            $detailResponse = complaint::set_detail($detail);
        }

    }
    if ($complaintId != NULL) {
        $response['suc'] = "İşleminiz başarıyla gerçekleşti.";
        $features = [
            'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
            'username' => "bien.mutlumusteri@bienseramik.com.tr",      //Hangi mail adresinden mail gidecek
            'password' => "Bog80854",                 //Mail adresinin şifresi
            'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
            'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
            //user_email="m.akyokus@qtech.com.tr","c.senotay@bienseramik.com.tr ","b.ertek@bienseramik.com.tr ","m.kunt@bienseramik.com.tr","s.eren@bienseramik.com.tr ","m.kadayifcioglu@bienseramik.com.tr ","m.akmence@bienseramik.com.tr ","a.pehlivan@bienseramik.com.tr";
//	factory_useremail="s.eren@bienseramik.com.tr ","m.kadayifcioglu@bienseramik.com.tr ","m.akmence@bienseramik.com.tr ";
            'addAddress' => [
                'c.senotay@bienseramik.com.tr','b.ertek@bienseramik.com.tr','m.kunt@bienseramik.com.tr'
            ],
            'mailSubject' => 'bien.mutlumusteri.org  Yeni Şikayet ',        //Giden mailin konusu
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
            <td bgcolor="#ffffff" align="center" style="color: white;"><br><br>
                <img alt="VerimPortal" src="'.public_url('img/bienlogo.png').'" width="150px" align="middle"><br><br><br>
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
                <a href="https://bien.mutlumusteri.org">bien.mutlumusteri.org</a>
            </td>
        </tr>
    </table>

</div>
</body>
</html>'
        ];
        mail::send($features);

    } else {
        $response['err'] = "Bir hata oluştu. Lütfen tekrar deneyiniz.";
    }


    //damp($_FILES['upload']['tmp_name'][0]);
    //print_r($response);
    // exit();
}
require view("bien_mutlu");
