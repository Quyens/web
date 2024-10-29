<?php
define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");
$token = $TN->site('token_momo');
$curl = curl_init();
$dataPost = array(
    "type" => "history",
    "token" =>$token,
);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.web2m.com/historyapimomo/token
',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$dataPost,
));

$result = curl_exec($curl);

curl_close($curl);

$result = json_decode($result, true);
foreach ($result['momoMsg']['tranList'] as $data) {
    $partnerId      = $data['partnerId'];               // SỐ ĐIỆN THOẠI CHUYỂN
    $comment        = $data['comment'];                 // NỘI DUNG CHUYỂN TIỀN
    $tranId         = $data['tranId'];                  // MÃ GIAO DỊCH
    $partnerName    = $data['partnerName'];             // TÊN CHỦ VÍ
    $amount         = $data['amount'];                  // SỐ TIỀN CHUYỂN
    $user_id        = parse_order_id($comment, $TN->site('noidungnap_momo'));          // TÁCH NỘI DUNG CHUYỂN TIỀN
    // XỬ LÝ AUTO
    if ($getUser = $TN->get_row(" SELECT * FROM `usersda` WHERE `id` = '$user_id' ")) {
        if ($TN->num_rows(" SELECT * FROM `invoices` WHERE `trans_id` = '$tranId' ") == 0) {
            $insertSv2 = $TN->insert("invoices", array(
                'trans_id'               => $tranId,
                'payment_method'    => "MOMO",
                'user_id'           => $getUser['id'],
                'description'       => $comment,
                'amount'            => $amount,
                'status'            => 1,
                'create_time'       => time()
            ));
           if ($insertSv2) {
                $isCong = PlusCredits($getUser['id'], $amount, "Nạp tiền tự động qua web MOMO (#$tranId - $comment - $amount)");
                if ($isCong) {
                sendTele(templateTele($getUser['username']." nạp tiền tự động ".format_cash($amount)."đ qua ví MOMO (".$tranId.")"));
                    echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                }
            }
        }
    }
}

