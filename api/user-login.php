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

$user = filter_var_array($_POST, FILTER_DEFAULT);

if(in_array("",$user)){
    $response = [
        "type" => "error",
        "message" => "Informe E-mail e Senha!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$query = "SELECT * 
          FROM users 
          WHERE email LIKE '{$user["email"]}' AND 
                password LIKE '{$user["password"]}'";

$stmt = $conn->query($query);

if($stmt->rowCount() == 0){
    $response = [
        "type" => "error",
        "message" => "E-mail ou Senha incorretos!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$row = $stmt->fetch();

$response = [
    "type" => "success",
    "message" => "Olá, {$row->name}!"
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);









