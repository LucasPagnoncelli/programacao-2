<?php 
header('Content-Type: application/json');
function Salvar($pessoa){
    $connection = require("dbfactory.php");                        
    if ($connection -> 
        query(@"INSERT INTO pessoa (nome,cpf,endereco) VALUES ('$nome','$cpf','$endereco');")) {                 
    }
    $connection -> close();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = json_decode(file_get_contents('php://input',true));    
    if(!empty($postData->nome) && !empty($postData->cpf) && !empty($postData->endereco)){
        Salvar($postData->nome,$postData->cpf,$postData->endereco);
    }                
}
else {
    $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
    echo $response;
}
?>