<?php

define("IN_SITE", true);
require_once "../../core/DB.php";
require_once "../../core/helpers.php";
require_once '../../core/class/class.smtp.php';
require_once '../../core/class/PHPMailerAutoload.php';
require_once '../../core/class/class.phpmailer.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'forgotPassword') {
        if (empty($_POST['email'])) {
            die(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập email']));
        }
        if (!$getUser = $TN->get_row("SELECT * FROM `usersda` WHERE `email` = '" . ($_POST['email']) . "'")) {
            die(json_encode(['status' => 'error', 'msg' => 'Địa chỉ email không tồn tại trong hệ thống']));
        }
        $otp = random('0123456789', '6');
        $TN->update("usersda", array(
            'otp' => $otp,
        ), " `id` = '" . $getUser['id'] . "' ");
        $guitoi = $getUser['email'];
        $subject = 'KHÔI PHỤC MẬT KHẨU';
        $bcc = "";
        $hoten = 'Client';
        $noi_dung = '<p> Mã OTP xác nhận email của bạn là : <b>' . $otp . '.</b></p>
        <table>
        <tbody>
        <tr>
       
        </tr>
        <tr>
        <p> Nếu không phải bạn vui lòng thay đổi thông tin tài khoản ngay hoặc liên hệ DICHVUREAT.NET để hỗ trợ kiểm tra an toàn cho quý khách.</p>
        <p>Thời gian:    ' . gettime() . '</p>
        <p>IP:    ' . myip() . '</p>
        <p>Thiết bị:    ' . $_SERVER['HTTP_USER_AGENT'] . '</p>
       
      
        </tr>
        </tbody>
        </table>';
       
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);
        die(json_encode(['status' => 'success', 'msg' => 'Chúng tôi đã gửi 1 mã OTP khôi phục đến email của bạn']));
    }
    if (isset($_POST['action']) && $_POST['action'] == 'resetPassword') {
        $otp = ($_POST['otp']);
        $repassword = ($_POST['repassword']);
        $password = ($_POST['password']);
        if (empty($otp)) {
            die(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập otp']));
        }
        if (empty($password)) {
            die(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập mật khẩu mới']));
        }
        if (empty($repassword)) {
            die(json_encode(['status' => 'error', 'msg' => 'Vui lòng xác minh lại mật khẩu']));
        }
        $row = $TN->get_row(" SELECT * FROM `usersda` WHERE `otp` = '$otp' ");
        if (!$row) {
            die(json_encode(['status' => 'error', 'msg' => 'OTP không tồn tại trong hệ thống']));
        }
        if ($password != $repassword) {
            die(json_encode(['status' => 'error', 'msg' => 'Nhập lại mật khẩu không đúng']));
        }
        if (strlen($password) < 6) {
            die(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập mật khẩu có ích nhất 6 ký tự']));
        }
        $TN->update("usersda", [
            'otp' => null,
            'password' => sha1($password),
        ], " `id` = '" . $row['id'] . "' ");
        $TN->insert("logs", [
            'user_id' => $row['id'],
            'ip' => myip(),
            'device' => $_SERVER['HTTP_USER_AGENT'],
            'create_date' => gettime(),
            'action' => 'Khôi phục mật khẩu thành công',
        ]);
        die(json_encode(['status' => 'success', 'msg' => 'Đã khôi phục mật khẩu thành công']));
    }
} else {
    die('The Request Not Found');
}
