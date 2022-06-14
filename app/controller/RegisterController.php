<?php
   
   class RegisterController{

      public function index(){

         $loader = new \Twig\Loader\FilesystemLoader('app/view/register');
         $twig = new \Twig\Environment($loader,['auto_reload']);
         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         $template = $twig->load('index.php');
         return $template->render($parameters);

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

            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/Projeto-Ecologic/dashboard');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/Projeto-Ecologic/Register');
         }
      }
   }