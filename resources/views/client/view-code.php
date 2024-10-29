<?php
if(isset($_GET['id']))
{
    $row = $TN->get_row(" SELECT * FROM `tbl_list_code` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
   
    {
        die('<script type="text/javascript">if(!alert("Không tồn tại!")){window.history.back().location.reload();}</script>');
    }
    $TN->cong("tbl_list_code", "view", 1, " `id` = '".$row['id']."' ");
   
}
else
{
    die('<script type="text/javascript">if(!alert("Không tồn tại!")){window.history.back().location.reload();}</script>');
}
$title = strtoupper($row['name']) . ' | ' . $TN->site('title');
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
                        <style>
                            img {
                                max-width: 100%;
                                height: auto;
                            }
 
                            .custom-image {
                                width: 490px;
                                height: auto;
                                max-width: 100%;
                            }
 
                            @media (max-width: 768px) {
                                .custom-image {
                                    width: 300px;
                                    height: auto;
                                }
                            }
                        </style>
 
                        <div class="card">
                            <div class="card-body">
                               <div class="border-bottom pb-7">
                                    <div class="row">
                                        <div class="col-md-6 mb-7 mb-md-0">
                                            <div id="sync3" class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage" style="width: 100%;">
                                                        <div class="owl-item cloned" style="width: 100%;">
                                                            <div class="rounded-4 overflow-hidden">
                                                                <img src="<?=$row['images'];?>" class="card-img-top custom-image" alt="Code roblox vip">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="shop-content ms-lg-2">
                                                <div class="border-top pt-4">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <h6 class="mb-0">MÃ SỐ:
                                                            <span class="py-1 px-3 bg-primary text-white rounded"> #<?=$row['id'];?> </span>
                                                        </h6>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-4">
                                                        <h6 class="mb-0">MÃ NGUỒN:
                                                            <?=$row['name'];?> </h6>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-4">
                                                        <h6 class="mb-0">GIÁ BÁN:
                                                            <b class="text-info"> <?=format_cash($row['price']);?>đ </b>
                                                        </h6>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-4">
                                                        <h6 class="mb-0">NGƯỜI BÁN:
                                                            ADMIN
                                                        </h6>
                                                    </div>
                                                    
                                                    <div class="d-flex align-items-center mb-4">
                                                        <h6 class="mb-0">CẬP NHẬT:
                                                            <?=$row['update_date'];?> </h6>
                                                    </div>
                                                    <div class="d-sm-flex align-items-center gap-3 mb-4">
                                                        <input type="hidden" value="<?=$getUser['token']?>" id="token">
                                                        <a href="javascript:;" id="AddCart" class="btn btn-outline-primary w-100 fs-4 py-6 shadow-none fw-bold mb-3 mb-sm-0">THÊM GIỎ HÀNG</a>
                                                       <input type="hidden" value="<?=$row['id']?>" id="id_product">
                                                        <a href="<?=$row['link_demo'];?>" class="btn btn-primary w-100 fs-4 py-6 shadow-none fw-bold">XEM DEMO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="card">
                                <div class="v-account-detail p-2 md:px-0 mt-4">
                                    <div class="v-account-detail-1" id="taikhoan">
                                        <div class="mb-10">
                                            <p> <?=$row['intro'];?> </p>
                                        </div>
                                        <div class="mb-10">
                                            <img src="<?=$row['list_images'];?>" width="1200" class="border border-gray-400 mb-2 w-full lazyLoad lazy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    <script>
                            $(document).ready(function() {
                                $('#AddCart').click(function() {
                                    $('#AddCart').html('Đang Xử Lý...').prop('disabled', true);
                                    var formData = {
                                        action: 'add',
                                        id_product: $('#id_product').val()
                                    };
                                    $.post("/ajaxs/client/Carts.php", formData,
                                        function(data) {
                                            if (data.status == '2') {
                                                Toast.fire({
                                                    icon: "success",
                                                    title: data.msg,
                                                    timer: 5000
                                                });
                                                $('#AddCart').html('Thêm Giỏ Hàng').prop('disabled', false);
                                            } else {
                                                var productID = $('#id_product').val();
                                                setTimeout(function() {
                                                    location.href = "/client/view-code/" + productID
                                                }, 1000);
                                                Toast.fire({
                                                    icon: "error",
                                                    title: data.msg,
                                                    timer: 5000
                                                });
                                                $('#AddCart').html('Thêm Giỏ Hàng').prop('disabled', false);
                                            }
                                        }, "json");
                                });
                            });
                        </script>
 
                        <script>
                            function handleColorTheme(e) {
                                document.documentElement.setAttribute("data-color-theme", e);
                            }
                        </script>

<?php require_once __DIR__ . '/footer.php'; ?>