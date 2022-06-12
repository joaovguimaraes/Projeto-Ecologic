<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://localhost:8080/Ecologic/assets/styles/dashboard.css">
   <link rel="shortcut icon" href="http://localhost:8080/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
   <script src="https://kit.fontawesome.com/e54de00844.js" crossorigin="anonymous"></script>
   <title>EcoLogic</title>
</head>

<body>
   
   <div id="modal-remove">
      <div class="modal-remove-display">
         <div class="modal-remove-text">
            <h2>Tem certeza?</h2>
            <p>Uma vez que excluir não terá mais como recuperar o dado!</p>
         </div>
         <div class="modal-remove-button">
            <button id="button-remove-modal" class="button-display">Cancelar</button>
            <button id="button-confirm-modal" class="button-display add">Confirmar</button>
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
               <button class="button-display"><strong>Calcular</strong></button>
               <button class="button-display add"><strong>Adicionar +</strong></button>
            </div>
            <div class="buttons-display-div">
               <button id="button-remove" onclick="modalRemoveOpen()" class="button-icon-display remove">
                  <i class="fa-regular fa-trash-can"></i>
               </button>
            </div>
         </div>

         <div class="display-item-list">
            {% for chamado in chamados %}
               <input type="checkbox" name="{{chamado.id}}" value="{{chamado.id}}" id="{{chamado.id}}" style="display: none;" />
               <label for="{{chamado.id}}" class="label-display">
                  <div class="display-bar-item">
                     <div>
                        <h3>#{{chamado.id}}</h3>
                        <h2>{{chamado.local}}</h2>
                        <p {% if chamado.concluido == 0 %}
                              style='background-color: red'
                           {% endif %}
                        >
                           {% if chamado.concluido == 0 %}
                              Inconcluído
                           {% else %}
                              Concluído
                           {% endif %}
                        </p>
                     </div>

                     <div>
                        <p>Celular: {{chamado.data}}</p>
                        <h3>CNH: {{chamado.id_func}}</h3>
                        <h3>CNH: {{chamado.id_veiculo}}</h3>
                     </div>
                  </div>
               </label>
            {%endfor%}
         </div>
      </div>
   </section>

   <script>
      var modalRemove = document.getElementById("modal-remove");

      var modalFilter = document.getElementById("modal-filter");

      function modalFilterOpen() {
         modalFilter.style.display = "flex";
      }

      function modalRemoveOpen() {
         modalRemove.style.display = "flex";
      }

      window.onclick = function (event) {
         if (event.target == modalFilter) {
            modalFilter.style.display = "none";
         }
         if (event.target == modalRemove) {
            modalRemove.style.display = "none";
         }
      }
   </script>
</body>

</html>