<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/styles/dashFinish.css">
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

<div id="calculator">
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

      <form method='POST' action='http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin/update/{{user.id}}' id="calculator-display">
         <div style='background:#fff; padding: 25px; border: 2px solid #000'>
            <p class='tag' style='font-size:1.4rem; margin-bottom: 15px' {% if chamado.concluido == 0 %}
                  style='background-color: red'
               {% endif %}
            >
               {% if user.admin == 0 %}
                  User
               {% else %}
                  Admin
               {% endif %}
            </p>
            <h1>
               #{{user.id}} 
               <br>
               <input type="text" name='name' value='{{user.nome}}'>
               Email:
               <input type="email" name='email' value='{{user.email}}'>
            </h1>
            <br>
            <h4>Antiga Senha: <input type="password" name='old_pass' placeholder='Coloque sua antiga senha'>
            <h4>Trocar senha:  <input type="password" name='pass' placeholder='Senha deve ter mais de 6 dígitos'></h4>
            <h4>Confirmar: <input type="password" name='confirm_pass' placeholder='Repita a senha'>
            </h4>
            <br>
            <button class='button'>
               Salvar
            </button>
   
         </div>
      </form>
   </div>
   
</body>

</html>