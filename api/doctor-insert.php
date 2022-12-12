<?php
$doctor = filter_var_array($_POST, FILTER_DEFAULT);

if(in_array("",$doctor)){
    $response = [
        "type" => "error",
        "message" => "Informe Nome, CRM e Especialidade do Médico"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

include __DIR__ . "/../source/connection.php";

$query = "INSERT INTO doctors (name, document, specialty_id) 
          VALUES ('{$doctor["name"]}','{$doctor["document"]}', {$doctor["specialty"]})";
$conn->query($query);

$response = [
    "type" => "success",
    "message" => "Médico cadastrado com sucesso!"
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);