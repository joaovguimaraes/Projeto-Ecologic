<?php 

   class DashAdminController{

      public function index(){
         $user = new User;
         
         $userArray = $user->fetchAllUser();

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashAdmin');
         $twig = new \Twig\Environment($loader,['auto_reload',
            'debug' => true,]);

         $twig->addExtension(new \Twig\Extension\DebugExtension());

         $template = $twig->load('index.php');

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         $parameters['usuarios'] = $userArray;
         
         return $template->render($parameters);
      }

      public function delete(){
         $user = new User;
         try {
            foreach($_POST as &$id){
               $user->deleteUser($_POST[$id]);
               if( $_SESSION['usr']['id_user']==$_POST[$id]){
                  $this->logout();
               }
            }  
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin');
         }catch(\Exception $e){
            if (str_contains($e->getMessage(), '23000')) { 
               $_SESSION['msg_error'] = array('msg' => 'Atualmente em uso', 'count' => 0);
               header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin');
           }else{
               $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
               header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin');
           }
         }
      }

      public function edit($paramId){

         $user = new User;

         $userObj = $user->fetchUser($paramId[0]);
         
         $loader = new \Twig\Loader\FilesystemLoader('app/view/adminEdit');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;

         $parameters['function'] = $user;
         $parameters['user'] = $userObj;

         return $template->render($parameters);
      }

      public function update($id){
         try {
            $user = new User;
            $result = $user->fetchUser($id[0]);

            $name = $_POST['name'];
            $email = $_POST['email'];

            $old_pass = (isset($_POST['old_pass']) and strlen($_POST['old_pass']) != 0) 
               ? $_POST['old_pass']
               : $result->senha;

            $pass = (isset($_POST['pass']) and strlen($_POST['pass'])  != 0) 
               ? $_POST['pass']
               : $result->senha;

            $confirm_pass = (isset($_POST['confirm_pass']) and strlen($_POST['confirm_pass'])  != 0) 
               ? $_POST['confirm_pass']
               : $result->senha;
            
            if(strlen($name) > 3){
               $user->setName($name);
            }else{
               throw new \Exception('Nome Inv??lido');
            }  

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
               $user->setEmail($email);
            }else{
               throw new \Exception('E-mail Inv??lido');
            }

            if(md5($old_pass) === $result->senha){               
               if(strlen($pass) >= 6){
                  if($pass === $confirm_pass){
                     $user->setPassword(md5($pass));
                  }else{
                     throw new \Exception('As senhas n??o coincidem');
                  }
               }else{
                  throw new \Exception('Senha Curta');
               }
            }else{
               throw new \Exception('Senha Antiga incorreta');
            }

            $user->updateUser($id[0]);

            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashAdmin/edit/'.$id[0]);
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