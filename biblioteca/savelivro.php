<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['titulo']) && !empty($data['autor'])) {
    $stmt = $connection->prepare("INSERT INTO livro (titulo, autor) VALUES (?, ?)");
    $stmt->bind_param("ss", $data['titulo'], $data['autor']);
    $stmt->execute();

    echo json_encode(["success" => true, "id" => $stmt->insert_id]);
} else {
    echo json_encode(["error" => "Campos obrigatórios não preenchidos"]);
}

$connection->close();
