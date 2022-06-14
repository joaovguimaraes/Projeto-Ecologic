<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/assets/styles/login.css">
   <title>EcoLogic</title>
   <link rel="shortcut icon" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/assets/images/Simbol - Ecologic.svg" type="image/svg">
</head>

<body>
   {% if error != ''%}
      <div class='error'>{{error.msg}}!</div>
   {% endif %}
   <div class="bg"></div>
   <div class="bg bg2"></div>
   <div class="bg bg3"></div>
   <div style='width: 75px; margin: 10px'><a class="links" style='margin-top: 10px' href="http://ec2-52-90-93-141.compute-1.amazonaws.com/home">Voltar</a></div>
   
   <div id="login">
      <div id="login-content">
      
         <form method="POST" action="http://ec2-52-90-93-141.compute-1.amazonaws.com/login/check" > 
            <img src="http://ec2-52-90-93-141.compute-1.amazonaws.com/assets/images/logo.svg" alt="logo" style="margin-bottom: 24px;">
            
            <p class="paragraph">Usuário</p>
            <input type="e-mail" name="email" placeholder="E-mail">

            <p class="paragraph">Senha</p>
            <input type="password" name="password" placeholder="Senha">
            <div id="buttons-div">
               <button class='button'>
                  Entrar
               </button>
               <a class="links" href="http://ec2-52-90-93-141.compute-1.amazonaws.com/register/index">Cadastro</a>
            </div>
         </form>

      </div>
   </div>
</body>

</html>