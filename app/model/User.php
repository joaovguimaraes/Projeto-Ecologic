<?php

   use Ecologic\Database\Connection;

   class User{
      private $id;
      private $name;
      private $email;
      private $password;

      public function validateLogin(){
         $conn = Connection::getConn();

         $sql = ' SELECT * FROM usuario WHERE email = :email';

         $stmt = $conn->prepare($sql);
         $stmt->bindValue(':email',$this->email);
         $stmt->execute();

         if($stmt->rowCount()){
            $result = $stmt->fetch();
            if($result['senha'] === $this->password){
               $_SESSION['usr'] = $result['id'];
               return true;
            }
         }

         throw new \Exception('Login Inválido');
      }

      public function validateRegister(){
         $conn = Connection::getConn();

         $sql = ' INSERT INTO usuario ( nome, email, senha) VALUES (:nome,:email,:senha)';

         $stmt = $conn->prepare($sql);
         $stmt->bindValue(':nome',$this->name);
         $stmt->bindValue(':email',$this->email);
         $stmt->bindValue(':senha',$this->password);
         $stmt->execute();
         
         $this->validateLogin();

         if(isset($_SESSION['usr'])){
            return true;
         }
      
         throw new \Exception('Cadastro Inválido');
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
   }