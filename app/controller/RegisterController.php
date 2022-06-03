<?php
   
   class RegisterController{

      public function index(){

         $loader = new \Twig\Loader\FilesystemLoader('app/view/register');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');
         return $template->render();

      }

      public function register(){
         try {
            $user = new User;

            $email = $_POST['email'];
            $name = $_POST['name'];
            $pass = $_POST["password"];
            $confirm_pass = $_POST["confirm_password"];

            if(strlen($name) > 3){
               $user->setName($name);
            }else{
               throw new \Exception('Nome Inválido');
            }  

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
               $user->setEmail($email);
            }else{
               throw new \Exception('E-mail Inválido');
            }

            if(strlen($pass) >= 6){
               if($pass === $confirm_pass){
                  $user->setPassword(md5($pass));
               }else{
                  throw new \Exception('As senhas não coincidem');
               }
            }else{
               throw new \Exception('Senha Curta');
            }

            $user->validateRegister();

            header('location: http://localhost:8080/Ecologic/dashboard');
         }catch(\Exception $e){
            header('location: http://localhost:8080/Ecologic/Register');
         }
      }
   }