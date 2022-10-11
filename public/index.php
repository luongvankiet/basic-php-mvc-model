<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Core\Helper;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new Application(dirname(__DIR__));

$app->run();
