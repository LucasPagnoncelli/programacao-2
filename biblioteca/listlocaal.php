<?php
header('Content-Type: application/json');
$connection = require("dbfactory.php");

$result = $connection->query("SELECT idlocal, descricao FROM local");
$locais = [];
while ($row = $result->fetch_assoc()) {
    $locais[] = $row;
}
echo json_encode($locais);

$connection->close();
