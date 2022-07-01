<?php

   use Ecologic\Database\Connection;

   class Chamado{
      public $id;
      public $local;
      public $km_out;
      public $km_entry;
      public $concluido;
      private $date;
      public $id_func;
      public $id_veiculo;

      public function fetchAllChamado(){
         $conn = Connection::getConn();

         $sql = 'SELECT chamado.*,`nome`,`modelo` FROM chamado INNER JOIN funcionario ON chamado.id_func = funcionario.id INNER JOIN veiculo ON chamado.id_veiculo = veiculo.id ORDER BY id DESC;';

         $stmt = $conn->prepare($sql);
         $stmt->execute();

         $result =  array();

         while($row = $stmt->fetchObject("Chamado")){
            $result[] = $row;
         }
         return $result;
      }

      public function insertChamado(){
         $conn = Connection::getConn();

         $sql = 'INSERT INTO `chamado`( `local`, `km_saida`, `concluido`, `data`, `id_func`, `id_veiculo`) VALUES (:local, :km_saida, 0, NOW(), :id_func, :id_veiculo)';
         
         $stmt = $conn->prepare($sql);
   
         $stmt->bindValue(':local',$this->local);
         $stmt->bindValue(':km_saida',$this->km_out);
         $stmt->bindValue(':id_func',$this->id_func);
         $stmt->bindValue(':id_veiculo',$this->id_veiculo);
         
         $this->changeStatus($this->id_func, 'funcionario');
         $this->changeStatus($this->id_veiculo, 'veiculo');

         $stmt->execute();
         
         return true;
      }  

      public function fetchChamado($id){
         $conn = Connection::getConn();

         $sql = 'SELECT chamado.*,`nome`,`modelo`,`autonomia` FROM chamado INNER JOIN funcionario ON chamado.id_func = funcionario.id INNER JOIN veiculo ON chamado.id_veiculo = veiculo.id WHERE chamado.id = :id;';
         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         $result = $stmt->fetchObject("Chamado");

         return $result;
      }   
      
      public function fetchRelatorio($date_start, $date_end){
         $conn = Connection::getConn();

         $sql = 'SELECT chamado.*,`nome`,`modelo`,`autonomia` FROM chamado INNER JOIN funcionario ON chamado.id_func = funcionario.id INNER JOIN veiculo ON chamado.id_veiculo = veiculo.id WHERE chamado.data > :date_start AND chamado.data < :date_end AND concluido = 1;';
         $stmt = $conn->prepare($sql);
         
         $stmt->bindValue(':date_start', $date_start . '  00:00:00');
         $stmt->bindValue(':date_end', $date_end . '  00:00:00');
         
         $stmt->execute();

         $result =  array();

         while($row = $stmt->fetchObject("Chamado")){
            $result[] = $row;
         }

         return $result;
      }
      
      public function updateChamado($id){
         $conn = Connection::getConn();

         $chamado = $this->fetchChamado($id);

         $sql = ($chamado->concluido) 
         ?'UPDATE chamado SET `local` = :local, km_saida = :km_saida, km_entrada = :km_entrada, id_func = :id_func, id_veiculo = :id_veiculo WHERE id ='.$id
         :'UPDATE chamado SET `local` = :local, km_saida = :km_saida, id_func = :id_func, id_veiculo = :id_veiculo WHERE id ='.$id;

         $stmt = $conn->prepare($sql);
         

         $stmt->bindValue(':local', $this->local);
         $stmt->bindValue(':km_saida', $this->km_out);
         

         if($chamado->concluido == false){
 
            if($chamado->id_func != $this->id_func){
               $stmt->bindValue(':id_func', $this->id_func);
               $this->changeStatus($chamado->id_func, 'funcionario', true);
               $this->changeStatus($this->id_func, 'funcionario', false);
            }else{
               $stmt->bindValue(':id_func', $this->id_func);
            }
            if($chamado->id_veiculo != $this->id_veiculo){
               $stmt->bindValue(':id_veiculo', $this->id_veiculo);
               $this->changeStatus($chamado->id_veiculo, 'veiculo', true);
               $this->changeStatus($this->id_veiculo, 'veiculo', false);
            }else{
               $stmt->bindValue(':id_veiculo', $this->id_veiculo);
            }  
         }else{
            $stmt->bindValue(':km_entrada', $this->km_entry);
            $stmt->bindValue(':id_func', $this->id_func);
            $stmt->bindValue(':id_veiculo', $this->id_veiculo);
         }
         
         $stmt->execute();

         return true;
      }

      public function deleteChamado($id){
         $conn = Connection::getConn();

         $chamado = $this->fetchChamado($id);

         $this->changeStatus($chamado->id_func, 'funcionario', true);
         $this->changeStatus($chamado->id_veiculo, 'veiculo', true);

         $sql = 'DELETE FROM `chamado` WHERE `id` = :id';
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':id', $id);
        
         $stmt->execute();

         return true;
      }

      public function updateKmEntry($id,$km_entry){
         $conn = Connection::getConn();
         $sql = 'UPDATE chamado SET km_entrada = :km_entrada WHERE id = :id';
         
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':id', $id);
         $stmt->bindValue(':km_entrada', $km_entry);
         $stmt->execute();

         return true;
      }

      public function changeStatus($id, $table, $disponivel = false){
         $conn = Connection::getConn();
         if($table === 'chamado' ){
            $sql = 'UPDATE '. $table .' SET concluido = 1 WHERE id = :id';

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $id);
            
            $stmt->execute();

            return true;
         }else{
            $sql = ($disponivel)
               ? 'UPDATE '. $table .' SET disponivel = 1 WHERE id = :id'
               : 'UPDATE '. $table .' SET disponivel = 0 WHERE id = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $id);
            
            $stmt->execute();

            return true;
         }
      }
      
      public function calcCo2($id){
         $chamado = $this->fetchChamado($id);
         $distance = $chamado->km_entrada - $chamado->km_saida;
         $autonomy = $chamado->autonomia;

         $cg = ($distance*1) / $autonomy;
         $co2 = $cg * 0.73 * 0.75 * 3.7;
         return $co2;
      }

      public function checkDisponivel($id, $table){
         $conn = Connection::getConn();

         $sql = 'SELECT * FROM '. $table .' WHERE id = :id AND disponivel = 1';

         $stmt = $conn->prepare($sql);
         $stmt->bindValue(':id', $id);
         
         $stmt->execute();

         $result = $stmt->fetch();

         if($table === 'funcionario'){
            if(strlen($result['nome']) > 0 && $result['nome'] != ''){
               return true;
            }else{
               return false;
            }
         }else{
            if(strlen($result['modelo']) > 0 && $result['modelo'] != ''){
               return true;
            }else{
               return false;
            }
         }
      }
      
      public function setLocal($local){
         $this->local = $local;
      }

      public function setKmOut($km_out){
         $this->km_out = $km_out;
      }

      public function setKmEntry($km_entry){
         $this->km_entry = $km_entry;
      }

      public function setConcluido($concluido){
         $this->concluido = $concluido;
      }      
      public function setDate($date){
         $this->date = $date;
      }      
      public function setIdFunc($id_func){
         $this->id_func = $id_func;
      }      
      public function setIdVeiculo($id_veiculo){
         $this->id_veiculo = $id_veiculo;
      }

      public function getLocal(){
         return $this->local;
      }

      public function getKmOut(){
         return $this->km_out;
      }

      public function getKmEntry(){
         return $this->km_entry;
      }

      public function getConcluido(){
         return $this->concluido;
      }     

      public function getDate(){
         return $this->date;
      }

      public function getIdFunc(){
         return $this->id_func;
      }

      public function getIdVeiculo(){
         return $this->id_veiculo;
      }
   }