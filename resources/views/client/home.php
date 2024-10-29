<?php
$title = 'TRANG CHỦ | ' . $TN->site('title');

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

<?php
$sourceCodes = $TN->get_list("SELECT * FROM `tbl_list_code` WHERE `status` = '1' ORDER BY id DESC");
$perPage = 16; 
$totalItems = count($sourceCodes);
$totalPages = ceil($totalItems / $perPage);


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    $page = 1;
} elseif ($page > $totalPages) {
    $page = $totalPages;
}

$limit = $perPage;
$offset = ($page - 1) * $perPage;
$sql = "SELECT * FROM `tbl_list_code` WHERE `status` = '1' ORDER BY id DESC LIMIT $limit OFFSET  $offset";
$currentPageCodes = $TN->get_list($sql);

if ($page > $totalPages) {
    echo '<div class="mt-3 md:mt-6 w-full flex justify-center items-center">';
    echo '<center>';
    echo '<p class="text-red-500 font-semibold">Trang không tồn tại!</p>';
    echo '</center>';
    echo '</div>';
    
    header("Location: errors/404.php");
     exit;
}
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$totalPages = ceil($totalItems / $perPage);


if ($page < 1 || $page > $totalPages) {
    echo '<div class="mt-3 md:mt-6 w-full flex justify-center items-center">';
    echo '<center>';
    echo '<p class="text-red-500 font-semibold">Không tìm thấy trang!</p>';
    echo '</center>';
    echo '</div>';
    return;
}


$limit = $perPage;
$offset = ($page - 1) * $perPage;
$sql = "SELECT * FROM `tbl_list_code` WHERE `status` = '1' ORDER BY id DESC LIMIT $limit OFFSET  $offset";
$currentPageCodes = $TN->get_list($sql);
?>
<?php
// Tính phần trăm chiết khấu

if (isset($row['price_goc'], $row['price']) && $row['price_goc'] > 0 && $row['price'] > 0 && $row['price'] < $row['price_goc']) {
    $discount_percentage = round((($row['price_goc'] - $row['price']) / $row['price_goc']) * 100);
} else {
    $discount_percentage = 0;
}
?>
   <div class="row"> <style>
    .section-header {
        text-align: center;
        margin: 20px 0;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
 
    .section-title {
        font-size: 24px;
        font-weight: bold;
        color: #000;
    }
 
    .section-title i {
        margin: 0 5px;
    }
 
    .section-divider {
        width: 60px;
        height: 2px;
        background-color: #000;
        margin: 10px auto;
    }
 
    .feature-card {
        background-color: #f8f9fa;
        padding: 15px;
       border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
 
    .feature-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
 
   .feature-content .content-text {
        flex: 1;
        margin-right: 10px;
    }
 
    .feature-content .badge {
       background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>

<div class="container mx-auto">
    <div class="cursor-pointer mb-6 shadow-lg-lg">
        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden w-full rounded-lg sm:h-auto sm:object-contain lg:h-[360px] lg:object-fill">
            <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);" aria-live="off">
                <div class="swiper-slide" width="100%" role="group">
                    <img src="https://i.imgur.com/ejf92iA.png" class="w-full rounded-lg sm:h-auto sm:object-contain lg:h-[360px] lg:object-fill" alt="image" width="100%" style="border-radius: 20px;">
                </div>
            </div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var mySwiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    </script>
    <style>
        #loading {
            display: none;
            height: 50px;
           text-align: center;
        }
        .loading-icon {
           display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #ccc;
            border-radius: 50%;
            border-top-color: #333;
            animation: spin 1s ease infinite;
            margin: 15px auto;
        }
 
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
              .section-header {
           text-align: center;
            margin: 20px 0;
            background-color: #fff; /* White background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
        }
 
        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #000;
        }
 
        .section-title i {
            margin: 0 5px;
        }
 
        .section-divider {
            width: 60px;
            height: 2px;
            background-color: #000;
            margin: 10px auto;
        }
        .section-header {
    text-align: center;
    margin: 20px 0;
}
 
.section-title {
    font-size: 24px;
    font-weight: bold;
    color: #000;
}
 
.section-title i {
    margin: 0 5px;
}
 
.section-divider {
    width: 60px;
    height: 2px;
    background-color: #000;
    margin: 10px auto;
}
      .section-header {
            text-align: center;
            margin: 20px 0;
            background-color: #fff; /* White background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
        }
 
        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #000;
        }
 
        .section-title i {
            margin: 0 5px;
        }
 
        .section-divider {
            width: 60px;
            height: 2px;
            background-color: #000;
            margin: 10px auto;
        }
    </style>
    <style>
        .badge {
            padding: 5px 10px;
            display: inline-block;
            border-radius: 5px;
            font-size: 14px;
        }
        .border-danger {
            border-color: red;
        }
        .text-danger {
            color: red;
        }
        .price-del {
            text-decoration: line-through;
            margin-right: 10px;
            color: #000;
        }
        .price-current {
            color: #FF5722;
        }
    </style>
   <div class="section-header">
        <div class="section-title">
            <h3><i class="fa fa-code"></i> MÃ NGUỒN CỦA TÔI</h3>
        </div>
        <div class="section-divider"></div>
    </div>
    <div class="row">
      <?php foreach($currentPageCodes as $row) { ?>
         <?php
         // Tính phần trăm chiết khấu
           if ($row['price_goc'] > 0 && $row['price'] > 0 && $row['price'] < $row['price_goc']) {
    $discount_percentage = round((($row['price_goc'] - $row['price']) / $row['price_goc']) * 100);
           } else {
    $discount_percentage = 0;
}
?>    
               <div class="col-sm-6 col-xl-4">
                <div class="card" style="border: 1.5px solid #f22b07;">
                    <div class="position-relative">
                    <?php if ($discount_percentage > 0): ?>
                <span class="flash-sale-02">Flash Sale <?= $discount_percentage; ?>% </span>
            <?php endif; ?>
                                                <a href="<?=BASE_URL('client/view-code/');?><?=$row['id']?>">
                            <img src="<?=$row['images'];?>" class="card-img-top custom-image" alt="dichvureat">
                        </a>
                        <div class="ant-ribbon ant-ribbon-placement-end ant-ribbon-color-black css-eq3tly">
                            <span class="ant-ribbon-text">Mã: <?=$row['id'];?> </span>
                            <div class="ant-ribbon-corner"></div>
                        </div>
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fs-4" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"> <?=$row['name'];?> </h6>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h5 class="fs-2 mb-0">Lượt xem: <?= number_format($row['view'], 0, '', '.'); ?>
 </h5>
                                <h5 class="fs-2 mb-0">Lượt mua: <?= number_format($row['sold'], 0, '', '.'); ?>
 </h5>
                            </div>
                            <div class="badge border border-danger text-danger">
        <?php if ($row['price_goc'] > 0): ?>
            <span class="price-del text-danger"><?= format_cash($row['price_goc']); ?> ₫</span>
        <?php endif; ?>
        <?php if ($row['price'] == 0): ?>
        <span class="text-success">Free</span>
        <?php else: ?>
        <span class="price-current text-danger"><?= format_cash($row['price']); ?> ₫</span>
        <?php endif; ?>
    </div>

                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="<?=BASE_URL('client/view-code/');?><?=$row['id']?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
                   <?php }?>
        </div>
<div class="mt-3 md:mt-6 w-full flex justify-center items-center">
    <center>
        <nav class="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($totalPages > 1) { ?>
                <?php if ($page > 1) { ?>
                  
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <?php if ($i === $page) { ?>
                        <li class="page-item">
                            <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                    <?php } else if ($i <= 4 || $i > $totalPages - 4 || abs($i - $page) <= 1) { ?>
                        <li class="page-item">
                            <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                    <?php } else if (abs($i - $page) === 2) { ?>
                        <li class="page-item">
                            <span>...</span>
                        </li>
                    <?php } ?>
                <?php } ?>

                <?php if ($page < $totalPages) { ?>
                    <li class="page-item">
                            <a class="page-link link" href="?page=<?php echo $totalPages; ?>" aria-label="Last">
                                <span aria-hidden="true">
                                    <i class="ti ti-chevrons-right fs-4"></i>
                                </span>
                            </a>
                        </li>
                <?php } ?>
            <?php } ?>
          </ul>
        </nav>
    </center>
</div>
<div class="mt-3 md:mt-6 w-full flex justify-center items-center">
    <div class="d-flex justify-content-center align-items-center">
        <label for="inputPage" class="mr-2">Nhập trang:</label>
        <input type="number" id="inputPage" min="1" max="<?php echo $totalPages; ?>" class="form-control w-auto text-center">
        <button onclick="timtrang()" class="btn btn-primary ml-2">Go</button>
    </div>
</div>
<script>
    function timtrang() {
        var inputPage = document.getElementById("inputPage").value;
        if (inputPage > 0 && inputPage <= <?php echo $totalPages; ?>) {
            window.location.href = "?page=" + inputPage;
        } else {
            alert("Trang không tồn tại!");
        }
    }
</script>
<div class="section-header">
    <div class="section-title">
    <h2 class="mb-4 mb-sm-0 card-title text-center">
        <i class="fa fa-shopping-basket"></i> MÃ NGUỒN ĐÃ MUA <i class="fa fa-shopping-basket"></i>
        </h2>
    </div>
    <div class="bg-dark mx-auto" style="width: 150px; height: 2.5px; margin-top: 10px;"></div>
</div>
        <div style="height: 350px; overflow-x: hidden; overflow-y: auto;">
        <?php
                                    $i = 0;
                                    foreach($TN->get_list(" SELECT * FROM `tbl_his_code` ORDER BY id DESC ") as $row){
                                    ?>
            <div class="feature-card"><div class="feature-content d-flex justify-content-between align-items-start"><div class="content-text"><b style="color: green;">****<?= substr(getUser($row['user_id'], 'username'), -3, 3);?> </b> mua thành công <b style="color: red;">MÃ NGUỒN</b> <b> <?=getCode($row['product_id'], 'name');?> </b> với giá <b style="color: blue;"> <?=format_cash($row['price']);?> VNĐ</b></div><span class="badge bg-primary"><strong> <?=check_s($row['time'])?> </td> </strong></span></div></div> <?php }?>      </div>
    </div>
</div>

  <?php if($TN->site('status_noti')==1):?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Thông báo:</h4>
            </div>
            <div class="modal-body">
                    <div style="text-align: center;"><span style="white-space-collapse: preserve; font-size: 1rem;"><?=$TN->site('notification');?></span></div>
                <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="hideModal()">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    function hideModal() {
        $('#myModal').modal('hide');
    }
</script>
 
<script>
     $(document).ready(function() {
        $("#myModal").modal("show");
    });
</script>

<?php endif?>

<?php require_once __DIR__ . '/footer.php'; ?>
<?php if(empty($getUser['username'])) { ?>
<script>
    function chuadn() {
        Toast.fire({
            icon: "error",
            title: "Bạn Chưa Đăng Nhập.",
            timer: 2000
        });
    }
    chuadn();
</script>
<?php } else { ?>
<?php } ?>
