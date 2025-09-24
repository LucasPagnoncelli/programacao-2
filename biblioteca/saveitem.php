<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['nome']) && !empty($data['quantidade'])) {
    $stmt = $connection->prepare("INSERT INTO item (nome, quantidade) VALUES (?, ?)");
    $stmt->bind_param("si", $data['nome'], $data['quantidade']);
    $stmt->execute();

    echo json_encode(["success" => true, "id" => $stmt->insert_id]);
} else {
    echo json_encode(["error" => "Dados obrigatórios não preenchidos"]);
}

$connection->close();
