<?php
   session_start();

   ini_set('display_errors', '1');
   ini_set('display_startup_errors', '1');
   error_reporting(E_ALL);

   require_once 'app/core/Core.php';

   require_once 'app/controller/LoginController.php';
   require_once 'app/controller/DashboardController.php';
   require_once 'app/controller/DashFuncionarioController.php';
   require_once 'app/controller/DashVeiculoController.php';
   require_once 'app/controller/HomeController.php';
   require_once 'app/controller/DashAdminController.php';
   require_once 'app/controller/RegisterController.php';
   
   require_once 'app/model/User.php';
   require_once 'app/model/Funcionario.php';
   require_once 'app/model/Veiculo.php';
   require_once 'app/model/Chamado.php';
   

   require_once 'lib/Ecologic/Connection.php';

   require_once 'vendor/autoload.php';

   $core = new Core;
   echo $core->start($_GET);