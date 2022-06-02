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
            $user->setName($_POST['name']);

            $email = $_POST['email'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
               $user->setEmail($_POST['email']);
            }else{
               throw new \Exception('Cadastro Inválido');
            }

            if($_POST['password'] === $_POST['passwordConfirm']){
               $user->setPassword(md5($_POST['password']));
            }else{
               throw new \Exception('Cadastro Inválido');
            }
            $user->validateRegister();

            header('location: http://localhost:8080/Ecologic/dashboard');
         }catch(\Exception $e){
            header('location: http://localhost:8080/Ecologic/Register');
         }
      }
   }