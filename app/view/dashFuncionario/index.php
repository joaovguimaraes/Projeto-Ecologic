<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://localhost:8080/Ecologic/assets/styles/dashFuncionario.css">
   <link rel="shortcut icon" href="http://localhost:8080/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
   <script src="https://kit.fontawesome.com/e54de00844.js" crossorigin="anonymous"></script>
   <title>EcoLogic</title>
</head>

<body>
   
   <div id="modal-add">
      <div class="modal-add-display">
         <div>
            <div class="modal-add-text">
               <h2>Adicionar</h2>
            </div>

            <form class="modal-add-input" method="POST" action="http://localhost:8080/Ecologic/dashFuncionario/insert">
               <p class="paragraph">Nome</p>
               <input type="name" name="name" placeholder="Nome">

               <p class="paragraph">Celular</p>
               <input type="tel" name="contact" placeholder="Apenas números">
               
               <p class="paragraph">CNH</p>
               <input type="number" name="cnh" placeholder="Apenas números">

               <div class="modal-add-button" style='margin-top: 20px'>
                  <button id="button-confirm-modal" class="button-display">Confirmar</button>
                  <button id="button-remove-modal" class="button-display add">Cancelar</button>
               </div>
            </form>
         </div>

      </div>
   </div>

   <div id="modal-remove">
      <div class="modal-remove-display">
         <div class="modal-remove-text">
            <h2>Tem certeza?</h2>
            <p>Uma vez que excluir não terá mais como recuperar o dado!</p>
         </div>
         <div class="modal-remove-button">
            <button id="button-remove-modal" class="button-display">Cancelar</button>
            <input id="button-confirm-modal" class="button-display add" type="submit" form="form-display" value="Confirmar"/>

         </div>
      </div>
   </div>

   <nav id="header">
      <div id="header-links">
         <a href="http://localhost:8080/Ecologic/home">
            <img id="logo" height="57" src="http://localhost:8080/Ecologic/assets/images/logo.svg" alt="Ecologic">
         </a>
      </div>
      <div class='div-username'>
         <p class='username'>{{name_user}}, <a class="links" href="http://localhost:8080/Ecologic/dashboard/logout">Sair</a> </p>
      </div>
   </nav>

   <section id="calculator">

      <div id="calculator-options">
         <button class="calculator-bar-item" onclick="location.href='http://localhost:8080/Ecologic/dashboard'">
            <div class="animation-bar-item">
               <h3>Chamada</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="location.href='http://localhost:8080/Ecologic/dashVeiculo'">
            <div class="animation-bar-item">
               <h3>Carros</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="location.href='http://localhost:8080/Ecologic/dashFuncionario'">
            <div class="animation-bar-item">
               <h3>Funcionário</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
      </div>

      <div id="calculator-display">
         <div id="display-buttons">
            <div class="buttons-display-div">
               <button class="button-display" onclick="modalAddOpen()"><strong>Adicionar</strong></button>
            </div>
            <div class="buttons-display-div">
               <button id="button-remove" onclick="modalRemoveOpen()" class="button-icon-display remove">
                  <i class="fa-regular fa-trash-can"></i>
               </button>
            </div>
         </div>

         <form id="form-display" method="POST" action="http://localhost:8080/Ecologic/dashFuncionario/delete" class="display-item-list">
            {% for funcionario in funcionarios %}
               <input type="checkbox" name="{{funcionario.id}}" value="{{funcionario.id}}" id="{{funcionario.id}}" style="display: none;" />
               <label for="{{funcionario.id}}" class="label-display">
                  <div class="display-bar-item">
                     <div>
                        <h3>#{{funcionario.id}}</h3>
                        <h2>{{funcionario.nome}}</h2>
                        <p {% if funcionario.disponivel == 0 %}
                              style='background-color: red'
                           {% endif %}
                        >
                           {% if funcionario.disponivel == 0 %}
                              Indisponível
                           {% else %}
                              Disponível
                           {% endif %}
                        </p>
                     </div>
                     <div>
                        <p>Celular: {{funcionario.contato}}</p>
                        <h3>CNH: {{funcionario.cnh}}</h3>
                     </div>
                  </div>
               </label>
            {%endfor%}
         </form>
      </div>
   </section>

   <script>
      var modalRemove = document.getElementById("modal-remove");

      var modalAdd = document.getElementById("modal-add");

      function modalAddOpen() {
         modalAdd.style.display = "flex";
      }

      function modalRemoveOpen() {
         modalRemove.style.display = "flex";
      }

      window.onclick = function (event) {
         if (event.target == modalAdd) {
            modalAdd.style.display = "none";
         }
         if (event.target == modalRemove) {
            modalRemove.style.display = "none";
         }
      }

   </script>
</body>

</html>