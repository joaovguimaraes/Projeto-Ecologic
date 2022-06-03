<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://localhost:8080/Ecologic/assets/styles/login.css">
   <title>EcoLogic</title>
   <link rel="shortcut icon" href="http://localhost:8080/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
</head>

<body>
   <div class="bg"></div>
   <div class="bg bg2"></div>
   <div class="bg bg3"></div>
   <div style='width: 75px; margin: 10px'><a class="links" style='margin-top: 10px' href="http://localhost:8080/Ecologic/home">Voltar</a></div>
   
   <div id="login">
      <div id="login-content">
      
         <form method="POST" action="http://localhost:8080/Ecologic/login/check" > 
            <img src="http://localhost:8080/Ecologic/assets/images/logo.svg" alt="logo" style="margin-bottom: 24px;">
            
            <p class="paragraph">Usuário</p>
            <input type="e-mail" name="email" placeholder="E-mail">

            <p class="paragraph">Senha</p>
            <input type="password" name="password" placeholder="Senha">
            <p class="paragraph"> Error</p>
            <div id="buttons-div">
               <button class='button'>
                  Entrar
               </button>
               <a class="links" href="http://localhost:8080/Ecologic/register/index">Cadastro</a>
            </div>
         </form>

      </div>
   </div>
</body>

</html>