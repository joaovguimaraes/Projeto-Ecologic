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

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         $parameters['funcionarios'] = $funcArray;
         
         return $template->render($parameters);
      }

      public function delete(){
         $func = new Funcionario;
         try {
            foreach($_POST as &$id){
               $func->deleteFuncionario($_POST[$id]);
            }
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario');
         }catch(\Exception $e){
            if (str_contains($e->getMessage(), '23000')) { 
               $_SESSION['msg_error'] = array('msg' => 'Atualmente em uso', 'count' => 0);
               header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario');
            }else{
               $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
               header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario');
           }
         }
      }

      public function edit($paramId){

         $func = new Funcionario;

         $funcObj = $func->fetchFuncionario($paramId[0]);

         $loader = new \Twig\Loader\FilesystemLoader('app/view/funcEdit');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');

         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         $parameters['usr'] = $_SESSION['usr'];
         
         $parameters['function'] = $func;
         $parameters['funcionario'] = $funcObj;


         return $template->render($parameters);
      }

      public function update($id){
         try {

            $func = new Funcionario;
            $result = $func->fetchFuncionario($id[0]);

            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $cnh = $_POST['cnh'];
            
            if(strlen($name) > 3){
               $func->setName($name);
            }else{
               throw new \Exception('Nome Inv??lido');
            }  

            if(strlen($contact) == 11){
               $func->setContact($contact);
            }else{
               throw new \Exception('Contato Inv??lido');
            }

            if(strlen($cnh) == 11){
                  $func->setCnh($cnh);
            }else{
               
               throw new \Exception('CNH Inv??lido');
            }
      
            $func->updateFuncionario($id[0]);

            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario/edit/'.$id[0]);
         }
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
               throw new \Exception('Nome Inv??lido');
            }  

            if(strlen($contact) == 11){
               $func->setContact($contact);
            }else{
               throw new \Exception('Contato Inv??lido');
            }

            if(strlen($cnh) == 11){
                  $func->setCnh($cnh);
            }else{
               throw new \Exception('CNH Inv??lido');
            }

            $func->insertFuncionario();

            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashFuncionario');
         }
      }

      public function logout(){
         unset($_SESSION['usr']);
         session_destroy();

         header('Location: http://ec2-52-90-93-141.compute-1.amazonaws.com/login/index');
      }

      public function fetchData(){
         
      }
   }