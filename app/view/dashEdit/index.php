<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/assets/styles/dashFinish.css">
   <link rel="shortcut icon" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/assets/images/Simbol - Ecologic.svg" type="image/svg">
   <script src="https://kit.fontawesome.com/e54de00844.js" crossorigin="anonymous"></script>
   <title>EcoLogic</title>
</head>

<body>
   {% if error != ''%}
      <div class='error'>{{error.msg}}!</div>
   {% endif %}
   <nav id="header">
      <div id="header-links">
         <a href="http://ec2-52-90-93-141.compute-1.amazonaws.com/home">
            <img id="logo" height="57" src="http://ec2-52-90-93-141.compute-1.amazonaws.com/assets/images/logo.svg" alt="Ecologic">
         </a>
      </div>
      <div class='div-username'>
         <p class='username'>{{usr.name_user}}, <a class="links" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/logout">Sair</a> </p>
      </div>
   </nav>

<div id="calculator">
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

      <form method='POST' action='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/update/{{chamado.id}}' id="calculator-display">
         <div style='background:#fff; padding: 25px; border: 2px solid #000'>
            <p class='tag' style='font-size:1.4rem; margin-bottom: 15px' {% if chamado.concluido == 0 %}
                  style='background-color: red'
               {% endif %}
            >
               {% if chamado.concluido == 0 %}
                  Inconcluído
               {% else %}
                  Concluído
               {% endif %}
            </p>
            <h1>
               #{{chamado.id}} 
               <input type="text" name='local' value='{{chamado.local}}'>
            </h1>
            <h4>{{chamado.data}}</h4>
            <br>
            <h2>Condutor:                
               <select id="funcionarios" name="funcionarios">
                  <option value="{{chamado.id_func}}">{{chamado.nome}}</option>
                  {% for funcionario in funcionarios %}
                     {% if chamado.nome != funcionario.nome %}
                        <option value="{{funcionario.id}}">{{funcionario.nome}}</option>
                     {% endif %}
                  {%endfor%}
               </select>
            </h2>
            <h3>Carro: 
               <select id="veiculos" name="veiculos">
                  <option value="{{chamado.id_veiculo}}">{{chamado.modelo}}</option>
                  {% for veiculo in veiculos %}
                     {% if chamado.modelo != veiculo.modelo %}
                        <option value="{{veiculo.id}}">{{veiculo.modelo}}</option>
                     {% endif %}
                  {%endfor%}
               </select>   
            </h3>
            <h3>KG de Co2: 
               {% if chamado.concluido %}
                  {{function.calcCo2(chamado.id)|number_format(2)}}
               {% else %}
                  0
               {% endif %}
            </h3>
            <br>
            <h4>Quilometragem na saída:  <input type="number" name="km_out" placeholder="Apenas números" value='{{chamado.km_saida}}'></h4>
            <h4>Quilometragem na volta: 
               {% if chamado.concluido %}
                  <input type="number" name="km_entry" placeholder="Apenas números" value='{{chamado.km_entrada}}'>
               {% else %}
                  0
               {% endif %}
            </h4>
            <br>
            <button >
               Salvar
            </button>
   
         </div>
      </form>
   </div>
   <script>
      var modalAdd = document.getElementById("modal-add");

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