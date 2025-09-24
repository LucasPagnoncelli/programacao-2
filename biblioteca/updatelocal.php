<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['id']) && !empty($data['descricao'])) {
    $stmt = $connection->prepare("UPDATE local SET descricao=? WHERE idlocal=?");
    $stmt->bind_param("si", $data['descricao'], $data['id']);
    $stmt->execute();

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Dados inválidos"]);
}

$connection->close();
