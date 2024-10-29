<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = 'QUÊN MẬT KHẨU | ' . $TN->site('title');
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
                                                <h2 class="mb-6 fs-8 fw-bolder">KHÔI PHỤC TÀI KHOẢN</h2>
 
 
                                                <div class="col-lg-6 col-xl-5">
                                                    <p class="text-dark fs-4 mb-7"> Vui lòng nhập địa chỉ email<br> được liên kết với tài khoản của bạn và chúng tôi sẽ gửi cho bạn một mã OTP qua email để đặt lại mật khẩu của bạn. </p>
                                                </div>
                                              
                               
                                                <form>
                                                    <div class="mb-7">
                                                       <label for="email" class="form-label fw-bold">Địa Chỉ Email</label>
                                                        <input type="text" class="form-control py-6" id="email" aria-describedby="Nhập tài khoản">
                                                    </div>
                                                  

                                                    </div>
                                                    <div class="col-lg-6 col-xl-5">
                                                    <button type="button" id="btnGetOTP" class="btn btn-primary w-100 mb-3 rounded-pill">Xác Nhận</button>
                                                    <a href="<?= BASE_URL('client/login'); ?>" class="btn bg-primary-subtle text-primary w-100 rounded-pill">Quay Lại</a>
                                                   
                                               </form>
                                            </div>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                    </div>
                </div>

<script type="text/javascript">
    $(document).ready(function() {
                                $('#datatable').DataTable();
                            });
 
                            $("#btnGetOTP").click(function() {
                                $('#btnGetOTP').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
        $.ajax({
            url: "<?= BASE_URL('ajaxs/client/resetPassword.php'); ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                action: "forgotPassword",
                email: $("#email").val()
            },
            success: function(res) {
                                        if (res.status == 'success') {
                                            Toast.fire({
                                                icon: "success",
                                                title: res.msg,
                                                timer: 5000
                                            });
                    setTimeout("location.href = '<?= BASE_URL('client/reset-password'); ?>';", 1000);
           } else {
                                            Toast.fire({
                                                icon: "error",
                                                title: res.msg,
                                                timer: 5000
                                            });
                }
                $('#btnGetOTP').html('XÁC THỰC').prop('disabled', false);
            },
            error: function() {
                Toast.fire({
                    type: "error",
                    message: 'Không thể xử lý',
                    timer: 5000
                });
                $('#btnGetOTP').html('XÁC THỰC').prop('disabled', false);
            }
        });
    });
    
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