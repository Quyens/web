<?php
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
?>

     <div class="row">
                        <div class="card bg-primary-gt text-white overflow-hidden shadow-none">
                            <div class="card-body">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-sm-6">
                                        <h5 class="fw-semibold mb-9 fs-5 text-white">Điều khoản của chúng tôi!</h5>
                                        <p>
                                            <font color="#000000">- Không hỗ trợ những code free.<br>- Không bảo kê những code thanh lí.<br>- Không bố thí code nên đừng xin. <br>- Không phải thần thánh mà cái gì cũng làm được. <br>- Không buôn bán những code có tính phạm pháp như tx,clmm,clzalpay,fake bill.<br>- Không bảo kê cho bất kì website nào. <br>- Những code nào được bao bug key chúng tôi sẽ nói rõ nếu không bảo kê thì coi như chúng tôi không ghi gì.<br>VUI LÒNG ĐỌC ĐIỀU KHOẢN TRƯỚC KHI SỬ DỤNG DỊCH VỤ CỦA DICHVULIGHT XIN CẢM ƠN.</font>
                                        </p>
                                        <p><br></p>
                                        <a href="/">
                                            <button type="button" class="btn btn-danger">Nhấn vào đây để tiếp tục</button>
                                        </a>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="position-relative mb-n7 text-end">
                                            <img src="https://i.imgur.com/YDZr6gD.png" alt="spike-img" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-info-subtle overflow-hidden shadow-none">
                            <div class="card-body py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-sm-6">
                                        <h5 class="fw-semibold mb-9 fs-5">Support web</h5>
                                        <p class="mb-9">
                                            Zalo <?= $TN->site('link_zalo') ?>
                                       </p>
                                        <a href="<?= $TN->site('link_zalo') ?>">
                                           <button class="btn btn-info">Support</button></a>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="position-relative mb-n5 text-center">
                                            <img src="https://i.imgur.com/2xE0BQg.png" alt="spike-img" class="img-fluid" width="180" height="230">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<?php require_once __DIR__ . '/footer.php'; ?>