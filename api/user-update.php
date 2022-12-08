<?php
session_start();
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

$user = filter_var_array($_POST, FILTER_DEFAULT);

if(in_array("", $user)){
    $response = [
        "type" => "error",
        "message" => "Informe Nome e Email!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}
$id = $_SESSION["user"]["id"];
$query = "UPDATE users 
          SET name = '{$user["name"]}', email = '{$user["email"]}' 
          WHERE id = {$id}";

$conn->query($query);

$response = [
    "type" => "success",
    "message" => "Usuário alterado com sucesso!"
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
