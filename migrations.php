<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = new Application(__DIR__, true);
$app->db()->runMigrations();
