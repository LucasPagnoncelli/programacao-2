<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    $stmt = $connection->prepare("DELETE FROM livro WHERE idlivro=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "ID inválido"]);
}

$connection->close();
