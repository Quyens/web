<?php
$title = 'GIA HẠN MIỀN | ' . $TN->site('title');
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
    $rowData = $TN->get_row(" SELECT * FROM `ls_muamien` WHERE `id` = '" . xss($_GET['id']) . "' AND `username`='" . $getUser['username'] . "' ");
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
                                                    <h5 class="m-b-10">GIA HẠN MIỀN</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">GIA HẠN MIỀN </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">GIA HẠN MIỀN</h4>
                                    <form>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="mb-3">
                                                        <h2 class="font-bold text-base">Sau khi mua miền, thì mặc định miền sẽ được duy trì trong 1 năm, và có thể gia hạn</h2>
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="magd" class="form-label">MÃ ĐƠN</label>
                                                        <input type="text" id="magd" value="<?=$rowData['magd'];?>" readonly class="form-control fw-bold">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="thoigian" class="form-label">THỜI GIAN</label>
                                                        <select id="thoigian" class="form-select" onchange="tongtien()">
                                                            <option value="">Chọn thời gian gia hạn</option>
                                                            <option value="1">1 Năm</option>
                                                            <option value="2">2 Năm</option>
                                                            <option value="3">3 Năm</option>
                                                            <option value="4">4 Năm</option>
                                                            <option value="5">5 Năm</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="tongtien" class="form-label">TỔNG TIỀN</label>
                                                        <p class="text-slate-400 text-sm"><b class="text-red-500" id="tongtien">0</b><b class="text-red-500">đ</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="d-flex justify-content-end gap-6">
                                                    <input id="token" type="hidden" value="<?=$getUser['token'];?>">
                                                    <input id="server" type="hidden" value="<?=$rowData['id_server'];?>">
                                                    <a href="javascript:;" id="btnGiaHan" class="btn btn-success d-flex align-items-center">
                                                        <i class="fa fa-save mr-2"></i> GIA HẠN
                                                    </a>
                                                    <a href="javascript:history.back()" class="btn bg-danger-subtle text-danger">QUAY LẠI</a>
                                                </div>
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
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#datatable').DataTable();
                            });
 
                            $("#btnGiaHan").click(function() {
                                $('#btnGiaHan').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                                $.ajax({
                                    url: '<?=BASE_URL('ajaxs/client/muamien.php')?>',
                                    type: 'POST',
                                    dataType: "json",
                                    data: {
                                        action: "giahan",
                                        thoigian: $("#thoigian").val(),
                                        magd: $("#magd").val(),
                                        token: $("#token").val()
                                    },
                                    success: function(res) {
                                        if (res.status == '2') {
                                            Toast.fire({
                                                icon: "success",
                                                title: res.msg,
                                                timer: 5000
                                            });
                                            setTimeout(function() {
                                                window.location = "<?=BASE_URL('client/domain')?>"
                                            }, 1000);
                                        } else {
                                            Toast.fire({
                                                icon: "error",
                                                title: res.msg,
                                                timer: 5000
                                            });
                                        }
                                        $('#btnGiaHan').html('<i class="fa fa-upload mr-1"></i>GIA HẠN').prop('disabled', false);
                                    }
                                });
                            });
 
                            function tongtien() {
                                var magd = $('#magd').val();
                                var thoigian = $('#thoigian').val();
                                if (magd != '' && thoigian != '') {
                                    $.ajax({
                                        url: '<?=BASE_URL('ajaxs/client/muamien.php')?>',
                                        type: 'POST',
                                        data: {
                                            action: "totalgiahan",
                                            magd: magd,
                                            thoigian: thoigian,
                                            token: $('#token').val()
                                        },
                                        success: function(result) {
                                            $('#tongtien').html(result);
                                        }
                                    });
                                } else {
                                    $('#tongtien').html('');
                                }
                            }
 
                            window.onload = function() {
                                document.getElementById("loading").style.display = "block";
                                document.getElementById("slc").style.visibility = "hidden";
                                setTimeout(function() {
                                    document.getElementById("loading").style.display = "none";
                                    document.getElementById("slc").style.visibility = 'visible';
                                }, 500);
                            }
                        </script>

<?php require_once __DIR__ . '/footer.php'; ?>