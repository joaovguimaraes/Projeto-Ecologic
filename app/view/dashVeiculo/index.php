<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/styles/dashVeiculo.css">
   <link rel="shortcut icon" href="assets/images/Simbol - Ecologic.svg" type="image/svg">
   <script src="https://kit.fontawesome.com/e54de00844.js" crossorigin="anonymous"></script>
   <title>EcoLogic</title>
</head>

<body>
   {% if error != ''%}
      <div class='error'>{{error.msg}}!</div>
   {% endif %}
   <div id="modal-add">
      <div class="modal-add-display">
         <div>
            <div class="modal-add-text">
               <h2>Adicionar</h2>
            </div>

            <form class="modal-add-input" method="POST" action="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashVeiculo/insert">
               <p class="paragraph">Modelo do Carro</p>
               <input type="model" name="model" placeholder="Modelo">

               <p class="paragraph">Ano</p>
               <input type="number"  name="year" placeholder="Ex: 2004">
               
               <p class="paragraph">Autonomia</p>
               <input type="number" name="autonomy" lang="en" step="0.01" placeholder="Ex: 1.34">

               <p class="paragraph">Placa</p>
               <input type="text" name="plate" maxlength="7" placeholder="Ex: ABC3423">

               <div class="modal-add-button" style='margin-top: 20px'>
                  <button id="button-confirm-modal" class="button-display">Confirmar</button>
                  <button id="button-remove-modal" class="button-display add" type='button' onclick='modalAddClose()'>Cancelar</button>
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
            <button id="button-remove-modal" class="button-display" type='button' onclick='modalRemoveClose()'>Cancelar</button>
            <input id="button-confirm-modal" class="button-display add" type="submit" form="form-display" value="Confirmar"/>
         </div>
      </div>
   </div>

   <nav id="header">
      <div id="header-links">
         <a href="http://ec2-52-90-93-141.compute-1.amazonaws.com/home">
            <img id="logo" height="57" src="assets/images/logo.svg" alt="Ecologic">
         </a>
      </div>
      <div class='div-username'>
         <p class='username'>{{usr.name_user}}, <a class="links" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/logout">Sair</a> </p>
      </div>
   </nav>

   <section id="calculator">

      <div id="calculator-options">
         <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard'">
            <div class="animation-bar-item">
               <h3>Chamada</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashVeiculo'">
            <div class="animation-bar-item">
               <h3>Carros</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario'">
            <div class="animation-bar-item">
               <h3>Funcionário</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         {% if usr.admin == 1 %}
            <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin'">
               <div class="animation-bar-item">
                  <h3>Admin</h3>
               </div>
               <i class="fa-solid fa-angle-right"></i>
            </button>    
         {% endif %}
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

         <form id="form-display" method="POST" action="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashVeiculo/delete" class="display-item-list">
            {% for veiculo in veiculos %}
               <input type="checkbox" name="{{veiculo.id}}" value="{{veiculo.id}}" id="{{veiculo.id}}" style="display: none;" />
               <label for="{{veiculo.id}}" class="label-display">
                  <div class="display-bar-item">
                     <div>
                        <h3>#{{veiculo.id}}</h3>
                        <h2>{{veiculo.modelo}}</h2>

                        <div style='display: flex; gap: 15px'> 
                           <p {% if veiculo.disponivel == 0 %}
                                 style='background-color: red'
                              {% endif %}
                           >
                              {% if veiculo.disponivel == 0 %}
                                 Indisponível
                              {% else %}
                                 Disponível
                              {% endif %}
                           </p>
                           <a href="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashVeiculo/edit/{{veiculo.id}}"> Editar</a>
                        </div>
                     </div>
                     <div >   
                        <p>Ano: {{veiculo.ano}}</p>
                        <h3>Placa: {{veiculo.placa}}</h3>
                        <p>Autonomia: {{veiculo.autonomia}}</p>           
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

      function modalAddClose() {
         modalAdd.style.display = "none";
      }
      
      function modalRemoveClose() {
         modalRemove.style.display = "none";
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