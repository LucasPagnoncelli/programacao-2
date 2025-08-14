<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        function Atualizar($idpessoa, $nome){
            $connection = require("dbfactory.php");                        
            if ($connection ->
                query(@"UPDATE pessoa SET nome = '$pessoa' WHERE idpessoa = '$idpessoa'")) {                
            }
            $connection -> close();
        }
        function Salvar($nome, $cpf, $endereco){
            $connection = require("dbfactory.php");                        
            if ($connection ->
                query(@"INSERT INTO pessoa (nome,cpf,endereco) VALUES ('$nome','$cpf','$endereco');")) {                
            }
            $connection -> close();
        }
        function Recuperar(){
            $connection = require("dbfactory.php");
            $sql = "SELECT idpessoa,nome,cpf,endereco FROM pessoa";


            $result = $mysqli->query($sql);
            echo "<table>";
            while ($row = $result->fetch_assoc()) {          
                echo "<div>";
                echo "<tr>"                          
                        . "<td hidden>".$row["idpessoa"]."</td>"
                        . "<td>".$row["nome"]."</td>"
                        . "<td>".$row["cpf"]."</td>"
                        . "<td>".$row["endereco"]."</td>"
                    ."</tr>";
                echo "</div>";
            }
            echo "</table>";
        }      


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars($_POST['nome']);
            $cpf = htmlspecialchars($_POST['cpf']);
            $endereco = htmlspecialchars($_POST['endereco']);
            if(!empty($nome) && !empty($cpf) && !empty($endereco)){
                Salvar($nome, $cpf, $endereco);
            }          
        }
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $nome = htmlspecialchars($_POST['nome']);
            if(!empty($nome)){
                Atualizar($nome);
            }          
        }
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $nome = htmlspecialchars($_POST['nome']);
            if(!empty($nome)){
                //Atualizar($nome);
            }          
        }      


        Recuperar();        
    ?>
    <form method="GET">
        <label for="pessoa-nome">Nome:</label>
        <input name="nome" id="pessoa-nome" type="text">
        <label for="pessoa-cpf">Cpf:</label>
        <input name="cpf" id="pessoa-cpf" type="text">
        <label for="pessoa-endereco">Endereço:</label>
        <input name="endereco" id="pessoa-endereco" type="text">
        <button type="submit">Salvar</button>
    </form>
</body>
<script src="/js/index.js"></script>
</html>

