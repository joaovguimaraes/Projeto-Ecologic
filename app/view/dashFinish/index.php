<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://localhost/Ecologic/assets/styles/dashFinish.css">
   <link rel="shortcut icon" href="http://localhost/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
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

            <form class="modal-add-input" method="POST" action="http://localhost/Ecologic/dashboard/finish/{{chamado.id}}">

               <p class="paragraph">Kilometragem do carro</p>
               <input type="number" name="km_entry" placeholder="Apenas números">
               
               <div class="modal-add-button" style='margin-top: 20px'>
                  <button id="button-confirm-modal" class="button-display">Confirmar</button>
                  <button id="button-remove-modal" type="button" onclick='modalAddClose()' class="button-display add">Cancelar</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <nav id="header">
      <div id="header-links">
         <a href="http://localhost/Ecologic/home">
            <img id="logo" height="57" src="http://localhost/Ecologic/assets/images/logo.svg" alt="Ecologic">
         </a>
      </div>
      <div class='div-username'>
         <p class='username'>{{usr.name_user}}, <a class="links" href="http://localhost/Ecologic/dashboard/logout">Sair</a> </p>
      </div>
   </nav>

   <section id="calculator">

      <div id="calculator-options">
         <button class="calculator-bar-item" onclick="location.href='http://localhost/Ecologic/dashboard'">
            <div class="animation-bar-item">
               <h3>Chamada</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="location.href='http://localhost/Ecologic/dashVeiculo'">
            <div class="animation-bar-item">
               <h3>Carros</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         <button class="calculator-bar-item" onclick="location.href='http://localhost/Ecologic/dashFuncionario'">
            <div class="animation-bar-item">
               <h3>Funcionário</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>

         {% if usr.admin == 1 %}
            <button class="calculator-bar-item" onclick="location.href='http://localhost/Ecologic/dashAdmin'">
               <div class="animation-bar-item">
                  <h3>Admin</h3>
               </div>
               <i class="fa-solid fa-angle-right"></i>
            </button>    
         {% endif %}
      </div>

      <div id="calculator-display">
         <div style='background:#fff; padding: 25px; border: 2px solid #000'>
            <a href="http://localhost/Ecologic/dashboard"><i class="fa-solid fa-angle-left"></i> Voltar</a>
            <br>
            <p class='tag' {% if chamado.concluido == 0 %}
                  style='background-color: red'
               {% endif %}
            >
               {% if chamado.concluido == 0 %}
                  Inconcluído
               {% else %}
                  Concluído
               {% endif %}
            </p>
            <h1>#{{chamado.id}} {{chamado.local}} </h1>
            <h4>{{chamado.data}}</h4>
            <br>
            <h2>Condutor: {{chamado.nome}}</h2>
            <h3>Carro: {{chamado.modelo}}</h3>
            <h3>KG de Co2: 
               {% if chamado.concluido %}
                  {{function.calcCo2(chamado.id)|number_format(2)}}
               {% else %}
                  0
               {% endif %}
            </h3>
            <br>
            <h4>Quilometragem na saída: {{chamado.km_saida|number_format()}}</h4>
            <h4>Quilometragem na volta: {{chamado.km_entrada|number_format()}}</h4>
            <br>
            <button
               class='button'
               onclick="modalAddOpen()"
               {% if chamado.concluido == 1 %}
                  disabled
               {% else %}
               {% endif %}
            >
            Concluir
            </button>
            <a style='margin-left: 15px'href="http://localhost/Ecologic/dashboard/edit/{{chamado.id}}"><i class="fa-solid fa-pencil"></i> Editar</a>
         </div>
      </div>
   </section>
   <script>
      var modalAdd = document.getElementById("modal-add");

      function modalAddOpen() {
         modalAdd.style.display = "flex";
      }

      function modalAddClose() {
         modalAdd.style.display = "none";
      }

      window.onclick = function (event) {
         if (event.target == modalAdd) {
            modalAdd.style.display = "none";
         }
      }
   </script>
   
</body>

</html>