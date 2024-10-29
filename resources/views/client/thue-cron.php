<?php
$title = 'THUÊ CRON | ' . $TN->site('title');
$body['header'] = '
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
';
$body['footer'] = '

';
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
//CheckLogin();
?>
   <div class="row">
    <div class="pcoded-content">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10">THUÊ CRON JOB</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">THUÊ CRON JOB </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">THUÊ CRON JOB</h4>
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
                                                        <input type="text" id="url" placeholder="Nhập link cron" class="form-control">
                                                    </div>
                                               </div>
                                               <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="sogiay" class="form-label">SỐ GIÂY</label>
                                                        <input type="number" min="1" id="sogiay" placeholder="Nhập số giây" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="server" class="form-label">MÁY CHỦ</label>
                                                        <select id="server" onchange="tongtien()" class="form-select">
                                                            <option value="">Chọn máy chủ</option>
                                                            <?php foreach($TN->get_list("SELECT * FROM `server_cron_auto` WHERE `status` = 'ON' ") as $row) {?>
                  <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
                  <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tongtien" class="form-label">THÀNH TIỀN</label>
                                                        <p class="text-slate-400 text-sm"><b class="text-red-500" id="tongtien">0</b><b class="text-red-500">đ</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="d-flex justify-content-end gap-6">
                                                <input id="token" type="hidden" value="<?=$getUser['token'];?>">
                                                <a href="javascript:;" id="btnThueCron" class="btn btn-success d-flex align-items-center">
                                                    <i class="fa fa-shopping-cart mr-2"></i> THUÊ NGAY
                                                </a>
                                                <button type="reset" class="btn bg-danger-subtle text-danger">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">LỊCH SỬ THUÊ CRON</h4>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>LINK CRON</th>
                                                    <th>SỐ GIÂY</th>
                                                    <th>MÁY CHỦ</th>
                                                    <th>TRẠNG THÁI</th>
                                                    <th>RESPONSE</th>
                                                    <th>HẠN DÙNG</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm font-semibold">
                                <?php $i=0; foreach ($TN->get_list("SELECT * FROM `list_url_cron` WHERE `chunhan` = '" . $getUser['username'] . "' ORDER BY `id` DESC") as $row) {?>
                                     <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['url'];?>                                    </td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?=$row['sogiay'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?= GetSvCron($row['id_server']); ?></td>
                                    <td> <?= GetStatusCron($row['trangthai']); ?> </td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?= GetCodeCron($row['response']); ?><br>Lần chạy gần nhất: <?= date('d/m/Y - H:i:s', $row['time_his']); ?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"> <span
                                        class="badge bg-danger"> <?=date('d-m-Y H:i:s',$row['ngay_het'])?></span></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                    <a href="<?= BASE_URL('client/giahan-cron/'), $row['id'] ?>" class="btn btn-outline-primary">GIA HẠN </a>
                                    <a href="<?= BASE_URL('client/edit-cron/'), $row['id'] ?>" class="btn btn-outline-success mb-6"> <i class="fa fa-edit"></i> CHỈNH SỬA </a>
                                    </td> 
                                </tr>
                                <?php }?>
                                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script type="text/javascript">
                            $(document).ready(function() {
                                $('#datatable').DataTable();
                            });
 
                            $("#btnThueCron").click(function() {
                                $('#btnThueCron').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                                $.ajax({
                                    url: '<?=BASE_URL('ajaxs/client/cron.php')?>',
                                    type: 'POST',
                                    dataType: "json",
                                    data: {
                                        action: "buy",
                                        server: $('#server').val(),
                                        url: $('#url').val(),
                                        sogiay: $('#sogiay').val(),
                                        token: $('#token').val()
                                    },
                                    success: function(res) {
                                        if (res.status == '2') {
                                            Toast.fire({
                                                icon: "success",
                                                title: res.msg,
                                                timer: 5000
                                            });
                                            setTimeout(function() {
                                                window.location = "<?=BASE_URL('client/thue-cron')?>"
                                            }, 1000);
                                        } else {
                                            Toast.fire({
                                                icon: "error",
                                                title: res.msg,
                                                timer: 5000
                                            });
                                        }
                                        $('#btnThueCron').html('<i class="fa fa-shopping-cart mr-2"></i>THUÊ NGAY').prop('disabled', false);
                                    }
                                });
                            });
 
                        function tongtien() {
        var server = $('#server').val();
        if(server != ''){
            $.ajax({
                url: '<?=BASE_URL('ajaxs/client/cron.php')?>',
                type: 'POST',
                data: {
                    action: "total",
                    server: server
                },
                success: function(result) {
                    $('#tongtien').html(result);
                }
            });
        }else{
            $('#tongtien').html();
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