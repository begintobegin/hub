<?php
$config = [
    'database' => [
        'host' => 'localhost',
        'database' => 'website',
        'username' => 'root',
        'password' => ''
    ],
    'app' => [
        'serverurl' => 'http://hub/',
        'protocol' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http',
        'expirationTime' => 1800
    ]
];
