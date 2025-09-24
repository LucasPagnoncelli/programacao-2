async function listarLivros() {
  const res = await fetch("list_livro.php");
  const livros = await res.json();
  const tbody = document.querySelector("#tabela-livros tbody");
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
  const titulo = document.getElementById("livro-titulo").value;
  const autor = document.getElementById("livro-autor").value;
  await fetch("save_livro.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ titulo, autor })
  });
  listarLivros();
}

async function atualizarLivro(id) {
  const titulo = document.getElementById(`titulo-${id}`).value;
  const autor = document.getElementById(`autor-${id}`).value;
  await fetch("update_livro.php", {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id, titulo, autor })
  });
  listarLivros();
}

async function removerLivro(id) {
  await fetch("delete_livro.php?id=" + id, { method: "DELETE" });
  listarLivros();
}

async function listarLocais() {
  const res = await fetch("list_local.php");
  const locais = await res.json();
  const tbody = document.querySelector("#tabela-locais tbody");
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
  const descricao = document.getElementById("local-descricao").value;
  await fetch("save_local.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ descricao })
  });
  listarLocais();
}

async function atualizarLocal(id) {
  const descricao = document.getElementById(`descricao-${id}`).value;
  await fetch("update_local.php", {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id, descricao })
  });
  listarLocais();
}

async function removerLocal(id) {
  await fetch("delete_local.php?id=" + id, { method: "DELETE" });
  listarLocais();
}

async function salvarItem() {
  const nome = document.getElementById("item-nome").value;
  const quantidade = parseInt(document.getElementById("item-quantidade").value);
  await fetch("save_item.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ nome, quantidade })
  });
  alert("Item salvo com sucesso!");
}

window.onload = () => {
  listarLivros();
  listarLocais();
};
