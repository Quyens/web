<?php 
if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$title = 'Thêm Tên Miền | ' . $TN->site('title');
$body = [
    'title' => 'Thêm Tên Miền'
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
<?php
if(isset($_POST['addCate']) && $getUser['level'] == 1)
{
    $isInsert = $TN->insert("tbl_account_whmcs", [
        'user'       => check_string($_POST['user']),
        'pass'       => check_string($_POST['pass']),
        'cate_id'       => check_string($_POST['category']),
        'link_whmcs'       => check_string($_POST['link_whmcs']),
        'name_server'       => check_string($_POST['name_server']),
        'backup'       => check_string($_POST['backup']),
        'status'       => check_string($_POST['status']),
        'create_date' => gettime(),
        'update_date' => gettime()
    ]);
    if ($isInsert) {
        die('<script type="text/javascript">if(!alert("Thêm thành công !")){location.href = "' . BASE_URL('admin/list-category-hosting') . '";}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Lưu thất bại!")){window.history.back().location.reload();}</script>');
    }
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <section class="col-lg-6">
                <div class="mb-3">
                </div>
            </section>
            <section class="col-lg-6">
            </section>
            <section class="col-lg-12 connectedSortable">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit mr-1"></i>
                            Thêm Sản Phẩm
                        </h3>
                        <div class="card-tools">
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục</label>
                                  <select name="category" class="form-control" required>
                                            <?php foreach ($TN->get_list("SELECT * FROM `tbl_category_hosting` WHERE `status`=1 ORDER BY `stt` ASC") as $cate) : ?>
                                            <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tài Khoản</label>
                                 <input name="user" type="text" class="form-control"
                                                placeholder="Tài khoản ..." required>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Mật Khẩu</label>
                                  <input name="pass" type="text" class="form-control"
                                                placeholder="Mật khẩu ..." required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link WHMCS</label>
                                 <input name="link_whmcs" type="text" class="form-control"
                                                placeholder="Link ..." required>
                                                <div class="form-group">
                                                     </div>
                                <label for="exampleInputEmail1">Name Server Máy Chủ (Mỗi nameserver 1 dòng)</label>
                                 <textarea name="name_server" type="text" class="form-control"  placeholder="Name Server Máy Chủ (Mỗi nameserver 1 dòng)" required></textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Backup</label>
                                  <select name="backup" class="form-control"
                                                tabindex="-98">
                                                <option value="1">Có</option>
                                                <option value="0">Không</option>
                                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái</label>
                                <select name="status" class="form-control"
                                                tabindex="-98">
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Ẩn</option>
                                            </select>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <button name="addCate" class="btn btn-info btn-icon-left m-b-10" type="submit"><i
                                    class="fas fa-save mr-1"></i>Thêm Ngay</button>
                        </div>
                    </form>
                </div>
            </section>
            
        </div>
    </section>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-1"></i>
                                DANH SÁCH MÁY CHỦ
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
                                        <th class="border-0">#ID
                                            </th>
                                            <th class="border-0">THÔNG TIN
                                            </th>
                                            <th class="border-0">TÀI KHOẢN
                                            </th>
                                            <th class="border-0">NAME SERVER
                                            </th>
                                            <th class="border-0">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($TN->get_list("SELECT * FROM `tbl_account_whmcs` ORDER BY `id` DESC") as $row): ?>
                                          <tr>
                                            <td><?=$row['id']?></td>
                                            <td>
                                                <ul>
                                                    <li>Thuộc Danh Mục:<?= getRowRealtime4($row['cate_id'], 'name') ?>
                                                    </li>
                                                    <li>Trạng Thái:<?=status_whmcs($row['status'])?></li>
                                                    <li>Backup: <?=reView($row['backup'])?>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>Tài Khoản RSL: <?=$row['user']?></li>
                                                    <li>Mật Khẩu RSL: <?=$row['pass']?></li>
                                                    <li>Link Login:<?=$row['link_whmcs']?>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li><?= nl2br($row['name_server']) ?> </li>
                                                    
                                                </ul>
                                            </td>
                                        <td>
                                            <a type="button"
                                                onclick="RemoveRow(<?=$row['id']?>)"
                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                <span>XÓA</span></a>
                                        </td>
                                    </tr>
                                    
                                       <?php endforeach;?>
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
function RemoveRow(id) {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa Mã Nguồn",
        message: "Bạn có chắc chắn muốn xóa ID " + id + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL('')?>ajaxs/admin/removewhm.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    token: $("#token").val()
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 5000
                        });
                        location.reload();
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Error",
                            message: respone.msg,
                            buttonText: "Okay"
                        });
                    }
                },
                error: function() {
                    alert(html(response));
                    location.reload();
                }
            });
        }
    })
}
</script>
<script>
$(function() {
    $('#datatable1').DataTable();
});
$(function() {
    $('#datatable2').DataTable();
});
</script>
<?php 
    require_once(__DIR__."/Footer.php");
?>