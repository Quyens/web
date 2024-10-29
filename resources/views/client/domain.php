<?php
$title = 'CHECK TÊN MIỀN | ' . $TN->site('title');
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
         <section class="pcoded-main-container">
                            <div class="pcoded-content">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10">MUA TÊN MIỀN</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">MUA TÊN MIỀN</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">MUA MIỀN</h4>
                                    <form>
                                        <div class="form-body">
                                          <div class="row">
                                              <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <b>Vui lòng check tên miền trước khi mua tại: <a href="https://inet.vn/" target="_blank">https://inet.vn/</a></b>
                                                        <p>Lưu Ý:<br>- Chúng tôi không hỗ trợ các miền tài xỉu phạm pháp nếu có duyệt bị khóa là do bạn <br>- Hàng miền bên mình là hàng xịn nên sẽ không lo sợ sẽ bị die<br>- Hỗ trợ gia hạn tên miền ( giá gia hạn sẽ cao hơn giá mua)<br>- Nếu miền duyệt lâu có thể ib tele: <a href="https://t.me/spwebsitee" target="_blank">https://t.me/spwebsitee</a></p>
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                            </a>
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="domain" class="form-label">TÊN MIỀN</label>
                                                        <input type="text" id="domain" placeholder="vd:cybernix" class="form-control">
                                                    </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="server1" class="form-label">NS1</label>
                                                        <input type="text" id="server1" placeholder="nameserver 1" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="server2" class="form-label">NS2</label>
                                                        <input type="text" id="server2" placeholder="nameserver 2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="loaimien" class="form-label">LOẠI MIỀN</label>
                                                        <select id="loaimien" onchange="tongtien()" class="form-select">
                                                           <option value="">Chọn loại miền</option>
                <?php foreach($TN->get_list("SELECT * FROM `tenmien` WHERE `status` = 'ON' ") as $row) {?>
                  <option value="<?=$row['id'];?>"><?=$row['name'];?> | <?=format_cash($row['rate']);?>đ</option>
                  <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="tongtien" class="form-label">THÀNH TIỀN</label>
                                                    <p class="text-slate-400 text-sm"><b class="text-red-500" id="tongtien">0</b><b class="text-red-500">đ</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="d-flex justify-content-end gap-6">
                                                <input id="token" type="hidden" value="<?=$getUser['token'];?>">
                                                <a href="javascript:;" id="btnBuyDomain" class="btn btn-success d-flex align-items-center">
                                                    <i class="fa fa-shopping-cart mr-2"></i> MUA NGAY
                                                </a>
                                                <button type="reset" class="btn bg-danger-subtle text-danger">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
 
                       
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">LỊCH SỬ MUA TÊN MIỀN</h4>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>MÃ ĐƠN HÀNG</th>
                                                    <th>TÊN MIỀN</th>
                                                    <th>NS1</th>
                                                    <th>NS2</th>
                                                    <th>TRẠNG THÁI</th>
                                                    <th>NGÀY MUA</th>
                                                    <th>NGÀY HẾT</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
 <?php $i=0; foreach ($TN->get_list("SELECT * FROM `ls_muamien` WHERE `username` = '" . $getUser['username'] . "' ORDER BY `id` DESC") as $row) {?>
                                     <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['magd'];?>                                    </td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['domain'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['server1'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['server2'];?></td>
                                    <td> <?= GetStatusmien($row['status']); ?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=date('d-m-Y H:i:s',$row['ngay_mua'])?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=date('d-m-Y',$row['ngay_het'])?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                    <a href="<?= BASE_URL('client/giahan-mien/'), $row['id'] ?>" class="btn btn-outline-primary"> <i class="fa fa-shopping-cart"></i> GIA HẠN </a>
                                    <a href="<?= BASE_URL('client/edit-mien/'), $row['id'] ?>" class="btn btn-outline-success mb"> <i class="fa fa-edit"></i> CHỈNH SỬA </a>
                                   </td> 
                                       
                                </tr>
                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="alert alert-info mt-3">
                                        <i class="bx bxs-mobile"></i> Dùng điện thoại, hãy vuốt bảng từ phải qua trái (<i class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                                    </div>
                                </div>
                           
                       
 </section>
                        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script type="text/javascript">
                            $(document).ready(function() {
                                $('#datatable').DataTable();
                            });
 
                            $("#btnBuyDomain").click(function() {
                                $('#btnBuyDomain').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                                $.ajax({
                                    url: '/ajaxs/client/muamien.php',
                                    type: 'POST',
                                    dataType: "json",
                                    data: {
                                        action: "buy",
                                        loaimien: $('#loaimien').val(),
                                        domain: $('#domain').val(),
                                        server1: $('#server1').val(),
                                        server2: $('#server2').val(),
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
                                                window.location = "/client/domain"
                                            }, 1000);
                                        } else {
                                            Toast.fire({
                                                icon: "error",
                                                title: res.msg,
                                                timer: 5000
                                            });
                                        }
                                        $('#btnBuyDomain').html('<i class="fa fa-shopping-cart mr-2"></i>MUA NGAY').prop('disabled', false);
                                    }
                                });
                            });
 
                            function tongtien() {
                                var loaimien = $('#loaimien').val();
                                if (loaimien != '') {
                                    $.ajax({
                                        url: '/ajaxs/client/muamien.php',
                                        type: 'POST',
                                        data: {
                                            action: "total",
                                            loaimien: loaimien
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