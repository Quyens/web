<?php
$title = 'NẠP ATM/MOMO | ' . $TN->site('title');
$body['header'] = '
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
';
$body['footer'] = '
    
';
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
CheckLogin();
?>

   <div class="row"><section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">NẠP ATM/TSR</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="recharge">NẠP ATM/TSR</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

    <?php foreach($TN->get_list("SELECT * FROM `bank` ") as $bank) { ?>
 
 
                                                               <div class="col-2xl-3 col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="box border-bottom-info h-100 card-body">
                            <div class="py-3 text-center">
                        <p><span class="text-big" style="color: rgb(153, 77, 230);"><strong>* Nạp ATM/TheSieuRe</strong></span></p>
            <p><span class="text-big" style="color: rgb(0, 200, 0);"><strong>Nạp tối thiểu là 5.001đ</strong></span></p>
            <p><span class="text-big" style="color: rgb(230, 153, 77);"><strong>Ví Dụ:</strong></span></p>
            <p><span class="text-big" style="color: rgb(230, 77, 77);"><strong>100k ATM/TheSieuRe</strong></span><span class="text-big"><strong> = </strong></span><span class="text-big" style="color: rgb(230, 77, 77);"><strong>100k Trên Shop</strong></span></p> 
                            </div>
                            <div class="d-flex flex-column align-items-center">
                              <span>  <img src="https://img.vietqr.io/image/<?=$bank['short_name'];?>-<?=$bank['accountNumber'];?>-qr_only.png?&addInfo= <?=$TN->site('noidungnap_momo').$getUser['id'];?>&accountName= <?=$bank['accountName'];?>" style="width: 150px; height: 150px;" alt="QR Code" /></span>    </div>
                            <div class="p-4">
                                <div class="d-flex flex-wrap justify-content-between">
                                   <span>STK <?=$bank['short_name'];?>:</span>
  <span class="copy cursor-pointer text-success" data-clipboard-text="<?=$bank['accountNumber'];?>"><b> <?=$bank['accountNumber'];?> </b></b><svg width="20" height="20" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
    <path d="M48.186 92.137c0-8.392 6.49-14.89 16.264-14.89s29.827-.225 29.827-.225-.306-6.99-.306-15.88c0-8.888 7.954-14.96 17.49-14.96 9.538 0 56.786.401 61.422.401 4.636 0 8.397 1.719 13.594 5.67 5.196 3.953 13.052 10.56 16.942 14.962 3.89 4.402 5.532 6.972 5.532 10.604 0 3.633 0 76.856-.06 85.34-.059 8.485-7.877 14.757-17.134 14.881-9.257.124-29.135.124-29.135.124s.466 6.275.466 15.15-8.106 15.811-17.317 16.056c-9.21.245-71.944-.49-80.884-.245-8.94.245-16.975-6.794-16.975-15.422s.274-93.175.274-101.566zm16.734 3.946l-1.152 92.853a3.96 3.96 0 0 0 3.958 4.012l73.913.22a3.865 3.865 0 0 0 3.91-3.978l-.218-8.892a1.988 1.988 0 0 0-2.046-1.953s-21.866.64-31.767.293c-9.902-.348-16.672-6.807-16.675-15.516-.003-8.709.003-69.142.003-69.142a1.989 1.989 0 0 0-2.007-1.993l-23.871.082a4.077 4.077 0 0 0-4.048 4.014zm106.508-35.258c-1.666-1.45-3.016-.84-3.016 1.372v17.255c0 1.106.894 2.007 1.997 2.013l20.868.101c2.204.011 2.641-1.156.976-2.606l-20.825-18.135zm-57.606.847a2.002 2.002 0 0 0-2.02 1.988l-.626 96.291a2.968 2.968 0 0 0 2.978 2.997l75.2-.186a2.054 2.054 0 0 0 2.044-2.012l1.268-62.421a1.951 1.951 0 0 0-1.96-2.004s-26.172.042-30.783.042c-4.611 0-7.535-2.222-7.535-6.482S152.3 63.92 152.3 63.92a2.033 2.033 0 0 0-2.015-2.018l-36.464-.23z" stroke="#979797" fill-rule="evenodd"></path>
</svg></span>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <span>Chủ TK:</span>
                                    <span> <?=$bank['accountName'];?> </span>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between">
                                   <span>Nội Dung:</span>
<span class="copyNoiDung cursor-pointer text-danger" data-clipboard-target="#copyNoiDung"><b id="copyNoiDung"> <?=$TN->site('noidungnap_momo').$getUser['id'];?> </b> <svg width="20" height="20" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
    <path d="M48.186 92.137c0-8.392 6.49-14.89 16.264-14.89s29.827-.225 29.827-.225-.306-6.99-.306-15.88c0-8.888 7.954-14.96 17.49-14.96 9.538 0 56.786.401 61.422.401 4.636 0 8.397 1.719 13.594 5.67 5.196 3.953 13.052 10.56 16.942 14.962 3.89 4.402 5.532 6.972 5.532 10.604 0 3.633 0 76.856-.06 85.34-.059 8.485-7.877 14.757-17.134 14.881-9.257.124-29.135.124-29.135.124s.466 6.275.466 15.15-8.106 15.811-17.317 16.056c-9.21.245-71.944-.49-80.884-.245-8.94.245-16.975-6.794-16.975-15.422s.274-93.175.274-101.566zm16.734 3.946l-1.152 92.853a3.96 3.96 0 0 0 3.958 4.012l73.913.22a3.865 3.865 0 0 0 3.91-3.978l-.218-8.892a1.988 1.988 0 0 0-2.046-1.953s-21.866.64-31.767.293c-9.902-.348-16.672-6.807-16.675-15.516-.003-8.709.003-69.142.003-69.142a1.989 1.989 0 0 0-2.007-1.993l-23.871.082a4.077 4.077 0 0 0-4.048 4.014zm106.508-35.258c-1.666-1.45-3.016-.84-3.016 1.372v17.255c0 1.106.894 2.007 1.997 2.013l20.868.101c2.204.011 2.641-1.156.976-2.606l-20.825-18.135zm-57.606.847a2.002 2.002 0 0 0-2.02 1.988l-.626 96.291a2.968 2.968 0 0 0 2.978 2.997l75.2-.186a2.054 2.054 0 0 0 2.044-2.012l1.268-62.421a1.951 1.951 0 0 0-1.96-2.004s-26.172.042-30.783.042c-4.611 0-7.535-2.222-7.535-6.482S152.3 63.92 152.3 63.92a2.033 2.033 0 0 0-2.015-2.018l-36.464-.23z" stroke="#979797" fill-rule="evenodd"></path>
</svg> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 
 <?php }?>

 
 
                            </div>
 
 
 
 
           <div class="v-bg card w-full mb-2 px-2">
 
                <div class="v-table-content card-body select-text">
                    <h2
                    class="v-title border-l-4 border-gray-800 px-3 select-none text-gray-800 text-xl md:text-2xl font-bold">
                    LỊCH SỬ NẠP ATM/MOMO
                </h2>
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                        <table id="datatable" class="table-auto w-full scrolling-touch min-w-850">
                            <thead>
                                <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        STT
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        THỜI GIAN
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        PHƯƠNG THỨC
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        MÃ GIAO DỊCH
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        SỐ TIỀN
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        TRẠNG THÁI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        NỘI DUNG
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold">
                             <?php $i = 0; foreach($TN->get_list("SELECT * FROM `invoices` WHERE `user_id` = '".$getUser['id']."' ") as $row) { ?>
                                <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++;?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=date('d-m-Y H:i:s',$row['create_time'])?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['payment_method'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['trans_id'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=format_cash($row['amount']);?> VND</td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                    Thành Công
                                    </td>
                                </tr>
                            <?php }?>
                                                        </tbody>
                        </table>
                    </div>
                    <div class="v-table-note mt-1 py-1 font-semibold text-gray-800 text-sm">
                        Dùng điện thoại <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (<i
                            class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
    var clipboardNoiDung = new ClipboardJS('.copyNoiDung');
    clipboardNoiDung.on('success', function(e) {
        Toast.fire({
            icon: "success",
            title: "Đã sao chép nội dung",
            timer: 2000
        });
        e.clearSelection();
    });
    clipboardNoiDung.on('error', function(e) {
        Toast.fire({
            icon: "error",
            title: "Sao chép thất bại! Hãy thử lại.",
            timer: 2000
        });
    });
 
 
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script>
    var clipboard = new ClipboardJS('.copy');
    clipboard.on('success', function(e) {
        Toast.fire({
            icon: "success",
            title: "Đã sao chép số tài khoản",
            timer: 2000
        });
        e.clearSelection();
    });
    clipboard.on('error', function(e) {
        Toast.fire({
            icon: "error",
            title: "Sao chép thất bại! Hãy thử lại.",
            timer: 2000
        });
    });
 
 
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
 

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<script>
    new ClipboardJS(".copy");

    function copy() {
        cuteToast({
            type: "success",
            message: "Đã sao chép vào bộ nhớ tạm",
            timer: 5000
        });
    }
</script>
<?php require_once(__DIR__ . '/footer.php'); ?>