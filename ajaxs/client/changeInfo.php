<?php

define("IN_SITE", true);
require_once "../../core/DB.php";
require_once "../../core/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['action']) && $_POST['action'] == 'ChangeEmail') {
    if (empty($_POST['token'])) {
        die(json_encode(['status' => 'error', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (!$getUser = $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '" . xss($_POST['token']) . "' AND `banned` = '0' ")) {
        die(json_encode(['status' => 'error', 'msg' => 'Vui lòng đăng nhập']));
    }
    if (empty($_POST['email'])) {
        die(json_encode(['status' => 'error', 'msg' => 'Vui lòng nhập email']));
    }
    if(check_email($_POST['email']) != true){
        die(json_encode(['status' => 'error', 'msg' => 'Định dạng email không hợp lệ']));
    }
    if ($TN->get_row("SELECT * FROM `usersda` WHERE `email` = '" . xss($_POST['email']) . "' ")) {
        die(json_encode(['status' => 'error', 'msg' => 'Email đã tồn tại, vui lòng chọn email khác']));
    }

    /* LƯU HOẠT ĐỘNG LẠI */
    $TN->insert("logs", [
        'user_id' => $getUser['id'],
        'ip' => myip(),
        'device' => $_SERVER['HTTP_USER_AGENT'],
        'create_date' => gettime(),
        'action' => 'Đã thay đổi thông tin email',
    ]);
    $isUpdate = $TN->update("usersda", [
        'ip' => myip(),
        'email' => xss($_POST['email']),
        'time_session' => time(),
        'device' => $_SERVER['HTTP_USER_AGENT'],
    ], " `id` = '" . $getUser['id'] . "' ");
    die(json_encode(['status' => 'success', 'msg' => 'Đã thay đổi thông tin thành công']));
}
} else {
    die('The Request Not Found');
}
