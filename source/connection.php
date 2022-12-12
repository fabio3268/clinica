<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bd-clinica";
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

$conn = new PDO(
    "mysql:host=$host;dbname=$database",
    $user,
    $password,
    $options
);