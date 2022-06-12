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

         $parameters['name_user'] = $_SESSION['usr']['name_user'];
         $parameters['veiculos'] = $veiculoArray;
         
         return $template->render($parameters);
      }

      public function delete(){
         $veiculo = new Veiculo;

         foreach($_POST as &$id){
            $veiculo->deleteVeiculo($_POST[$id]);
         }
         header('location: http://localhost:8080/Ecologic/dashVeiculo');
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

            header('location: http://localhost:8080/Ecologic/dashVeiculo');
         }catch(\Exception $e){
            header('location: http://localhost:8080/Ecologic/dashVeiculo');
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