<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");


if ($_POST['action'] == 'total') {
    $server = xss($_POST['loaimien']);
    if (empty($server)) {
        die('Vui lòng chọn miền');
    }
    $tnguyn = $TN->get_row(" SELECT * FROM `tenmien` WHERE `id` = '$server' AND `status` = 'ON' ");
    if ($tnguyn) {
        $total_phi = $tnguyn['rate'];
    } else {
        $total_phi = 0;
    }
    die(number_format($total_phi));
}
if ($_POST['action'] == 'buy') {
    $server = xss($_POST['loaimien']);
    $domain = xss($_POST['domain']);
    $server1 = xss($_POST['server1']);
    $server2 = xss($_POST['server2']);
    if (empty($_POST['token'])) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (!$getUser = $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '" . xss($_POST['token']) . "' AND `banned` = '0' ")) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (empty($server)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đuôi miền!']));
    }
    if (empty($domain)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng nhập tên miền!']));
    }
    if (empty($server1)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng nhập server1!']));
    }
    if (empty($server2)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng nhập server2!']));
    }
    $getdata = $TN->get_row(" SELECT * FROM `tenmien` WHERE `id` = '$server' AND `status` = 'ON' ");
    if (!$getdata) {
        die(json_encode(['status' => '1', 'msg' => 'miền không hợp lệ!']));
    }
    if ($getUser['money'] < $getdata['rate']) {
        die(json_encode(['status' => '1', 'msg' => 'Số dư không đủ để thực hiện giao dịch!']));
    }

    $isBuy = RemoveCredits($getUser['id'], $getdata['rate'], "Mua Miền #" . $getdata['rate']);
    if ($isBuy) {
        if (getRowRealtime("usersda", $getUser['id'], "money") < 0) {
            Banned($getUser['id'], 'Gian lận khi mua miền');
            die(json_encode(['status' => '1', 'msg' => 'Bạn đã bị khoá tài khoản vì gian lận']));
        }
        /* LƯU HOẠT ĐỘNG LẠI */
        $TN->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'    => gettime(),
            'action'        => 'Mua tên miền thành công (#' . $getdata['rate'] . ')'
        ]);
        $TN->insert("ls_muamien", [
            'username'  => $getUser['username'],
            'magd' => random('QWERTYUIOPASDFGHJKZXCVBNM', 2) . time(),
            'domain' => $domain,
            'loaimien' => $server,
            'server1' => $server1,
            'server2' => $server2,
            'status' => 'tamdung',
            'ngay_mua' => time(),
            'ngay_het' => time() + 31536000 
        ]);
        sendTele(templateTeles($getUser['username']." Mua tên miền thành công (#" . $getdata['rate'] . ")"));

        die(json_encode(['status' => '2', 'msg' => 'Mua tên miền thành công']));
    }
}
if ($_POST['action'] == 'totalgiahan') {
    if (empty($_POST['token'])) {
        die('Vui lòng đăng nhập');
    }
    if (!$getUser = $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '" . xss($_POST['token']) . "' AND `banned` = '0' ")) {
        die('Vui lòng đăng nhập');
    }
    $magd = xss($_POST['magd']);
    $thoigian = xss($_POST['thoigian']);
    if (empty($magd)) {
        die('Thiếu trường mã giao dịch');
    }
    if (empty($thoigian)) {
        die('Thiếu trường thời gian');
    }
    $isCron = $TN->get_row(" SELECT * FROM `ls_muamien` WHERE `magd` = '$magd' ");
    if(!$isCron)
    {
      die('Đơn miềnkhông tồn tại');
    }
    $code_server = $isCron['loaimien'];
    $tnguynz = $TN->get_row(" SELECT * FROM `tenmien` WHERE `id` = '$code_server' AND `status` = 'ON' ");
    if ($tnguynz) {
        $total_phi = $thoigian * $tnguynz['rate'];
    } else {
        $total_phi = 0;
    }
    die(number_format($total_phi));
}
if ($_POST['action'] == 'giahan') {
    $thoigian = xss($_POST['thoigian']);
    $magd = xss($_POST['magd']);
    if (empty($_POST['token'])) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (!$getUser = $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '" . xss($_POST['token']) . "' AND `banned` = '0' ")) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (empty($thoigian)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng chọn thời gian gia hạn!']));
    }
    if (empty($magd)) {
        die(json_encode(['status' => '1', 'msg' => 'Không hợp lệ!']));
    }
    if ($thoigian < 1) {
        die(json_encode(['status' => '1', 'msg' => 'Thời gian không hợp lệ rồi!']));
    }
    $isCron = $TN->get_row(" SELECT * FROM `ls_muamien` WHERE `magd` = '$magd' ");
    if(!$isCron)
    {
      die(json_encode(['status' => '1', 'msg' => 'Không hợp lệ!']));
    }
    $code_server = $isCron['loaimien'];
    $getdata = $TN->get_row(" SELECT * FROM `tenmien` WHERE `id` = '$code_server' AND `status` = 'ON' ");
    if (!$getdata) {
        die(json_encode(['status' => '1', 'msg' => 'Máy chủ không hợp lệ!']));
    }
    $total = $thoigian * $getdata['rate'];
    $thoigianmoi = $thoigian * 31536000;
    if($isCron['ngay_het'] < time())
    {
        $thoigiancong = time() + $thoigianmoi;
    }else{
        $thoigiancong = $isCron['ngay_het'] + $thoigianmoi;
    }
    if ($getUser['money'] < $total) {
        die(json_encode(['status' => '1', 'msg' => 'Số dư không đủ để thực hiện giao dịch!']));
    }
    

    $isBuy = RemoveCredits($getUser['id'], $total, "Gia hạn miền #" . $total);
    if ($isBuy) {
        if (getRowRealtime("usersda", $getUser['id'], "money") < 0) {
            Banned($getUser['id'], 'Gian lận khi gia hạn miền');
            die(json_encode(['status' => '1', 'msg' => 'Bạn đã bị khoá tài khoản vì gian lận']));
        }
        /* LƯU HOẠT ĐỘNG LẠI */
        $TN->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'    => gettime(),
            'action'        => 'Gia hạn miền thành công (#' . $total . ')'
        ]);
         $TN->update("ls_muamien", array(
                'ngay_het' => $thoigiancong,
            ), " `magd` = '".$magd."' ");
         sendTele(templateTeles($getUser['username']." gia hạn miền (#" . $magd . ")"));

        die(json_encode(['status' => '2', 'msg' => 'Gia hạn thành công']));
    }
}

if ($_POST['action'] == 'edit') {
    $magd = xss($_POST['magd']);
    $server1 = xss($_POST['server1']);
    $server2 = xss($_POST['server2']);
    if (empty($_POST['token'])) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (!$getUser = $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '" . xss($_POST['token']) . "' AND `banned` = '0' ")) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (empty($magd)) {
        die(json_encode(['status' => '1', 'msg' => 'Không hợp lệ!']));
    }
    if (empty($server1)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng nhập server1!']));
    }
    if (empty($server2)) {
        die(json_encode(['status' => '1', 'msg' => 'Vui lòng nhập server2!']));
    }
    
    $TN->update("ls_muamien", array(
            'server1' => $server1,
            'server2' => $server2
        ), " `magd` = '".$magd."' ");
    sendTele(templateTeles($getUser['username']." chỉnh sửa nameserver (#" . $magd . ")"));
 
    die(json_encode(['status' => '2', 'msg' => 'Thay đổi thành công']));
    
}