<?php
$title = 'LỊCH SỬ MUA MÃ NGUỒN | ' . $TN->site('title');
$body['header'] = '
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

 <div class="row">
                        <section class="pcoded-main-container">
                            <div class="pcoded-content">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10">LỊCH SỬ MUA MÃ NGUỒN</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                                    <li class="breadcrumb-item"><a href="his-code">LỊCH SỬ MUA MÃ NGUỒN</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full card max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
                                    <div class="grid grid-cols-8 gap-4">
                                        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
                                            <div class="v-bg w-full mb-2 px-2">
 
                                                <div class="v-table-content select-text">
                                                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                                                        <table id="datatable" class="table-auto w-full scrolling-touch min-w-850 dataTable no-footer">
                                                            <thead>
                                                                <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> STT </th>
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> MÃ GIAO DỊCH </th>
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> LOẠI CODE </th>
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> GIÁ TIỀN </th>
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> ĐÃ THANH TOÁN </th>
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> THỜI GIAN MUA </th>
                                                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> THAO TÁC </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-sm font-semibold">
                                                           <?php $i=0; foreach ($TN->get_list("SELECT * FROM `tbl_his_code` WHERE `user_id` = '" . $getUser['id'] . "' ORDER BY `id` DESC") as $row) {?>
                                     <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['magd'];?>                                    </td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?=getCode($row['product_id'], 'name');?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?=format_cash(getCode($row['product_id'], 'price'));?>đ</td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?= format_cash($row['price']); ?>đ</td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="badge bg-danger"> <?=$row['create_date'];?> </span></td>

                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><a href="<?=nguyencoder_dec(getCode($row['product_id'], 'link_down'));?>" target="_blank"> <iconify-icon icon="line-md:download-loop" width="30" height="30" style="color: #20d5b7;"></iconify-icon> </a></td> 
                                </tr>
                                <?php }?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="v-table-note mt-1 py-1 font-semibold text-gray-800 text-sm">
                                                        Dùng điện thoại
                                                        <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (
                                                        <i class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                                                    </div>
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
</script>
<?php require_once __DIR__ . '/footer.php'; ?>