<?php
$title = 'THÔNG TIN CÁ NHÂN | ' . $TN->site('title');
$body['header'] = '

';
$body['footer'] = '

';
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
CheckLogin();
?>

<div class="row">
                        <section class="pcoded-main-container">
                            <div class="pcoded-content">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10">THÔNG TIN CÁ NHÂN</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">THÔNG TIN CÁ NHÂN</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-hidden">
                                    <div class="card-body p-0">
                                        <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/backgrounds/profilebg.jpg" alt="spike-img" class="img-fluid">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 order-lg-1 order-2">
                                            </div>
                                            <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                                               <div class="mt-n5">
                                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                                        <div class="d-flex align-items-center justify-content-center round-110">
                                                            <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                                                <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg" alt="spike-img" class="w-100 h-100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5 class="mb-0"> <?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?>
 </h5>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 order-last">
                                                <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 mx-4 pe-xxl-4 gap-3">
                                                    <li>
                                                        <a href="/">
                                                            <button class="btn btn-primary text-nowrap">Về Trang Chủ</button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
 
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Thông tin tài khoản</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Tên đăng nhập</label>
                                                                    <input type="text" class="form-control" value="<?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?>" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Số dư</label>
                                                                    <input type="text" class="form-control" value="<?=format_cash($getUser['money']);?>" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Tổng Nạp</label>
                                                                    <input type="text" class="form-control" value="0" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Ngày tham gia</label>
                                                                    <input type="text" class="form-control" value="  <?=$getUser['create_date'];?>" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Nhóm tài khoản</label>
                                                                    <input type="text" class="form-control" value="<?php 
            if($getUser['level'] == '1'){
                echo 'QUẢN TRỊ VIÊN';
            } else {
                echo 'THÀNH VIÊN';
            }
        ?>" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-3">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Cấp bậc</label>
                                                                    <input type="text" class="form-control" value="<?php 
            if($getUser['level'] == '1'){
                echo 'Thách Đấu Vip #luongduckiet';
            } else {
                echo 'Đồng';
            }
        ?>" disabled="">
                                                                </div>
                                                            </div>
                                                           <div class="col-lg-4 mb-3">
                                                                <div class="form-group mb-3">
                                                                    <input type="hidden" class="form-control mb-3" id="token" value="<?=$getUser['token'];?>" readonly>
                                                                    <label for="name" class="form-label">Địa chỉ Email</label>
                                                                    <input type="email" id="email" class="form-control" value="<?=$getUser['email'];?>">
                                                                </div>
 
                                                                <div class="col-md-4">
                                                                    <button type="button" id="changeEmail" class="btn btn-primary" data-loading-text="<box-icon name='loader'></box-icon>">
                                                                        ĐỔI
                                                                    </button>
                                                                </div>
                                                            </div>
 
 
 
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
 
 
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                    </div>
                    </section>
 


                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script type="text/javascript">
                        $("#changePass").on("click", function() {
                            $('#changePass').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                                'disabled',
                                true);
                            $.ajax({
                                url: "<?=BASE_URL('');?>ajaxs/client/changePassword.php",
                                method: "POST",
                                dataType: "JSON",
                                data: {
                                    token: $("#token").val(),
                                    action: "ChangePassword",
                                    password: $("#old_password").val(),
                                    newpassword: $("#new_password").val(),
                                    renewpassword: $("#confirm_new_password").val()
                                },
                                success: function(respone) {
                                    if (respone.status == 'success') {
                                        Toast.fire({
                                            icon: "success",
                                            title: respone.msg,
                                            timer: 5000
                                        });
                                        setTimeout("location.href = '<?=BASE_URL('');?>/client/user-profile';", 100);
                                    } else {
                                        Toast.fire({
                                            icon: "error",
                                            title: respone.msg,
                                            timer: 5000
                                        });
                                    }
                                    $('#changePass').html('<i class="fas fa-lock"></i> THAY ĐỔI').prop('disabled',
                                        false);
                                },
                                error: function() {
                                    Toast.fire({
                                        icon: "error",
                                        title: 'Không thể xử lý',
                                        timer: 5000
                                    });
                                    $('#changePass').html('<i class="fas fa-lock"></i> THAY ĐỔI').prop('disabled',
                                        false);
                                }
 
                            });
                        });
 
                        $("#changeEmail").on("click", function() {
                            $('#changeEmail').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                                'disabled',
                                true);
                            $.ajax({
                                url: "<?=BASE_URL('');?>/ajaxs/client/changeInfo.php",
                                method: "POST",
                                dataType: "JSON",
                                data: {
                                    action: "ChangeEmail",
                                    token: $("#token").val(),
                                    email: $("#email").val()
                                },
                                success: function(respone) {
                                    if (respone.status == 'success') {
                                        Toast.fire({
                                            icon: "success",
                                            title: respone.msg,
                                            timer: 5000
                                        });
                                        setTimeout("location.href = '<?=BASE_URL('');?>/client/user-profile';", 100);
                                    } else {
                                        Toast.fire({
                                            icon: "error",
                                            title: respone.msg,
                                            timer: 5000
                                        });
                                    }
                                    $('#changeEmail').html('<i class="fas fa-sync"></i> THAY ĐỔI').prop('disabled',
                                        false);
                                },
                                error: function() {
                                    Toast.fire({
                                        icon: "error",
                                        title: 'Không thể xử lý',
                                        timer: 5000
                                    });
                                    $('#changeEmail').html('<i class="fas fa-sync"></i> THAY ĐỔI').prop('disabled',
                                        false);
                                }
 
                            });
                        });
 
                        $("#changeIdTelegram").on("click", function() {
                            $('#changeIdTelegram').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                                'disabled',
                                true);
                            $.ajax({
                                url: "<?=BASE_URL('');?>/ajaxs/client/changeInfo.php",
                                method: "POST",
                                dataType: "JSON",
                                data: {
                                    action: "ChangeIdTelegram",
                                    token: $("#token").val(),
                                    id_telegram: $("#id_telegram").val()
                                },
                                success: function(respone) {
                                    if (respone.status == 'success') {
                                        Toast.fire({
                                            icon: "success",
                                            title: respone.msg,
                                            timer: 5000
                                        });
                                        setTimeout("location.href = '<?=BASE_URL('');?>/client/user-profile';", 100);
                                    } else {
                                        Toast.fire({
                                            icon: "error",
                                            title: respone.msg,
                                            timer: 5000
                                        });
                                    }
                                    $('#changeIdTelegram').html('<i class="fas fa-sync"></i> THAY ĐỔI').prop('disabled',
                                        false);
                                },
                                error: function() {
                                    Toast.fire({
                                        icon: "error",
                                        title: 'Không thể xử lý',
                                        timer: 5000
                                    });
                                    $('#changeIdTelegram').html('<i class="fas fa-sync"></i> THAY ĐỔI').prop('disabled',
                                        false);
                                }
 
                            });
                        });
                    </script>

<?php require_once __DIR__ . '/footer.php'; ?>