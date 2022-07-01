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
         <div style='display: flex; justify-content:space-between; margin-inline: 3%; margin-top: 3%'>
            <div >
               <p><strong>Total de CO2 emitido:</strong></p>
               <p><strong>Média de CO2 emitido:</strong></p>
            </div>
            <div >
               <p><strong>Distância total percorrida:</strong></p>
               <p><strong>Média de distância por chamado:</strong></p>
            </div>
         </div>
         
         <form id="form-display" method="POST" class="display-item-list">
            {% if chamados|length > 0 %}
               {% for chamado in chamados %}
                  <div class="label-display">
                     <div class="display-bar-item">
                        <div>
                           
                           <h3>#{{chamado.id}} </h3>
                           <h2>{{chamado.local}}</h2>
                           <div style='display: flex; gap:5px;'>
                              <p>Co2: {{function.calcCo2(chamado.id)|number_format(2)}} Kg</p>
                           </div>
                        </div>
                        <div>
                           <p>{{chamado.data}} </p>
                           <h2>{{chamado.nome}}</h2>
                           <h3>{{chamado.modelo}}</h3>
                        </div>
                     </div>
                  </div>
               {%endfor%}
            {% else %}
            <p class='no-data'>Sem relatórios disponíveis para esse período!</p>
            {% endif %}
         </form>
      </div>
   </section>
</body>

</html>