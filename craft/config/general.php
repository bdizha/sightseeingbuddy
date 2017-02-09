<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
$httpHost = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$public_path = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : dirname(__DIR__) . '/public';

$baseUrl = $protocol . $httpHost . '/';
$basePath = realpath(CRAFT_BASE_PATH . '/../') . "/";

$assetUrl = $protocol . $httpHost . '/uploads/';
$assetPath = realpath(CRAFT_BASE_PATH . '/../') . "/public/uploads/";

return [
    '*' => [
        'omitScriptNameInUrls' => true,
        'siteUrl' => $baseUrl,
        'dateFormat' => 'j F Y',
        'dateFormatCompact' => 'j M &\r\s\q\u\o;y',
        'titleSeparator' => '–',
        'environmentVariables' => [
            'basePath' => $basePath,
            'baseUrl'  => $baseUrl,
            'assetPath'  => $assetPath,
            'assetUrl'  => $assetUrl,
        ]
    ],
    "local" => [
        'devMode' => true,
    ]
];
