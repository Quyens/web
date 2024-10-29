<?php
$title = 'CHỈNH SỬA MIỀN | ' . $TN->site('title');
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
   
                    <script>
                        document.addEventListener('click', function(event) {
                            var dropdownContent = document.querySelector('.dropdown-content');
                            var dropdownToggle = document.querySelector('[data-dropdown-toggle="dropdownDivider"]');
                            var dropdownDividerButton = document.querySelector('#dropdownDividerButton');
 
                            if (event.target !== dropdownToggle && !dropdownContent.contains(event.target)) {
                                dropdownContent.classList.add('hidden');
                           } else if (event.target === dropdownDividerButton) {
                                dropdownContent.classList.add('hidden');
                            }
                        });
 
                        var dropdownToggle = document.querySelector('[data-dropdown-toggle="dropdownDivider"]');
                        dropdownToggle.addEventListener('click', function() {
                            var dropdownContent = document.querySelector('.dropdown-content');
                            dropdownContent.classList.toggle('hidden');
                        });
                    </script>
                 <div class="row">
                        <div class="pcoded-content">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10">CHỈNH SỬA MIỀN</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">CHỈNH SỬA MIỀN </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">CHỈNH SỬA MIỀN</h4>
                                    <form>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="server1" class="form-label">NAMESERVER 1</label>
                                                        <input type="text" id="server1" value="<?=$rowData['server1'];?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="server2" class="form-label">NAMESERVER 2</label>
                                                        <input type="text" id="server2" value="<?=$rowData['server1'];?>" class="form-control">
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
 
                            $("#btnSave").click(function() {
                                $('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                                $.ajax({
                                    url: '<?=BASE_URL('ajaxs/client/muamien.php')?>',
                                    type: 'POST',
                                    dataType: "json",
                                    data: {
                                        action: "edit",
                                        magd: $("#magd").val(),
                                        server1: $("#server1").val(),
                                        server2: $("#server2").val(),
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
                                        $('#btnSave').html('<i class="fa fa-save mr-2"></i> LƯU NGAY').prop('disabled', false);
                                    }
                                });
                            });
                        </script>
 
 
                        <script>
                            function handleColorTheme(e) {
                                document.documentElement.setAttribute("data-color-theme", e);
                            }
                        </script>
 
<?php require_once __DIR__ . '/footer.php'; ?>