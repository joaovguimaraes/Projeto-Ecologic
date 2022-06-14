<?php

   namespace Ecologic\Database;

   abstract class Connection{

      private static $conn;

      private static $sgbd = "mysql";
      private static $host = "localhost";
      private static $user = "root";
      private static $pass = "123";
      private static $database = "ecologic";
      public static $port = 3306;

      public static function getConn(){
         if(!self::$conn){
            self::$conn = new \PDO(self::$sgbd . ': host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$database, self::$user, self::$pass);
         }
         return self::$conn;
      }
      
      public static function getURL(){
         return 'http://ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/login/';
      }
   }