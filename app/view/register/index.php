<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://localhost:8080/Ecologic/assets/styles/register.css">
   <title>EcoLogic</title>
   <link rel="shortcut icon" href="http://localhost:8080/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
</head>

<body>
   <div class="bg"></div>
   <div class="bg bg2"></div>
   <div class="bg bg3"></div>
   <div id="login">
      <div id="login-content">
         <form method="POST" action="http://localhost:8080/Ecologic/register/register" > 
            
            <img src="http://localhost:8080/Ecologic/assets/images/logo.svg" alt="logo" style="margin-bottom: 24px;">

            <p class="paragraph">Nome</p>
            <input type="name" name="name" placeholder="Nome">

            <p class="paragraph">E-mail</p>
            <input type="e-mail" name="email" placeholder="E-mail">
            
            <p class="paragraph">Senha</p>
            <input type="password" name="password" placeholder="Senha">
            
            <p class="paragraph">Confirmar Senha</p>
            <input type="password" name="passwordConfirm" placeholder='Confirme' >

            <div id="buttons-div">
               <button class='button'>
                  Cadastrar
               </button>
               <a class="links" href="http://localhost:8080/Ecologic/login/index">Voltar</a>
            </div>
         </form>

      </div>
   </div>
</body>

</html>