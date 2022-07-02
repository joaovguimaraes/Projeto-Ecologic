<?php

   namespace Ecologic\Database;

   abstract class Connection{

      private static $conn;

      private static $dsn = "mysql:host=ecologic.c00icrrae8dk.us-east-1.rds.amazonaws.com;port=3306;dbname=ecologic";
      private static $username = 'admin';
      private static $password = '12345678';
      private static $database = "ecologic";
      public static $port = 3306;

      public static function getConn(){
         if(!self::$conn){
            self::$conn = new \PDO(self::$dsn, self::$username, self::$password);
         }
         return self::$conn;
      } 
   }
