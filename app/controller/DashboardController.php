<?php 

   class DashboardController{

      public function index(){

         $chamado = new Chamado;
         $func = new Funcionario;
         $veiculo = new Veiculo;

         $chamadoArray = $chamado->fetchAllChamado();
         $funcArray = $func->fetchAllFuncionario(false);
         $veiculoArray = $veiculo->fetchAllVeiculo(false);

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashboard');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;

         $parameters['chamados'] = $chamadoArray;
         $parameters['funcionarios'] = $funcArray;
         $parameters['veiculos'] = $veiculoArray;

         return $template->render($parameters);
      }

      public function open($paramId){

         $chamado = new Chamado;
         
         $chamadoObj = $chamado->fetchChamado($paramId[0]);

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashFinish');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');
         $parameters['name_user'] = $_SESSION['usr']['name_user'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         $parameters['function'] = $chamado;
         $parameters['chamado'] = $chamadoObj;

         return $template->render($parameters);
      }

      public function edit($paramId){

         $chamado = new Chamado;
         $func = new Funcionario;
         $veiculo = new Veiculo;

         $funcArray = $func->fetchAllFuncionario();
         $veiculoArray = $veiculo->fetchAllVeiculo();

         $chamadoObj = $chamado->fetchChamado($paramId[0]);

         $loader = new \Twig\Loader\FilesystemLoader('app/view/dashEdit');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;

         $parameters['function'] = $chamado;
         $parameters['chamado'] = $chamadoObj;
         
         $parameters['funcionarios'] = $funcArray;
         $parameters['veiculos'] = $veiculoArray;
         
         return $template->render($parameters);
      }

      public function calculate(){
         $chamado = new Chamado;
         $func = new Funcionario;
         $veiculo = new Veiculo;

         $date_start = $_POST['date_start'];
         $date_end = $_POST['date_end'];

         $funcArray = $func->fetchAllFuncionario();
         $veiculoArray = $veiculo->fetchAllVeiculo();
         $chamadoObj = $chamado->fetchRelatorio($date_start, $date_end);

         $totalCo2 = 0;
         $averageCo2 = 0;
         $calcTotalKm = 0;
         $calcAverageKm = 0;

         if(count($chamadoObj)>1){
            $totalCo2 = $chamado->calcTotalC02($chamadoObj);
            $averageCo2 = $chamado->calcAverageC02($chamadoObj);
            $calcTotalKm = $chamado->calcTotalKm($chamadoObj);
            $calcAverageKm = $chamado->calcAverageKm($chamadoObj);
         }

         $loader = new \Twig\Loader\FilesystemLoader('app/view/reports');
         $twig = new \Twig\Environment($loader,['auto_reload']);

         $template = $twig->load('index.php');

         $parameters['usr'] = $_SESSION['usr'];
         $parameters['error'] = $_SESSION['msg_error'] ?? null;
         
         $parameters['function'] = $chamado;
         $parameters['chamados'] = $chamadoObj;
         $parameters['totalCo2'] = $totalCo2;
         $parameters['averageCo2'] = $averageCo2;
         $parameters['calcTotalKm'] = $calcTotalKm;
         $parameters['calcAverageKm'] = $calcAverageKm;

         return $template->render($parameters);
      }

      public function finish($id){
         try {
         $chamado = new Chamado;
         $km_entry = $_POST['km_entry'];
         $return = $chamado->fetchChamado($id[0]);
         
         if($km_entry > 0 && $km_entry >= $return->km_saida){ 
            $chamado->updateKmEntry($id[0],$km_entry);
         }else{
            throw new \Exception('Km Inv??lido');
         }

         $chamado->changeStatus($return->id_func, 'funcionario', true);
         $chamado->changeStatus($return->id_veiculo, 'veiculo', true);

         $chamado->changeStatus($id[0], 'chamado');
   
         header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/open/'.$id[0]);
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/open/'.$id[0]);
         }
      }

      public function delete(){
         $chamado = new Chamado;
         try{
            foreach($_POST as &$id){
               $chamado->deleteChamado($_POST[$id]);
            }
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
         }catch(\Exception $e){
            if (str_contains($e->getMessage(), '23000')) { 
               $_SESSION['msg_error'] = array('msg' => 'Atualmente em uso', 'count' => 0);
               header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
            }else{
               $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
               header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
           }
         }
      }

      public function insert(){
         try {

            $chamado = new Chamado;

            $local = $_POST['local'];
            $km_out = $_POST['km_out'];
            $id_func = $_POST['funcionarios'];
            $id_veiculo = $_POST['veiculos'];

            if(strlen($local) > 3){
               $chamado->setLocal($local);
            }else{
               throw new \Exception('Local Inv??lido');
            }  

            if($km_out >= 0){
                  $chamado->setKmout($km_out);
            }else{
               throw new \Exception('KM Inv??lido');
            }

            if($chamado->checkDisponivel($id_func, 'funcionario')){
               $chamado->setIdFunc($id_func);
            }else{
               throw new \Exception('Funcionario Inv??lido');
            }

            if($chamado->checkDisponivel($id_veiculo, 'veiculo')){
               $chamado->setIdVeiculo($id_veiculo);
            }else{
               throw new \Exception('Veiculo Inv??lido');
            }

            $chamado->insertChamado();

            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
         }
      }

      public function update($id){
         try {

            $chamado = new Chamado;
            $result = $chamado->fetchChamado($id[0]);
            $concluido = $result->concluido;

            $local = $_POST['local'];
            $km_out = $_POST['km_out'];
            $km_entry = $_POST['km_entry'];
            $id_func = $_POST['funcionarios'];
            $id_veiculo = $_POST['veiculos'];

            if(strlen($local) > 3){
               $chamado->setLocal($local);
               
            }else{

               throw new \Exception('Nome Inv??lido');
            }  

            if($km_out >= 0){
               $chamado->setKmOut($km_out);
               
            }else{
               throw new \Exception('CNH Inv??lido');
            }
            
            if($result->concluido){
               
               if($km_entry > $km_out){
                  
                  $chamado->setKmEntry($km_entry);
               }else{
                  
                  throw new \Exception('CNH Inv??lido');
               }
            }
            
            $chamado->setIdFunc($id_func);
            
            $chamado->setIdVeiculo($id_veiculo);
            
            $chamado->setConcluido($concluido);
            
            $chamado->updateChamado($id[0]);

            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard');
         }catch(\Exception $e){
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
            header('location: http://ec2-52-90-93-141.compute-1.amazonaws.com/dashboard/edit/'.$id[0]);
         }
      }

      public function logout(){
         unset($_SESSION['usr']);
         session_destroy();

         header('Location: http://ec2-52-90-93-141.compute-1.amazonaws.com/login/index');
      }
   }