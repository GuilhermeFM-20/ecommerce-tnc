<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$app = new \Slim\App();

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();


require_once __DIR__ . '/routes/app.php';

$app->run();