<?php 

   class DashVeiculoController{

      public function index(){
         $veiculo = new Veiculo;
         
         $veiculoArray = $veiculo->fetchAllVeiculo();

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashVeiculo');
         $twig = new \Twig\Environment($loader,['auto_reload',
            'debug' => true,]);

         $twig->addExtension(new \Twig\Extension\DebugExtension());

         $template = $twig->load('index.php');

         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         $parameters['usr'] = $_SESSION['usr'];
         $parameters['veiculos'] = $veiculoArray;
         
         return $template->render($parameters);
      }

      public function delete(){
         $veiculo = new Veiculo;
            try {
            foreach($_POST as &$id){
               $veiculo->deleteVeiculo($_POST[$id]);
            }
            header('location: http://localhost/Projeto-Ecologic/dashVeiculo');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://localhost/Projeto-Ecologic/dashVeiculo');
         }
      }

      public function insert(){
         try {
            $veiculo = new Veiculo;
            $regex = '/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/';

            $model = $_POST['model'];
            $year = $_POST['year'];
            $autonomy = $_POST["autonomy"];
            $plate = $_POST["plate"];

            if(strlen($model) > 3){
               $veiculo->setModel($model);
               
            }else{
               throw new \Exception('Modelo Inválido');
            }  

            if($year > 1950 and $year < 2099){
               $veiculo->setYear($year);
            }else{
               throw new \Exception('Ano Inválido');
            }

            if(strlen($autonomy) > 0){
               $veiculo->setAutonomy($autonomy);
            }else{
               throw new \Exception('Autonomia Inválido');
            }            
         
            if(preg_match($regex, $plate) === 1){
               $veiculo->setPlate($plate);
            }else{
               throw new \Exception('Placa Inválido');
            }

            $veiculo->insertVeiculo();

            header('location: http://localhost/Projeto-Ecologic/dashVeiculo');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://localhost/Projeto-Ecologic/dashVeiculo');
         }
      }

      public function edit($paramId){

         $veiculo = new Veiculo;

         $veiculoObj = $veiculo->fetchVeiculo($paramId[0]);

         $loader = new \Twig\Loader\FilesystemLoader('app/view/veiculoEdit');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;

         $parameters['function'] = $veiculo;
         $parameters['veiculo'] = $veiculoObj;

         return $template->render($parameters);
      }

      public function update($id){
         try {

            $veiculo = new Veiculo;
            $regex = '/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/';

            $result = $veiculo->fetchVeiculo($id[0]);

            $model = $_POST['model'];
            $plate = $_POST['plate'];
            $autonomy = $_POST['autonomy'];
            $year = $_POST['year'];
            
            if(strlen($model) > 3){
               $veiculo->setModel($model);
            }else{
               throw new \Exception('Modelo Inválido');
            }  

            if($year > 1950 and $year < 2099){
               $veiculo->setYear($year);
            }else{
               throw new \Exception('Ano Inválido');
            }

            if(strlen($autonomy) > 0 and $autonomy > 0){
               $veiculo->setAutonomy($autonomy);
            }else{
               throw new \Exception('Autonomia Inválida');
            }            
         
            if(preg_match($regex, $plate) === 1){
               $veiculo->setPlate($plate);
            }else{
               throw new \Exception('Placa Inválida');
            }

            $veiculo->updateVeiculo($id[0]);

            header('location: http://localhost/Projeto-Ecologic/dashVeiculo');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://localhost/Projeto-Ecologic/dashVeiculo/edit/'.$id[0]);
         }
      }

      public function logout(){
         unset($_SESSION['usr']);
         session_destroy();

         header('Location: http://localhost/Projeto-Ecologic/login/index');
      }

      public function fetchData(){
         
      }
   }