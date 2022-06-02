<?php
   
   class LoginController{

      public function index(){

         $loader = new \Twig\Loader\FilesystemLoader('app/view/login');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');
         return $template->render();

      }

      public function check(){
         try {
            $user = new User;
            $user->setEmail($_POST['email']);
            $user->setPassword(md5($_POST['password']));
            $user->validateLogin();
            
            header('location: http://localhost:8080/Ecologic/dashboard');
         }catch(\Exception $e){
            header('location: http://localhost:8080/Ecologic/login');
         }
      }
   }