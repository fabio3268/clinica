<?php
session_start();
include __DIR__ . "/../source/connection.php";

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
