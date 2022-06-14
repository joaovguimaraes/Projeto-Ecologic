<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/styles/dashFinish.css">
   <link rel="shortcut icon" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
   <script src="https://kit.fontawesome.com/e54de00844.js" crossorigin="anonymous"></script>
   <title>EcoLogic</title>
</head>

<body>
{% if error != ''%}
   <div class='error'>{{error.msg}}!</div>
{% endif %}
<div id="modal-remove">
      <div class="modal-remove-display">
         <div class="modal-remove-text">
            <h2>Tem certeza?</h2>
            <p>Uma vez que editado não terá mais como recuperar o dado!</p>
         </div>
         <div class="modal-remove-button">
            <button id="button-remove-modal" onclick='modalRemoveClose()' class="button-display">Cancelar</button>
            <input id="button-confirm-modal" class="button-display add" type="submit" form="calculator-display" value="Confirmar"/>
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

   <div id="calculator">
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

      <form method='POST' action='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/dashVeiculo/update/{{veiculo.id}}' id="calculator-display">
         <div style='background:#fff; padding: 25px; border: 2px solid #000'>
            <p class='tag' style='font-size:1.4rem; margin-bottom: 15px' 
            {% if veiculo.disponivel == 0 %}
                  style='background-color: red'
               {% endif %}
            >
               {% if veiculo.disponivel == 0 %}
                  Indisponível
               {% else %}
                  Disponível
               {% endif %}
            </p>
            <h1>
               #{{veiculo.id}} 
               <input type="text" name='model' value='{{veiculo.modelo}}'>
            </h1>
            <br>

            <h4>Ano: <input type="number" name="year" placeholder="Apenas números" value='{{veiculo.ano}}'></h4>
            <h4>Placa: <input type="text" name="plate" placeholder="EX: RIO3A23" value='{{veiculo.placa}}'></h4>
            <h4>Autonomia: <input type="number" name="autonomy" lang="en" step="0.01" placeholder="Apenas números" value='{{veiculo.autonomia}}'></h4>
            <br>
            <button
               class='button'
            >
               Salvar
            </button>
   
         </div>
      </form>
   </div>
</body>
</html>