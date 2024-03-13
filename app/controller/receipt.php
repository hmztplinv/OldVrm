<?php

if (get('receiptId')){
    $url = baseUrl."/Pdf/DownloadPdfReceiptColumnsWithDoc?id=".get('receiptId')."&isDownload=false";
    $receipt = api::API_url($url);
 
    require view('receipt');
}

