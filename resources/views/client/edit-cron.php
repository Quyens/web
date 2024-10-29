<?php
$title = 'CHỈNH SỬA CRON | ' . $TN->site('title');
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
    $rowData = $TN->get_row(" SELECT * FROM `list_url_cron` WHERE `id` = '" . xss($_GET['id']) . "' AND `chunhan`='" . $getUser['username'] . "' ");
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
                                                    <h5 class="m-b-10">CHỈNH SỬA CRON JOB</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">CHỈNH SỬA CRON JOB </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">CHỈNH SỬA CRON JOB</h4>
                                    <form>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <b>Sau khi thuê link cron, thì mặc định cron sẽ được duy trì trong 1 tháng, và có thể gia hạn. Lưu ý server3 min 5s nhé</b>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label for="url" class="form-label">LINK CRON</label>
                                                        <input type="text" id="url" value="<?=$rowData['url'];?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="sogiay" class="form-label">SỐ GIÂY</label>
                                                        <input type="number" id="sogiay" value="<?=$rowData['sogiay'];?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="d-flex justify-content-end gap-6">
                                                <input id="token" type="hidden" value="<?=$getUser['token'];?>">
                                                <input id="magd" type="hidden" value="<?=$rowData['magd'];?>">
                                                <a href="javascript:;" id="btnSave" class="btn btn-success d-flex align-items-center">
                                                    <i class="fa fa-save mr-2"></i> LƯU NGAY
                                                </a>
                                                <button type="reset" class="btn bg-danger-subtle text-danger">Reset</button>
                                            </div>
                                            <div class="d-flex justify-content-end gap-6 mt-3">
                                                <a id="active" class="btn btn-primary">KÍCH HOẠT</a>
                                                <a id="stop" class="btn btn-danger">TẠM DỪNG</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#datatable').DataTable();
                            });
 
                            function showToast(type, message) {
                                Toast.fire({
                                    icon: type,
                                    title: message,
                                    timer: 2000
                                });
                            }
 
                            $("#btnSave").click(function() {
                                $('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                                $.ajax({
                                    url: '<?= BASE_URL("ajaxs/client/cron.php"); ?>',
                                    type: 'POST',
                                    dataType: "json",
                                    data: {
                                        action: "edit",
                                        magd: $("#magd").val(),
                                        url: $("#url").val(),
                                        sogiay: $("#sogiay").val(),
                                        token: $("#token").val()
                                    },
                                    success: function(res) {
                                        if (res.status == '2') {
                                            showToast("success", res.msg);
                                            setTimeout(function() {
                                                window.location = "<?= BASE_URL('client/thue-cron') ?>"
                                            }, 1000);
                                        } else {
                                            showToast("error", res.msg);
                                        }
                                        $('#btnSave').html('<i class="fa fa-save mr-1"></i>LƯU NGAY').prop('disabled', false);
                                    }
                                });
                            });
 
                            $("#stop").on("click", function() {
                                $('#stop').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
                                $.ajax({
                                    url: "<?= BASE_URL("ajaxs/client/cron.php"); ?>",
                                    method: "POST",
                                    dataType: "JSON",
                                    data: {
                                        action: "stop",
                                        magd: $("#magd").val(),
                                        token: $("#token").val()
                                    },
                                    success: function(data) {
                                        if (data.status == '2') {
                                            showToast("success", data.msg);
                                            setTimeout(function() {
                                                window.location = "<?= BASE_URL('client/thue-cron') ?>"
                                            }, 1000);
                                        } else {
                                            showToast("error", data.msg);
                                        }
                                        $('#stop').html('<i class="fa fa-stop"></i> TẠM DỪNG').prop('disabled', false);
                                    }
                                });
                            });
 
                            $("#active").on("click", function() {
                                $('#active').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
                                $.ajax({
                                    url: "<?= BASE_URL("ajaxs/client/cron.php"); ?>",
                                    method: "POST",
                                    dataType: "JSON",
                                    data: {
                                        action: "active",
                                        magd: $("#magd").val(),
                                        token: $("#token").val()
                                    },
                                    success: function(data) {
                                        if (data.status == '2') {
                                            showToast("success", data.msg);
                                            setTimeout(function() {
                                                window.location = "<?= BASE_URL('client/thue-cron') ?>"
                                            }, 1000);
                                        } else {
                                            showToast("error", data.msg);
                                        }
                                        $('#active').html('<i class="fa fa-play"></i> KÍCH HOẠT').prop('disabled', false);
                                    }
                                });
                            });
                        </script>

<?php require_once __DIR__ . '/footer.php'; ?>