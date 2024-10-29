<?php
$title = 'DANH SÁCH MÃ NGUỒN | ' . $TN->site('title');
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


$sql = "SELECT * FROM `tbl_list_code` WHERE `status` = '1' ORDER BY id DESC LIMIT $limit OFFSET $offset";
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
$sql = "SELECT * FROM `tbl_list_code` WHERE `status` = '1' ORDER BY id DESC LIMIT $limit OFFSET $offset";
$currentPageCodes = $TN->get_list($sql);
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
   
 
  
 
    <div class="section-header">
        <div class="section-title">
            <h3><i class="fa fa-code"></i> MÃ NGUỒN CỦA TÔI</h3>
        </div>
        <div class="section-divider"></div>
    </div>


    <div class="row">
                  
                   
    <?php foreach($currentPageCodes as $row) { ?>
                    <div class="col-sm-6 col-xl-4">
                <div class="card  ">
                    <div class="position-relative">
                        <a href="<?=BASE_URL('client/view-code/');?><?=$row['id']?>">
                            <img src="<?=$row['images'];?>" width="10" class="card-img-top custom-image" alt="CyBerNix">
                        </a>
                        <div class="ant-ribbon ant-ribbon-placement-end ant-ribbon-color-black css-eq3tly"><span class="ant-ribbon-text">Mã: <?=$row['id'];?> </span>
                    <div class="ant-ribbon-corner"></div>
                  </div>
 
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fs-4" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"> <?=$row['name'];?> </h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fs-2 mb-0 ">Lượt xem: <?=$row['view'];?> <span class="ms-2 fs-2 mb-0 ">Lượt mua: <?=$row['sold'];?> </span></h6>
                            <ul class="list-unstyled d-flex align-items-center mb-0">
                                <li class="me-1">
                                    <div class="badge border border-danger text-danger  ">
                                        <?=format_cash($row['price']);?> đ
                                   </div> 
                                </li>
                                <li>
                                    <a href="<?=BASE_URL('client/view-code/');?><?=$row['id']?>" class="badge bg-primary"> Chi tiết </a> 
                                </li>
                            </ul>
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
<script>
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