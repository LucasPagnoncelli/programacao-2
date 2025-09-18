<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Atualizar($idpessoa, $nome, $cpf, $endereco){
            $connection = require("dbfactory.php");                        
            if ($connection ->
                query(@"UPDATE pessoa SET nome = '$pessoa', cpf = '$cpf', endereco = '$endereco' WHERE idpessoa = '$idpessoa'")) {                
            }
            $connection -> close();
        }

        
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            Recuperar();
        }

        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $nome = htmlspecialchars($_POST['nome']);
            if(!empty($nome)){
                Atualizar($nome);
            }
            Recuperar();
        }
            


        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT idpessoa, nome,cpf,endereco FROM pessoa";
            $result = $mysqli->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {  
                $rowid = "'_" . $row["idpessoa"] . "'";       
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                $endereco = $row["endereco"];
                echo "<tr id = "."_".$row["idpessoa"].">"                        
                        . "<td>"
                           . @"<input type='text' class = 'valor-nome' value = '$nome'/>"                         
                        . "</td>"
                        . "<td>"
                           . @"<input type='text' class = 'valor-cpf' value = '$cpf'/>"                         
                        . "</td>"
                        . "<td>"
                           . @"<input type='text' class = 'valor-endereco' value = '$endereco'/>"                         
                        . "</td>"
                        . "<td>"
                        . @"<button onclick=removerpessoa($rowid)>Remover</button>"
                        ."</td>"
                        . "<td>"
                        . @"<button onclick=atualizarpessoa($rowid)>Atualizar</button>"
                        ."</td>"                                            
                    ."</tr>";
            }
            echo "</table>";
        }       
    ?>
    <form method="post" id="form-pessoa">
        <label for="pessoa-nome">Nome:</label>
        <input name="nome" id="pessoa-nome" type="text">
        <label for="pessoa-cpf">Cpf:</label>
        <input name="cpf" id="pessoa-cpf" type="text">
        <label for="pessoa-endereco">Endereço:</label>
        <input name="endereco" id="pessoa-endereco" type="text">
        <button type="submit">Salvar</button>
    </form>
</body>
<script src="index.js"></script>
</html>

