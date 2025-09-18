async function removerpessoa(elemento) {
    var elementoRemover = document.querySelector("#" + elemento);
    elementoRemover.remove();
    await removerBanco(elemento.substring(1, elemento.length));
    console.log(elemento);
}

async function removerBanco(idElemento) {
    await fetch('http://localhost:8080/delete.php?id=' + idElemento, {
        method: 'DELETE'
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            console.log(response.text);
        })
        .then((data) => {
            console.log('Data fetched:', data);
        })
        .catch((error) => {
            console.error('Fetch error:', error);
        });
}

async function atualizarpessoa(elemento) {
    var elementoAtualizar = document.querySelector("#" + elemento);
    var nome = elementoAtualizar.querySelector(".valor-nome");
    var cpf = elementoAtualizar.querySelector(".valor-cpf");
    var endereco = elementoAtualizar.querySelector(".valor-endereco");
    await atualizarBanco(elemento.substring(1, elemento.length), nome.value, cpf.value, endereco.value);
}

async function atualizarBanco(idElemento, nome, cpf, endereco) {
    await fetch('http://localhost:8080/update.php', {
        method: 'PUT',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": idElemento,
            "nome": nome,
            "cpf": cpf,
            "endereco": endereco
        })
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            console.log(response.json());
        })
        .then((data) => {
            console.log('Data fetched:', data);
        })
        .catch((error) => {
            console.error('Fetch error:', error);
        });
}
 function validarFormulario(form) {
    var camposInvalidos = [];
    for (let i = 0; i < form.target.elements.length; i++) {
        const element = form.target.elements[i];
        if (element.name && element.value) {
            if (element.value == null || element.value == undefined || element.value == null)
                camposInvalidos.push(element.name);
        }
    }
    return camposInvalidos;
}
async function salvarPessoa(nome, cpf, endereco) {
        await fetch('http://localhost:8080/save.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
            body: JSON.stringify({
                "nome": nome, "cpf": cpf, "endereco": endereco
            })
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                console.log(response);
            })
            .then((data) => {
                console.log('Data fetched:', data);
            })
            .catch((error) => {
                console.error('Fetch error:', error);
            });
    }
    const formElement = document.querySelector('#form-pessoa');
    formElement.addEventListener('submit', async function (event) {
        // Prevent the default form submission
        event.preventDefault();
        const formData = new FormData(event.target); // event.target refers to the form
        console.log("validando 1");
        var erros = validarFormulario(event);
        console.log("validando 2");
        if (erros.length > 0) {
            alert(erros);
            //se o formulário não for válido, irá parar a operação por aqui e mostrar os 
            //campos pendentes de preenchimento
            return;
        }
        console.log(formData.get("nome"));

        //segue para enviar para o back-end
        await salvarPessoa(formData.get("nome"),formData.get("cpf"),formData.get("endereco"));
    })