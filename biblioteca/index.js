
async function listarLivros() {
  let res = await fetch("list_livro.php");
  let livros = await res.json();
  let tbody = document.querySelector("#tabela-livros tbody");
  tbody.innerHTML = "";
  livros.forEach(l => {
    tbody.innerHTML += `
      <tr>
        <td>${l.idlivro}</td>
        <td><input value="${l.titulo}" id="titulo-${l.idlivro}"></td>
        <td><input value="${l.autor}" id="autor-${l.idlivro}"></td>
        <td>
          <button onclick="atualizarLivro(${l.idlivro})">Atualizar</button>
          <button onclick="removerLivro(${l.idlivro})">Excluir</button>
        </td>
      </tr>`;
  });
}

async function salvarLivro() {
  let titulo = document.getElementById("livro-titulo").value;
  let autor = document.getElementById("livro-autor").value;
  await fetch("save_livro.php", {
    method: "POST",
    body: JSON.stringify({ titulo, autor })
  });
  listarLivros();
}

async function atualizarLivro(id) {
  let titulo = document.getElementById(`titulo-${id}`).value;
  let autor = document.getElementById(`autor-${id}`).value;
  await fetch("update_livro.php", {
    method: "PUT",
    body: JSON.stringify({ id, titulo, autor })
  });
  listarLivros();
}

async function removerLivro(id) {
  await fetch("delete_livro.php?id=" + id, { method: "DELETE" });
  listarLivros();
}

async function listarLocais() {
  let res = await fetch("list_local.php");
  let locais = await res.json();
  let tbody = document.querySelector("#tabela-locais tbody");
  tbody.innerHTML = "";
  locais.forEach(l => {
    tbody.innerHTML += `
      <tr>
        <td>${l.idlocal}</td>
        <td><input value="${l.descricao}" id="descricao-${l.idlocal}"></td>
        <td>
          <button onclick="atualizarLocal(${l.idlocal})">Atualizar</button>
          <button onclick="removerLocal(${l.idlocal})">Excluir</button>
        </td>
      </tr>`;
  });
}

async function salvarLocal() {
  let descricao = document.getElementById("local-descricao").value;
  await fetch("save_local.php", {
    method: "POST",
    body: JSON.stringify({ descricao })
  });
  listarLocais();
}

async function atualizarLocal(id) {
  let descricao = document.getElementById(`descricao-${id}`).value;
  await fetch("update_local.php", {
    method: "PUT",
    body: JSON.stringify({ id, descricao })
  });
  listarLocais();
}

async function removerLocal(id) {
  await fetch("delete_local.php?id=" + id, { method: "DELETE" });
  listarLocais();
}
async function salvarItem() {
  let nome = document.getElementById("item-nome").value;
  let quantidade = parseInt(document.getElementById("item-quantidade").value);
  await fetch("save_item.php", {
    method: "POST",
    body: JSON.stringify({ nome, quantidade })
  });
  alert("Item salvo com sucesso!");
}
window.onload = () => {
  listarLivros();
  listarLocais();
};
