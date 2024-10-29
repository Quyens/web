<?php
define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");



// Check GD quá 1 lần / phút có thể bị MOMO block check GD 5-15phút
$urlapi = 'https://api.dailysieure.com/api-momo?api=2&apikey=' ;
$ketquacurl = curl_get_api_dailysieure($urlapi);
$ketqua = json_decode($ketquacurl, true);
if($ketqua['status'] == '1'){
    echo $ketqua['msg'] ;
}else{
  //exit($ketquacurl); 
  $checkGD = @json_decode($ketquacurl)->tranList;
if ($checkGD == null){  
 echo 'Không có lịch sử gd nào gần đây hoặc bị block check giao dịch vài phút';   
}else{
   // lịch sử giao dịch đã xuất hiện
   foreach(array_reverse($checkGD) as $struct) {
       $sdt = $struct->partnerId   ; // SDT 
    $tien = $struct->amount; // số tiền 
    $noidung = $struct->comment; // nội dung gửi tiền
    $magd = $struct->tranId; // mã giao dịch
    
    foreach(array_reverse($checkGD) as $struct) {
       $sdt = $struct->partnerId   ; // SDT 
    $tien = $struct->amount; // số tiền 
    $noidung = $struct->comment; // nội dung gửi tiền
    $magd = $struct->tranId; // mã giao dịch
    $user_id        = parse_order_id($noidung, $TN->site('noidungnap_momo'));          // TÁCH NỘI DUNG CHUYỂN TIỀN
    // XỬ LÝ AUTO
    if ($getUser = $TN->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
        if ($TN->num_rows(" SELECT * FROM `invoices` WHERE `trans_id` = '$magd' ") == 0) {
            $insertSv2 = $TN->insert("invoices", array(
                'trans_id'          => $magd,
                'payment_method'    => "MOMO",
                'user_id'           => $getUser['id'],
                'description'       => $noidung,
                'amount'            => $tien,
                'status'            => 1,
                'create_time'       => time()
            ));
            if ($insertSv2) {
                $isCong = PlusCredits($getUser['id'], $tien, "Nạp tiền tự động qua web MOMO (#$magd - $noidung - $tien)");
                if ($isCong) {
                sendTele(templateTele($getUser['username']." nạp tiền tự động ".format_cash($tien)."đ qua ví MOMO (".$magd.")"));
                echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.';
                }
            }
        }
    }
}

}
}
}