<?php
    class Conexao{
        static $host = 'sql203.epizy.com';
        static $user = 'epiz_32123167';
        static $pass = '1L17J9CdD2Vv4';
        static $database = 'epiz_32123167_db_catalogo_3e1';
        static $port = '3306';
        static $con;

        public static function getConnection(){
            if(!self::$con){
                self::$con = new mysqli(self::$host, self::$user, self::$pass, self::$database, self::$port);
                if(self::$con->connect_error){
                    echo "Ocorreu um erro: " . self::$con->connect_error;
                    die();
                }
            }
            return self::$con;
        }
    }