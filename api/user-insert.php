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

//$user = $_POST;
$user = filter_var_array($_POST, FILTER_DEFAULT);

if(in_array("",$user)){
    $response = [
        "type" => "error",
        "message" => "Informe Nome, Email e Senha!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$query = "SELECT * 
          FROM users
          WHERE email LIKE '{$user["email"]}'";

$stmt = $conn->query($query);

if($stmt->rowCount() == 1){
    $response = [
        "type" => "error",
        "message" => "E-mail já está cadastrado!"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$query = "INSERT INTO users (id, name, email, password, type) 
          VALUES (NULL, '{$user["name"]}','{$user["email"]}','{$user["password"]}','P')";

$conn->query($query);

$response = [
    "type" => "success",
    "message" => "Usuário cadastrado com sucesso!",
    "name" => $user["name"]
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);



