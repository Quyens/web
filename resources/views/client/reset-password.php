<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = "ĐẶT LẠI MẬT KHẨU";
$body['header'] = '
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
';
$body['footer'] = '

';
require_once __DIR__ . '/header.php';
require_once(__DIR__ . '/nav.php');
?>

<div class="row">
 
 
                        <body>
 
                            <div class="  position-relative w-100">
                               <div class="auth-login-wrapper card mb-0 container position-relative z-1 h-100 mh-n100" data-simplebar>
                                    <div class="card-body">

                                        <div class="row align-items-center justify-content-around pt-6 pb-5">
                                            <div class="col-lg-6 col-xl-5 d-none d-lg-block">
                                                <div class="text-center text-lg-start">
                                                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/backgrounds/login-security.png" alt="spike-img" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-5">
                                                <h2 class="mb-6 fs-8 fw-bolder">THAY ĐỔI MẬT KHẨU</h2>
 
 
                                                <div class="position-relative text-center my-7">
                                                   
                                                </div>
                                                <form>
                                                    <div class="mb-9">
                                                       <label for="otp" class="form-label fw-bold">Mã OTP</label>
                                                        <input type="text" class="form-control py-6" id="otp" aria-describedby="Nhập tài khoản">
                                                    </div>
                                                    <div class="mb-9">
                                                        <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                                        <input type="password" class="form-control py-6" id="password">
                                                    </div>
                                                    <div class="mb-7">
                                                        <label for="password" class="form-label fw-bold">Xác Nhận Mật khẩu</label>
                                                        <input type="password" class="form-control py-6" id="repassword">
                                                    </div>
                                                   <input id="token" type="hidden" value="<?=$getUser['token'];?>">
                                                    <button type="button" id="btnRP" class="btn btn-primary w-100 mb-7 rounded-pill">XÁC NHẬN</button>
                                                   
                                               </form>
                                            </div>
                                        </div>
                                    </div>
 
                                </div>
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
 
                            $("#btnRP").click(function() {
                                $('#btnRP').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
                                $.ajax({
                url: "<?=BASE_URL('ajaxs/client/resetPassword.php');?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "resetPassword",
                    otp: $("#otp").val(),
                    password: $("#password").val(),
                    repassword: $("#repassword").val()
                },
                                    success: function(res) {
                                        if (res.status == 'success') {
                                            showToast("success", res.msg);
                                            setTimeout(function() {
                                                window.location = "<?=BASE_URL('client/login');?>"
                                            }, 1000);
                                        } else {
                                            showToast("error", res.msg);
                                        }
                                        $('#btnRP').html('XÁC NHẬN').prop('disabled', false);
                                    }
                                });
                            });
 
                           
                        </script>


<?php require_once __DIR__ . '/footer.php';?>