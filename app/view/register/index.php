<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/styles/register.css">
   <title>EcoLogic</title>
   <link rel="shortcut icon" href="/assets/images/Simbol - Ecologic.svg" type="image/svg">
</head>

<body>
   {% if error != ''%}
      <div class='error'>{{error.msg}}!</div>
   {% endif %}
   <div class="bg"></div>
   <div class="bg bg2"></div>
   <div class="bg bg3"></div>
   <div id="login">
      <div id="login-content">
         <form method="POST" action="http://ec2-52-90-93-141.compute-1.amazonaws.com/register/register" > 

            <img src="/assets/images/logo.svg" alt="logo" style="margin-bottom: 24px;">

            <p class="paragraph">Nome</p>
            <input type="name" name="name" placeholder="Nome">

            <p class="paragraph">E-mail</p>
            <input type="e-mail" name="email" placeholder="E-mail">
            
            <p class="paragraph">Senha (Mínimo 6 caracteres)</p>
            <input type="password" name="password" placeholder="Senha">
            
            <p class="paragraph">Confirmar Senha</p>
            <input type="password" name="confirm_password" placeholder='Confirme' >

            <div id="buttons-div">
               <button class='button'>
                  Cadastrar
               </button>
               <a class="links" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/login/index">Voltar</a>
            </div>
         </form>

      </div>
   </div>
</body>

</html>