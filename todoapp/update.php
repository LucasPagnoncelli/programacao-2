<?php
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {    
    $connection = require("dbfactory.php");
    $rawData = file_get_contents("php://input");
    $body =  json_encode($rawData,true);
    $descricao = $body["descricao"];
    $sql = @"UPDATE Todo SET Description = '$descricao' WHERE IdTodo = $id"; 
    $connection->query($sql);
    $connection -> close();    
} else {
    echo "This script only handles DELETE requests.";
}
?>