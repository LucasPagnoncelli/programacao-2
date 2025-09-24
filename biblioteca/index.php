<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel CRUD</title>
  <script src="index.js"></script>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    h2 { margin-top: 40px; }
    table { border-collapse: collapse; width: 100%; margin-top: 10px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background: #f4f4f4; }
    input { margin: 5px; }
    button { margin: 5px; }
    .card { border: 1px solid #aaa; padding: 15px; margin-bottom: 20px; border-radius: 6px; }
  </style>
</head>
<body>
  <h1>Gerenciamento de Entidades</h1>


  <div class="card">
    <h2>📚 Livros</h2>
    <form id="form-livro">
      <input type="text" id="livro-titulo" placeholder="Título">
      <input type="text" id="livro-autor" placeholder="Autor">
      <button type="button" onclick="salvarLivro()">Salvar Livro</button>
    </form>
    <table id="tabela-livros">
      <thead>
        <tr><th>ID</th><th>Título</th><th>Autor</th><th>Ações</th></tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

 
  <div class="card">
    <h2>Locais</h2>
    <form id="form-local">
      <input type="text" id="local-descricao" placeholder="Descrição">
      <button type="button" onclick="salvarLocal()">Salvar Local</button>
    </form>
    <table id="tabela-locais">
      <thead>
        <tr><th>ID</th><th>Descrição</th><th>Ações</th></tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>


  <div class="card">
    <h2>Itens</h2>
    <form id="form-item">
      <input type="text" id="item-nome" placeholder="Nome do Item">
      <input type="number" id="item-quantidade" placeholder="Quantidade">
      <button type="button" onclick="salvarItem()">Salvar Item</button>
    </form>
  </div>

</body>
</html>
