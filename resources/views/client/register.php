<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = 'ĐĂNG KÝ | ' . $TN->site('title');
$body['header'] = '

';
$body['footer'] = '

';
require_once(__DIR__ . '/header.php');
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
                                                <h2 class="mb-6 fs-8 fw-bolder">ĐĂNG NHẬP TÀI KHOẢN</h2>
                                                <!-- Thêm link tới Font Awesome trong phần <head> của trang HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
<div class="d-flex align-items-center gap-3">
    <a class="btn btn-white w-100 text-dark border fw-bold d-flex align-items-center justify-content-center rounded-1 py-6 shadow-none" href="/login/google" role="button">
        <img src="https://dichvulight.vn/gg.svg" alt="spike-img" class="img-fluid me-2" width="24" height="24">
        <span class="d-none d-sm-block me-1 flex-shrink-0">Login</span>Google
        <i class="fas fa-check-circle text-success ms-2"></i> <!-- Icon hoạt động -->
    </a>
    <a class="btn btn-white w-100 text-dark border fw-bold d-flex align-items-center justify-content-center rounded-1 py-6 shadow-none" href="javascript:void(0)" role="button">
        <img src="https://dichvulight.vn/facebook.svg" alt="spike-img" class="img-fluid me-2" width="24" height="24">
        <span class="d-none d-sm-block me-1 flex-shrink-0">Login</span>FB
        <i class="fas fa-tools text-warning ms-2"></i> <!-- Icon bảo trì -->
    </a>
</div>
                                                <div class="position-relative text-center my-7">
                                                    <p class="mb-0 fs-3 px-3 d-inline-block bg-white z-1 position-relative">or sign in with</p>
                                                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                                </div>
                                                <form>
                                                    <div class="mb-7">
                                                        <label for="email" class="form-label fw-bold">Email</label>
                                                        <input type="text" class="form-control py-6" id="email" aria-describedby="Nhập email">
                                                    </div>
                                                    <div class="mb-7">
                                                        <label for="username" class="form-label fw-bold">Tên tài khoản</label>
                                                        <input type="text" class="form-control py-6" id="username" aria-describedby="Nhập tài khoản">
                                                    </div>
                                                    <div class="mb-7">
                                                        <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                                        <input type="password" class="form-control py-6" id="password">
                                                    </div>
                                                    <div class="mb-9">
                                                        <label for="repassword" class="form-label fw-bold">Nhập lại mật khẩu</label>
                                                        <input type="password" class="form-control py-6" id="repassword">
                                                    </div>
                                                    <button type="button" id="btnRegister" class="btn btn-primary w-100 mb-7 rounded-pill">Đăng kí</button>
                                                    <div class="d-flex align-items-center">
                                                        <p class="fs-3 mb-0 fw-medium">Bạn đã có tài khoản?</p>
                                                        <a class="text-primary fw-bold ms-2 fs-3" href="<?= BASE_URL('client/login'); ?>">Đăng nhập</a>
                                                    </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                    </div>
                </div>
 
 <script type="text/javascript">
                    $("#btnRegister").on("click", function() {
                        $('#btnRegister').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
                            true);
                        $.ajax({
                            url: "<?= BASE_URL('ajaxs/client/register.php'); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                username: $("#username").val(),
                                email: $("#email").val(),
                                password: $("#password").val(),
                                repassword: $("#repassword").val(),
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    Toast.fire({
                                        icon: "success",
                                        title: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?=BASE_URL('');?>';", 100);
                                } else {
                                    Toast.fire({
                                        icon: "error",
                                        title: respone.msg,
                                        timer: 5000
                                    });
                                }
                                $('#btnRegister').html('Đăng Ký').prop('disabled', false);
                            },
                            error: function() {
                                Toast.fire({
                                    icon: "error",
                                    title: 'Không thể xử lý',
                                    timer: 5000
                                });
                                $('#btnRegister').html('Đăng Ký').prop('disabled', false);
                            }
 
                        });
                    });
                </script>


<?php require_once __DIR__ . '/footer.php'; ?>