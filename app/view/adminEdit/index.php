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

<div id="calculator">
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

      <form method='POST' action='http://localhost/Ecologic/dashAdmin/update/{{user.id}}' id="calculator-display">
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