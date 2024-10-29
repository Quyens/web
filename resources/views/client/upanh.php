<?php
$title = 'UP ẢNH LẤY LINK | ' . $TN->site('title');
$body['header'] = '
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
';
$body['footer'] = '

';
require_once __DIR__ . '/../../../core/is_user.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/nav.php';
?>

<?php
// Imgur Client ID
$clientId = "d622b313167de2f";

// Xử lý tải lên ảnh
$imageLink = '';
$uploadSuccess = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image']['tmp_name'];
    $imageData = base64_encode(file_get_contents($image));

    $url = 'https://api.imgur.com/3/image';
    $headers = [
        "Authorization: Client-ID $clientId",
    ];
    $postFields = ['image' => $imageData];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);

    if ($response && $response['success']) {
        $imageLink = $response['data']['link'];
        $uploadSuccess = true;
    } else {
        echo '<p class="text-danger">Tải lên ảnh thất bại! Lỗi: ' . htmlspecialchars($response['data']['error'], ENT_QUOTES, 'UTF-8') . '</p>';
    }
}
?>

<div class="row">
    <div class="content-wrapper transition-all duration-150 ltr:ml-0 rtl:mr-0 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div class="container-fluid transition-all duration-150" id="page_layout">
                <main id="content_layout">
                    <section class="space-y-6">
                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                            <div class="card">
                                <div class="card-body flex flex-col p-6">
                                    <header class="-mx-6 mb-5 flex items-center border-b border-slate-100 px-6 pb-5 dark:border-slate-700">
                                        <div class="flex-1">
                                            <div class="card-title text-slate-900 dark:text-white">Up ảnh lấy link</div>
                                        </div>
                                    </header>
                                    <div class="card-text h-full space-y-4">
                                        <form method="POST" class="space-y-3" enctype="multipart/form-data">
                                            <div class="input-area mb-3">
                                                <label for="uploadInput" class="form-label">Chọn ảnh để chuyển đổi</label>
                                                <input type="file" class="form-control py-2" id="uploadInput" name="image" accept="image/*" required>
                                            </div>
                                            <div class="input-area">
                                                <button type="submit" class="btn btn-sm btn-primary w-full">Tải lên</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="card">
                                <header class="card-header noborder">
                                    <h4 class="card-title">Hình ảnh</h4>
                                </header>
                                <div class="card-body px-6 pb-6">
                                    <p class="text-red-500">
                                        <input type="text" id="image" class="form-control mb-2" placeholder="Link Ảnh" value="<?= htmlspecialchars($imageLink, ENT_QUOTES, 'UTF-8'); ?>">
                                        <input type="hidden" name="image_link" id="image_link" value="<?= htmlspecialchars($imageLink, ENT_QUOTES, 'UTF-8'); ?>">
                                        <button id="copyImageBtn" class="btn btn-sm btn-primary w-full">Copy Image</button>
                                        <span id="copyStatus"></span>
                                        <?php if ($uploadSuccess): ?>
                                            <p class="text-success mt-2">Image uploaded successfully</p>
                                        <?php endif; ?>
                                    </p>
                                    <?php if ($imageLink): ?>
                                       
                                        </div>
                                    <?php else: ?>
                                       
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard() {
    var copyText = document.getElementById("image");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand("copy");
    alert("Đã sao chép!"); // Thông báo
    console.log("Đã sao chép nội dung: " + copyText.value); // Thông báo trên console
}

document.getElementById('copyImageBtn').addEventListener('click', copyToClipboard);

function resetForm() {
    document.getElementById("image").value = "";
    document.getElementById("image_link").value = "";
    document.getElementById("imagePreview").innerHTML = "";
    alert("Form đã được đặt lại!"); // Thông báo
    console.log("Form đã được đặt lại."); // Thông báo trên console
}

document.getElementById('resetFormBtn').addEventListener('click', resetForm);
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
