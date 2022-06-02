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

   <div id="modal-filter">
      <div class="modal-filter-display">
         <div class="modal-filter-text">
            <h2>Filtro</h2>
            <p>Insira abaixo a data referente ao periodo que deseja filtrar</p>
         </div>
         <div class="modal-filter-input">
            <p>De</p>
            <input type="month" name="Data" id="data-after">
            <p>Até</p>
            <input type="month" name="Data" id="data-after">
         </div>
         <div class="modal-filter-button">
            <button id="button-confirm-modal" class="button-display">Confirmar</button>
            <button id="button-remove-modal" class="button-display add">Cancelar</button>
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
            <button id="button-confirm-modal" class="button-display add">Confirmar</button>
         </div>
      </div>
   </div>
   <nav id="header">
      <div id="header-links">
         <a href="../home/index.html">
            <img id="logo" height="57" src="http://localhost:8080/Ecologic/assets/images/logo.svg" alt="Ecologic">
         </a>
      </div>
      <a class="links" href="http://localhost:8080/Ecologic/dashboard/logout">Sair</a>
   </nav>

   <section id="calculator">

      <div id="calculator-options">
         <button class="calculator-bar-item" onclick="openTab('Chamada')">
            <div class="animation-bar-item">
               <h3>Chamada</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="openTab('Corridas')">
            <div class="animation-bar-item">
               <h3>Corridas</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="openTab('Carros')">
            <div class="animation-bar-item">
               <h3>Carros</h3>
            </div>
            <i class="fa-solid fa-angle-right"></i>
         </button>
         <button class="calculator-bar-item" onclick="openTab('Funcionario')">
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
               <button id="button-filter" onclick="modalFilterOpen()" class="button-icon-display filter">
                  <i class="fa-solid fa-filter"></i>
               </button>
               <button id="button-remove" onclick="modalRemoveOpen()" class="button-icon-display remove">
                  <i class="fa-regular fa-trash-can"></i>
               </button>
            </div>
         </div>

         <div class="display-item-list">

            <input type="checkbox" name="rGroup" value="1" id="a" style="display: none;" />
            <label for="a" class="label-display">
               <div class="display-bar-item">
                  <div>
                     <h3>#01</h3>
                     <h2>Rua da Mariquinha</h2>
                     <p>13 km</p>
                  </div>
                  <div>
                     <p>Fiat Uno 2001</p>
                     <h3>João da Silva</h3>
                     <p>06/06/06</h3>
                  </div>
               </div>
            </label>

            <input type="checkbox" name="rGroup" value="1" id="b" style="display: none;" />
            <label for="b" class="label-display">
               <div class="display-bar-item">
                  <div>
                     <h3>#02</h3>
                     <h2>Servidão João Magalhães</h2>
                     <p>0.5 km</p>
                  </div>
                  <div>
                     <p>Fiat Palio 2008</h3>
                     <h3>Rogerinho do Ínga</h3>
                     <p>20/08/22</h3>
                  </div>
               </div>
            </label>
            <input type="checkbox" name="rGroup" value="1" id="c" style="display: none;" />
            <label for="c" class="label-display">
               <div class="display-bar-item">
                  <div>
                     <h3>#03</h3>
                     <h2>Rua da Figueira</h2>
                     <p>10 km</p>
                  </div>
                  <div>
                     <p>Ford KA 2011</p>
                     <h3>Supla</h3>
                     <p>18/09/15</h3>
                  </div>
               </div>
            </label>
            <input type="checkbox" name="rGroup" value="1" id="d" style="display: none;" />
            <label for="d" class="label-display">
               <div class="display-bar-item">
                  <div>
                     <h3>#04</h3>
                     <h2>Rua Mariquinha</h2>
                     <p>13 km</p>
                  </div>
                  <div>
                     <p>Lamborghini Huracán 2020</p>
                     <h3>Mariquinha da Chica</h3>
                     <p>26/02/19</h3>
                  </div>
               </div>
            </label>
            <input type="checkbox" name="rGroup" value="1" id="e" style="display: none;" />
            <label for="e" class="label-display">
               <div class="display-bar-item">
                  <div>
                     <h3>#05</h3>
                     <h2>Rua Mariquinha</h2>
                     <p>13 km</p>
                  </div>
                  <div>
                     <p>Fiat Uno 2001</p>
                     <h3>Rogerinho do Ínga</h3>
                     <p>12/12/12</h3>
                  </div>
               </div>
            </label>

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