<?php
define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");

$config = require_once("../core/google.php");

$client = new Google_Client();
$client->setClientId($config['client_id']);
$client->setClientSecret($config['client_secret']);
$client->setRedirectUri($config['redirect_uri']);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $_SESSION['access_token'] = $token['access_token'];

    $oauth2 = new Google_Service_Oauth2($client);
    $userinfo = $oauth2->userinfo->get();

    $_SESSION['user_id'] = $userinfo->id;
    $_SESSION['email'] = $userinfo->email;
    $_SESSION['name'] = $userinfo->name;

    // Kiểm tra xem người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
    $google_id = $userinfo->id;
    $email = $userinfo->email;
    $name = $userinfo->name;
    $token = json_encode($token);
    $tokenData = json_decode($token, true);
    $accessToken = $tokenData['access_token'];
    
    $tokens = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6) . time());

   $result = $TN->query("SELECT id FROM usersda WHERE username = $google_id");
   
    if ($result->num_rows > 0) {
        // Người dùng đã tồn tại, cập nhật thông tin
        
      $stmt = $TN->update("usersda", array(
                'email'    => $email,
                'name'         => $name,
                'time_session' => time(),
                'loai'      => 'gg',
                'token'  => $tokens
            ), " `username` = '".$google_id."' ");
    } else {
        $stmt = $TN->insert("usersda", [
        'token'         => $tokens,
        'username'      => $google_id,
        'name'      => $name,
        'email'         => $email,
        'password'      => sha1($google_id),
        'ip'            => myip(),
        'loai'         => 'gg',
        'device'        => $_SERVER['HTTP_USER_AGENT'],
        'create_date'   => gettime(),
        'update_date'   => time(),
        'time_session'  => time()
    ]);
    
    }
    if ($stmt) {
        $TN->insert("logs", [
            'user_id'       => $TN->get_row("SELECT * FROM `usersda` WHERE `token` = '$tokens' ")['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'    => gettime(),
            'action'        => 'Login GG thành Công'
         ]);

    }
   setcookie("token", $tokens, time() + $TN->site('session_login'), "/");
        $_SESSION['login'] = $tokens;
    header('Location: /client/home');
    exit();
} else {
    echo 'Authorization code is not available';
}
?>
