<?php
$title = 'Chi Tiết Web | ' . $TN->site('title');
$body['header'] = '
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
';
$body['footer'] = '

';
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
CheckLogin();
?>
<?php
if (isset($_GET['id'])) {
    $rowData = $TN->get_row(" SELECT * FROM `tbl_his_web` WHERE `id` = '" . xss($_GET['id']) . "' AND `username`='" . $getUser['username'] . "' ");
    if (!$rowData) {
        TN_error_time("Liên kết không tồn tại", BASE_URL(''), 500);
    }
} else {
    TN_error_time("Liên kết không tồn tại", BASE_URL(''), 0);
}

?>
    <div class="row">
                        <div class="pcoded-content">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10"> THÔNG TIN WEB </h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">THÔNG TIN WEB </a></li>
                                                </ul>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">THÔNG TIN WEB</h4>
                                    <form>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <b> Sau khi mua web, thì mặc định web sẽ được duy trì trong 1 tháng, và có thể gia hạn </b>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="magd" class="form-label">MÃ ĐƠN</label>
                                                        <input type="text" id="magd" value="<?=$rowData['magd'];?>" readonly class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="tenmien" class="form-label">TÊN MIỀN</label>
                                                        <input type="text" id="tenmien" value="<?=$rowData['tenmien'];?>" readonly class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="taikhoan" class="form-label">TÀI KHOẢN</label>
                                                        <input type="text" id="taikhoan" value="<?=$rowData['taikhoan'];?>" readonly class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="matkhau" class="form-label">MẬT KHẨU</label>
                                                        <input type="text" id="matkhau" value="<?=$rowData['matkhau'];?>" readonly class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="iphost" class="form-label">IP HOSTING</label>
                                                        <input type="text" id="iphost" value="<?=$rowData['iphost'];?>" readonly class="form-control">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="d-flex justify-content-end gap-6">
                                               
                                                <a href="javascript:history.back()" class="btn btn-danger d-flex align-items-center">
                                                    <i class="fa fa-arrow-left mr-2"></i> QUAY LẠI
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<?php require_once __DIR__ . '/footer.php'; ?>