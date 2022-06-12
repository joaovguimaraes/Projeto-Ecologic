<?php
   
   class HomeController{

      public function index(){

         $loader = new \Twig\Loader\FilesystemLoader('app/view/home');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');
         return $template->render();
         
      }
   }