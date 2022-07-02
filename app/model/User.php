<?php

   use Ecologic\Database\Connection;

   class User{
      public $id;
      private $name;
      private $email;
      private $password;
      public $admin;

      public function fetchAllUser(){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM usuario ORDER BY id DESC';
            
         $stmt = $conn->prepare($sql);
         $stmt->execute();

         $result =  array();

         while($row = $stmt->fetchObject("User")){
            $result[] = $row;
         }
         return $result;
      }   

      public function fetchUser($id){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM usuario WHERE id = :id;';
         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         $result = $stmt->fetchObject("User");

         return $result;
      }  

      public function updateUser($id){

         $conn = Connection::getConn();

         $sql = 'UPDATE `usuario` SET nome =:nome, email=:email, senha=:senha WHERE id =' . $id;

         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':nome', $this->name);
         $stmt->bindValue(':email', $this->email);
         $stmt->bindValue(':senha', $this->password);
               
         $stmt->execute();

         return true;
      }

      public function deleteUser($id){
         $conn = Connection::getConn();
         
         $sql = 'DELETE FROM `usuario` WHERE `id` = :id';
         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         return true;
      }

      public function validateLogin(){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM usuario WHERE email = :email';

         $stmt = $conn->prepare($sql);
         $stmt->bindValue(':email',$this->email);
         $stmt->execute();

         if($stmt->rowCount()){
            $result = $stmt->fetch();
            if($result['senha'] === $this->password){
               $_SESSION['usr'] = array(
                  'id_user' => $result['id'], 
                  'name_user' => $result['nome'],
                  'admin' => $result['admin']
               );
               return true;
            }
         }
         throw new \Exception('Login Inválido');
      }

      public function validateRegister(){
         $conn = Connection::getConn();

         $sql = ' INSERT INTO usuario ( nome, email, senha) VALUES (:nome,:email,:senha)';
         if($this->compareEmail()){
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome',$this->name);
            $stmt->bindValue(':email',$this->email);
            $stmt->bindValue(':senha',$this->password);
            $stmt->execute();
            
            $this->validateLogin();

            if(isset($_SESSION['usr'])){
               return true;
            }
         }
         throw new \Exception('Cadastro Inválido');
      }

      private function compareEmail(){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM usuario WHERE email = :email';

         $stmt = $conn->prepare($sql);
         $stmt->bindValue(':email',$this->email);
         $stmt->execute();
         $result = $stmt->fetch();
         if(isset($result['email']) && $result['email'] != ''){
            return false;
         }else{
            return true;
         }
      }

      public function setEmail($email){
         $this->email = $email;
      }

      public function setName($name){
         $this->name = $name;
      }

      public function setPassword($password){
         $this->password = $password;
      }

      public function getEmail(){
         return $this->email;
      }

      public function getName(){
         return $this->name;
      }

      public function getPassword(){
         return $this->password;
      }

      public function getAdmin(){
         return $this->admin;
      }
   }