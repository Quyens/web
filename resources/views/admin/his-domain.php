<?php 
if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = 'Danh Sách MUA TÊN MIỀN | ' . $TN->site('title');
$body = [
    'title' => ' DANH SÁCH MUA TÊN MIỀN'
];
$body['header'] = '
    <!-- DataTables -->
    <link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
';
$body['footer'] = '
    <!-- DataTables  & Plugins -->
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/jszip/jszip.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/pdfmake/pdfmake.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/pdfmake/vfs_fonts.js"></script>   
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="'.BASE_URL('public/AdminLTE3/').'plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
';
require_once(__DIR__.'/Header.php');
require_once(__DIR__.'/Sidebar.php');
require_once(__DIR__.'/Navbar.php');
require_once(__DIR__ . '/../../../core/is_user.php');
CheckLogin();
CheckAdmin();
?>
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-1"></i>
                                DANH SÁCH MUA TÊN MIỀN
                            </h3>
                            <div class="card-tools">
                            <input type="hidden" value="<?=$getUser['token']?>" id="token">
                                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="datatable1" class="table table-bordered table-striped table-hover">
                                     <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ ĐƠN</th>
                                        <th>NGƯỜI DÙNG</th>
                                        <th>LOẠI MIỀN</th>
                                        <th>TÊN MIỀN</th>
                                        <th>NAMESERVER</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>NGÀY MUA</th>
                                        <th>NGÀY HẾT</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($TN->get_list(" SELECT * FROM `ls_muamien` WHERE `username` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['magd'];?></td>
                                        <td><?=$row['username'];?></td>
                                        <td><?=GetSvmien($row['loaimien']);?></td>
                                        <td><?=$row['domain'];?></td>
                                        <td><?=$row['server1'];?><br><?=$row['server2'];?></td>
                                        <td><?=$row['status'];?></td>
                                        <td><span class="badge badge-dark"><?=date('d/m/Y - H:i:s', $row['ngay_mua']);?></span></td>
                                        <td><span class="badge badge-dark"><?=date('d/m/Y', $row['ngay_het']);?></span></td>
                                        <td>
                                            <a type="button" href="<?=BASE_URL('admin/domain-edit/');?><?=$row['id'];?>"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                <span>SỬA</span></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $('#datatable1').DataTable();
});
</script>
<script>
$(function() {
    $('#datatable2').DataTable();
});
</script>
<?php
require_once(__DIR__.'/Footer.php');
?>