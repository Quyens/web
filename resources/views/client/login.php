<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = 'ĐĂNG NHẬP | ' . $TN->site('title');
$body['header'] = '
';
$body['footer'] = '
';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
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
    <a class="btn btn-white w-100 text-dark border fw-bold d-flex align-items-center justify-content-center rounded-1 py-6 shadow-none" href="/loginfb" role="button">
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
                                                       <label for="username" class="form-label fw-bold">Tên tài khoản</label>
                                                        <input type="text" class="form-control py-6" id="username" aria-describedby="Nhập tài khoản">
                                                    </div>
                                                    <div class="mb-9">
                                                        <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                                        <input type="password" class="form-control py-6" id="password">
                                                    </div>
                                                    <div class="d-md-flex align-items-center justify-content-between mb-7 pb-1">
                                                        <div class="form-check mb-3 mb-md-0">
                                                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                                            <label class="form-check-label text-dark fs-3" for="flexCheckChecked">
                                                                Remeber this Device
                                                            </label>
                                                        </div>
 <a class="text-primary" href="<?=BASE_URL('client/recover');?>">Quên mật khẩu?</a>
                                                    </div>
                                                    <button type="button" id="btnLogin" class="btn btn-primary w-100 mb-7 rounded-pill">Đăng nhập</button>
                                                    <div class="d-flex align-items-center">
                                                        <p class="fs-3 mb-0 fw-medium">Bạn chưa có tài khoản?</p>
                                                        <a class="text-primary fw-bold ms-2 fs-3" href="<?=BASE_URL('client/register');?>">Đăng kí</a>
                                                    </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                    </div>
                </div>
 
                <!--<div class="flex justify-center items-center px-4 py-8 md:px-0 md:py-0" style="height: calc(100vh - 80px)">-->
                <!--    <div class="w-full max-w-sm">-->
                <!--        <form class="w-full border border-gray-400 shadow rounded bg-white py-4 px-6">-->
                <!--            <div class="text-gray-800 text-center text-2xl font-extrabold">-->
                <!--                ĐĂNG NHẬP TÀI KHOẢN-->
                <!--            </div>-->
                <!--            <div class="border-t border-gray-600 w-32 mx-auto mt-1"></div>-->
                <!--            <span>-->
                <!--                <div class="mt-4">-->
                <!--                    <label class="block text-gray-800 text-sm font-semibold mb-1">Tên tài khoản</label>-->
                <!--                    <input type="text" placeholder="Nhập tài khoản" id="username"-->
                <!--                        class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">-->
                <!--                    <span class="mt-1 flex items-center font-semibold tracking-wide text-blue-500 text-xs"></span>-->
                <!--                </div>-->
                <!--            </span>-->
 
                <!--            <span>-->
                <!--                <div class="my-2">-->
                <!--                    <label class="block text-gray-800 text-sm font-semibold mb-1">Mật khẩu</label>-->
                <!--                    <input autocomplete="" type="password" id="password" placeholder="Nhập mật khẩu"-->
                <!--                        class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">-->
                <!--                    <span class="mt-1 flex items-center font-semibold tracking-wide text-blue-500 text-xs"></span>-->
                <!--                </div>-->
                <!--            </span>-->
 
 
 
                <!--            <div class="mt-4 mb-2 flex justify-center flex-col">-->
                <!--                <button type="button" id="btnLogin"-->
                <!--                    class="focus:outline-none h-10 bg-blue-500 text-white flex items-center justify-center rounded w-full p-1 px-8 text-xl">-->
                <!--                    Đăng Nhập-->
                <!--                </button>-->
                <!--                <a href=""-->
                <!--                    class="mt-2 py-1 rounded border border-gray-400 bg-white text-gray-800 text-xl flex items-center justify-center relative"><i-->
                <!--                        class="absolute bx bxs-user-plus" style="left: 10px; top: 9px;"></i> Tạo Tài Khoản</a>-->
                <!--            </div>-->
                <!--        </form>-->
                <!--    </div>-->
                <!--</div>-->
                <!--</div>-->

                <script type="text/javascript">
                    $("#btnLogin").on("click", function() {
                        $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                            'disabled',
                            true);
                        $.ajax({
                            url: "<?=base_url('ajaxs/client/login.php');?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                username: $("#username").val(),
                                password: $("#password").val(),
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    Toast.fire({
                                        icon: "success",
                                        title: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?=BASE_URL('');?>';", 500);
                                } else {
                                    Toast.fire({
                                        icon: "error",
                                        title: respone.msg,
                                        timer: 5000
                                    });
                                }
                                $('#btnLogin').html('<i class="fas fa-sign-in-alt"></i> Đăng Nhập').prop('disabled',
                                    false);
                            },
                            error: function() {
                                cuteToast({
                                    type: "error",
                                    message: 'Không thể xử lý',
                                    timer: 5000
                                });
                                $('#btnLogin').html('<i class="fas fa-sign-in-alt"></i> Đăng Nhập').prop('disabled',
                                    false);
                            }
 
                        });
                    });
                </script>

<?php require_once __DIR__ . '/footer.php';?>