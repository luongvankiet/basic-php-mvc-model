<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;
use App\Core\Helper;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$helper = new Helper(__DIR__);

$db = new Database();
$db->runMigrations();
