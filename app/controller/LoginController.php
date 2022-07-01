<?php
   
   class LoginController{

      public function index(){

         $loader = new \Twig\Loader\FilesystemLoader('app/view/login');
         $twig = new \Twig\Environment($loader,['auto_reload']);
         $parameters['error'] = $_SESSION['msg_error'] ?? null;

         $template = $twig->load('index.php');
         return $template->render($parameters);

      }

      public function check(){
         try {
            $user = new User;
            $user->setEmail($_POST['email']);
            $user->setPassword(md5($_POST['password']));
            $user->validateLogin();
            
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
         }catch(\Exception $e){
	         $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/login');
         }
      }
   }
