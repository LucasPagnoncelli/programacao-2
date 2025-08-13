<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {   
    $connection = require("dbfactory.php");
    $putData = file_get_contents('php://input',true);
    $connection = require("dbfactory.php");                        
    if ($connection -> 
        query(@"update INTO todo (description) VALUES ('$todo');")) {                 
    }
    $connection -> close();

    $response['body'] = json_encode($putData);
    echo $response['body'];        
} else {
    $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
    echo $response;
}


// $data = [
//     'status' => 'success',
//     'message' => 'Data retrieved successfully',
//     'items' => [
//         ['id' => 1, 'name' => 'Item 1'],
//         ['id' => 2, 'name' => 'Item 2']
//     ]
// ];

// echo json_encode($data);
// if ($_SERVER['REQUEST_METHOD'] === 'PUT') {   
//     parse_str(file_get_contents('php://input'), $_PUT);
//     if (!empty($_PUT['descricao'])){
//         $response['body'] = json_encode([
//             'descricao' => $_PUT['descricao']
//         ]);
//         return $response;
//     }    
// } else {
//     $response['body'] = json_encode([
//             'error' => 'Invalid input'
//         ]);
//     return $response;
// }
?>