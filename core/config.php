<?php
// Adatbázis csatlakozás
$config = [
    "DB_HOST" => "127.0.0.1",
    "DB_USER" => "root",
    "DB_PASS" => "",
    "DB_NAME" => "kassai_fogado"
];

// $config = [
//     "DB_HOST" => "localhost",
//     "DB_USER" => "kassaifo_kassai",
//     "DB_PASS" => "Hacker13prog",
//     "DB_NAME" => "kassaifo_kassai"
// ];

$connection = mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);
$sql = "set names utf8";
mysqli_query($connection, $sql);

if (!$connection) {
    die('Connection :error:' . mysqli_connect_error());
}