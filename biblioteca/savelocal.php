<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['descricao'])) {
    $stmt = $connection->prepare("INSERT INTO local (descricao) VALUES (?)");
    $stmt->bind_param("s", $data['descricao']);
    $stmt->execute();

    echo json_encode(["success" => true, "id" => $stmt->insert_id]);
} else {
    echo json_encode(["error" => "Descrição obrigatória"]);
}

$connection->close();
