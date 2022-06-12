<?php 

   class DashboardController{

      public function index(){

         $chamado = new Chamado;
         
         $chamadoArray = $chamado->fetchAllChamado();

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashboard');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');
         $parameters['name_user'] = $_SESSION['usr']['name_user'];
         $parameters['chamados'] = $chamadoArray;

         return $template->render($parameters);
      }

      public function logout(){
         unset($_SESSION['usr']);
         session_destroy();

         header('Location: http://localhost:8080/Ecologic/login/index');
      }
   }