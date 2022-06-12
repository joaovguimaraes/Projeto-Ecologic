<?php 

   class DashFuncionarioController{

      public function index(){
         $func = new Funcionario;
         
         $funcArray = $func->fetchAllFuncionario();

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashFuncionario');
         $twig = new \Twig\Environment($loader,['auto_reload',
            'debug' => true,]);

         $twig->addExtension(new \Twig\Extension\DebugExtension());

         $template = $twig->load('index.php');

         $parameters['name_user'] = $_SESSION['usr']['name_user'];
         $parameters['funcionarios'] = $funcArray;
         
         return $template->render($parameters);
      }

      public function delete(){
         $func = new Funcionario;

         foreach($_POST as &$id){
            $func->deleteFuncionario($_POST[$id]);
         }
         header('location: http://localhost:8080/Ecologic/dashFuncionario');
      }

      public function insert(){
         try {
            $func = new Funcionario;

            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $cnh = $_POST["cnh"];

            if(strlen($name) > 3){
               $func->setName($name);
            }else{
               throw new \Exception('Nome Inválido');
            }  

            if(strlen($contact) == 11){
               $func->setContact($contact);
            }else{
               throw new \Exception('Contato Inválido');
            }

            if(strlen($cnh) == 11){
                  $func->setCnh($cnh);
            }else{
               throw new \Exception('CNH Inválido');
            }

            $func->insertFuncionario();

            header('location: http://localhost:8080/Ecologic/dashFuncionario');
         }catch(\Exception $e){
            header('location: http://localhost:8080/Ecologic/dashFuncionario');
         }
      }

      public function logout(){
         unset($_SESSION['usr']);
         session_destroy();

         header('Location: http://localhost:8080/Ecologic/login/index');
      }

      public function fetchData(){
         
      }
   }