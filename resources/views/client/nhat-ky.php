<?php
$title = 'NHẬT KÝ HOẠT ĐỘNG | ' . $TN->site('title');
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

   <div class="row"><section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">NHẬT KÝ HOẠT ĐỘNG</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#!">NHẬT KÝ HOẠT ĐỘNG</a></li>
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
             <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> HÀNH ĐỘNG </th> 
             <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> ĐỊA CHỈ IP </th> 
             <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> THIẾT BỊ </th> 
             <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1"> THỜI GIAN </th> 
            </tr> 
           </thead> 
                            <tbody class="text-sm font-semibold">
                             <?php $i=0; foreach ($TN->get_list("SELECT * FROM `logs` WHERE `user_id` = '" . $getUser['id'] . "' ORDER BY `id` DESC") as $row) {?>
                                     <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?= $row['action']; ?>                                    </td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?= $row['ip']; ?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?= $row['device']; ?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?= $row['create_date']; ?></td>
                                </tr>
                                <?php }?>                                       
                                                                                            </tbody>
          </table> 
         </div> 
 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

<?php require_once __DIR__ . '/footer.php'; ?>