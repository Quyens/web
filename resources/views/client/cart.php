<?php
$title = 'GIỎ HÀNG | ' . $TN->site('title');
$body['header'] = '
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
';
$body['footer'] = '

';
require_once __DIR__ . '/../../../core/cart.php';
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
//CheckLogin();
$Cart = new Cart();
?>
<?php
if (isset($_GET['remove'])) {
        unset($_SESSION['cart'][$_GET['remove']]);
        // Ghi đè giá trị mới của $_SESSION['cart'] vào session
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        die('<script type="text/javascript">if(!alert("Xóa sản phẩm thành công!")){window.history.back().location.reload();}</script>');
}
if (isset($_GET['delete'])) {
unset($_SESSION['cart']);
session_regenerate_id(true);
die('<script type="text/javascript">if(!alert("Xóa giỏ hàng thành công!")){window.history.back().location.reload();}</script>');
}
?>

<div class="row">

 
                        <div class="card">
                      

                            <div class="card-body">
                         
                                <div class="border-bottom pb-7">
                                     

                                    <div class="row">
                 
                                        <div class="col-md-6 mb-7 mb-md-0">
                                    <?php if (count($_SESSION['cart']) == 0) { ?>
                                    <img src="https://i.imgur.com/IX8cYOt.png" class="img-fluid" alt=""> 
          <h4 class="py-1 font-bold text-md px-1 truncate text-center uppercase">GIỎ HÀNG RỖNG, ĐI MUA SẮM ĐI NÀO</h4> 
                                    <?php } ?>
                                       <?php if (isset($_SESSION['cart'])) {
foreach ($_SESSION['cart'] as $id => $item) {
?>
                                           <div class="col-sm-12">
                                            
                                               <div class="card">
                                                           
                                                    <div class="position-relative">
                                                        <img src="<?=$item['image'];?>" class="card-img-top" alt="lam-tilo">
                                                    </div>
                                                    <div class="card-body pt-3 p-4">
                                                        <h6 class="fs-4"> <?=$item['name'];?> </h6>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <ul class="list-unstyled d-flex align-items-center mb-0">
                                                                <li class="me-1">
                                                                    <div class="badge border border-danger text-danger">
                                                                        <?=number_format($item['price']);?>đ
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <a href="<?=BASE_URL('client/cart/remove/');?><?=$id;?>" class="badge bg-danger"> Xóa sản phẩm </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                       
                                                    </div>
                                                                     
                                                </div>
                                         
                                            </div>
                               <?php }} ?>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="shop-content ms-lg-2">
                                                <div class="border-top pt-4">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <h6 class="mb-0">TỔNG TIỀN THANH TOÁN:
                                                            <span id="total-amount" class="py-1 px-3 bg-primary text-white rounded">
                                                                <?php 
               $sum = 0;
               if(isset($_SESSION['cart']))
               {
                   foreach($_SESSION['cart'] as $val)
                   {
                       $sum = $sum + $val['price'];
                   }
                   echo number_format($sum);
               }
               
               ?>đ 
                                                            </span>
                                                        </h6>
                                                    </div>
                                                    <div class="d-sm-flex align-items-center gap-3 mb-4">
                                                                        <input id="token" type="hidden" value="<?=$getUser['token'];?>">
                                                        <a href="javascript:void(0)" id="paymentCart" class="btn btn-outline-primary w-100 fs-4 py-6 shadow-none fw-bold mb-3 mb-sm-0">THANH TOÁN</a>
                                                             <input id="total" type="hidden" value="<?=number_format($sum);?>">
                                                        <a href="<?=BASE_URL('client/cart/delete/');?>" class="btn btn-primary w-100 fs-4 py-6 shadow-none fw-bold">XÓA GIỎ HÀNG</a>
                                                    </div>
                                                     <div class="input-group mb-3">
                                                        <input type="text" id="discount_code" class="form-control" placeholder="Nhập mã giảm giá" aria-label="Nhập mã giảm giá">
                                                        <button class="btn btn-outline-secondary" type="button" id="applyDiscount">Áp dụng</button>
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
 
                             
                                   
 
                                $("#paymentCart").click(function() {
                                    var total = $('#total').val();
                                   
                                    cuteAlert({
                                        type: "question",
                                        title: "XÁC NHẬN THANH TOÁN ĐƠN HÀNG",
                                        message: "Bạn có chắc chắn muốn thanh toán đơn hàng với tổng thiệt hại là " + new Intl.NumberFormat().format(total) + " đ không?",
                                        confirmText: "Đồng Ý",
                                        cancelText: "Hủy"
                                    }).then((e) => {
                                        if (e) {
                                            $.ajax({
                                                url: '<?=BASE_URL('');?>/ajaxs/client/Carts.php',
                                                type: 'POST',
                                                dataType: "json",
                                                data: {
                                                    action: "pay",
                                                    token: $('#token').val(),
                                                   
                                                },
                                                success: function(res) {
                                                    if (res.status == '2') {
                                                        Toast.fire({
                                                            icon: "success",
                                                            title: res.msg,
                                                            timer: 5000
                                                        });
                                                        setTimeout(function() {
                                                            window.location = "<?=BASE_URL('');?>/client/cart"
                                                        }, 1000);
                                                    } else {
                                                        Toast.fire({
                                                            icon: "error",
                                                            title: res.msg,
                                                            timer: 5000
                                                        });
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(xhr.responseText);
                                                    Toast.fire({
                                                        icon: "error",
                                                        title: "Có lỗi xảy ra. Vui lòng thử lại sau.",
                                                        timer: 5000
                                                    });
                                                }
                                            });
                                        }
                                    });
                                });
                                
                               
                            </script>

<?php require_once __DIR__ . '/footer.php'; ?>