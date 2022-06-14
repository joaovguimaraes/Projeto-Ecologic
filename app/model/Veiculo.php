<?php

   use Ecologic\Database\Connection;

   class Veiculo{
      public $id;
      private $model;
      private $year;
      private $autonomy;
      private $disponivel;
      private $plate;

      public function fetchAllVeiculo($disponivel = true){
         $conn = Connection::getConn();

         $sql = ($disponivel)
            ?'SELECT * FROM veiculo ORDER BY id DESC'
            :'SELECT * FROM veiculo WHERE disponivel = 1 ORDER BY id DESC';

         $stmt = $conn->prepare($sql);
         $stmt->execute();

         $result =  array();

         while($row = $stmt->fetchObject("Veiculo")){
            $result[] = $row;
         }
         return $result;
      }   

      public function fetchVeiculo($id){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM veiculo WHERE id = :id;';
         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         $result = $stmt->fetchObject("Veiculo");

         return $result;
      }

      public function updateVeiculo($id){
         $conn = Connection::getConn();

         $sql = 'UPDATE `veiculo` SET modelo = :modelo ,ano = :ano, autonomia = :autonomia, placa = :placa WHERE id='.$id;
         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':modelo', $this->model);
         $stmt->bindValue(':ano', $this->year);
         $stmt->bindValue(':autonomia', $this->autonomy);
         $stmt->bindValue(':placa', $this->plate);

         $stmt->execute();

         return true;
      }  

      public function insertVeiculo(){
         $conn = Connection::getConn();

         $sql = 'INSERT INTO veiculo(`modelo`, `ano`, `autonomia`, `disponivel`, `placa`) VALUES (:modelo, :ano, :autonomia, 1, :placa)';
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':modelo',$this->model);
         $stmt->bindValue(':ano',$this->year);
         $stmt->bindValue(':autonomia',$this->autonomy);
         $stmt->bindValue(':placa',$this->plate);

         $stmt->execute();

         return true;
      }  

      public function deleteVeiculo($id){
         $conn = Connection::getConn();
         
         $sql = 'DELETE FROM `veiculo` WHERE `id` = :id';
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         return true;
      }
      

      public function setModel($model){
         $this->model = $model;
      }

      public function setYear($year){
         $this->year = $year;
      }

      public function setAutonomy($autonomy){
         $this->autonomy = $autonomy;
      }

      public function setDisponivel($disponivel){
         $this->disponivel = $disponivel;
      }      

      public function setPlate($plate){
         $this->plate = $plate;
      }

      public function getModel(){
         return $this->model;
      }

      public function getYear(){
         return $this->year;
      }

      public function getAutonomy(){
         return $this->autonomy;
      }

      public function getDisponivel(){
         return $this->disponivel;
      }      
      
      public function getPlate(){
         return $this->plate;
      }
   }