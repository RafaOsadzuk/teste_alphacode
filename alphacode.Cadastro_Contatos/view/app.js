const form = document.querySelector('form');
const tabelaContatos = document.querySelector('#tbody-contatos');


form.addEventListener('submit', (e) => {
 
  e.preventDefault();

 
  const nome = document.querySelector('#nome').value;
  const dataNascimento = document.querySelector('#date').value;
  const email = document.querySelector('#email').value;
  const celular = document.querySelector('#celular').value;

  
  const linha = document.createElement('tr');

 
  linha.innerHTML = `
    <td>${nome}</td>
    <td>${dataNascimento}</td>
    <td>${email}</td>
    <td>${celular}</td>
    <td>
       <img src="/alphacode.Cadastro_Contatos/assets/editar.png" class="editar" title="Editar">
      <img src="/alphacode.Cada
      stro_Contatos/assets/excluir.png" class="excluir" title="Excluir">
    </td>
  `;

  const formData = {
    nome,
    dataNascimento,
    email,
    celular
  };

  
  fetch('/salvar-contato', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(formData)
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error(error));
  
  tabelaContatos.appendChild(linha);

  form.reset();
});