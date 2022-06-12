<?php

   use Ecologic\Database\Connection;

   class Funcionario{
      public $id;
      private $name;
      private $contact;
      private $cnh;
      private $disponivel;

      public function fetchAllFuncionario(){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM funcionario ORDER BY id DESC';

         $stmt = $conn->prepare($sql);
         $stmt->execute();

         $result =  array();

         while($row = $stmt->fetchObject("Funcionario")){
            $result[] = $row;
         }
         return $result;
      }   

      public function insertFuncionario(){
         $conn = Connection::getConn();

         $sql = 'INSERT INTO funcionario(`nome`, `contato`, `cnh`, `disponivel`) VALUES (:nome, :contato, :cnh, 1)';
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':nome',$this->name);
         $stmt->bindValue(':contato',$this->contact);
         $stmt->bindValue(':cnh',$this->cnh);

         $stmt->execute();
         
         return true;
      }  

      public function deleteFuncionario($id){
         $conn = Connection::getConn();
         
         $sql = 'DELETE FROM `funcionario` WHERE `id` = :id';
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         return true;
      }
      

      public function setName($name){
         $this->name = $name;
      }

      public function setContact($contact){
         $this->contact = $contact;
      }

      public function setCnh($cnh){
         $this->cnh = $cnh;
      }

      public function setDisponivel($disponivel){
         $this->disponivel = $disponivel;
      }

      public function getName(){
         return $this->name;
      }

      public function getContact(){
         return $this->contact;
      }

      public function getCnh(){
         return $this->cnh;
      }

      public function getDisponivel(){
         return $this->disponivel;
      }
   }