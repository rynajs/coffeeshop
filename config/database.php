<?php
$host = '127.0.0.1';
$port = '8889';        // MAMP’s MySQL port
$db   = 'coffeeshop';
$user = 'root';
$pass = 'root';

$dsn  = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

$pdo  = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
