<?php
$environments = array(
    'local'   => array('\.dev'),
    'staging' => array('\.test\.(.+)\.flowsa\.net', '\.staging\.(.+)\.flowsa.net'),
    'live'    => array('\.live\.(.+)\.flowsa\.net', ".*"),
);

if (getenv('CRAFT_ENVIRONMENT')) {
    if (!defined('CRAFT_ENVIRONMENT')) {
        define('CRAFT_ENVIRONMENT', getenv('CRAFT_ENVIRONMENT'));
    }
} else {
    $http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null;

    foreach ($environments as $env => $hosts) {
        foreach ($hosts as $host) {
            if (preg_match('/' . $host . '/', $http_host)) {
                define('CRAFT_ENVIRONMENT', $env);
                break 2;
            }
        }
    }
}
