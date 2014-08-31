<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__.'/vendor/autoload.php';

$dsn = 'mysql:host='.$host.';dbname='.$database.';charset=utf8';
$pdo = new PDO($dsn,$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);