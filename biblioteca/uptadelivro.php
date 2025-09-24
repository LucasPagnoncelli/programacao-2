<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['id']) && !empty($data['titulo']) && !empty($data['autor'])) {
    $stmt = $connection->prepare("UPDATE livro SET titulo=?, autor=? WHERE idlivro=?");
    $stmt->bind_param("ssi", $data['titulo'], $data['autor'], $data['id']);
    $stmt->execute();

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Dados inválidos"]);
}

$connection->close();
