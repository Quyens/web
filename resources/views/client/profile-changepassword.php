<?php
$title = 'THAY ĐỔI MẬT KHẨU | ' . $TN->site('title');
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
                                                    <h5 class="m-b-10">THAY ĐỔI MẬT KHẨU</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="#!">THAY ĐỔI MẬT KHẨU</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full card max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
                                    <div class="grid grid-cols-8 gap-4">
                                        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
                                            <div class="v-bg w-full mb-5">
 
                                               <div class="v-table-content">
                                                    <div class="py-3 pt-5">
                                                        <form accept-charset="UTF-8" class="form-charge">
                                                            <input id="old_password" type="password" placeholder="Mật khẩu cũ" required="required" class="form-control mb-3" />
                                                            <input type="hidden" class="form-control mb-3" id="token" value="<?=$getUser['token'];?>" readonly>
                                                            <input id="new_password" type="password" placeholder="Nhập mật khẩu mới" required="required" class="form-control mb-3" />
                                                            <input id="confirm_new_password" type="password" placeholder="Nhập lại mật khẩu mới" required="required" class="form-control mb-3" />
                                                            <button type="button" id="changePass" class="btn btn-primary" data-loading-text="<box-icon name='loader'></box-icon>">
                                                                ĐỔI MẬT KHẨU
                                                            </button>
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
                                $("#changePass").on("click", function() {
                                    $('#changePass').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                                        'disabled',
                                        true);
                                    $.ajax({
                                        url: "<?=BASE_URL('ajaxs/client/changePassword.php');?>",
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
                                                setTimeout("location.href = '<?=BASE_URL('client/profile-changepassword');?>';", 100);
                                            } else {
                                                Toast.fire({
                                                    icon: "error",
                                                    title: respone.msg,
                                                    timer: 5000
                                                });
                                            }
                                            $('#changePass').html('ĐỔI MẬT KHẨU').prop('disabled',
                                                false);
                                        },
                                        error: function() {
                                            Toast.fire({
                                                icon: "error",
                                                title: 'Không thể xử lý',
                                                timer: 5000
                                            });
                                            $('#changePass').html('ĐỔI MẬT KHẨU').prop('disabled',
                                                false);
                                        }
 
                                    });
                                });
                            </script>

<?php require_once __DIR__ . '/footer.php'; ?>