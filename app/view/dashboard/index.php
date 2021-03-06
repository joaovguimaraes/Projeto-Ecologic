<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/styles/dashboard.css">
   <link rel="shortcut icon" href="/assets/images/Simbol - Ecologic.svg" type="image/svg">
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

            <form class="modal-add-input" method="POST" action="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/insert">
               <p class="paragraph">Endereço de destino</p>
               <input type="text" name="local" placeholder="Local">

               <p class="paragraph">Quilometragem do carro</p>
               <input type="number" name="km_out" placeholder="Apenas números">
               
               <p class="paragraph">Funcionario</p>
               <select id="funcionarios" name="funcionarios">
                  {% for funcionario in funcionarios %}
                     <option value="{{funcionario.id}}">{{funcionario.nome}}</option>
                  {%endfor%}
               </select>

               <p class="paragraph">Veiculo</p>
               <select id="veiculos" name="veiculos">
                  {% for veiculo in veiculos %}
                     <option value="{{veiculo.id}}">{{veiculo.modelo}}</option>
                  {%endfor%}
               </select>

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
            <button id="button-remove-modal" class="button-display" type='button' onclick='modalRemoveClose()' >Cancelar</button>
            <input id="button-confirm-modal" onclick='handleDelete()' class="button-display add" type="submit" value="Confirmar"/>
         </div>
      </div>
   </div>

   <div id="modal-calculate">
      <div class="modal-calculate-display">
         <form class="modal-add-input" method="POST" action="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/calculate">
            <div class="modal-calculate-text">
               <h2>Calcular</h2>
               <p>Selecione o pediodo desejado</p>
               <p>Data de inicio</p>
               <input type="date" name="date_start">
               <p>Data de Final</p>
               <input type="date" name="date_end">
            </div>
            <div class="modal-calculate-button" style='margin-top: 10px'>
               <button id="button-remove-modal" class="button-display" type='button' onclick='modalCalculateClose()' >Cancelar</button>
               <input id="button-confirm-modal" onclick='' class="button-display add" type="submit" value="Confirmar"/>
            </div>
         </form>
      </div>
      
   </div>

   <nav id="header">
      <div id="header-links">
         <a href="http://ec2-52-90-93-141.compute-1.amazonaws.com/home">
            <img id="logo" height="57" src="/assets/images/logo.svg" alt="Ecologic">
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
               <h3>Chamado</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashVeiculo'">
            <div class="animation-bar-item">
               <h3>Veículo</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario'">
            <div class="animation-bar-item">
               <h3>Funcionário</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         
            <button class="calculator-bar-item" onclick="location.href='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin'">
               <div class="animation-bar-item">
                  <h3>Admin</h3>
               </div>
               <i class="fa-solid fa-angle-right"></i>
            </button>    

      </div>
      
      <div id="calculator-display">
         <div id="display-buttons">
            <div class="buttons-display-div">
               <button class="button-display" onclick="modalCalculateOpen()"><strong>Calcular</strong></button>
               <button class="button-display add" onclick="modalAddOpen()"><strong>Adicionar +</strong></button>
            </div>
            <div class="buttons-display-div">
               <button id="button-remove" onclick="modalRemoveOpen()" class="button-icon-display remove">
                  <i class="fa-regular fa-trash-can"></i>
               </button>
            </div>
         </div>

         <form id="form-display" method="POST" class="display-item-list">
            {% for chamado in chamados %}
               <input type="checkbox" name="{{chamado.id}}" value="{{chamado.id}}" id="{{chamado.id}}" style="display: none;" />
               <label for="{{chamado.id}}" class="label-display">
                  <div class="display-bar-item">
                     <div>
                        
                        <h3>#{{chamado.id}} </h3>
                        <h2>{{chamado.local}}</h2>
                        <div style='display: flex; gap:5px;'>
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
                           <a href="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/open/{{chamado.id}}">Mais Informações</a>
                        </div>
                     </div>
                     <div>
                        
                        <p>{{chamado.data}} </p>
                        <h2>{{chamado.nome}}</h2>
                        <h3>{{chamado.modelo }}</h3>
                     </div>
                     
                  </div>
                  
               </label>
               
            {%endfor%}
         </form>
         
      </div>
   </section>

   <script>
      form = document.getElementById("form-display");

      function handleDelete() {
         form.action="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/delete";
         form.submit();
      }
      function handleFinish() {
         form.action="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/finish";
         form.submit();
      }
      
      var modalRemove = document.getElementById("modal-remove");

      var modalAdd = document.getElementById("modal-add");

      var modalCalculate = document.getElementById("modal-calculate");

      function modalAddOpen() {
         modalAdd.style.display = "flex";
      }

      function modalCalculateOpen() {
         modalCalculate.style.display = "flex";
      }

      function modalRemoveOpen() {
         modalRemove.style.display = "flex";
      }

      function modalAddClose() {
         modalAdd.style.display = "none";
      }

      function modalCalculateClose() {
         modalCalculate.style.display = "none";
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
         if (event.target == modalCalculate) {
            modalCalculate.style.display = "none";
         }
      }
   </script>
</body>

</html>