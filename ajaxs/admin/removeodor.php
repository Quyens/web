<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");

if (isset($_POST['id'])) {
    $getUser = $TN->get_row(" SELECT * FROM `usersda` WHERE `token`='" . check_string($_POST['token']) . "' AND `level`='1'");
    if(!$getUser)
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng đăng nhập'
        ]);
        die($data);
    }
    $id = check_string($_POST['id']);
    $row = $TN->get_row("SELECT * FROM `tbl_history_hosting` WHERE `id` = '$id' ");
    if (!$row) {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'đơn hàng không tồn tại trong hệ thống'
        ]);
        die($data);
    }
    $isRemove = $TN->remove("tbl_history_hosting", " `id` = '$id' ");
    if ($isRemove) {
        $TN->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'    => gettime(),
            'action'        => 'Xóa đơn hàng'
         ]);
        $data = json_encode([
            'status'    => 'success',
            'msg'       => 'Xóa đơn hàng thành công'
        ]);
        die($data);
    }
} else {
    $data = json_encode([
        'status'    => 'error',
        'msg'       => 'Dữ liệu không hợp lệ'
    ]);
    die($data);
}