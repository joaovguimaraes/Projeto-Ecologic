<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/styles/dashFuncionario.css">
   <link rel="shortcut icon" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
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
            <form class="modal-add-input" method="POST" action="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashAdmin/insert">
               <p class="paragraph">Nome</p>
               <input type="name" name="name" placeholder="Nome">

               <p class="paragraph">E-mail</p>
               <input type="email" name="email" placeholder="E-mail">
               
               <p class="paragraph">Senha</p>
               <input type="number" name="cnh" placeholder="Apenas números">
               
               <p class="paragraph">Confirmar Senha</p>
               <input type="number" name="cnh" placeholder="Apenas números">

               <div class="modal-add-button" style='margin-top: 20px'>
                  <button id="button-confirm-modal" class="button-display">Confirmar</button>
                  <button id="button-remove-modal" type='button' onclick='modalAddClose()' class="button-display add">Cancelar</button>
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
         <a href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/home">
            <img id="logo" height="57" src="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/logo.svg" alt="Ecologic">
         </a>
      </div>
      <div class='div-username'>
         <p class='username'>{{usr.name_user}}, <a class="links" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashboard/logout">Sair</a> </p>
      </div>
   </nav>

   <section id="calculator">

   <div id="calculator-options">
         <button class="calculator-bar-item" onclick="location.href='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashboard'">
            <div class="animation-bar-item">
               <h3>Chamada</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="location.href='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashVeiculo'">
            <div class="animation-bar-item">
               <h3>Carros</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         <button class="calculator-bar-item" onclick="location.href='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashFuncionario'">
            <div class="animation-bar-item">
               <h3>Funcionário</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         {% if usr.admin == 1 %}
            <button class="calculator-bar-item" onclick="location.href='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashAdmin'">
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

         <form id="form-display" method="POST" action="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashAdmin/delete" class="display-item-list">
            {% for usuario in usuarios %}
               <input type="checkbox" name="{{usuario.id}}" value="{{usuario.id}}" id="{{usuario.id}}" style="display: none;" />
               <label for="{{usuario.id}}" class="label-display">
                  <div class="display-bar-item">
                     <div>
                        <h3>#{{usuario.id}}</h3>
                        <h2>{{usuario.nome}}</h2>
                        <div 

                           style='display: flex; gap: 15px'> 
                           <p
                           {% if usuario.admin == 1 %}
                             style='background: red;'
                           {% endif %}
                           >
                              {% if usuario.admin == 0 %}
                                 User
                              {% else %}
                                 Admin
                              {% endif %}
                           </p>
                           <a href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashAdmin/edit/{{usuario.id}}">Editar</a>
                        </div>
                     </div>
                     <div>
                        <h3>E-mail: {{usuario.email}}</h3>
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