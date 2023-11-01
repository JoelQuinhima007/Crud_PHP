<?php
class DBConnection
{
  
   private static $Conn;

   public function __construct()
   {}
   public static function getConnection()
   {

    if(!isset(self::$Conn))
    {
        self::$Conn= new PDO('mysql:host=localhost:3306, dbname=cliente', 'root','', 
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SETNAMES utf8'));
        self::$Conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        self::$Conn->setAttribute(PDO::ATTR_ORACLE_NULLS,PDO::NULL_EMPTY_STRING);
    }
    return self::$Conn;
   }












}