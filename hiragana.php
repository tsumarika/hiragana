<?php
require __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv -> load();

$goo_hiragana_url = 'https://labs.goo.ne.jp/api/hiragana';

$params = [
    'app_id' => $_ENV['APP_ID'],
    'sentence' => '漢字が混ざっている文章',
    'output_type' => 'hiragana',
];
print_r($params);
$json_params = json_encode($params);

$opts = array(
    'http' => array(
        'method' => "POST",
        'header' => "Accept: application/json\r\n" .
                    "Content-Type: application/json\r\n",
        "content" => $json_params,
    )
);

$context = stream_context_create($opts);
$json_response = file_get_contents($goo_hiragana_url, false, $context);
$response = json_decode($json_response, true);
print_r($response);
