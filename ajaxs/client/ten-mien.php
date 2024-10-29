
<?php
$domain = $_POST['domain'];

if (!$_POST['domain']) {
    die(json_encode([
        'code' => false,
        'msg' => 'Không được để trống'
    ]));
}


$headers = array(
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    "Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
    "Cache-Control: max-age=0",
    "Connection: keep-alive",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36"
);

function whois($domain)
{
    global $headers;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://whois.inet.vn/api/whois/domainspecify/" . $domain);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$quochuy = whois($domain);

$json = json_decode($quochuy);

if ($json->code == 0) {
    die(json_encode([
        'code' => true,
        'domain' => $domain,
        'msg' => $domain . ' ' . $json->message,
    ]));
} else {
    die(json_encode([
        'code' => false,
        'msg' => $domain . ' ' . $json->message
    ]));
}



?>    