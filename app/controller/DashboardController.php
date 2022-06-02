<?php 

   class DashboardController{

      public function index(){

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashboard');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');
         return $template->render();
      }

      public function logout(){
         unset($_SESSION['usr']);
         session_destroy();

         header('Location: http://localhost:8080/Ecologic/login/index');
      }
   }