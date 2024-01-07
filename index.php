<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$app = new \Slim\App();

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();


require_once __DIR__ . '/routes/app.php';
require_once __DIR__ . '/routes/api.php';


$app->run();